<?php
	error_reporting(-1);
	ini_set('display_errors', 'On');
	
	if ( isset($_GET['id']) )
	{
 		$id = intval ($_GET['id']);
 		include ("config.php");
 		$req = "SELECT img_id, img_type, img_blob FROM images WHERE img_id = $id" ;
 		$result = $cnx->query ($req);
 		if(!$result)
 		{
 			echo "echec de requete";
 			print_r($cnx->errorInfo());
 		}
 		else
 		{
 			$col = $result->fetch();
            if ( !$col[0] )
            {
 				echo "Id d'image inconnu";
 			}else 
 			{
 				header ("Content-type: " . $col[1]);
 				echo $col[2];
 			}
 		}// else if result
 	}else 
 	{
 		echo "Mauvais id d'image";
 	}
?>