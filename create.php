<?php
require 'database.php'; 
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
$profile_image_location = 'img/' . $imgsrc;
$move = move_uploaded_file($profile_tmp, $profile_image_location);

// if(isset($_FILES['imgsrc'])) {
//     $imgsrc = $_FILES['imgsrc']['name'];
//     $profile_tmp = $_FILES['imgsrc']['tmp_name'];
//     $profile_image_location = '../img/' . $imgsrc;
    
//     // Vérifie si le fichier est une image valide
//     $allowed_extensions = array('jpg', 'jpeg', 'png', 'gif');
//     $file_extension = pathinfo($profile_image_location, PATHINFO_EXTENSION);
    
//     if(in_array($file_extension, $allowed_extensions)) {
//         // Déplace le fichier téléchargé dans le dossier des images
//         if(move_uploaded_file($profile_tmp, $profile_image_location)) {
//             echo 'Image téléchargée avec succès !';
//         } else {
//             echo 'Erreur lors du téléchargement de l\'image.';
//         }
//     } else {
//         echo 'Type de fichier invalide. Seules les images JPG, JPEG, PNG et GIF sont autorisées.';
//     }
// }else{
//     echo 'erreur variable n\'existe pas';
// }


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
    
    // insert data 
    if ($valid) {
    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO test (nom,prix,quantite,categorie,description,imgsrc) values(?, ?,?,?,?,?)";
    $q = $pdo->prepare($sql);
    $q->execute(array($nom,$prix,$quantite,$categorie,$description,$imgsrc));
    Database::disconnect();
    header("Location: index.php");
    }
    }
    ?>

<!DOCTYPE html>
<head>
    
    <!-- bootstrap css -->
    <link rel="stylesheet" href="img/bootstrap.min.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- style css -->
    <link rel="stylesheet" href="css/style.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/b823f0ec8f.js" crossorigin="anonymous"></script>

    <title>dashbord|admin</title>
</head>
<body>
<!-- debut container -->
    <div class="container-fluid ">
        <div class="row C1"> 
            <div class="col-md-2 colon1" style="position:sticky;top=0;"><!-- 1ere colonne -->
          
                <button class="my-button rounded-circle" onclick="window.location.href = 'index.php'" style=" background-image: url('img/img.jpg');"></button> 

                  <p class="admin">admin |nom</p>
          
                  <div class="list">
                    <ul class="m-3 ul1">
                        <li class="m-3 " ><a href="#"><h4><i class="fa-solid fa-bag-shopping"></i>produits</h4></a> <ul><li> <p><a href="create.php"><h6>create-pro</h6></a></p>
                        </li><li><a href="list_produits.php"><h6>list-pro</h6></a></li><li class="lien2"><h6>tester</h6></li></ul></li>
                        <li class="m-3"><a href="#"><h4><i class="fa-solid fa-people-group"></i>clients</h4></a><ul><li>commandes|status</li><li><a href="">messagerie</a></li><li><li><a href="">commentaires</a></li></ul></li>
                        <li class="m-3"><a href="#"><h4><i class="fa-solid fa-layer-group"></i>categor</h4></a><ul><li>addcategorie</li><li></li></ul></li>
                        <li class="m-3"><a href="#"><h4><i class="fa-solid fa-bell"></i>notif</h4></a></li>

                        <li class="m-3"><a href="login.php"><h4><i class="fa-solid fa-lock"></i>logout</h4></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-10 "><!-- 2eme colonne -->
            <div class="container">

<div class="span10 offset1">
    <div class="row">
        <h3>Create a Produit</h3>
    </div>
    <form class="form-horizontal" action="create.php" method="post" enctype="multipart/form-data">
        <div class="control-group <?php echo !empty($nomErreur)?'error':'';?>">
            <label class="control-label">nom</label>
        <div class="controls">
            <input name="nom" type="text" placeholder="nom" value="<?php echo !empty($nom)?$nom:'';?>">
            <?php if (!empty($nomErreur)): ?>
            <span class="help-inline"><?php echo $nomErreur;?></span>
            <?php endif; ?>
               
        </div>
        </div>
        <div class="control-group <?php echo !empty($prixErreur)?'error':'';?>">
            <label class="control-label">Prix </label>
        <div class="controls">
            <input name="prix" type="text" placeholder="Prix" value="<?php echo !empty($prix)?$prix:'';?>">
            <?php if (!empty($prixErreur)): ?>
            <span class="help-inline"><?php echo $prixErreur;?></span>
            <?php endif;?>
            </div>
            </div>
            <div class="control-group <?php echo !empty($quantiteErreur)?'error':'';?>">
                <label class="control-label">quantite</label>
            <div class="controls">
                <input name="quantite"  type="text" placeholder="quantite" value="<?php echo !empty($quantite)?$quantite:'';?>">
                <?php if (!empty($quantiteErreur)): ?>
                <span class="help-inline"><?php echo $quantiteErreur;?></span>
                <?php endif;?>
            </div>
            </div>
            <div class="control-group <?php echo !empty($categorieErreur)?'error':'';?>">
                <label class="control-label">categorie</label>
            <div class="controls">
                <input name="categorie"  type="text" placeholder="categorie" value="<?php echo !empty($categorie)?$categorie:'';?>">
                <?php if (!empty($categorieErreur)): ?>
                <span class="help-inline"><?php echo $categorieErreur;?></span>
                <?php endif;?>
            </div>
            </div>
            <div class="control-group <?php echo !empty($descriptionErreur)?'error':'';?>">
                <label class="control-label">description</label>
            <div class="controls">
                <input name="description"  type="text" placeholder="description" value="<?php echo !empty($description)?$description:'';?>">
                <?php if (!empty($descriptionErreur)): ?>
                <span class="help-inline"><?php echo $descriptionErreur;?></span>
                <?php endif;?>
            </div>
            </div>
            <div class="control-group <?php echo !empty($imgsrcErreur)?'error':'';?>">
                <label class="control-label">image</label>
            <div class="controls">
                <input name="imgsrc" id="imgsrc" type="file" placeholder="image" enctype="multipart/form-data">
                <?php if (!empty($imgsrcErreur)): ?>
                <span class="help-inline"><?php echo $imgsrcErreur;?></span>
                <?php endif;?>
            </div>
            </div>


            <div class="form-actions">
                <button type="submit" class="btn btn-success">Create</button>
                <a class="btn" href="index.php">Back</a>
            </div>
    </form>
    </div>

    </div>
    </div>
    </div>
    
    

    </div>
   <!-- fin container fluid -->
   <script>
$(document).ready(function() {
  $('.ul1 ul').slideUp();
  $('.ul1 li').click(function() {
    $(this).children('ul').slideToggle("slow");
  });

</script>
    <!-- bootstrap javascript -->
    <script src="js/bootstrap.min.js"></script>
    <!-- javascript  -->
    <script src="js/script.js"></script>
   
</body>
</html>