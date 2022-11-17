

    <div class='elimination-info'>
        <div class='info-title-eli'>
            <h1>¡Antes de eliminar considera lo siguiente!</h1>
        </div>
        <div class="info-dev-eli">
            <h3>* Una vez presionado el boton se eliminara tu registro.</h3>
            <h3>* Solamente puedes borrar una reservacion a la vez.</h3>
            <h3>* Tras presionar el boton de eliminar, serás redirecionado a la pagina principal.</h3>
            <h3>* Si quieres volver a eliminar otra reserva, vuelve a repetir el proces.o</h3>
            <h3>* Si la tabla de informacion está vacia, es por que no existe ningun registro asociado a tu rut.</h3>

        </div>

    </div>
    <table class='elimination-table'>
    
        <tr class='elimination-title'>
            <td>Cliente</td>
            <td>Rut del cliente</td>
            <td>Telefono</td>
            <td>Correo</td>
            <td>Hora de la reserva</td>
        </tr>
        <?php foreach($llamado as $key): ?>
        <tr class='elimination-get'>
            <td><?php echo $key->Cliente ?></td>
            <td><?php echo $key->rut_cliente ?></td>
            <td><?php echo $key->telefono_cliente ?></td>
            <td><?php echo $key->correo_cliente ?></td>
            <td><?php echo $key->fecha_hora_reserva ?></td>
            <td>
                <form method="POST">
                    <input type="hidden" name='idreserva' value='<?php echo $key->id_reserva ?>'>
                    <input class='elimination-btn' type="submit" value='eliminar'>
                </form>
            </td>
        </tr>
        <?php endforeach ?>
    </table>
    <?php incluirTemplates('footer'); ?>