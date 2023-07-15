
<?php
include "db_conn.php";
session_start();  



?>
<!DOCTYPE html>


<html lang="en" dir="ltr">
  <head>
    <title>accueil</title>
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
          <a href="acceil.php" class="active">
            <i class='bx bx-grid-alt' ></i>
            <span class="links_name">Accueil</span>
          </a>
        </li>
        <li>
          <a href="commande.php" >
            <i class="bi bi-basket"></i>
            <span class="links_name">commandes</span>
          </a>
        </li>
        <li>
          <a href="menu.php">
            <i class="bi bi-menu-button-wide"></i>
            <span class="links_name">Menu</span>
          </a>
        </li>
        
          
        <li>
          <a href="chef.php">
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
        <span class="dashboard">Accueil</span>
      </div>
      <?php
      if (isset($_POST['s'])) {
        
        
      
        $search=$_POST['Search'];
        $sql="SELECT * FROM commande WHERE CONCAT(id_com) Like '%$search%'";


     } else{

        $sql="SELECT * FROM commande order by id_com asc limit 4  ";
        $search="";
      }
      
      $result=mysqli_query($conn,$sql);


       ?>
      <form method="POST">
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
            <h1>Recent Commandes  </h1>
           
          </div>
   
          
        </div>


</div>
<div>

           
<div class="table-wrapper">
  <table class="fl-table">
           
  <tr>
    <th>N° commande</th>
    <th>N° table</th>
    <th>Repas</th>
    <th>Prix</th>
    <th>Quantite</th>
    <th>Total</th>





      
<?php
 
if (mysqli_num_rows($result) > 0){
while($row= mysqli_fetch_assoc($result))
{
        ?>
  </tr>
  <tr class="tr">
    <td class="td"><?php echo $row['id_com']; ?></td>
    <td class="td"><?php echo $row['id_tab']; ?></td>
    <td class="td"><?php echo $row['repas_co']; ?></td>
    <td class="td"><?php echo $row['prix']; ?></td>
    <td class="td"><?php echo $row['quantite']; ?></td>
    <td class="td"><?php echo $row['prix_to']; ?> DH</td>
    <td ><td>
   
  </tr>
<?php }}else{

   
  echo '<tr class="tr"><td class="td">Ce étudiant n existe pas<p></td></tr>';} ?>
<td><a  href="commande.php" class="btn btn-primary">voir tous</a></td>
</table>

    </div>  </div>

    
   
  <div class="card" style="width: 20rem;position: absolute;left: 10%;">
    <img class="card-img-top" src="../images/C.jpg" alt="Card image cap" style="height: 180px;">
  <div class="card-body">
    <h5 class="card-title">Totale de commandes</h5>
    <p class="card-text"><b><?php $sql="SELECT * FROM commande";$result=mysqli_query($conn,$sql);$row=mysqli_num_rows($result); echo $row; ?></b></p>
    <a href="commande.php" class="btn btn-primary">voir détail</a>
  </div>


</div>
 <div class="card" style="width: 20rem;position: absolute;left: 40%;">
  <img class="card-img-top" src="../images/b.jpg" alt="Card image cap" style="height: 180px;">
  <div class="card-body">
    <h5 class="card-title">Nombres de Repas</h5>
    <p class="card-text"><b><?php $sql="SELECT * FROM menu";$result=mysqli_query($conn,$sql);$row=mysqli_num_rows($result); echo $row; ?></b></p>
    <a href="menu.php" class="btn btn-primary">voir détail</a>
  </div>


</div>
<div class="card" style="width: 20rem;position: absolute;left: 70%;">
  <img class="card-img-top" src="../images/a.jpg." alt="Card image cap" style="height: 180px;">
  <div class="card-body">
    <h5 class="card-title">Nombres de Chefs</h5>
    <p class="card-text"><b><?php $sql="SELECT * FROM chef";$result=mysqli_query($conn,$sql);$row=mysqli_num_rows($result); echo $row; ?></b></p>
    <a href="chef.php" class="btn btn-primary">voir détail</a>
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
