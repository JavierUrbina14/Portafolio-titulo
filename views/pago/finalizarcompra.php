
  <main>
  <script src="https://www.paypal.com/sdk/js?client-id=AQ-LTaUYx94pTsJuVjJOlVlPR4hSeEzAzOKEp4NyGh4XKbqMw-ya4Pw2QS7DWqiA_8JerpYp5BIBTWqx&currency=USD"></script>

    
  <h1 class='titulo-finalizarpago'>Finalizar compra</h1>
    <div class="contenedor-pago">
      
      <div class="informacion-total-pago">
      
      <table class="infoFP">
            <thead id='headFP'>
                <tr>
                <th class='th-Nombre'>Nombre Producto</th>
                <th class='th-Precio'>Precio unitario</th>
                <th class='th-Cantidad'>Cantidad</th>
                <th class='th-Cantidad'>Mesa</th>
                <th class='th-Cliente'>Cliente</th>
                <th class='th-Total'>Total</th>
            </tr>
        </thead>
        <tbody id="contenidoFP"></tbody>
        <tfoot class='footerContenido'>
          <tr id="footerContenido">
            
          </tr>
        </tfoot>
            
      </table>
      </div>
      <div id="paypal-button-container">
        <h1>Seleccione el metodo de pago</h1>
        <button class='btn-pago-efectivo'>Pagar con efectivo</button>
      </div>
      
 
    </div>

    <template id='cardFP'>
        <tr>
            <td id='productoFP'></td>
            <td id='precioFP'></td>
            <td id='cantidadFP' class='contenidoFPcentro'></td>
            <td id='mesaFP' class=''></td>
            <td id='clienteFP'></td>
            <td id='totalFP' class='contenidoFPcentro'></td>
        </tr>
    </template>

    <template id="footerFinalizarPago">
            <th></th>
            <th></th>
            <th class='footerFinalizarPago'scope="row" colspan="2">Total a pagar</th>
            
            <td>$ <span>5000</span></td>
        </template>
        <!--usuario business: sb-fza6r22329949@business.example.com -->
        <!-- contraseña: romanempire -->

        <!-- usuario: sb-mecqr22411124@personal.example.com -->
        <!-- contraseña: 6_!0tKX7 -->
  
    <script src="build/js/pago.js"></script>
    
  </main>

