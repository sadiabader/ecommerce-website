
$('document').ready(function(){
    // console.log('')
let pname = $('#pname');
let pdesc = $('#pdesc');
let price = $('#price');
let psku = $('#sku');
let pid = $('#p_id');

add_product_modal = $('#add_product')

$('.edit').on('click', function(e){
    e.preventDefault();
        let p_id = $(this).attr('data-id');

$.ajax({
    url : 'edit.php',
    method : 'post',
    data : {
        pro_id : p_id,
    },

    success : function(data){
        console.log(data)
        let product = Json.parse(data);
        add_product_modal.modal('show');
        pid.val(product.pid)
        pname.val(product.pname)
        pdesc.val(product.pdesc)
        price.val(product.price)
        psku.val(product.psku)

       }
    })

})

//Delete product

$('.delete').on('click', function(e){
    e.preventDefault();
        let p_id = $(this).attr('data-id');

        $.ajax({
            url : 'delete.php',
            method : "post",
            data : {
                del_id : del_id
            },
            success : function(data){
                console.log(data)
                alert(data);
                window.location.href = 'addproduct.php';
            }

        })



})


})