
//Creacion de las variables que tendran acceso al HTML
const templateCard = document.querySelector('#template-card').content;
const templateFooter = document.querySelector('#template-footer').content;
const templateCarrito = document.querySelector('#template-carrito').content;
const templateAccionFinal = document.querySelector('#template-accionfinal').content;
const accionFinal = document.querySelector('.accionfinal')
const especialidades = document.querySelector('#especialidades')
const agregados = document.querySelector('#agregados')
const ensaladas = document.querySelector('#ensaladas')
const deliciasPueblo = document.querySelector('#delicias-pueblo')
const postresCaseros = document.querySelector('#postres-caseros')
const aperitivos = document.querySelector('#aperitivos')
const tragos = document.querySelector('#tragos')
const bajativos = document.querySelector('#bajativos')
const vinos = document.querySelector('#vinos')
const contenido = document.querySelector('#contenidojs');
const footer = document.querySelector('#footer')
const navegacion = document.querySelector('.navegacion-principal');

//Se crea un fragment que es una memoria volatíl para evitar el reflow
const fragment = document.createDocumentFragment();

//Creamos una variable para el carrito
let carrito = {}

//Iniciamos el proceso DOM
document.addEventListener('DOMContentLoaded', () => {
    //Ejecutamos la función que traera toda la información
    iniciarApp();

    //Guardamos y mantenemos la informacion dentro del local storage
    if(localStorage.getItem('carrito')){
        //Almacenamos los valores de 'carrito' en la variable carrito
        carrito = JSON.parse (localStorage.getItem('carrito'))
        //pintamos el carrito con la información
        pintarCarrito()
    }
})

function iniciarApp() {
    fetchData();
    scrollNav();
}
//Evento para añadir al carrito
especialidades.addEventListener('click', e => {
    addCarrito(e)
})
agregados.addEventListener('click', e => {
    addCarrito(e)
})
ensaladas.addEventListener('click', e => {
    addCarrito(e)
})
deliciasPueblo.addEventListener('click', e => {
    addCarrito(e)
})
postresCaseros.addEventListener('click', e => {
    addCarrito(e)
})
aperitivos.addEventListener('click', e => {
    addCarrito(e)
})
tragos.addEventListener('click', e => {
    addCarrito(e)
})
bajativos.addEventListener('click', e => {
    addCarrito(e)
})
vinos.addEventListener('click', e => {
    addCarrito(e)
})
//Evento para disminuir o aumentar la cantidad de los productos
items.addEventListener('click', e => {
    btnAccion(e)
})

//Creamos la variable fetchData que será una función asincronica para traer
//la información de la base de datos
const fetchData = async () => {
    try {
        //Declaramos la variable donde se encuentra la url de la api
        const url = 'http://localhost:3000/api/productos';
        //Consultamos la api y traemos los datos
        const res = await fetch(url);
        //Convertimos la informacion a json
        const data = await res.json();
        //Llamamos a la función 'alterarformulario' y le pasamos la informacion
        alterarFormulario(data)

    } catch (error) {
        //En caso que exista un error, lo arrojamos por la consola
        console.log(error)
    }
}

const alterarFormulario = data =>{
    //Recorremos la informacion extraida de la api
    
        data.forEach(producto => {
            templateCard.querySelector('.producto__nombre').textContent = producto.nombre_producto
            templateCard.querySelector('.producto__nombre').dataset.id = producto.tipoproducto_id
            templateCard.querySelector('.producto__precio').textContent = producto.precio_producto
            templateCard.querySelector('.producto__imagen').setAttribute("src", producto.imagen_producto)
            templateCard.querySelector('.formulario__btnsubmenu').dataset.id = producto.id_producto
            switch(templateCard.querySelector('.producto__nombre').dataset.id){
                case "1":
                    const especialidades_prod = templateCard.cloneNode(true)
                    fragment.appendChild(especialidades_prod)
                    especialidades.appendChild(fragment)
                    break;
                case "2":
                    const agregados_prod = templateCard.cloneNode(true)
                    fragment.appendChild(agregados_prod)
                    agregados.appendChild(fragment)
                    break;
                case "3":
                    const ensaladas_prod = templateCard.cloneNode(true)
                    fragment.appendChild(ensaladas_prod)
                    ensaladas.appendChild(fragment)
                    break;
                case "4":
                    const deliciasPueblo_prod = templateCard.cloneNode(true)
                    fragment.appendChild(deliciasPueblo_prod)
                    deliciasPueblo.appendChild(fragment)
                    break;
                case "5":
                    const postresCaseros_prod = templateCard.cloneNode(true)
                    fragment.appendChild(postresCaseros_prod)
                    postresCaseros.appendChild(fragment)
                    break;
                case "6":
                    const aperitivos_prod = templateCard.cloneNode(true)
                    fragment.appendChild(aperitivos_prod)
                    aperitivos.appendChild(fragment)
                    break;
                case "7":
                    const tragos_prod = templateCard.cloneNode(true)
                    fragment.appendChild(tragos_prod)
                    tragos.appendChild(fragment)
                    break;
                case "8":
                    const bajativos_prod = templateCard.cloneNode(true)
                    fragment.appendChild(bajativos_prod)
                    bajativos.appendChild(fragment)
                    break;
                case "9":
                    const vinos_prod = templateCard.cloneNode(true)
                    fragment.appendChild(vinos_prod)
                    vinos.appendChild(fragment)
                    break;
            }
            
            
            })
        
    }


