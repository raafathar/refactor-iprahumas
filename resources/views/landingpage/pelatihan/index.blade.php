@extends('landingpage.layouts.main')
@include('landingpage.layouts.header')
@include('landingpage.layouts.footer')

@section('contents')
   <div class="main-wrapper overflow-hidden">
      <!-- ------------------------------------- -->  
      <!-- banner Start -->
      <!-- ------------------------------------- -->
      <section class="bg-primary py-5 mb-5">
         <div class="container mb-4">
            <div class="d-flex justify-content-between align-items-center">
               <div class="text-left">
                  <h2 class="fw-bolder fs-9 text-white">Pelatihan</h2>
               </div>
               <div class="d-flex justify-content-right align-items-center gap-2">
                  <select class="form-select w-auto bg-white" id="bulanSelect">
                  </select>
                  <select class="form-select w-auto bg-white" id="tahunSelect">
                  </select>
               </div>
            </div>
         </div>
         <div class="container">
            <div class="owl-carousel owl-theme date-event-carousel" id="dateCarousel">
            </div>
         </div>
      </section>
      <!-- ------------------------------------- -->
      <!-- banner End -->
      <!-- ------------------------------------- -->
      <!-- ------------------------------------- -->
      <!-- List Start -->
      <!-- ------------------------------------- -->
      <section>         
         <div class="container">
            <div class="row" id="listAcara"></div>
         </div>
      </section>
      <!-- ------------------------------------- -->
      <!-- List End -->
      <!-- ------------------------------------- -->
   </div>


   <script>

      const selectYear = document.getElementById('tahunSelect');
      const selectMonth = document.getElementById('bulanSelect');
      const dateCarousel = document.querySelector('.date-event-carousel');
      const listAcara = document.getElementById('listAcara');
      const startYear = 2023;
      const currentYear = new Date().getFullYear();
      const currentMonth = new Date().getMonth() + 1;
      const currentDate = new Date();
      const todayDay = currentDate.getDate();  // Get the current day
      const selectedDay = `${currentYear}-${currentMonth < 10 ? '0' + currentMonth : currentMonth}-${todayDay < 10 ? '0' + todayDay : todayDay}`;  // Default to today's date
   
      let events = [];  // This will store the events fetched from the data.json file
   
      // Fetch the events from the data.json file
      async function fetchEvents() {
         try {
            const response = await fetch('/test/data.json');
            events = await response.json();
            updateCarousel();  // Once events are loaded, update the carousel and event list
         } catch (error) {
            console.error('Error loading events:', error);
         }
      }
   
      // Populate year dropdown
      for (let year = startYear; year <= currentYear; year++) {
         const option = document.createElement('option');
         option.value = year;
         option.textContent = year;
         if (year === currentYear) {
            option.selected = true;
         }
         selectYear.appendChild(option);
      }
   
      // Populate month dropdown
      const bulanIndo = [
         "Januari", "Februari", "Maret", "April", "Mei", "Juni", 
         "Juli", "Agustus", "September", "Oktober", "November", "Desember"
      ];
   
      bulanIndo.forEach((bulan, index) => {
         const option = document.createElement('option');
         option.value = index + 1;
         option.textContent = bulan;
         if (index + 1 === currentMonth) {
            option.selected = true;
         }
         selectMonth.appendChild(option);
      });
   
      // Function to get the number of days in a given month and year
      function getDaysInMonth(year, month) {
         return new Date(year, month, 0).getDate();
      }
   
      // Function to update the carousel based on selected year and month
      function updateCarousel() {
         const selectedYear = parseInt(selectYear.value);
         const selectedMonth = parseInt(selectMonth.value);
         const daysInMonth = getDaysInMonth(selectedYear, selectedMonth);
   
         dateCarousel.innerHTML = '';
   
         for (let day = 1; day <= daysInMonth; day++) {
            const item = document.createElement('div');
            item.classList.add('item');
            item.innerHTML = `
               <div class="card shadow-none cursor-pointer date-content">
                  <div class="card-body">
                     <div class="text-center">
                        <h2 class="fw-bolder mb-0 text-white">${day}</h2>
                        <p class="text-white mb-1">${bulanIndo[selectedMonth - 1]}</p>
                     </div>
                  </div>
               </div>
            `;
   
            // Set an event listener to highlight the clicked date
            item.querySelector('.card').addEventListener('click', () => {
               // Highlight the clicked date
               const previouslyActive = dateCarousel.querySelector('.active-day');
               if (previouslyActive) {
                  previouslyActive.classList.remove('active-day');
               }
               item.classList.add('active-day');  // Add the active class to the clicked date
   
               let selectedDay = `${selectedYear}-${(selectedMonth < 10 ? '0' : '') + selectedMonth}-${(day < 10 ? '0' : '') + day}`;
               loadEvents(selectedYear, selectedMonth, day);
            });
   
            dateCarousel.appendChild(item);
         }
   
         $(dateCarousel).owlCarousel('destroy');
         $(dateCarousel).owlCarousel({
            nav: false,
            dots: true,
            loop: false,
            margin: 20,
            responsive: {
               0: { items: 3, loop: false },
               576: { items: 3, loop: false },
               768: { items: 4, loop: false },
               1200: { items: 6, loop: false },
               1400: { items: 8, loop: false },
            }
         });
   
         // Set today as the active day and load events for today
         const todayElement = dateCarousel.querySelector(`.date-content:nth-child(${todayDay})`);
         if (todayElement) {
            todayElement.classList.add('active-day');
         }
   
         loadEvents(selectedYear, selectedMonth, todayDay); // Ensure today's events are loaded
      }
   
      // Function to load events based on selected year, month, and day
      function loadEvents(year, month, day) {
         listAcara.innerHTML = '';
   
         // Format selectedDate to match the event date format
         const selectedDate = `${year}-${(month < 10 ? '0' : '') + month}-${(day < 10 ? '0' : '') + day}`;
         const filteredEvents = events.filter(event => event.tanggal_event === selectedDate);
   
         if (filteredEvents.length > 0) {
            filteredEvents.forEach(event => {
               const eventCard = document.createElement('div');
               eventCard.classList.add('col-md-6', 'col-lg-4');
               eventCard.innerHTML = `
                  <div class="card overflow-hidden hover-img">
                     <div class="position-relative">
                        <a href="../main/blog-detail.html">
                           <img src="${event.image}" class="card-img-top" alt="modernize-img">
                        </a>
                        <span
                           class="badge text-bg-light fs-2 lh-sm mb-9 me-9 py-1 px-2 fw-semibold position-absolute bottom-0 end-0">2
                           min Read</span>
                        <img src="../assets/images/profile/user-3.jpg" alt="modernize-img"
                           class="img-fluid rounded-circle position-absolute bottom-0 start-0 mb-n9 ms-9" width="40"
                           height="40" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Addie Keller">
                     </div>
                     <div class="card-body p-4">
                           <span class="badge text-bg-light fs-2 py-1 px-2 lh-sm  mt-3">${event.sesi}</span>
                           <a class="d-block my-4 fs-5 text-dark fw-semibold link-primary"
                              href="../main/blog-detail.html">${event.judul}</a>
                           <div class="d-flex align-items-center gap-4">
                              <div class="d-flex align-items-center gap-2">
                                 <i class="ti ti-eye text-dark fs-5"></i>${event.views}
                              </div>
                           </div>
                     </div>
                  </div>
               `;
               listAcara.appendChild(eventCard);
            });
         } else {
            listAcara.innerHTML = 
            
            `
            <div class="row justify-content-center">
               <h1 class="fw-bolder fs-7 text-center">Belum ada pelatihan</h1>
               <p class="fw-semibold fs-4 text-center">Pelatihan pada tanggal <span class="text-primary">${selectedDate}</span> belum tersedia</p>
               <div class="col-12 d-flex justify-content-center align-items-center flex-col mt-4">
                  <img src="../assets/images/svgs/undraw_no_data.svg" class="img-thumbnail shadow-none border-0">
               </div>
            </div>
            
            `
         }
      }
   
      window.addEventListener('load', () => {
         selectYear.value = currentYear;
         selectMonth.value = currentMonth;
         fetchEvents();
      });
   
      selectYear.addEventListener('change', updateCarousel);
      selectMonth.addEventListener('change', updateCarousel);

   </script>
   
   
   

@endsection
