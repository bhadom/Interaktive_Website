<?php //Öffnet das PHP script
function addUser($uname, $email, $passwd){ //erstellt die "function" zum erstellen der Benutzer

$conn = getDatabase();//hohlt Datenbank informationen
if($conn->connect_error){
    die("Connection failed: ".$conn->connect_error);

}
$sql = "INSERT INTO USERS (username,passwort,email) VALUES
    ('".$uname."','".md5($passwd)."','".$email."')" ;//SQL statement



if ($conn->query($sql) === TRUE) {// SQL-Statements ausführen
    $_SESSION["isLoggedIn"] = true;
    $_SESSION["currentUsername"] = $uname;
    $_SESSION["nameExists"] = False;
}else {
    $_SESSION["nameExists"] = True;
}
$conn->close();// Verbindung Schliessen
}

function getUser($uname, $passwd){//hohlt den Buenutzernamen
  $conn = getDatabase();//hohlt Datenbank informationen
  if($conn->connect_error){
      die("Connection failed: ".$conn->connect_error);
  }
$pwd =md5($passwd);//Passwort verschlüsseln
$sql = "SELECT * from users where (username = '{$uname}' or email ='{$uname}') and passwort ='$pwd'";
$result = $conn->query($sql);// SQL-Statements ausführen

if($result->num_rows > 0){//wenn ein Eintrag vorhanden ist return "true"

    return true;
}else{//wenn kein eintrag vorhanden ist return "false"

    return false;
}


      if ($conn->query($sql) === TRUE) {// SQL-Statements ausführen

          $_SESSION["isLoggedIn"] = true;
          $_SESSION["currentUsername"] = $uname;

          return TRUE;
      }else{
        return false;
      }
      $conn->close();// Verbindung Schliessen
    }

function getDatabase(){//enthält Datenbank indormation
  $servername="localhost";
  $username="root";
  $password="root";
  $dbname="users";
  $con = new mysqli($servername, $username, $password, $dbname);
  return $con;
}

function logout(){//Loggedden User aus
  if(isset($_POST['logout'])){
          $_SESSION["isLoggedIn"] = false;// Hier wird der Benutzer abgemeldet
          $_SESSION['currentUsername']="";}

}

?>