const addCarrito = e => {
    //Tomamos la informacion del boton con la id_producto
    console.log(e.target)
    if (e.target.classList.contains('formulario__btnsubmenu')){
        //lo enviamos a la funcion que leera la informacion
        setCarrito(e.target.parentElement)
    }
    e.stopPropagation()
}

const setCarrito = objeto => {
    //Creamos una variable que tendra llaves con su respectivo valor
    const product = {
        id: objeto.querySelector('.formulario__btnsubmenu').dataset.id,
        title: objeto.querySelector('.producto__nombre').textContent,
        precio: objeto.querySelector('.producto__precio').textContent,
        tipoproducto: objeto.querySelector('.producto__nombre').dataset.id,
        //la cantidad se iniciara en 1
        cantidad: 1
    }
    //Si en el carrito ya existe un producto con su id
    if(carrito.hasOwnProperty(product.id)){
        //la cantidad se agregara 1 valor por cada vez que se clickee el boton de "Añadir al carrito"
        product.cantidad = carrito[product.id].cantidad + 1
    }
    //Tomamos la informacion que tiene el carrito por su id
    carrito[product.id] = {...product}
    console.log(carrito)
    //Y lo pintamos
    pintarCarrito()
}

const pintarCarrito = () => {
    //Pintar carrito contara con los items vacios para no tener problemas
    items.innerHTML = ''

    
    //Tomamos el valor del objeto "carrito" y lo iteramos
    Object.values(carrito).forEach(product => {
        
        //La informacion se pinta en el html dentro de sus tablas correspondientes
        templateCarrito.querySelectorAll('td')[0].textContent = product.title
        templateCarrito.querySelectorAll('td')[0].dataset.id = product.tipoproducto
        templateCarrito.querySelectorAll('td')[2].textContent = product.cantidad
        templateCarrito.querySelector('.btn-info').dataset.id = product.id
        templateCarrito.querySelector('.btn-danger').dataset.id = product.id
        templateCarrito.querySelector('span').textContent = product.cantidad * product.precio
        //una vez más clonamos el nodo
        const clone = templateCarrito.cloneNode(true)
        //lo añadimos al fragment para evitar el reflow
        fragment.appendChild(clone)
    })
    //y los contenidos que almacena el fragment se lo pasa al query selector de items para pintarlos
    items.appendChild(fragment);

    console.log(carrito)


    // switch(tipoproducto){
    //     case '1':
    //         especialidades.appendChild(fragment)
    //         break;
    //     case '2':
    //         agregados.appendChild(fragment)
    //         break;
    //     case '3':
    //         ensaladas.appendChild(fragment)
    //         break;
    //     case '4':
    //         deliciasPueblo.appendChild(fragment)
    //         break;
    //     case '5':
    //         postresCaseros.appendChild(fragment)
    //         break;
    //     case '6':
    //         aperitivos.appendChild(fragment)
    //         break;
    //     case '7':
    //         tragos.appendChild(fragment)
    //         break;
    //     case '8':
    //         bajativos.appendChild(fragment)
    //         break;
    //     case '9':
    //         vinos.appendChild(fragment)
    //         break;
    // }

    //llamamos a la funcion para ver los resultados totales
    pintarFooter()

    //Creamos la informacion y la almacenamos en el localStorage con la llave "carrito"
    localStorage.setItem('carrito', JSON.stringify(carrito))
}

