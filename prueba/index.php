<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Buscar datos en tiempo real con PHP, MySQL y AJAX">
    <meta name="author" content="Marco Robles">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vehiculos</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>
<main>
<div class="container py-4 text-center">
    <h2>Vehiculos</h2>
    <div class="row g-4">
        <div class="col-auto">
            <label for="num_registros" class="col-form-label">Mostrar: </label>
        </div>
        <div class="col-auto">
                    <select name="num_registros" id="num_registros" class="form-select">
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                </div>

                <div class="col-auto">
                <label for="num_registros" class="col-form-label">registros </label>
                </div>
                <div class="col-5"></div>
                <div class="col-auto">
                    <label for="campo" class="col-form-label">Buscar: </label>
                </div>
                <div class="col-auto">
                    <input type="text" name="campo" id="campo" class="form-control">
                </div>
            </div>
    <div class="row py-4">
    <div class="col">
    <table class="table table-sm table-bordered">
        <thead>
            <th>Num.placa</th>
            <th>pri_nombre_pro</th>
            <th>seg_nombre</th>
            <th>apellido_pro</th>
            <th>marca</th>
            <th>hora salida</th>
            <th>hora entrada</th>
            <th>pri_nombre_cond</th>
            <th>seg_nombre_cond</th>
            <th>apellido_cond</th>

        </thead>
        <?php
        $query="SELECT Ve.placa, Ve.pnp, Ve.snp, Ve.ap, Ve.marca
        Ho.hora salida, Ho.hora entrada,
        Con.pnc, Con.snc, Con.ac
 FROM horarios Ho
 INNER JOIN vehiculo  Ve ON Ho.placa = Ve.placa
 INNER JOIN conductor Con ON Ho.ic = Con.ic";
  $consulta=$conexion->query($query);
while ($fila=$consulta->fetch(PDO::FETCH_ASSOC))
{
 echo'
 <tr>
 <td>'.$fila['placa'].'</td>
 <td>'.$fila['pri_nombre_pro'].'</td>
 <td>'.$fila['seg_nombre'].'</td>
 <td>'.$fila['apellido_pro'].'</td>
 <td>'.$fila['maraca '].'</td>
 <td>'.$fila['hora salida'].'</td>
 <td>'.$fila['hora entrada'].'</td>
 <td>'.$fila['pri_nombre_cond'].'</td>
 <td>'.$fila['seg_nombre_cond'].'</td>
 <td>'.$fila['apellido_cond'].'</td>

 </tr>
 ';
}

        ?>
        <tbody id="content">
            
        </tbody>
        </table>
        </div>
        </div>

        <div class="row">
                <div class="col-6">
                    <label id="lbl-total"></label>
                </div>
                <div class="col-6" id="nav-paginacion"></div>
            </div>
        </div>

        <script>
            getData(1)
            getData(paginaActual)


            document.getElementById("campo").addEventListener("keyup", getData) //consulta
            function getData(){
                let input = document.getElementById("campo").value 
                let num_registros = document.getElementById("num_registros").value
                let content = document.getElementById("content")

                if (pagina != null) {
                paginaActual = pagina
            }
                let url = "load.php";
                let formaData = new FormData()
                formaData. append('campo', input)
                formaData.append('registros', num_registros)
                formaData.append('pagina', paginaActual)

                fetch(url,{
                    method: "POST",
                    body: formaData

                }).then(response => response.json())
                .then(data =>{
                    content.innerHTML = data.data
                    document.getElementById("lbl-total").innerHTML = 'Mostrando ' + data.totalFiltro +
                        ' de ' + data.totalRegistros + ' registros'
                    document.getElementById("nav-paginacion").innerHTML = data.paginacion
                }).catch(err => console.log(err))
            }
        </script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>