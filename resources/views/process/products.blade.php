<script>

	function isNumberKey(evt){
          var charCode = (evt.which) ? evt.which : evt.keyCode;
          if (charCode != 46 && charCode > 31 
            && (charCode < 48 || charCode > 57))
             return false;

          return true;
       }
       
    $("#accounttype").change(function(){
        var accounttype = $("#accounttype").val();
        var totalamount = $("#totalamount").val();
        
        if(accounttype == 'Non-Cooperative Member'){
            var nonmemberfee = totalamount * 0.05;
            var amountpayable = parseFloat(nonmemberfee) + parseFloat(totalamount);
            
            $("#nonmemberfee").html(nonmemberfee);
            $("#nonmemberextrafee").val(nonmemberfee);
            
            $("#amountpayable").html(amountpayable);
            $("#payableamount").val(amountpayable);
            
        }else if(accounttype == 'Cooperative Member'){
            $("#nonmemberfee").html('0.00');
            $("#nonmemberextrafee").val('0.00');
            
            $("#amountpayable").html(totalamount);
            $("#payableamount").val(totalamount);
        }else{
            $("#nonmemberfee").html('0.00');
            $("#nonmemberextrafee").val('0.00');
            
            $("#amountpayable").html('0.00');
            $("#payableamount").val('0.00');
        }
        
    });

	$("#processing").hide();
	$(".processing").hide();


	//process this when user click on pay
	  $(document).ready(function(){
	    $("#newcategory").on('submit', function(event){
	      event.preventDefault();
	      $.ajax({
	        type: 'POST',
	        url: 'createcategory',
	        data: new FormData(this),
	        contentType: false,
	        cache: false,
	        processData: false,
	        beforeSend:function(){
	                $("#button").hide();
	                $("#processing").show();
	            },
	        success: function(data){
	          
	          $("#message").css('display', 'block');
	          $("#message").html(data.message);
	          $("#message").removeClass('alert-success');
	          $("#message").removeClass('alert-danger');
	          $("#message").addClass(data.class_name);
	    	  $("#catname"+data.id).html(data.category);
              $("#button").show();
              $("#processing").hide();
	        
	        }
	      });
	    });



	    $("#newproduct").on('submit', function(event){
	      event.preventDefault();
	      $.ajax({
	        type: 'POST',
	        url: 'addnewproduct',
	        data: new FormData(this),
	        contentType: false,
	        cache: false,
	        processData: false,
	        beforeSend:function(){
	                $("#button").hide();
	                $("#processing").show();
	            },
	        success: function(data){
	          
	          $("#message").css('display', 'block');
	          $("#message").html(data.message);
	          $("#message").removeClass('alert-success');
	          $("#message").removeClass('alert-danger');
	          $("#message").addClass(data.class_name);
              $("#button").show();
              $("#processing").hide();
	        
	        }
	      });
	    });


	    $('.edit').click(function(event){
	 	event.preventDefault();
	    var id = $(this).attr('href');
	    $.ajax({
	    	url:"getcategory/?id="+id,
	    	beforeSend:function(){
	    		$("#button"+id).hide();
	            $("#processing"+id).show();
	    	},
	    	success:function(data){
	    		$("#category").val(data.category);
	    		$("#catid").val(data.id);
	    		$("#oldcategory").val(data.category);
	    		$("#catname"+id).html(data.category);


	    		$("#button"+id).show();
	            $("#processing"+id).hide();
	    	}
	    });
	  });
	  })


	  //additional month selection for monthly dues payment
  $(document).ready(function(){
    var i = 1;

    var total = 0;
    var sum = 0;


    $("#products1").change(function(){
      	var product = $("#products1").val();
      	var type = $("#request_type").val();
      	$.ajax({
      		url:"getproduct/?product="+product+"&type="+type,
      		success:function(data){
      			$("#unitprice1").val(data.price);
      		}
      	});
      });

    
    $("#quantity1").focusout(function(){
    	if($("#quantity1").val() != "" && $("#unitprice1").val() != "" && $("#products1").val() != ""){
	    	var totalprice1 = $("#quantity1").val() * $("#unitprice1").val();
		    total = totalprice1;
		    $("#totalprice1").val(totalprice1.toFixed(2));
		    $("#tamount").html(total.toFixed(2));
	      	$("#totalamount").val(total.toFixed(2));
		    $("#noofitems").html(1);
		    $("#selecteditems").val(1);
		}
    });


    $("#quantity1").focusout(function(){

      	var quantity = $("#quantity1").val();
      	var product = $("#products1").val();
      	$.ajax({
      		url:"getquantity/?quantity="+quantity+"&product="+product,
      		success:function(data){
      			if(data.message != 'true'){
      				Swal.fire({
				        title: "Limited Stock",
				        text: "The remaining stock "+data.message+" is lessthan the quantity "+quantity+" entered, please reduce the quantity",
				        buttonsStyling: false,
				        confirmButtonClass: "btn btn-info"
				      });
      				$("#quantity"+i).val(data.message);
      			}
      			
      		}
      	});
      });


    $("#unitprice1").focusout(function(){
    	if($("#quantity1").val() != "" && $("#unitprice1").val() != "" && $("#products1").val() != ""){
	    	var totalprice1 = $("#quantity1").val() * $("#unitprice1").val();
		    total = totalprice1;
		    $("#totalprice1").val(totalprice1.toFixed(2));
		    $("#tamount").html(total.toFixed(2));
	      	$("#totalamount").val(total.toFixed(2));
		    $("#noofitems").html(1);
		    $("#selecteditems").val(1);
		}
    });
    
     
    $('#addmore').click(function(){

    if($("#quantity"+i).val() != "" && $("#unitprice"+i).val() != "" && $("#products"+i).val() != ""){

    	i++;

      $("#moremonths").append('<div class="row" id="row'+i+'"><div class="col-md-4 pr-1"><div class="form-group"><label>Product</label><input type="text" list="selectproducts'+i+'" name="products[]" id="products'+i+'" class="form-control" placeholder="Product Name" data-product="'+i+'" required><datalist id="selectproducts'+i+'">@isset($products) @foreach($products as $product)<option>{{ $product->id }} - {{ $product->productname }}, ({{ $product->brand }}, {{ $product->size }} - {{ $product->category }})</option>@endforeach @endisset</datalist></div></div><div class="col-md-2 px-1"><div class="form-group"><label>Unit Price (NGN)</label><input type="text" name="unitprice[]" id="unitprice'+i+'" onkeypress="return isNumberKey(event)" data-price="'+i+'" class="form-control unitprices" placeholder="0.00"></div></div> <div class="col-md-2 px-1"><div class="form-group"><label>Quantity</label><input type="text" name="quantity[]" id="quantity'+i+'" onkeypress="return isNumberKey(event)" class="form-control quantities" data-quatity="'+i+'" placeholder="0"></div></div><div class="col-md-2 px-1"><div class="form-group"><label>Total Price (NGN)</label><input type="text" name="totalprice[]" id="totalprice'+i+'" onkeypress="return isNumberKey(event)" class="form-control" data-total="'+i+'" placeholder="0.00"></div></div><div class="col-md-2 pl-1"><div class="form-group"><br /><button type="button" class="btn btn-round btn-danger btn-remove" id="'+i+'">Remove</button></div></div></div>');
      
      //var totalprice = $("#quantity"+i).val() * $("#unitprice").val();

      $("#products"+i).change(function(){
      	var product = $("#products"+i).val();
      	var type = $("#request_type").val();
      	$.ajax({
      		url:"getproduct/?product="+product+"&type="+type,
      		success:function(data){
      			$("#unitprice"+i).val(data.price);
      		}
      	});
      });


      $("#quantity"+i).focusout(function(){
      	var quantity = $("#quantity"+i).val();
      	var product = $("#products"+i).val();
      	$.ajax({
      		url:"getquantity/?quantity="+quantity+"&product="+product,
      		success:function(data){
      			if(data.message != 'true'){
      				Swal.fire({
				        title: "Limited Stock",
				        text: "The remaining stock "+data.message+" is lessthan the quantity "+quantity+" entered, please reduce the quantity",
				        buttonsStyling: false,
				        confirmButtonClass: "btn btn-info"
				      });
      				$("#quantity"+i).val(data.message);
      			}
      			
      		}
      	});
      });


      $("#quantity"+i).focusout(function(){
      	if($("#quantity"+i).val() != "" && $("#unitprice"+i).val() != "" && $("#products"+i).val() != ""){
      		sum = $("#quantity"+i).val() * $("#unitprice"+i).val();
	      	$("#totalprice"+i).val(sum.toFixed(2));
	      	total = parseFloat(total) + parseFloat($("#totalprice"+i).val());
	      	$("#tamount").html(total.toFixed(2));
	      	$("#totalamount").val(total.toFixed(2));
	      	$("#noofitems").html(i);
		    $("#selecteditems").val(i);
      	}
      });

      $("#unitprice"+i).focusout(function(){
      	if($("#quantity"+i).val() != "" && $("#unitprice"+i).val() != "" && $("#products"+i).val() != ""){
      		sum = $("#quantity"+i).val() * $("#unitprice"+i).val();
	      	$("#totalprice"+i).val(sum.toFixed(2));
	      	total = parseFloat(total) + parseFloat($("#totalprice"+i).val());
	      	$("#tamount").html(total.toFixed(2));
	      	$("#totalamount").val(total.toFixed(2));
	      	$("#noofitems").html(i);
		    $("#selecteditems").val(i);
      	}
      });
      
      

  	}
      
    });



    $(document).on('click', '.btn-remove', function(){

        total = total - $("#totalprice"+i).val();
        $("#tamount").html(total.toFixed(2));
	    $("#totalamount").val(total.toFixed(2));
	    i--;
        $("#noofitems").html(i);
		$("#selecteditems").val(i);
        
        var button_id = $(this).attr("id");
        $('#row'+button_id+'').remove();

        
        });

    

  });


