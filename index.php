<?php 
session_start(); 
if (!empty($_SESSION))
	{
		session_destroy();
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Page de Connexion</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="jquery-3.5.1.js"></script>
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
					<a href="page_inscription.php" align="center" id="link-inscription">Link to subscrite an account</a>	
					</div>

				</div>
				</form>
				<div id="content-avatar">
					<img src="Images Desktop/Sitting.png" id="img-human1">
				</div>

				</div>
			
			

		</div>
		

</body>
<footer>

	<div id="logo-footer-quizz">
			
	</div>	
	
	<div id="logo-footer">

	</div>	

	<div id="logo-footer-SA">
		
	</div>
</footer>
</html>



<script>

				/*------------------- Validation avec Jquery --------------------*/

var login=$('#input');
var password=$('#password');
var form=$('#form-connexion');
var error_login=$('#validation-form1');
var error_pwd=$('#validation-form2');
form.submit(function(e){
		if (login.val()=='')
		{
			error_login.text('Champ Obligatoire');
			e.preventDefault();
		}
		else
		{
			error_login.text('');
		}
		if (password.val()=='')
		{
			error_pwd.text('Champ Obligatoire');
			e.preventDefault();
		}
		else
			{
			error_pwd.text('');
			}

})
				/*------------------- Validation avec Jquery --------------------*/

</script>


<?php 

if (!empty($_POST["login"]) && !empty($_POST["password"]) && isset($_POST["login"]) && isset ($_POST["password"]))
{ 
	$username="fadhilou";
	$password="Mouhamadou1998";
	$host="mysql-fadhilou.alwaysdata.net";
	$dbname="fadhilou_root";

			/*------------------- Tentative de connexion à la BD --------------------*/

	try
	{
		
		$conn=new PDO("mysql:host=$host;dbname=$dbname",$username,$password);
		$conn->setattribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		$login=$_POST["login"];
		$password=$_POST["password"];
		$sql=$conn->query("SELECT * FROM Utilisateur WHERE login='$login' AND password='$password'");
		if ($sql!="FALSE")
		{
			$row=$sql->fetch(PDO::FETCH_ASSOC);
			$_SESSION=$row;
			if ($row['role']=='player' && $row['statut']=='autorise')
			header("Location:page_joueur.php");
			else 
				if($row['role']=='admin' && $row['statut']=='autorise')
					header("Location:menu_admin.php");
			else
				if ($row['statut']!='autorise')
				{
					echo '<script> alert("Vous avez été bloqué par l\'admin") </script>';
				}
		}

	}
			/*------------------- Tentative de connexion à la BD --------------------*/
							

	catch (PDOEXCEPTION $e)
	{
 		echo "Erreur ".$e->getMessage();
	}


} 	

	

?>


 
