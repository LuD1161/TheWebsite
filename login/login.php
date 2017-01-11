<!doctype html>
<html>
<head>
  <meta charset=utf-8>
  <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css" />
  <title>Login Page</title>
  <script src="../js/jquery.js"></script>
  <script src="../bootstrap/js/bootstrap.min.js"></script>
  <script src="../js/login-script.js"></script>
  <script type="text/javascript" src="../js/validation.min.js"></script>
  <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap-theme.min.css" />
  <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen /">
  <link href="../css/style.css" rel="stylesheet" media="screen">
  <link rel="stylesheet" type="text/css" href="../css/login.css" />
  <script>
  function showForm(){
    $("#registration").slideDown("slow", function(){
      $("#signInForm").slideUp("slow");
    });}
  function showLoginForm(){
    $("#signInForm").slideDown("slow", function(){
      $("#registration").slideUp("slow");
    });}
  </script>
</head>
<body>
  <div class="signin-form">
    <div class="container">
      <div id="signInForm" >
        <form class="form-signin" method="post" id="login-form">

         <h2 class="form-signin-heading text-center"><strong>Log In</strong> </h2><hr />

         <div id="error_login">
         <!-- error will be shown here ! -->
         </div>

         <div class="form-group input-group">
         <span class="input-group-addon" >
           <span class="glyphicon glyphicon-envelope"></span>
         </span>
         <input type="email" class="form-control" placeholder="Email address" name="user_email" id="user_email" />
         <span id="check-e"></span>
         </div>

         <div class="form-group input-group">
         <span class="input-group-addon">
           <span class="glyphicon glyphicon-lock"></span>
         </span>
         <input type="password" class="form-control" placeholder="Password" name="password" id="password" />
         </div>

       <hr />
           <div class="form-group">
           <button type="submit" class="btn btn-primary" name="btn-login" id="btn-login">
           <span class="glyphicon glyphicon-log-in"></span> &nbsp; Sign In
           </button>

           <button type="button" onclick="showForm();" class="btn btn-primary pull-right" name="btn-registration" id="btn-registration">
           <span class="glyphicon glyphicon-user"></span> &nbsp; Register
           </button>
       </div>
       </form>
      </div>

      <div id="registration" style="display:none;">
        <form class="form-signin" method="post" id="registration-form" action="registration.php">

         <h2 class="form-signin-heading text-center">Register </h2><hr />

         <div id="error_reg">
         <!-- error will be shown here ! -->
         </div>
         <div class="form-group input-group">
         <span class="input-group-addon">
           <span class="glyphicon glyphicon-user"></span>
         </span>
         <input type="text" class="form-control" placeholder="Full Name" name="name" id="name" />
         </div>

         <div class="form-group input-group">
         <span class="input-group-addon">
           <span class="glyphicon glyphicon-envelope"></span>
         </span>
         <input type="email" class="form-control" placeholder="Email address" name="user_email" id="user_email" />
         <span id="check-e"></span>
         </div>

         <div class="form-group input-group">
         <span class="input-group-addon">
           <span class="glyphicon glyphicon-lock"></span>
         </span>
         <input type="password" class="form-control" placeholder="Password" name="password" id="password_id" />
         </div>

         <div class="form-group input-group">
         <span class="input-group-addon">
           <span class="glyphicon glyphicon-lock"></span>
         </span>
         <input type="password" class="form-control" placeholder="Confirm Password" name="cpassword" id="cpassword_id" />
         </div>

         <div class="form-group input-group">
         <span class="input-group-addon">
           <span class="glyphicon glyphicon-calendar"></span>
         </span>
         <input type="date" class="form-control" name="dob" id="dob" />
         </div>

         <div class="form-group">
         <label for="country" class="control-label" />
         <select id="country" name="country" class="form-control">
           <option value="IND">India</option>
           <option value="USA">United States</option>
           <option value="UK">United Kingdom</option>
           <option value="GER">Germany</option>
           <option value="JPN">Japan</option>
           <option value="CHN">China</option>
           <option value="PAK">Pakistan</option>
         </select>
         </div>
         <div class="form-group">
           <label for="gender" style="color:black;">Gender : </label>
            <label class="radio-inline"><input type="radio" name="gender" id="femaleRadio" value="F"><font color="black">Female</font></input></label>
            <label class="radio-inline"><input type="radio" name="gender" id="maleRadio" value="M"><font color="black">Male</font></input></label>
            <label class="radio-inline"><input type="radio" name="gender" id="femaleRadio" value="O"><font color="black">Other</font></input></label>

         </div>
         <div class="text-center">
           <button type="button" onclick="showLoginForm();" class="btn btn-primary cancel" name="btn-back" id="btn-back" >
           <span class="glyphicon glyphicon-transfer"></span> &nbsp; Back
           </button>
           <button type="submit" class="btn btn-primary" name="btn-register" id="btn-register" >
           <span class="glyphicon glyphicon-user"></span> &nbsp; Register
           </button>
         </div>
         </form>
      </div>
    </div>

</div>
</body>
</html>
