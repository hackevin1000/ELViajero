<!DOCTYPE html>
<html>
<head>
    <title></title>
    <style type="text/css">
        #info
        {
            background-color: red;
        }
        td,th
        {
            border:solid 5px blue;
        }
    </style>
    <script type="text/javascript" src="jquerry-1.3.1.min.js">
    </script>
    <script type="text/javascript">
     function almacenar()
     {
         $.ajax
         ({
             type:"POST",
             url: "registrar.php",
             data:"nombre="+$('#nombre').val()+"&edad="+$('#edad'.val()+"&correo="+$('#correo').val()+"&boton="+$('#boton').val(),
             succes: function(response)
             {
                 $('#info').html(response);
             }
         })
     }
     function mostrar()
     {
         $.ajax
         ({
            type:"POST",
             url: "registrar.php",
             //data:"nombre="+$('#nombre').val()+"&edad="+$('#edad'.val()+"&correo="+$('#correo').val()+"&boton="+$('#boton').val(),
             succes: function(response)
             {
                 $('#resultado').html(response);
             }
         })
    </script>
</head>
<body>
     <h1>Registro</h1>
     <label>Nombre<label>
     <input type="text" id="nombre" value="<? if(isset($nombre)) echo $nombre ?>">
     <label>Edad<label>
     <input type="text" id="edad" value="<? if(isset($edad)) echo $edad ?>">
     <label>Correo<label>
     <input type="correo" id="correo" value="<? if(isset($correo)) echo $correo ?>">
     <button id="boton" onclick="almacenar">Insertar</button>
     <button id="boton1" onclick="mostrar()">Mostrar</button>
     
     <div id="info">
     </div>
     <table>
      <tr>
      <th>ID</th>
      <th>Nombre</th>
      <th>Edad</th>
      <th>Correo</th>
     </tr>
     <tbody id="resultado">
     </tbody>
     </table>
    
     
</body>
</html>