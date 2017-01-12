<div id="userBody">

<div class="container-fluid text-center">
  <div class="row-content">
    <div class="col-sm-2 sideBar" >
        <img src="../images/provideAnImage.jpg" class="img-circle profileSidebar" style="width:100%;"/>
        <h2>
          <?php echo $row['user_name']; ?>
        </h2>
        <p>
          <?php echo $row['user_about']; ?>
        </p>
    </div>
    <div class="col-sm-8 text-left">
      <div id="user-alert" class='alert alert-success' style="margin-left:100px;margin-right:100px;text-align:center;">
        <button class='close' data-dismiss='alert'>&times;</button>
         <strong>Hello  <?php echo $row['user_name']; ?></strong>
          <p><br />
            Welcome to the members page.
          </p>
      </div>
      <div class="mainBody">
        <h1 id="headingInside"></h1>
        <p>
          Contact   : <i><?php echo $row['user_email']; ?></i>
        </p>
        <p>
          Joined On : <?php echo date_format(date_create($row['joining_date']), "d/m/Y"); ?>
        </p>
      </div>
    </div>
    <div class="col-sm-2 sideBar">
      <div class="well">
        <p>Chat Box Here</p>
      </div>
      <div class="well">
        <p>Chat Box Here</p>
      </div>
    </div>
  </div>
</div>
</div>
