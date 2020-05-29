<?php 
session_start();
$username="fadel";
$password="Mouhamadou1998";
$host="mysql-fadel.alwaysdata.net";
$dbname="fadel_bd_quizz";
$conn=mysqli_connect($host,$username,$password,$dbname) or die('Erreur');
 ?>


<!DOCTYPE html>
<html>
<head>
	<title>Page de Connexion</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>


		<div id="header" class="container-fluid">
			<img src="Images Desktop/aperture.png" id="logo-projet">
			<h1 id ="text-header">LE PLAISIR DE JOUER</h1>
			<div id="content-logo">
				<div id="logo-reseaux_sociaux">
					<img src="Images Desktop/facebook.png">
				</div>	

				<div id="logo-reseaux_sociaux">
					<img src="Images Desktop/instagram.png">
				</div>

				<div id="logo-reseaux_sociaux">
					<img src="Images Desktop/mail.png">
				</div>

			</div>

		</div>

			<div id="content" class="container-fluid">

				<div id="content-login">
					<div id="content-header-login" class="container">
						LOGIN FORM
						<div id="trait-login">
							
						</div>
					</div>
				<form method="post" id="form-connexion" class="form-group">
					<div class="content-form">
						<input type="text" name="login" id="input" placeholder="toto@gmail.com">
						
						<div id="deco-elipse">
							<img src="Images Desktop/mail1.png" id= "img-mail">
						</div>

					</div>
					<div id="validation-form1">
						*
					</div>

					<div class="content-form">
						<input type="password" name="password" id="password" placeholder="........">
					<div id="deco-elipse">
							<img src="Images Desktop/mdi_vpn_key .png" id= "img-cle">
						</div>

					</div>
					<div id="validation-form2">
						*
					</div>

					<div id="content-bouton">
						<input type="submit" name="valider" value="Sign In" id="bouton-valider">
					</div>

					<div id="link">
					<a href="page_inscription.php"align="center" align="center" id="link-inscription">Link to subscrite an account</a>	
					</div>

				</div>
				</form>
				<div id="content-avatar">
					<img src="Images Desktop/Sitting.png" id="img-human1">
				</div>
				</div>
			
			

		</div>
	

</body>

</html>



<script type="text/javascript">

var login=document.getElementById('input');
var password=document.getElementById('password');
var form=document.getElementById('form-connexion');
var error_login=document.getElementById('validation-form1');
var error_pwd=document.getElementById('validation-form2');
form.addEventListener('submit',function(e){
		if (login.value.trim()=='')
		{
		
			error_login.textContent='Champ Obligatoire';
			e.preventDefault();
		}
		else
		{
			error_login.textContent='';
		}
		if (password.value.trim()=='')
		{
			error_pwd.textContent='Champ Obligatoire';
			e.preventDefault();
		}
		else{
			error_login.textContent='';
			}

})

</script>


<?php 

	if (!empty ($_POST["login"]) && !empty ($_POST["password"]))
	{
		$login=$_POST["login"];
		$password=$_POST["password"];
		$query2="SELECT * FROM Utilisateur where login='".$login."' AND password='".$password."'";
		$result=mysqli_query($conn,$query2);
			if ($result===true)
			{
				if ($login=='admin' && $password=='admin')
				{
				header("Location:menu_admin.php");
				}
				else
				{
				$_SESSION["username"]=$username;
				$_SESSION["password"]=$password;
				header("Location:page_joueur.php");
				exit();
				}
			}
			else
	{
		echo "<script> alert('Erreur '); </script>";	
	}

	}

	

 ?>


 
