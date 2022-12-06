

<main class="reservacion-main">
    <?php foreach($errores as $error): ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php  endforeach; ?>
        <section class="bienvenida">
            <div class="texto-bienvenida">
            <h1>¡Hola! Bienvenido a <br> nuestro sistema <br> de reservas</h1>
            <p>¿Sabias que con unos pocos clicks puedes reservar una mesa en nuestro restaurant?
                 Sigue bajando y te contamos como hacerlo en unos simples pasos. </p>
                </div>
                 <div class="logo-reserva">
                    <img src="build/img/reservacion.webp" alt="">
                 </div>
        </section>
        <section class="bienvenida">
            <div class="logo-reserva">
                <img src="build/img/he_capitan.webp" alt="">
             </div>
            <div class="texto-bienvenida">
                <h3>¡Puedes reservar una mesa de nuestro restaurant llenando el formulario más abajo!</h3>
                <p>De igual forma puedes <a class='boton-cancel' href="/reservacion/buscar">cancelar</a> tu reserva</p>
            </div>
                 
        </section>
        <hr>

    

        <div class="reservacion">
            
            <form class="formulario sombra"  method="POST"><!--Formulario de reserva-->
                <fieldset>
                    <legend>Reservación</legend>
                    <div class="contenedor-campos">
                        <div class="campo">
                            <label>Nombre</label>
                            <input class="input-text" type="text" name="nombre" placeholder="Introduce tu nombre" value='<?php echo $registro->nombre;?>'>
                        </div>
                        <div class="campo">
                            <label>Apellido</label>
                            <input class="input-text" type="text" name="apellido" placeholder="Introduce tu apellido" value='<?php echo $registro->apellido;?>'>
                        </div>
                        <div class="campo">
                            <label>Rut</label>
                            <input class='input-text' type="text" id="rut" name="rut"  oninput="checkRut(this)" placeholder="Ingrese RUT"  value='<?php echo $registro->rut;?>'>
                            <script src="build/js/validarRUT.js"></script>
                        </div>
                        <div class="campo">
                            <label>Telefono</label>
                            <input class="input-text" type="tel" name="cel" placeholder="Introduce tu numero celular" value='<?php echo $registro->cel;?>'>
                        </div>
                        <div class="campo">
                            <label>Correo</label>
                            <input class="input-text" type="email" name="correo" placeholder="Introduce tu e-mail" value='<?php echo $registro->correo;?>'>
                        </div>
                        <div class="campo">
                            <label>Fecha y hora</label>
                            <input class="input-text" type="datetime-local" name="fecha" placeholder="Introduce una fecha"  min="08:00" max="21:00" require value='<?php echo $registro->fecha;?>'>
                        </div>
                        <div class="campo">
                            <label>Numero de mesa</label>
                            <select name="mesa" class='input-text'>
                                
                                <option value="">-- Seleccione una mesa --</option>
                                <?php foreach ($mesas as $mesa) :?>
                                    <option <?php echo $registro->mesa === $mesa->id_mesa ? 'selected' : '';?> 
                                    value="<?php echo $mesa->id_mesa?>"><?php echo $mesa->numero_mesa ?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                    </div>
                    <div class='botoncito'>
                        <input class="formulario__submit" type="submit" value="Reservar">
                    </div>
                    

                
                </fieldset>
            </form>
      </div>
    </main>
    <script>
        const btnformulario = document.querySelector('.formulario__submit');
        btnformulario.onclick = mostraralerta;

        function mostraralerta () {
            Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Se ha creado la reserva',
            showConfirmButton: false,
            timer: 1500,
            width: '40%',
            padding: '5rem'
            
        })
        
        }
                
    </script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>