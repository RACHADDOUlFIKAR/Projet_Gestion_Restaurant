<?php

include "conn.php";




if (isset($_POST['com'])) {

  

 $tab=$_POST['tab'];
  $repas=$_POST['rep'];
  $prix=$_POST['prix'];
  $qantite=$_POST['quantite'];
  $prix_to=$_POST['prix_to'];
  
  
  $sql = "INSERT INTO commande (id_tab, repas_co,prix,quantite,prix_to)
VALUES ('$tab', '$repas','$prix','$qantite','$prix_to')";


  if ($conn->query($sql) === TRUE) {
  
$sql="SELECT * FROM commande";
          $result=mysqli_query($conn,$sql);
          if (mysqli_num_rows($result) > 0){
foreach ($result as  $c) {


header("location:ticket.php?id=".$c['id_com']);

}}}}


 ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<style type="text/css">
  .navbar-brand {
    position: absolute;
    top: 30px;
    left: 80PX;
    color: black;
    font-size: 25px;
    font-weight: bold;
  }

   .navbar-brand span {
    color: #ce3232;
  }
  input[data-readonly] {
  pointer-events: none;
}
</style>
  <title>Ajouter une commande </title>
</head>
<body onload="cacu();"> 
  <a href="../index.php" class="navbar-brand">Rachad <span>.</span> Cafe</a>
  <?php 

     if (isset($_GET['id'])) {
      $id=$_GET['id'];
  $sql="SELECT * FROM menu where id='$id'";
          $result=mysqli_query($conn,$sql);
          if (mysqli_num_rows($result) > 0){
foreach ($result as  $value) {

?>
  <div style="width: 50%;position: absolute;left: 25%;top: 20%;background-color: ;padding: 40px;">
    <h2 style="text-align: center;">Commandez Maintenant</h2>
    <form method="post">
    <div class="mb-3">
      <label>N° Table</label>
   <select  class="form-select"  name="tab" required>
  <option selected disabled value="">Selectez Votre Table</option>
  <option value="1">1</option>
  <option value="2">2</option>
  <option value="3">3</option>
  <option value="4">4</option>
</select>
</div>
    <div class="mb-3">
  <label for="formGroupExampleInput" class="form-label">Repas</label>
  <input type="text" class="form-control" name="rep"  placeholder="" value="<?php echo $value['repas']; ?>" readonly>
</div>
<div class="mb-3">
  
  <label  class="form-label">Prix</label>
  <input type="text" class="form-control" name="prix" id="prix" value="<?php echo $value['prix']; ?> DH" onclick="cacu();" readonly>
  
  <label  class="form-label">Quantité</label>
  <input type="number" name="quantite" class="form-control"  id="qunantite"  value="1" max="20" min="1"  onclick="cacu();">
</div>
  <div class="mb-3">
  
  <input type="text" id="somme"  placeholder="Prix Total" name="prix_to"  style="padding: 5px;" required  data-readonly ><label style="padding: 10px;"></label>
      
  
  
<input type="submit" name="com" class="btn btn-success" value="commander">
  <?php }}} ?>
</form>
</div>
  

</div>
</div>
<script type="text/javascript">
  function cacu() {
    
  
  var prix=document.getElementById("prix").value;
  var quantite=document.getElementById("qunantite").value;

  var somme=parseInt(prix)*parseInt(quantite)+" DH" ;
 
    
  
  document.getElementById("somme").value = somme;
}
  





</script>

</body>
</html>