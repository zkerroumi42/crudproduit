<!DOCTYPE html>
<head>
    
    <!-- bootstrap css -->
    <link rel="stylesheet" href="img/bootstrap.min.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- style css -->
    <link rel="stylesheet" href="css/style.css">
    <script src="js/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/b823f0ec8f.js" crossorigin="anonymous"></script>
    
    <title>dashbord|admin</title>
</head>
<body>
<!-- debut container -->
    <div class="container-fluid ">
        <div class="row C1"> 
            <div class="col-md-2 colon1"><!-- 1ere colonne -->
          <!-- <a href="profile_admin.php" class="btn  rounded-circle my-button" style=" background-image: url('img/img.jpg');"></a> -->
          <button class="my-button rounded-circle" onclick="window.location.href = 'profile_admin.php'" style=" background-image: url('img/img.jpg');"></button>
          <p class="admin">admin |name</p>
          
                <div class="list">
                    <ul class="m-3 ul1">
                        <li class="m-3 " ><a href="#"><h4><i class="fa-solid fa-bag-shopping"></i>produits</h4></a> <ul><li> <p><a href="create.php"><h6>create-pro</h6></a></p>
                        </li><li ><h6>list-pro</h6></li><li><h6>tester</h6></li></ul></li>
                        <li class="m-3"><a href="#"><h4><i class="fa-solid fa-people-group"></i>clients</h4></a><ul><li>commandes|status</li><li><a href="">messagerie</a></li><li><li><a href="">commentaires</a></li></ul></li>
                        <li class="m-3"><a href="#"><h4><i class="fa-solid fa-layer-group"></i>categor</h4></a><ul><li>addcategorie</li><li></li></ul></li>
                        <li class="m-3"><a href="#"><h4><i class="fa-solid fa-bell"></i>notif</h4></a></li>

                        <li class="m-3"><a href="index.php"><h4><i class="fa-solid fa-lock"></i>logout</h4></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-10 "><!-- 2eme colonne -->
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
                             $sql = 'SELECT * FROM produits ORDER BY Id_Pr DESC';
                             $q=$pdo->query($sql); 
                             foreach ($q as $row) {
                                echo '<tr>';
                                echo '<td>'. $row['Nom'] . '</td>';
                                echo '<td>'. $row['Prix'] . '</td>';
                                echo '<td>'. $row['Quantité_stock'] . '</td>'; 
                                echo '<td>'. $row['Image'] . '</td>';
                                echo '<td>'. $row['Description'] . '</td>';
                                echo "<td><img src='../img/{$row['Image']}' alt='../img/{$row['Image']}' height='80' width='80'></td>";
                                echo '<td >';
                                     echo '<a class="btn" href="read.php?id='.$row['Id_Pr'].'">Read</a>';
                                     echo ' ';
                                     echo '<a class="btn btn-success" href="update.php?id='.$row['Id_Pr'].'">Update</a>';
                                     echo ' ';
                                     echo '<a class="btn btn-danger" href="delete.php?id='.$row['Id_Pr'].'">Delete</a>';
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