
<body>
    <main class="contenedor">
        <div class="categoria-comida-title">
            <h1>Categorias</h1>
            <div class="categoria-comida">
                <a id="especialidades-a" href="#especialidades">Especialidades</a>
                <a id="agregados-a" href="#agregados">Agregados</a>
                <a id="ensaladas-a" href="#ensaladas">Ensaladas</a>
                <a id="delicias-pueblo-a" href="#delicias-pueblo">Delicias del pueblo</a>
                <a id="postres-caseros-a" href="#postres-caseros">Postres caseros y otros</a>
                <a id="aperitivos-a" href="#aperitivos">Aperitivos</a>
                <a id="" href="#tragos">Tragos</a>
                <a id="" href="#bajativos">Bajativos</a>
                <a id="" href="#vinos">Vinos</a>
            </div>
        </div>
        <!-- The Modal -->
        <div id="myModal" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Carrito</h2>
            <table class='carrito'>
                <thead>
                    <th scope="col">Producto</th>
                    <th scope="col">Acción</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Precio</th>
                </thead>
                <tbody id="items"></tbody>
                <tfoot>
                <tr id="footer">
                    <th scope="row" colspan="5">Carrito vacío - comience a comprar!</th>
                </tr>
            </tfoot>                
            </table>
            <div class="accionfinal"></div>
            
        </div>

        </div>
        <div class="grid separaciones-prod" id="contenidojs">
        </div>
        <div class="separaciones-prod" ><h1>Especialidades</h1></div>
        <div class="grid" id="especialidades">
        </div>
        <div class="separaciones-prod" ><h1>Agregados</h1></div>
        <div class="grid" id="agregados">
        </div>
        <div class="separaciones-prod" ><h1>Ensaladas</h1></div>
        <div class="grid" id="ensaladas">
        </div>
        <div class="separaciones-prod" ><h1>Delicias del pueblo</h1></div>
        <div class="grid" id="delicias-pueblo">
        </div>
        <div class="separaciones-prod" ><h1>Postres caseros y otros</h1></div>
        <div class="grid" id="postres-caseros">
        </div>
        <div class="separaciones-prod" ><h1>Aperitivos</h1></div>
        <div class="grid" id="aperitivos">
        </div>
        <div class="separaciones-prod" ><h1>Tragos</h1></div>
        <div class="grid" id="tragos">
        </div>
        <div class="separaciones-prod" ><h1>Bajativos</h1></div>
        <div class="grid" id="bajativos">
        </div>
        <div class="separaciones-prod" ><h1>Vinos</h1></div>
        <div class="grid" id="vinos">
        </div> 
        
        

        <template id="template-footer">
            <th scope="row" colspan="2">Total productos</th>
            <td>10</td>
            <td class="font-weight-bold">$ <span>5000</span></td>
            
        </template>

        <template id='template-accionfinal'>
            <button class="btn btn-danger btn-sm" id="vaciar-carrito">vaciar todo</button>
            <button class="btn btn-danger btn-sm" id="ordenarCompra">ordenar compra</button>
        </template>

        <template id="template-carrito">
            <tr>
                <td id='title'>Café</td>
                <td>
                    <button class="btn btn-info btn-sm">
                        +
                    </button>
                    <button class="btn btn-danger btn-sm">
                        -
                    </button>
                </td>
                <td class="cantidad-id">1</td>
                <td>$ <span>500</span></td>
            </tr>
        </template>
        <template id="template-card">
            <div class="producto sombra"><!-- INICIO PRODUCTO -->
                <img class="producto__imagen" src="" alt="">
                <div class="producto__informacion">
                    <h5 class="producto__nombre"></h5>
                    <p class="producto__precio"></p>
                    <input class="formulario__btnsubmenu" type="button" value="Agregar al carrito">   
                </div>
            </div><!-- FIN PRODUCTO-->
        </template> 
        
    </main>
    <script src="build/js/carrito.js"></script>
</body>
</html>