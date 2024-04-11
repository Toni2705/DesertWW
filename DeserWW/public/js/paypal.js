document.addEventListener("DOMContentLoaded", function() {
  // Obtener el valor del precio de inscripción
  let price = parseFloat(document.getElementById("precioInscripcion").value);
paypal.Buttons({
    style:{
        layout: 'horizontal',
        color: 'blue',
        shape: 'pill',
        label: 'pay',
        tagline: false
    },
    createOrder: function(data, actions){
        return actions.order.create({
          purchase_units: [{
            amount:{
                value: price
            }
          }]  
        })
    },
    onCancel: function(data){
      alert("Pago cancelado");
    },
    onApprove: function(data, actions){
      actions.order.capture().then(function(detalles){
        document.getElementById("formularioInscripcion").submit();
        console.log(detalles);
      })

      
    }
}).render('#paypal-button-container');
});