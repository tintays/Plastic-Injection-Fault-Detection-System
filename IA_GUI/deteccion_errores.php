<!doctype html>
<html lang="es">
<head>
    <!-- Etiquetas Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <title>IA</title>
</head>
<body class="container" style="background-color: #303030">
<?php include "layouts/header.php"?>
<?php include "layouts/nav.php"?>

<div class="card">
    <h5 class="card-header">Declaración de los errores</h5>
    <div class="card-body">
        <form action="alerta_soluciones.php" method="get">
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col">
                            <label for="inputGroupSelect01">Material</label>
                            <select class="custom-select" id="inputGroupSelect01" name="material">
                                <option selected>Elegir...</option>
                                <option value="HDPE">HDPE</option>
                                <option value="PA66">PA66</option>
                                <option value="PS">PS</option>
                                <option value="PP">PP</option>
                            </select>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="exampleInput2">Temperatura de molde (C°)</label>
                                <input type="number" class="form-control" id="exampleInput2" name="temp_molde" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="exampleInput3">Temperatura de secado (C°)</label>
                                <input type="number" class="form-control" id="exampleInput3" name="temp_sec" required>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="exampleInput4">Tiempo de secado (minutos)</label>
                                <input type="number" min="1" class="form-control" id="exampleInput4" name="tiemp_sec" required>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="exampleInput5">Presion de inyección (bar)</label>
                                <input type="number" class="form-control" id="exampleInput5" name="p_inyeccion" required>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="exampleInput6">Presion de mantenimiento (%)</label>
                                <input type="number" class="form-control" id="exampleInput6" name="p_mantenimiento" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="exampleInput7">Temperatura de barril (C°)</label>
                                <input type="number" class="form-control" id="exampleInput7" name="temp_barril" required>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="exampleInput8">Temperatura de alimentación (C°)</label>
                                <input type="number" class="form-control" id="exampleInput8" name="temp_alimentacion" required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="exampleInput8">Velocidad de inyección (m/s)</label>
                        <input step="any" min="1" type="number" class="form-control" id="exampleInput8" name="v_inyeccion" required>
                    </div>
                </div>
                <div class="col-md-4"></div>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4" align="center">
                    <button type="submit" class="btn btn-success" name="btn-enviar">Aceptar</button>
                </div>
                <div class="col-md-4"></div>
            </div>
        </form>
    </div>
</div>

<script src="js/funciones.js"></script>
<script>
    activarEnlace(1);
</script>
</body>
</html>