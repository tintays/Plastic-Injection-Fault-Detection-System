<!doctype html>
<html lang="es">
<head>
    <!-- Etiquetas Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Implementacion de Python con pyscript y WebAssembly -->
    <link rel="stylesheet" href="https://pyscript.net/alpha/pyscript.css" />
    <script defer src="https://pyscript.net/alpha/pyscript.js"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <!-- Agregando las librerías a utilizar en la pagina web -->
    <py-env>
        - numpy
        - pandas
        - scikit-learn
        - paths:
            - ./HDPE.csv
            - ./PA66.csv
            - ./PS.csv
            - ./PP.csv
    </py-env>


    <title>IA</title>
</head>
<body class="container" style="background-color: #303030">
<?php
if(isset($_GET['btn-enviar'])){
    $m=$_GET['material'];
    $tm=$_GET['temp_molde'];
    $ts=$_GET['temp_sec'];
    $tms=$_GET['tiemp_sec'];
    $pi=$_GET['p_inyeccion'];
    $pm=$_GET['p_mantenimiento'];
    $tb=$_GET['temp_barril'];
    $ta=$_GET['temp_alimentacion'];
    $vi=$_GET['v_inyeccion'];
}
?>
<?php include "layouts/header.php"?>
<?php include "layouts/nav.php"?>

<!-- Librerías de Python -->
<div class="card">
    <h5 class="card-header">Apartado sobre detección de errores</h5>
    <div class="card-body">
        <table class="table table-secondary">
            <thead>
            <tr>
                <th scope="col">Enchuecamiento</th>
                <th scope="col">Flash</th>
                <th scope="col">Lineas de flujo</th>
                <th scope="col">Carbonizaciones</th>
                <th scope="col">Piel de naranja</th>
                <th scope="col">Parte incompleta</th>
                <th scope="col">Parte con rebabas</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td id="p1"></td>
                <td id="p2"></td>
                <td id="p3"></td>
                <td id="p4"></td>
                <td id="p5"></td>
                <td id="p6"></td>
                <td id="p7"></td>
            </tr>
            </tbody>
        </table>
        <label for="s1">Enchuecamiento</label>
        <div class="alert alert-dark" role="alert" id="s1">
            Debajo del 50% de probabilidad
        </div>
        <label for="s2">Flash</label>
        <div class="alert alert-dark" role="alert" id="s2">
            Debajo del 50% de probabilidad
        </div>
        <label for="s3">Lineas de flujo</label>
        <div class="alert alert-dark" role="alert" id="s3">
            Debajo del 50% de probabilidad
        </div>
        <label for="s4">Carbonizaciones</label>
        <div class="alert alert-dark" role="alert" id="s4">
            Debajo del 50% de probabilidad
        </div>
        <label for="s5">Piel de naranja</label>
        <div class="alert alert-dark" role="alert" id="s5">
            Debajo del 50% de probabilidad
        </div>
        <label for="s6">Parte incompleta</label>
        <div class="alert alert-dark" role="alert" id="s6">
            Debajo del 50% de probabilidad
        </div>
        <label for="s7">Parte con rebabas</label>
        <div class="alert alert-dark" role="alert" id="s7">
            Debajo del 50% de probabilidad
        </div>

<!--  Obtencion de datos -->
<py-script>
    #Librerias
    # Paquete Numpy
import numpy as np

    # Análisis de datos
import pandas as pd

    #IA
import sklearn.linear_model as sk

    #Obtencion de datos
material = 1

temp_molde = <?php echo $tm ?>

temp_sec = <?php echo $ts ?>

tiemp_sec = <?php echo $tms ?>

p_inyeccion = <?php echo $pi ?>

p_mantenimiento = <?php echo $pm ?>

temp_barril = <?php echo $tb ?>

temp_alimentacion = <?php echo $ta ?>

v_inyeccion = <?php echo $vi ?>


    #Entrenamiento de IA
datos<?php echo $m?>= pd.read_csv('./<?php echo $m?>.csv')
Datos<?php echo $m?>_entrenamiento=datos<?php echo $m?>.sample(frac=0.8, random_state=0)
Datos<?php echo $m?>_test=datos<?php echo $m?>.drop(Datos<?php echo $m?>_entrenamiento.index)
Resp<?php echo $m?>_entrenamiento= Datos<?php echo $m?>_entrenamiento.drop(labels=['MAT','Temp_molde','Temp_secado','Tiempo_secado','P_inyeccion','P_mantenimiento','Temp_barril','Temp_alimetacion','V_inyeccion'], axis= 1)
Resp_test=Datos<?php echo $m?>_test.drop(labels=['MAT','Temp_molde','Temp_secado','Tiempo_secado','P_inyeccion','P_mantenimiento','Temp_barril','Temp_alimetacion','V_inyeccion'],axis=1)
Datos<?php echo $m?>_entrenamiento=Datos<?php echo $m?>_entrenamiento.drop(labels=['P1','P2','P3','P4','P5','P6','P7'], axis= 1)
Datos<?php echo $m?>_test=Datos<?php echo $m?>_test.drop(labels=['P1','P2','P3','P4','P5','P6','P7'], axis= 1)
import sklearn.linear_model as sk
modelo<?php echo $m?>=sk.LinearRegression()
modelo<?php echo $m?>.fit(Datos<?php echo $m?>_entrenamiento,Resp<?php echo $m?>_entrenamiento)

#Prediccion de la IA
prediccion=pd.DataFrame(np.array([[1,temp_molde,temp_sec,tiemp_sec,p_inyeccion,p_mantenimiento,temp_barril,temp_alimentacion,v_inyeccion]]),columns=['MAT','Temp_molde','Temp_secado','Tiempo_secado','P_inyeccion','P_mantenimiento','Temp_barril','Temp_alimetacion','V_inyeccion'])
x=modelo<?php echo $m?>.predict(prediccion)
resultado=[]
soluciones=["Incrementar el tiempo de enfriamiento dentro del molde", "Incrementar la presion de inyeccion", "Cargar el material mas caliente e incrementar la temperatura del barril", "Purgar husillo y reducir temperatura del barril", "Disminuir la temperatura del barril e incrementar la temperatura del molde", "Aumentar la velocidad de inyección e incrementar la temperatura del barril", "Disminuir la temperatura del barril, aumentar la velocidad de inyección y reducir la temperatura del molde"]

for i in x:
    for j in i:
        if j <0:
            j=0
            resultado.append(j)
        elif j>=100:
            j=100
            resultado.append(j)
        else:
            resultado.append(j)

for i, val in enumerate(resultado):
    val2=round(val,4)
    pyscript.write(f"p{i+1}",f"{val2}%")
    if val>50:
        pyscript.write(f"s{i+1}",f"La posible solucion es: {soluciones[i]}")

</py-script>
    </div>
</div>

<script src="js/funciones.js"></script>
<script>
    activarEnlace(2);
</script>
</body>
</html>