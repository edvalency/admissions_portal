const togglePassword = document.getElementById('showpassword');
const password = document.getElementById('password');


togglePassword.addEventListener('click', function (e) {
    // toggle the type attribute
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    // toggle the eye / eye slash icon
    document.getElementById('showpassword').innerText === 'Show password' ? 'Hide password' : 'Show password';
});

