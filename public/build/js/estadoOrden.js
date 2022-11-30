const templateCardPE = document.querySelector('#cardPE').content;
const contenidoPE = document.querySelector('#contenidoPE')
const fragment = document.createDocumentFragment();


document.addEventListener('DOMContentLoaded', () => {
    obtenerPE();
})

const obtenerPE = () => {
    let pedido = localStorage.getItem('carrito');
    pedido = JSON.parse(pedido);
    //console.log(pedido)
    pintarPE(pedido);
}

const pintarPE = pedido => {
    //iniciar el contenido con los items vacios para no tener problemas
    contenidoPE.innerHTML = ''
    //Tomamos el valor del objeto "carrito" y lo iteramos
    Object.values(pedido).forEach(product => {
        //La informacion se pinta en el html dentro de sus tablas correspondientes
        templateCardPE.querySelector('#titlePE').textContent=product.title
        templateCardPE.querySelector('#cantidadPE').textContent=product.cantidad
        const clone = templateCardPE.cloneNode(true)
        fragment.appendChild(clone)
    })
    contenidoPE.appendChild(fragment)

    const btnSeguirComprando = document.querySelector('#continuar-compra')
    btnSeguirComprando.onclick = SeguirComprando;

    const btnFinalizarCompra = document.querySelector('#finalizar-compra')
    btnFinalizarCompra.onclick = FinalizarCompra;

}
function SeguirComprando() {
    localStorage.removeItem('carrito');
    location.href = ('/menu')
    
}
function FinalizarCompra() {
    location.href = ('/pago')
}
