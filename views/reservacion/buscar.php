
<div class="informacion">
    <h1>Información antes de cancelar tu reserva</h1><br>
    <h3>* Debes tener una reserva pendiente para cancelar una reserva</h3><br>
    <h3>* Una vez cancelada tu reserva no podrás volver a reservar para la misma fecha</h3><br>
    <h3>* Igualmente puedes <a href="reservacion.php">agendar</a> otra reserva en nuestro restaurante
    </h3>

</div>

<div class='reservacion'>
    <form class="formulario sombra" method="GET" action="/reservacion/eliminar">
        <fieldset>
            <legend>Cancelar Reservación</legend>
            <div class="contenedor-campos">

                <div class="campo">
                    <label>Ingresa tu rut</label>
                    <input class='input-text' type="text" id="rut" name="rut" required oninput="checkRut(this)" placeholder="Ingrese RUT">
                    <script src="../build/js/validarRUT.js"></script>
                </div>
            </div>
            <div class='botoncito'>
                <input class="formulario__submit" type="submit" value="Buscar">
            </div>



        </fieldset>
    </form>
</div>
<?php 
    incluirTemplates('footer');
    ?>