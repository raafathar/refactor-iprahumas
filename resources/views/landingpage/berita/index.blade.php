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
            <div class="row" id="news-list-container">
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
        document.addEventListener('DOMContentLoaded', function() {
            const newsListContainer = document.getElementById('news-list-container');
            const paginationLinksContainer = document.getElementById('pagination-links');
            let currentPage = localStorage.getItem('current-page') ? parseInt(localStorage.getItem('current-page')) : 1;

            const apiUrl = "{{ route('get.berita') }}"; // Menghasilkan URL berdasarkan nama route

            console.log(apiUrl);

            const fetchData = async (page) => {
                const response = await fetch(`${apiUrl}?page[number]=${page}&page[size]=15`);
                const data = await response.json();
                renderArticles(data.data);
                renderPagination(data.links);
                localStorage.setItem('current-page', page);
            };

            // Fungsi untuk merender artikel-artikel
            const renderArticles = (articles) => {
                newsListContainer.innerHTML = ''; // Mengosongkan kontainer sebelum merender ulang
                articles.forEach(berita => {
                    const articleElement = document.createElement('div');
                    articleElement.classList.add('col-lg-4', 'col-md-6');
                    articleElement.innerHTML = `
                        <div class="card rounded-3 overflow-hidden">
                            <a href="/berita/detail/${berita.b_slug}" class="position-relative">
                                <img src="${berita.b_image_url}" alt="blog image" class="w-100 img-fluid">
                                <div class="position-absolute bottom-0 end-0 me-9 mb-3">
                                    <p class="text-dark fs-2 px-2 rounded-pill bg-white mb-0">2 min read</p>
                                </div>
                                <div class="position-absolute bottom-0 ms-7 mb-n9">
                                    <img src="../assets/images/profile/user-3.jpg" alt="user" class="rounded-circle" width="44px" height="44px">
                                </div>
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
                    `;
                    newsListContainer.appendChild(articleElement);
                });
            };

            // Fungsi untuk merender pagination
            const renderPagination = (links) => {
                paginationLinksContainer.innerHTML = ''; // Mengosongkan link pagination
                for (let key in links) {
                    if (links[key]) {
                        const link = document.createElement('a');
                        link.href = '#';
                        link.innerHTML = key.toUpperCase();
                        link.classList.add('pagination-link');
                        link.addEventListener('click', (e) => {
                            e.preventDefault();
                            const pageNumber = getPageNumberFromUrl(links[key]);
                            fetchData(pageNumber);
                        });
                        paginationLinksContainer.appendChild(link);
                    }
                }
            };

            // Fungsi untuk mendapatkan nomor halaman dari URL
            const getPageNumberFromUrl = (url) => {
                const urlParams = new URL(url).searchParams;
                return urlParams.get('page[number]');
            };

            // Ambil data dari API berdasarkan halaman saat ini
            fetchData(currentPage);
        });
    </script>

@endsection
