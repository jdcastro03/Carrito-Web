
const ver_password = document.querySelector('.ver-password');

ver_password.addEventListener('click', (e) => {

    const password_input = document.querySelector(".password");

    if (password_input.type === "password") {
        password_input.type = "text";
    } else {
        password_input.type = "password";
    }
});