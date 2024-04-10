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
  });

  lnameInput.addEventListener("blur", validateLastName);
  lnameInput.addEventListener("input", function () {
    clearErrorMessage("lnameError");
  });

  contactInput.addEventListener("blur", validateContact);
  contactInput.addEventListener("input", function () {
    clearErrorMessage("contactError");
  });

  passwordInput.addEventListener("blur", validatePassword);
  passwordInput.addEventListener("input", function () {
    clearErrorMessage("passwordError");
  });

  // form submission event listener
  document
    .getElementById("registerForm")
    .addEventListener("submit", function (event) {
      // prevent default form submission
      event.preventDefault();

      // validate the form
      if (validateForm()) {
        // form is valid, submit the form
        this.submit();
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
    let password = passwordInput.value; // No trimming here
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
});
