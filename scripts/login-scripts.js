document.getElementById("login-form").addEventListener("submit", function(event) {
    event.preventDefault();
    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;

    // Check if username and password are valid (Example)
    if (username === "admin" && password === "password") {
        document.getElementById("error-message").innerText = ""; // Clear any previous error messages
        document.getElementById("success-message").innerText = "Login successful! Redirecting..."; // Show success message
        setTimeout(function(){
            window.location.href = "./index.html"; // Redirect after 2 seconds
        }, 1000);
    } else {
        document.getElementById("success-message").innerText = ""; // Clear any previous success messages
        document.getElementById("error-message").innerText = "Invalid username or password"; // Show error message
    }
});
