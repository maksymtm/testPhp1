$(".addProduct").click(function() {
    let id = $(this).data('id');
    $.ajax(
        {
            url: "../actions/cart.php",
            type: "GET",
            data: {
                cart: "add",
                id: id
            },
            dataType: "json",
            success: function(response) {
                if (response.answer == "ok") {
                    document.getElementById("prodCounterLabel").innerHTML =
                    "Cart (" + response.cartProductsCount + ")";
                }
            },
            error: function() {
                alert("AJAX PROBLEM!");
            }
        }
    );
});