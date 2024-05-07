// code for filter option
var filtertoggler = document.getElementById("toggle-filter");
var filterOptions = document.getElementById("filter-container");
filtertoggler.addEventListener("click", function () {
        filterOptions.style.display = "block";
        filterOptions.style.width = "350px";
    })

    document.getElementById("close-filterbtn").addEventListener("click", function () {
        document.getElementById("filter-container").style.width = "0";
    })

    // script to expand room card
    function expandRoomCard(id) {
        document.getElementById(id).style.display = "block";
    }

    // script to collapse room card
    function collapseRoomCard(id) {
        document.getElementById(id).style.display = "none";
    }

    // script for sidebar navMenu for mobile 
    function openSidebarNav(){
        document.getElementById("mobileNavbar").style.display = "block";
        document.body.classList.add("sidebar-open");
    }

    function closeSidebarNav(){
        document.getElementById("mobileNavbar").style.display = "none";
        document.body.classList.remove("sidebar-open");
    }

    // for toggling dropdown after user logged in 
    function toggleDropdown(){
        let dropdown = document.querySelector('.dropdown-content');
        dropdown.style.display = (dropdown.style.display === 'block') ? 'none' : 'block';
    }

// -------------------------------------------------Booking Form validation---------------------------------------------------------
  // Function to validate the entire form
  function validateForm() {
    // Validate check-in and check-out dates
    var checkInValid = validateCheckIn();
    var checkOutValid = validateCheckOut();

    // Return false if any validation fails
    return checkInValid && checkOutValid;
}

// Function to validate check-in date
function validateCheckIn() {
    var checkInDate = document.getElementById("checkInDate").value;
    var checkIn = new Date(checkInDate);
    var today = new Date();

    if (checkIn < today) {
        document.getElementById("checkInError").textContent = "Check-In date cannot be before today.";
        return false;
    } else {
        document.getElementById("checkInError").textContent = "";
        return true;
    }
}

// Function to validate check-out date
function validateCheckOut() {
    var checkOutDate = document.getElementById("checkOutDate").value;
    var checkOut = new Date(checkOutDate);
    var checkInDate = document.getElementById("checkInDate").value;
    var checkIn = new Date(checkInDate);

    if (checkOut < checkIn) {
        document.getElementById("checkOutError").textContent = "Check-out date can't be less than check-in date";
        return false;
    } else {
        document.getElementById("checkOutError").textContent = "";
        return true;
    }
}

