<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

use DB;

use Validator;

use Auth;

use Mail;

class productController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function newproductcategory(){

        if($this->useractive() != 'Active'){

            $initialmessage = 'Please contact admin to activate your account.';

            return view('profile', ['initialmessage' => $initialmessage]);

        }else{

        	$categorys = DB::table('productcategory')->get();

        	return view('newproductcategory', ['categorys' => $categorys]);

        }
    }


    public function editproductcategory(){

    	return view('editproductcategory');
    }

    public function products(){

        if($this->useractive() != 'Active'){

            $initialmessage = 'Please contact admin to activate your account.';

            return view('profile', ['initialmessage' => $initialmessage]);

        }else{

        	$products = DB::table('shopproducts')->get();

        	return view('products',['products' => $products]);

        }
    }

    public function editproduct(){

    	return view('editproduct');
    }

    public function newstock(){

        if($this->useractive() != 'Active'){

            $initialmessage = 'Please contact admin to activate your account.';

            return view('profile', ['initialmessage' => $initialmessage]);

        }else{

        	$products = DB::table('shopproducts')->groupBy('productname')->get();

        	$brands = DB::table('shopproducts')->groupBy('brand')->get();

        	$packagings = DB::table('shopproducts')->groupBy('packaging')->get();

        	$sizes = DB::table('shopproducts')->groupBy('size')->get();

        	$categorys = DB::table('productcategory')->get();



        	return view('newstock', ['products' => $products, 'brands' => $brands, 'packagings' => $packagings, 'categorys' => $categorys, 'sizes' => $sizes]);

        }
    }

    public function productloanrequest(){

        if($this->useractive() != 'Active'){

            $initialmessage = 'Please contact admin to activate your account.';

            return view('profile', ['initialmessage' => $initialmessage]);

        }else{

        	$products = DB::table('shopproducts')->where('quantity', '>', 0)->get();

        	return view('productloanrequest', ['products' => $products]);

        }
    }

    public function createcategory(Request $request){

    	$validator = Validator::make($request->all(), [

    		'category' => 'required'
    	]); 

    	if($validator->passes()){

    		$category = $request->category;

    		$newrecord = DB::table('productcategory')
    						->updateOrInsert(
						        ['id' => $request->catid],
						        ['category' => $request->category, 'numberofproducts' => 0, 'created_by' => Auth::user()->id, 'created_at' => date('Y-m-d H:i:s')]
						    );

			if($newrecord){

				//update shop products to reflect category update
				$shopproducts = DB::table('shopproducts')
								->where('category', $request->oldcategory)
								->update(['category' => $request->category]);

				//update shop sales to reflect category update
				$shopsales = DB::table('shopsales')
								->where('category', $request->oldcategory)
								->update(['category' => $request->category]);

				//update shop stock to reflect category update
				$shopsales = DB::table('newstock')
								->where('category', $request->oldcategory)
								->update(['category' => $request->category]);


				return response()->json([
					'message' => 'Category successfully updated',
					'class_name' => 'alert-success',
					'category' => $request->category,
					'id' => $request->catid
				]);
			}

    	}else{

    		return response()->json([
    			'message' => $validator->errors()->all(),
    			'class_name' => 'alert-danger'
    		]);
    	}
    }


    public function getcategory(Request $request){

    	$category = DB::table('productcategory')->where('id', $request->id)->get();

    	return response()->json([
    		'category' => $category[0]->category,
    		'id' => $category[0]->id
    	]);
    }


    public static function getproductid($productname, $brandname, $quantity, $category, $packaging, $cashprice, $creditprice, $sizes, $comments){

    	$checkproduct = DB::table('shopproducts')
    					->where([
    								['productname', $productname],
    								['brand', $brandname],
    								['category', $category],
    								['packaging', $packaging],
    								['size', $sizes]
    							])->get();

    	if($checkproduct->count() == 1){

    		return $checkproduct[0]->id;
    	}else{

    		$data = array();

    		$data['productname'] = $productname;
    		$data['brand'] = $brandname;
    		$data['category'] = $category;
    		$data['packaging'] = $packaging;
    		$data['size'] = $sizes;
    		$data['quantity'] = 0;
    		$data['cashprice'] = 0.00;
    		$data['creditprice'] = 0.00;
    		$data['comment'] = $comments;
    		$data['created_by'] = Auth::user()->id;
    		$data['created_at'] = date('Y-m-d H:i:s');

    		$productid = DB::table('shopproducts')->insertGetId($data);

    		return $productid;
    	}

    }


    public function addnewproduct(Request $request){

    	$validator = Validator::make($request->all(), [

    		'productname' => 'required',
    		'brandname' => 'required',
    		'quantity' => 'required',
    		'category' => 'required',
    		'packaging' => 'required',
    		'cashprice' => 'required',
    		'creditprice' => 'required',

    	]);


    	if($validator->passes()){

    		$productname = $request->productname;
	    	$brandname = $request->brandname;
	    	$quantity = $request->quantity;
	    	$category = $request->category;
	    	$packaging = $request->packaging;
	    	$cashprice = $request->cashprice;
	    	$creditprice = $request->creditprice;
	    	$sizes = $request->sizes;
	    	$comments = $request->comments;

	    	$productid = $this->getproductid($productname, $brandname, $quantity, $category, $packaging, $cashprice, $creditprice, $sizes, $comments);

	    	$data = array();

	    	$data['productid'] = $productid;
    		$data['productname'] = $productname;
    		$data['brand'] = $brandname;
    		$data['category'] = $category;
    		$data['packaging'] = $packaging;
    		$data['size'] = $sizes;
    		$data['quantity'] = $quantity;
    		$data['cashprice'] = $cashprice;
    		$data['creditprice'] = $creditprice;
    		$data['comment'] = $comments;
    		$data['created_by'] = Auth::user()->id;
    		$data['created_at'] = date('Y-m-d H:i:s');

    		$newstock = DB::table('newstock')->insert($data);

    		if($newstock){

    			$updateproduct = DB::table('shopproducts')
    						->where('id', $productid)
    						->increment('quantity', $quantity);

    			$updateproduct = DB::table('shopproducts')
    						->where('id', $productid)
    						->update(['cashprice' => $cashprice]);

    			$updateproduct = DB::table('shopproducts')
    						->where('id', $productid)
    						->update(['creditprice' => $creditprice]);

                $updateproduct = DB::table('shopproducts')
                            ->where('id', $productid)
                            ->update(['comment' => $comments]);

    			$updatecategory = DB::table('productcategory')
    						->where('category', $category)
    						->increment('numberofproducts');

    			return response()->json([
    				'message' => 'New Product successfully added to the database',
    				'class_name' => 'alert-success'
    			]);
    		}
    	}
    }


    public function getproduct(Request $request){
        
        if($request->type == "Cash Sales"){
            $price = DB::table('shopproducts')->where('id', $request->product)->value('cashprice');
        }else if($request->type == "Credit Sales"){
            $price = DB::table('shopproducts')->where('id', $request->product)->value('creditprice');
        }
    	

    	return response()->json([
    		'price' => $price
    	]);
    }


    public static function createshoploanrequest($ippis, $name, $accounttype, $selecteditems, $tenure, $totalamount, $nonmemberextrafee, $payableamount, $monthlyamount, $comments){

    	/*$checkloan = DB::table('productrequest')
    					->where([
    								['ippisnumber', $ippis], 
    								['status', 'Repayment in Progress']

    							])->get();

    	if($checkloan->count() == 1){

    		$loanamount = $checkloan[0]->loanamount;
    		$duration = $checkloan[0]->duration;
    		$monthlyamount = $checkloan[0]->monthlyamount;
    		$totalrepay = $checkloan[0]->totalrepay;
    		$monthcompleted = $checkloan[0]->monthscompleted;
    		$nonmemberfee = $checkloan[0]->nonmemberfee;
    		$payableamounts = $checkloan[0]->payableamount;

    		$newpayableamount = $payableamounts + $payableamount;
    		
    		$newloanmount = $loanamount + $totalamount;
    		
    		$newnonmemberfee = $nonmemberfee + $nonmemberextrafee;
    		
    		$balance = $payableamounts - $totalrepay;

    		$newamount = $balance + $payableamount;

    		$remainingmonth = $duration - $monthcompleted;

    		$newduration = $remainingmonth + $tenure;

    		$newmonthlyamount = $newamount / $newduration;

    		$update = DB::table('productrequest')
    					->where([
    								['ippisnumber', $ippis], 
    								['status', 'Repayment in Progress']

    							])
    					->update([
    								'loanamount' => $newamount,
    								'duration' => $newduration,
    								'monthlyamount' => $newmonthlyamount
    							]);

    		$loanid = $checkloan[0]->id;

    	}else{*/

    		$data = array();

    		$data['ippisnumber'] = $ippis;
    		$data['name'] = $name;
    		$data['accounttype'] = $accounttype;
    		$data['numberofitems'] = $selecteditems;
    		$data['loanamount'] = $totalamount;
    		$data['duration'] = $tenure;
    		$data['nonmemberfee'] = $nonmemberextrafee;
    		$data['payableamount'] = $payableamount;
    		$data['monthlyamount'] = $monthlyamount;
    		$data['status'] = 'Repayment in Progress';
    		$data['comments'] = $comments;
    		$data['totalrepay'] = 0.00;
    		$data['monthscompleted'] = 0;
    		$data['created_at'] = date('Y-m-d H:i:s');

    		$loanid = DB::table('productrequest')->insertGetId($data);

    	//}

    	return $loanid;
    }


    public function submitshoploanrequest(Request $request){

    	$validator = Validator::make($request->all(), [

    		'ippis' => 'required',
    		'name' => 'required',
    		'accounttype' => 'required',
    		'selecteditems' => 'required',
    		'tenure' => 'required',
    		'totalamount' => 'required',
    		'monthlyamount' => 'required',
    		'nonmemberextrafee' => 'required',
    		'payableamount' => 'required',

    	]);

    	if($validator->passes()){

    		$ippis = $request->ippis;
	    	$name = $request->name;
	    	$accounttype = $request->accounttype;
	    	$selecteditems = $request->selecteditems;
	    	$tenure = $request->tenure;
	    	$totalamount = $request->totalamount;
	    	$monthlyamount = $request->monthlyamount;
	    	$comments = $request->comments;
	    	$nonmemberextrafee = $request->nonmemberextrafee;
	    	$payableamount = $request->payableamount;


	    	$loanid = $this->createshoploanrequest($ippis, $name, $accounttype, $selecteditems, $tenure, $totalamount, $nonmemberextrafee, $payableamount, $monthlyamount, $comments);

	    	for($i=0; $i<$selecteditems; $i++){

                $productcontents = explode(" ", $request->products[$i]);
                $productid = $productcontents[0];
                //dd($productid);

	    		$data = array();

	    		$data['loanid'] = $loanid;
	    		$data['productids'] = $productid;
	    		$data['ippisnumber'] = $ippis;
	    		$data['productnames'] = $request->products[$i];
	    		$data['quantities'] = $request->quantity[$i];
	    		$data['unitprices'] = $request->unitprice[$i];
	    		$data['totalprices'] = $request->totalprice[$i];
	    		$data['created_by'] = Auth::user()->id;
	    		$data['created_at'] = date('Y-m-d H:i:s');

	    		$productrequest = DB::table('productloanrequest')->insert($data);

	    		if($productrequest){

	    			$shopupdate = DB::table('shopproducts')
	    						->where('id', $request->products[$i])
	    						->decrement('quantity', $request->quantity[$i]);
	    		}

	    	}

	    	return response()->json([
	    		'message' => 'Shop loan successfully created',
	    		'class_name' => 'alert-success'
	    	]);

	    	

    	}else{

    		return response()->json([
    			'message' => $validator->errors()->all(),
    			'class_name' => 'alert-danger'
    		]);
    	}
    }


    public function shopsales(Request $request){

        if($this->useractive() != 'Active'){

            $initialmessage = 'Please contact admin to activate your account.';

            return view('profile', ['initialmessage' => $initialmessage]);

        }else{

        	$products = DB::table('shopproducts')->where('quantity', '>', 0)->get();

        	return view('shopsales', ['products' => $products]);

        }
    }


    public function submitshopsales(Request $request){

    	//dd($request);

    	for($i=0; $i<$request->selecteditems; $i++){

            $productdetails = explode(" ", $request->products[$i]);
            $productid = $productdetails[0];

    		$productdetails = $this->getproductdetails($productid);

			$data = array();

    		$data['productid'] = $productid;
    		$data['productname'] = $productdetails[0];
    		$data['brandname'] = $productdetails[1];
    		$data['size'] = $productdetails[2];
    		$data['category'] = $productdetails[3];
    		$data['quantity'] = $request->quantity[$i];
    		$data['unitprice'] = $request->unitprice[$i];
    		$data['totalprice'] = $request->totalprice[$i];
    		$data['comment'] = $request->comment;
    		$data['amountpaid'] = $request->totalprice[$i];
    		$data['paymentstatus'] = 'Confirmed';
    		$data['paymentmethod'] = 'Cash';
    		$data['created_by'] = Auth::user()->id;
    		$data['created_at'] = date('Y-m-d H:i:s');

    		$newsales = DB::table('shopsales')->insert($data);

    		if($newsales){

    			$shopupdate = DB::table('shopproducts')
    						->where('id', $productid)
    						->decrement('quantity', $request->quantity[$i]);

    		}

    	}

    	return response()->json([
    				'message' => 'Sales successfully updated',
    				'class_name' => 'alert-success'
    			]);
    }


    public function getquantity(Request $request){

    	$availablequantity = DB::table('shopproducts')->where('id', $request->product)->value('quantity');

    	if($availablequantity >= $request->quantity){

    		return response()->json([
    			'message' => 'true'
    		]);

    	}else{

    		return response()->json([
    			'message' => $availablequantity
    		]);
    	}
    }


    public function productreport(Request $request){

        if($this->useractive() != 'Active'){

            $initialmessage = 'Please contact admin to activate your account.';

            return view('profile', ['initialmessage' => $initialmessage]);

        }else{

            $products = DB::table('productrequest')->where('ippisnumber', Auth::user()->ippisnumber)->get();

            $loanamount = DB::table('productrequest')->where('ippisnumber', Auth::user()->ippisnumber)->sum('loanamount');

            $totalrepay = DB::table('productrequest')->where('ippisnumber', Auth::user()->ippisnumber)->sum('totalrepay');

            return view('productreport', ['products' => $products, 'loanamount' => $loanamount, 'totalrepay' => $totalrepay]);

        }
    }


    public function adminproductreport(Request $request){

        if($this->useractive() != 'Active'){

            $initialmessage = 'Please contact admin to activate your account.';

            return view('profile', ['initialmessage' => $initialmessage]);

        }else{

            $products = DB::table('productrequest')->get();

            $loanamount = DB::table('productrequest')->sum('loanamount');

            $totalrepay = DB::table('productrequest')->sum('totalrepay');

            return view('productreport', ['products' => $products, 'loanamount' => $loanamount, 'totalrepay' => $totalrepay]);

        }

    }

    public function productdetails(Request $request){

        if($this->useractive() != 'Active'){

            $initialmessage = 'Please contact admin to activate your account.';

            return view('profile', ['initialmessage' => $initialmessage]);

        }else{

            $product = DB::table('productrequest')->where('id', $request->product)->get();

            $items = DB::table('productloanrequest')->where('loanid', $request->product)->get();

            $productrepays = DB::table('productloanrepay')->where('productloanid', $request->product)->get();

            return view('productdetails', ['product' => $product, 'items' => $items, 'productrepays' => $productrepays]);

        }
    }


    public function updateshoploanrequest(Request $request){


            $ippis = $request->ippis;
            $name = $request->name;
            $accounttype = $request->accounttype;
            $selecteditems = $request->selecteditems;
            $tenure = $request->tenure;
            $totalamount = $request->totalamount;
            $monthlyamount = $request->monthlyamount;
            $status = $request->status;
            $comments = $request->comments;


            $loanid = $request->id;

            $data = array();

            $data['ippisnumber'] = $ippis;
            $data['name'] = $name;
            $data['accounttype'] = $accounttype;
            $data['numberofitems'] = $selecteditems;
            $data['loanamount'] = $totalamount;
            $data['duration'] = $tenure;
            $data['monthlyamount'] = $monthlyamount;
            $data['status'] = $status;
            $data['comments'] = $comments;
            $data['updated_at'] = date('Y-m-d H:i:s');

            $productrequest = DB::table('productrequest')->where('id', $loanid)->update($data);

            if($productrequest){

                return response()->json([
                    'message' => 'Shop loan successfully updated',
                    'class_name' => 'alert-success'
                ]);
            }else{
                return response()->json([
                    'message' => 'Shop loan update failed',
                    'class_name' => 'alert-danger'
                ]);
            }

    }


    public function shoploanrepayment(Request $request){

        if($this->useractive() != 'Active'){

            $initialmessage = 'Please contact admin to activate your account.';

            return view('profile', ['initialmessage' => $initialmessage]);

        }else{

            $payments = DB::table('productloanrepay')
                            ->where('ippisnumber', Auth::user()->ippisnumber)
                            ->get();

            $total = DB::table('productloanrepay')
                            ->where('ippisnumber', Auth::user()->ippisnumber)
                            ->sum('amount');

            return view('shoploanrepayment', ['payments' => $payments, 'total' => $total]);

        }
    }


    public function adminshoploanrepayment(Request $request){

        if($this->useractive() != 'Active'){

            $initialmessage = 'Please contact admin to activate your account.';

            return view('profile', ['initialmessage' => $initialmessage]);

        }else{

            $payments = DB::table('productloanrepay')
                            ->get();

            $total = DB::table('productloanrepay')
                            ->sum('amount');

            return view('adminshoploanrepayment', ['payments' => $payments, 'total' => $total]);

        }
    }
}
