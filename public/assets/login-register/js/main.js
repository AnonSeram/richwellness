// main.js
function showLoginForm() {
    var role = document.getElementById('role').value;
    var loginForm = document.getElementById('login-form');
    if (role) {
        loginForm.style.display = 'block';
    } else {
        loginForm.style.display = 'none';
    }
}
