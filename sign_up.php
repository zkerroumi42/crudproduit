<?php
require "database.php";

if(!empty($_POST)){

    $nom=$_POST['nom'];
    $prenom=$_POST['prenom'];
    $email=$_POST['email'];
    $modepass= $_POST['modepass'];
    // $modepass= sha1($_POST['modepass']);
    $confirmemodepass=$_POST['confirmemodepass'];
   
    if ($modepass===$confirmemodepass) {
    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO admin (nom, prenom, email,modepass) VALUES(?,?,?,?)";
    $q = $pdo->prepare($sql);
    $result = $q->execute(array($nom, $prenom,$email,md5($modepass)));
    if($result){
        Database::disconnect();
        header("Location: log_in.php");
    }else{
        echo 'data not saved !';
        Database::disconnect();
    }
 } else{
    echo "<p>mode pass not confendu </p>";
 }
}
?>

<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="css/authentification.css">
    <script src="js/scriptlog.js"></script>
    <title>sign_up</title>
</head>
<body>
    <div class="container">
        <form action="sign_up.php" method="post">
            <div class="form">
                <h1>Crée Votre Compte</h1>
               
                <input type="text" name="nom"  placeholder="Entrer votre nom"  required>
                <input type="text" name="prenom" id="prenom" placeholder="Entrer votre prenom" required>
                <input type="email" name="email" id="email" placeholder="Entrer votre email"required>
                <input type="password" name="modepass" id="modepass" placeholder="Entrer votre mode pass" required>
                <input type="password" name="confirmemodepass" id="confirmemodepass" placeholder="Confirmer votre mode pass" required>
                <!-- <input type="checkbox" name="checkbox" id="checkbox" onclick = "showmodepass();"> -->
                <input type="submit" value="Sign up">
                <p>vous avez un compte? <a href="log_in.php">sign in</a></p>
            </div>
        </form>
    </div>

</body>
</html>