$(document).ready(function(){
    $(".purchase").click(function(){
        var id = $(this).attr('id');
        var quantity = $('#quantity_'+id).val(); 
        $.post("cart.php?action=add",
        {
            itemid: id,
            quantity: quantity
        },
        function(data, status){
            alert("Id: " + id + "\nQuantity: " +  quantity + "\nStatus: " + status); 
        }); 
    });
});