<script>


	function isNumberKey(evt)
       {
          var charCode = (evt.which) ? evt.which : evt.keyCode;
          if (charCode != 46 && charCode > 31 
            && (charCode < 48 || charCode > 57))
             return false;

          return true;
       }

	$("#processing").hide();


	//process this when user click on pay
	  $(document).ready(function(){
	    $("#createrole").on('submit', function(event){
	      event.preventDefault();
	      $.ajax({
	        type: 'POST',
	        url: 'submitrole',
	        data: new FormData(this),
	        contentType: false,
	        cache: false,
	        processData: false,
	        beforeSend:function(){
	                $("#button").hide();
	                $("#processing").show();
	            },
	        success: function(data){
	          
	          Swal.fire({
		        title: "Success!",
		        text: "Role have been updated successfully!",
		        buttonsStyling: false,
		        confirmButtonClass: "btn btn-success",
		        type: "success"
		      });
	        	
	        	location.reload();
	        }
	      });
	    });
	  })


	  $(".edit").click(function(event){

	  	event.preventDefault();
	    var id = $(this).attr('href');
	    $.ajax({
	    	url:"fetchrole/?id="+id,
	    	beforeSend:function(){
	    		$("#button").hide();
	            $("#processing").show();
	    	},
	    	success:function(data){
	    		$("#id").val(data.id);
	    		$("#role").val(data.role);

	    		$("#button").show();
	            $("#processing").hide();
	    	}
	    });

	  });


	  $(".remove").click(function(event){

	  	event.preventDefault();
	    var id = $(this).attr('href');
	    $.ajax({
	    	url:"deleterole/?id="+id,
	    	beforeSend:function(){
	    		$("#button").hide();
	            $("#processing").show();
	    	},
	    	success:function(data){

	    		if(data.status == 'success'){

	    			Swal.fire({
				        title: "Success!",
				        text: "Role have been deleted successfully!",
				        buttonsStyling: false,
				        confirmButtonClass: "btn btn-success",
				        type: "success"
				      });
			        	
			        location.reload();

	    		}else{

	    			wal.fire({
				        title: "Error!",
				        text: "Role deleting failed!",
				        buttonsStyling: false,
				        confirmButtonClass: "btn btn-danger",
				        type: "error"
				      });
			        	
			        location.reload();

	    		}

	    		$("#button").show();
	            $("#processing").hide();
	    	}
	    });

	  });


	  

	  $("#loantypse").change(function(){
	  	
	  	var loantype = $("#loantypse").val();
	  	var ippis = $("#ippis").val();

	  	//alert(loantype);
	  	$.ajax({
	  		url:'getmaxduration/?loantype='+loantype+'&ippis='+ippis,
	  		success:function(data){
	  			/*for(var i=1; i<=data.duration; i++){

	  				$('#duration').append('<option value="'+i+'">'+i+'</option>');
	  			}*/
	  			
	  			$('#amounts').val(data.allowed.toFixed(2));
	  			$('#qualified').val(data.allowed.toFixed(2));
	  			$('#adminfeeper').val(data.adminfee);
	  			

	  		}
	  	});

	  	
	  });


	  $("#amounts").focusout(function(){
	  	
	  	var amount = $("#amounts").val();
	  	var qualified = $("#qualified").val();
	  	var loantypse = $("#loantypse").children("option:selected").text();
	  	

	  	if(amount > qualified){
	  		Swal.fire({
		        title: "Attention!",
		        text: "Based on your cooperative savings, you are not allowed to take morethan NGN"+qualified+" of "+loantypse,
		        buttonsStyling: false,
		        confirmButtonClass: "btn btn-info",
		        type: "info"
		      });
	  		$("#amounts").val(150000);
	  		
	  	}



	  	var amount = $("#amounts").val();
	  	var adminfee = $("#adminfeeper").val();

	  	var adminfeecalc = (adminfee / 100) * amount;

	  	$("#adminfee").html(adminfeecalc.toFixed(2));
	  	$("#adminfeeamount").val(adminfeecalc.toFixed(2));

	  });



	  $("#runningloandiv").hide();

	  $("#runningloan").change(function(){
	  	var runningloan = $("#runningloan").val();

	  	if(runningloan == 'Yes'){
	  		$("#runningloandiv").show();
	  	}else{
	  		$("#runningloandiv").hide();
	  	}
	  });



	//process the loan request page
    $("#duration").change(function(){
    if($("#duration").val() != ''){
    var months = parseInt($("#duration").val());
    @php $newdate = date('Y-m-d') @endphp
    @php $time = strtotime($newdate) @endphp
    @php $x=1 @endphp
    var monthamount = parseFloat($("#amounts").val()) / parseInt($("#duration").val());
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



  //process the loan request page
    $("#amounts").focusout(function(){
    if($("#duration").val() != ''){
    var months = parseInt($("#duration").val());
    @php $newdate = date('Y-m-d') @endphp
    @php $time = strtotime($newdate) @endphp
    @php $x=1 @endphp
    var monthamount = parseFloat($("#amounts").val()) / parseInt($("#duration").val());
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


  @isset($loanrepayments)

    $("#breakdown").html('<h3><strong>Repayment Breakdown</strong></h3><table id="breakdowndata" class="table table-striped table-bordered" cellspacing="0" width="100%"><thead><tr><th>Month</th><th>Repaid Amount (NGN)</th></tr></thead><tbody></tbody></table>');
    
        $("#breakdowndata").html('@foreach($loanrepayments as $loanrepayment)<tr><td>{{ $loanrepayment->month }}</td><td>NGN{{ $loanrepayment->amount }}</td></tr>@endforeach');

  @endisset



	  $("#privilege").on('submit', function(event){
	      event.preventDefault();
	      
	      $.ajax({
	        type: 'POST',
	        url: 'submitprivilege',
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



	  $("#loanapplicationupdate").on('submit', function(event){
	      event.preventDefault();
	      
	      $.ajax({
	        type: 'POST',
	        url: 'updateloanrequest',
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


	  $("#checkall").click(function(){
	  	if($(this).prop("checked") == true){
                $('input[type="checkbox"]').prop("checked", true);
            }else{
            	$('input[type="checkbox"]').prop("checked", false);
            }
	  });

</script>