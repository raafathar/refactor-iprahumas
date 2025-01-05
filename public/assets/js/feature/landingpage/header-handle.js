const searchInput = document.getElementById('search');
const rekomendasiDiv = document.getElementById('rekomendasi');
const rekomendasiSpan = rekomendasiDiv.querySelectorAll('li span b');
searchInput.addEventListener('input', function() {
    const inputValue = this.value;
    if (inputValue) {
        rekomendasiSpan.forEach(b => {
            b.innerHTML = inputValue; 
        });
        rekomendasiDiv.classList.remove('d-none');
    } else {
        rekomendasiDiv.classList.add('d-none');
    }
});

function loadPages() {
    // Get the URL from the data attribute in the Blade view
    var dropdownMenu = document.getElementById('dropdown-pages');
    var url = dropdownMenu.getAttribute('data-url'); // Get the route URL from data attribute
    
    fetch(url)
        .then(response => response.json())
        .then(data => {
            data.forEach(function(page) {
                var listItem = '<li><a class="dropdown-item" href="' + '/profil/' + page.p_slug + '">' + page.p_title + '</a></li>';
                dropdownMenu.innerHTML += listItem;
            });
        })
        .catch(error => {
            console.error("Error loading pages: ", error);
        });
}

document.addEventListener('DOMContentLoaded', function() {
    loadPages();
});
