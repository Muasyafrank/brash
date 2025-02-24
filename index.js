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
            alert(data.message);
            if (data.status === "success") {
                document.getElementById("registerForm").reset();
                showLogin();
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
            alert(data.message);
            if (data.status === "success") {
                window.location.href = "home.php"; // Redirect after login
            }
        })
        .catch(error => console.error("Login Error:", error));
    });
});

function showLogin() {
    document.getElementById("loginForm").style.display = "block";
    document.getElementById("registerForm").style.display = "none";
}
