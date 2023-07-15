<?php 

include "conn.php";


?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ticket</title>
  <link rel="stylesheet" type="text/css" href="../css/ticket.css">
  <style type="text/css">
    
  
  .navbar-brand  {
    color: #4392F5;
   
    
    font-weight: bold;
    text-decoration: none;
  }
  .navbar-brand:hover{
    color: #2E7BE1;
  } 


   .navbar-brand span {
    color: #ce3232;
  }

  </style>
</head>
<body>
   
   <?php 

     if (isset($_GET['id'])) {
      $id=$_GET['id'];
  $sql="SELECT * FROM commande where id_com='$id'";
          $result=mysqli_query($conn,$sql);
          if (mysqli_num_rows($result) > 0){
foreach ($result as  $value) {

?>
  <div id="register">
  <div id="ticket">
   <a href="../index.php"  class="navbar-brand"> <h1 style="font-family:cursive ; font-size: 30px;">Rachad<span style="color: red;">.</span>Cafe</h1></a>

    <p ><?php echo date('Y-m-d '); ?><span style="float: right;"><?php echo date('h:i:sa'); ?></span></p>
        <table>
      
      <tbody id="entries">
        
        
        
      </tbody>
      <tfoot>
        <tr>
          <th>N° commande</th>
          <th id="total"><?php echo $value['id_com']; ?></th>

         </tr>
         <tr>
          <th>N° table</th>
          <th id="total"><?php echo $value['id_tab']; ?></th>
         </tr>
        <tr>
          <th>Repas</th>
          <th id="total"><?php echo $value['repas_co']; ?></th>
         </tr>
         <tr>
          <th>Prix</th>
          <th id="total"><?php echo $value['prix']; ?> DH</th>
          </tr>
          <tr>
          <th>Quantité</th>
          <th id="total"><?php echo $value['quantite']; ?></th>
          </tr>
          <tr>
          <th>Total</th>
          <th id="total"><?php echo $value['prix_to']; ?> DH</th>
       </tr>

      </tfoot>
    </table><h2 style="text-align:center;">Thank You!</h2>
  </div>
  <form id="entry">
    <input id="newEntry" autofocus placeholder="<?php echo $value['prix_to']; ?> DH" readonly>
  </form>
</div>
<?php }}} ?>

</body>
</html>