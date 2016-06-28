<?php
include("conexion.php");
?>
<!DOCTYPE html>
<!DOCTYPE html>

<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">
    
<title>Paguina Web - Cliente/Servidor</title>
<meta name="description" content="" />
<meta name="keywords" content="" />
<meta name="robots" content="index,follow" />
<link rel="shortcut icon" href="images/favicon.ico" /> 
<link rel="stylesheet" href="css/prettyPhoto.css" type="text/css" />
<link rel="stylesheet" href="css/flexslider.css" type="text/css" />
<link rel="stylesheet" href="css/style.css" type="text/css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.2/css/materialize.min.css">
<!--[if (gte IE 6)&(lte IE 8)]>
<script type="text/javascript" src="js/html5.js"></script>
<script type="text/javascript" src="js/selectivizr-min.js"></script>
<link rel="stylesheet" href="css/ie_7.css" type="text/css" />
<![endif]-->

<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.8.16.custom.min.js"></script>
<script type="text/javascript" src="js/all-in-one-min.js"></script>
<script type="text/javascript" src="js/setup.js"></script>
<script type="text/javascript" src="js/main.js"></script>
<script type="text/javascript">

$(window).load(function(){
	$('#demo-side-bar').removeAttr('style');
});
</script>
<style type="text/css">
.demobar{display:none;}
#demo-side-bar{top:53px!important;left:90%!important;display:block!important;}
</style>
 <!--Dynamically creates ads markup-->
   <?php include("http://www.egrappler.com/ads-header.php"); ?>
	<!-- Header -->
	<header class="header_bg clearfix">
		<div class="container clearfix">
        	
			</div>
			<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- /Header -->
    <!-- START CONTENT -->
    <div id="leo">
<section id="leon">
<section id="leone">


<!--DE AQUI COMIENZA SI DESEAR COPIAR A TU SITIO WEB TOMALO COMO SI EMPEZARAS DESDE BODY-->

<?php
$var="";
$var1="";
$var2="";
$var3="";
$var4="";
$var5="";
if(isset($_POST["btn1"])){
	$btn=$_POST["btn1"];
	$bus=$_POST["txtbus"];
	if($btn=="Buscar"){
		
		$sql="select * from noticia where Cod_noti='$bus'";
		$cs=mysql_query($sql,$cn);
		while($resul=mysql_fetch_array($cs)){
			$var=$resul[0];
			$var1=$resul[1];
			$var2=$resul[2];
			$var3=$resul[3];
			$var4=$resul[4];
            $var5=$resul[5];
			}
			if($var4=="Policia"){
				$var4="selected";
				}
			
		}
		if($btn=="Nuevo"){
		
		$sql="select count(Cod_noti),Max(Cod_noti) from noticia";
		$cs=mysql_query($sql,$cn);
		while($resul=mysql_fetch_array($cs)){
			$count=$resul[0];
			$max=$resul[1];
			}
			if($count==0){
				$var="A0001";
				}
				else{
					$var='A'.substr((substr($max,1)+10001),1);
					}
			
		}
		if($btn=="Agregar"){
		$cod=$_POST["txtcod"];
		$nom=$_POST["txtnom"];
		$esc=$_POST["txtesc"];
		$tel=$_POST["txttel"];
		$tipo=$_POST["cbotipo"];
        $fec=$_POST["date"];
        
		$sql="insert into noticia values ('$cod','$nom','$esc','$tel','$tipo','$fec')";
		
		$cs=mysql_query($sql,$cn);
		echo "<script> alert('Se insert&oacute; correctamente');</script>";
		}
		if($btn=="Actualizar"){
		$cod=$_POST["txtcod"];
		$nom=$_POST["txtnom"];
		$esc=$_POST["txtesc"];
		$tel=$_POST["txttel"];
		$tipo=$_POST["cbotipo"];
        $fec=$_POST["date"];    
		
		$sql="update noticia set not_nom='$nom',noti_esc='$esc',noti_tel='$tel',noti_tipo='$tipo',fecha='$fec' where Cod_noti='$cod'";
		
		$cs=mysql_query($sql,$cn);
		echo "<script> alert('Se actualizo correctamente');</script>";
		}
		
		if($btn=="Eliminar"){
		$cod=$_POST["txtcod"];
			
		$sql="delete from noticia where Cod_noti='$cod'";
		
		$cs=mysql_query($sql,$cn);
		echo "<script> alert('Se elimnino correctamente');</script>";
		}
	}

?>

