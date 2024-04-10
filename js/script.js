document.getElementById('enviarBoton').addEventListener('click', function(event) {
    event.preventDefault(); // Evita el envío del formulario (si está dentro de uno)
    alert('¡Formulario enviado con éxito!');
});