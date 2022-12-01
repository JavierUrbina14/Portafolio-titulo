<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="build/css/app.css">
    <title>Totem</title>
</head>
<body class='body-totem'>
    <main>

    <?php foreach($errores as $error): ?>
    <div class="alerta-totem">
        <?php echo $error; ?>
    </div>
    <?php  endforeach; ?>
    
    
   
    
    
        
    <div class='contenedor-totem'>
        
        <form class="formulario-totem" method="POST" action="">
        <fieldset class='sombra'>
            <legend>¡Bienvenido!</legend>
            <div class="contenedor-campos">

                <div class="campo-totem">
                    <div>
                    <input class='input-totem' type="text" id="rut" name="rut" required oninput="checkRut(this)" placeholder="Ingrese RUT" value='<?php echo $ingresototem->rut ?>'>
                    </div>
                    <div>
                    <input class="input-totem" type="email" name="correo" placeholder='Ingrese Correo' value='<?php echo $ingresototem->correo ?>'>
                    </div>
                    <script src="build/js/validarRUT.js"></script>
                </div>
            </div>
            <div class='botoncito-totem'>
                <input class="formulario__submit__totem" type="submit" value="Ingresar">
            </div>
        </fieldset>
    </form>
    </div>
 
    </main>
</body>
</html>