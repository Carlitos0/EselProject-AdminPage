<?php 
    $mysqli = new mysqli("localhost","root","","solucionweb");
    
    $salida = "";
    $query = "SELECT * FROM usuario";

    if(isset($_POST['consult'])){
        $q = $mysqli -> real_escape_string($_POST['consult']);
        $query = "SELECT * FROM usuario WHERE nomusu LIKE '%".$q."%'";
    }
    $result = $mysqli -> query($query);
    if($result->num_rows > 0){
        $salida.='<table class="table mt-2 mb-2 table-dark table-striped table-responsive-lg rounded">
            <thead>
                <tr>
                    <th scope="col" class="text-center">Code</th>
                    <th scope="col" class="text-center">User Name</th>
                    <th scope="col" class="text-center">User Lastname</th>
                    <th scope="col" class="text-center">Email</th>
                    <th scope="col" class="text-center">Password</th>
                    <th scope="col" class="text-center">Status</th>
                    <th scope="col" class="text-center">Control</th>
                </tr>   
            </thead>
            <tbody class="text-center">';
        while($fila = $result -> fetch_assoc()){
            $salida.='<tr>
            <td>'.$fila["codusu"].'</td>
            <td>'.$fila["nomusu"].'</td>
            <td>'.$fila["apeusu"].'</td> 
            <td>'.$fila["emausu"].'</td>
            <td>'.$fila["pasusu"].'</td>
            <td>'.$fila["estado"].'</td>
            <td>
                <div class="d-flex justify-content-around">
                    <a href="./controller/updateUsuario.php?codusu='.$fila["codusu"].'" class="btn"><i class="fa-solid fa-pen text-info"></i></a>   
                    <a href="./controller/deleteUsuario.php?codusu='.$fila["codusu"].'" class="btn"><i class="fa-solid fa-trash-can text-danger"></i></a>
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