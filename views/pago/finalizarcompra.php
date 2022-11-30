
  <main>
  <script src="https://www.paypal.com/sdk/js?client-id=AQ-LTaUYx94pTsJuVjJOlVlPR4hSeEzAzOKEp4NyGh4XKbqMw-ya4Pw2QS7DWqiA_8JerpYp5BIBTWqx&currency=USD"></script>

    

    <div class="contenedor">
      <h1>Finalizar compra</h1>
      <table class="infoFP">
            <thead id='headFP'>
                <tr>
                <th>Nombre Producto</th>
                <th>Precio unitario</th>
                <th>Cantidad</th>
                <th>Cliente</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody id="contenidoFP"></tbody>
        <tfoot>
          <tr id="footerContenido">
            
          </tr>
        </tfoot>
            
      </table>
      <div id="paypal-button-container"></div>
    </div>

    <template id='cardFP'>
        <tr>
            <td id='productoFP'></td>
            <td id='precioFP'></td>
            <td id='cantidadFP'></td>
            <td id='clienteFP'></td>
            <td id='totalFP'></td>
        </tr>
    </template>

    <template id="footerFinalizarPago">
            <th scope="row" colspan="2">Total a pagar</th>
            
            <td>$ <span>5000</span></td>
        </template>
        <!--usuario business: sb-fza6r22329949@business.example.com -->
        <!-- contraseña: romanempire -->

        <!-- usuario: sb-mecqr22411124@personal.example.com -->
        <!-- contraseña: 6_!0tKX7 -->
  
    <script src="build/js/pago.js"></script>
    
  </main>

