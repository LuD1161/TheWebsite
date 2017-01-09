$('document').ready(function(){
  function getProfilePic(){
    var cookie = getCookie('user_id');
    var data = "profile_id="+cookie;
    console.log(data);
    var xhr = $.ajax({
      type  : 'GET',
      url   : '../core/user.php',
      data  : data,
      success: function(response){
        if( response === ''){
          //console.log("NO Response ");
        }else {
          $("#userPic").css('background','url('+response+') no-repeat');
          $("#userPic").css('background-size','130px 150px');
        }
      }
  });
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

      $("#searchBar").submit(function(e){
        e.preventDefault();
        var q = $('#search_box').val();
        var data = "q="+q;
        var xhr = $.ajax({
          type:'POST',
          url:'../core/search.php',
          data: data,

          success: function(data){
            console.log("From Success "+data);
            var htm = "";
            console.log(typeof(data));
            if(data === 'null'){
                       $("#userBody").append("<div class='searchRes'><h1>No User Found</h1></div>");
            }
            else{
              obj = JSON.parse(data);
              $("#userBody").html(htm);
              for (var i in obj) {
                if(obj[i].UserPic == null)
                  obj[i].UserPic = '../images/provideAnImage.jpg'
                htm =  "<img class='img-circle' src="+obj[i].UserPic+" style='height:140px;width:100px;float:left;'>"+
                       "<p style='width:300px;float:right;margin-left:40px;margin-right:40px;'>User Name : "+obj[i].Username+"</p>"+
                       "<p style='width:300px;float:right;margin-right:40px;'>Joined On : "+obj[i].JoinedOn+"</p>"+
                       "<p style='width:300px;float:right;margin-right:40px;'>Email Id  : "+obj[i].UserMail+"</p>";
                       $("#userBody").append("<div class='searchRes'>"+htm+"</div>");
              }
            }
            }
          });
      });

    getProfilePic();
});
