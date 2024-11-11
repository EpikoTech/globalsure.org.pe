CREATE TABLE usuarios (
    id INT(11) AUTO_INCREMENT PRIMARY KEY, 
    username VARCHAR(50) NOT NULL UNIQUE, 
    password VARCHAR(200) NOT NULL, 
    nombres VARCHAR(100) NOT NULL, 
    apellidos VARCHAR(100) NOT NULL, 
    dni VARCHAR(8) NOT NULL, 
    email VARCHAR(100) NOT NULL, 
    celular VARCHAR(9) DEFAULT NULL, 
    fecha_nacimiento DATE DEFAULT NULL, 
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, 
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP, 
    activo TINYINT(1) NOT NULL DEFAULT 0, 
    token VARCHAR(32) DEFAULT NULL
);


CREATE TABLE productos (
    id INT AUTO_INCREMENT PRIMARY KEY,           -- ID del producto, clave primaria
    nombre VARCHAR(255) NOT NULL,                -- Nombre del producto
    descripcion TEXT,                            -- Descripción del producto
    precio DECIMAL(10, 2) NOT NULL,              -- Precio del producto (por ejemplo: 999.99)
    imagen VARCHAR(255),                         -- URL de la imagen del producto
    stock INT DEFAULT 0,                         -- Cantidad disponible en stock
    fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP, -- Fecha de creación del producto
    activo BOOLEAN DEFAULT 1                     -- Estado del producto (1 = activo, 0 = inactivo)
);

CREATE TABLE `categorias` (
    `id` INT(11) AUTO_INCREMENT PRIMARY KEY,
    `nombre` VARCHAR(255) NOT NULL,
    `descripcion` TEXT,
    `activo` TINYINT(1) DEFAULT 1,  -- Para marcar si la categoría está activa o no
    `fecha_creacion` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


/globalsure.org.pe
    /controllers
        activate.php               # Controlador para activar el usuario (gestiona el flujo de activación)
        login.php                  # Controlador para manejar el login del usuario
        logout.php                 # Controlador para el logout del usuario
        register.php               # Controlador para manejar el registro de nuevos usuarios
        productController.php      # Controlador para manejar productos (consulta por categorías)
    /models
        User.php                   # Modelo para el manejo de usuarios (registro, login, activación)
        Product.php                # Modelo para el manejo de productos (consultas de productos)
    /PHPMailer
        (archivos de la librería PHPMailer, como ya los tienes)
    /utils
        Database.php               # Archivo que gestiona la conexión a la base de datos
    /views
        /css                       # Carpeta con los archivos CSS
        /js                        # Carpeta con los archivos JS
        /images                    # Carpeta con imágenes de los productos
        login.php                  # Vista para el login
        register.php               # Vista para el registro de nuevos usuarios
        sureglobal.php             # Vista principal de la tienda, donde se muestran los productos
    /routes
        web.php                    # Archivo de rutas que direcciona las peticiones a los controladores adecuados
    /index.php                    # Punto de entrada principal
