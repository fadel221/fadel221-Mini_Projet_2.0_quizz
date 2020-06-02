<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
  	
  </script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
	
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
	
</script>
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
				
					<input type="file" name="image" required="required">
				
				</div>

			</div>
	</div>

</form>

	</div>

</body>
</html>

<script type="text/javascript">

var prenom=document.getElementById('input-inscription1');
var nom=document.getElementById('input-inscription2');	
var login=document.getElementById('input-inscription3');
var password=document.getElementById('input-inscription4');
var confirm=document.getElementById('input-inscription5')
var form=document.getElementById('form-connexion');
var error_login=document.getElementById('validation-form3');
var error_pwd=document.getElementById('validation-form4');
var error_prenom=document.getElementById('validation-form1');
var error_nom=document.getElementById('validation-form2');
var error_confirm=document.getElementById('validation-form5');

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
			error_pwd.textContent='';
			}
		if (prenom.value.trim()=='')
		{
			e.preventDefault();
			error_prenom.textContent='Champ Obligatoire';
		}
		else
		{
			error_prenom.textContent='';
		}
		if (nom.value.trim()=='')
		{
			e.preventDefault();
			error_nom.textContent='Champ Obligatoire';
		}
		else
		{
			error_nom.textContent='';
		}
		if (confirm.value.trim()=='')
		{
			e.preventDefault();
			error_confirm.textContent='Champ Obligatoire';
		}
		else
		{
			error_confirm.textContent='';
		}

		if (password.value.trim()!=confirm.value.trim())
		{
			error_confirm.textContent='Mot de passe différent';
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
							                $query = "INSERT INTO `Utilisateur` (`idUser`, `login`, `prenom`, `nom`, `password`, `avatar`, `role`) VALUES (NULL,'$login','$prenom','$nom','$password','$file_dest','$role')";
											$result=mysqli_query($conn,$query);
											if($result===true)
											{
												unset($_POST["inscription"]);
												unset($_POST["confirm"]);
												$_POST["role"]="admin";
												$_POST["image"]=$file_dest;
												$_SESSION=$_POST;
												echo "<script type='text/javascript'> alert('Enregistrement effectué avec succés'); 
													document.location.href='index.php';

												</script>";
												exit();
											}
											else
											{
												echo "<script type='text/javascript'> alert('Erreur'); </script>";
												exit();
											}
										}
										else
										{
											echo "<script> alert('Le format de la photo doit etre PNG ou JPEG');</script>";
											exit();
										}
								}
							}	
						}		
					}	
				}					
			}
		}
	}
 ?>