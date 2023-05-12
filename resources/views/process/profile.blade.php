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
	    $("#updateprofile").on('submit', function(event){
	      event.preventDefault();
	      $.ajax({
	        type: 'POST',
	        url: 'profileupdate',
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
	  })



	  //process this when user click on update password
	  $(document).ready(function(){
	    $("#updatepassword").on('submit', function(event){
	      event.preventDefault();
	      $.ajax({
	        type: 'POST',
	        url: 'passwordupdate',
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
	  })


	  $("#spousedetails").hide();

	  $("#maritalstatus").change(function(){
	  	if($("#maritalstatus").val() == 'Married'){
	  		$("#spousedetails").show();
	  	}else{
	  		$("#spousedetails").hide();
	  	}
	  });

	  	if($("#maritalstatus").val() == 'Married'){
	  		$("#spousedetails").show();
	  	}


</script>