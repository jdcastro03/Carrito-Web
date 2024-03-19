
const ver_password = document.querySelector('.ver-password');
const ver_passwordc = document.querySelector('.ver-password-c');

ver_password.addEventListener('click', (e) => {

    const password_input = document.querySelector(".password");

    if (password_input.type === "password") {
        password_input.type = "text";
    } else {
        password_input.type = "password";
    }
});

ver_passwordc.addEventListener('click', (e) => {

    const password_input = document.querySelector(".confirm-password");

    if (password_input.type === "password") {
        password_input.type = "text";
    } else {
        password_input.type = "password";
    }
});