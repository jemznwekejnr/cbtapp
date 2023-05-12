<script>

    $("#processing").hide();
    $("#withdrawalrequest").on('submit', function(event){
	      event.preventDefault();
	      
	      $.ajax({
	        type: 'POST',
	        url: 'submitwithdrawal',
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
	    
	    
	    $("#withdrawalupdate").on('submit', function(event){
	      event.preventDefault();
	      
	      $.ajax({
	        type: 'POST',
	        url: 'updatewithdrawal',
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
	    
	    
	    $("#ippis").focusout(function(){
	       var ippis = $("#ippis").val();
	       
	       $.ajax({
	          url:"retrievewithdrawal/?ippis="+ippis,
	          success:function(data){
	              $("#name").val(data.name);
	              $("#savings").val(data.savings);
	              $("#months").val(data.months);
	          }
	       });
	    });
</script>