$(document).ready(function(){
    $("#customFile").on("change", function(e){
      var name = e.target.value.split( '\\' ).pop();
      $('.custom-file-label').text(name);
    })
  })
  