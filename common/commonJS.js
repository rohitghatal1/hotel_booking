// Function Open Login/Signup Form
function openLoginRegisterForm() {
  document.getElementById("loginRegisterForm").style.display = "block";
  document.getElementById("loginRegisterForm").style.width = "350px";
}

// Function to Close Login/Signup Form
function closeLoginRegisterForm() {
  document.getElementById("loginRegisterForm").style.width = "0";
}

// Function to open the Loging form
function openLoginForm() {
  document.getElementById("loginForm").style.display = "block";
  document.getElementById("registerForm").style.display = "none";
}

// Function to open the Register form
function openRegistrationForm() {
  document.getElementById("loginForm").style.display = "none";
  document.getElementById("registerForm").style.display = "block";
}

// code to toggle password visibility and toggling of checkbox
function togglePasswordVisibility() {
  let passwordInput = document.getElementById("lpassword");
  let toggleCheckboxInput = document.querySelector(
    "#show-password input[type='checkbox']"
  );

  // Toggle the checked state of the checkbox
  toggleCheckboxInput.checked = !toggleCheckboxInput.checked;

  // Toggle the type of the password input field
  if (passwordInput.type === "password") {
    passwordInput.type = "text";
  } else {
    passwordInput.type = "password";
  }
}

function togglePasswordVisibility1() {
  let passwordInput = document.getElementById("password");
  let toggleCheckboxInput = document.querySelector(
    "#show-password input[type='checkbox']"
  );

  // Toggle the checked state of the checkbox
  toggleCheckboxInput.checked = !toggleCheckboxInput.checked;

  // Toggle the type of the password input field
  if (passwordInput.type === "password") {
    passwordInput.type = "text";
  } else {
    passwordInput.type = "password";
  }
}
