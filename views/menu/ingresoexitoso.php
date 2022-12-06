<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Siglo XXI</title>
    <link rel="shortcut icon" href="src/img/iconoinic.png" type="image/x-icon">
    <link rel="stylesheet" href="build/css/app.css">
</head>
<body class="ingresoexbody">
    <div class="text-ingresoex-contenedor sombra">
        
        <h1 class='text-ingresoex'>¡Disfrute de su estadía con nosotros!</h1>
        <?php foreach ($mesaobtenida as $mesa) :?>
        <h1 class='text-ingresoex'>Su mesa es la numero: <span><?php echo $mesa->numero_mesa ?></span>  </h1>
        <?php endforeach;?>

    </div>
    <script>

                function r(){
                    location.href= "/"
                }
                setTimeout("r()",7000);


            </script>
</body>
</html>