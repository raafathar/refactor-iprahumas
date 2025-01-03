document.addEventListener("DOMContentLoaded", function () {
    const sections = document.querySelectorAll("#form-container > div");
    const nextButton = document.getElementById("next");
    const backButton = document.getElementById("back");
    const navigatorCount = document.getElementById("navigator-count");
    let currentSectionIndex = 0;

    // Function to update the visibility of sections
    function updateSectionVisibility() {
        sections.forEach((section, index) => {
            section.classList.toggle("d-none", index !== currentSectionIndex);
        });

        // Update button states
        backButton.style.display = currentSectionIndex === 0 ? "none" : "block";
        if (currentSectionIndex === sections.length - 1) {
            nextButton.textContent = "Daftar";
            nextButton.type = "button";
            nextButton.setAttribute("onclick", "onSubmit(event)");
        } else {
            nextButton.textContent = "Lanjut";
            nextButton.type = "button";
            nextButton.removeAttribute("onclick");
        }

         // Update navigator count
        navigatorCount.textContent = `Formulir pendaftaran anggota bagian ${currentSectionIndex + 1} dari ${sections.length}`;
    }

    // Event listener for the Next button
    nextButton.addEventListener("click", function () {
        if (currentSectionIndex < sections.length - 1) {
            currentSectionIndex++;
            updateSectionVisibility();
        }
    });

    // Event listener for the Back button
    backButton.addEventListener("click", function () {
        if (currentSectionIndex > 0) {
            currentSectionIndex--;
            updateSectionVisibility();
        }
    });

    // Initialize the form to show the first section
    updateSectionVisibility();
});
