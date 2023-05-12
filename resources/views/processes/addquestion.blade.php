<script>
	
	//additional month selection for monthly dues payment
  $(document).ready(function(){


    $("#passagebt").hide();

    $("#passagebutton").click(function(){

      $("#passagebt").toggle();

    });


    $("#iquestion").hide();
    $("#tiquestion").hide();
    $("#itquestion").hide();

    $("#option1i").hide();
    $("#option1it").hide();
    $("#option1ti").hide();

    $("#option2i").hide();
    $("#option2it").hide();
    $("#option2ti").hide();

    $("#option3i").hide();
    $("#option3it").hide();
    $("#option3ti").hide();

    $("#option4i").hide();
    $("#option4it").hide();
    $("#option4ti").hide();

    $("#option5i").hide();
    $("#option5it").hide();
    $("#option5ti").hide();


    $("#question1type").change(function(){

      if($("#question1type").val() == 'Image Only'){
        
        $("#tquestion").hide();
        $("#tiquestion").hide();
        $("#itquestion").hide();
        $("#iquestion").show();
      
      }else if($("#question1type").val() == 'Text and Image'){
        
        $("#tquestion").hide();
        $("#iquestion").hide();
        $("#tiquestion").show();
        $("#itquestion").show();

      }else if($("#question1type").val() == 'Text Only'){
        
        $("#iquestion").hide();
        $("#tiquestion").hide();
        $("#itquestion").hide();
        $("#tquestion").show();

      }

    });


    $("#option1type").change(function(){

      if($("#option1type").val() == 'Image Only'){
        
        $("#option1t").hide();
        $("#option1it").hide();
        $("#option1ti").hide();
        $("#option1i").show();
      
      }else if($("#option1type").val() == 'Text and Image'){
        
        $("#option1t").hide();
        $("#option1i").hide();
        $("#option1it").show();
        $("#option1ti").show();

      }else if($("#option1type").val() == 'Text Only'){
        
        $("#option1i").hide();
        $("#option1it").hide();
        $("#option1ti").hide();
        $("#option1t").show();

      }

    });


    $("#option2type").change(function(){

      if($("#option2type").val() == 'Image Only'){
        
        $("#option2t").hide();
        $("#option2it").hide();
        $("#option2ti").hide();
        $("#option2i").show();
      
      }else if($("#option2type").val() == 'Text and Image'){
        
        $("#option2t").hide();
        $("#option2i").hide();
        $("#option2it").show();
        $("#option2ti").show();

      }else if($("#option2type").val() == 'Text Only'){
        
        $("#option2i").hide();
        $("#option2it").hide();
        $("#option2ti").hide();
        $("#option2t").show();

      }

    });


    $("#option3type").change(function(){

      if($("#option3type").val() == 'Image Only'){
        
        $("#option3t").hide();
        $("#option3it").hide();
        $("#option3ti").hide();
        $("#option3i").show();
      
      }else if($("#option3type").val() == 'Text and Image'){
        
        $("#option3t").hide();
        $("#option3i").hide();
        $("#option3it").show();
        $("#option3ti").show();

      }else if($("#option3type").val() == 'Text Only'){
        
        $("#option3i").hide();
        $("#option3it").hide();
        $("#option3ti").hide();
        $("#option3t").show();

      }

    });



    $("#option4type").change(function(){

      if($("#option4type").val() == 'Image Only'){
        
        $("#option4t").hide();
        $("#option4it").hide();
        $("#option4ti").hide();
        $("#option4i").show();
      
      }else if($("#option4type").val() == 'Text and Image'){
        
        $("#option4t").hide();
        $("#option4i").hide();
        $("#option4it").show();
        $("#option4ti").show();

      }else if($("#option4type").val() == 'Text Only'){
        
        $("#option4i").hide();
        $("#option4it").hide();
        $("#option4ti").hide();
        $("#option4t").show();

      }

    });


    $("#option5type").change(function(){

      if($("#option5type").val() == 'Image Only'){
        
        $("#option5t").hide();
        $("#option5it").hide();
        $("#option5ti").hide();
        $("#option5i").show();
      
      }else if($("#option5type").val() == 'Text and Image'){
        
        $("#option5t").hide();
        $("#option5i").hide();
        $("#option5it").show();
        $("#option5ti").show();

      }else if($("#option5type").val() == 'Text Only'){
        
        $("#option5i").hide();
        $("#option5it").hide();
        $("#option5ti").hide();
        $("#option5t").show();

      }

    });


    



    var b = 1
    var a = 2;
    var i = 2;
    var y = 1;
    var x;
    
     
    $('#addmore').click(function(){

      
      
      $("#morequestions").append('<div class="row" id="'+i+'"><div class="col-md-4 pr-1"><div class="form-group"><label>Subject</label><select type="text" class="form-control selectpicker" id="subject'+a+'" data-style="btn-round" name="subject'+a+'"><option>Mathematics</option><option>English Language</option><option>Biology</option><option>Chemistry</option><option>Physics</option><option>Economics</option><option>Geography</option><option>Commerce</option></select></div></div><div class="col-md-4 px-1"><div class="form-group"><label>Year</label><select id="year'+a+'" class="form-control selectpicker" name="year'+a+'" data-style="btn-round">@for($i = 1990; $i < date("Y") - 1; $i++)<option>{{ $i }}</option>@endfor</select></div></div><div class="col-md-4 pl-1"><div class="form-group"><label>Question Type</label><select id="question'+a+'type" class="form-control selectpicker" data-style="btn-round" name="question'+a+'type"><option>Text Only</option><option>Image Only</option><option>Text and Image</option></select></div></div></div><div class="row"><div class="col-md-12" id="tquestion"><div class="form-group"><label>Question</label><textarea name="question'+a+'" id="text'+a+'question" class="form-control"></textarea></div></div><div class="col-md-4" id="iquestion'+a+'"><div class="form-group"><label>Question</label><div class="fileinput fileinput-new text-center" data-provides="fileinput"><div class="fileinput-new thumbnail"><img src="../../assets/img/image_placeholder.jpg" alt="..."></div><div class="fileinput-preview fileinput-exists thumbnail"></div><div><span class="btn btn-rose btn-round btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span><input type="file" name="image'+a+'" /></span><a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a></div></div></div></div><div class="col-md-9" id="tiquestion'+a+'"><div class="form-group"><label>Question</label><textarea name="textiimagequestion'+a+'" id="textiimagequestion'+a+'" class="form-control"></textarea></div></div><div class="col-md-3" id="itquestion'+a+'"><div class="form-group"><label>Question</label><div class="fileinput fileinput-new text-center" data-provides="fileinput"><div class="fileinput-new thumbnail"><img src="../../assets/img/image_placeholder.jpg" alt="..."></div><div class="fileinput-preview fileinput-exists thumbnail"></div><div><span class="btn btn-rose btn-round btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span><input type="file" name="imagetextquestion'+a+'" /></span><a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a></div></div></div></div></div><div class="row"><div class="col-md-4 pr-1"><div class="form-group"><label>Option '+b+a+' Type</label><select id="option'+b+a+'type" class="form-control selectpicker" data-style="btn-round" name="option'+b+a+'type"><option>Text Only</option><option>Image Only</option><option>Text and Image</option></select></div></div><div class="col-md-8 pl-1" id="option'+b+a+'t"><div class="form-group"><label>Option 1</label><input type="text" name="option1text" id="option1text" class="form-control" placeholder="Option One"></div></div><div class="col-md-4 pl-1" id="option1i"><div class="form-group"><label>Option 1</label><div class="fileinput fileinput-new text-center" data-provides="fileinput"><div class="fileinput-new thumbnail"><img src="../../assets/img/image_placeholder.jpg" alt="..."></div><div class="fileinput-preview fileinput-exists thumbnail"></div><div><span class="btn btn-rose btn-round btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span><input type="file" id="option1image" name="option1image" /></span><a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a></div></div></div></div><div class="col-md-5 px-1" id="option1ti"><div class="form-group"><label>Option 1</label><input type="text" name="option1textimage" id="option1textimage" class="form-control" placeholder="Option One"></div></div><div class="col-md-3 pl-1" id="option1it"><div class="form-group"><label>Option 1</label><div class="fileinput fileinput-new text-center" data-provides="fileinput"><div class="fileinput-new thumbnail"><img src="../../assets/img/image_placeholder.jpg" alt="..."></div><div class="fileinput-preview fileinput-exists thumbnail"></div><div><span class="btn btn-rose btn-round btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span><input type="file" id="option1imagetext" name="option1imagetext" /></span><a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a></div></div></div></div></div><div class="row"><div class="col-md-4 pr-1"><div class="form-group"><label>Option 2 Type</label><select id="option2type" class="form-control selectpicker" data-style="btn-round" name="option2type"><option>Text Only</option><option>Image Only</option><option>Text and Image</option></select></div></div><div class="col-md-8 pl-1" id="option2t"><div class="form-group"><label>Option 2</label><input type="text" name="option2text" id="option2text" class="form-control" placeholder="Option One"></div></div><div class="col-md-4 pl-1" id="option2i"><div class="form-group"><label>Option 2</label><div class="fileinput fileinput-new text-center" data-provides="fileinput"><div class="fileinput-new thumbnail"><img src="../../assets/img/image_placeholder.jpg" alt="..."></div><div class="fileinput-preview fileinput-exists thumbnail"></div><div><span class="btn btn-rose btn-round btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span><input type="file" id="option2image" name="option2image" /></span><a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a></div></div></div></div><div class="col-md-5 px-1" id="option2ti"><div class="form-group"><label>Option 2</label><input type="text" name="option2textimage" id="option2textimage" class="form-control" placeholder="Option One"></div></div><div class="col-md-3 pl-1" id="option2it"><div class="form-group"><label>Option 2</label><div class="fileinput fileinput-new text-center" data-provides="fileinput"><div class="fileinput-new thumbnail"><img src="../../assets/img/image_placeholder.jpg" alt="..."></div><div class="fileinput-preview fileinput-exists thumbnail"></div><div><span class="btn btn-rose btn-round btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span><input type="file" id="option2imagetext" name="option2imagetext" /></span><a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a></div></div></div></div></div><div class="row"><div class="col-md-4 pr-1"><div class="form-group"><label>Option 3 Type</label><select id="option3type" class="form-control selectpicker" data-style="btn-round" name="option3type"><option>Text Only</option><option>Image Only</option><option>Text and Image</option></select></div></div><div class="col-md-8 pl-1" id="option3t"><div class="form-group"><label>Option 3</label><input type="text" name="option3text" id="option3text" class="form-control" placeholder="Option One"></div></div><div class="col-md-4 pl-1" id="option3i"><div class="form-group"><label>Option 3</label><div class="fileinput fileinput-new text-center" data-provides="fileinput"><div class="fileinput-new thumbnail"><img src="../../assets/img/image_placeholder.jpg" alt="..."></div><div class="fileinput-preview fileinput-exists thumbnail"></div><div><span class="btn btn-rose btn-round btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span><input type="file" id="option3image" name="option3image" /></span><a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a></div></div></div></div><div class="col-md-5 px-1" id="option3ti"><div class="form-group"><label>Option 3</label><input type="text" name="option3textimage" id="option3textimage" class="form-control" placeholder="Option One"></div></div><div class="col-md-3 pl-1" id="option3it"><div class="form-group"><label>Option 3</label><div class="fileinput fileinput-new text-center" data-provides="fileinput"><div class="fileinput-new thumbnail"><img src="../../assets/img/image_placeholder.jpg" alt="..."></div><div class="fileinput-preview fileinput-exists thumbnail"></div><div><span class="btn btn-rose btn-round btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span><input type="file" id="option3imagetext" name="option3imagetext" /></span><a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a></div></div></div></div></div><div class="row"><div class="col-md-4 pr-1"><div class="form-group"><label>Option 4 Type</label><select id="option4type" class="form-control selectpicker" data-style="btn-round" name="option4type"><option>Text Only</option><option>Image Only</option><option>Text and Image</option></select></div></div><div class="col-md-8 pl-1" id="option4t"><div class="form-group"><label>Option 4</label><input type="text" name="option4text" id="option4text" class="form-control" placeholder="Option One"></div></div><div class="col-md-4 pl-1" id="option4i"><div class="form-group"><label>Option 4</label><div class="fileinput fileinput-new text-center" data-provides="fileinput"><div class="fileinput-new thumbnail"><img src="../../assets/img/image_placeholder.jpg" alt="..."></div><div class="fileinput-preview fileinput-exists thumbnail"></div><div><span class="btn btn-rose btn-round btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span><input type="file" id="option4image" name="option4image" /></span><a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a></div></div></div></div><div class="col-md-5 px-1" id="option4ti"><div class="form-group"><label>Option 4</label><input type="text" name="option4textimage" id="option4textimage" class="form-control" placeholder="Option One"></div></div><div class="col-md-3 pl-1" id="option4it"><div class="form-group"><label>Option 4</label><div class="fileinput fileinput-new text-center" data-provides="fileinput"><div class="fileinput-new thumbnail"><img src="../../assets/img/image_placeholder.jpg" alt="..."></div><div class="fileinput-preview fileinput-exists thumbnail"></div><div><span class="btn btn-rose btn-round btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span><input type="file" id="option4imagetext" name="option4imagetext" /></span><a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a></div></div></div></div></div><div class="row"><div class="col-md-4 pr-1"><div class="form-group"><label>Option 5 Type</label><select id="option5type" class="form-control selectpicker" data-style="btn-round" name="option5type"><option>Text Only</option><option>Image Only</option><option>Text and Image</option></select></div></div><div class="col-md-8 pl-1" id="option5t"><div class="form-group"><label>Option 5</label><input type="text" name="option5text" id="option5text" class="form-control" placeholder="Option One"></div></div><div class="col-md-4 pl-1" id="option5i"><div class="form-group"><label>Option 5</label><div class="fileinput fileinput-new text-center" data-provides="fileinput"><div class="fileinput-new thumbnail"><img src="../../assets/img/image_placeholder.jpg" alt="..."></div><div class="fileinput-preview fileinput-exists thumbnail"></div><div><span class="btn btn-rose btn-round btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span><input type="file" id="option5image" name="option5image" /></span><a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a></div></div></div></div><div class="col-md-5 px-1" id="option5ti"><div class="form-group"><label>Option 5</label><input type="text" name="option5textimage" id="option5textimage" class="form-control" placeholder="Option One"></div></div><div class="col-md-3 pl-1" id="option5it"><div class="form-group"><label>Option 5</label><div class="fileinput fileinput-new text-center" data-provides="fileinput"><div class="fileinput-new thumbnail"><img src="../../assets/img/image_placeholder.jpg" alt="..."></div><div class="fileinput-preview fileinput-exists thumbnail"></div><div><span class="btn btn-rose btn-round btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span><input type="file" id="option5imagetext" name="option5imagetext" /></span><a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a></div></div></div></div></div><div class="col-md-2 pl-1"><div class="form-group"><br /><button type="button" class="btn btn-round btn-danger btn-remove" id="'+i+'">Remove</button></div></div></div>');
      
      
      x = i - 1;
      i++;
      $("#number").html('<input type="hidden" name="tnumber" value="'+y+'">');
      $("#"+x).hide();
    });


    $(document).on('click', '.btn-remove', function(){
        
        var button_id = $(this).attr("id");
        $('#row'+button_id+'').remove();
        $("#tmonth").html(--y);
        
        i--;
        $("#number").html('<input type="hidden" name="tnumber" value="'+y+'">');
        //x++;
        $("#"+x--).show();
        
        });

    

  });


  //process this when user click on pay
  $(document).ready(function(){
    $("#newquestion").on('submit', function(event){
      event.preventDefault();
      $.ajax({
        type: 'POST',
        url: 'submitquestion',
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend:function(){
                $("#modal").show();
            },
        success: function(data){
          if(data.message == 'success'){
            
            var months = data.months;
            var totalamount = data.totalamount;
            var tnumber = data.number;
            var amount = data.amount;
            var description = data.description;

            //redirect to payment page
            var url = "monthlycooperative?months="+months+"&totalamount="+totalamount+"&tnumber="+tnumber+"&amount="+amount+"&description="+description;    
            $(location).attr('href',url);

          }else{
          $("#message").css('display', 'block');
          $("#message").html(data.message);
          $("#message").removeClass('alert-success');
          $("#message").removeClass('alert-danger');
          $("#message").addClass(data.class_name);
          $("#modal").hide();
        }
        }
      });
    });
  })

  //end process



  //process this when user click on pay
  $(document).ready(function(){
    $("#newaccount").on('submit', function(event){
      event.preventDefault();
      $.ajax({
        type: 'POST',
        url: 'createaccount',
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

  //end process


  //process this when user click on pay
  $(document).ready(function(){
    $("#accountupdate").on('submit', function(event){
      event.preventDefault();
      $.ajax({
        type: 'POST',
        url: 'updateaccount',
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

  //end process


  //process this when user click on pay
  $(document).ready(function(){
    $("#userpassword").on('submit', function(event){
      event.preventDefault();
      $.ajax({
        type: 'POST',
        url: 'updatepassword',
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

  //end process

</script>