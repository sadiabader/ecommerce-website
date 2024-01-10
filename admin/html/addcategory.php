<?php


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


