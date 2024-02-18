<?php
session_start();
if(!isset($_SESSION['useremail'])){
  header('location:login.php');
}
  include ('includes/header.php');
  include('includes/navbar.php');
  include('includes/sidebar.php');
  include('includes/config.php');

?>
<div class="container-fluid">

<!-- Category modal start -->

<button type="button" class="btn btn-primary float-sm-start" data-bs-toggle="modal" data-bs-target="#add_category">
 Add Category
</button>

<!-- Modal -->
<div class="modal fade" id="add_category" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Create Category</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="addcategory.php" method="POST">
                  <div class="mb-3">
                    <label for="exampleInputtext1" class="form-label">Name</label>
                    <input type="text" name="cname" class="form-control"  aria-describedby="textHelp">
                  </div>
                  <div class="mb-3">
                      <label for="floatingTextarea">Description</label>
                    <div class="form-floating">
                    <textarea class="form-control" name="cdesc" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                    </div>
                  </div>
                  
                  <input type="submit" name="add_category" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2" value="Add category">
                  
                 
                </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Category modal End -->


    <!-- product modal start -->
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary float-sm-end" data-bs-toggle="modal" data-bs-target="#add_product">
 Add Product
</button>

<!-- Modal -->
<div class="modal fade" id="add_product" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Create Product</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="productaddition.php" method="POST" enctype="multipart/form-data">
                  <div class="mb-3">
                    <label for="exampleInputtext1" class="form-label">Select Category</label>
                    <select class="form-select" name="p_cat" aria-label="Default select example">
                    <?php 
                    $fetch_cat = mysqli_query($connection, "SELECT * from add_cat");
                    if(mysqli_num_rows($fetch_cat) > 0){
                      while($row = mysqli_fetch_assoc($fetch_cat)){
                        echo '<option value="'.$row['cat_id'].'">'.$row['cat_name'].'</option>';
                      }
                    }
                    ?>
    
                    </select>
                    </div>
                  <div class="mb-3">
                    <label for="exampleInputtext1" class="form-label">Name</label>
                    <input type="text" name="pname" class="form-control" id="exampleInputtext1" aria-describedby="textHelp">
                  </div>
                  <div class="mb-3">
                      <label for="floatingTextarea">Description</label>
                    <div class="form-floating">
                    <textarea class="form-control" name="pdesc" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                    </div>
                  </div>
                  <div class="mb-4">
                    <label for="exampleInputPassword1" class="form-label">Price</label>
                    <input type="text" name="price" class="form-control" id="exampleInputPassword1">
                  </div>
                  <div class="mb-4">
                    <label for="exampleInputPassword1" class="form-label">Image</label>
                    <input type="file" name="image" class="form-control">
                  </div>
                  <div class="mb-4">
                    <label for="exampleInputPassword1" class="form-label">SKU</label>
                    <input type="text" name="sku" class="form-control">
                  </div>
                  <div class="mb-4">
                    <label for="exampleInputPassword1" class="form-label">Product Code</label>
                    <input type="text" name="pcode" class="form-control">
                  </div>
                  <input type="submit" name="add_product" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2" value="Add Product">
                  
                 
                </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>







    <div class="container mt-5" >
<div
     class="table-responsive"
>
    <table
        class="table"
    >
        <thead class="table-dark">
            <tr>
                <th scope="col">PID</th>
                <th scope="col">Category</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Price</th>
                <th scope="col">Image</th>
                <th scope="col">SKU</th>
                <th scope="col">Product Code</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $products = mysqli_query($connection, "SELECT * from add_product as p inner join add_cat as c 
        on p.p_cat =  c.cat_id");
        if(mysqli_num_rows($products) > 0){
          while($data = mysqli_fetch_assoc($products)){

          
        
        ?>
        
        <tr>
                <td scope="row"><?php echo $data['p_id']?></td>
                <td><?php echo $data['cat_name']?></td>
                <td><?php echo $data['p_name']?></td>
                <td><?php echo $data['p_desc']?></td>
                <td><?php echo $data['price']?></td>
                <td><img src="<?php echo 'uploade/'. $data['image'] ?>" alt="<?php echo $data['image'] ?>" height="70px" width="70px"></td>
                <td><?php echo $data['sku']?></td>
                <td><?php echo $data['p_code']?></td>
                <td>
                <a href="" class="btn btn-primary edit" data-id="<?php echo $data['p_id'] ?>">Edit</a>
                <a href="" class="btn btn-danger delete" data-id="<?php echo $data['p_id'] ?>">Delete</a>
          </td>
            </tr>
            <?php
      }
    }
    ?>
        </tbody>
    </table>
</div>

</div>
</div>






<?php
  include('includes/footer.php');
?>
<script src="./user.js"></script>