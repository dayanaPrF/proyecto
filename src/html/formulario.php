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
                                <select id="id-sexo" name="sexo" class="form-select col-form-label-format all-elements-color-background" required>
                                    <option value="">Selecciona una opción</option>
                                    <option value="hombre" <?= (isset($_POST['sexo']) && $_POST['sexo'] === 'hombre') ? 'selected' : '' ?>>Hombre</option>
                                    <option value="mujer" <?= (isset($_POST['sexo']) && $_POST['sexo'] === 'mujer') ? 'selected' : '' ?>>Mujer</option>
                                    <option value="otro" <?= (isset($_POST['sexo']) && $_POST['sexo'] === 'otro') ? 'selected' : '' ?>>Otro</option>
                                </select>
                            </div>
                            <div class="form-check">
                                <!-- OCUPACION -->
                                <label class="col-form-label col-form-label-format" for="inputDefault">Ocupación</label>
                                <select id="id-ocupacion" name="ocupacion" class="form-select col-form-label-format all-elements-color-background" required>
                                    <option value="">Selecciona una opción</option>
                                    <option value="Estudiante" <?= (isset($_POST['ocupacion']) && $_POST['ocupacion'] === 'Estudiante') ? 'selected' : '' ?>>Estudiante</option>
                                    <option value="Ingeniero" <?= (isset($_POST['ocupacion']) && $_POST['ocupacion'] === 'Ingeniero') ? 'selected' : '' ?>>Ingeniero</option>
                                    <option value="Medico" <?= (isset($_POST['ocupacion']) && $_POST['ocupacion'] === 'Medico') ? 'selected' : '' ?>>Médico</option>
                                    <option value="Abogado" <?= (isset($_POST['ocupacion']) && $_POST['ocupacion'] === 'Abogado') ? 'selected' : '' ?>>Abogado</option>
                                    <option value="Profesor" <?= (isset($_POST['ocupacion']) && $_POST['ocupacion'] === 'Profesor') ? 'selected' : '' ?>>Profesor</option>
                                    <option value="Enfermero" <?= (isset($_POST['ocupacion']) && $_POST['ocupacion'] === 'Enfermero') ? 'selected' : '' ?>>Enfermero</option>
                                    <option value="Arquitecto" <?= (isset($_POST['ocupacion']) && $_POST['ocupacion'] === 'Arquitecto') ? 'selected' : '' ?>>Arquitecto</option>
                                    <option value="Diseñador" <?= (isset($_POST['ocupacion']) && $_POST['ocupacion'] === 'Diseñador') ? 'selected' : '' ?>>Diseñador</option>
                                    <option value="Programador" <?= (isset($_POST['ocupacion']) && $_POST['ocupacion'] === 'Programador') ? 'selected' : '' ?>>Programador</option>
                                    <option value="Artista" <?= (isset($_POST['ocupacion']) && $_POST['ocupacion'] === 'Artista') ? 'selected' : '' ?>>Artista</option>
                                    <option value="Comerciante" <?= (isset($_POST['ocupacion']) && $_POST['ocupacion'] === 'Comerciante') ? 'selected' : '' ?>>Comerciante</option>
                                    <option value="Chef" <?= (isset($_POST['ocupacion']) && $_POST['ocupacion'] === 'Chef') ? 'selected' : '' ?>>Chef</option>
                                    <option value="Otros" <?= (isset($_POST['ocupacion']) && $_POST['ocupacion'] === 'Otros') ? 'selected' : '' ?>>Otro</option>
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
                                <!-- apud_1 -->
                                <label class="col-form-label col-form-label-format" for="productosFrescos">
                                    ¿Prefieres comprar productos frescos en mercados locales o en supermercados grandes?
                                </label>
                                <select id="productosFrescos" name="apud_1" class="form-select col-form-label-format all-elements-color-background" required>
                                    <option value="">Selecciona una opción</option>
                                    <option value="Mercados locales"<?= (isset($_POST['apud_1']) && $_POST['apud_1'] === 'Mercados locales') ? 'selected' : '' ?>>Mercados locales</option>
                                    <option value="Supermercados"<?= (isset($_POST['apud_1']) && $_POST['apud_1'] === 'Supermercados') ? 'selected' : '' ?>>Supermercados</option>
                                    <option value="Ambos" <?= (isset($_POST['apud_1']) && $_POST['apud_1'] === 'Ambos') ? 'selected' : '' ?>>Ambos</option>
                                </select>
                                <!-- apud_2 -->
                                <label class="col-form-label col-form-label-format" for="restosComida">
                                    ¿Qué haces con los restos de comida?
                                </label>
                                <select id="restosComida" name="apud_2" class="form-select col-form-label-format all-elements-color-background" required>
                                    <option value="">Selecciona una opción</option>
                                    <option value="Los tiro"<?= (isset($_POST['apud_2']) && $_POST['apud_2'] === 'Los tiro') ? 'selected' : '' ?>>Los tiro</option>
                                    <option value="Los composteo"<?= (isset($_POST['apud_2']) && $_POST['apud_2'] === 'Los composteo') ? 'selected' : '' ?>>Los composteo</option>
                                    <option value="Los reciclo"<?= (isset($_POST['apud_2']) && $_POST['apud_2'] === 'Los reciclo') ? 'selected' : '' ?>>Los reciclo</option>
                                    <option value="Los aprovecho en nuevas recetas"<?= (isset($_POST['apud_2']) && $_POST['apud_2'] === 'Los aprovecho en nuevas recetas') ? 'selected' : '' ?>>Los aprovecho en nuevas recetas</option>
                                </select>
                                <!-- apud_3 -->
                                <fieldset>
                                    <br><legend class="col-form-label-format">
                                        ¿Compras productos orgánicos?
                                    </legend>
                                    <label for="3-si" class="col-form-label-format">
                                        <input type="radio" id="3-si" name="apud_3" class="all-elements-color-background" value="Si" 
                                        <?= (isset($_POST['apud_3']) && $_POST['apud_3'] === 'Si') ? 'checked' : '' ?> required> Si
                                    </label><br>
                                    <label for="3-Con frecuencia" class="col-form-label-format">
                                        <input type="radio" id="3-Con frecuencia" name="apud_3" class="all-elements-color-background" value="Con frecuencia"
                                        <?= (isset($_POST['apud_3']) && $_POST['apud_3'] === 'Con frecuencia') ? 'checked' : '' ?>> Con frecuencia
                                    </label><br>
                                    <label for="3-a-veces" class="col-form-label-format">
                                        <input type="radio" id="3-a-veces" name="apud_3" class="all-elements-color-background" value="A veces"
                                        <?= (isset($_POST['apud_3']) && $_POST['apud_3'] === 'A veces') ? 'checked' : '' ?>> A veces
                                    </label><br>
                                    <label for="3-no" class="col-form-label-format">
                                        <input type="radio" id="3-no" name="apud_3" class="all-elements-color-background" value="No"
                                        <?= (isset($_POST['apud_3']) && $_POST['apud_3'] === 'No') ? 'checked' : '' ?>> No
                                    </label><br>
                                </fieldset> 
                                <!-- apud_4 -->
                                <fieldset>
                                    <br><legend class="col-form-label-format">
                                        ¿Compras en empaques reutilizables o sin empaque?
                                    </legend>
                                    <label for="4-siempre" class="col-form-label-format">
                                        <input type="radio" id="4-siempre" name="apud_4" class="all-elements-color-background" value="Siempre"
                                        <?= (isset($_POST['apud_4']) && $_POST['apud_4'] === 'Siempre') ? 'checked' : '' ?> required> Siempre
                                    </label><br>
                                    <label for="4-a-veces" class="col-form-label-format">
                                        <input type="radio" id="4-a-veces" name="apud_4" class="all-elements-color-background" value="A veces"
                                        <?= (isset($_POST['apud_4']) && $_POST['apud_4'] === 'A veces') ? 'checked' : '' ?>> A veces
                                    </label><br>
                                    <label for="4-nunca" class="col-form-label-format">
                                        <input type="radio" id="4-nunca" name="apud_4" class="all-elements-color-background" value="Nunca"
                                        <?= (isset($_POST['apud_4']) && $_POST['apud_4'] === 'Nunca') ? 'checked' : '' ?>> Nunca
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
                                <!-- te_1 -->
                                <label class="col-form-label col-form-label-format" for="restosComida">
                                    ¿Cómo sueles transportarte?
                                </label>
                                <select id="usoTransporte" name="te_1" class="form-select col-form-label-format all-elements-color-background" required>
                                    <option value="">Selecciona una opción</option>
                                    <option value="Auto propio"<?= (isset($_POST['te_1']) && $_POST['te_1'] === 'Auto propio') ? 'selected' : '' ?>>Auto propio</option>
                                    <option value="Transporte publico"<?= (isset($_POST['te_1']) && $_POST['te_1'] === 'Transporte publico') ? 'selected' : '' ?>>Transporte público</option>
                                    <option value="Bicicleta"<?= (isset($_POST['te_1']) && $_POST['te_1'] === 'Bicicleta') ? 'selected' : '' ?>>Bicicleta</option>
                                    <option value="Caminando"<?= (isset($_POST['te_1']) && $_POST['te_1'] === 'Caminando') ? 'selected' : '' ?>>Caminando</option>
                                    <option value="Otros"<?= (isset($_POST['te_1']) && $_POST['te_1'] === 'Otros') ? 'selected' : '' ?>>Otros</option>
                                </select>
                                <!-- te_2 -->
                                <fieldset>
                                    <br><legend class="col-form-label-format">
                                        ¿Intentas reducir el consumo de energía en casa?
                                    </legend>
                                    <label for="7-si" class="col-form-label-format">
                                        <input type="radio" id="7-si" name="te_2" class="all-elements-color-background" value="Si"
                                        <?= (isset($_POST['te_2']) && $_POST['te_2'] === 'Si') ? 'checked' : '' ?> required> Si
                                    </label><br>
                                    <label for="7-constantemente" class="col-form-label-format">
                                        <input type="radio" id="7-constantemente" name="te_2" class="all-elements-color-background" value="Constantemente"
                                        <?= (isset($_POST['te_2']) && $_POST['te_2'] === 'Constantemente') ? 'checked' : '' ?>> Constantemente
                                    </label><br>
                                    <label for="7-A veces" class="col-form-label-format">
                                        <input type="radio" id="7-A veces" name="te_2" class="all-elements-color-background" value="A veces"
                                        <?= (isset($_POST['te_2']) && $_POST['te_2'] === 'A veces') ? 'checked' : '' ?>> A veces
                                    </label><br>
                                    <label for="7-No lo habia pensado" class="col-form-label-format">
                                        <input type="radio" id="7-No lo habia pensado" name="te_2" class="all-elements-color-background" value="No lo habia pensado"
                                        <?= (isset($_POST['te_2']) && $_POST['te_2'] === 'No lo habia pensado') ? 'checked' : '' ?>> No lo habia pensado
                                    </label><br>
                                </fieldset> 
                                <!-- te_3 -->
                                <label class="col-form-label col-form-label-format" for="dispositivosElectronicos">
                                    ¿Cuántos dispositivos electrónicos utilizas en casa?
                                </label>
                                <input type="number" name="te_3" id="dispositivosElectronicos" class="form-control col-form-label-format all-elements-color-background" 
                                value = "<?= !empty($_POST['te_3'])?$_POST['te_3']:''?>" min="0" step="1" placeholder="Ingrese un numero" require>                                
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
                                    <!-- hc_1 -->
                                    <legend class="col-form-label-format">
                                        ¿Con qué frecuencia compras productos de marcas locales?
                                    </legend>
                                    <label for="1-siempre" class="col-form-label-format">
                                        <input type="radio" id="1-siempre" name="hc_1" class="all-elements-color-background" value="Siempre" 
                                        <?= (isset($_POST['hc_1']) && $_POST['hc_1'] === 'Siempre') ? 'checked' : '' ?>required> Siempre
                                    </label><br>
                                    <label for="1-a-veces" class="col-form-label-format">
                                        <input type="radio" id="1-a-veces" name="hc_1" class="all-elements-color-background" value="A veces"
                                        <?= (isset($_POST['hc_1']) && $_POST['hc_1'] === 'A veces') ? 'checked' : '' ?>> A veces
                                    </label><br>
                                    <label for="1-raramente" class="col-form-label-format">
                                        <input type="radio" id="1-raramente" name="hc_1" class="all-elements-color-background" value="Raramente"
                                        <?= (isset($_POST['hc_1']) && $_POST['hc_1'] === 'Raramente') ? 'checked' : '' ?>> Raramente
                                    </label><br>
                                    <label for="1-nunca" class="col-form-label-format">
                                        <input type="radio" id="1-nunca" name="hc_1" class="all-elements-color-background" value="Nunca"
                                        <?= (isset($_POST['hc_1']) && $_POST['hc_1'] === 'Nunca') ? 'checked' : '' ?>> Nunca
                                    </label><br>
                                </fieldset>
                                <br>
                                <!-- hc_2 -->
                                <fieldset>
                                    <legend class="col-form-label-format">
                                        ¿Sueles leer las etiquetas para conocer el origen y los materiales de los productos?
                                    </legend>
                                    <label for="2-siempre" class="col-form-label-format">
                                        <input type="radio" id="2-siempre" name="hc_2" class="all-elements-color-background" value="Si" 
                                        <?= (isset($_POST['hc_2']) && $_POST['hc_2'] === 'Si') ? 'checked' : '' ?>required> Si
                                    </label><br>
                                    <label for="2-no" class="col-form-label-format">
                                        <input type="radio" id="2-no" name="hc_2" class="all-elements-color-background" value="No"
                                        <?= (isset($_POST['hc_2']) && $_POST['hc_2'] === 'No') ? 'checked' : '' ?>> No
                                    </label><br>
                                    <label for="2-a-veces" class="col-form-label-format">
                                        <input type="radio" id="2-a-veces" name="hc_2" class="all-elements-color-background" value="A veces"
                                        <?= (isset($_POST['hc_2']) && $_POST['hc_2'] === 'A veces') ? 'checked' : '' ?>> A veces
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
                                <!-- rr_1 -->
                                <fieldset>
                                    <legend class="col-form-label-format">
                                        ¿Separas la basura en orgánica e inorgánica en tu hogar?
                                    </legend>
                                    <label for="5-siempre" class="col-form-label-format">
                                        <input type="radio" id="5-siempre" name="rr_1" class="all-elements-color-background" value="Siempre" 
                                        <?= (isset($_POST['rr_1']) && $_POST['rr_1'] === 'Siempre') ? 'checked' : '' ?>required> Siempre
                                    </label><br>
                                    <label for="5-a-veces" class="col-form-label-format">
                                        <input type="radio" id="5-a-veces" name="rr_1" class="all-elements-color-background" value="A veces"
                                        <?= (isset($_POST['rr_1']) && $_POST['rr_1'] === 'A veces') ? 'checked' : '' ?>> A veces
                                    </label><br>
                                    <label for="5-raramente" class="col-form-label-format">
                                        <input type="radio" id="5-raramente" name="rr_1" class="all-elements-color-background" value="Raramente"
                                        <?= (isset($_POST['rr_1']) && $_POST['rr_1'] === 'Raramente') ? 'checked' : '' ?>> Raramente
                                    </label><br>
                                </fieldset>
                                <!-- rr_2 -->
                                <label class="col-form-label col-form-label-format" for="noUsados">
                                    ¿Qué haces con la ropa o artículos que ya no usas?
                                </label>
                                <select id="noUsados" name="rr_2" class="form-select col-form-label-format all-elements-color-background" required>
                                    <option value="">Selecciona una opción</option>
                                    <option value="Los dono"<?= (isset($_POST['rr_2']) && $_POST['rr_2'] === 'Los dono') ? 'selected' : '' ?>>Los dono</option>
                                    <option value="Los tiro"<?= (isset($_POST['rr_2']) && $_POST['rr_2'] === 'Los tiro') ? 'selected' : '' ?>>Los tiro</option>
                                    <option value="Los vendo"<?= (isset($_POST['rr_2']) && $_POST['rr_2'] === 'Los vendo') ? 'selected' : '' ?>>Los vendo</option>
                                    <option value="Los reciclo"<?= (isset($_POST['rr_2']) && $_POST['rr_2'] === 'Los reciclo') ? 'selected' : '' ?>>Los reciclo</option>
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
                                <!-- ccr_1 -->
                                <fieldset>
                                    <legend class="col-form-label-format">
                                        ¿Sabes qué es el “consumo responsable”?
                                    </legend>
                                    <label for="8-si" class="col-form-label-format">
                                        <input type="radio" id="8-si" name="ccr_1" class="all-elements-color-background" value="Si"
                                        <?= (isset($_POST['ccr_1']) && $_POST['ccr_1'] === 'Si') ? 'checked' : '' ?>required> Si
                                    </label><br>
                                    <label for="8-No" class="col-form-label-format">
                                        <input type="radio" id="8-No" name="ccr_1" class="all-elements-color-background" value="No"
                                        <?= (isset($_POST['ccr_1']) && $_POST['ccr_1'] === 'No') ? 'checked' : '' ?>> No
                                    </label><br>
                                    <label for="8-Algo" class="col-form-label-format">
                                        <input type="radio" id="8-Algo" name="ccr_1" class="all-elements-color-background" value="Algo"
                                        <?= (isset($_POST['ccr_1']) && $_POST['ccr_1'] === 'Algo') ? 'checked' : '' ?>> Algo
                                    </label><br>
                                </fieldset> 
                                <!-- ccr_2 -->
                                <label class="col-form-label col-form-label-format" for="noUsados">
                                    ¿Qué tan importante es para ti el impacto ambiental al comprar?
                                </label>
                                <select id="imporImpactoAmb" name="ccr_2" class="form-select col-form-label-format all-elements-color-background" required>
                                    <option value="">Selecciona una opción</option>
                                    <option value="Muy importante"<?= (isset($_POST['ccr_2']) && $_POST['ccr_2'] === 'Muy importante') ? 'selected' : '' ?>>Muy importante</option>
                                    <option value="Algo importante"<?= (isset($_POST['ccr_2']) && $_POST['ccr_2'] === 'Algo importante') ? 'selected' : '' ?>>Algo importante</option>
                                    <option value="Poco importante"<?= (isset($_POST['ccr_2']) && $_POST['ccr_2'] === 'Poco importante') ? 'selected' : '' ?>>Poco importante</option>
                                    <option value="No es importante"<?= (isset($_POST['ccr_2']) && $_POST['ccr_2'] === 'No es importante') ? 'selected' : '' ?>>No es importante</option>
                                </select><br>
                                <!-- ccr_3 -->
                                <fieldset>
                                    <legend class="col-form-label-format">
                                        ¿Estarías dispuesto a pagar más por productos sostenibles?
                                    </legend>
                                    <label for="9-si" class="col-form-label-format">
                                        <input type="radio" id="9-si" name="ccr_3" class="all-elements-color-background" value="Si"
                                        <?= (isset($_POST['ccr_3']) && $_POST['ccr_3'] === 'Si') ? 'checked' : '' ?>required> Si
                                    </label><br>
                                    <label for="9-no" class="col-form-label-format">
                                        <input type="radio" id="9-no" name="ccr_3" class="all-elements-color-background" value="No"
                                        <?= (isset($_POST['ccr_3']) && $_POST['ccr_3'] === 'No') ? 'checked' : '' ?>> No
                                    </label><br>
                                    <label for="9-depende" class="col-form-label-format">
                                        <input type="radio" id="9-depende" name="ccr_3" class="all-elements-color-background" value="Depende del producto"
                                        <?= (isset($_POST['ccr_3']) && $_POST['ccr_3'] === 'Depende del producto') ? 'checked' : '' ?>> Depende del producto
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
                            <input type="text" id="habitoMejorar" name="rpc" class="form-control col-form-label-format all-elements-color-background" 
                            value = "<?= !empty($_POST['rpc'])?$_POST['rpc']:''?>" style="width: 1100px; height: 110px;" placeholder="Escribe tu respuesta aquí">
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
