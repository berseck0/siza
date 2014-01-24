<script type="text/javascript">
    <!--
         $().ready(function() {
        $("#unFormulario").validate({
        rules: {
        titulo: {
        required: true,
        maxlength: 50,
        minlength: 5
        },
        email: {
            required: true,
            email: true
        },
        telefono: {
            required: false,
            number: true,
            minlength: 6,
            maxlength: 9
        },
        comentarios: {
        required: true,
        maxlength: 1000,
        minlength: 10
        }
        }
        });
         });
    // -->
    </script> 

<head>
    <script type='text/javascript' src='js/jquery.js'></script>
    <script type='text/javascript' src='js/jquery.validate.js'></script>
    <script type='text/javascript' src='js/misFunciones.js'></script>
</head> 
<form action='' method='post' id='unFormulario' name='unFormulario'>
     <table>
          <tr>
            <td>Nombre*</td>
            <td> <input id='titulo' class='required' maxlength='50' name='titulo' size='60'></td>
          </tr>
          <tr>
            <td>e-Mail*</td>
            <td> <input id='email' class='required email' maxlength='70' name='email' size='60'></td>
          </tr>
          <tr>
            <td>Telfono contacto<br>
            </td>
            <td> <input id='telefono' class='required' maxlength='9' name='telefono' size='60'>
            </td>
          </tr>
          <tr>
            <td>Comentarios*</td>
            <td><textarea id='comentarios' class='required' cols='50' rows='5' name='comentarios' onkeydown='javascript:cuentaCaracteres();' onkeyup='javascript:cuentaCaracteres();' > 
