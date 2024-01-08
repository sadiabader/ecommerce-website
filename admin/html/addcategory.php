<?php
session_start();
if(!isset($_SESSION['useremail'])){
  header('location:login.php');
}
  include ('includes/header.php');
  include('includes/navbar.php');
  include('includes/sidebar.php');

include('includes/config.php');

if(isset($_POST['add_category'])){
  $cat_id = $_POST['cid'];
  $cat_name = $_POST['cname'];
  $cat_desc= $_POST['cdesc'];
  $cat_status= $_POST['cstatus'];
  echo $cat_name, $cat_desc;
$check_cat = mysqli_query($connection, "SELECT * from add_cat where cat_name = $cat_name");
if(mysqli_num_rows($check_cat) > 0){
  echo "<script>
  alert('category already exist');
  window.location.href='addcategory.php';
  </script>";
}else{
$result = mysqli_query($connection, "INSERT INTO `add_cat` (`cat_id`, `cat_name`, `cat_desc`,
 `cat_status`) VALUES (NULL, '$cat_name', '$cat_desc', '$cat_status')
");
if($result){
  echo "<script>
  alert('category successfully added');
  window.location.href='addcategory.php';
  </script>";
}else{
  echo "<script>
  alert('category addition failed');
  window.location.href='index.php';

  </script>";
}
}

}


?>
<!-- <div class="container-fluid"> -->

<!-- category modal start-->

<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#exampleModal">
  Add Category
</button> -->

<!-- Modal -->
<!-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Creat  Category</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                  <div class="mb-3">
                    <label for="exampleInputtext1" class="form-label"> Categoryname</label>
                    <input type="text"name="cname" class="form-control" id="exampleInputtext1" aria-describedby="textHelp">
                  </div>
                  <div class="mb-3">
                  <label for="floatingTextarea">Category Description</label>
                    <div class="form-floating">
                   <textarea class="form-control"name="cdesc" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                  </div>
                  </div>
                  <input type="submit"name="Add_category"class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2" value="Add product">

                </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
</div> -->
<!-- product modal end-->

<!-- <?php
  include('includes/footer.php');
?> -->


