let storedPage = localStorage.getItem('currentPage');
let currentPage = !isNaN(parseInt(storedPage)) ? parseInt(storedPage) : 1;

function loadBerita(page = currentPage) {
    const sortBy = document.getElementById('sort-by').value; // Get the selected sorting option
    const url = `/beritas?number=${page}&size=6`;  // Adjust URL to include page number and size

    fetch(url)
        .then(response => response.json())
        .then(data => {

            const newPage = data.meta.page['current-page'];
            currentPage = newPage;  // Update currentPage with the value from the JSON response
            const lastPage = data.meta.page['last-page']; // Get lastPage from the JSON response

            renderBerita(data.data);
            renderPagination(data.links, currentPage, lastPage); // Pass currentPage and lastPage for pagination
            localStorage.setItem('currentPage', currentPage);  // Save the current page to localStorage
        })
        .catch(error => {
            console.error("Error loading berita:", error);
        });
}

function renderBerita(beritaData) {
    const beritaContainer = document.querySelector('#posts');
    beritaContainer.innerHTML = ''; // Clear existing content
    beritaData.forEach(berita => {
        beritaContainer.innerHTML += `
            <div class="col-lg-4 col-md-6">
                <div class="card rounded-3 overflow-hidden">
                    <a href="/berita/detail/${berita.b_slug}" class="position-relative">
                        <img src="${berita.b_image_url}" alt="blog image" class="w-100 img-fluid">
                    </a>
                    <div class="mt-10 px-7 pb-7 h-100">
                        <div class="d-flex gap-3 flex-column h-100 justify-content-between">
                            <div class="d-flex">
                                <p class="fs-2 px-2 rounded-pill bg-muted bg-opacity-25 text-dark mb-0">${berita.user_name}</p>
                            </div>
                            <a href="/berita/detail/${berita.b_slug}" class="fs-15 fw-bolder">${berita.b_title}</a>
                            <p class="mb-0 fs-4 truncated-text">${berita.b_content}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex gap-9">
                                    <div class="d-flex gap-2">
                                        <i class="ti ti-eye fs-5 text-dark"></i>
                                        <p class="mb-0 fs-2 fw-semibold text-dark">${berita.b_view}</p>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center gap-2">
                                    <i class="ti ti-circle fs-2"></i>
                                    <p class="mb-0 fs-2 fw-semibold text-dark">${berita.b_date}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        `;
    });
}

// Function to render pagination links with the custom UI
function renderPagination(links, currentPage, lastPage) {
    const paginationContainer = document.getElementById('pagination');
    paginationContainer.innerHTML = '';

    // Display "Previous" button
    if (currentPage > 1) {
        paginationContainer.innerHTML += `
            <li class="page-item">
                <a class="page-link border-0 rounded-circle text-dark round-32 d-flex align-items-center justify-content-center" href="javascript:void(0)" onclick="changePage(${currentPage - 1})">
                    <i class="ti ti-chevron-left"></i>
                </a>
            </li>
        `;
    }

    // Display page numbers
    const pageNumbers = [];
    if (lastPage <= 5) {
        // Show all pages if total pages are 5 or less
        for (let i = 1; i <= lastPage; i++) {
            pageNumbers.push(i);
        }
    } else {
        // Show first 2 pages, current page and last 2 pages, and ellipsis in between if necessary
        pageNumbers.push(1);
        if (currentPage > 3) pageNumbers.push('...');
        const start = Math.max(2, currentPage - 1);
        const end = Math.min(lastPage - 1, currentPage + 1);
        for (let i = start; i <= end; i++) {
            pageNumbers.push(i);
        }
        if (currentPage < lastPage - 2) pageNumbers.push('...');
        pageNumbers.push(lastPage);
    }

    pageNumbers.forEach((pageNumber) => {
        const isActive = currentPage === pageNumber ? 'active' : '';
        const pageDisplay = pageNumber === '...' ? pageNumber : `<a class="page-link border-0 rounded-circle text-dark round-32 mx-1 d-flex align-items-center justify-content-center" href="javascript:void(0)" onclick="changePage(${pageNumber})">${pageNumber}</a>`;
        paginationContainer.innerHTML += `
            <li class="page-item ${isActive}">
                ${pageDisplay}
            </li>
        `;
    });

    // Display "Next" button
    if (currentPage < lastPage) {
        paginationContainer.innerHTML += `
            <li class="page-item">
                <a class="page-link border-0 rounded-circle text-dark round-32 d-flex align-items-center justify-content-center" href="javascript:void(0)" onclick="changePage(${currentPage + 1})">
                    <i class="ti ti-chevron-right"></i>
                </a>
            </li>
        `;
    }
}

function changePage(page) {
    if (page > 0) {
        loadBerita(page); // Load the data for the selected page
    }
}

loadBerita(currentPage);