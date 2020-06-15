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
		$sql=$conn->query("SELECT  `Utilisateur`.*,`valueScore` FROM `Utilisateur`,`score` WHERE Utilisateur.idUser=score.idUser ORDER BY `valueScore` DESC LIMIT 5");
        if($sql)
        {
            echo "<table cellspacing='10px' cellspacing='10px'>";
            foreach($sql as $row)
            {
                $best_players[]=$row['prenom']." ".$row['nom'];
                $best_five_score[]=$row["valueScore"];    
            }

            echo "<tr><td>".$best_players[0]."</td><td style='border-bottom:10px  solid #00FFFF;'>".$best_five_score[0]."pts</td></tr>";

		    echo "<tr><td>".$best_players[1]."</td><td style='border-bottom:10px solid #66CDAA;'>".$best_five_score[1]."pts</td></tr>";

		    echo "<tr><td>".$best_players[2]."</td><td style='border-bottom:10px solid #F6A600;'>".$best_five_score[2]."pts</td></tr>";

		    echo "<tr><td>".$best_players[3]."</td><td style='border-bottom:10px solid #A52A2A;'>".$best_five_score[3]."pts</td></tr>";

		    echo "<tr><td>".$best_players[4]."</td><td style='border-bottom:10px solid silver;'>".$best_five_score[4]."pts</td></tr>";
            echo "</table>";
        }
	}
			/*------------------- Tentative de connexion à la BD --------------------*/
							

	catch (PDOEXCEPTION $e)
	{
 		echo "Erreur ".$e->getMessage();
    }
    