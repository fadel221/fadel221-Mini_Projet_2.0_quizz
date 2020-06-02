<?php 
session_start();
if (empty($_SESSION))
	header("Location:index.php");
$username="fadel";
$password="Mouhamadou1998";
$host="mysql-fadel.alwaysdata.net";
$dbname="fadel_bd_quizz";
$conn=mysqli_connect($host,$username,$password,$dbname) or die('Erreur');
$login=$_SESSION['login'];
$req="SELECT * FROM Utilisateur where login='$login'";
$result=mysqli_query($conn,$req);
$row=mysqli_fetch_assoc($result);
$_SESSION=$row;
$avatar=$row["avatar"];
?>


<!DOCTYPE html>
<html>
<head>
	<title>Menu Administrateur</title>
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

				<div id="logo-power">
					
				</div>	

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

				<div id="content-menu">

					<div id="content-avatar-menu">
						
						<div id="elipse-avatar-menu" style="background-image:url(<?php
                    echo $avatar?>);">
							
						</div>

						<div id="name-avatar-menu">
							<?php echo $_SESSION["prenom"].'<br>' 
									echo $_SESSION["nom"];
							; ?>
						</div>

					</div>

					<div id="content-option-menu">
						
						<a href="menu_admin.php?page=1">

							<div class="option">
							
							<div id="text-option">
								Liste Questions
							</div>
						

						
							<div class="icone-option-list1">
							
							</div>

						

						</div>

					</a>

					<a href="menu_admin.php?page=2">
						<div class="option">

							<div id="text-option">
								Creer Admin		
							</div>
						
							<div class="icone-option-creation1">
								
								

							</div>
						</div>

						</a>

						<a href="menu_admin.php?page=3">

							<div class="option">
							
							<div id="text-option">
								Liste Joueur
							</div>
						
							<div class="icone-option-list2">
								
							</div>
								
								

							</div>
						</a>
						

						<a href="menu_admin.php?page=4">

							<div class="option">

							<div id="text-option">
								Creer Questions
							</div>	
						

							<div class="icone-option-creation2">
								
								
							</div>	

						</div>
					</a>

					</div>

				</div>

				<div id="content-page">
					
	<?php 
		if (!empty($_GET["page"]))
			{
				switch ($_GET["page"]) 
				{
					case 1:
							require_once("lister_question.php");
							break;
					case 2:
							require_once("creer_admin.php");
							break;
					case 3:
							require_once("creer_question.php");
							break;

					case 4:
							require_once("lister_joueurs.php");
							break;
				}

			}

			else
			{
				require_once ("lister_joueurs.php");
			}



					 ?>

				</div>

			</div>

</body>
</html>









