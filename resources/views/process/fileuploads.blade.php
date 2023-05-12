<script>
	//savings upload
	  $(document).ready(function(){
	    $("#processing").hide();

	    $("#uploadrecord").on('submit', function(event){
	      event.preventDefault();
	      $.ajax({
	        type: 'POST',
	        url: 'submituploadrecords',
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
</script>