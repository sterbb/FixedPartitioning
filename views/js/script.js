$(function() {


    $('#user-input input[id^="num"]').on("keypress", function (e) {
       return _helper.isNumeric(e) ? true : e.preventDefault();
    });
 

    $("#btn-clear").click(function(){
          $("#num-totalMemory").focus();
       swal.fire({
           title: 'Do you want create new first fit ?',
           type: 'question',
           showCancelButton: true,
           confirmButtonText: 'Yes',
           cancelButtonText: 'Cancel!',
           confirmButtonClass: 'btn btn-outline-success',
           cancelButtonClass: 'btn btn-outline-danger',
           allowOutsideClick: false,
           buttonsStyling: false
       }).then(function(result) {
           if(result.value) {
               initialize();
           }
      });
    });

    //btn-submit
    $("#btn-submit").click(function(e){
      e.preventDefault();

      var b1 = parseInt($('#num-b1').val());
      var b2 = parseInt($('#num-b2').val());
      var b3 = parseInt($('#num-b3').val());
      var b4 = parseInt($('#num-b4').val());
      var b5 = parseInt($('#num-b5').val());

      var totalMemory = parseInt($('#num-totalMemory').val());
      var totalBlocks = b1+b2+b3+b4+b5;
      var osSize = parseInt($('#num-osSize').val());

      var j1 = parseInt($('#num-j1').val());
      var j2 = parseInt($('#num-j2').val());
      var j3 = parseInt($('#num-j3').val());
      var j4 = parseInt($('#num-j4').val());
      var j5 = parseInt($('#num-j5').val());


      //checks if inputs are not empty
      if(checkInputs() == true){

        //check if total memory is equals to total blocks and OS size
        if(totalMemory == (totalBlocks+osSize)){

          //osSize must be greater than 1
          if(osSize > 0){
  
            //Input Blocks mus be greater than 1
            if(checkBlocks(b1,b2,b3,b4,b5) == true){

    
              ////Input Jobs mus be greater than 1
              if(checkJobs(j1,j2,j3,j4,j5) == true){
                $("form").submit();
    
              }else{
                Swal.fire({
                  icon: 'error',
                  title: 'Oops...',
                  text: 'Input error!',
                  footer: '<a href="">Job sizes must be greater than 1</a>'
                });
              }
    
            }else{
              Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Input error!',
                footer: '<a href="">Blocks sizes must be greater than 1</a>'
              });
            }
            
          }else{
            Swal.fire({
              icon: 'error',
              title: 'Oops...',
              text: 'Input error!',
              footer: '<a href="">OS size must be greater than 1</a>'
            });
          }
    
        }else{
          Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Input error!',
            footer: '<a href="">Total Memory must be equals to the sum of OS size and Total Block Partitions</a>'
          });
        }

      }else{
        Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: 'Empty Input/s!',
          footer: '<a href="">All inputs must not be empty</a>'
        });
      }
      

    



    });

    //Check if Blocks are lesser than 1
    function checkBlocks(b1,b2,b3,b4,b5){
        if(b1<1 || b2<1 || b3<1 || b4<1 || b5<1){
          return false;
        }else{
          return true;
        }
    }


    // Check if jobs are lesser than 1
    function checkJobs(j1,j2,j3,j4,j5){
        if(j1<1 || j2<1 || j3<1 || j4<1 || j5<1){
          return false;
        }else{
          return true;
        }
    }

    function checkInputs(){
      if($("#num-totalMemory").val() == ''||
      $("#num-osSize").val()== ''||
      $("#num-b1").val()== ''||
      $("#num-j1").val()== ''||
      $("#num-b2").val()== ''||
      $("#num-j2").val()== ''||
      $("#num-b3").val()== ''||
      $("#num-j3").val()== ''||
      $("#num-b4").val()== ''||
      $("#num-j4").val()== ''||
      $("#num-b5").val()== ''||
      $("#num-j5").val() == ''){

        return false;
      }else{
        return true;
      }

    }


 
    function initialize(){
      $("#num-totalMemory").focus();
      $("#num-totalMemory").val('');
      $("#num-osSize").val('');
      $("#num-b1").val('');
      $("#num-j1").val('');
      $("#num-b2").val('');
      $("#num-j2").val('');
      $("#num-b3").val('');
      $("#num-j3").val('');
      $("#num-b4").val('');
      $("#num-j4").val('');
      $("#num-b5").val('');
      $("#num-j5").val('');
    }    

 });    