<?php
if( session_id() == '' ){
    session_start();
}
if (isset($_POST["submit"])) {
  $name = $_POST["name"];
  $vorname = $_POST["vorname"];
  $mailFrom = $_POST["email"];
  $betreff = $_POST["betreff"];
  $nachricht = $_POST["nachricht"];

  $mailTo = "jm.info.developers@gmail.com";
  $headers = "From: ".$mailFrom;

  mail($mailTo,$betreff,$nachricht,$headers);
}
 ?>
 <!DOCTYPE html><!-- Deniniert den Dokumenten Typ ( in diesem Fall HTML)-->
 <html lang="de"><!-- Definiert die Sprache der Website und öffnet das HTML Dokument-->
 <!-- Schliesst den Head-->
     <body><!-- Öffnet den Bo-->
         <main>
             <form class="contect-form" action="contactform.php" method="post">
                 <label for="name">Name</label>
                 <input type="text" id="name" name="name">
                 <label for="vorname">Vorname</label>
                 <input type="text" id="vorname" name="vorname">
                 <label for="email">E-Mail</label>
                 <input type="text" id="email" name="email" required>
                 <label for="betreff">Betreff</label>
                 <input type="text" id="betreff" name="betreff">
                 <label>Inhalt</label>
                 <textarea name="nachricht" placeholder="Schreiben sie Ihre nachricht hier..."></textarea>
                 <input type="submit" value="Senden">
             </form>
             <p>Email wurde gesendet</p>
         </main>
     </body>
 </html>
