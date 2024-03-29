document.addEventListener("DOMContentLoaded", function () {
  let form = document.getElementById("registerForm");

  form.addEventListener("submit", function (event) {
    event.preventDefault(); // Prevent default form submission behavior

    let formData = new FormData(form);

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "../php/insertUserData.php", true);
    xhr.onreadystatechange = function () {
      if (xhr.readyState == XMLHttpRequest.DONE) {
        if (xhr.status == 200) {
          // Check the response text for alert messages
          let response = xhr.responseText;
          if (response.includes("Email Already Used")) {
            console.log("Email already used");
            alert("Email Already Used");
          } else if (response.includes("Username Already taken")) {
            alert("Username Already taken");
          } else {
            console.log("Data inserted successfully");
            // Redirect or perform other actions upon successful insertion
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
  });
});
