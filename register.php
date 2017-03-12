<?php require 'inc/config.php'; ?>
<?php require 'inc/db_config.php'; ?>
<?php require 'inc/views/template_head_start.php'; ?>
<?php require 'inc/views/template_head_end.php';  ?>

<?
if(isset($_POST['submit'])) {
  $name = mysqli_real_escape_string($mysqli,$_POST['register-name']);
  $pwd = mysqli_real_escape_string($mysqli,$_POST['register-password']);
  $cpwd = mysqli_real_escape_string($mysqli,$_POST['register-cpassword']);
  $email = mysqli_real_escape_string($mysqli,$_POST['register-email']);
  $cnum = mysqli_real_escape_string($mysqli,$_POST['register-phone']);
  $gender =  mysqli_real_escape_string($mysqli,$_POST['gender']);
  $bool = true;
  $encrypted_password = password_hash($pwd, PASSWORD_DEFAULT);
  $date = date("jS F Y h:i A");

  if($pwd == $cpwd) {
    $query = mysqli_query($mysqli, "Select * from users"); //Query the users table

    while($row = mysqli_fetch_array($query)) //display all rows from query
    {
      $table_users = $row['user_email']; // the first username row is passed on to $table_users, and so on until the query is finished
      if($email == $table_users) // checks if there are any matching fields
      {
        $bool = false; // sets bool to false
        Print '<script>alert("This email is already registered with us!");</script>'; //Prompts the user
        Print '<script>window.location.assign("register.php");</script>'; // redirects to register.php
      }
    }

    if($bool) // checks if bool is true
    {
      mysqli_query($mysqli, "INSERT INTO users (user_name, user_email, mobile, hash, gender, created_date, active) VALUES ('$name','$email','$cnum','$encrypted_password','$gender','$date',1)");

      if (mysqli_affected_rows($mysqli) == 1) {
        $_SESSION['status'] = true;
        $message = "Register Successfull";
        header("location: register.php");
      }
      else {
        $_SESSION['status'] = false;
        $bool = false; // sets bool to false
        header("location: register.php");
      }

    }

  }
}
?>

<!-- Login Content -->
<div class="bg-white push-30">
    <div class="content content-boxed overflow-hidden">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 col-lg-4 col-lg-offset-4">
                <div class="push-30-t push-50 animated fadeIn">
                    <div class="text-center">
                      <img class="img-responsive pull-b" src="<?php echo $one->assets_folder; ?>/img/logo.jpg" alt="">

                    </div>

                    <form class="js-validation-login form-horizontal push-30-t" action="register.php" method="post">
                      <div class="form-group">
                          <div class="col-xs-12">
                              <div class="form-material form-material-primary floating" id="status">
                                <? if(isset($_SESSION['status']) && $_SESSION['status'] == false) {
                                  echo '<div class="alert alert-danger alert-dismissable fade in" id="add_err">
                                      <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                      Registration unsuccessful !
                                  </div>';
                                  session_unset('status');
                                } else if(isset($_SESSION['status']) && $_SESSION['status'] == true){
                                  echo '<div class="alert alert-success alert-dismissable fade in" id="add_err">
                                      <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                      Registration successful !
                                  </div>';
                                  session_unset('status');
                                }
                                ?>
                              </div>
                          </div>
                      </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <div class="form-material form-material-primary floating">
                                    <input class="form-control" type="text" id="register-name" name="register-name">
                                    <label for="register-name">Name</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <div class="form-material form-material-primary floating">
                                    <input class="form-control" type="text" id="register-email" name="register-email" onBlur="checkAvailability()">
                                    <label for="register-email">Email</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <div class="form-material form-material-primary floating">
                                  <div id='availability-status'></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <div class="form-material form-material-primary floating">
                                    <input class="form-control" type="number" id="register-phone" name="register-phone">
                                    <label for="register-phone">Phone No</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <div class="form-material form-material-primary floating">
                                    <input class="form-control" type="password" id="register-password" name="register-password">
                                    <label for="register-password">Password</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <div class="form-material form-material-primary floating">
                                    <input class="form-control" type="password" id="register-cpassword" name="register-cpassword">
                                    <label for="register-cpassword">Confirm Password</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-xs-12">Gender</label>
                            <div class="col-xs-12">
                                <label class="radio-inline" for="gender">
                                    <input type="radio" id="gender-male" name="gender" value="Male"> Male
                                </label>
                                <label class="radio-inline" for="gender">
                                    <input type="radio" id="gender-female" name="gender" value="Female"> Female
                                </label>
                            </div>
                        </div>
                        <div class="form-group push-30-t">
                            <div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
                                <button id="submit-btn" class="btn btn-sm btn-block btn-primary" name="submit" type="submit">Register</button>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
                                <a href="index.php" id="home-btn" class="btn btn-sm btn-block btn-default">Go home</a>
                            </div>
                        </div>
                    </form>
                    <!-- END Login Form -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END Login Content -->

<!-- Login Footer -->
<div class="push-30 text-center animated fadeInUp">
    <small class="text-muted"><span class="js-year-copy"></span> &copy; <?php echo $one->name . ' ' . $one->version; ?></small>
</div>
<!-- END Login Footer -->

<?php require 'inc/views/template_footer_start.php'; ?>
<script>
function checkAvailability() {
    document.getElementById("submit-btn").disabled = true;
    jQuery.ajax({
        url: "check_email.php",
        data:'email='+$("#register-email").val(),
        type: "POST",
        success:function(data){
            $("#availability-status").html(data);
            if(data != "") {
                document.getElementById("submit-btn").disabled = true;
            } else {
                document.getElementById("submit-btn").disabled = false;
            }
        },
        error:function (){}
    });
}
</script>
<!-- Page JS Plugins -->
<script src="<?php echo $one->assets_folder; ?>/js/plugins/jquery-validation/jquery.validate.min.js"></script>

<!-- Page JS Code -->
<script src="<?php echo $one->assets_folder; ?>/js/pages/base_pages_login.js"></script>

<?php require 'inc/views/template_footer_end.php'; ?>
