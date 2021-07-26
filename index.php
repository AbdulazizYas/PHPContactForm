<?php
  //Check the request Method
  if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $user = filter_var($_POST['username'],FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['useremail'],FILTER_SANITIZE_EMAIL);
    $phone = filter_var($_POST['userphone'],FILTER_SANITIZE_NUMBER_INT);
    $msg = filter_var($_POST['msg'],FILTER_SANITIZE_STRING);

    //Check form Errors
    $formErrors =  array();

    if(strlen($user) < 5){
      $formErrors[] = 'User Name Must Be Larger Than <strong>5</strong> Charactars !';
    }
    if(strlen($msg) < 12){
      $formErrors[] = 'The Message Must Be Larger Than <strong>12</strong> Letters !';
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/all.css">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/style.css">
  <link href="https://fonts.googleapis.com/css2?family=PT+Sans:wght@400;700&display=swap" rel="stylesheet">
  <title>Contact Form</title>
</head>
<body>
  <div class="container">
    <h1 class="text-center">Contact Us</h1>

    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">

    <?php  if(!empty($formErrors)){ ?>

      <div class="errors alert alert-danger" role="alert"">

        <?php
          foreach($formErrors as $err){
            echo $err . '<br>';
          }?>
      </div>
    <?php } ?>
    <div class="form-group">

      <input class="form-control" type="text" name="username" placeholder="Type Your Username . ." value="<?php if(isset($user)){ echo $user;}?>">

      <i class="fas fa-user fa-fw"></i>
      <span class="aster">*</span>
        </div>
      <div class="form-group">
      <input class="form-control" type="email" name="useremail" placeholder="Type Your E-mail Address . ." value="<?php if(isset($email)){ echo $email;}?>">

      <i class="far fa-envelope fa-fw"></i>
      <span class="aster">*</span>
    </div>
      <input class="form-control" type="text" name="userphone" placeholder="Type Your Cell-Phone . ." value="<?php if(isset($phone)){ echo $phone;}?>">

      <i class="fas fa-phone-alt fa-fw"></i>
    <div class="form-group">
      <textarea class="form-control" name="msg" placeholder="Type Your Message !"><?php if(isset($msg)){ echo $msg;}?></textarea>
      <span class="aster">*</span>
    </div>
      <input class="btn btn-success" type="submit" value="Send UR Message !">

      <i class="fas fa-paper-plane fa-fw"></i>
    </form>
  </div>
  <script src="js/jq.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/script.js"></script>
</body>
</html>