$("#tenure").change(function(){

	var tenure = $("#tenure").val();

	if(tenure != ""){

		var tamount = $("#amountpayable").html();
		$("#repayment").html((tamount/tenure).toFixed(2));
		$("#monthlyamount").val((tamount/tenure).toFixed(2));



	//process the loan request page
    var months = parseInt($("#tenure").val());
    @php $newdate = date('Y-m-d') @endphp
    @php $time = strtotime($newdate) @endphp
    @php $x=1 @endphp
    var monthamount = parseFloat($("#amountpayable").html()) / parseInt($("#tenure").val());
    var monthNames = ["January", "February", "March", "April", "May", "June",
      "July", "August", "September", "October", "November", "December"
    ];
    var weekday = ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"];
    $("#breakdown").html('<h3><strong>Repayment Breakdown</strong></h3><table id="breakdowndata" class="table table-striped table-bordered" cellspacing="0" width="100%"><thead><tr><th>Due Date</th><th>Repayment Amount (NGN)</th></tr></thead><tbody></tbody></table>');
    var d = new Date(); // January 1, 2000
    if(d.getDate() <= 15){
      for(var i=1; i<=months; i++){
        var d = new Date(); // January 1, 2000
        d.setMonth(d.getMonth() + i);
        d = new Date(d.getFullYear(), d.getMonth(), 0);
        $("#breakdowndata").append('<tr><td>'+weekday[d.getDay()]+' '+d.getDate()+' '+monthNames[d.getMonth()]+', '+d.getFullYear()+'</td><td>NGN'+monthamount.toFixed(2)+'</td></tr>');


      }
    }else{
        for(var i=2; i<=months+1; i++){
          var d = new Date(); // January 1, 2000
          d.setMonth(d.getMonth() + i);
          d = new Date(d.getFullYear(), d.getMonth(), 0);
          $("#breakdowndata").append('<tr><td>'+weekday[d.getDay()]+' '+d.getDate()+' '+monthNames[d.getMonth()]+', '+d.getFullYear()+'</td><td>NGN'+monthamount.toFixed(2)+'</td></tr>');


        }
    }

	}

});



	$("#shoploanrequest").on('submit', function(event){
	      event.preventDefault();
	      $.ajax({
	        type: 'POST',
	        url: 'submitshoploanrequest',
	        data: new FormData(this),
	        contentType: false,
	        cache: false,
	        processData: false,
	        beforeSend:function(){
	                $("#button").hide();
	                $("#processing").show();
	            },
	        success: function(data){
	          
	          $("#message").css('display', 'block');
	          $("#message").html(data.message);
	          $("#message").removeClass('alert-success');
	          $("#message").removeClass('alert-danger');
	          $("#message").addClass(data.class_name);
              $("#button").show();
              $("#processing").hide();
	        
	        }
	      });
	    });



	$("#shopsalesid").on('submit', function(event){
	      event.preventDefault();
	      $.ajax({
	        type: 'POST',
	        url: 'submitshopsales',
	        data: new FormData(this),
	        contentType: false,
	        cache: false,
	        processData: false,
	        beforeSend:function(){
	                $("#button").hide();
	                $("#processing").show();
	            },
	        success: function(data){
	          
	          $("#message").css('display', 'block');
	          $("#message").html(data.message);
	          $("#message").removeClass('alert-success');
	          $("#message").removeClass('alert-danger');
	          $("#message").addClass(data.class_name);
              $("#button").show();
              $("#processing").hide();
	        
	        }
	      });
	    });



	$("#shoploanupdate").on('submit', function(event){
	      event.preventDefault();
	      $.ajax({
	        type: 'POST',
	        url: 'updateshoploanrequest',
	        data: new FormData(this),
	        contentType: false,
	        cache: false,
	        processData: false,
	        beforeSend:function(){
	                $("#button").hide();
	                $("#processing").show();
	            },
	        success: function(data){
	          
	          $("#message").css('display', 'block');
	          $("#message").html(data.message);
	          $("#message").removeClass('alert-success');
	          $("#message").removeClass('alert-danger');
	          $("#message").addClass(data.class_name);
              $("#button").show();
              $("#processing").hide();
	        
	        }
	      });
	    });



	@isset($productrepays)

    $("#breakdown").html('<h3><strong>Repayment Breakdown</strong></h3><table id="breakdowndata" class="table table-striped table-bordered" cellspacing="0" width="100%"><thead><tr><th>Month</th><th>Repaid Amount (NGN)</th></tr></thead><tbody></tbody></table>');
    
        $("#breakdowndata").html('@foreach($productrepays as $productrepay)<tr><td>{{ $productrepay->month }}</td><td>NGN{{ $productrepay->amount }}</td></tr>@endforeach');

  	@endisset
	

	
</script>