<?php
include "db_conn.php";
session_start();  


    if (isset($_POST['re'])) {
      $name=$_SESSION['user_name'];;
      $sql="delete from users where user_name='$name'";
      $result=mysqli_query($conn,$sql);
      header("Location:index.php");
    }
  

?>
<!DOCTYPE html>


<html lang="en" dir="ltr">
  <head>
    <title>Parametre</title>
    <meta charset="UTF-8">
  
    <link rel="stylesheet" href="style2.css">
 
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> 

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    


     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="sidebar">
    <div class="logo-details">
      
      <span class="logo_name"><span style="color:white;"><span style="color: black;">Rachad</span> <span style="color: red;">.  </span>café</span>
    </div>
      <ul class="nav-links">
        <li>
          <a href="acceil.php" >
            <i class='bx bx-grid-alt' ></i>
            <span class="links_name">Accueil</span>
          </a>
        </li>
        <li>
          <a href="commande.php"  >
            <i class="bi bi-basket"></i>
            <span class="links_name">Commandes</span>
          </a>
        </li>
        <li>
          <a href="menu.php">
            <i class="bi bi-menu-button-wide"></i>
            <span class="links_name">Menu</span>
          </a>
        </li>
        <li>
          <a href="chef.php" >
            <i class="bi bi-people"></i>
            <span class="links_name">Chefs</span>
          </a>
        </li>
        
        
        <li>
          <a href="parametre.php" class="active">
            <i class='bx bx-cog' ></i>
            <span class="links_name">Parametre</span>
          </a>
        </li>
        <li class="log_out">
          <a href="index.php" class="active">
            <i class='bx bx-log-out'></i>
            <span class="links_name"> Deconnexion</span>
          </a>
        </li>
      </ul>
  </div>
  <section class="home-section">
    
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard">Parametre</span>
      </div>
     
        
      </div>
    </form>
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
        
       <?php 
if (isset($_POST['en'])) {
    

  if ($_POST['pass']===$_POST['vapass']) {
    $name=$_POST['na'];
  $pass=$_POST['pass'];
  $vapass=$_POST['vapass'] ;     

if (empty($pass)||empty($vapass)) {
  $erreur='Remplir les champs ';
     echo '<p style="text-align: center;color: white;background-color: red;width:520px;position:absolute;left:29%
">'.$erreur.'</p>';
  
}
  else{$sql="UPDATE users SET user_name='$name',password='$pass' WHERE user_name='$name'";
$resulta=mysqli_query($conn,$sql);

 if ($conn->query($sql) === TRUE) {
  $erreu='Modification avec succès';
  echo '<p style="text-align: center;color: white;background-color: green;width:520px;position:absolute;left:29%
">'.$erreu.'</p>';}
  
}
  


  
 } else{

     $erreur='Mot De passe n est pas exact ';
     echo '<p style="text-align: center;color: white;background-color: red;width:520px;position:absolute;left:29%
">'.$erreur.'</p>';
}}  ?>

</div>
<br>
<div style="width: 50%;margin-left: 23%;">
<form method="POST">
        <h4>Modification de Mot de Passe :</h4><br>
           <div class="form-floating mb-2" >

  <input type="email" name="na" class="form-control" id="floatingInput" placeholder="name@example.com" value="<?php echo $str;?>" readonly="readonly" >
  <label for="floatingInput">Nom</label>
</div>
<div class="form-floating">
  <input type="password" name="pass" class="form-control" id="floatingPassword" placeholder="Password" >
  <label for="floatingPassword">Mot de passe</label>
</div>
<div class="form-floating">
  <input type="password" name="vapass" class="form-control" id="floatingPassword" placeholder="Password" >
  <label for="floatingPassword"> confirmer Mot de passe</label><br>
   <input type="submit" name="en" class="btn btn-primary active" value="enregistrer">
    <input type="reset"  class="btn btn-danger" value="annuler"><br><br><br>
    
   
</div>

     <div> 
     <button style="position: absolute;left: 40%" type="submit" name="re" class="btn btn-warning" onclick="return confirm('vous voulez vraiment supprimer votre compte?');">Supprimer votre compte</button>
     <p style="position: absolute;top: 110%;left: 25%;font-size: 15px;" class="h4">La suppression de votre compte Shcool App est obligatoirement la suppression des donneés</p>
 </form>
      

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
