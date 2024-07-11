document.getElementById("register-form").addEventListener("submit", function(event) {
    event.preventDefault();
    var username = document.getElementById("username").value;
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;

    // Check if username, email, and password are valid (Example)
    if (username && email && password) {
        document.getElementById("error-message").innerText = ""; // Clear any previous error messages
        document.getElementById("success-message").innerText = "Registration successful! Redirecting..."; // Show success message
        setTimeout(function(){
            window.location.href = "index.html"; // Redirect to home page after registration
        }, 1000);
    } else {
        document.getElementById("success-message").innerText = ""; // Clear any previous success messages
        document.getElementById("error-message").innerText = "Please fill in all fields"; // Show error message
    }
});
