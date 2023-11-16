
<?php  include 'database.php';?>
<?php
// recuperer user et mode pass
//  comparision (2) if exist et if confondu a un non specifier
if ( !empty($_POST)) {
    $username = $_POST['username'];
    $modepass = $_POST['modepass'];

    $pdo=Databe::connect();
}
?>
<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="css/authentification.css">
    <script src="js/scriptlog.js"></script>
    <title>login</title>
</head>
<body>
    <div class="container">
        <form action="index.php" method="post">
            <div class="form">
                <h1>Bienvenu à votre compte</h1>
               
                <input type="text" name="username" id="username" placeholder="Entrer username" required>
                <input type="password" name="modepass" id="modepassuser" placeholder="Entrer mode pass" required>
                <a href="oubliermodepass.php" style="margin-left: 10px;text-decoration: none;">oublié mode pass ?</a>
                <!-- <input type="checkbox" name="checkbox" id="checkbox" onclick="showmodpassuser();"> -->
                <input type="submit" value="Sign in">
                <p>vous n'avez pas un compte? <a href="sign_up.php">sign up</a></p>
            </div>
        </form>
    </div>
    
</body>
</html>