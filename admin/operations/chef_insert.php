<?php
include "../db_conn.php";
session_start();
  if (isset($_POST['en'])) {


    $Nom=$_POST['Nom'];
    $Email=$_POST['Email'];
    $Adresse=$_POST['Adresse'];
    $Salaire=$_POST['Salaire'];
    $specialité=$_POST['specialité'];
    
    $picture=$_FILES['picture']['name'];
    $upload="../../images/".$picture;
    move_uploaded_file($_FILES['picture']['tmp_name'],$upload);
    
        
$sql = "INSERT INTO chef (nom_com,email,adresse,salaire,speci,picture)
VALUES ('$Nom','$Email','$Adresse','$Salaire','$specialité','$picture')";


if ($conn->query($sql) === TRUE) {
 
   header("Location:../chef.php");
}
}
        $sql="SELECT * FROM menu";
      $result=mysqli_query($conn,$sql);
?>
<!DOCTYPE html>


<html lang="en" dir="ltr">
  <head>
    <title>Ajouter Menu</title>
    <meta charset="UTF-8">
  
    <link rel="stylesheet" href="../style3.css">
 
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> 

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    


     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="sidebar">
    
      
      <ul class="nav-links">
        <li>
          <a href="../chef.php" class="active">
            <i class="bi bi-arrow-bar-left"></i>>
            <span class="links_name">Retour</span>
          </a>
        </li>
         <li class="log_out">
          <a href="../index.php" class="active">
            <i class='bx bx-log-out'></i>
            <span class="links_name"> Deconnexion</span>
          </a>
        </li>
      </ul>
  </div>
    </div>
      
        
       
  <section class="home-section">
    
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard">Chefs</span>
      </div>
     
      
      <div class="profile-details">
     
        <span class="admin_name" ><?php
        $str=$_SESSION['user_name'];
          echo strtoupper($str);
         
           ?>

                                </span>
       
      </div>
    </nav>
  

    <div class="home-content">
      <div class="overview-boxes">
        
        <div class="box">
          <div class="right-side">
            <h1>chefs</h1>
           
          </div>
   
          
        </div>

</div>
<div>

        

 



    </div> <div style="width: 50%;margin-left: 23%;">
<form method="POST" enctype="multipart/form-data">
        <h4>Ajouter Chefs :</h4><br>
        
           <div class="form-floating mb-2" >

  <input type="text" name="Nom" class="form-control" id="floatingInput" placeholder="Nom"  >
  <label for="floatingInput"> Nom</label>
</div>
<div class="form-floating">
  <input type="text" name="Email" class="form-control" id="floatingPassword" placeholder="Email" >
  <label for="floatingPassword">Email</label>
</div>
<div class="form-floating">
  <input type="text" name="Adresse" class="form-control" id="floatingPassword" placeholder="Adresse" >
  <label for="floatingPassword">Adresse</label>
</div>
<div class="form-floating">
  <input type="text" name="Salaire" class="form-control" id="floatingPassword" placeholder="Salaire" >
  <label for="floatingPassword">Salaire</label>
</div>

<div class="form-floating">
  <input type="file" name="picture" class="form-control" id="floatingPasswor" placeholder="photo" >

  
</div>
<div class="form-floating">
  <input type="text" name="specialité"  class="form-control" id="floatingPassword" placeholder="specialité" >
  <label for="floatingPassword"> specialité</label><br>
   <input type="submit" name="en" class="btn btn-primary active" value="enregistrer">
    <input type="reset"  class="btn btn-danger" value="annuler"><br><br><br>
    </div> 
  </div>

      
      </div>
    </div>
</div>
  </section>

  <script>
   let sidebar = document.querySelector(".sidebar");
let sidebarBtn = document.querySelector(".sidebarBtn");
let logo_name=document.querySelector(".logo_name");
sidebarBtn.onclick = function() {

  sidebar.classList.toggle("active");
  if(sidebar.classList.contains("active")){
    logo_name.style.display="none";
  sidebarBtn.classList.replace("bx-menu" ,"bx-menu-alt-right");
}else
logo_name.style.display="block";
  sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
}

 </script>

</body>
</html>
