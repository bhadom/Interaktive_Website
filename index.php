<?php
if( session_id() == '' ){//session id wird überprüft sonst erstellt
    session_start();
}
require ('PHP/userControl.php');
logout();
$_SESSION["nameExists"] = False;
?>

<!DOCTYPE html> <!-- Zeigt den Dokumenttyp an -->
<html lang="de"> <!-- Hier wird die Sprache festgelegt -->


<head><!-- Hier wird der Head geöffnet -->
    
    <meta charset="utf-8"><!-- Hier wird die Kodierung festgelegt -->
    <title> Home </title><!-- Titel der Seite -->
    <link rel="stylesheet" type="text/css" href="CSS/style.css" media="screen"><!-- Hier werden die CSS Dokumente eingebunden -->
    <link rel="stylesheet" type="text/css" href="CSS/responsive-tablet.css" media="screen and (max-width: 900px)">
    <link rel="stylesheet" type="text/css" href="CSS/responsive-phone.css" media="screen and (max-width: 500px)">
    <meta name="viewport" content="width=device-width, initial-scale=1">

</head><!-- Head wird geschlossen -->

<body><!-- Body wird geöffnet -->
    
    <header><!-- Header wird geöffnet -->
        

        <a href="index.php"><img src="Medien/logo.png" alt="Logo" /></a><!-- Das Logo wird eingebunden -->

        <?php

           if(!isset($_SESSION["isLoggedIn"]) or $_SESSION["isLoggedIn"] === false) :?>
        <h5 class="Register"><a href="HTML/Register.php">Registrieren</a></h5>
        <h5 class="Login"><a href="HTML/Login.php"> Login </a></h5>


        <?php else :?>
        <div class="notAVirus"></div>
        <h5 class="Username">Eingeloggt als:
            <?php echo $_SESSION["currentUsername"]; ?>
        </h5>
        <form method="post">
            <input type="submit" class="logout" value="Abmelden" name="logout" />
        </form>
        <?php endif;?>


        <nav><!-- Hier beginnt die Navigation -->
            
            <a href="#" id="menu-icon"></a><!-- Hier wird die ID für das Menuicon festgelegt -->
            <ul> <!-- Hier wird eine Liste für die Navigationsleiste festgelegt -->
                <li><a href="index.php">Home</a></li> <!-- Die Listenelemente werden eingefügt -->
                <li><a href="HTML/Firma.php">Firma</a></li>
                <li><a href="HTML/Programmiersprachen.php">Programmiersprachen</a></li>
                <li><a href="HTML/Kontakt.php">Kontakt</a></li>
            </ul> <!-- Die Liste wird geschlossen -->



        </nav><!-- Navigation wird geschlossen -->

    </header> <!-- Header wird geschlossen -->

    <main> <!-- Das Main-Tag wird geöffnet -->

        <section> <!-- Eine Section wird geöffnet -->
            <a href="Media/newIndexPic.png" download> <!-- Downloadlink für das Bild -->
            <img src="Media/newIndexPic.png" alt="Logo" /> <!-- Ein Bild wird eingebunden -->
            </a> <!-- Downloadlink für das Bild wird geschlossen -->
            <div class="Container"> <!-- Ein Div mit der Klasse Container wird erstellt -->
                <span> <!-- Hier beginnt der Inhalt -->
                    Wir sind eine Firma, welche Applikationen jeglicher Art für unsere Kunden entwickelt.<br>
                    Unser Team besteht aus zwei Leuten welche seit der Ausbildung zusammenarbeitet und auch diese in dem selben Betrieb gemacht haben.<br><br>
                    Wir entwickeln leidenschaftlich Software uns warten diese für unsere Kunden.
                    Gerne entwickeln wir für Sie Applikationen von jeder Kategorie (z.B. Wartung, Finanzen, Effizienz etc.) auch neue Herausforderungen nehmen wir gerne an und versuchen auch noch nie dagewesenes.<br><br>
                    Wenn Sie einen Auftrag für uns haben, kontaktieren Sie und doch und wir können zusammen besprechen, wie Sie sich Ihr Programm vorstellen.

                </span> <!-- Hier endet der Inhalt -->

            </div> <!-- Div wird geschlossen -->


        </section> <!-- Section wird geschlossen -->


    </main> <!-- Main-Tag wird geschlossen -->



    <footer> <!-- Hier beginnt der Footer -->
        <a href="HTML/Impressum.php">Impressum</a> <!-- Inhalt -->

    </footer> <!-- Hier wird der Footer geschlossen -->

</body> <!-- Body wird geschlossen -->

</html> <!-- HTML-Tag wird geschlossen -->