const pintarFooter = () =>{
    //iniciamos el queryselector vacio para evitar problemas
    footer.innerHTML= ''
    accionFinal.innerHTML=''
    //Si el carrito esta vacio...
    if(Object.keys(carrito).length === 0) {
        //añadimos codigo html que hacer visible que el carrito esta vacio
        footer.innerHTML = `<th scope="row" colspan="5">Carrito vacío - comience a comprar!</th>`
        return
    }

    //Contamos la cantidad y el precio final
    const nCantidad = Object.values(carrito).reduce((acc, {cantidad}) => acc + cantidad,0)
    const nPrecio = Object.values(carrito).reduce((acc,{cantidad, precio}) => acc + cantidad*precio,0)
    
    //Lo añadimos al footer del carrito
    templateFooter.querySelectorAll('td')[0].textContent = nCantidad
    templateFooter.querySelector('span').textContent = nPrecio


    //Una vez más clonamos el nodo
    const clone = templateFooter.cloneNode(true)
    //Lo asignamos al fragment
    fragment.appendChild(clone)
    //y lo añadimos al template con el fragment
    footer.appendChild(fragment)

    accionFinal.innerHTML='<button class="btn btn-danger btn-sm" id="vaciar-carrito">vaciar todo</button><button class="btn btn-danger btn-sm" id="ordenarCompra">ordenar compra</button>'

    const btnVaciar = document.querySelector('#vaciar-carrito')
    //A travez de un evento, vaciamos el carrito y lo pintamos
    btnVaciar.addEventListener('click', () => {
        carrito = {}
        pintarCarrito()
    })

    //Creamos un query selector para el boton de ordenar
    const btnOrdenar = document.querySelector('#ordenarCompra')
    //Le asignamos la función de ordenar pedido al boton
    btnOrdenar.onclick = ordenarPedido;



    //Creamos una variable que tendra un queryselector de un boton para vaciar el carrito
    

}

// const btnVaciar = document.querySelector('#vaciar-carrito')
//     //A travez de un evento, vaciamos el carrito y lo pintamos
//     btnVaciar.addEventListener('click', () => {
//         carrito = {}
//         pintarCarrito()
//     })

//     //Creamos un query selector para el boton de ordenar
//     const btnOrdenar = document.querySelector('#ordenarCompra')
//     //Le asignamos la función de ordenar pedido al boton
//     btnOrdenar.onclick = ordenarPedido;

function ordenarPedido() { 
    //Creo el form data
    const orden = new FormData();
    
    //Descargo la informacion que tiene local Storage y la transformo
    let pedido = localStorage.getItem('carrito');
    pedido = JSON.parse(pedido);
    
    //Iteramos la informacion 
    Object.values(pedido).forEach(async(producto) => {
        
        //Desestructuramos la variable productos
        let { id, title, precio, cantidad } = producto;

        //Y lo añadimos al formdatoa
        orden.append('producto_id',id)
        orden.append('cantidad_carrito',cantidad)
        orden.append('reserva_id','3')

        //console.log([...orden])
        
        //Enviamos la información a la api
        const url = 'http://localhost:3000/api/orden'
        const respuesta = await fetch(url, {
        method: 'POST',
        body: orden
        })
        const resultado = await respuesta.json();
        return
    })
    location.href = ('/pedidoexitoso')    
    
}

//Declaramos los eventos para aumentar y disminuir la cantidad
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

navegacion.innerHTML= '<a id="linkReservacion" href="/reservacion">Reservación</a><a id="linkMenu" href="/menu">Menú</a><a id="myBtn"><img class="carritoItem" src="build/img/carrito.png" alt=""></a>'
var modal = document.getElementById("myModal");
var btn = document.getElementById("myBtn");
var span = document.getElementsByClassName("close")[0];
btn.onclick = function() {
    modal.style.display = "block";
}
span.onclick = function() {
    modal.style.display = "none";
}
window.onclick = function(event) {
    if (event.target == modal) {
    modal.style.display = "none";
    }
}

function scrollNav() {
    const enlaces = document.querySelectorAll('.categoria-comida a')
    enlaces.forEach(enlace => {
        enlace.addEventListener('click', (e) => {
            e.preventDefault();

            const seccionScroll = e.target.attributes.href.value;
            const seccion = document.querySelector(seccionScroll);
            seccion.scrollIntoView({ behavior: "smooth" });
        })

    })
}
