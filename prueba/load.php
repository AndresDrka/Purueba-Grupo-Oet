<?php
require 'config.php';
$colums =['placa', 'idcedu_cond', 'pri_nombre_pro', 'seg_nombre', 'apellido_pro', 'direccion_pro', 'ciudad_pro', 'telefono_pro', 'color', 'maraca', 'tipo' ];
$table = "vehiculo";
$id = 'placa';
$campo = isset($_POST['campo']) ? $conn->real_escape_string($_POST['campo']) : null;

$where ='';

if ($campo != null) {
    $where = "WHERE (";

    $cont = count($columns);
    for ($i = 0; $i < $cont; $i++) {
        $where .= $columns[$i] . " LIKE '%" . $campo . "%' OR ";
    }
    $where = substr_replace($where, "", -3);
    $where .= ")";
}

$limit = isset($_POST['registros']) ? $conn->real_escape_string($_POST['registros']) : 10;
$pagina = isset($_POST['pagina']) ? $conn->real_escape_string($_POST['pagina']) : 0;

if (!$pagina) {
    $inicio = 0;
    $pagina = 1;
} else {
    $inicio = ($pagina - 1) * $limit;
}

$sLimit = "LIMIT $inicio , $limit";


$sql = "SELECT SQL_CALC_FOUND_ROWS " . implode(", ", $columns) . "
FROM $table
$where
$sLimit";
$resultado = $conn->query($sql);
$num_rows = $resultado->num_rows;

$sqlFiltro = "SELECT FOUND_ROWS()";
$resFiltro = $conn->query($sqlFiltro);
$row_filtro = $resFiltro->fetch_array();
$totalFiltro = $row_filtro[0];


$sqlTotal = "SELECT count($id) FROM $table ";
$resTotal = $conn->query($sqlTotal);
$row_total = $resTotal->fetch_array();
$totalRegistros = $row_total[0];

$output = [];
$output['totalRegistros'] = $totalRegistros;
$output['totalFiltro'] = $totalFiltro;
$output['data'] = '';
$output['paginacion'] = '';


if($num_rows  > 0){
    while($row = $resultado->fetch_assoc()){
        $html .= '<tr>';
        $html .= '<td>'.$row['placa'].'</td>';
        $html .= '<td>'.$row['idcedu_cond'].'</td>';
        $html .= '<td>'.$row['pri_nombre_pro'].'</td>';
        $html .= '<td>'.$row['seg_nombre'].'</td>';
        $html .= '<td>'.$row['apellido_pro'].'</td>';
        $html .= '<td>'.$row['direccion_pro'].'</td>';
        $html .= '<td>'.$row['ciudad_pro'].'</td>';
        $html .= '<td>'.$row['telefono_pro'].'</td>';
        $html .= '<td>'.$row['color'].'</td>';
        $html .= '<td>'.$row['maraca'].'</td>';
        $html .= '<td>'.$row['tipo'].'</td>';
        $html .= '<td><a href="">Editar</a></td>';
        $html .= '<td><a href="">Eliminar</a></td>';
        $html .= '</tr>'; 
    }
} 

else {
    $output['data'] .= '<tr>';
    $output['data'] .= '<td colspan="7">Sin resultados</td>';
    $output['data'] .= '</tr>';
}

if ($output['totalRegistros'] > 0) {
    $totalPaginas = ceil($output['totalRegistros'] / $limit);

    $output['paginacion'] .= '<nav>';
    $output['paginacion'] .= '<ul class="pagination">';

    $numeroInicio = 1;

    if(($pagina - 4) > 1){
        $numeroInicio = $pagina - 4;
    }

    $numeroFin = $numeroInicio + 9;

    if($numeroFin > $totalPaginas){
        $numeroFin = $totalPaginas;
    }

    for ($i = $numeroInicio; $i <= $numeroFin; $i++) {
        if ($pagina == $i) {
            $output['paginacion'] .= '<li class="page-item active"><a class="page-link" href="#">' . $i . '</a></li>';
        } else {
            $output['paginacion'] .= '<li class="page-item"><a class="page-link" href="#" onclick="getData(' . $i . ')">' . $i . '</a></li>';
        }
    }

    $output['paginacion'] .= '</ul>';
    $output['paginacion'] .= '</nav>';
}

echo json_encode($html, JSON_UNESCAPED_UNICODE);
?>