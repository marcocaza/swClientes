function soloLet(let){	
	var c = let.keyCode;
        	return (c >= 65 && c <= 90 | c >= 97 && c <= 122 || c ==32)
}
function soloNum(num){	
	var c = num.keyCode;
        	return ((c >= 48 && c <= 57 || c == 58))
}
function alerta(){
var opcion = prompt("Introduzca la clave:", "");
if (opcion == "stalin") {
        alert("Acceso Consedido");
        window.location='reporte.php';
        } else {
            alert("Acceso denegado");
            }
}

function buscar( $ced, $nom, $ape, $usu, $cla, $tpu, $tel, $dir, $cor, $fec){
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
    document.getElementById("txtCedula").value=$ced;
}