<?php
require 'database.php';
  $id = null;
if ( !empty($_GET['id'])) {
$id = $_REQUEST['id'];
}

if ( null==$id ) 
{ 
    header("Location: index.php");
} else {
 $pdo = Database::connect();
 $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 $sql = "SELECT * FROM test where id = ?";
 $q = $pdo->prepare($sql);
 $q->execute(array($id));
 $data = $q->fetch(PDO::FETCH_ASSOC);
 Database::disconnect();
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
         <link href="css/bootstrap.min.css" rel="stylesheet">
        <link	href="img/bootstrap.min.css" rel="stylesheet">
        <script src="js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="container">

            <div class="span10 offset1">
            <div class="row">
            <h3>Read a produit</h3>
            </div>

            <div class="form-horizontal" >
                <div class="control-group">
                <label class="control-label">Nom</label>
            <div class="controls">
                <label class="checkbox">
                <?php echo $data['nom'];?>
                </label>
            </div>
            </div>
            <div class="form-horizontal" >
                <div class="control-group">
                <label class="control-label">Prix</label>
            <div class="controls">
                <label class="checkbox">
                <?php echo $data['prix'];?>
                </label>
            </div>
            </div>
            <div class="form-horizontal" >
                <div class="control-group">
                <label class="control-label">Quantite</label>
            <div class="controls">
                <label class="checkbox">
                <?php echo $data['quantite'];?>
                </label>
            </div>
            </div>
            <div class="form-horizontal" >
                <div class="control-group">
                <label class="control-label">Categorie</label>
            <div class="controls">
                <label class="checkbox">
                <?php echo $data['categorie'];?>
                </label>
            </div>
            </div>
            <div class="control-group">
                <label class="control-label">Description de peoduit</label>
            <div class="controls">
                <label class="checkbox">
                <?php echo $data['description'];?>
                </label>
            </div>
            </div>
            <div class="control-group">
                <label class="control-label">image de produit</label>
            <div class="controls">
                 <label class="checkbox">
                 <?php echo "<img src='../img/{$data['imgsrc']}' alt='../img/{$data['imgsrc']}' height='80px' width='80px'>  "?>
                </label>
            </div>
            </div>
            <div class="form-actions">
            <a class="btn" href="index.php">Back</a>
            </div>

            </div>
            </div>

        </div> <!-- /container -->
 </body>
</html>