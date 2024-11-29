<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <style>
        .card-container {
            display: flex;
            justify-content: center; /* Centrado horizontal */
            align-items: flex-start; /* Alineación superior */
            padding: 60px 20px;      /* Espaciado superior e inferior, menos espacio lateral */
            background-color: #f8f9fa; /* Color de fondo opcional */
            min-height: 100vh;       /* Mantén la altura para centrar */
            max-width: 800px;        /* Ancho máximo para el contenedor */
            margin: 0 auto;          /* Centra el contenedor */
        }

        .card {
            background-color: #278b1d;
            max-width: 500px;      /* Reduce el tamaño máximo */
            width: 80%;            /* Ancho relativo para pantallas pequeñas */
            font-size: 1.2rem;     /* Texto ligeramente más pequeño */
            border-radius: 10px;   /* Bordes redondeados */
            box-shadow: 2px 4px 5px rgba(0, 0, 0, 0.1); /* Sombra más suave */
            position: relative;    /* Habilita el desplazamiento relativo */
            left: -5px;            /* Desfase leve hacia la izquierda */
            top: 5px;              /* Desfase leve hacia abajo */
            height: 1000px; /* Altura fija opcional, ajusta según sea necesario */
            max-height: 400px; /* Asegura que no crezca más allá de este tamaño */
        }

        .card-header {
            text-align: center;    /* Centra el texto del encabezado */
            font-weight: bold;     /* Negrita para el encabezado */
            font-size: 1.5rem;     /* Tamaño del texto del encabezado */
            background-color: #278b1d; /* Color de fondo del encabezado */
        }

        .custom-body {
            color: #666666;
            padding: 10px; /* Reducido para menos espacio interno */
            font-size: 0.9rem; /* Tamaño de fuente más pequeño */
            border-bottom-left-radius: 10px;
            border-bottom-right-radius: 10px;
            height: 1100px; /* Altura fija opcional, ajusta según sea necesario */
            max-height: 160px; /* Asegura que no crezca más allá de este tamaño */
            overflow-y: auto; /* Habilita el scroll si hay contenido desbordado */
        }

        .card-body-style-questions {
            background-color: #cbc7c7; 
            color: black; 
            max-height: 300px; 
            min-height: 300px; 
            overflow-y: auto;
        }
        .card.bg-success {
            background-color: #278b1d !important; /* Cambia a un verde más oscuro */
            color: white; /* Asegura que el texto sea visible */
        }

        .body {
            background-color: #f8f9fa; /* Fondo claro para el resto de la página */
            margin: 0;
            padding: 0;
            font-family: Arial, Helvetica, sans-serif;
        }

        .all-elements-color-background{
            background-color: #efe8e8;
        }

        .error-border {
            border: 2px solid #d5303e;
        }

        .error_message{
            color: #d5303e; 
            font-family: Arial, Helvetica, sans-serif; 
            font-size: 0.8rem;
        }

        .col-form-label-format{
            color: #666666; 
            font-family: Arial, Helvetica, sans-serif; 
            font-size: 1.0rem;
        }

        .format-container-botton{
            display: flex; 
            justify-content: center; 
            align-items: center; 
            height: auto; 
            min-height: 100px;
        }
        /* Barra de navegación */
        .nav {
            display: flex;
            justify-content: space-between; /* Asegura que los elementos se distribuyan */
            list-style: none;
            padding: 0;
        }

        .nav-item {
            padding: 20px;
        }

        /* Alineación de los elementos especiales (Inicia sesión y Regístrate) a la derecha */
        .special-nav-item {
            margin-left: auto;  /* Empuja estos elementos hacia la derecha */
        }

        .special-nav-item .nav-link {
            text-decoration: underline; /* Subrayado */
            font-size: 0.9em;           /* Tamaño más pequeño */
            text-align: right;          /* Alinea el texto dentro del enlace a la derecha */
        }
    </style>
</head>
<body>
    <!--Barra de navegacion -->
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #efe8e8;">
        <div class="container-fluid">
            <a class="navbar-brand" href="..\..\index.html">
                <img src="..\..\img\logo.png" alt="Logo" width="200" height="75">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarColor01">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="..\..\index.html">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="estadisticas.html">Estadísticas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="conocemas.html">Conoce más</a>
                    </li>               
                </ul>
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item special-nav-item">
                        <a class="nav-link" href="login.php">Inicia sesión</a>
                    </li>
                    <li class="nav-item special-nav-item">
                        <a class="nav-link" href="singup.php">Regístrate</a>
                    </li>                 
                </ul>
            </div>
        </div>
    </nav>

    <form action="" method="post" id="login">
        <!-- iniciar sesion -->
        <div class="card-container">
            <div class="card text-white mb-3">
                <div class="text-white bg-success mb-3">
                    <div class="card-header">Registrate</div>
                    <div class="card-body card-body-style-questions">
                        <!-- Correo electronico -->
                        <label class="col-form-label col-form-label-format">
                            Correo Electronico
                        </label>
                        <input type="email" id="id-correo" name="correo" class="form-control col-form-label-format all-elements-color-background" 
                            value = "<?= !empty($_POST['correo'])?$_POST['correo']:''?>" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$"
                            placeholder="Correo Electronico" onfocus="eliminarBordeCorreo()" onblur="validacionCorreo()" required>
                        <div id="error_mesagge_correo">
                            <div id="container_correo" class="error_message"></div>
                        </div><br>
                        <!-- Contraseña -->
                        <label class="col-form-label col-form-label-format">
                            Contraseña
                        </label>
                        <input type="password" id="id-password" name="password" class="form-control col-form-label-format all-elements-color-background" 
                            placeholder="Contraseña" minlength="8" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*]).{8,}" 
                            title="Debe contener al menos 8 caracteres, incluyendo una letra mayúscula, una minúscula, un número y un carácter especial." 
                            value = "<?= !empty($_POST['password'])?$_POST['password']:''?>" 
                            onfocus="eliminarBordeContrasena()" onblur="validacionContrasena()" onchange="validacionContrasena()" required>
                        <div id="error_mesagge_password">
                            <div id="container_password" class="error_message"></div>
                        </div>

                        <!-- Boton de envio -->
                        <div class="format-container-botton">
                            <button type="submit" class="btn btn-success botton-format-submit" style="background-color: #278b1d !important;"
                            onclick = "submitLogin()" >Enviar</button>
                        </div>    
                    </div>
                </div>
            </div>
        </div>
    </form>  
    
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
      integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
      crossorigin="anonymous"></script>
    <script src="../../js/validaciones.js"></script>
</body>
</html>