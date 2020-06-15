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
        if (isset ($_GET['idUser']) && !empty($_GET['idUser']))
        {
            $id=$_GET['idUser'];
            $query="UPDATE `Utilisateur` SET `statut` ='bloque' WHERE `Utilisateur`.`idUser` ='$id'; ";
            $sql=$conn->prepare($query);
            $resultat=$sql->execute();
        }
	}
			/*------------------- Tentative de connexion à la BD --------------------*/
							

	catch (PDOEXCEPTION $e)
	{
 		echo "Erreur ".$e->getMessage();
	}


 	

	





?>