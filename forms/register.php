<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Registration Page</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../../plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]--> <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script type="text/javascript">
	  function insertrecord()
	  {
	  		var FormHasError=false;
			var  username=$('#username').val();
			var  mails=$('#mails').val();
	  		var  phnno=$('#phnno').val();	
	  		var  passwords=$('#passwords').val();
	  		var  cnfrmpass=$('#cnfrmpass').val();
	  	if(username.length==0)
		  {
			  $('#trying').addClass('form-group has-error');
				FormHasError=true;
		  }
		  if(username.length>0)
			{
				$('#trying').removeClass();
				$('#trying').addClass('form-group');
			}
		if(mails.length==0)
			{
				$('#hard').addClass('form-group has-error');
				FormHasError=true;
			}
		   if(mails.length>0)
			{
				$('#hard').removeClass();
				$('#hard').addClass('form-group');
			}
		  if(phnno.length==0)
			{
				$('#for').addClass('form-group has-error');
				FormHasError=true;
			}
		   if(phnno.length>0)
			{
				$('#for').removeClass();
				$('#for').addClass('form-group');
			}
		  
		 
		 if(passwords!=cnfrmpass)
			 {
				 $('#you').addClass('form-group has-error');
				FormHasError=true;
			 }
		  if(passwords==cnfrmpass)
			  {
				  $('#you').removeClass();
				$('#you').addClass('form-group');
			  }
			
			
		  var status=0;
		  if(FormHasError==false)
			  {
				  $.ajax({
					 type:'POST',
					url:'../1library/mastertableregistergtw/registergw.php',
					data:{username:username,mails:mails,phnno:phnno,passwords:passwords},
					dataType:"JSON",
					beforeSend: function()
					{
						$('#Res').fadeIn(0);
					},
					success: function(data)
					{
						$('#Res').html(data[0].Message);
						$('#Res').addClass('alert alert-success');
						$('#Res').fadeOut(3000);
						
						$('username').val('');
						$('#mails').val('');
						$('#phnno').val('');
						$('#passwords').val('');
						
					},
					error:function(err)
					{
						console.log("error"+err);
						$('#Res').html(err);
						$('#Res').addClass('alert alert-danger');
						$('#Res').fadeOut(3000);
					} 
				  });
			  }
		  }
	</script>
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="../../index2.html"><b>Admin</b>LTE</a>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">Register a new membership</p>

    <form action="login.php" method="post">
      <div id="trying" class="form-group has-feedback">
        <input  name="username" id="username" type="text" class="form-control" placeholder="Full name">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div id="hard" class="form-group has-feedback">
        <input id="mails" name="mails" type="text" class="form-control" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div id="for" class="form-group has-feedback">
        <input id="phnno" name="phnno" type="number" class="form-control" placeholder="Mobile-No.">
        <span class="glyphicon glyphicon-phone form-control-feedback"></span>
      </div>
      <div id="you">
      <div id="" class="form-group has-feedback">
        <input id="passwords" name="passwords" type="password" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div id="" class="form-group has-feedback">
        <input type="password" id="cnfrmpass" name="cnfrmpass"  class="form-control" placeholder="Retype password">
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
      </div>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> I agree to the <a href="#">terms</a>
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <input type="button" onClick="insertrecord()" value="Register" class="btn btn-primary btn-block btn-flat">
        </div>
        <!-- /.col -->
      </div>
    </form>

    <div class="social-auth-links text-center">
      <p>- OR -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign up using
        Facebook</a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign up using
        Google+</a>
    </div>

    <a href="login.php" class="text-center">I already have a membership</a>
    <div id="Res"></div>
  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->

<!-- jQuery 2.2.3 -->
<script src="../../plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="../../bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="../../plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>
