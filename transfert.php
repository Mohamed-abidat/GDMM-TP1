<?php
error_reporting(-1);
ini_set('display_errors', 'On');


  function transfert()
  {
    include("config.php");
    $ret        = false;
    $img_blob   = '';
    $img_taille = 0;
    $img_type   = '';
    $img_nom    = '';
    $taille_max = 2500000;
    $ret        = is_uploaded_file($_FILES["file"]["tmp_name"]);
        
    if (!$ret) 
      {
        echo "transfert failed";
        return false;
      }else
      {
        // Le fichier a bien été reçu
        $img_taille = $_FILES['file']['size'];
        if($img_taille > $taille_max)
        {
          echo "Trop gros !";
          return false;
        }else
        {
          $img_type = $_FILES['file']['type'];
          $img_nom  = $_FILES['file']['name'];
          $img_blob = file_get_contents ($_FILES['file']['tmp_name']);
          //echo $img_nom." <h2>is well transfered</h2>";  
                      
          $req = "INSERT INTO images (" . "img_nom, img_taille, img_type, img_blob" .
          ") VALUES (".
          "'" . $img_nom . "'," .
          "'" . $img_taille . "'," .
          "'" . $img_type . "'," .
          "'" . addslashes($img_blob) . "');";
                      
          if($cnx)
          {
            $ret = $cnx->query($req);                 
            if($ret) echo "<h2>Successfully uploaded to database</h2>";
            else
            {
              echo "<h2>Echec</h2>";
              print_r($cnx->errorInfo());
            }
            return true;
          }
          else die("<h3>Die, error on connexion on config.php 1</h3>");
        }
      }
    } 
  transfert();
?>