<?php
include "db_conn.php";
session_start();  


  
      


    
      if (isset($_GET['s'])) {
        $search=$_GET['Search'];
        $sql="SELECT * FROM menu WHERE id Like '%$search%'";


     } else{

        $sql="SELECT * FROM menu";
        $search="";
      }
      
      $result=mysqli_query($conn,$sql);


         

?>
<!DOCTYPE html>


<html lang="en" dir="ltr">
  <head>
    <title>Menu</title>
    <meta charset="UTF-8">
  
    <link rel="stylesheet" href="style3.css">
 
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> 

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/magnific-popup.css">

    


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
            <span class="links_name">Commande</span>
          </a>
        </li>
        <li>
          <a href="menu.php" class="active">
            <i class="bi bi-menu-button-wide"></i>
            <span class="links_name">Menu (<?php $row=mysqli_num_rows($result);echo $row; ?>)</span>
          </a>
        </li>
        <li>
          <a href="chef.php" >
            <i class="bi bi-people"></i>
            <span class="links_name">Chefs</span>
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
        <span class="dashboard">Menu</span>
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
            <h1>Menu</h1>
           
          </div>
   
          
        </div>

</div>
<div>

        
           <tr><a href="operations/menu_insert.php" class="w3-button w3-blue" >Ajouter Menu</a>  <i class="fa fa-plus" style="color:#61B2FB;padding-left: 5px;font-size: 14px;font-weight: 500;"></i></button>

</div>

         
<div class="table-wrapper">
  <table class="fl-table">

  <tr>
    <th>Id</th>
    <th>Reaps</th>
    <th>ingradients</th>
    <th>Prix</th>
    <th>picture</th>
    
    
    
   </tr>
 



 
      
<?php

 
if (mysqli_num_rows($result) > 0){
foreach ($result as  $value) {
  
$id=$value['id'];
  
        ?>
  
  <tr class="tr">
    <td class="td"><?php echo $value['id'] ?></td>
    <td class="td"><?php echo $value['repas']; ?></td>
    <td class="td"><?php echo $value['ingredient']; ?></td>
        <td class="td"><?php echo $value['prix']; ?> DH</td>
        
        <td><img style="width: 70%;height: 200px;border-radius: 12px" class="img-thumbnail" src="../images/<?php echo $value['photo']; ?>" class="img-responsive"></td>

    




        <td  ><a href="operations/menu_update.php?id=<?php echo $id;?>" class="btn btn-outline-success" >modifier</a> 
          <a href="operations/menu_delete.php?id=<?php echo $id;?>" class="btn btn-outline-danger" onclick="return confirm('vous voulez vraiment supprimer ce Repas?');">Supprimer</a> </td></tr>  

      

  
      </div>
    </div>
  </div>
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
