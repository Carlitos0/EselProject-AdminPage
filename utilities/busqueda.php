<link rel="stylesheet" href="../css/estilos.css">
<?php
    $mysqli = new mysqli("localhost","root","","solucionweb");
    
    $salida = "";
    $query = "SELECT * FROM producto";

    if(isset($_POST['consulta'])){
        $q = $mysqli -> real_escape_string($_POST['consulta']);
        $query = "SELECT * FROM producto WHERE nompro LIKE '%".$q."%'";
    }
    $result = $mysqli -> query($query);
    if($result->num_rows > 0){
        $salida.='<table class="table mt-2 mb-2 table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th scope="col" class="text-center">Codigo</th>
                    <th scope="col" class="text-center">Producto / Maquinaria</th>
                    <th scope="col" class="text-center">Descripcion</th>
                    <th scope="col" class="text-center">Precio</th>
                    <th scope="col" class="text-center">Stock</th>
                    <th scope="col" class="text-center">Estado</th>
                    <th scope="col" class="text-center">Control</th>
                </tr>   
            </thead>
            <tbody>';
        while($fila = $result -> fetch_assoc()){
            $salida.='<tr class="p-3">
            <td class="p-3">'.$fila["codpro"].'</td>
            <td>'.$fila["nompro"].'</td>
            <td>'.$fila["despro"].'</td> 
            <td>'."S/".$fila["prepro"].'</td>
            <td class="text-center">'.$fila["cantidad"].'</td>
            <td class="text-center">'.$fila["estado"].'</td>
            <td>
                <div class="d-flex justify-content-around ">
                    <a href="./api/updateProduct.php?codpro='.$fila["codpro"].'" class="btn border-0 icon_control"><i class="fa-solid fa-pen text-info"></i></a>   
                    <a href="./api/deleteProduct.php?codpro='.$fila["codpro"].'" class="btn border-0 icon_control"><i class="fa-solid fa-trash-can text-danger"></i></a>
                </div>
            </td>
        </tr>';
        }
        $salida .="</tbody></table>";
    }
    else{
        $salida = ' <div class="container d-flex flex-column text-center justify-content-center align-items-center">
                        <i class="fas fa-sad-tear display-4 mb-2"></i>
                        <h3>NO HAY DATOS </h3>
                    </div>';
    }

    echo $salida;

    $mysqli -> close();

?>