<?php
  
  $obj_adminBack = new adminBack();
  $product_info = $obj_adminBack->display_product();
  if(isset($_GET['prostatus'])){
      $proid= $_GET['id'];
      if($_GET['prostatus']=='delete'){
         $msg = $obj_adminBack->delete_product($proid);
      }

  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        #imgage{
            width:50px;
            height:50px;
        }
    </style>
</head>
<body>
<h2>manage product</h2>
 
<?php 
   if(isset($msg)){
       echo $msg;
   }
?>
<table class="table">
<thead>
    <tr>
        <th>ID</th>
        <th>Product Name</th>
        <th>Price</th>
        <th>Description</th>
        <th>Image</th>
        <th>Category</th>
        <th>Status</th>
        <th>Update/ Delete</th>

    </tr>


</thead>

<tbody>

<?php while($product = mysqli_fetch_assoc
($product_info)){


?>

    <tr> 
        <td><?php echo $product['pdt_id']; ?></td>
        <td><?php echo $product['pdt_name']; ?></td>
        <td><?php echo $product['pdt_price']; ?></td>
        <td><?php echo $product['pdt_des']; ?></td>
        <td><img id="imgage" src ="upload/<?php echo 
        $product['pdt_img']; ?>" style></td>
        <td><?php echo $product['ctg_name']; ?></td>
        <td><?php 
          if($product['pdt_status']==1){
              echo "Published";  
          }
          else{
              echo "Unpublished";
          }
         ?></td>
        <td>
            <a href="edit_product.php?prostatus=edit&&id= <?php echo 
          $product['pdt_id']; ?>">Edit</a>
        <br>
          <a href="?prostatus=delete&&id= <?php echo 
          $product['pdt_id']; ?>">Delete</a>

        </td>

    </tr>
    <?php } ?>
</tbody>
</table>
</body>
</html>
