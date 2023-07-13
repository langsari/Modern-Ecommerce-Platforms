
$(document).ready(function(){

ClassicEditor
        .create( document.querySelector( '#body' ) )
        .catch( error => {
            console.error( error );
        } );
    });




// second part instaed of scripts.js file

// tinymce.init({selector:'textarea'});

$(document).ready(function(){

  alert('Hello');

  $('#selectAllBoxes').click(function(event){
    if(this.checked) {
      $('.cehckBoxes').each(function(){
        this.checked = true;
      });
      
    } else {
      $('.cehckBoxes').each(function(){
        this.checked = false;
      });
    }
  });





// // this for loading
//   var div_box = "<div id='load-screen'><div id='loading'></div></div>";
//   $("body").prepend(div_box);

//   $('#load-screen').delay(700).fadeOut(600, function(){
//     $(this).remove();
//   });

  
});


function loadUsersOnline() {
$.get("functions.php?onlineusers=result", function(data){

  $(".useronline").text(data);



});
}

setInterval(function(){

  loadUsersOnline(); 

},500)





// setInterval(function(){

// },500);
