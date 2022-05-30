<?php
include 'controller/tornadosSparql.php';
$tornados = new TornadosSparql();
$resultado = $tornados->getTornados();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Listado de Eventos - Tornados</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://markcell.github.io/jquery-tabledit/assets/js/tabledit.min.js"></script>
</head>
<body>
<div class="container">
    <h3 align="left">Listado de Eventos - Tornados</h3>
    <br />

<?php
    $data =  $resultado->results->bindings;
    echo "<table>";
    foreach ($data as $d) {
        echo "<tr>";
        echo "<td>".$d->subject->value."</td>";
        echo "<td>".$d->predicate->value."</td>";
        echo "<td>".$d->object->value."</td>";
        echo "</tr>";
    }
    echo "</table>";
?>

</div>

</body>
</html>
