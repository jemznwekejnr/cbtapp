<script>

//process this when user click on pay
  $(document).ready(function(){
    $("#submitrequest").on('click', function(event){
      event.preventDefault();
      
      var name = $("#name").val();
      var email = $("#email").val();
      var organization = $("#organization").val();
      var designation = $("#designation").val();
      var examtype = $("#examtype").val();
      var subject = $("#subject").val();
      var year = $("#year").val();
      
      if(name == ''){
          Swal.fire({
            title: "Missing Field!",
            text: "Please Provide Your Name to Proceed.",
            buttonsStyling: false,
            confirmButtonClass: "btn btn-danger",
            type: "error"
          });
      }else if(email == ''){
          Swal.fire({
            title: "Missing Field!",
            text: "Please Provide Your Email to Proceed.",
            buttonsStyling: false,
            confirmButtonClass: "btn btn-danger",
            type: "error"
          });
      }else if(organization == ''){
          Swal.fire({
            title: "Missing Field!",
            text: "Please Provide Your Organization to Proceed.",
            buttonsStyling: false,
            confirmButtonClass: "btn btn-danger",
            type: "error"
          });
      }else if(designation == ''){
          Swal.fire({
            title: "Missing Field!",
            text: "Please Provide Your Designation to Proceed.",
            buttonsStyling: false,
            confirmButtonClass: "btn btn-danger",
            type: "error"
          });
      }else if(examtype == ''){
          Swal.fire({
            title: "Missing Field!",
            text: "Please Select Exam Type to Proceed.",
            buttonsStyling: false,
            confirmButtonClass: "btn btn-danger",
            type: "error"
          });
      }else if(subject == ''){
          Swal.fire({
            title: "Missing Field!",
            text: "Please Select the Course/Subject to Proceed.",
            buttonsStyling: false,
            confirmButtonClass: "btn btn-danger",
            type: "error"
          });
      }else if(year == ''){
          Swal.fire({
            title: "Missing Field!",
            text: "Please Select Exam Year to Proceed.",
            buttonsStyling: false,
            confirmButtonClass: "btn btn-danger",
            type: "error"
          });
      }else{
        $.ajax({
            url: 'checkusertest?name='+name+'&email='+email,
            success: function(data){
                if(data.message == 'found'){
                    Swal.fire({
                        title: "Test Taken!",
                        text: "You are only required to take this test once.",
                        buttonsStyling: false,
                        confirmButtonClass: "btn btn-danger",
                        type: "error"
                      });
                }else{
                    //redirect to instruction page
            	    var url = "instructions?name="+name+"&email="+email+"&organization="+organization+"&designation="+designation+"&examtype="+examtype+"&subject="+subject+"&year="+year;    
            	    $(location).attr('href',url);
                }
            }
        });
        
      }
    });
  })




  //process this when user click on pay
  $(document).ready(function(){
    $("#teststart").on('submit', function(event){
      event.preventDefault();
      $.ajax({
        type: 'POST',
        url: 'starttest',
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend:function(){
                $("#modal").show();
            },
        success: function(data){
          
          $("#message").css('display', 'block');
          $("#message").html(data.message);
          $("#message").removeClass('alert-success');
          $("#message").removeClass('alert-danger');
          $("#message").addClass(data.class_name);
          $("#modal").hide();
        
        }
      });
    });
  })

  </script>