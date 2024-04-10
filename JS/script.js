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
