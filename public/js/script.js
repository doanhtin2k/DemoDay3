$(document).ready(function(){

    $(".add-to-cart").click(function(){
        console.log(location.origin);

         var book_id = $(this).attr("data-id");
        console.log(book_id);
        var obj_ajax = {
            url: location.origin+'/add-to-cart',
            method: 'GET',
            data: {
                book_id:book_id
            },
            success: function(data){
                //console.log(data);
                $('.alert-add-to-cart').html('Thêm sản phẩm vào giỏ hàng thành công');
                setTimeout(function(){
                    $('.alert-add-to-cart').html('');
                },1000);
            }
        };

        $.ajax(obj_ajax);
    });
});
