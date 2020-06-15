<?php 
session_start();
if (empty($_SESSION))
{
	header('Location:index.php');
}
$avatar=$_SESSION['avatar'];
?>

<!DOCTYPE html>
<html>
<head>
	<title>Interface Jeu</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="jquery-3.5.1.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

	<div id="header" class="container-fluid" style="display:inline-block;">

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
	<div id="content-page-question">
	
			<div id="content-questionnaire">
				
				<div id="show-question">

					<div id="question">

					</div>

					<div id="score-question">

					</div>

			</div>
		<div id="content-reponses">

		</div>

		<div id="content-btn-player">
			<button class="btn" id="btn-prev">Précédent</button>
			<button class="btn" id="btn-next">Suivant</button>
		</div>

			</div>
	
			<div id="content-menu-joueur">

					<div id="content-avatar-player">

						<div id="elipse-avatar-player" style="background-repeat:no-repeat;background-size:130%;background-image:url('<?php
                     if (isset($avatar)) echo $avatar;?>');">
						
						</div>

						<div id="player-name">

						<?php 
							if (!empty($_SESSION))
							{
								echo $_SESSION["prenom"].'<br>';
								echo $_SESSION["nom"];
							}
							?>

						</div>	

					</div>

					<div id="content-option-joueur">

							<div id="option1-joueur">
								Top score
							</div>
							<div id="option2-joueur">
								Mon Meilleur Score
							</div>
					</div>
					<div id="show-option-joueur">
							
						<?php
							require_once('best_score.php');
						?>

					</div>			

			</div>
	</div>
</body>

<footer id="footer-player">

	<div id="logo-footer-quizz">
			
	</div>	
	
	<div id="logo-footer">

	</div>	

	<div id="logo-footer-SA">
		
	</div>
</footer>

</html>

					<script>


					/*Bouton de déconnexion*/

var power=$('#logo-power');
power.click(function(e){
	if (confirm('Etes vous sûr deconnecter de cette session?'))
		document.location.href='index.php';

});

/* Script pour afficher le Top Score et les 5 meileurs joueurs*/
var top_score=$('#option1-joueur');
top_score.on("click",function(){
	top_score.css('background','blue');
	$('#option-joueur2').css('background','none');
	$('#show-option-joueur').load('best_score.php');
})

var player_score=$('#option2-joueur');
player_score.on("click",function(){
	player_score.css('background','blue');
	$('#option-joueur1').css('background','none');
	$('#show-option-joueur').load('player_score.php');
})

</script>
