<script>

	function isNumberKey(evt)
       {
          var charCode = (evt.which) ? evt.which : evt.keyCode;
          if (charCode != 46 && charCode > 31 
            && (charCode < 48 || charCode > 57))
             return false;

          return true;
       }

	$(".processing").hide();
	$("#processing").hide();


	 $("#save").click(function(event){
	  	event.preventDefault();
	    var checkvariation = $("#checkvariation").val();
	    if(checkvariation > 0){
	        const swalWithBootstrapButtons = Swal.mixin({
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false,
              })

              swalWithBootstrapButtons.fire({
                title: 'Record Already Saved?',
                text: "This variation is already saved in the database, do you intend to override the existing record?",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, Overite',
                cancelButtonText: 'No, Cancel!',
                reverseButtons: true
              }).then((result) => {
                if (result.value) {
                    swalWithBootstrapButtons.fire(
                    'Deleted!',
                    'Record override successfully initiated',
                    'success'
                  )
                  $.ajax({
            	    	url:"savevariation",
            	    	beforeSend:function(){
            	    		$(".button").hide();
            	            $(".processing").show();
            	    	},
            	    	success:function(data){
                		  $("#message").css('display', 'block');
            	          $("#message").html(data.message);
            	          $("#message").removeClass('alert-success');
            	          $("#message").removeClass('alert-danger');
            	          $("#message").addClass(data.class_name);
                		  $(".button").show();
                          $(".processing").hide();
            	    	}
            	    });
                  
                } else if (
                  // Read more about handling dismissals
                  result.dismiss === Swal.DismissReason.cancel
                ) {
                  swalWithBootstrapButtons.fire(
                    'Cancelled',
                    'Operation Canceled',
                    'error'
                  )
                }
              })
	    }else{
	        $.ajax({
            	    	url:"savevariation",
            	    	beforeSend:function(){
            	    		$(".button").hide();
            	            $(".processing").show();
            	    	},
            	    	success:function(data){
                		  $("#message").css('display', 'block');
            	          $("#message").html(data.message);
            	          $("#message").removeClass('alert-success');
            	          $("#message").removeClass('alert-danger');
            	          $("#message").addClass(data.class_name);
                		  $(".button").show();
                          $(".processing").hide();
            	    	}
            	    });
	    }
	    

	  });
	  
	  $("#export").click(function(event){
	  	event.preventDefault();
	    var month = $("#month").val();
	    
	    $.ajax({
	    	url:"exportvariation/?month="+month,
	    	beforeSend:function(){
	    		$(".button").hide();
	            $(".processing").show();
	    	},
	    	success:function(data){
    		  $("#message").css('display', 'block');
	          $("#message").html(data.message);
	          $("#message").removeClass('alert-success');
	          $("#message").removeClass('alert-danger');
	          $("#message").addClass(data.class_name);
    		  $(".button").show();
              $(".processing").hide();
	    	}
	    });

	  });


	  
</script>