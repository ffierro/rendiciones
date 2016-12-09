<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>PHP Login Form</title>
<meta name="description" content="">
<meta name="viewport" content="width=device-width">
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/main.css">


</head>


<body>

<div class="container">
  <div class="row" style="margin-top:20px">
    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
      <form name="form_login" method="post" action="php/login.php" role="form">
        <fieldset>
          <center><h2 style="background: #999;"><?php echo strtoupper('Ingrese su credencial'); ?></h2></center>
          <hr class="colorgraph">
          <div class="form-group">
            <input name="email" type="email" id="user_id" class="form-control input-lg" placeholder="Ingrese Su Email">
          </div>
          <div class="form-group">
            <input type="password" name="password" id="password" class="form-control input-lg" placeholder="Ingrese Aquí su Password">
          </div>
          <span class="button-checkbox">
          <input type="checkbox" name="remember_me" id="remember_me" checked="checked" class="hidden">
          <hr class="colorgraph">
          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
              <input type="submit" name="Submit" value="Login" class="btn btn-lg btn-success btn-block">
            </div>
          </div>
        </fieldset>
      </form>
    </div>
  </div>
</div>
</body>
</html>