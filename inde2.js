document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("registerForm").addEventListener("submit", function (e) {
        e.preventDefault();

        let email = document.getElementById("signupEmail").value.trim();
        let name = document.getElementById("signupName").value.trim();
        let password = document.getElementById("signupPassword").value.trim();

        if (email === "" || name === "" || password === "") {
            alert("Please fill in all fields.");
            return;
        }

        fetch("signup.php", {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify({ email, name, password })
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === "success") {
                alert("Account created successfully. Please login.");
                document.getElementById("registerForm").reset();
                // Redirect to login page after signup
                window.location.href = "loginPage.php"; 
            } else {
                alert(data.message);
            }
        })
        .catch(error => console.error("Signup Error:", error));
    });

    document.getElementById("loginForm").addEventListener("submit", function (e) {
        e.preventDefault();

        let email = document.getElementById("loginEmail").value.trim();
        let password = document.getElementById("loginPassword").value.trim();

        if (email === "" || password === "") {
            alert("Please enter your email and password.");
            return;
        }

        fetch("login.php", {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify({ email, password })
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === "success") {
                alert("Login successful.");
                window.location.href = "home.php"; // Redirect to dashboard after login
            } else {
                alert(data.message);
            }
        })
        .catch(error => console.error("Login Error:", error));
    });
});
