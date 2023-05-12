<script>

  function isNumberKey(evt){
          var charCode = (evt.which) ? evt.which : evt.keyCode;
          if (charCode != 46 && charCode > 31 
            && (charCode < 48 || charCode > 57))
             return false;

          return true;
       }
	
	//additional month selection for monthly dues payment
  $(document).ready(function(){
    var i = 2;
    var y = 1;
    var x;
    var totalamount = $('#tamount').html();
     
    $('#addmore').click(function(){

      
      
      $("#moremonths").append('<div class="row" id="row'+i+'"><div class="col-md-5 pr-1"><div class="form-group"><label>Month</label><input type="month" class="form-control" id="month'+i+'" name="month'+i+'" value="" required></div></div><div class="col-md-5 pl-1"><div class="form-group"><label>Amount (NGN)</label><p class="form-control">{{ $amount }}</p></div></div><div class="col-md-2 pl-1"><div class="form-group"><br /><button type="button" class="btn btn-round btn-danger btn-remove" id="'+i+'">Remove</button></div></div></div>');
      
      $("#tmonth").html(++y);
      //totalamount = parseFloat(totalamount) + parseFloat($("#amount"+i).val());
      totalamount = parseFloat({{ $amount }}) * y;
      $("#tamount").html(totalamount.toFixed(2));
      x = i - 1;
      i++;
      $("#number").html('<input type="hidden" name="tnumber" value="'+y+'">');
      $("#"+x).hide();
    });


    $(document).on('click', '.btn-remove', function(){
        
        var button_id = $(this).attr("id");
        $('#row'+button_id+'').remove();
        $("#tmonth").html(--y);
        //totalamount = parseFloat(totalamount) - parseFloat($("#amount"+button_id).val());
        totalamount = parseFloat({{ $amount }}) * y;
        
        $("#tamount").html(totalamount.toFixed(2));
        i--;
        $("#number").html('<input type="hidden" name="tnumber" value="'+y+'">');
        //x++;
        $("#"+x--).show();
        });

    

  });


  //process this when user click on pay
  $(document).ready(function(){
    $("#cooperativepay").on('submit', function(event){
      event.preventDefault();
      $.ajax({
        type: 'POST',
        url: 'submitcooperative',
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

</script>