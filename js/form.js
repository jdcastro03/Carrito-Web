document.addEventListener('DOMContentLoaded', function() {
    var formulario = document.querySelector('.formulario');
    var nombreInput = document.getElementById('nombreInput');
    var edadInput = document.getElementById('edadInput');
    var emailInput = document.querySelector('input[type="email"]');
    var usuarioInput = document.querySelector('input[placeholder="Usuario"]');
    var passwordInput = document.querySelector('input[placeholder="Contraseña"]');
    var alertsDiv = document.querySelector('.alerts');
    var confirmarContraseñaInput = document.querySelector('input[placeholder="Confirmar Contraseña"]');
    var limpiarBoton = document.querySelector('.botones input[type="reset"]');

    formulario.addEventListener('submit', function(event) {
        // Limpiar mensajes de error previos
        alertsDiv.innerHTML = '';

        // Validación del campo de nombre
        var nombre = nombreInput.value.trim();
        if (nombre === '') {
            nombreInput.classList.add('invalid-input');
            alertsDiv.innerHTML += '<div class="error-message"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-alert-circle" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ff2825" fill="none" stroke-linecap="round" stroke-linejoin="round" style="vertical-align: middle;"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" /><path d="M12 8v4" /><path d="M12 16h.01" /></svg><span style="vertical-align: middle;"> El nombre es obligatorio</span> <i class="fas fa-times-circle" style="vertical-align: middle;"></i></div>';
            event.preventDefault();
        } else {
            var regexNombre = /^[a-zA-Z\s]*$/;
            if (!regexNombre.test(nombre)) {
                nombreInput.classList.add('invalid-input');
                alertsDiv.innerHTML += '<div class="error-message"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-alert-circle" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ff2825" fill="none" stroke-linecap="round" stroke-linejoin="round" style="vertical-align: middle;"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" /><path d="M12 8v4" /><path d="M12 16h.01" /></svg><span style="vertical-align: middle;"> El nombre solo debe contener letras y espacios</span> <i class="fas fa-times-circle" style="vertical-align: middle;"></i></div>';
                event.preventDefault();
            } else {
                nombreInput.classList.remove('invalid-input');
            }
        }

        // Validación del campo de edad
        var edad = parseInt(edadInput.value);
        if (isNaN(edad) || edad <= 0 || edad >= 100) {
            edadInput.classList.add('invalid-input');
            alertsDiv.innerHTML += '<div class="error-message"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-alert-circle" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ff2825" fill="none" stroke-linecap="round" stroke-linejoin="round" style="vertical-align: middle;"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" /><path d="M12 8v4" /><path d="M12 16h.01" /></svg><span style="vertical-align: middle;"> La edad debe ser un número mayor a 0 y menor que 100</span> <i class="fas fa-times-circle" style="vertical-align: middle;"></i></div>';
            event.preventDefault();
        } else {
            edadInput.classList.remove('invalid-input');
        }

        // Validación del campo de correo electrónico
        var email = emailInput.value.trim();
        var regexEmail = /^[a-zA-Z0-9._-]+@[a-zA-Z]+\.[a-zA-Z0-9.-]+$/;
        if (!regexEmail.test(email)) {
            emailInput.classList.add('invalid-input');
            alertsDiv.innerHTML += '<div class="error-message"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-alert-circle" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ff2825" fill="none" stroke-linecap="round" stroke-linejoin="round" style="vertical-align: middle;"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" /><path d="M12 8v4" /><path d="M12 16h.01" /></svg><span style="vertical-align: middle;"> El correo debe seguir el formato establecido</span> <i class="fas fa-times-circle" style="vertical-align: middle;"></i></div>';
            event.preventDefault();
        } else {
            emailInput.classList.remove('invalid-input');
        }

        // Validación del campo de usuario
        var usuario = usuarioInput.value.trim();
        var regexUsuario = /^[a-zA-Z0-9]{5,}$/;
        if (!regexUsuario.test(usuario)) {
            usuarioInput.classList.add('invalid-input');
            alertsDiv.innerHTML += '<div class="error-message"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-alert-circle" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ff2825" fill="none" stroke-linecap="round" stroke-linejoin="round" style="vertical-align: middle;"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" /><path d="M12 8v4" /><path d="M12 16h.01" /></svg><span style="vertical-align: middle;"> El usuario debe contener al menos 5 caracteres y solo letras y números</span> <i class="fas fa-times-circle" style="vertical-align: middle;"></i></div>';
            event.preventDefault();
        } else {
            usuarioInput.classList.remove('invalid-input');
        }

        // Validación del campo de contraseña
        var password = passwordInput.value.trim();
var regexPassword = /^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
if (!regexPassword.test(password)) {
    passwordInput.classList.add('invalid-input');
    alertsDiv.innerHTML += '<div class="error-message"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-alert-circle" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ff2825" fill="none" stroke-linecap="round" stroke-linejoin="round" style="vertical-align: middle;"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" /><path d="M12 8v4" /><path d="M12 16h.01" /></svg><span style="vertical-align: middle;"> La contraseña debe combinar letras, al menos número, un símbolo especial y tener al menos 8 caracteres</span> <i class="fas fa-times-circle" style="vertical-align: middle;"></i></div>';
    event.preventDefault();
} else {
    passwordInput.classList.remove('invalid-input');
}

// Validación del campo de confirmar contraseña
var confirmarContraseña = confirmarContraseñaInput.value.trim();

if (confirmarContraseña === '') {
    confirmarContraseñaInput.classList.add('invalid-input');
    alertsDiv.innerHTML += '<div class="error-message"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-alert-circle" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ff2825" fill="none" stroke-linecap="round" stroke-linejoin="round" style="vertical-align: middle;"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" /><path d="M12 8v4" /><path d="M12 16h.01" /></svg><span style="vertical-align: middle;"> Este campo es obligatorio</span> <i class="fas fa-times-circle" style="vertical-align: middle;"></i></div>';
    event.preventDefault();
} else if (confirmarContraseña !== password) {
    confirmarContraseñaInput.classList.add('invalid-input');
    passwordInput.classList.add('invalid-input'); // Añadir borde rojo al campo de contraseña
    alertsDiv.innerHTML += '<div class="error-message"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-alert-circle" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ff2825" fill="none" stroke-linecap="round" stroke-linejoin="round" style="vertical-align: middle;"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" /><path d="M12 8v4" /><path d="M12 16h.01" /></svg><span style="vertical-align: middle;"> Las contraseñas no coinciden</span> <i class="fas fa-times-circle" style="vertical-align: middle;"></i></div>';
    event.preventDefault();
} else {
    confirmarContraseñaInput.classList.remove('invalid-input');
    passwordInput.classList.remove('invalid-input'); // Remover borde rojo del campo de contraseña si las contraseñas coinciden
    if (!regexPassword.test(confirmarContraseña)) { // Verifica si la confirmación de contraseña no cumple con la expresión regular
        confirmarContraseñaInput.classList.add('invalid-input'); // Agrega el borde rojo al campo de confirmar contraseña
        passwordInput.classList.add('invalid-input'); // Agrega el borde rojo al campo de contraseña
    }
}
        
        //encriptame la contraseña y guardala en una variable
        //encriptame la contraseña con cesar
        var encriptada = '';

        for (var i = 0; i < password.length; i++) {

            var ascii = password.charCodeAt(i);
            var asciiCesar = ascii + 3;
            encriptada += String.fromCharCode(asciiCesar);
        }


        


        

      


        // Si hay mensajes de error, evitar el envío del formulario
        if (alertsDiv.innerHTML !== '') {
            event.preventDefault();
        }else{
            
            alert('Formulario enviado con éxito:\n\nNombre: ' + nombreInput.value +
                  '\nEdad: ' + edadInput.value +
                  '\nEmail: ' + emailInput.value +
                  '\nUsuario: ' + usuarioInput.value +
                  '\nContraseña: ' + passwordInput.value +
                    '\nContraseña encriptada: ' + encriptada);
            
        }

        
    });
});

var eyeButtons = document.querySelectorAll('.campoContra button');

    eyeButtons.forEach(function(button) {
        button.addEventListener('click', function(event) {
            // Detener la propagación del evento para evitar que se envíe el formulario
            event.preventDefault();
            var inputField = this.parentNode.querySelector('input');
            if (inputField.type === 'password') {
                inputField.type = 'text';
            } else {
                inputField.type = 'password';
            }
        });
    });

    function limpiarCampos() {
        var confirmacion = confirm('¿Está seguro de que desea limpiar los campos?');
        if (confirmacion) {
            // Si el usuario confirma, limpiar los campos
            // Aquí podrías agregar código para limpiar los campos si lo necesitas
            // Luego recargar la página
            location.reload();
        } else {
            // Si el usuario cancela, no hacer nada
            return;
        }
    }


    
        
       


    
    