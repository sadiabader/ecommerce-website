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

<!-- category modal start-->

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#exampleModal">
  Add Category
</button>

 <!-- Modal  -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Creat  Category</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="addcategory.php" method="post">
                  
                  <div class="mb-3">
         
                    <label for="exampleInputtext1" class="form-label"> Category name</label>
                    <input type="text"name="cname" class="form-control" id="exampleInputtext1" aria-describedby="textHelp">
                  </div>
                  <div class="mb-3">
                  <label for="floatingTextarea">Category Description</label>
                    <div class="form-floating">
                   <textarea class="form-control"name="cdesc" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                  </div>
                  </div>
                  <!-- <select class="form-select" aria-label="Default select example" name="status">
                                    <option selected>Open this select status</option>
                                    <option value="1">Active</option>
                                    <option value="2">Deactivate</option> 

                                </select>-->
                  <input type="submit"name="Add_category"class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2" value="Add category">

                </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div> 

<!-- category modal end-->




<!-- product modal start-->

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary float-sm-end" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Add Product
</button>

<!-- Modal -->
<div class="modal fade" id="addproduct" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Creat Product</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="register.php" method="post">
      <div class="mb-3">
                    <label for="exampleInputtext1" class="form-label">Select category</label>
                    <select class="form-select" aria-label="Default select example">

                    <?php
                    $fetch_cat = mysqli_query($connection, "SELECT* from add_cat");
                    if(mysqli_num_rows($fetch_cat) > 0){
                      while($row = mysqli_fetch_assoc($fetch_cat)){
                        echo '<option value="'.$row['cat_id'].'"> '.$row['cat_name'].'Two</option>';

                      }
                    }
                    ?>
  
                   </select>
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputtext1" class="form-label">Pname</label>
                    <input type="text"name="pname" class="form-control" id="exampleInputtext1" aria-describedby="textHelp">
                  </div>
                  <div class="mb-3">
                  <label for="floatingTextarea">Description</label>
                    <div class="form-floating">
                   <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                  </div>
                  </div>
                  <div class="mb-4">
                    <label for="exampleInputPassword1" class="form-label">Price</label>
                    <input type="text"name="price" class="form-control" id="exampleInputPassword1">
                 </div>
                  <div class="mb-4">
                  <label for="exampleInputPassword1" class="form-label">Image</label>
                    <input type="file"name="image"class="form-control">
                 </div>
                 <div class="mb-4">
                  <label for="exampleInputPassword1" class="form-label">SKU</label>
                    <input type="number"name="sku"class="form-control">
                 </div>
                 <div class="mb-4">
                  <label for="exampleInputPassword1" class="form-label">Product Code</label>
                    <input type="text"name="pcode" class="form-control">
                 </div>
                 <input type="submit"name="add_product"class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2" value="Add category">
              
                </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- product modal end-->
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
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Price</th>
                <th scope="col">Image</th>
                <th scope="col">SKU</th>
                <th scope="col">Product Code</th>
            </tr>
        </thead>
        <tbody>
            <tr class="">
                <td scope="row">R1C1</td>
                <td>R1C2</td>
                <td>R1C3</td>
                <td scope="row">R1C1</td>
                <td>R1C2</td>
                <td>R1C3</td>
                <td>R1C3</td>
            </tr>
       
        </tbody>
    </table>
</div>

</div>
</div>






<?php
  include('includes/footer.php');
?>