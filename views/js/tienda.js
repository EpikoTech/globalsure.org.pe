$(document).ready(function() {
    // Agregar un producto al carrito
    $('.add-to-cart').click(function() {
        var productId = $(this).data('product-id');
        var productName = $(this).data('product-name');
        var productPrice = $(this).data('product-price');
        
        // Guardar en el carrito (en sesión o cookies)
        addToCart(productId, productName, productPrice);
    });

    function addToCart(id, name, price) {
        // Aquí se puede agregar la lógica para guardar el producto en el carrito
        // Usando la sesión o cookies para almacenar los productos agregados
        // Por ejemplo:
        var cart = JSON.parse(localStorage.getItem('cart')) || [];
        cart.push({ id: id, name: name, price: price });
        localStorage.setItem('cart', JSON.stringify(cart));

        alert('Producto agregado al carrito');
    }

    // Mostrar carrito al hacer clic en el icono
    $('#cartIcon').click(function() {
        showCart();
    });

    function showCart() {
        var cart = JSON.parse(localStorage.getItem('cart')) || [];
        var cartHtml = "<h5>Tu Carrito</h5>";
        cart.forEach(function(item) {
            cartHtml += "<p>" + item.name + " - " + item.price + "</p>";
        });
        cartHtml += "<button>Finalizar compra</button>";

        $('#cartContainer').html(cartHtml);
    }
});
