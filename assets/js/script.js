document.addEventListener("DOMContentLoaded", function () {
    const spinner = document.querySelector(".spinner");
   
    setTimeout(function () {
        spinner.style.display = "none";
        const mainContent = document.querySelector(".main-content");
        mainContent.style.display = "block";
    }, 3000); 

    function hideSpinner() {
        spinner.classList.add("disappear");
    }
    setTimeout(hideSpinner, 2500);
});

const sideLinks = document.querySelectorAll('.sidebar .side-menu li a:not(.logout)');

sideLinks.forEach(item => {
    const li = item.parentElement;
    item.addEventListener('click', () => {
        sideLinks.forEach(i => {
            i.parentElement.classList.remove('active');
        })
        li.classList.add('active');
    })
});

const menuBar = document.querySelector('.content nav .bx.bx-menu');
const sideBar = document.querySelector('.sidebar');

menuBar.addEventListener('click', () => {
    sideBar.classList.toggle('close');
    localStorage.setItem('isSideBarClosed', sideBar.classList.contains('close') ? 'true' : 'false');
});

function applySidebarState() {
    const isSideBarClosed = localStorage.getItem('isSideBarClosed') === 'true';

    if (isSideBarClosed) {
        sideBar.classList.add('close');
    } else {
        sideBar.classList.remove('close');
    }
}

// Apply the sidebar state on page load
applySidebarState();

const searchBtn = document.querySelector('.content nav form .form-input button');
const searchBtnIcon = document.querySelector('.content nav form .form-input button .bx');
const searchForm = document.querySelector('.content nav form');

window.addEventListener('resize', () => {
    if (window.innerWidth < 768) {
        sideBar.classList.add('close');
    } else {
        sideBar.classList.remove('close');
    }
    if (window.innerWidth > 576) {
        searchBtnIcon.classList.replace('bx-x', 'bx-search');
        searchForm.classList.remove('show');
    }
});

const toggler = document.getElementById('theme-toggle');

toggler.addEventListener('change', function () {
    if (this.checked) {
        document.body.classList.add('dark');
        localStorage.setItem('isDarkMode', 'true');
    } else {
        document.body.classList.remove('dark');
        localStorage.setItem('isDarkMode', 'false');
    }
});

function applyTheme() {
    const isDarkMode = localStorage.getItem('isDarkMode') === 'true';
    
    if (isDarkMode) {
        document.body.classList.add('dark');
        toggler.checked = true;
    } else {
        document.body.classList.remove('dark');
        toggler.checked = false;
    }
};

// Apply the theme on page load
applyTheme();

//Validations
function confirmDelete() {
    return confirm("Are you sure you want to delete the selected data?");
};

function confirmUpdate() {
    return confirm("Are you sure you want to update the selected data?");
};

function confirmSubmit() {
    return confirm("Are you sure you want to add new data?");
};

document.getElementById('downloadLink').addEventListener('click', function(event) {
    event.preventDefault(); 
    var confirmation = confirm("Do you want to download the User Manual?");
    if (confirmation) {
        
        var downloadLink = event.target.href;
        var link = document.createElement("a");
        link.href = downloadLink;
        link.download = "CovHDec_User_Guide.pdf"; 
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
        
        // Display a success prompt
        setTimeout(function() {
            alert("User Guide Successfully Downloaded!");
        }, 100); // Add a slight delay before showing the alert
    }
});

