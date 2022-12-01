<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Siglo XXI</title>
    <link rel="stylesheet" href="../build/css/app.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="shortcut icon" href="src/img/iconoinic.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
    <!--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">-->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>
<body>
    <header>
        
        
        <!--<div class="nav-bg">-->
            <div class="logo">
                <a href="/"><img src="build/img/Logotipo_login_Siglo_XXI_2.png" alt=""></a>
                
                
            </div>
            <nav class="navegacion-principal contenedor"> <!--Menu de navegación-->
                <a id="linkReservacion" href="/reservacion">Reservación</a>
                <a id="linkMenu" target="_blank" href="/menu">Menú</a>
            </nav><!--Fin menu de navegación-->
        

    </header>

    <?php echo $contenido;?>

    <footer class="footer">
        <p class="footer__texto">Restaurant Siglo XXI - Todos los derechos reservados 2022.</p>
    </footer>
    </body>
    <script>
        const btnlinkMenu = document.querySelector('#linkMenu')
        btnlinkMenu.onclick = linkMenu

        function linkMenu() {
        localStorage.removeItem('carrito');
        }
    </script>
</html>

    