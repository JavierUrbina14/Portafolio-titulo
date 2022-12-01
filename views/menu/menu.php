
<body>
    <main class="contenedor">
        <div class="tabla">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Item</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Acción</th>
                    <th scope="col">Total</th>
                  </tr>
                </thead>
                
                <tbody id="items"></tbody>
                <tfoot>
                  <tr id="footer">
                    <th scope="row" colspan="5">Carrito vacío - comience a comprar!</th>
                  </tr>
                </tfoot>
              </table>
        </div>
        <div class="grid" id="contenidojs">
        
        </div>
        

        <template id="template-footer">
            <th scope="row" colspan="2">Total productos</th>
            <td>10</td>
            <td>
                <button class="btn btn-danger btn-sm" id="vaciar-carrito">
                    vaciar todo
                </button>
                
            </td>
            
            
            <td class="font-weight-bold">$ <span>5000</span></td>
            <td>
                
            </td>
            <tr>
            <button class="btn btn-danger btn-sm" id="ordenarCompra">
                    ordenar compra
                </button>
            </tr>
        </template>
        
        <template id="template-carrito">
          <tr>
            <th scope="row">id</th>
            <td>Café</td>
            <td>1</td>
            <td>
                <button class="btn btn-info btn-sm">
                    +
                </button>
                <button class="btn btn-danger btn-sm">
                    -
                </button>
            </td>
            <td>$ <span>500</span></td>
          </tr>
        </template>
        <template id="template-car">
            <div class="productos sombras"><!-- INICIO PRODUCTO -->
                <img class="productos__imagen" src="" alt="">
                <div class="productos__informacion">
                    <h5 class="productos__nombre"></h5>
                    <p class="productso__precio"></p>
                    <input class="formulario__btnsubmenus" type="button" value="Agregar al carrito">   
                </div>
            </div><!-- FIN PRODUCTO-->
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