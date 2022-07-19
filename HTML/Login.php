<?php

if( session_id() == '' ){//session id wird überprüft sonst erstellt
    session_start();
}

$notMatching = false;
if(!isset($_SESSION["notLoggedIn"])){
  $_SESSION["notLoggedIn"]=false;
}
require ('../PHP/userControl.php');
logout();//überprüft ob ausgelogged werden soll
$result = false;
if(isset($_POST['username'])&&isset($_POST['password'])){
  $uname = $_POST['username'];
  $passwd= $_POST['password'];

  $result = getUser($uname,$passwd);//holt user inforamtion aus Datenbank
  if($result == true){
    $_SESSION["isLoggedIn"] = true;
    $_SESSION["currentUsername"]= $uname;
    $_SESSION["notLoggedIn"] = false;
  }else{
    $_SESSION["notLoggedIn"] = true;
  }
}

?>

<!DOCTYPE html><!-- Zeigt den Dokumenttyp an -->
<html lang="de"><!-- Hier wird die Sprache festgelegt -->


<head><!-- Hier wird der Head geöffnet -->
    <meta charset="utf-8"><!-- Hier wird die Kodierung festgelegt -->
    <title> Login </title><!-- Titel der Seite -->
    <link rel="stylesheet" type="text/css" href="../CSS/style.css" media="screen"><!-- Hier werden die CSS Dokumente eingebunden -->
    <link rel="stylesheet" type="text/css" href="../CSS/logincss.css" media="screen">
    <link rel="stylesheet" type="text/css" href="../CSS/responsive-tablet.css" media="screen and (max-width: 900px)">
    <link rel="stylesheet" type="text/css" href="../CSS/responsive-phone.css" media="screen and (max-width: 500px)">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head><!-- Head wird geschlossen -->

<body><!-- Body wird geöffnet -->
    <header><!-- Header wird geöffnet -->

        <a href="../index.php"><img src="../Medien/logo.png" alt="Logo"/></a><!-- Das Logo wird eingebunden -->
        <section><!-- Hier beginnt eine Section -->
           <?php

           if(!isset($_SESSION["isLoggedIn"]) or $_SESSION["isLoggedIn"] === False) ://zeigt Registrieren und Login an wenn kein Nutzer angemeldet ist?>
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
              <form class="Contect-form" method="post"><!-- Hier beginnt das Loginformular -->
                  <label for="username">Benutzername</label><br/><!-- Label für Benutzername -->
                  <input type="text" id="username" name="username" required><br/>
                  <label for="password">Passwort</label><br/> <!-- Label für Passwort -->
                  <input type="password" id="password" name="password" required><br/>
                  <input type="submit" id="login" name="login" value="Login" required><br/><!-- Login Button -->

              </form><!-- Loginformular wird geschlossen -->
              <p>
                <?php
                if($_SESSION["notLoggedIn"] ==True){
                  echo "Angaben stimmen nicht überein.";
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
