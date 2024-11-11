$(document).ready(function() {

    // Cargar productos por categoría cuando se haga clic en una categoría
    $('.category-link').on('click', function(e) {
        e.preventDefault(); // Evita el comportamiento por defecto del enlace

        var categoryId = $(this).data('id'); // Obtener el ID de la categoría

        // Realizar la solicitud AJAX para obtener los productos de esta categoría
        $.ajax({
            url: '/globalsure.org.pe/controllers/getUserProducts.php',  // URL del controlador
            method: 'GET',
            data: { categoria_id: categoryId },
            success: function(response) {
                if (response.success) {
                    // Si la solicitud es exitosa, mostramos los productos
                    var products = response.products;
                    var productHtml = '';
                    
                    products.forEach(function(product) {
                        productHtml += '<div class="col-md-4 mb-4">';
                        productHtml += '<div class="card">';
                        productHtml += '<img src="' + product.imagen + '" class="card-img-top" alt="' + product.nombre + '">';
                        productHtml += '<div class="card-body">';
                        productHtml += '<h5 class="card-title">' + product.nombre + '</h5>';
                        productHtml += '<p class="card-text">S/ ' + product.precio + '</p>';
                        productHtml += '<a href="#" class="btn btn-primary">Ver producto</a>';
                        productHtml += '</div>';
                        productHtml += '</div>';
                        productHtml += '</div>';
                    });

                    $('#product-container').html(productHtml); // Insertar productos en el contenedor
                } else {
                    // Si hubo un error
                    alert('Error al cargar los productos.');
                }
            },
            error: function() {
                alert('Hubo un problema al obtener los productos.');
            }
        });
    });
});
