const templateCardFP = document.querySelector('#cardFP').content;
const templateFooterFP = document.querySelector('#footerFinalizarPago').content;
const contenidoFP = document.querySelector('#contenidoFP')
const FooterFP = document.querySelector('#footerContenido')
const fragment = document.createDocumentFragment();


document.addEventListener('DOMContentLoaded', () => {
    fetchData();
})

const fetchData = async () => {
    try {
        //Declaramos la variable donde se encuentra la url de la api
        const url = 'http://localhost:3000/api/pago';
        //Consultamos la api y traemos los datos
        const res = await fetch(url);
        //Convertimos la informacion a json
        const data = await res.json();
        //Llamamos a la función 'alterarformulario' y le pasamos la informacion
        //console.log(data)
        mostrarCuenta(data)

    } catch (error) {
        //En caso que exista un error, lo arrojamos por la consola
        console.log(error)
    }
}

const mostrarCuenta = data =>{
    //iniciar el contenido con los items vacios para no tener problemas
    contenidoFP.innerHTML = ''
    //Tomamos el valor del objeto "carrito" y lo iteramos
    Object.values(data).forEach(product => {
        //La informacion se pinta en el html dentro de sus tablas correspondientes
        templateCardFP.querySelector('#productoFP').textContent=product.producto
        templateCardFP.querySelector('#precioFP').textContent=product.precio_unitario
        templateCardFP.querySelector('#cantidadFP').textContent=product.cantidad
        templateCardFP.querySelector('#mesaFP').textContent=product.mesa
        templateCardFP.querySelector('#clienteFP').textContent=product.cliente
        templateCardFP.querySelector('#totalFP').textContent=product.total



        const clone = templateCardFP.cloneNode(true)
        fragment.appendChild(clone)
    })
    contenidoFP.appendChild(fragment)
    mostrarFooter(data)

}

const mostrarFooter = data => {
    
    FooterFP.innerHTML= ''
    const nPrecio = Object.values(data).reduce((acc,{cantidad, precio_unitario}) => acc + cantidad*precio_unitario,0)
    //console.log('nPrecio: ' + nPrecio)
    
    
    templateFooterFP.querySelector('span').textContent = nPrecio

    //Una vez más clonamos el nodo
    const clone = templateFooterFP.cloneNode(true)
    //Lo asignamos al fragment
    fragment.appendChild(clone)
    //y lo añadimos al template con el fragment
    FooterFP.appendChild(fragment)
    paypalpago(nPrecio)
}


const paypalpago = nPrecio => {
  

    paypal.Buttons({
        // Sets up the transaction when a payment button is clicked
        createOrder: (data, actions) => {
          return actions.order.create({
            purchase_units: [{
              amount: {
                value: nPrecio // Can also reference a variable or function
              }
            }]
          });
        },
        // Finalize the transaction after payer approval
        onApprove: (data, actions) => {
          return actions.order.capture().then(async function(orderData) {
            // Successful capture! For dev/demo purposes:
            //console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
            const transaction = orderData.purchase_units[0].payments.captures[0];
            const venta = new FormData()
            venta.append('clavetransaccion',transaction.id)
            venta.append('total_newventa',nPrecio)
            venta.append('estado_newventa',transaction.status)
            //alert(`Transaction ${transaction.status}: ${transaction.id} \n\nSee console for all available details`);
            
            const url = 'http://localhost:3000/api/pagopaypal'
            const respuesta = await fetch(url, {
            method: 'POST',
            body: venta
            })
            
            const resultado = await respuesta.json();
            await actions.redirect('http://localhost:3000/pagado');
            
            
            // When ready to go live, remove the alert and show a success message within this page. For example:
            // const element = document.getElementById('paypal-button-container');
            // element.innerHTML = '<h3>Thank you for your payment!</h3>';
            // Or go to another URL:  actions.redirect('thank_you.html');
          });
        }
      }).render('#paypal-button-container');

      location.href('/pagado')
}

