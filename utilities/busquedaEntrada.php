<?php 
    
    $mysqli = new mysqli("localhost","root","","solucionweb");
    $salida = '';
    $query = 'SELECT * FROM entradas';

    if(isset($_POST['cslt'])){
        $q = $_POST['cslt'];
        $query = "SELECT * FROM entradas WHERE codent LIKE '%".$q."%'";
    }
    $result = $mysqli -> query($query);
    if($result -> num_rows > 0){
        $salida.='<table class="table mt-2 mb-2 table-dark table-striped table-responsive-lg rounded">
            <thead>
                <tr>
                    <th scope="col" class="text-center">Codigo</th>
                    <th scope="col" class="text-center">Cantidad</th>
                    <th scope="col" class="text-center">fecha</th>
                    <th scope="col" class="text-center">Codigo Producto</th>
                    <th scope="col" class="text-center">Control</th>
                </tr>   
            </thead>
            <tbody>';
        while($fila = $result -> fetch_assoc()){
            $salida.='<tr>
            <td>'.$fila["codent"].'</td>
            <td>'.$fila["cantidad"].'</td>
            <td>'.$fila["fecha"].'</td> 
            <td>'.$fila["codpro"].'</td>
            <td>
                <div class="d-flex justify-content-center">
                    <a href="./api/updateProduct.php?codent='.$fila["codent"].'" class="btn"><i class="fa-solid fa-circle-info"></i></a>   
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