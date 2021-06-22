<?php
    class MiClase{
        function suma(int $num1, int $num2):int{
            return $num1+$num2;
        }
        function resta(int $num1, int $num2):int{
            return $num1-$num2;
        }
        function multiplicacion(int $num1, int $num2):int{
            return $num1*$num2;
        }
        function division(int $num1, int $num2):int{
            return $num1/$num2;
        }
    }
    try {
    $server = new SoapServer(
    null,
    [
    'uri'=> 'http://localhost:8080/PROGRAMACION%20WEB/wsSOAP/server.php',
    ]
    );
    $server->setClass('MiClase');
    $server->handle();
    } catch (SOAPFault $f) {
    print $f->faultstring;
    }
?>