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
	$(".processing").hide();


	//process this when user click on pay
	  $(document).ready(function(){
	    $("#manageuseraccount").on('submit', function(event){
	      event.preventDefault();
	      $.ajax({
	        type: 'POST',
	        url: 'updateuseraccount',
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


	    
	    $("#nonmemberaccount").on('submit', function(event){
	      event.preventDefault();
	      $.ajax({
	        type: 'POST',
	        url: 'createnonmemberaccount',
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
	  });



	 $('.edit').click(function(event){
	 	event.preventDefault();
	    var id = $(this).attr('href');
	    $.ajax({
	    	url:"approveuser/?id="+id,
	    	beforeSend:function(){
	    		$("#button"+id).hide();
	            $("#processing"+id).show();
	    	},
	    	success:function(data){
	    		$("#status"+id).html(data.status);
	    		$("#ippisnumber"+id).html(data.ippisnumber);

	    		$("#button"+id).show();
	            $("#processing"+id).hide();
	            $("#edit"+id).hide();
	    	}
	    });
	  });


	 $(".edits").click(function(event){

	  	event.preventDefault();
	    var id = $(this).attr('href');
	    $.ajax({
	    	url:"fetchuser/?id="+id,
	    	beforeSend:function(){
	    		$("#button").hide();
	            $("#processing").show();
	    	},
	    	success:function(data){
	    		$("#id").val(data.id);
	    		$("#name").val(data.name);
	    		$("#email").val(data.email);
	    		$("#phone").val(data.phone);
	    		$("#accounttype").val(data.accounttype).change();
	    		$("#accountstatus").val(data.accountstatus).change();
	    		$("#userrole").val(data.userrole).change();

	    		$("#button").show();
	            $("#processing").hide();
	    	}
	    });

	  });


	  $(".removes").click(function(event){

	  	event.preventDefault();
	    var id = $(this).attr('href');
	    $.ajax({
	    	url:"deletenonmember/?id="+id,
	    	beforeSend:function(){
	    		$("#button").hide();
	            $("#processing").show();
	    	},
	    	success:function(data){

	    		if(data.status == 'success'){

	    			Swal.fire({
				        title: "Success!",
				        text: "User have been deleted successfully!",
				        buttonsStyling: false,
				        confirmButtonClass: "btn btn-success",
				        type: "success"
				      });
			        	
			        location.reload();

	    		}else{

	    			Swal.fire({
				        title: "Error!",
				        text: "User deleting failed!",
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
	  
	  
	  $("#individual").hide();
	  $("#state").hide();
	  $("#lga").hide();
	  
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
    
    $("#recipient").change(function(){
        
        var recipient = $("#recipient").val();
        if(recipient == "Individual Participants"){
        	  $("#state").hide();
        	  $("#lga").hide();
              $("#individual").show();
        }else if(recipient == "Particular State Participants"){
              $("#individual").hide();
        	  $("#state").show();
        	  $("#lga").hide();
        }else if(recipient == "Particular LGA Participants"){
              $("#individual").hide();
        	  $("#state").show();
        	  $("#lga").show();
        }else{
              $("#individual").hide();
        	  $("#state").hide();
        	  $("#lga").hide();
        }
    });
    
    
     $("#newannouncement").on('submit', function(event){
	      event.preventDefault();
	      $.ajax({
	        type: 'POST',
	        url: 'postannouncements',
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
	    
	    
	    $("#announcementupdate").on('submit', function(event){
	      event.preventDefault();
	      $.ajax({
	        type: 'POST',
	        url: 'updateannouncement',
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
	    
	    
	    $("#newmessage").on('submit', function(event){
	      event.preventDefault();
	      $.ajax({
	        type: 'POST',
	        url: 'sendmessage',
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
	  
	  
</script>