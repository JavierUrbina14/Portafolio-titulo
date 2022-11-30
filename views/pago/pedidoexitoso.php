<main>

    <div class="contenedorPE">
        <div class="pedidoexitoso">
            <h1>Su pedido fue exitoso!</h1>
            <h5>Usted ha ordenado:</h5>
        </div>
        <table class="infoPE">
            <thead id='headPE'>
                <tr>
                <th>Nombre Producto</th>
                <th>Cantidad</th>
            </tr>
        </thead>
        <tbody id="contenidoPE"></tbody>
            
        </table>
        <div class="accionespedido">
            <button id='continuar-compra'>
                Seguir comprando
            </button>
            <button id='finalizar-compra'>
                Pasar a finalizar compra
            </button>
        </div>
    </div>
    <template id='cardPE'>
        <tr>
            <td id='titlePE'>Empanadas de horno</td>
            <td id='cantidadPE'>2</td>
        </tr>
        
    </template>
    
    <script src="build/js/estadoOrden.js"></script>

</main>