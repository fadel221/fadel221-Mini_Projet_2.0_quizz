<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
 	 <script src="jquery-3.5.1.js"></script>
	<link rel="stylesheet" type="text/css" href="style.css">
    <title></title>
</head>
<body>

    <div id="content-liste-player">

            <div id="header-liste-joueur">
                    Liste Admin
            </div>

            <div id="liste-player">

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
  $sql=$conn->prepare("SELECT Utilisateur.idUser,nom,prenom,statut FROM Utilisateur WHERE Utilisateur.role='admin'");
  $sql->execute();
  echo "<table cellspacing='20px' cellpadding='30px'>";
  echo "<td>PRENOM</td><td>NOM</td><td>STATUT</td><td>SUPPRIMER</td><td>BLOQUER</td><td>DEBLOQUER</td>";
  if($sql)
  {		
    foreach($sql as $row)
    {
    echo "<tr>";
        echo "<td>".$row['prenom']."</td>"." <td>".$row["nom"]."</td>"."<td>".$row['statut']."</td><td><a id='delete' href='delete.php?delete=".$row['idUser']."&function=delete'>Delete</a></td><td><a id='bloque' href='bloquer.php?bloquer=".$row['idUser']."&function=bloquer'>Bloquer</a></td><td><a id='debloque' href='debloquer.php?debloquer=".$row['idUser']."&function=debloquer'>Debloquer</a></td>";    
    echo "</tr>";
  }
echo "</table>";
  }
  
  
}
    /*------------------- Tentative de connexion à la BD --------------------*/
            
catch (PDOEXCEPTION $e)
{
  echo "Erreur ".$e->getMessage();
}

?>

            </div>

            

    </div>

</body>
</html>

<script>
  
  

  $('a').click(function(e){
    e.preventDefault();
    /*Découpe l'url pour recupperer la variable URL qui contient l'id du Joueur*/
    var url=$(this).attr('href').split('=');
    var idUser=url[1].split('&');
    /*Reccupere l'id du Joueur*/
    idUser=idUser[0];
    /*fonction contient la chaine delete ou bloquer pour connaitre ce que l'on doit utiliser*/
    fonction=url[2];
    if (fonction==='delete')
    {
      $.get('delete.php',{idUser:idUser},function(){
        alert('Suppression effectué');
        $('body').load('menu_admin.php');

      })
    }
      if (fonction==='bloquer')
      {
        $.get('bloquer.php',{idUser:idUser},function(){
        alert('Bloquage effectué');
        $('body').load('menu_admin.php');
      })
    }
    else
        if (fonction==='debloquer')
        {
          $.get('debloquer.php',{idUser:idUser},function(){
          alert('Déloquage effectué');
          $('menu_admin/#content-page').load('lister_admin.php');
        })
  }
  })

</script>




