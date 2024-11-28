<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
    <!-- Cargando bootstrap.css descargado -->
    <link rel="stylesheet" href="../css/bootstrap.css">
    <style>
        .card-header-color-format{
            text-align: center; 
            background-color: #278b1d;
        }

        .card-body-style-questions{
            background-color: #cbc7c7; 
            color: black; 
            max-height: 300px; 
            min-height: 300px; 
            overflow-y: auto;
        }

        .card-body-information{
            background-color: #cbc7c7; 
            max-height: 1075px; 
            min-height: 1075px; 
            overflow-y: auto;
            font-family: Arial, Helvetica, sans-serif; 
            color: #666666; 
            font-size: 1.0rem;
        }

        .dimensiones-info{
            max-width: 20rem; 
            min-width: 20rem;
        }

        .col-form-label-format{
            color: #666666; 
            font-family: Arial, Helvetica, sans-serif; 
            font-size: 1.0rem;
        }

        .botton-format-submit{
            background-color: #278b1d; 
            color: white; 
            border: none; 
            padding: 10px 20px; 
            font-size: 16px;
        }

        .format-container-botton{
            display: flex; 
            justify-content: center; 
            align-items: center; 
            height: auto; 
            min-height: 100px;
        }

        .style-row{
            margin-left: 20px; 
            margin-top: 20px;
        }

        .card-max-width{
            max-width: 20rem;
        }

        .all-elements-color-background{
            background-color: #efe8e8;
        }

        .format-question{
            color: black; 
            max-height: 200px; 
            min-height: 200px; 
            overflow-y: auto;
        }
    </style>
