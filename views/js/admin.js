$(document).ready(function () {
    // Cargar productos al cargar la página
    loadProducts();

    // Función para cargar los productos
    function loadProducts() {
        $.ajax({
            url: '/globalsure.org.pe/controllers/getProducts.php', // Controlador que obtiene los productos
            method: 'GET',
            success: function(response) {
                const result = JSON.parse(response);
                if (result.success) {
                    let productList = '';
                    result.products.forEach(function (product) {
                        productList += `
                            <tr id="product-${product.id}">
                                <td>${product.id}</td>
                                <td>${product.nombre}</td>
                                <td>${product.descripcion}</td>
                                <td>${product.precio}</td>
                                <td>${product.stock}</td>
                                <td>
                                    <button class="edit-btn" data-id="${product.id}">Editar</button>
                                    <button class="delete-btn" data-id="${product.id}">Eliminar</button>
                                </td>
                            </tr>
                        `;
                    });
                    $('#productList tbody').html(productList);
                } else {
                    alert("Hubo un error al obtener la lista de productos.");
                }
            },
            error: function() {
                alert("Ocurrió un error al cargar los productos.");
            }
        });
    }

    // Manejar el submit del formulario para agregar o editar productos
    $('#productForm').on('submit', function (event) {
        event.preventDefault(); // Evitar el comportamiento por defecto del formulario

        let formData = $(this).serialize(); // Serializar los datos del formulario

        // Comprobar si el formulario está en modo "Agregar" o "Editar"
        let productId = $('#productId').val();
        let action = productId ? 'updateProduct.php' : 'addProduct.php'; // Dependiendo de si el ID está vacío

        $.ajax({
            url: `/globalsure.org.pe/controllers/${action}`, // Acción a tomar: agregar o editar producto
            method: 'POST',
            data: formData,
            success: function(response) {
                const result = JSON.parse(response);
                if (result.success) {
                    alert('Producto guardado correctamente');
                    $('#productForm')[0].reset(); // Limpiar el formulario
                    loadProducts(); // Recargar la lista de productos
                } else {
                    alert('Hubo un error al guardar el producto.');
                }
            },
            error: function() {
                alert('Ocurrió un error al procesar la solicitud.');
            }
        });
    });

    // Editar producto
    $(document).on('click', '.edit-btn', function () {
        const productId = $(this).data('id');
        
        // Obtener los detalles del producto
        $.ajax({
            url: `/globalsure.org.pe/controllers/getProductById.php`, // Controlador para obtener un producto por ID
            method: 'GET',
            data: { id: productId },
            success: function(response) {
                const result = JSON.parse(response);
                if (result.success) {
                    const product = result.product;
                    $('#productId').val(product.id); // Rellenar el ID
                    $('#productName').val(product.nombre);
                    $('#productDescription').val(product.descripcion);
                    $('#productPrice').val(product.precio);
                    $('#productStock').val(product.stock);
                    $('#productImage').val(product.imagen);
                } else {
                    alert('Hubo un error al cargar los detalles del producto.');
                }
            },
            error: function() {
                alert('Ocurrió un error al obtener los detalles del producto.');
            }
        });
    });

    // Eliminar producto
    $(document).on('click', '.delete-btn', function () {
        const productId = $(this).data('id');
        
        if (confirm('¿Estás seguro de que quieres eliminar este producto?')) {
            $.ajax({
                url: `/globalsure.org.pe/controllers/deleteProduct.php`, // Controlador para eliminar producto
                method: 'POST',
                data: { id: productId },
                success: function(response) {
                    const result = JSON.parse(response);
                    if (result.success) {
                        alert('Producto eliminado correctamente');
                        loadProducts(); // Recargar lista de productos
                    } else {
                        alert('Hubo un error al eliminar el producto.');
                    }
                },
                error: function() {
                    alert('Ocurrió un error al eliminar el producto.');
                }
            });
        }
    });
});
