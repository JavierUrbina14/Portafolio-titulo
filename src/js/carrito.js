
const templateCard = document.querySelector('#template-card').content;
const templateFooter = document.querySelector('#template-footer').content;
const templateCarrito = document.querySelector('#template-carrito').content;
const items = document.querySelector('#items')
const contenido = document.querySelector('#contenidojs');
const footer = document.querySelector('#footer')
const fragment = document.createDocumentFragment();
let carrito = {};
/*
if (activarFuncion) {
    activarFuncion.addEventListener("click", procesarPedido);
  }*/

document.addEventListener('DOMContentLoaded', () => {
    fetchData();
    if(localStorage.getItem('carrito')){
        carrito = JSON.parse (localStorage.getItem('carrito'))
        pintarCarrito()
    }
})

contenido.addEventListener('click', e => {
    addCarrito(e)
})

items.addEventListener('click', e => {
    btnAccion(e)
})



const fetchData = async () => {
    try {

        const url = 'http://localhost:3000/api/productos';
        const res = await fetch(url);
        const data = await res.json();
        //console.log(data);
        alterarFormulario(data)
    } catch (error) {
        console.log(error)
    }
}

const alterarFormulario = data =>{
    data.forEach(producto => {
        templateCard.querySelector('.producto__nombre').textContent = producto.nombre_producto
        templateCard.querySelector('.producto__precio').textContent = producto.precio_producto
        templateCard.querySelector('.producto__imagen').setAttribute("src", producto.imagen_producto)
        templateCard.querySelector('.formulario__btnsubmenu').dataset.id = producto.id_producto
        const clone = templateCard.cloneNode(true)
        fragment.appendChild(clone)
    });
    contenido.appendChild(fragment)
}

const addCarrito = e => {
    //console.log(e.target)
    //console.log(e.target.classList.contains('formulario__btnsubmenu'))
    if (e.target.classList.contains('formulario__btnsubmenu')){
        setCarrito(e.target.parentElement)
    }
    e.stopPropagation()
}

const setCarrito = objeto => {
    const product = {
        id: objeto.querySelector('.formulario__btnsubmenu').dataset.id,
        title: objeto.querySelector('.producto__nombre').textContent,
        precio: objeto.querySelector('.producto__precio').textContent,
        cantidad: 1
    }

    if(carrito.hasOwnProperty(product.id)){
        product.cantidad = carrito[product.id].cantidad + 1
    }

    carrito[product.id] = {...product}
    pintarCarrito()
}

const pintarCarrito = () => {
    //console.log(carrito)
    items.innerHTML = ''
    Object.values(carrito).forEach(product => {
        templateCarrito.querySelector('th').textContent = product.id
        templateCarrito.querySelectorAll('td')[0].textContent = product.title
        templateCarrito.querySelectorAll('td')[1].textContent = product.cantidad
        templateCarrito.querySelector('.btn-info').dataset.id = product.id
        templateCarrito.querySelector('.btn-danger').dataset.id = product.id
        templateCarrito.querySelector('span').textContent = product.cantidad * product.precio

        const clone = templateCarrito.cloneNode(true)
        fragment.appendChild(clone)
    })
    items.appendChild(fragment)

    pintarFooter()

    localStorage.setItem('carrito', JSON.stringify(carrito))
}

const pintarFooter = () =>{
    footer.innerHTML= ''
    if(Object.keys(carrito).length === 0) {
        footer.innerHTML = `<th scope="row" colspan="5">Carrito vacío - comience a comprar!</th>`
        return
    }
    const nCantidad = Object.values(carrito).reduce((acc, {cantidad}) => acc + cantidad,0)
    const nPrecio = Object.values(carrito).reduce((acc,{cantidad, precio}) => acc + cantidad*precio,0)
    
    templateFooter.querySelectorAll('td')[0].textContent = nCantidad
    templateFooter.querySelector('span').textContent = nPrecio

    const clone = templateFooter.cloneNode(true)
    fragment.appendChild(clone)
    footer.appendChild(fragment)

    const btnVaciar = document.querySelector('#vaciar-carrito')
    btnVaciar.addEventListener('click', () => {
        carrito = {}
        pintarCarrito()
    })

    const btnOrdenar = document.querySelector('#ordenarCompra')
    btnOrdenar.addEventListener('click', () => {
        location.href = "pedidoExitoso.html";
        //procesarPedido();
    })

    //console.log(carrito)

}



const btnAccion = e => {
    if (e.target.classList.contains('btn-info')) {
        const producto = carrito[e.target.dataset.id]
        producto.cantidad = carrito[e.target.dataset.id].cantidad + 1
        carrito[e.target.dataset.id] = {...producto}
        pintarCarrito()
    }
    if (e.target.classList.contains('btn-danger')) {
        const producto = carrito[e.target.dataset.id]
        producto.cantidad = carrito[e.target.dataset.id].cantidad - 1
        if (producto.cantidad === 0) {
            delete carrito[e.target.dataset.id]
        }
        pintarCarrito()
    }
    e.stopPropagation()
}
/*
const procesarPedido = () =>{
    Object.values(carrito).forEach(product => {
        templateNewcar.querySelector('.productos__nombre').textContent = product.title

        const clone = templateNewcar.cloneNode(true)
        fragment.appendChild(clone)
    });
    contenidoNC.appendChild(fragment)
}*/

