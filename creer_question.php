<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="jquery-3.5.1.js"></script>
  <link rel="stylesheet" href="style.css">
</head>
<body>
		<div id="content-creer-question">

		 <div id="header-creer-question">
		 	PARAMETRER VOTRE QUESTION
		 </div>

 <form method="post" >
		 <div id="content-form-question">
		 	<div id="ajout-question">

		 		<div id="title-question">
		 		Question
		 		</div>

		 		<div id="textarea">

		 			<textarea name="textarea">
		 				
		 			</textarea>

		 		</div>


		 		<div id="select">


			 		<div id="title-select">
			 			Type De Réponse
			 		</div>
				
					<select name="select">
						<option>Donner Le Type de Réponse</option>
						<option>Texte à Saisir</option>
						<option>Choix Simple</option>
						<option>Choix Multiple</option>
					</select>

						<div id="btn-ajout-champs">
						
						</div>		 			

		 		</div>

		 		<div id="champs-reponses">
 
				</div>
				
		<div id="content-btn-player">
				
				<button class="btn" id="btn-enreg">Suivant</button>
		</div>

		 	</div>

		 </div>
 </form>

		</div>
</body>
</html>


<script>

$('#content-option-suppr').click(function(){
	alert('ok');
	})

						/* Input de type select*/

$('select').click(function(){
	var select=$('select').val();
	switch (select)
		{
			case "Donner Le Type de Réponse":$('#champs-reponses').html('');
			break;

			case "Texte à Saisir":
				$('#champs-reponses').html('');
				$('#champs-reponses').append("<form method='post'><input type='text' name='text' id='row_champ'></form>");break;
			
				case "Choix Multiple": 
					
					$('#champs-reponses').html('');
					$('#champs-reponses').append('<div id="auto-input"><div id="row_champ"><input type="text" id="input-question"></div><div id="content-cocher"><div id="content-option-question"><input type="checkbox" name=""></div><div id="content-option-suppr"></div></div></div></div>');break;
				

					case "Choix Simple": 
						$('#champs-reponses').html('');
					$('#champs-reponses').append('<div id="auto-input"><div id="row_champ"><input type="text" id="input-question"></div><div id="content-cocher"><div id="content-option-question"><input type="radio" name=""></div><div id="content-option-suppr"></div></div></div></div>');break;
				
		}
})
							/*Bouton d'ajout de Champ*/
							

$('#btn-ajout-champs').click(function(){
var select=$('select').val();
	if (select=="Donner Le Type de Réponse")
	{
		alert("Veuillez choisir le type de Réponse");
	}
	else
		if(select=="Choix Simple")
		{
			$('#champs-reponses').append('<div id="auto-input"><div id="row_champ"><input type="text" id="input-question"></div><div id="content-cocher"><div id="content-option-question" onclick=alert();"><input type="radio" name=""></div><div id="content-option-suppr"></div></div></div></div>');
		}

	else
		if(select=="Choix Multiple")
		{
			$('#champs-reponses').append('<div id="auto-input"><div id="row_champ"><input type="text" id="input-question"></div><div id="content-cocher"><div id="content-option-question"><input type="checkbox" name=""></div><div id="content-option-suppr"></div></div></div></div>');
		}
})


function alert()
{
	alert('ok');
}

</script>
