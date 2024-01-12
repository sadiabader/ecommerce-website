<?php

include('includes/config.php');

if(isset($_POST['add_product'])){
    $pro_cat = mysqli_real_escape_string($connection, $_POST['p_cat']);
    $pro_name = mysqli_real_escape_string($connection, $_POST['pname']);
    $pro_desc = mysqli_real_escape_string($connection, $_POST['pdesc']);
    $pro_price = mysqli_real_escape_string($connection, $_POST['price']);
    $pro_image_name =$_FILES['image']['name'];
    $pro_image_tmp =  $_FILES['image']['tmp_name'];
    $pro_sku = mysqli_real_escape_string($connection, $_POST['sku']);
    $pro_code = mysqli_real_escape_string($connection, $_POST['pcode']);


$check_product = mysqli_query($connection,"SELECT * from add_product where `p_code` ='$pro_code'");

if(mysqli_num_rows($check_product) > 0){
    echo "<script>
    alert('Product already exist');
    window.location.href ='addproduct.php';
    </script>";
}else{
    move_uploaded_file($pro_image_tmp, 'uploade/' .$pro_image_name);

    $insert = mysqli_query($connection, "INSERT INTO `add_product` (`p_id`,`p_cat`, `p_name`, `p_desc`, `price`, `image`, `sku`, `p_code`, `p_status`) VALUES (NULL,'$pro_cat', '$pro_name', '$pro_desc', '$pro_price', '$pro_image_name', '$pro_sku', '$pro_code', '1')
    ");
    // $insert = mysqli_query($connection, "INSERT INTO `add_product` (`p_id`, `p_cat`,`p_name`, `p_desc`, `price`, `image`, `sku`, `p_code`, `p_status`) VALUES (NULL, '$pro_cat','$pro_name', '$pro_desc', '$pro_price','$pro_image_name',  '$pro_sku', ''$pro_code, '1')
    //  ");
     if($insert){
        echo "<script>
        alert('Product inserted successfully');
        window.location.href ='addproduct.php';
        </script>";
     }else{
        echo "<script>
        alert('failed  to insert the product ');
        window.location.href ='addproduct.php';
        </script>";
     }
}


}
?>

