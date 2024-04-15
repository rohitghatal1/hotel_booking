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