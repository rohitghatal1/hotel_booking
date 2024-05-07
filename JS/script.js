// script for sidebar navMenu for mobile 
function openSidebarNav(){
  document.getElementById("mobileNavbar").style.display = "block";
  document.body.classList.add("sidebar-open");
}

function closeSidebarNav(){
  document.getElementById("mobileNavbar").style.display = "none";
  document.body.classList.remove("sidebar-open");
}

// ----------------------------------------------------------image slider----------------------------------------------------------
// JavaScript for Image Slider
// Get references to HTML elements
const slider = document.querySelector(".slider");
const slides = document.querySelectorAll(".slide");
const prevButton = document.querySelector(".prev-button");
const nextButton = document.querySelector(".next-button");

// Initialize the current slide index
let currentSlide = 0;

// Function to show a slide
function showSlide(index) {
  // Hide all slides
  slides.forEach((slide) => {
    slide.style.display = "none";
  });

  // Show the slide at the specified index
  slides[index].style.display = "block";
}

// Function to go to the previous slide
function prevSlide() {
  currentSlide--;
  if (currentSlide < 0) {
    currentSlide = slides.length - 1;
  }
  showSlide(currentSlide);
}

// Function to go to the next slide
function nextSlide() {
  currentSlide++;
  if (currentSlide >= slides.length) {
    currentSlide = 0;
  }
  showSlide(currentSlide);
}

// Event listeners for the previous and next buttons
prevButton.addEventListener("click", prevSlide);
nextButton.addEventListener("click", nextSlide);

// Initially show the first slide
showSlide(currentSlide);

// Function to automatically go to the next slide
function autoSlide() {
  nextSlide();
}

// // Set the interval for automatic sliding (e.g., every 3 seconds)
// const interval = setInterval(autoSlide, 3000); // 5000 milliseconds (5 seconds)

// // Stop automatic sliding when the user interacts with the slider
// slider.addEventListener("mouseenter", () => {
//   clearInterval(interval);
// });

// // Resume automatic sliding when the user leaves the slider
// slider.addEventListener("mouseleave", () => {
//   interval = setInterval(autoSlide, 3000);
// });


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

