<!DOCTYPE HTML>
<?php
require 'functions.php';
$permisos = ['Administrador'];
permisos($permisos);

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

    <div class="body">
        <div class="panel">
            <h1 class="text-center">"I.E.P. San Ignacio de Loyola"</h1>
            <?php
            if(isset($_GET['err'])){
                echo '<h3 class="error text-center">ERROR: Usuario no autorizado</h3>';
            }
            ?>
            <br>
            
            <br>
        </div>
    </div>

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
                text: 'Browser market shares January, 2015 to May, 2015'
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
                name: 'Brands',
                colorByPoint: true,
                data: [{
                    name: 'Microsoft Internet Explorer',
                    y: 56.33
                }, {
                    name: 'Chrome',
                    y: 24.03,
                    sliced: true,
                    selected: true
                }, {
                    name: 'Firefox',
                    y: 10.38
                }, {
                    name: 'Safari',
                    y: 4.77
                }, {
                    name: 'Opera',
                    y: 0.91
                }, {
                    name: 'Proprietary or Undetectable',
                    y: 0.2
                }]
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
