<?php
    class MiClase{
        
        function insertar(int $ced, string $nom, string $ape, string $usu, string $cla, string $tpu, int $tel, string $dir, string $cor, string $fec):string{
            include "config/conexiondbb.php";
            $query = ("INSERT INTO `clientes` 
            (`id`, `cedula`, `nombres`, `apellidos`, `usuario`, `clave`, `tipo_usuario`, `telefono`, `direccion`, `correo`, `fecha`)  
            VALUES (NULL, '$ced', '$nom', '$ape', '$usu',  '$cla',  '$tpu', '$tel', '$dir', '$cor', '$fec');");
            if (mysqli_query($bd, $query)) {
                return "Registrado Correctamente";
            } else {
                return "Error: " . $query . "<br>" . mysqli_error($bd);
            }
        }
        function modificar(int $id, int $ced, string $nom, string $ape, string $usu, string $cla, string $tpu, int $tel, string $dir, string $cor, string $fec):string{
            include "config/conexiondbb.php";
            $sql="UPDATE `clientes` SET
            `cedula` = '$ced', `nombres` = '$nom', `apellidos` = '$ape', `usuario` = '$usu', 
            `clave` = '$cla', `tipo_usuario` = '$tpu', `telefono` = '$tel', `direccion` = '$dir', 
            `correo` = '$cor', `fecha` = '$fec' WHERE `id` = '$id';";
            if (mysqli_query($bd, $sql)) {
                return "Modificado Correctamente";
            } else {
                return "Error: " . $sql . "<br>" . mysqli_error($bd);
            }
            
        }
        function eliminar(int $id):string{
            include "config/conexiondbb.php";
            $sql="DELETE from `clientes` where `id`='$id';";
            if (mysqli_query($bd, $sql)) {
                return "Borrado Correctamente";
            } else {
                return "Error: " . $sql . "<br>" . mysqli_error($bd);
            }
        }
        function buscar(int $num):string{
            include "config/conexiondbb.php";
            $html="";
            $query = $bd->query("Select * from clientes;");
                if ($query->num_rows > 0) {
                    while ($row = $query->fetch_assoc()) {
                        $html.= '
                        <tr>
                            <td scope="row">'.$row["id"].'</td>
                            <td><input type="text" name="cedu'.$row["id"].'"  value="'.$row["cedula"].'"></td>
                            <td><input type="text" name="nomb'.$row["id"].'"  value="'.$row["nombres"].'"></td>
                            <td><input type="text" name="apel'.$row["id"].'"  value="'.$row["apellidos"].'"></td>
                            <td><input type="text" name="usua'.$row["id"].'"  value="'.$row["usuario"].'"></td>
                            <td><input type="text" name="clav'.$row["id"].'"  value="'.$row["clave"].'"></td>
                            <td><input type="text" name="tpus'.$row["id"].'"  value="'.$row["tipo_usuario"].'"></td>
                            <td><input type="text" name="tele'.$row["id"].'"  value="'.$row["telefono"].'"></td>
                            <td><input type="text" name="dire'.$row["id"].'"  value="'.$row["direccion"].'"></td>
                            <td><input type="text" name="corr'.$row["id"].'"  value="'.$row["correo"].'"></td>
                            <td><input type="text" name="fech'.$row["id"].'"  value="'.$row["fecha"].'"></td>
                            <td><button type="submit" id="btnBorrar'.$row["id"].'" name="borrar" value="'.$row["id"].'">Borrar</button></td>
                            <td><button type="submit" id="btnModificar'.$row["id"].'" name="modificar" value="'.$row["id"].'">Modificar</button></td>
                        </tr>
                        ';
                    }
                    return $html;
                }else{
                    return "Error: " . $query . "<br>" . mysqli_error($bd);
                }
        }
    }
    try {
    $server = new SoapServer(
    null,
    [
    'uri'=> 'http://localhost:8080/PROGRAMACION%20WEB/VentaAutosEc/server.php',
    ]
    );
    $server->setClass('MiClase');
    $server->handle();
    } catch (SOAPFault $f) {
    //print $f->faultstring;
    }
?>