$(document).ready(function(){

  $("#user-alert").fadeTo(2000, 500).slideUp(500, function(){
      $("#user-alert").slideUp(500);
  });

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
          //$(".profileSidebar").attr('src','../images/provideAnImage.jpg');
          //console.log("NO Response ");
        }else {
          $("#userPic").css('background','url('+response+') no-repeat');
          $("#userPic").css('background-size','130px 150px');
          $(".profileSidebar").attr('src',response);
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
        var data = "q="+encodeURIComponent(q);
        var xhr = $.ajax({
          type:'POST',
          url:'../core/search.php',
          data: data,
          complete: function(){
        //    console.log(this.url+" data == "+data);
          },
          success: function(data){
        //    console.log("From Success "+data);
            var otherHtm = "";
            if(data === 'null' || data === ''){
                       $(".col-sm-8").html("<div class='searchRes'><h1>No User Found</h1></div>");
            }
            else{
              obj = JSON.parse(data);
              $(".col-sm-8").html("");
              for (var i =0; i< obj.length; i++) {
                console.log("value of i : " +i);

                if(obj[i].UserPic == null)
                  obj[i].UserPic = '../images/provideAnImage.jpg';
                otherHtm ="<div class='col-sm-3 col-lg-3 searchResults'>\
                <a href=../login/profile.php?u="+obj[i].Username+"><div class='card hovercard'>\
                <div class='card-background'>\
                <img class='card-bkimg'\ alt="+obj[i].Username+" src="+obj[i].UserPic+" />\
                 </div>\
                     <div class='useravatar'>\
                         <img src="+obj[i].UserPic+" alt="+obj[i].Username+" />\
                     </div>\
                     <div class='card-info'>\
                     <span class='card-title'>"+obj[i].Username+"</span></div>\
                     </div></a>\
            <div class='well'> <div class='tab-content'>\
            <div class='tab-pane fade in active' id='tab1'>\
              <h3>About</h3><p id='userAbout' title='"+obj[i].About+"'>"+obj[i].About+"</p><p id='userMail' title='"+obj[i].UserMail+"'>"+obj[i].UserMail+"</p>\
            </div>\
          </div>\
          <div class='btn-pref btn-group btn-group-justified btn-group-lg' role='group' aria-label=''>\
          <div class='btn-group' role='group'>\
          <button type='button' id='stars' class='btn btn-primary'\ href='#tab1' data-toggle='tab'><span aria-hidden='true'><i\ class='glyphicon glyphicon-link'></i>Connect</span>\
          </button>\
          </div></div>\
                     </div>";
                     if(i % 4 == 0){
                       console.log("i % 4 :   "+i % 4+" i/4 : "+i/4);
                       $(".col-sm-8").append("<div class='row"+Math.floor(i/4)+"'></div>");
                       $(".row"+i/4).append(otherHtm);
                     }
                     else{
                       console.log("i % 4 :   "+i % 4+" i/4 : "+i/4);
                       $(".row"+Math.floor(i/4)).append(otherHtm);
                     }
              }
            }
            }
          });
      });

    getProfilePic();
});
