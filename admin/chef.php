<?php
include "db_conn.php";
session_start();  


  
    


  if (isset($_POST['en'])) {
          

  $id=$_POST['di'];
  $name=$_POST['na'];
  $pre=$_POST['pren'];
  $adre=$_POST['adre'];
  $sql="UPDATE chef SET id='$id',nom_stu='$name',prenom_stu='$pre',adresse='$adre' WHERE id='$id'";
$resulta=mysqli_query($conn,$sql);

if ($resulta) {
  
  header("Location:eleve.php");
}   
}    
    
      if (isset($_GET['s'])) {
        $search=$_GET['Search'];
        $sql="SELECT * FROM chef WHERE CONCAT(id) Like '%$search%'";


     } else{

        $sql="SELECT * FROM chef";
        $search="";
      }
      
      $result=mysqli_query($conn,$sql);


         

?>
<!DOCTYPE html>


<html lang="en" dir="ltr">
  <head>
    <title>chefs</title>
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
            <span class="links_name">commande</span>
          </a>
        </li>
        <li>
          <a href="menu.php">
            <i class="bi bi-menu-button-wide"></i>
            <span class="links_name">Menu</span>
          </a>
        </li>
        <li>
          <a href="chef.php" class="active">
            <i class="bi bi-people"></i>
            <span class="links_name">Chefs (<?php $row=mysqli_num_rows($result);echo $row; ?>)</span>
          </a>
        </li>
        
        
        <li>
          <a href="parametre.php">
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
        <span class="dashboard">Chefs</span>
      </div>
     
      <form method="GET">
      <div class="search-box">
        <input type="text"  placeholder="Search..." name="Search" value="<?php echo $search ;?>" >
                <a ><button name="s" class='bx bx-search' ></button>  </a>
        
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
        
        <div class="box">
          <div class="right-side">
            <h1>Chefs</h1>
           
          </div>
   
          
        </div>
<?php
    if (isset($_POST['eng'])) {
          $id=$_POST['id'];
        $name=$_POST['name'];
        $pre=$_POST['pre'];
  $adre=$_POST['adr'];
        
$sql = "INSERT INTO student (id, nom_stu,prenom_stu,adresse)
VALUES ('$id', '$name','$pre','$adre')";


if ($conn->query($sql) === TRUE) {
  header("Location:eleve.php");
}else{
 $erreur=' Cet éléve existe déja';
     echo '<p style="color: white;background-color: red;width:520px;position:absolute;left:29%;top:30%;text-align: center;
">'.$erreur.'</p>';

} }?>
</div>
<div>

        
           <tr><a href="operations/chef_insert.php" class="w3-button w3-blue">Ajouter chef</a><i class="fa fa-plus" style="color:#61B2FB;padding-left: 5px;font-size: 14px;font-weight: 500;"></i></button>


         
<div class="table-wrapper">
  <table class="fl-table">

  <tr>
    <th>Id</th>
    <th>Nom</th>
    <th>email</th>
    <th>Adresse</th>
    <th>salaire</th>
    <th>specialité</th>
    <th>picture</th>
    
   </tr>
 



 
      
<?php

 
if (mysqli_num_rows($result) > 0){
foreach ($result as  $value) {
  $id=$value['id'];

  
        ?>
  
  <tr class="tr">
    <td class="td"><?php echo $value['id'] ?></td>
    <td class="td"><?php echo $value['nom_com']; ?></td>
    <td class="td"><?php echo $value['email']; ?></td>
    <td class="td"><?php echo $value['adresse']; ?></td>
     <td class="td"><?php echo $value['salaire']; ?> DH</td>
    <td class="td"><?php echo $value['speci']; ?></td>
    <td><img style="width: 60%;height: 270px;border-radius: 12px" class="img-thumbnail" src="../images/<?php echo $value['picture']; ?>"></td>


        <td ><a href="operations/chef_update.php?id=<?php echo $id;?>"class="btn btn-outline-success">Modifier</a>
          <a href="operations/chef_supprimer.php?id=<?php echo $id ; ?>" class="btn btn-outline-danger" onclick="return confirm('vous voulez vraiment supprimer ce Chef ?');">Supprimer</a>

      

  
<?php }}



else{


  echo '<tr class="tr"><td class="td">aucune donnée  n a été trouvée<p></td></tr>';} ?>
     

 

</table>

    </div>  </div>

      
      </div>
    </div>
</div>
  </section>

  <script>
   let sidebar = document.querySelector(".sidebar");
let sidebarBtn = document.querySelector(".sidebarBtn");
let logo_name=document.querySelector(".logo_name");
let home=document.querySelector(".home-section");

let hom=document.querySelector(".fl-table");
let td=document.querySelector(".tr");
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
