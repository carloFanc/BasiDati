<?php
session_start();
require_once("class.user.php");
$login = new USER();
if(isset($_SESSION['user_tipologia']) && !empty($_SESSION['user_tipologia'])) {
  $tipologia = $_SESSION['user_tipologia'];
    
}
if($login->is_loggedin()!="")
{
	
	
	if(strcmp ($tipologia , "Semplice") ==0 ){
			$login->redirect('homeSemplice.php');
		}else if(strcmp ($tipologia , "Premium") ==0){
			$login->redirect('homePremium.php');
		}else if(strcmp ($tipologia , "Amministratore") ==0){
			$login->redirect('homeAmministratore.php');
		}
}

if(isset($_POST['btn-login'])) 
{
	$umail = strip_tags($_POST['form-mail']);
	$upass = strip_tags($_POST['form-password']);
	
	if($login->doLogin($umail,$upass))
	{
		$tipologia = $_SESSION['user_tipologia'];
		if(strcmp ($tipologia , "Semplice") ==0 ){
			$login->redirect('homeSemplice.php');
		}else if(strcmp ($tipologia , "Premium") ==0){
			$login->redirect('homePremium.php');
		}else if(strcmp ($tipologia , "Amministratore") ==0){
			$login->redirect('homeAmministratore.php');
		}
		
	}
	else
	{
		$error = "Dati Errati !";
	}	
}
?>
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Bootstrap Login &amp; Register Templates</title>

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="fonts/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="css/form-elementsLogin.css">
        <link rel="stylesheet" href="css/styleLogin.css">
       <link rel="stylesheet" href="css/jquery-ui.css">

        <link rel="shortcut icon" href="assets/ico/favicon.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="ico/apple-touch-icon-57-precomposed.png">

    </head>

    <body>

        <!-- Top content -->
        <div class="top-content">
        	
            <div class="inner-bg">
                <div class="container">
                	
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                            <h1>Benvenuto!</h1>
                        </div>
             </div>

					<div class="row">
						<div class="col-md-6 col-md-offset-3 ">

							<div class="form-box">
								<div class="form-top">
									<div class="form-top-left">
										<h3>Login</h3>
										<p>
											Inserisci email e password per entrare nel sito:
										</p>
									</div>
									
									<div class="form-top-right">
										<i class="fa fa-key"></i>
									</div>
								</div>
								<div id="error">
										<?php
												if(isset($error))
													{
										?>
										<div class="alert alert-danger">
											<i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $error; ?>
											!
										</div>
										<?php
																	}
										?>
									</div>
								<div class="form-bottom">
									<form role="form" action="" method="post" class="login-form">
										<div class="form-group">
											<label class="sr-only" for="form-mail">Email</label>
											<input type="email" name="form-mail" placeholder="Email..." class="form-username form-control" id="form-username">
										</div>
										<div class="form-group">
											<label class="sr-only" for="form-password">Password</label>
											<input type="password" name="form-password" placeholder="Password..." class="form-password form-control" id="form-password">
										</div>
										<button type="submit" name="btn-login" class="btn">
											Log in!
										</button>
									</form>
								</div>

		                    </div>
		                <label>Non hai ancora un account? <a href="indexsignup.php">Registrati</a></label>
		        
	                        
                    </div>
                    
                </div>
            </div>
            
        </div>

        
        <!-- Javascript -->
        <script src="js/jquery-1.11.1.min.js"></script>
         <script src="js/jquery-ui.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/scriptsLogin.js"></script>

    </body>

</html>