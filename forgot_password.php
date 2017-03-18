<?php require 'inc/config.php'; ?>
<?php require 'inc/views/template_head_start.php'; ?>
<?php require 'inc/views/template_head_end.php'; ?>
<?php
if(isset($_SESSION['user']) && !empty($_SESSION['user'])){
  $_SESSION['msg'] = "Already logged in!";
  header("location: index.php");
}
?>

<!-- Reminder Content -->
<div class="bg-white pulldown">
    <div class="content content-boxed overflow-hidden">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 col-lg-4 col-lg-offset-4">
                <div class="push-30-t push-20 animated fadeIn">
                    <!-- Reminder Title -->
                    <div class="text-center">
                      <img class="img-responsive pull-b" src="<?php echo $one->assets_folder; ?>/img/logo.jpg" alt="">
                        <p class="text-muted push-15-t">Don’t worry, we’ll send a reset link to you.</p>
                    </div>
                    <!-- END Reminder Title -->

                    <!-- Reminder Form -->
                    <!-- jQuery Validation (.js-validation-reminder class is initialized in js/pages/base_pages_reminder.js) -->
                    <!-- For more examples you can check out https://github.com/jzaefferer/jquery-validation -->
                    <form class="js-validation-reminder form-horizontal push-30-t" action="base_pages_reminder_v2.php" method="post">
                      <div class="form-group">
                          <div class="col-xs-12">
                              <div class="form-material form-material-primary floating">
                                  <div class="alert alert-danger alert-dismissable fade in" id="add_err">
                                      <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                      Wrong email !
                                  </div>
                              </div>
                          </div>
                      </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <div class="form-material form-material-primary floating">
                                    <input class="form-control" type="email" id="forgot-email" name="forgot-email">
                                    <label for="reminder-email">Enter Your Email</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12 col-sm-6 col-sm-offset-3">
                                <button id="forgot" class="btn btn-sm btn-block btn-primary" type="submit">Reset Password</button>
                            </div>
                        </div>
                    </form>
                    <!-- END Reminder Form -->

                    <!-- Extra Links -->
                    <div class="text-center push-50-t">
                        <a href="login.php">Login?</a>
                    </div>
                    <!-- END Extra Links -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END Reminder Content -->

<!-- Reminder Footer -->
<div class="pulldown push-30-t text-center animated fadeInUp">
    <small class="text-muted"><span class="js-year-copy"></span> &copy; <?php echo $one->name . ' ' . $one->version; ?></small>
</div>
<!-- END Reminder Footer -->

<?php require 'inc/views/template_footer_start.php'; ?>

<script>
$(document).ready(function(){
  $("#add_err").css('display', 'none', 'important');
   $("#forgot").click(function(){
      username=$("#forgot-email").val();
      $.ajax({
       type: "POST",
       url: "action_forgot.php",
      data: "username="+username,
       success: function(html){
      if(html=='true')    {
       $("#add_err").replaceWith('<div class="alert alert-success alert-dismissable fade in" id="add_err"><a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>A reset mail sussessfully sent to your email</div>');
      }
      else    {
        $("#loader").replaceWith('<button id="forgot" class="btn btn-sm btn-block btn-primary" type="submit">Reset Password</button>');
        $("#add_err").css('display', 'inline', 'important');
      }
       },
       beforeSend:function()
       {
      $("#forgot").replaceWith("<img id='loader' style='height:50px' src='assets/img/loading.gif'>");
       }
      });
    return false;
  });
});
</script>

<!-- Page JS Plugins -->
<script src="<?php echo $one->assets_folder; ?>/js/plugins/jquery-validation/jquery.validate.min.js"></script>

<!-- Page JS Code -->
<script src="<?php echo $one->assets_folder; ?>/js/pages/base_pages_reminder.js"></script>

<?php require 'inc/views/template_footer_end.php'; ?>
