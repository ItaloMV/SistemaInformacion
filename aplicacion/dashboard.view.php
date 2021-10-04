<!DOCTYPE HTML>
<?php
require 'functions.php';
require 'conn/connection.php';
$permisos = ['Administrador'];
permisos($permisos);

//consulta los alumnos para el listaddo de alumnos
$sqlalumnos = $conn->prepare("select a* from alumnos");
$sqlalumnos->execute();
$alumnos = $sqlalumnos->fetchAll();

//consulta las materias
$materias = $conn->prepare("select * from materias");
$materias->execute();
$materias = $materias->fetchAll();


$notas = $conn->prepare("select * from notas");
$notas->execute();
$notas = $notas->fetchAll();



?>
<html>
	<head>
		<title>Inicio | Registro de Notas</title>
		<meta http-equiv="description" content="Registro de Notas de I.E.P. San Ignacio de Loyola">
        <link rel="stylesheet" href="css/index.css" />

		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
		<style type="text/css">
		</style>
		
	</head>
	<body>

    <div class="header">
        <h1>Registro de Notas - "I.E.P. San Ignacio de Loyola"</h1>
        <h3>Usuario:  <?php echo $_SESSION["username"] ?></h3>
    </div>
    <nav>
        <ul>
            <li><a href="inicio.view.php">Inicio</a> </li>
            <li><a href="alumnos.view.php">Registro de Alumnos</a> </li>
            <li><a href="listadoalumnos.view.php">Listado de Alumnos</a> </li>
            <li><a href="notas.view.php">Registro de Notas</a> </li>
            <li><a href="listadonotas.view.php">Consulta de Notas</a> </li>
            <li class="active"><a href="dashboard.view.php">Dashboard</a> </li>
            <li class="right"><a href="logout.php">Salir</a> </li>

        </ul>
    </nav>
        <?php 
            $promedio = 0.0;
            $contador_alumno = $sqlalumnos->rowCount(); 
        ?>
        <?php while($contador_alumno>0){?> 
        <?php foreach ($notas as $nota) : ?>
            <?php 
                $promedio += $nota['nota'];
            ?>
        <?php endforeach ?>
                
        <?php echo $promedio/4 ?> 

        <?php } ?> 
        <?php foreach ($alumnos as $alumno) : ?>

            <?php echo $alumno['nombres']?>

        <?php endforeach ?>
           
    <script type="text/javascript">
    $(function () {
        $('#container').highcharts({
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'Estadistica de promedio de los alumnos'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                        style: {
                            color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                        }
                    }
                }
            },
            series: [{
                name: 'Promedio',
                colorByPoint: true,
                data: [

                    <?php foreach ($notas as $nota) : ?>

                        <?php foreach ($alumnos as $alumno) : ?>
                            <?php if($nota['id_alumno'] == $alumno['id'])  ?>
                            [<?php echo $alumno['nombres']?>,<?php echo $nota['nota']?>],
                        <?php endforeach ?>

                    <?php endforeach ?>
                    ]
            }]
        });
    });
	</script>
    

    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>

    <div id="container" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>

    <footer>
        <p>Derechos reservados &copy; 2021</p>
    </footer>

	</body>
</html>
