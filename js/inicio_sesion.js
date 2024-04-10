const ver_passwords = document.querySelectorAll('.ver-password');

ver_passwords.forEach(ver_password => {
    ver_password.addEventListener('click', (e) => {
        const password_input = e.target.parentElement.previousElementSibling;

        if (password_input.type === "password") {
            password_input.type = "text";
        } else {
            password_input.type = "password";
        }
    });
});

const btn_usuarios = document.querySelector('.btn-usuarios');

btn_usuarios.addEventListener('click', (e) => {
    e.preventDefault();
});