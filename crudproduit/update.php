<?php
require 'database.php';

$id = null;
if ( !empty($_GET['id'])) {
$id = $_REQUEST['id'];
}

if ( null==$id ) {
     header("Location: index.php");
}

if ( !empty($_POST)) {
// keep track validation errors
$nomErreur = null;
$prixErreur = null;
$quantiteErreur = null;
$categorieErreur = null;
$descriptionErreur = null;
$imgsrcErreur = null;

// keep track post values
$nom = $_POST['nom'];
$prix = $_POST['prix'];
$quantite = $_POST['quantite'];
$categorie = $_POST['categorie'];
$description = $_POST['description'];
$imgsrc = $_FILES['imgsrc']['name'];
$profile_tmp = $_FILES['imgsrc']['tmp_name'];
$profile_image_location = '../img/' . $imgsrc;
$move = move_uploaded_file($profile_tmp, $profile_image_location);

// validate input
$valid = true;
if (empty($nom)) {
    $nomErreur = 'Please entrer le nom de votre produit';
    $valid = false;
}

if (empty($prix)) {
    $prixErreur = 'Please enter le prix de votre produit ';
    $valid = false;
}

if (empty($quantite)) {
    $quantiteErreur = 'Please entrer la quantite de stock de votre produit';
    $valid = false;
    }
if (empty($categorie)) {
        $categorieErreur = 'Please entrer la categoriede votre produit ';
        $valid = false;
        }
if (empty($description)) {
            $descriptionErreur = 'Please entrer une description de votre produit';
            $valid = false;
            }
if (empty($imgsrc)) {
                $imgsrcErreur = 'Please entrer image de votre produit';
                $valid = false;
                }
// update data 
if ($valid) {
$pdo = Database::connect();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "UPDATE produits set Nom = ?, Prix = ?, Quantité_stock =?,Catégorie =?,Description=?,Image=?
 WHERE Id_Pr = ?";
$q = $pdo->prepare($sql);
$q->execute(array($nom,$prix,$quantite,$categorie,$description,$imgsrc,$id));
Database::disconnect();
header("Location: list_produits.php");
}
} else {
$pdo = Database::connect();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "SELECT * FROM produits where Id_Pr = ?";
$q = $pdo->prepare($sql);
$q->execute(array($id));
$data = $q->fetch(PDO::FETCH_ASSOC);
$nom = $data['Nom'];
$prix = $data['Prix'];
$quantite = $data['Quantité_stock']; 
$categorie = $data['Catégorie'];
$description = $data['Description'];
$imgsrc = $data['Image']; 
Database::disconnect();
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="img/bootstrap.min.css" rel="stylesheet">
<script src="js/bootstrap.min.js"></script>
</head>

<body>
<div class="container">

<div class="span10 offset1">
<div class="row">
<h3>Update a Produit</h3>
</div>

<form class="form-horizontal" action="update.php?id=<?php echo $id?>" method="post" enctype="multipart/form-data">
     <div class="control-group <?php echo!empty($nomErreur)?'error':'';?>">
          <label class="control-label">nom de produit</label>
     <div class="controls">
          <input name="nom" type="text" placeholder="nom" value="<?php echo!empty($nom)?$nom:'';?>">


          <?php if (!empty($nomErreur)): ?>
               <span class="help-inline"><?php echo $nomErreur;?></span>
          <?php endif; ?>
     </div>
     </div>
     <div class="control-group <?php echo!empty($prixErreur)?'error':'';?>">
           <label class="control-label">Prix de produit</label>
     <div class="controls">
          <input name="prix" type="text" placeholder="prix" value="<?php echo !empty($prix)?$prix:'';?>">
          <?php if (!empty($prixErreur)): ?>
               <span class="help-inline"><?php echo $prixErreur;?></span>
          <?php endif;?>
     </div>
     </div>
     <div class="control-group <?php echo!empty($quantiteErreur)?'error':'';?>">
          <label class="control-label">Quantite de produit</label>
     <div class="controls">
          <input name="quantite" type="text" placeholder="quantite" value="<?php echo !empty($quantite)?$quantite:'';?>">
          <?php if (!empty($quantiteErreur)): ?>
               <span class="help-inline"><?php echo $quantiteErreur;?></span>
          <?php endif;?>
     </div>
     </div>
     <div class="control-group <?php echo!empty($categorieErreur)?'error':'';?>">
          <label class="control-label">Categorie de produit</label>
     <div class="controls">
          <input name="categorie" type="text" placeholder="categorie" value="<?php echo !empty($categorie)?$categorie:'';?>">
          <?php if (!empty($categorieErreur)): ?>
               <span class="help-inline"><?php echo $categorieErreur;?></span>
          <?php endif;?>
     </div>
     </div>
     <div class="control-group <?php echo!empty($descriptionErreur)?'error':'';?>">
          <label class="control-label">Description de produit</label>
     <div class="controls">
          <input name="description" type="text" placeholder="description" value="<?php echo !empty($description)?$description:'';?>">
          <?php if (!empty($descriptionErreur)): ?>
               <span class="help-inline"><?php echo $descriptionErreur;?></span>
          <?php endif;?>
     </div>
     </div>
     <div class="control-group <?php echo!empty($imgsrcErreur)?'error':'';?>">
          <label class="control-label">Image de produit</label>
     <div class="controls">
          <input name="imgsrc" type="file" placeholder="image" value="<?php echo !empty($imgsrc)?$imgsrc:'';?>">
          <?php if (!empty($imgsrcErreur)): ?>
               <span class="help-inline"><?php echo $imgsrcErreur;?></span>
          <?php endif;?>
     </div>
     </div>
     <div class="form-actions">
          <button type="submit" class="btn btn-success">Update</button>
          <a class="btn" href="index.php">Back</a>
     </div>
</form>
</div>

</div> <!-- /container -->
</body>
</html>