<center>
    <div class="row">
   <form name="fe" action="" method="post">
      <div class="row"><table>
    <div class="input-field col s6"><i class="material-icons prefix">search</i><input type="text" name="txtbus" placeholder="Buscar" />
<input type="submit" class="btn waves-effect#263238 blue-grey darken-4" name="btn1"  value="Buscar" />
        </div></table>
<table>
          
   <div class="input-field col s6">

<i class="material-icons prefix">perm_identity</i>
<input type="text" name="txtcod" placeholder="Ingresa codigo de la Noticia" pattern="[a-zA-         ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,48}" value="<?php echo $var?>"/>

</div>
<div class="input-field col s6">
 <i class="material-icons prefix">account_circle</i>
<input id="nombre"type="text" name="txtesc" placeholder="Escritor de la Noticia"  value="<?php echo $var1?>"/>
</div>
<div class="input-field col s6">
           <i class="material-icons prefix">account_circle</i>
    <input type="text" name="txtnom" placeholder="Noticia"  value="<?php echo $var2?>"/></div>


<div class="input-field col s6">
          <i class="material-icons prefix">phone</i>
          <input type="text" name="txttel" placeholder="Telefono del Noticiario"  value="<?php echo $var3?>"/>
    </div>
 <div class="col s12 m6">
                <label>Tipo de Noticia</label>
                <select class="browser-default" name="cbotipo">
                  <option <?php echo $var4?> >Policia</option>
                    <option  <?php echo $var4?> >Deportes</option>
                    <option  <?php echo $var4?> >Sociales</option>
                    <option  <?php echo $var4?> >Nacionales</option>
                </select>
              </div>  
     <div class="input-s12 s6">
        <i class="material-icons prefix">av_timer</i>
    <input type="date" class="col s12 m6" name="date" value="<?php echo $var5?>">
    </div>
<div class="input-field col s6">
   
<input type="submit" class="btn waves-effect#263238 blue-grey darken-4" name="btn1" value="Nuevo"/>
    </div>    
  <div class="input-field col s6">
    
<input type="submit" class="btn waves-effect#263238 blue-grey darken-4" name="btn1" value="Listar"/>
       </div>

          </table>
          <br>
<br>    <br>
<br>    
<table><tr align="center">
  
    
<input type="submit" class="btn waves-effect#263238 blue-grey darken-4" name="btn1" value="Actualizar"/>
   
 
    
<input type="submit" class="btn waves-effect#263238 blue-grey darken-4" name="btn1"value="Eliminar"/>
    

    
<input type="submit" class="btn waves-effect#263238 blue-grey darken-4" name="btn1"value="Agregar"/>
    


    </tr>
     </table>          


</center>
<br />
<hr>
</div>
</form>
<br />



<?php
if(isset($_POST["btn1"])){
	$btn=$_POST["btn1"];

	if($btn=="Listar"){
		
		$sql="select * from noticia";
		$cs=mysql_query($sql,$cn);
		echo"<center>
<table border='3'>
<tr>
<td>Codigo</td>
<td>Noticia</td>
<td>Escritor</td>
<td>Telefono</td>
<td>Tipo Noticia</td>
<td>Fecha</td>
</tr>";
		while($resul=mysql_fetch_array($cs)){
			$var=$resul[0];
			$var1=$resul[1];
			$var2=$resul[2];
			$var3=$resul[3];
			$var4=$resul[4];
			$var5=$resul[5];
            echo "<tr>
<td>$var</td>
<td>$var1</td>
<td>$var2</td>
<td>$var3</td>
<td>$var4</td>
<td>$var5</td>

</tr>";
			}
			
			echo "</table>
</center>";
	}
	}
?>

</section>

</div>
    <!-- END CONTENT -->
    <!-- footer -->
    <footer class="footer_bg_bottom clearfix">
		<div class="footer_bottom container">
			<div class="col_2_3">
				
				
				<div class="clear padding20"></div>
				
				
				<p>
					&copy; Reporte de práctica de desarrollo de sistema de dos y tres capas &nbsp; <a href="http://www.upamozoc.edu.mx/#!ing--en-software/v0luu">Universidad Politecnica de Amozoc</a>  
				</p>
				
			</div>
			
			<div class="clear padding20"></div>
		</div>
	</footer>
	<!-- /footer -->
  	<div id="demo-side-bar">
   <?php include("http://www.egrappler.com/ad-sidebar.php");?>
   </div>
    </div>
    <!--wrapper end-->
	<!--Dynamically creates analytics markup-->
	 <?php include("http://www.egrappler.com/analytics.php");?>
</body>
</html>