<?php require 'inc/config.php'; ?>
<?php require 'inc/views/template_head_start.php'; ?>
<?php require 'inc/views/template_head_end.php'; ?>
<?php
if(isset($_SESSION['user']) && !empty($_SESSION['user'])){
  $_SESSION['msg'] = "Already logged in!";
  header("location: index.php");
}
?>

<!-- Login Content -->
<div class="bg-white pulldown">
    <div class="content content-boxed overflow-hidden">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 col-lg-4 col-lg-offset-4">
                <div class="push-30-t push-50 animated fadeIn">
                    <!-- Login Title -->
                    <div class="text-center">
                      <img class="img-responsive pull-b" src="<?php echo $one->assets_folder; ?>/img/logo.jpg" alt="">

                    </div>
                    <!-- END Login Title -->

                    <!-- Login Form -->
                    <!-- jQuery Validation (.js-validation-login class is initialized in js/pages/base_pages_login.js) -->
                    <!-- For more examples you can check out https://github.com/jzaefferer/jquery-validation -->
                    <form class="js-validation-login form-horizontal push-30-t" action="./" method="post">
                      <div class="form-group">
                          <div class="col-xs-12">
                              <div class="form-material form-material-primary floating">
                                  <div class="alert alert-danger alert-dismissable fade in" id="add_err">
                                      <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                      Wrong username or password !
                                  </div>
                              </div>
                          </div>
                      </div>

                        <div class="form-group">
                            <div class="col-xs-12">
                                <div class="form-material form-material-primary floating">
                                    <input class="form-control" type="text" id="username" name="username" required>
                                    <label for="login-username">Username</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <div class="form-material form-material-primary floating">
                                    <input class="form-control" type="password" id="password" name="password" required>
                                    <label for="login-password">Password</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-6">
                                <label class="css-input switch switch-sm switch-primary">
                                    <input type="checkbox" id="remember" name="remember" value="yes"><span></span> Remember Me?
                                </label>
                            </div>
                            <div class="col-xs-6">
                                <div class="font-s13 text-right push-5-t">
                                    <a href="forgot.php">Forgot Password?</a>
                                </div>
                            </div>
                        </div>
                        <div class="form-group push-30-t">
                            <div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
                                <button class="btn btn-sm btn-block btn-primary" type="submit" id="login">Log in</button>
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
<div class="pulldown push-30-t text-center animated fadeInUp">
    <small class="text-muted"><span class="js-year-copy"></span> &copy; <?php echo $one->name . ' ' . $one->version; ?></small>
</div>
<!-- END Login Footer -->

<?php require 'inc/views/template_footer_start.php'; ?>

<script>
$(document).ready(function(){
  $("#add_err").css('display', 'none', 'important');
   $("#login").click(function(){
      username=$("#username").val();
      password=$("#password").val();
      remember=$("#remember").val();
      $.ajax({
       type: "POST",
       url: "action_login.php",
      data: "username="+username+"&password="+password+"&remember="+remember,
       success: function(html){
      if(html=='true')    {
       //$("#add_err").html("right username or password");
       window.location="index.php";
      }
      else    {
        $("#loader").replaceWith("<button class='btn btn-sm btn-block btn-primary' type='submit' id='login'>Log in</button>");
        $("#add_err").css('display', 'inline', 'important');
      }
       },
       beforeSend:function()
       {
      $("#login").replaceWith("<img id='loader' style='height:50px' src='assets/img/loading.gif'>");
       }
      });
    return false;
  });
});
</script>

<!-- Page JS Plugins -->
<script src="<?php echo $one->assets_folder; ?>/js/plugins/jquery-validation/jquery.validate.min.js"></script>

<!-- Page JS Code -->
<script src="<?php echo $one->assets_folder; ?>/js/pages/base_pages_login.js"></script>

<?php require 'inc/views/template_footer_end.php'; ?>
