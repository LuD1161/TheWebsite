<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div id="nav" class="container" style="margin-left:0px;">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                  <span onclick="openNav()" class="sr-only">Toggle navigation</span>
                  <span onclick="openNav()" class="icon-bar"></span>
                  <span onclick="openNav()" class="icon-bar"></span>
                  <span onclick="openNav()" class="icon-bar"></span>
              </button>
          </div>
          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul id="nav" class="nav navbar-nav">
                <li>
                    <a href="#"><span onclick="openNav()">&#9776; <?php echo $row['user_name']; ?></span></a>
                </li>
                <li>
                    <a href="../canvas/index.php" target="_blank">Canvas</a>
                </li>
                  <li>
                      <a href="#" target="_blank">Developers</a>
                  </li>
                  <li>
                      <a href="#" target="_blank">Navigation</a>
                  </li>
              </ul>
              <div class="col-sm-3 col-md-3">
                <form  class="navbar-form" role="search" method="POST" id="searchBar">
                  <div class="input-group search">
                      <input type="text" class="form-control" placeholder="Find Contacts" name="q" id="search_box">
                      <div class="input-group-btn">
                          <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                      </div>
                  </div>
                </form>
            </div>
          </div>
          <!-- /.navbar-collapse -->
      </div>

        <div id="wrapper">
            <!-- Sidebar -->
            <div id="mySidenav" class="sidenav">
                <a href="javascript:void(0)" class="closebtn" onmouseover="closeNav()"> &times;</a>
                <div class="img-circle userPic" style="background:url('<?php echo $row['user_pic']?>') no-repeat;">
                  <div class="transbox">
                    <a id="upload" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-camera"></span> Upload Photo</a>
                  </div>
                </div>
                <div id="myModal" class="modal fade" role="dialog">
                 <div class="modal-dialog">
                   <!-- Modal content-->
                   <div class="modal-content">
                     <div class="modal-header">
                       <button type="button" class="close" data-dismiss="modal">&times;</button>
                       <h4 class="modal-title">Upload Photo</h4>
                     </div>
                     <form action="../login/upload.php" method="post" enctype="multipart/form-data">
                     <div class="form-group">
                        <label class="custom-file">&nbsp;
                        <input type="file" id="fileToUpload" name="fileToUpload" class="custom-file-input">
                        <span class="custom-file-control"></span>
                        <small id="fileHelp" class="form-text text-muted"></small>
                        </label>
                        <input type="submit" value="Upload Image" name="submit">
                       </div>
                   </form>
                     <div class="modal-footer">
                       <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                     </div>
                   </div>
                 </div>
               </div>
                <a href="../core/account_settings.php"><span class="glyphicon glyphicon-asterisk" style="color:blue"></span> Settings</a>
                <a href="#"><span class="glyphicon glyphicon-heart" style="color:red"></span> Favourites</a>
                <a href="logout.php"><span class="glyphicon glyphicon-off" style="color:orange"></span> Logout</a>
            </div>

              </div>
              <!-- /.container -->
          </nav>
