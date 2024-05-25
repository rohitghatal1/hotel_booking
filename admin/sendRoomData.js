document.addEventListener("DOMContentLoaded", function () {
  document.getElementById("submitBtn").addEventListener("click", function () {
    //retrieve form data
    let roomNo = document.getElementById("roomNo").value();
    let roomType = document.getElementById("roomType").value();
    let roomDesc = document.getElementById("roomDesc").value();
    let roomQuantity = document.getElementById("roomQuantity").value();
    let roomPrice = document.getElementById("roomPrice").value();

    //retrieve selected features
    let selectedFeatures = [];
    let featureCheckboxes = document.getElementsByName("selected_features");
    for (let i = 0; i < featureCheckboxes.length; i++) {
      if (featureCheckboxes[i].checked) {
        selectedFeatures.push(featureCheckboxes[i].value);
      }
    }

    //retrieve selected facilities
    let selectedFacilities = [];
    let facilityCheckboxes = document.getElementsByName("selected_facilities");
    for (let j = 0; j < facilityCheckboxes.length; j++) {
      if (facilityCheckboxes[j].checked) {
        selectedFacilities.push(facilityCheckboxes[j].value);
      }
    }

    //create form Data object
    let formData = new FormData();
    formData.append("roomNo", roomNo);
    formData.append("roomType", roomType);
    formData.append("roomDesc", roomDesc);
    formData.append("roomQuantity", roomQuantity);
    formData.append("roomPrice", roomPrice);
    formData.append("selected_features", JSON.stringify(selectedFeatures));
    formData.append("selected_facilities", JSON.stringify(selectedFacilities));

    //create a new XMLHttpRequest object
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "addRooms.php", true);
    xhr.onload = function () {
      if (xhr.status === 200) {
        console.log(xhr.responseText);
      } else {
        console.error("Request Faied. Error Code: " + xhr.status);
      }
    };

    // for handling network error
    xhr.onerror = function () {
      console.error("Network requuest Failed");
    };
    xhr.send(formData);
  });
});
