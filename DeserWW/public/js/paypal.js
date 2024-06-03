document.addEventListener("DOMContentLoaded", function() {
  // Obtener el valor del precio de inscripción
  let price = parseFloat(document.getElementById("precioInscripcion").textContent);
  let price1 = document.getElementById("precioInscripcion").value;
  console.log(price1);
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
    onApprove: function(data, actions) {
      let precioTotal = parseFloat(document.getElementById("precioInscripcion").textContent);
      let precio = document.getElementById("precio").textContent;
      let carreraId = document.getElementById("carreraId").textContent;
      let corredorId = document.getElementById("corredorId").textContent;
      let seguroId = document.getElementById("seguroId").textContent;
      let csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

      actions.order.capture().then(function(detalles) {
          // Enviar los datos a la función inscribirse mediante AJAX
          let datos = {
              carreraId: carreraId,
              corredorId: corredorId,
              seguroId: seguroId,
              precioTotal: precioTotal,
              precio: precio
          };
  
          // Realizar la solicitud AJAX
          fetch('/inscribirse', {
              method: 'POST',
              headers: {
                  'Content-Type': 'application/json',
                  'X-CSRF-TOKEN': csrfToken
              },
              body: JSON.stringify(datos)
          }).then(function(response) {
              if (response.ok) {
                document.getElementById("pdf").disabled = false;
                document.getElementById("paypal-button-container").style.display = 'none';
                  return response.json();
              }
              throw new Error('Error en la solicitud AJAX');
          }).then(function(data) {
              
              console.log(data);
          }).catch(function(error) {
              console.error('Error:', error);
          });
      });
  }
  
  
}).render('#paypal-button-container');
});