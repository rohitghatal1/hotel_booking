<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login Panel</title>
    <link rel="stylesheet" href="css/admin.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Merienda:wght@400;700&family=Poppins:wght@300;400;500;600&display=swap"
        rel="stylesheet">
</head>

<body>
    <?php
session_start();

//check if user is already logged in
if (isset($_SESSION['admin_username'])) {
    header("location: a_adminDashboard.php"); //redirectin to dashboard
    exit();
}
?>
    <form action="adminLogin.php" method="post">
        <div class="adminLoginForm">
            <h3 class="heading-font">Admin Login Panel</h3>
            <input type="text" name="admin-name" placeholder="Admin Name" required>
            <input type="password" name="admin-pass" id="admin-pass" placeholder="Password" required>
            <span class="toggle-password-visibility text-font" id="toggle-password"><input type="checkbox"
                    id="chekmark">Show Password</span>
            <button class="login-btn" type="submit">LOGIN</button>
        </div>
    </form>
</body>


<script>
    // code for toggling password visibility

    var passwordField = document.getElementById("admin-pass");
    var visibilityToggler = document.getElementById("toggle-password");
    var passwordFieldInput = visibilityToggler.querySelector("input");

    visibilityToggler.addEventListener("click", function () {
        passwordFieldInput.checked = !passwordFieldInput.checked;

        if (passwordField.type == "password") {
            passwordField.type = "text";
        }
        else {
            passwordField.type = "password";
        }
    })
</script>

</html>