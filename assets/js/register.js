$(document).ready(function () {
    $('#registerForm').hide();
    $('#hideLogin').click(function () {
        console.log('login');
        $('#loginForm').hide();
        $('#registerForm').show()
    });

    $('#hideRegister').click(function () {
        console.log('register');
        $('#loginForm').show();
        $('#registerForm').hide();
    });

});