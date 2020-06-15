<?php 
session_start();

						/*------------------- Tentative de connexion à la BD --------------------*/

try
{
	$username="fadhilou";
	$password="Mouhamadou1998";
	$host="mysql-fadhilou.alwaysdata.net";
	$dbname="fadhilou_root";	
	$conn=new PDO("mysql:host=$host;dbname=$dbname",$username,$password);
	$conn->setattribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	
}
						/*------------------- Tentative de connexion à la BD --------------------*/

catch (PDOEXCEPTION $e)
{
		echo "Erreur ".$e->getMessage();
}
 ?>
<!---------------------------------------------------------------------------------------->
<!DOCTYPE html>
<html>
<head>
	<title>Page d'Insciption</title>
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

		<div class="container-fluid">
			
		
<div id="content-inscription">

<form id="form-connexion" method="post" enctype="multipart/form-data" class="form-group">

	<div id="content-inscription-form">

		<div class="height-input">

			<input type="text" name="prenom" placeholder="Prenom" id="input-inscription1">
		
		</div>
		<div id="validation-form1">
						*
					</div>	

		<div class="height-input">

			<input type="text" name="nom" placeholder="Nom" id="input-inscription2">
		
		</div>

			<div id="validation-form2">
						*
			</div>	

		<div class="height-input">

			<input type="text" name="login" placeholder="Login" id="input-inscription3">
		
		</div>

			<div id="validation-form3">
						*
			</div>	

		<div class="height-input">

			<input type="password" name="password" placeholder="Password" id="input-inscription4">
		
		</div>
		
				<div id="validation-form4">
						*
				</div>	

		<div class="height-input">

			<input type="password" name="confirm" placeholder="Confirmer votre password" id="input-inscription5">

		</div>
			<div id="validation-form5">
					*
				</div>	

			<div class="height-input">

			<input type="submit" name="inscription" value="Create account"  id="bouton-inscription">
			
			</div>
	
	</div>

	<div id="content-inscription-avatar">

			<div id="deco-elipse-inscription">
				<img  src="Images Desktop/humaaan.png" id="avatar-inscription">

				<div id="input-file">

				<input type="file" name="image" required="required">

				</div>
				
			</div>
	</div>


</form>
			
</div>
</div>
	
</body>
<footer id="footer-inscription">

	<div id="logo-footer-quizz">
			
	</div>	
	
	<div id="logo-footer">

	</div>	

	<div id="logo-footer-SA">
		
	</div>
</footer>
</html>

<script>
var prenom=$('#input-inscription1');
var nom=$('#input-inscription2');	
var login=$('#input-inscription3');
var password=$('#input-inscription4');
var confirm=$('#input-inscription5')
var form=$('#form-connexion');
var error_login=$('#validation-form3');
var error_pwd=$('#validation-form4');
var error_prenom=$('#validation-form1');
var error_nom=$('#validation-form2');
var error_confirm=$('#validation-form5');
form.submit(function(e){
		if (login.val().trim()=='')
		{
		
			error_login.text('Champ Obligatoire');
			e.preventDefault();
		}
		else
		{
			error_login.text('');
		}
		if (password.val().trim()=='')
		{
			error_pwd.text('Champ Obligatoire');
			e.preventDefault();
		}
		else{
			error_pwd.text('');
			}
		if (prenom.val().trim()=='')
		{
			e.preventDefault();
			error_prenom.text('Champ Obligatoire');
		}
		else
		{
			error_prenom.text('');
		}
		if (nom.val().trim()=='')
		{
			e.preventDefault();
			error_nom.text('Champ Obligatoire');
		}
		else
		{
			error_nom.textContent='';
		}
		if (confirm.val().trim()=='')
		{
			e.preventDefault();
			error_confirm.text('Champ Obligatoire');
		}
		else
		{
			error_confirm.text('');
		}

		if (password.val().trim()!=confirm.val().trim())
		{
			error_confirm.text('Mot de passe différent');
			e.preventDefault();
		}

})

</script>

<?php 
	if (!empty($_POST["inscription"]))
	{
		if (isset($_POST["prenom"]) && !empty ($_POST["prenom"]))
		{
				if (isset($_POST["nom"]) && !empty ($_POST["nom"]))
			{
					if (isset($_POST["login"]) && !empty ($_POST["login"]))
				{
						if (isset($_POST["password"]) && !empty ($_POST["password"]))
						{
							if (isset($_POST["confirm"]) && !empty ($_POST["confirm"]))
							{
								if ($_POST["password"]==$_POST["confirm"])
								{
									if (isset($_FILES["image"]) && !empty($_FILES["image"]))
									{

										$file_name=$_FILES["image"]["name"];
	             						$file_extension=strrchr($file_name, ".");
	            						$extensions_autorisés=array(".PNG",".png",".JPEG",".jpeg");

	                    				if (in_array($file_extension,$extensions_autorisés))
	                 					{

							                $file_tmp_name=$_FILES["image"]["tmp_name"];
							                $file_dest="Images Profils/"."".$file_name;   
							                move_uploaded_file($file_tmp_name,$file_dest);
							                $prenom=$_POST["prenom"];
							                $nom=$_POST["nom"];
							                $login=$_POST["login"];
							                $password=$_POST["password"];
							                $role="player";
							                $query = "INSERT INTO `Utilisateur` (`idUser`, `login`, `prenom`, `nom`, `password`, `avatar`, `role`,`statut`) VALUES (NULL,'$login','$prenom','$nom','$password','$file_dest','$role','autorise')";
											$sql=$conn->prepare($query);
											$sql->execute();
											if ($sql!="FALSE")
											{
												unset($_POST["inscription"]);
												unset($_POST["confirm"]);
												$_POST["role"]="player";
												$_POST["image"]=$file_dest;
												$_SESSION=$_POST;

												echo "<script> 

												alert('Enregistrement effectué avec succés'); 
													document.location.href='index.php';

												</script>";
												exit();
											}
											else
												echo "<script> alert('Erreur'); </script>";
										}
										else
										echo "<script> alert('Le format de la photo doit etre PNG ou JPEG');</script>";

								}
							}	
						}		
					}	
				}					
			}
		}
		
	}
 ?>