</head>
<body>
    <!--Barra de navegacion -->
    <nav class="navbar navbar-expand-lg" style="background-color: #efe8e8; color: black;" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.html" style="color: black !important;">
                <img src="../../img/logo.png" alt="Logo" width="200" height="75" class="d-inline-block align-text-top">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarColor01">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="index.html" style="color: black !important; font-size: 1.5rem;">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="estadisticas.html" style="color: black !important; font-size: 1.5rem;">Estadísticas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="conocemas.html" style="color: black !important; font-size: 1.5rem;">Conoce más</a>
                    </li>
                </ul>
            </div>
        </div>
      </nav>

    <!--Contenido por pagina-->
    <form action="" method="post">
        <div class="row style-row">
            <!--Columna 1-->
            <div class="col-md-4">
                <!--Datos Generales-->
                <div class="card text-white mb-3 card-max-width">
                    <div class="card text-white bg-success mb-3 card-max-width">
                        <div class="card-header card-header-color-format">Datos Generales</div>
                        <div class="card-body card-body-style-questions">
                            <div class="form-check">
                                <!-- EDAD -->
                                <label class="col-form-label col-form-label-format" for="inputDefault">Edad</label>
                                <input type="number" name="edad" class="form-control col-form-label-format all-elements-color-background" placeholder="Edad" id="id-edad"
                                value = "<?= !empty($_POST['edad'])?$_POST['edad']:''?>" required>
                            </div>
                            <div class="form-check">
                                <!-- SEXO -->
                                <label class="col-form-label col-form-label-format" for="inputDefault">Sexo</label>
                                <select id="id-sexo" name="sexo" class="form-select col-form-label-format all-elements-color-background" require>
                                    <option value="">Selecciona una opción</option>
                                    <option value="hombre" <?= (isset($_POST['sexo']) && $_POST['sexo'] === 'hombre') ? 'selected' : '' ?>>Hombre</option>
                                    <option value="mujer" <?= (isset($_POST['sexo']) && $_POST['sexo'] === 'mujer') ? 'selected' : '' ?>>Mujer</option>
                                    <option value="otro" <?= (isset($_POST['sexo']) && $_POST['sexo'] === 'otro') ? 'selected' : '' ?>>Otro</option>
                                </select>
                            </div>
                            <div class="form-check">
                                <label class="col-form-label col-form-label-format" for="inputDefault">Ocupación</label>
                                <select id="ocupacion" class="form-select col-form-label-format all-elements-color-background">
                                    <option value="">Selecciona una opción</option>
                                    <option value="estudiante">Estudiante</option>
                                    <option value="ingeniero">Ingeniero</option>
                                    <option value="medico">Médico</option>
                                    <option value="abogado">Abogado</option>
                                    <option value="profesor">Profesor</option>
                                    <option value="enfermero">Enfermero</option>
                                    <option value="arquitecto">Arquitecto</option>
                                    <option value="diseñador">Diseñador</option>
                                    <option value="programador">Programador</option>
                                    <option value="artista">Artista</option>
                                    <option value="comerciante">Comerciante</option>
                                    <option value="chef">Chef</option>
                                    <option value="otros">Otro</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <!--Alimentación y Productos de Uso Diario-->
                <div class="card text-white mb-3 card-max-width">
                    <div class="card text-white bg-success mb-3 card-max-width">
                        <div class="card-header card-header-color-format">Alimentación y Productos de Uso Diario</div>
                        <div class="card-body card-body-style-questions">
                            <div class="form-check">
                                <label class="col-form-label col-form-label-format" for="productosFrescos">
                                    ¿Prefieres comprar productos frescos en mercados locales o en supermercados grandes?
                                </label>
                                <select id="productosFrescos" class="form-select col-form-label-format all-elements-color-background">
                                    <option value="">Selecciona una opción</option>
                                    <option value="Mercados locales">Mercados locales</option>
                                    <option value="Supermercados">Supermercados</option>
                                    <option value="Ambos">Ambos</option>
                                </select>
            
                                <label class="col-form-label col-form-label-format" for="restosComida">
                                    ¿Qué haces con los restos de comida?
                                </label>
                                <select id="restosComida" class="form-select col-form-label-format all-elements-color-background">
                                    <option value="">Selecciona una opción</option>
                                    <option value="Los tiro">Los tiro</option>
                                    <option value="Los composteo">Los composteo</option>
                                    <option value="Los reciclo">Los reciclo</option>
                                    <option value="Los aprovecho en nuevas recetas">Los aprovecho en nuevas recetas</option>
                                </select>

                                <fieldset>
                                    <br><legend class="col-form-label-format">
                                        ¿Compras productos orgánicos?
                                    </legend>
                                    <label for="3-si" class="col-form-label-format">
                                        <input type="radio" id="3-si" name="prodOrg" value="si" class="all-elements-color-background" required> Sí
                                    </label><br>
                                    <label for="3-Con frecuencia" class="col-form-label-format">
                                        <input type="radio" id="3-Con frecuencia" name="prodOrg" value="Con frecuencia" class="all-elements-color-background"> Con frecuencia
                                    </label><br>
                                    <label for="3-a-veces" class="col-form-label-format">
                                        <input type="radio" id="3-a-veces" name="prodOrg" value="a veces" class="all-elements-color-background"> A veces
                                    </label><br>
                                    <label for="3-no" class="col-form-label-format">
                                        <input type="radio" id="3-no" name="prodOrg" value="No" class="all-elements-color-background"> No
                                    </label><br>
                                </fieldset> 

                                <fieldset>
                                    <br><legend class="col-form-label-format">
                                        ¿Compras en empaques reutilizables o sin empaque?
                                    </legend>
                                    <label for="4-siempre" class="col-form-label-format">
                                        <input type="radio" id="4-siempre" name="empaquesReutilizables" value="siempre" class="all-elements-color-background" required> Siempre
                                    </label><br>
                                    <label for="4-a-veces" class="col-form-label-format">
                                        <input type="radio" id="4-a-veces" name="empaquesReutilizables" value="a veces" class="all-elements-color-background"> A veces
                                    </label><br>
                                    <label for="4-nunca" class="col-form-label-format">
                                        <input type="radio" id="4-nunca" name="empaquesReutilizables" value="Nunca" class="all-elements-color-background"> Nunca
                                    </label><br>
                                </fieldset> 
                            </div>
                        </div>
                    </div>
                </div>

                <!--Transporte y Energía-->
                <div class="card text-white mb-3 card-max-width">
                    <div class="card text-white bg-success mb-3 card-max-width">
                        <div class="card-header card-header-color-format">Transporte y Energía</div>
                        <div class="card-body card-body-style-questions">
                            <div class="form-check">
                                <label class="col-form-label col-form-label-format" for="restosComida">
                                    ¿Cómo sueles transportarte?
                                </label>
                                <select id="usoTransporte" class="form-select col-form-label-format all-elements-color-background">
                                    <option value="">Selecciona una opción</option>
                                    <option value="Auto propio">Auto propio</option>
                                    <option value="Transporte público">Transporte público</option>
                                    <option value="Bicicleta">Bicicleta</option>
                                    <option value="Caminando">Caminando</option>
                                    <option value="Otros">Otros</option>
                                </select>

                                <fieldset>
                                    <br><legend class="col-form-label-format">
                                        ¿Intentas reducir el consumo de energía en casa?
                                    </legend>
                                    <label for="7-si" class="col-form-label-format">
                                        <input type="radio" id="7-si" name="reducirEnergia" value="si" class="all-elements-color-background" required> Si
                                    </label><br>
                                    <label for="7-constantemente" class="col-form-label-format">
                                        <input type="radio" id="7-constantemente" name="reducirEnergia" value="Constantemente" class="all-elements-color-background"> Constantemente
                                    </label><br>
                                    <label for="7-A veces" class="col-form-label-format">
                                        <input type="radio" id="7-A veces" name="reducirEnergia" value="A veces" class="all-elements-color-background"> A veces
                                    </label><br>
                                    <label for="7-No lo habia pensado" class="col-form-label-format">
                                        <input type="radio" id="7-No lo habia pensado" name="reducirEnergia" value="No lo habia pensado" class="all-elements-color-background"> No lo habia pensado
                                    </label><br>
                                </fieldset> 

                                <label class="col-form-label col-form-label-format" for="dispositivosElectronicos">
                                    ¿Cuántos dispositivos electrónicos utilizas en casa?
                                </label>
                                <input type="number" id="dispositivosElectronicos" class="form-control col-form-label-format all-elements-color-background" min="0" step="1" placeholder="Ingrese un número">                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--Columna 2-->
            <div class="col-md-4">
                <!-- Hábitos de consumo -->
                <div class="card text-white mb-3 card-max-width" style="margin-left: 20px;">
                    <div class="card text-white bg-success mb-3 card-max-width">
                        <div class="card-header card-header-color-format">Hábitos de consumo</div>
                        <div class="card-body card-body-style-questions">
                            <div class="form-check">
                                <fieldset>
                                    <legend class="col-form-label-format">
                                        ¿Con qué frecuencia compras productos de marcas locales?
                                    </legend>
                                    <label for="1-siempre" class="col-form-label-format">
                                        <input type="radio" id="1-siempre" name="frecuencia_compras" value="siempre" class="all-elements-color-background" required> Siempre
                                    </label><br>
                                    <label for="1-a-veces" class="col-form-label-format">
                                        <input type="radio" id="1-a-veces" name="frecuencia_compras" value="a veces" class="all-elements-color-background"> A veces
                                    </label><br>
                                    <label for="1-raramente" class="col-form-label-format">
                                        <input type="radio" id="1-raramente" name="frecuencia_compras" value="raramente" class="all-elements-color-background"> Raramente
                                    </label><br>
                                    <label for="1-nunca" class="col-form-label-format">
                                        <input type="radio" id="1-nunca" name="frecuencia_compras" value="nunca" class="all-elements-color-background"> Nunca
                                    </label><br>
                                </fieldset>
                                <br>
                                <fieldset>
                                    <legend class="col-form-label-format">
                                        ¿Sueles leer las etiquetas para conocer el origen y los materiales de los productos?
                                    </legend>
                                    <label for="2-siempre" class="col-form-label-format">
                                        <input type="radio" id="2-siempre" name="lee_etiquetas" value="si" class="all-elements-color-background" required> Sí
                                    </label><br>
                                    <label for="2-no" class="col-form-label-format">
                                        <input type="radio" id="2-no" name="lee_etiquetas" value="no" class="all-elements-color-background"> No
                                    </label><br>
                                    <label for="2-a-veces" class="col-form-label-format">
                                        <input type="radio" id="2-a-veces" name="lee_etiquetas" value="a veces" class="all-elements-color-background"> A veces
                                    </label><br>
                                </fieldset>   
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Residuos y Reciclaje -->
                <div class="card text-white mb-3 card-max-width" style="margin-left: 20px;">
                    <div class="card text-white bg-success mb-3 card-max-width">
                        <div class="card-header card-header-color-format">Residuos y Reciclaje</div>
                        <div class="card-body card-body-style-questions">
                            <div class="form-check">
                                <fieldset>
                                    <legend class="col-form-label-format">
                                        ¿Separas la basura en orgánica e inorgánica en tu hogar?
                                    </legend>
                                    <label for="5-siempre" class="col-form-label-format">
                                        <input type="radio" id="5-siempre" name="separarOrganica" value="siempre" class="all-elements-color-background" required> Siempre
                                    </label><br>
                                    <label for="5-a-veces" class="col-form-label-format">
                                        <input type="radio" id="5-a-veces" name="separarOrganica" value="a veces" class="all-elements-color-background"> A veces
                                    </label><br>
                                    <label for="5-raramente" class="col-form-label-format">
                                        <input type="radio" id="5-raramente" name="separarOrganica" value="raramente" class="all-elements-color-background"> Raramente
                                    </label><br>
                                </fieldset>

                                <label class="col-form-label col-form-label-format" for="noUsados">
                                    ¿Qué haces con la ropa o artículos que ya no usas?
                                </label>
                                <select id="noUsados" class="form-select col-form-label-format all-elements-color-background">
                                    <option value="">Selecciona una opción</option>
                                    <option value="Los dono">Los dono</option>
                                    <option value="Los tiro">Los tiro</option>
                                    <option value="Los vendo">Los vendo</option>
                                    <option value="Los reciclo">Los reciclo</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Conocimiento sobre Consumo Responsable -->
                <div class="card text-white mb-3 card-max-width" style="margin-left: 20px;">
                    <div class="card text-white bg-success mb-3 card-max-width">
                        <div class="card-header card-header-color-format">Conocimiento sobre Consumo Responsable</div>
                        <div class="card-body card-body-style-questions">
                            <div class="form-check">
                                <fieldset>
                                    <legend class="col-form-label-format">
                                        ¿Sabes qué es el “consumo responsable”?
                                    </legend>
                                    <label for="8-si" class="col-form-label-format">
                                        <input type="radio" id="8-si" name="consumoResponsable" value="si" class="all-elements-color-background" required> Si
                                    </label><br>
                                    <label for="8-No" class="col-form-label-format">
                                        <input type="radio" id="8-No" name="consumoResponsable" value="No" class="all-elements-color-background"> No
                                    </label><br>
                                    <label for="8-Algo" class="col-form-label-format">
                                        <input type="radio" id="8-Algo" name="consumoResponsable" value="Algo" class="all-elements-color-background"> Algo
                                    </label><br>
                                </fieldset> 

                                <label class="col-form-label col-form-label-format" for="noUsados">
                                    ¿Qué tan importante es para ti el impacto ambiental al comprar?
                                </label>
                                <select id="imporImpactoAmb" class="form-select col-form-label-format all-elements-color-background">
                                    <option value="">Selecciona una opción</option>
                                    <option value="Muy importante">Muy importante</option>
                                    <option value="Algo importante">Algo importante</option>
                                    <option value="Poco importante">Poco importante</option>
                                    <option value="No es importante">No es importante</option>
                                </select><br>

                                <fieldset>
                                    <legend class="col-form-label-format">
                                        ¿Estarías dispuesto a pagar más por productos sostenibles?
                                    </legend>
                                    <label for="9-si" class="col-form-label-format">
                                        <input type="radio" id="9-si" name="dispuestoPagar" value="si" class="all-elements-color-background" required> Sí
                                    </label><br>
                                    <label for="9-no" class="col-form-label-format">
                                        <input type="radio" id="9-no" name="dispuestoPagar" value="no" class="all-elements-color-background"> No
                                    </label><br>
                                    <label for="9-depende" class="col-form-label-format">
                                        <input type="radio" id="9-depende" name="dispuestoPagar" value="depende" class="all-elements-color-background"> Depende del producto
                                    </label><br>
                                </fieldset>                                
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
            
            <!--Columna 3-->
            <div class="col-md-4">
                <!--Informacion-->
                <div class="card text-white mb-3 dimensiones-info">
                    <div class="card text-white bg-success mb-3 dimensiones-info">
                        <div class="card-header card-header-color-format">Información</div>
                        <div id="info-card-body" class="card-body card-body-information">
                            <!-- contenedor para mostrar la informacion con ajax -->
                        </div>
                    </div>
                </div>                               
            </div>

            <!-- Reflexion final -->
            <div class="card text-white mb-3" style="max-width: 75rem; margin-left: 20px;">
                <div class="card text-white bg-success mb-3" style="max-width: 75rem;">
                    <div class="card-header card-header-color-format">
                        Reflexión Personal y Compromiso
                    </div>
                    <div class="card-body all-elements-color-background format-question">
                        <div class="form-check">
                            <label class="col-form-label col-form-label-format" for="9-habitoMejorar">
                                ¿Qué hábito crees que podrías mejorar para ser un consumidor más responsable?
                            </label>
                            <input type="text" id="habitoMejorar" name="habitoMejorar" class="form-control col-form-label-format all-elements-color-background" style="width: 1100px; height: 110px;" placeholder="Escribe tu respuesta aquí">
                        </div>
                    </div>
                </div>
            </div>            
        </div>

        <!-- boton de envio -->
        <div class="format-container-botton">
            <button type="submit" class="btn btn-success botton-format-submit">Enviar</button>
        </div>                
    </form>
</body>
</html>
