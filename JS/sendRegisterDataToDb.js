// form validation 
document.addEventListener("DOMContentLoaded", function () {
  let fnameInput = document.getElementById("fname");
  let lnameInput = document.getElementById("lname");
  let contactInput = document.getElementById("contact");
  let passwordInput = document.getElementById("password");

  // define regex
  let nameRegex = /^[a-zA-Z]+$/;
  let contactRegex = /^\d{10}$/;
  let passwordRegex =
    /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%&*?])[a-zA-Z\d!@#$%^&*?]{8,}$/;

  // event listeners for input fields
  fnameInput.addEventListener("blur", validateFirstName);
  fnameInput.addEventListener("input", function () {
    clearErrorMessage("fnameError");
    clearErrorMessage("generalError");
  });

  lnameInput.addEventListener("blur", validateLastName);
  lnameInput.addEventListener("input", function () {
    clearErrorMessage("lnameError");
    clearErrorMessage("generalError");
  });

  contactInput.addEventListener("blur", validateContact);
  contactInput.addEventListener("input", function () {
    clearErrorMessage("contactError");
    clearErrorMessage("generalError");
  });

  passwordInput.addEventListener("blur", validatePassword);
  passwordInput.addEventListener("input", function () {
    clearErrorMessage("passwordError");
    clearErrorMessage("generalError");
  });

  // form submission event listener
  document
    .getElementById("registerForm")
    .addEventListener("submit", function (event) {
      event.preventDefault();

      // validate the form
      if (validateForm()) {
        // if form is valid then send AJAX request
        submitForm();
      } else {
        updateErrorMessage("generalError", "Please input valid data in all fields!!!");
      }
    });

  // validation functions
  function validateForm() {
    return (
      validateFirstName() &&
      validateLastName() &&
      validateContact() &&
      validatePassword()
    );
  }

  function validateFirstName() {
    let fname = fnameInput.value.trim();
    if (!nameRegex.test(fname)) {
      updateErrorMessage(
        "fnameError",
        "First name should only contain letters!!!"
      );
      return false;
    }
    clearErrorMessage("fnameError");
    return true;
  }

  function validateLastName() {
    let lname = lnameInput.value.trim();
    if (!nameRegex.test(lname)) {
      updateErrorMessage(
        "lnameError",
        "Last name should only contain letters!!!"
      );
      return false;
    }
    clearErrorMessage("lnameError");
    return true;
  }

  function validateContact() {
    let contact = contactInput.value.trim();
    if (!contactRegex.test(contact)) {
      updateErrorMessage(
        "contactError",
        "Contact number should be a 10 digit number!!!"
      );
      return false;
    }
    clearErrorMessage("contactError");
    return true;
  }

  function validatePassword() {
    let password = passwordInput.value;
    if (!passwordRegex.test(password)) {
      updateErrorMessage(
        "passwordError",
        "Password should contain one upper case, special character and a number!!!"
      );
      return false;
    }
    clearErrorMessage("passwordError");
    return true;
  }

  // function to update Error message
  function updateErrorMessage(elementId, message) {
    document.getElementById(elementId).textContent = message;
  }

  // function to clear error message
  function clearErrorMessage(elementId) {
    document.getElementById(elementId).textContent = "";
  }

  
  // function to submit form via AJAX
  function submitForm() {
    let form = document.getElementById("registerForm");
    let formData = new FormData(form);

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "../php/insertUserData.php", true);
    xhr.onreadystatechange = function () {
      if (xhr.readyState == XMLHttpRequest.DONE) {
        if (xhr.status == 200) {
          let response = xhr.responseText;
          if (response.includes("Email Already Used")) {
            alert("Email Already Used");
          } else if (response.includes("Username Already taken")) {
            alert("Username Already taken");
          } else {
            alert("Registration successful!");
            form.reset(); // Clearing all input fields
          }
        } else {
          console.error("Error: " + xhr.status);
        }
      }
    };
    xhr.onerror = function () {
      console.error("Request failed");
    };
    xhr.send(formData);
  }
});
