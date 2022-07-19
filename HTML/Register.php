<?php
if( session_id() == '' ){//session id wird überprüft sonst erstellt
    session_start();
}

$notMatching = false;
$toShort = false;

require ('../PHP/userControl.php');
logout();//überprüft ob ausgelogged werden soll

if(isset($_POST['username'])&&isset($_POST['email'])&&isset($_POST['password'])&&isset($_POST['repPassword'])){//überprüft ob alle daten gesetzt sind
    $uname = $_POST["username"];
    $email = $_POST["email"];
    $passwd = $_POST["password"];
    $repPassword = $_POST["repPassword"];
    if($passwd == $repPassword && strlen($passwd) >= 8 ){//testet ob die Passwörter übereinstimmen
        $toShort =false;
        $notMatching = false;
        addUser($uname, $email, $passwd);//fügt den user in die Datenbank hinzu
        if(!$_SESSION["nameExists"]){
        header("Location: ../index.php");
      }
    }elseif (strlen($passwd) < 8) {
      $toShort =true;
    }else{

        $notMatching = true;

    }

}


?>


<!DOCTYPE html><!-- Zeigt den Dokumenttyp an -->
<html lang="de"><!-- Hier wird die Sprache festgelegt -->


<head><!-- Hier wird der Head geöffnet -->
    <meta charset="utf-8"><!-- Hier wird die Kodierung festgelegt -->
    <title> Registrieren </title><!-- Titel der Seite -->
    <link rel="stylesheet" type="text/css" href="../CSS/style.css" media="screen"><!-- Hier werden die CSS Dokumente eingebunden -->
    <link rel="stylesheet" type="text/css" href="../CSS/registercss.css" media="screen">
    <link rel="stylesheet" type="text/css" href="../CSS/responsive-tablet.css" media="screen and (max-width: 900px)">
    <link rel="stylesheet" type="text/css" href="../CSS/responsive-phone.css" media="screen and (max-width: 500px)">
    <meta name="viewport" content="width=device-width, initial-scale=1">

</head><!-- Head wird geschlossen -->

<body><!-- Body wird geöffnet -->
    <header><!-- Header wird geöffnet -->

        <a href="../index.php"><img src="../Medien/logo.png" alt="Logo" /></a><!-- Das Logo wird eingebunden -->
        <section><!-- Hier beginnt eine Section -->
            <?php if(!isset($_SESSION["isLoggedIn"]) or $_SESSION["isLoggedIn"] == false) ://zeigt Registrieren und Login an wenn kein Nutzer angemeldet ist?>
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
            <a href="../Media/newIndexPic.png" download> <!-- Downloadlink für das Bild -->
            <img src="../Media/newIndexPic.png" alt="Logo" /><!-- Ein Bild wird eingebunden -->
            </a> <!-- Downloadlink für das Bild wird geschlossen -->
            <div class="Container"><!-- Ein Div mit der Klasse Container wird erstellt -->
                <!-- Container -->
                <form class="Contect-form" method="post"><!-- Hier beginnt das Formular -->
                    <label for="username">Benutzername</label><br/><!-- Label für den Benutzernamen -->
                    <input type="text" id="username" name="username" required><br/>
                    <label for="email">E-Mail</label><br/><!-- Label für die E-Mail -->
                    <input type="text" id="email" name="email" required><br/>
                    <label for="password">Passwort</label><br/><!-- Label für das Passwort -->
                    <input type="password" id="password" name="password" required><br/>
                    <label for="repPassword">Passwort wiederholen</label><br/><!-- Label für die Passwortwiederholung -->
                    <input type="password" id="repPassword" name="repPassword" required><br/>
                    <input name="submit" value="Senden" type="submit" required><br/> <!-- Button für das Senden -->
                </form>
                <p> <!-- Überprüft die Benutzereingabe auf Fehler -->
                  <?php if($_SESSION["nameExists"] === True){
                    echo "Benutzername existiert bereits.";
                  }else if ($notMatching){
                    echo "Passwörter stimmen nicht überein.";
                  }elseif ($toShort) {
                    echo "Passwort ist zu kurz.";
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
