$(document).ready(function(){
  $('#show-ps').change(function(){
    if($(this).prop('checked')){
      $('.passset').attr('type','text');
      console.log($(this).prop('checked'));
    }else{
      $('.passset').attr('type','password');
      console.log($(this).prop('checked'));
    }
  });
});