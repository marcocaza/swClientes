
<?php
    include "config/conexiondbb.php";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="../css/mod.css">
    <link rel="stylesheet" href="css/estilos.css">
    <script type="text/javascript" src="js/funciones.js"></script>
    <title>Clientes</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <a href="index.php" class="navbar-brand"><img src="img/logo1.png" alt="car1" id="logo1"><img src="img/logo2.png" alt="car2" id="logo2"></a>
        <button class="navbar-toggler" data-target="#my-nav" data-toggle="collapse" aria-controls="my-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div id="my-nav" class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item ">
                    <a class="nav-link" href="login.php">Login<span class="sr-only"></span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link disabled" href="clientes.php" tabindex="-1" aria-disabled="true">Cliente</a>
                </li>
                
            </ul>
        </div>
    </nav>
    <br>
    <br>
    <br>
    <br>
    <br>
    
    <div class="container">
        
        <div class="row">
            <form class="col-12" method="POST" action="">
                <center><h1>Registro de Clientes</h1></center>
                <div class="form-group">
                    <label>Cedula:</label><label class="ale">* </label>
                    <input type="text" class="form-control" name="txtCedula" id="txtCedula"  >
                    <label>Nombres:</label><label class="ale">* </label>
                    <input type="text" class="form-control" name="txtNombre"  id="txtNombre">
                    <label>Apellidos:</label><label class="ale">* </label>
                    <input type="text" class="form-control" name="txtApellido"  id="txtApellido">
                    <label>Usuario:</label><label class="ale">* </label>
                    <input type="text" class="form-control" name="txtUsuario" id="txtUsuario">
                    <label>Clave:</label><label class="ale">* </label>
                    <input type="password" class="form-control" name="txtClave" id="txtClave">
                    <label>Tipo usuario:</label><label class="ale">* </label>
                    <input type="text" class="form-control" name="txtTipUsu" id="txtTipUsu">
                    <label>Telefono:</label><label class="ale">* </label>
                    <input type="text" class="form-control" name="txtTelefono" id="txtTelefono">
                    <label>Direccion:</label><label class="ale">* </label>
                    <input type="text" class="form-control" name="txtDireccion" id="txtDireccion">
                    <label>Correo:</label><label class="ale">* </label>
                    <input type="text" class="form-control" name="txtCorreo" id="txtCorreo">
                    <label>Fecha:</label><label class="ale">* </label>
                    <input type="text" class="form-control" name="txtFecha" id="txtFecha">
                    <br>
                    <center>
                    <button type="submit" class="btn btn-primary" name="enviar" id="enviar" value="Enviar"><i class="fa fa-user-circle" ></i> Registrar</button>
                    </center>
                    <table class="table table-striped table-inverse table-responsive">
                        <thead class="thead-inverse">
                            <tr>
                                <th>Id</th>
                                <th>Cedula</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>usuario</th>
                                <th>clave</th>
                                <th>tipo usu</th>
                                <th>telefono</th>
                                <th>direccion</th>
                                <th>Correo</th>
                                <th>Fecha</th>
                                <th>Eliminar</th>
                                <th>Modificar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                               $cliente = new SoapClient("http://localhost:8080/PROGRAMACION%20WEB/VentaAutosEc/CRUD.xml");
                               //  print_r ($cliente->__getFunctions());
                               try{
                                echo $r = $cliente->__soapCall("buscar", array(1));
                            ?>
                        </tbody>
                    </table>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
<?php
    
        if (isset($_POST['enviar'])){
            $ced = $_POST['txtCedula'];
            $nom = $_POST['txtNombre'];
            $ape = $_POST['txtApellido'];
            $usu = $_POST['txtUsuario'];
            $cla = $_POST['txtClave'];
            $tpu = $_POST['txtTipUsu'];
            $tel= $_POST['txtTelefono'];
            $dir= $_POST['txtDireccion'];
            $cor= $_POST['txtCorreo'];
            $fec= $_POST['txtFecha'];
            echo $r = $cliente->__soapCall("insertar", array($ced,$nom, $ape, $usu, $cla, $tpu, $tel, $dir, $cor, $fec));  
            //print_r($cliente->insertar([])->resultado);
        } else if (isset($_POST['borrar'])){
            $id=$_POST['borrar'];
            echo $r = $cliente->__soapCall("eliminar", array($id));
        }else if (isset($_POST['modificar'])){
            $id=$_POST['modificar'];
            $ced = $_POST['cedu'.$id.''];
            $nom = $_POST['nomb'.$id.''];
            $ape = $_POST['apel'.$id.''];
            $usu = $_POST['usua'.$id.''];
            $cla = $_POST['clav'.$id.''];
            $tpu = $_POST['tpus'.$id.''];
            $tel= $_POST['tele'.$id.''];
            $dir= $_POST['dire'.$id.''];
            $cor= $_POST['corr'.$id.''];
            $fec= $_POST['fech'.$id.''];
            echo $r = $cliente->__soapCall("modificar", array($id, $ced, $nom, $ape, $usu, $cla, $tpu, $tel, $dir, $cor, $fec));
        }
    } catch (SoapFault $e) {
        echo $e->getMessage().PHP_EOL;
    }
?>