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
            <div class="col-md-3 colon1"><!-- 1ere colonne -->
          <!-- <a href="profile_admin.php" class="btn  rounded-circle my-button" style=" background-image: url('img/img.jpg');"></a> -->
          <button class="my-button rounded-circle" onclick="window.location.href = 'profile_admin.php'" style=" background-image: url('img/img.jpg');"></button>
          <p class="admin">admin |name</p>
          
          <div class="list">
                    <ul class=" ul1">
                        <li><a href="#"><h4><i class="fa-solid fa-bag-shopping"></i>Produits</h4></a> <ul><li> <a href="create.php"><h6>create-pro</h6></a>
                        </li><li><a href="list_produits.php"><h6>list-pro</h6></a></li><li class="lien2"><h6>tester</h6></li></ul></li>
                        <li><a href="#"><h4><i class="fa-solid fa-layer-group"></i>Categories</h4></a><ul><li><h6>create categorie</h6></li><li><a href="list_categories.php"><h6>list categories</h6></a></li></ul></li>
                        <li><a href="#"><h4><i class="fa-solid fa-people-group"></i>Clients</h4></a><ul><li><a href="list_clients.php"><h6>list-clients</h6></a></li><li><a href=""><h6>commentaires</h6></a></li></ul></li>
                       <!--situation produit pas en cours ou encours ou livrai  -->
                        <li><a href="notifications.php"><h4><i class="fa-solid fa-bell"></i>Notifications</h4></a></li>
                        <li class=""><a href="deconnection.php"><h4><i class="fa-solid fa-lock"></i>Déconnecter</h4></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-9 "><!-- 2eme colonne -->
                <div class="col-12 text-center mb-2">
                  </div>
                  <div class="container">
                 <div class="test">
                   <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>nom</th>
                            <th>prix</th>
                            <th>quantite stock</th>
                            <th>categorie</th>
                            <th>description</th>
                            <th>image src</th>
                            <th>Action</th>
              
                        </tr>
                    </thead>
                    <tbody>

                            <?php
                            include 'database.php';
                             $pdo = Database::connect();
                             $sql = 'SELECT * FROM test ORDER BY id DESC';
                             $q=$pdo->query($sql); 
                             foreach ($q as $row) {
                                echo '<tr>';
                                echo '<td>'. $row['nom'] . '</td>';
                                echo '<td>'. $row['prix'] . '</td>';
                                echo '<td>'. $row['quantite'] . '</td>'; 
                                echo '<td>'. $row['categorie'] . '</td>';
                                echo '<td>'. $row['description'] . '</td>';
                                echo "<td><img src='img/{$row['imgsrc']}' alt='img/{$row['imgsrc']}' height='80' width='80'></td>";
                                echo '<td >';
                                     echo '<a class="btn" href="read.php?id='.$row['id'].'">Read</a>';
                                     echo ' ';
                                     echo '<a class="btn btn-success" href="update.php?id='.$row['id'].'">Update</a>';
                                     echo ' ';
                                     echo '<a class="btn btn-danger" href="delete.php?id='.$row['id'].'">Delete</a>';
                                     echo '</td>';
                                     echo '</tr>';
                                 }
                                     Database::disconnect();
                            ?>
                    </tbody>
                   </table>
              </div>
            </div><!--fin container -->
        </div>
    </div>
    
    

    </div>
   <!-- fin container fluid -->
   <script>
$(document).ready(function() {
  $('.ul1 ul').slideUp();
  $('.ul1 li').click(function() {
    $(this).children('ul').slideToggle("speed");
  });
});

</script>
    <!-- bootstrap javascript -->
    <script src="js/bootstrap.min.js"></script>
    <!-- javascript  -->
    <script src="js/script.js"></script>
   
</body>
</html>