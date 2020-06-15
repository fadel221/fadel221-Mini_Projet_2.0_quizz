<?php
session_start();

			/*------------------- Tentative de connexion à la BD --------------------*/

	$username="fadhilou";
	$password="Mouhamadou1998";
	$host="mysql-fadhilou.alwaysdata.net";
	$dbname="fadhilou_root";

	try
	{
		
		$conn=new PDO("mysql:host=$host;dbname=$dbname",$username,$password);
		$conn->setattribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		$login=$_SESSION["login"];
		$password=$_SESSION["password"];
        $sql=$conn->prepare("SELECT valueScore FROM Utilisateur,score WHERE Utilisateur.idUser=score.idUser AND Utilisateur.login='$login'");
        $sql->execute();
		if ($sql)
		{
            $row=$sql->fetch(PDO::FETCH_ASSOC);
            echo $row['valueScore'];
		}

	}
			/*------------------- Tentative de connexion à la BD --------------------*/
							

	catch (PDOEXCEPTION $e)
	{
 		echo "Erreur ".$e->getMessage();
    }
    
    ?>