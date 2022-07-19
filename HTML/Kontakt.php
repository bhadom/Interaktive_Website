<?php

if( session_id() == '' ){//session id wird überprüft sonst erstellt
    session_start();
}
require ('../PHP/userControl.php');
logout();//überprüft ob ausgelogged werden soll
$check = false;
if (isset($_POST["submit"])) {//wenn eine Mail gesendet wurde werden alle daten übernommen

    $name = $_POST["name"];
    $vorname = $_POST["vorname"];
    $mailFrom = $_POST["email"];
    $betreff = $_POST["betreff"];
    $nachricht = $_POST["nachricht"];
    $mailTo = "jm.development@outlook.de";//Email addresse definieren an welche gesendet werden soll
    $headers = "From: ".$mailFrom;
    $showMessage =true;
    //mail($mailTo,$betreff,$nachricht,$headers);//würde email versenden aber geht auf lokalem server nicht
    $check = true;
}

 ?>

<!DOCTYPE html><!-- Zeigt den Dokumenttyp an -->
<html lang="de"><!-- Hier wird die Sprache festgelegt -->


<head><!-- Hier wird der Head geöffnet -->
    <meta charset="utf-8"><!-- Hier wird die Kodierung festgelegt -->
    <title> Kontakt </title><!-- Titel der Seite -->
    <link rel="stylesheet" type="text/css" href="../CSS/style.css" media="screen"><!-- Hier werden die CSS Dokumente eingebunden -->
    <link rel="stylesheet" type="text/css" href="../CSS/kontaktcss.css" media="screen">
    <link rel="stylesheet" type="text/css" href="../CSS/responsive-tablet.css" media="screen and (max-width: 900px)">
    <link rel="stylesheet" type="text/css" href="../CSS/responsive-phone.css" media="screen and (max-width: 500px)">
    <meta name="viewport" content="width=device-width, initial-scale=1">

</head><!-- Head wird geschlossen -->

<body><!-- Body wird geöffnet -->
    <header><!-- Header wird geöffnet -->

        <a href="../index.php"><img src="../Medien/logo.png" alt="Logo" /></a><!-- Das Logo wird eingebunden -->
        <section><!-- Hier beginnt eine Section -->
           <?php if(!isset($_SESSION["isLoggedIn"]) or $_SESSION["isLoggedIn"] === false) ://zeigt Registrieren und Login an wenn kein Nutzer angemeldet ist?>
                <h5 class="Register"><a href="Register.php">Registrieren</a></h5>
                <h5 class="Login"><a href="Login.php"> Login </a></h5>
              <?php else :?>
                  <h5 class="Username">Eingeloggt als:  <?php echo $_SESSION["currentUsername"];//zeigt username und logout Button an ?></h5>
                  <form method="post">
                      <input type="submit" class="logout" value="Abmelden" name="logout"/>
                  </form>
              <?php endif;?>
        </section><!-- Section wird geschlossen -->

        <nav><!-- Hier beginnt die Navigation -->
            <a href="#" id="menu-icon"></a><!-- Hier wird die ID für das Menuicon festgelegt -->
            <ul><!-- Hier wird eine Liste für die Navigationsleiste festgelegt -->
                <li><a href="../index.php">Home</a></li>
                <li><a href="Firma.php">Firma</a></li>
                <li><a href="Programmiersprachen.php">Programmiersprachen</a></li>
                <li><a href="Kontakt.php">Kontakt</a></li>
            </ul><!-- Die Liste wird geschlossen -->



        </nav><!-- Navigation wird geschlossen -->

    </header><!-- Header wird geschlossen -->

    <main><!-- Das Main-Tag wird geöffnet -->

        <section><!-- Eine Section wird geöffnet -->
            <a href="../Media/newIndexPic.png" download><!-- Downloadlink für das Bild -->
            <img src="../Media/newIndexPic.png" alt="Logo" /><!-- Ein Bild wird eingebunden -->
            </a> <!-- Downloadlink für das Bild wird geschlossen -->
            <div class="Container"><!-- Ein Div mit der Klasse Container wird erstellt -->
                <form class="contect-form" method="post"> <!-- Hier beginnt das Kontaktformular -->
                    <label for="name">Name</label><br/> <!-- Label für den Namen -->
                    <input type="text" id="name" name="name"><br/>
                    <label for="vorname">Vorname</label><br/> <!-- Label für den Vornamen -->
                    <input type="text" id="vorname" name="vorname"><br/>
                    <label for="email">E-Mail</label><br/> <!-- Label für die E-Mail -->
                    <input type="text" id="email" name="email" required><br/>
                    <label for="betreff">Betreff</label><br/> <!-- Label für den Betreff -->
                    <input type="text" id="betreff" name="betreff"><br/>
                    <label>Inhalt</label><br/> <!-- Textbox für den Inhalt -->
                    <textarea name="nachricht" placeholder="Schreiben Sie Ihre Nachricht hier..."></textarea><br>
                    <input type="submit" name="submit" value="Senden"> <!-- Button für das Senden -->
                </form> <!-- Formular wird geschlossen -->
                <p>
                <?php
                if($check === true){
                    echo "Nachricht wurde gesendet";
                }
                ?>
                </p>

            </div><!-- Div wird geschlossen -->


        </section><!-- Section wird geschlossen -->


    </main><!-- Main-Tag wird geschlossen -->



    <footer><!-- Hier beginnt der Footer -->
        <a href="Impressum.php">Impressum</a><!-- Inhalt -->

    </footer><!-- Hier wird der Footer geschlossen -->

</body><!-- Body wird geschlossen -->

</html><!-- HTML-Tag wird geschlossen -->
