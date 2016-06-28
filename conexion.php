<?php
$cn=mysql_connect("mysql.webcindario.com","cliente","root")or die("Error en Conexion");
$db=mysql_select_db("cliente")or die("Error en Db");
return($cn);
return($db);
?>