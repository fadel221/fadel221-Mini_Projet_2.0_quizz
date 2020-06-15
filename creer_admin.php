<?php 
$username="fadhilou";
$password="Mouhamadou1998";
$host="mysql-fadhilou.alwaysdata.net";
$dbname="fadhilou_root";

					/*------------------- Tentative de connexion à la BD --------------------*/

try
{
	
	$conn=new PDO("mysql:host=$host;dbname=$dbname",$username,$password);
	$conn->setattribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

}
					/*------------------- Tentative de connexion à la BD --------------------*/
						

catch (PDOEXCEPTION $e)
{
	 echo "Erreur ".$e->getMessage();
}





?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="jquery-3.5.1.js"></script>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

	<div id="content-creer-admin">

<form method="post" enctype="multipart/form-data" id="form-connexion">

		<div id="form-creer-admin">
			
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


		</div>

		<div id="creer-admin-avatar">

			<div id="deco-elipse-admin">
				<img  src="Images Desktop/humaaan.png" id="avatar-inscription">

				<div id="input-file">
				
					<input type="file" name="image" required="required" id="image">
				
				</div>

			</div>
	</div>

</form>

	</div>

</body>
</html>

<script>
var prenom=$('#input-inscription1');
var nom=$('#input-inscription2');	
var login=$('#input-inscription3');
var password=$('#input-inscription4');
var confirm=$('#input-inscription5')
var error_login=$('#validation-form3');
var error_pwd=$('#validation-form4');
var error_prenom=$('#validation-form1');
var error_nom=$('#validation-form2');
var error_confirm=$('#validation-form5');
var image=$('#image').prop('files')[0];
$('form').submit(function(e)
{
	e.preventDefault();
		if (login.val().trim()=='')
		{
		
			error_login.text('Champ Obligatoire');
			
		}
		else
		{
			error_login.text('');
		}
		if (password.val().trim()=='')
		{
			error_pwd.text('Champ Obligatoire');
			
		}
		else{
			error_pwd.text('');
			}
		if (prenom.val().trim()=='')
		{
			
			error_prenom.text('Champ Obligatoire');
		}
		else
		{
			error_prenom.text('');
		}
		if (nom.val().trim()=='')
		{
			
			error_nom.text('Champ Obligatoire');
		}
		else
		{
			error_nom.text('');
		}
		if (confirm.val().trim()=='')
		{
			
			error_confirm.text('Champ Obligatoire');
		}
		else
		{
			error_confirm.text('');
		}

		if (password.val().trim()!=confirm.val().trim())
		{
			error_confirm.text('Mot de passe différent');
			
		}
	

	$.post('creer_admin.php',
	{prenom:prenom.val(),nom:nom.val(),login:login.val(),password:password.val(),confirm:confirm.val()},
	function(){
		alert('Enregistrement fait avec succés <3');	
		
	})
})

</script>

<?php 

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
								
				
									
							                $prenom=$_POST["prenom"];
							                $nom=$_POST["nom"];
							                $login=$_POST["login"];
							                $password=$_POST["password"];
							                $role="admin";
							                $query = "INSERT INTO Utilisateur (idUser, login, prenom, nom, password, avatar, role,statut) VALUES (NULL,'$login','$prenom','$nom','$password','Images Profiles/Anime32.png','$role','autorise')";
											$sql=$conn->prepare($query);
											$sql->execute();
											if ($sql!="FALSE")
											{
												unset($_POST["inscription"]);
												unset($_POST["confirm"]);
												$_POST["role"]="admin";
												
												$_SESSION=$_POST;
												exit();
											}
											else
												echo "<script> alert('Erreur'); </script>";
										

								}
							}	
						}		
					}	
				}					
			}
		
		
	
 ?>