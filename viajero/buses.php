<?
//conexion base de datos
$db_host="sql10.freesqldatabase.com:3306";
$db_base="sql10304634";
$db_usuario="sql10304634";
$db_comtrasenia="XWd9aJyWvq";
$conex=mysql_connect($db_host,$db_usuario,$db_comtrasenia);
mysql_select_db($db_base,$conex);
$fecha=$_GET['fechav'];
$destino=$_GET['destinov'];
$consultabuscar=mysql_query("SELECT detalle_viaje.cod_detallev,empresa.nombre_empresa,horario.hora,detalle_viaje.costo 
FROM horario,detalle_viaje,empresa_bus,empresa,destino,programacion_viaje 
WHERE horario.id_horario=detalle_viaje.id_horario AND empresa.cod_empresa=empresa_bus.cod_empresa 
AND empresa_bus.placa=detalle_viaje.placa AND 
detalle_viaje.cod_destino=destino.cod_destino AND destino.destino=$fecha
AND detalle_viaje.cod_programacion=programacion_viaje.cod_programacion 
AND programacion_viaje.fecha=$destino ",$conex);
$respuesta=mysql_query("SHOW COLUMNS FROM empresa");
$numerodefilas=mysql_num_rows($respuesta);
if($numerodefilas>0)
{
    while($rowr=mysql_fetch_row($consultabuscar)){
        for($j=0;$j<$numerodefilas;$j++)
        {
            $en_csv.=$rowr[$j]."-";
        }
        $en_csv.= ",";
    }
}
print $en_csv;
echo $numerodefilas;
?>