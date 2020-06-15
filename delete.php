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
            $query1="DELETE FROM score WHERE idUser='$id'";
            $sql=$conn->prepare($query1);
            $sql->execute();
            $query2="DELETE FROM Utilisateur WHERE idUser='$id'";
            $sql=$conn->prepare($query2);
            $resultat=$sql->execute();
        }
	}
			/*------------------- Tentative de connexion à la BD --------------------*/
							

	catch (PDOEXCEPTION $e)
	{
 		echo "Erreur ".$e->getMessage();
	}


 	

	





?>