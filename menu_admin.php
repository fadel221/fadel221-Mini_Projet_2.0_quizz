<?php 
session_start();
if (empty($_SESSION))
{
	header('Location:index.php');
}
$avatar=$_SESSION['avatar'];
?>



<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Menu Administrateur</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="jquery-3.5.1.js"></script>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

	<div id="header" class="container-fluid-sm">
			<img src="Images Desktop/aperture.png" id="logo-projet">
			<h1 id ="text-header" class="container">LE PLAISIR DE JOUER</h1>
			<div  id="content-logo">

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
						
						<div id="elipse-avatar-menu" style="background-repeat:no-repeat;background-size:130%;background-image:url('<?php
                     if (isset($avatar)) echo $avatar;?>');">
						</div>

						<div id="name-avatar-menu">

							<?php 
							if (!empty($_SESSION))
							{
								echo $_SESSION["prenom"].'<br>';
								echo $_SESSION["nom"];
							}
							?>
						</div>

					</div>

					<div id="content-option-menu">
						
						

							<div class="option" id="option1">
							
							<div id="text-option">
								Liste Questions
							</div>
						

						
							<div class="icone-option-list1">
							
							</div>

						

						</div>

					

					
						<div class="option" id="option2">

							<div id="text-option">
								Creer Admin		
							</div>
						
							<div class="icone-option-creation1">
								
								

							</div>
						</div>

						

							<div class="option" id="option3">
							
							<div id="text-option">
								Liste Joueur
							</div>
						
							<div class="icone-option-list2">
								
							</div>
								
								

							</div>
						
						

						

							<div class="option" id="option4">

							<div id="text-option">
								Creer Questions
							</div>	
						

							<div class="icone-option-creation2">
								
								
							</div>	

						</div>
					

						<div class="option" id="option5">
							
							<div id="text-option">
								Liste Admin
							</div>
						
							<div class="icone-option-list2">
								
							</div>
								
						</div>
					
							</div>	
						
				

				</div>

				<div id="content-page">
			<?php		

				require_once ("lister_joueurs.php");			

			?>

				</div>

			</div>

</body>

<footer id="footer-admin">

	<div id="logo-footer-quizz">
			
	</div>	
	
	<div id="logo-footer">

	</div>	

	<div id="logo-footer-SA">
		
	</div>
</footer>
</html>

<script>

var power=$('#logo-power');
power.click(function(e){
	if (confirm('Etes vous sûr deconnecter de cette session?'))
		document.location.href='index.php';

});

$('#option1').on('click',function(){
	$('#content-page').load('lister_question.php');
})

$('#option2').on('click',function(){
	$('#content-page').load('creer_admin.php');
})

$('#option3').on('click',function(){
	$('#content-page').load('lister_joueurs.php');
})

$('#option4').on('click',function(){
	$('#content-page').load('creer_question.php');
})

$('#option5').on('click',function(){
	$('#content-page').load('lister_admin.php');
})

</script>







