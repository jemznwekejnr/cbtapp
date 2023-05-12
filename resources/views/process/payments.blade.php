<script>
    
    function isNumberKey(evt)
       {
          var charCode = (evt.which) ? evt.which : evt.keyCode;
          if (charCode != 46 && charCode > 31 
            && (charCode < 48 || charCode > 57))
             return false;

          return true;
       }

    $("#location").hide();
    $("#messages").hide();
    $("#payproof").hide();
    $("#paystackpay").hide();
    $("#payment").hide();
    $("#lga").hide();
    $("#ward").hide();
    $("#specifyward").hide();
    
    $("#participant").change(function(){
        var participant =  $("#participant").val();
        if(participant == "State"){
            $("#location").show();
            $("#lga").hide();
            $("#ward").hide();
            $("#payment").show();
            $("#messages").show();
            $("#message").addClass('alert alert-info')
            $("#message").html("You are entitled to 30 slots from your state, the participation fee for this 30 persons is &#x20A6;500,000.00 aside this 30 slots any additional slot will cost extra &#x20A6;3000.00 per slot.");
            $("#noofparticipants").val(30);
            $("#payamount").html("&#x20A6;500,000.00");
            $("#amountpay").val(500000);
            $("#noofparticipants").focusout(function(){
                if($("#noofparticipants").val() < 30){
                    Swal.fire({
                    title: "Incomplete Participants",
                    text: "Number of participants for state cannot be below 30",
                    buttonsStyling: false,
                    confirmButtonClass: "btn btn-danger",
                    type: "danger"
                  });
                  $("#noofparticipants").val(30);
                  $("#payamount").html("&#x20A6;500,000.00");
                  $("#amountpay").val(500000);
                }else if($("#noofparticipants").val() > 30){
                    var remainder = $("#noofparticipants").val() - 30;
                    var extraamount = remainder * 3000;
                    var newamount = extraamount + 500000;
                    $("#payamount").html('&#x20A6;' + parseFloat(newamount, 10).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,").toString());
                    $("#amountpay").val(newamount);
                }else{
                    $("#noofparticipants").val(30);
                    $("#payamount").html("&#x20A6;500,000.00");
                    $("#amountpay").val(500000);
                }
            });
        }else if(participant == "LGA"){
            $("#location").show();
            $("#lga").show();
            $("#ward").show();
            $("#payment").show();
            $("#messages").show();
            $("#message").addClass('alert alert-info')
            $("#message").html("You are entitled to 30 slots from your local government, the participation fee for this 30 persons is &#x20A6;200,000.00 aside this 30 slots any additional slot will cost extra &#x20A6;3000.00 per slot.");
            $("#noofparticipants").val(30);
            $("#payamount").html("&#x20A6;200,000.00");
            $("#amountpay").val(200000);
            $("#noofparticipants").focusout(function(){
                if($("#noofparticipants").val() < 30){
                    Swal.fire({
                    title: "Incomplete Participants",
                    text: "Number of participants for state cannot be below 30",
                    buttonsStyling: false,
                    confirmButtonClass: "btn btn-danger",
                    type: "danger"
                  });
                  $("#noofparticipants").val(30);
                  $("#payamount").html("&#x20A6;200,000.00");
                  $("#amountpay").val(200000);
                }else if($("#noofparticipants").val() > 30){
                    var remainder = $("#noofparticipants").val() - 30;
                    var extraamount = remainder * 3000;
                    var newamount = extraamount + 200000;
                    $("#payamount").html('&#x20A6;' + parseFloat(newamount, 10).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,").toString());
                    $("#amountpay").val(newamount);
                }else{
                    $("#noofparticipants").val(30);
                    $("#payamount").html("&#x20A6;200,000.00");
                    $("#amountpay").val(200000);
                }
            });
        }else if(participant == "BDSP"){
            $("#location").hide();
            $("#lga").hide();
            $("#ward").hide();
            $("#payment").show();
            $("#messages").show();
            $("#message").addClass('alert alert-info')
            $("#message").html("Participation fee for BDSP is &#x20A6;7,500.00 per slot.");
            $("#noofparticipants").val(1);
            $("#payamount").html("&#x20A6;7,500.00");
            $("#amountpay").val(7500);
            $("#noofparticipants").focusout(function(){
                if($("#noofparticipants").val() < 1){
                    Swal.fire({
                    title: "Incomplete Participants",
                    text: "Number of participants for state cannot be below 1",
                    buttonsStyling: false,
                    confirmButtonClass: "btn btn-danger",
                    type: "danger"
                  });
                  $("#noofparticipants").val(1);
                  $("#payamount").html("&#x20A6;7,500.00");
                  $("#amountpay").val(7500);
                }else if($("#noofparticipants").val() > 1){
                    var remainder = $("#noofparticipants").val() - 1;
                    var extraamount = remainder * 7500.00;
                    var newamount = extraamount + 7500.00;
                    $("#payamount").html('&#x20A6;' + parseFloat(newamount, 10).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,").toString());
                    $("#amountpay").val(newamount);
                }else{
                    $("#noofparticipants").val(1);
                    $("#payamount").html("&#x20A6;7,500.00");
                    $("#amountpay").val(7500);
                }
            });
        }else if(participant == "CSO" || participant == "NGO" || participant == "CBO"){
            $("#location").hide();
            $("#lga").hide();
            $("#ward").hide();
            $("#payment").show();
            $("#messages").show();
            $("#message").addClass('alert alert-info')
            $("#message").html("Participation fee for "+participant+" is &#x20A6;5,000.00 per slot.");
            $("#noofparticipants").val(1);
            $("#payamount").html("&#x20A6;5,000.00");
            $("#amountpay").val(5000);
            $("#noofparticipants").focusout(function(){
                if($("#noofparticipants").val() < 1){
                    Swal.fire({
                    title: "Incomplete Participants",
                    text: "Number of participants for state cannot be below 1",
                    buttonsStyling: false,
                    confirmButtonClass: "btn btn-danger",
                    type: "danger"
                  });
                  $("#noofparticipants").val(1);
                  $("#payamount").html("&#x20A6;5,000.00");
                  $("#amountpay").val(5000);
                }else if($("#noofparticipants").val() > 1){
                    var remainder = $("#noofparticipants").val() - 1;
                    var extraamount = remainder * 5000.00;
                    var newamount = extraamount + 5000.00;
                    $("#payamount").html('&#x20A6;' + parseFloat(newamount, 10).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,").toString());
                    $("#amountpay").val(newamount);
                }else{
                    $("#noofparticipants").val(1);
                    $("#payamount").html("&#x20A6;5,000.00");
                    $("#amountpay").val(5000);
                }
            });
        }else if(participant == "Advertiser"){
            $("#location").hide();
            $("#lga").hide();
            $("#ward").hide();
            $("#payment").show();
            $("#messages").show();
            $("#message").addClass('alert alert-info')
            $("#message").html("Participation fee for "+participant+" is &#x20A6;2,700.00 per slot.");
            $("#noofparticipants").val(1);
            $("#payamount").html("&#x20A6;2,700.00");
            $("#amountpay").val(2700);
            $("#noofparticipants").focusout(function(){
                if($("#noofparticipants").val() < 1){
                    Swal.fire({
                    title: "Incomplete Participants",
                    text: "Number of participants for state cannot be below 1",
                    buttonsStyling: false,
                    confirmButtonClass: "btn btn-danger",
                    type: "danger"
                  });
                  $("#noofparticipants").val(1);
                  $("#payamount").html("&#x20A6;2,700.00");
                  $("#amountpay").val(2700);
                }else if($("#noofparticipants").val() > 1){
                    var remainder = $("#noofparticipants").val() - 1;
                    var extraamount = remainder * 2700.00;
                    var newamount = extraamount + 2700.00;
                    $("#payamount").html('&#x20A6;' + parseFloat(newamount, 10).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,").toString());
                    $("#amountpay").val(newamount);
                }else{
                    $("#noofparticipants").val(1);
                    $("#payamount").html("&#x20A6;2,700.00");
                    $("#amountpay").val(2700);
                }
            });
        }else if(participant == "Sponsor"){
            $("#location").hide();
            $("#lga").hide();
            $("#ward").hide();
            $("#payment").show();
            $("#messages").show();
            $("#message").addClass('alert alert-info')
            $("#message").html("Participation fee for "+participant+" is &#x20A6;25,000.00 per slot.");
            $("#noofparticipants").val(1);
            $("#payamount").html("&#x20A6;25,000.00");
            $("#amountpay").val(25000);
            $("#noofparticipants").focusout(function(){
                if($("#noofparticipants").val() < 1){
                    Swal.fire({
                    title: "Incomplete Participants",
                    text: "Number of participants for state cannot be below 1",
                    buttonsStyling: false,
                    confirmButtonClass: "btn btn-danger",
                    type: "danger"
                  });
                  $("#noofparticipants").val(1);
                  $("#payamount").html("&#x20A6;25,000.00");
                  $("#amountpay").val(25000);
                }else if($("#noofparticipants").val() > 1){
                    var remainder = $("#noofparticipants").val() - 1;
                    var extraamount = remainder * 25000.00;
                    var newamount = extraamount + 25000.00;
                    $("#payamount").html('&#x20A6;' + parseFloat(newamount, 10).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,").toString());
                    $("#amountpay").val(newamount);
                }else{
                    $("#noofparticipants").val(1);
                    $("#payamount").html("&#x20A6;25,000.00");
                    $("#amountpay").val(25000);
                }
            });
        }else{
            $("#location").hide();
            $("#payment").hide();
        }
    });
    
    
    $("#paymentmethod").change(function(){
        var paymentmethod = $("#paymentmethod").val();
        if(paymentmethod == "Manual Payment"){
            $("#paystackpay").hide();
            $("#payproof").show();
        }else if(paymentmethod == "Card Payment"){
            $("#payproof").hide();
            $("#paystackpay").show();
        }else{
            $("#payproof").hide();
            $("#paystackpay").hide();
        }
    });
    
    
    $("#lgas").change(function(){
        var lgas = $("#lgas").val();
        $.ajax({
          type: 'GET',
          url: '{{ url("lgaward?lgas=") }}'+lgas,
          beforeSend:function(){
	                $("#button").hide();
	                $("#processing").show();
	            },
          success: function(data){
              
              $("#wards").find('option').remove().end();
               $("#wards").append('<option value"">Select Ward</option>');
              jQuery.each( data.wards, function( i, val ) {
                  $("#wards").append('<option>'+val.ward+'</option>');
                });
                $("#wards").append('<option>NOT HERE?</option>');
              $("#button").show();
              $("#processing").hide();
	        
	        }
       });
    });
    
    
    
    $("#wards").change(function(){
       var wards = $("#wards").val();
       if(wards == 'NOT HERE?'){
           $("#specifyward").show();
       }else{
           $("#specifyward").hide();
       }
    });
    
    
    $("#processing").hide();
    
    /*************** fetch states by zone ***********************************/
    
    $("#geozone").change(function(){
       var geozone = $("#geozone").val();
       $.ajax({
          type: 'GET',
          url: '{{ url("zonestates?zone=") }}'+geozone,
          beforeSend:function(){
	                $("#button").hide();
	                $("#processing").show();
	            },
          success: function(data){
              
              $("#states").find('option').remove().end();
              $("#lgas").find('option').remove().end();
              $("#wards").find('option').remove().end();
               $("#states").append('<option value"">Select State</option>');
               $("#lgas").append('<option value"">Select LGA</option>');
               $("#wards").append('<option value"">Select Ward</option>');
              jQuery.each( data.states, function( i, val ) {
                  $("#states").append('<option>'+val.state+'</option>');
                });
              $("#button").show();
              $("#processing").hide();
	        
	        }
       });
    });
    
    
    /******************** fetch local governments ****************************/
    
    $("#states").change(function(){
       var states = $("#states").val();
       $.ajax({
          type: 'GET',
          url: '{{ url("stateslga?states=") }}'+states,
          beforeSend:function(){
	                $("#button").hide();
	                $("#processing").show();
	            },
          success: function(data){
              
              $("#lgas").find('option').remove().end();
              $("#wards").find('option').remove().end();
               $("#lgas").append('<option value"">Select LGA</option>');
               $("#wards").append('<option value"">Select Ward</option>');
              jQuery.each( data.lgas, function( i, val ) {
                  $("#lgas").append('<option>'+val.lga+'</option>');
                });
              $("#button").show();
              $("#processing").hide();
	        
	        }
       });
    });
    
    
    $("#paymentmethod").change(function(){
        
        var paymentmethod = $("#paymentmethod").val();
        
        if(paymentmethod == "Card Payment"){
            $("#cardpayproof").attr('required');
            $("#proof").removeAttr('required');
        }else if(paymentmethod == "Manual Payment"){
            $("#proof").attr('required');
            $("#cardpayproof").removeAttr('required')
        }
        
    });
    
    
    
    
    $("#initiatepayment").on('submit', function(event){
	      event.preventDefault();
	      $.ajax({
	        type: 'POST',
	        url: 'submitpayment',
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
	          $("#message").removeClass('alert-info');
	          $("#message").removeClass('alert-warning');
	          $("#message").removeClass('alert-danger');
	          $("#message").addClass(data.class_name);
              $("#button").show();
              $("#processing").hide();
	        
	        }
	      });
	    });
	    
	    
	    $("#paymentupdate").on('submit', function(event){
	      event.preventDefault();
	      $.ajax({
	        type: 'POST',
	        url: 'updatepayment',
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
	          $("#message").removeClass('alert-info');
	          $("#message").removeClass('alert-warning');
	          $("#message").removeClass('alert-danger');
	          $("#message").addClass(data.class_name);
              $("#button").show();
              $("#processing").hide();
	        
	        }
	      });
	    });
	    
	    
	    $("#createparticipant").on('submit', function(event){
	      event.preventDefault();
	      $.ajax({
	        type: 'POST',
	        url: 'submitparticipant',
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
	          $("#message").removeClass('alert-info');
	          $("#message").removeClass('alert-warning');
	          $("#message").removeClass('alert-danger');
	          $("#message").addClass(data.class_name);
              $("#button").show();
              $("#processing").hide();
              
              Swal.fire({
                title: "Success",
                text: "User account has been created successfully",
                buttonsStyling: false,
                confirmButtonClass: "btn btn-success",
                type: "success"
              });
              
              setTimeout(function() {
                    location.reload();
                }, 5000);
	        
	        }
	      });
	    });
	    
	    
	    
	    $("#manageparticipant").on('submit', function(event){
	      event.preventDefault();
	      $.ajax({
	        type: 'POST',
	        url: 'updateparticipant',
	        data: new FormData(this),
	        contentType: false,
	        cache: false,
	        processData: false,
	        beforeSend:function(){
	                $("#button").hide();
	                $("#processing").show();
	            },
	        success: function(data){
	          if(data.message == 'deleted'){
	              Swal.fire({
                    title: "Success",
                    text: "User account has been deleted successfully",
                    buttonsStyling: false,
                    confirmButtonClass: "btn btn-success",
                    type: "success"
                  });
                  
                  setTimeout(function() {
                        window.location = "{{ url('registeredparticipants') }}";
                    }, 5000);
	          }else{
	              $("#message").css('display', 'block');
    	          $("#message").html(data.message);
    	          $("#message").removeClass('alert-success');
    	          $("#message").removeClass('alert-info');
    	          $("#message").removeClass('alert-warning');
    	          $("#message").removeClass('alert-danger');
    	          $("#message").addClass(data.class_name);
                  $("#button").show();
                  $("#processing").hide();
	          }
	          
	        
	        }
	      });
	    });
	    
	    
//paystack payment begins here
function payWithPaystack(){
    var totalamount = $("#amountpay").val();
    if(totalamount < 2500){
        var newtotalamount = parseFloat((totalamount / (1 - 0.015)).toFixed(2));
    }else if(totalamount >= 2500){
        var newtotalamount = ((parseFloat(totalamount) + 100) / (1 - 0.015)).toFixed(2);
        if(newtotalamount - totalamount > 2000){
            newtotalamount = (parseFloat(totalamount) + 2000).toFixed(2);
        }
    }
    //alert(newtotalamount);
    var handler = PaystackPop.setup({
      key: 'pk_live_d04d26fa1864d48579796303212182b7bf777045',
      email: $("#email").val(),
      amount: newtotalamount * 100,
      currency: "NGN",
      ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
      metadata: {
         custom_fields: [
            {
                display_name: "Member Email",
                variable_name: "member_email",
                value: $("#email").val()
            }
         ]
      },
      callback: function(response){

        if(response.status == 'success'){
            
        //alert('success');
        
          var reference = response.reference;
          $("#cardpayproof").val(reference);
          
          //alert("Success");
          
          $("#messages").show();
          $("#message").addClass("alert-info")
          $("#message").html("Payment completed successfully, click on submit to completed registration");
          $("#paystackpay").hide();
        /*
        
        $("#initiatepayment").submit(function(){
          event.preventDefault();
	      $.ajax({
	        type: 'POST',
	        url: 'submitpayment',
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
	          $("#message").removeClass('alert-info');
	          $("#message").removeClass('alert-warning');
	          $("#message").removeClass('alert-danger');
	          $("#message").addClass(data.class_name);
              $("#button").show();
              $("#processing").hide();
	        
	        }
	      });
        });
            
         */
            
          //alert('success.transaction ref is ' + response.reference);
        }
      },
      
    });
    handler.openIframe();
  }

  //end process
    
</script>