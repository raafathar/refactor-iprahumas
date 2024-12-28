@extends('landingpage.layouts.main')
@include('landingpage.layouts.header')
@include('landingpage.layouts.footer')

@section('contents')
    <div class="main-wrapper overflow-hidden">
        <!-- ------------------------------------- -->
        <!-- banner Start -->
        <!-- ------------------------------------- -->
        <section class="bg-primary py-5 mb-5">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="text-left">
                        <h4 class="fw-bolder fs-9 text-white">Berita</h4>
                    </div>
                    <div class="d-flex justify-content-right align-items-center gap-2">
                        <select class="form-select w-auto bg-white" id="sort-by">
                            <option>Urutkan berdasarkan</option>
                            <option value="newest">Berita Terbaru</option>
                            <option value="popular">Berita Terpopuler</option>
                        </select>
                    </div>
                </div>
            </div>
        </section>
        <!-- ------------------------------------- -->
        <!-- banner End -->
        <!-- ------------------------------------- -->

        <!-- ------------------------------------- -->
        <!-- List Start -->
        <!-- ------------------------------------- -->
        <div class="container">
            <div class="row" id="news-list">
                <!-- News articles will be dynamically inserted here -->
            </div>
        </div>
        <!-- ------------------------------------- -->
        <!-- List End -->
        <!-- ------------------------------------- -->

        <!-- ------------------------------------- -->
        <!-- Pagination Start -->
        <!-- ------------------------------------- -->
        <nav aria-label="...">
            <ul class="pagination justify-content-center mb-0 mt-4" id="pagination">
                <!-- Pagination links will be dynamically inserted here -->
            </ul>
        </nav>
        <!-- ------------------------------------- -->
        <!-- Pagination End -->
        <!-- ------------------------------------- -->
    </div>

    <script>
        const beritas = @json($beritas);
        const itemsPerPage = 6; // Number of news items per page
        let currentPage = 1;

        // Function to render news articles
        function renderNews(page) {
            const start = (page - 1) * itemsPerPage;
            const end = start + itemsPerPage;
            const paginatedData = beritas.slice(start, end);

            const newsListContainer = document.getElementById('news-list');
            newsListContainer.innerHTML = ''; // Clear previous content

            paginatedData.forEach(function(berita) {
                const articleElement = document.createElement('div');
                articleElement.classList.add('col-lg-4', 'col-md-6');
                articleElement.innerHTML = `
                    <div class="card rounded-3 overflow-hidden">
                        <a href="/berita/detail/${berita.b_slug}" class="position-relative">
                            <img src="${berita.b_image_url}" alt="blog image" class="w-100 img-fluid">
                            <div class="position-absolute bottom-0 end-0 me-9 mb-3">
                                <p class="text-dark fs-2 px-2 rounded-pill bg-white mb-0 ">2 min read</p>
                            </div>
                            <div class="position-absolute bottom-0 ms-7 mb-n9">
                                <img src="../assets/images/profile/user-3.jpg" alt="user" class="rounded-circle" width="44px" height="44px">
                            </div>
                        </a>
                        <div class="mt-10 px-7 pb-7 h-100">
                            <div class="d-flex gap-3 flex-column h-100 justify-content-between">
                                <div class="d-flex">
                                    <p class="fs-2 px-2 rounded-pill bg-muted bg-opacity-25 text-dark mb-0">
                                        ${berita.user_name}
                                    </p>
                                </div>
                                <a href="/berita/detail/${berita.b_slug}" class="fs-15 fw-bolder">
                                    ${berita.b_title}
                                </a>
                                <p class="mb-0 fs-4 truncated-text">
                                    ${berita.b_content}
                                </p>
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
                `;
                newsListContainer.appendChild(articleElement);
            });
        }

        // Function to render pagination
        function renderPagination() {
            const totalPages = Math.ceil(beritas.length / itemsPerPage);
            const paginationContainer = document.getElementById('pagination');
            paginationContainer.innerHTML = ''; // Clear previous pagination

            // Previous button
            const prevPageButton = document.createElement('li');
            prevPageButton.classList.add('page-item');
            prevPageButton.innerHTML = `
                <a class="page-link border-0 rounded-circle text-dark round-32 d-flex align-items-center justify-content-center" href="javascript:void(0)" onclick="changePage(${currentPage - 1})">
                    <i class="ti ti-chevron-left"></i>
                </a>
            `;
            paginationContainer.appendChild(prevPageButton);

            // Page number buttons
            for (let i = 1; i <= totalPages; i++) {
                const pageItem = document.createElement('li');
                pageItem.classList.add('page-item');
                pageItem.innerHTML = `
                    <a class="page-link border-0 rounded-circle round-32 mx-1 d-flex align-items-center justify-content-center" href="javascript:void(0)" onclick="changePage(${i})">${i}</a>
                `;
                if (i === currentPage) {
                    pageItem.classList.add('active');
                }
                paginationContainer.appendChild(pageItem);
            }

            // Next button
            const nextPageButton = document.createElement('li');
            nextPageButton.classList.add('page-item');
            nextPageButton.innerHTML = `
                <a class="page-link border-0 rounded-circle text-dark round-32 d-flex align-items-center justify-content-center" href="javascript:void(0)" onclick="changePage(${currentPage + 1})">
                    <i class="ti ti-chevron-right"></i>
                </a>
            `;
            paginationContainer.appendChild(nextPageButton);
        }

        // Function to change page
        function changePage(page) {
            const totalPages = Math.ceil(beritas.length / itemsPerPage);

            // Prevent going out of bounds
            if (page < 1) page = 1;
            if (page > totalPages) page = totalPages;

            currentPage = page;
            renderNews(currentPage);
            renderPagination();
        }

        // Initial rendering
        renderNews(currentPage);
        renderPagination();
    </script>
@endsection
