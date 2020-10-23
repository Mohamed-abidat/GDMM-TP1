  <html>
    <head>
       <title>Images Stock</title>
    </head>
    <body>
       <h3>Sending an image</h3>
       <form enctype="multipart/form-data" action="transfert.php" method="post">
          <input type="hidden" name="MAX_FILE_SIZE" value="2500000" />
          <input type="file" name="file" size=500000 />
               <input type="submit" value="Envoyer" />
            </form>
         </body>
      </html>
