$('document').ready(function(){
  function getProfilePic(){
    var cookie = getCookie('user_id');
    var data = "profile_id="+cookie;
    console.log(data);
    var xhr = $.ajax({
      type  : 'GET',
      url   : '../data/user.php',
      data  : data,
      success: function(response){
        if( response == ''){
          console.log("NO Response ");
        }else {
          console.log(response);
          $("#userPic").css('background','url('+response+') no-repeat');
          $("#userPic").css('background-size','130px 150px');
        }
      }
  });
  //console.log(xhr);
  return false;
  }

  $('#userPic').on('mouseover',function(event){
      $(this).find('.transbox').fadeIn(100);
    });
    $('#userPic').on('mouseout',function(event){
      $(this).find('.transbox').stop().fadeOut(200);
    });

    function getCookie(cname) {
        var name = cname + "=";
        var ca = document.cookie.split(';');
        for(var i = 0; i <ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
            }
        }
        return "";
    }

    getProfilePic();
});
