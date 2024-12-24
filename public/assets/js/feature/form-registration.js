// Array berisi elemen dari children Form
const listChildren = $("#form-container").children();

// Panjang grup
let lengthGroup = listChildren.length;

// Index grup
let currentGroup = 0;

// Reset grup, sembunyikan semua elemen
const resetGroup = () => {
    listChildren.each((_, elm) => {
        $(elm).addClass("d-none");
    });
};

// Menampilkan Group Form berdasarkan index
const moveGroup = () => {
    resetGroup();
    $(listChildren[currentGroup]).removeClass("d-none");
    changeNavigator();
    changeNavigatorCounter();
};

// Mengubah nama navigator form sudah mentok
const changeNavigator = () => {
    if (currentGroup >= lengthGroup - 1) {
        $("#next").text("Daftar");
    } else {
        $("#next").text("Berikutnya");
    }

    if (currentGroup === 0) {
        $("#back").addClass("disabled");
    } else {
        $("#back").removeClass("disabled");
    }
};

// Mengubah index navigator
const changeNavigatorCounter = () => {
    $("#navigator-count").text(`Formulir pendaftaran anggota bagian ${currentGroup + 1} dari ${lengthGroup}`);
};

// Menambah index grup jika masih dalam range
const addCurrentGroup = () => {
    // Validasi jika perlu, misalnya form validation sebelum lanjut
    // const isValidation = validationGroup(currentGroup);
    // if (!isValidation) return;

    if (currentGroup < lengthGroup - 1) {
        currentGroup++;
        moveGroup();
    } else {
        $("#register-form").submit();
    }
};

// Mengurangi index grup
const removeCurrentGroup = () => {
    if (currentGroup > 0) {
        currentGroup--;
        moveGroup();
    }
};

$("#next").on("click", addCurrentGroup);
$("#back").on("click", removeCurrentGroup);

// Menampilkan grup pertama saat halaman dimuat
moveGroup();
