const spinner = `<div class="spinner-border spinner-border-sm" role="status">
    <span class="visually-hidden">Loading...</span>
</div>
<span class="ms-2">Loading...</span>`;

toastr.options = {
    closeButton: true,
    debug: false,
    newestOnTop: true,
    progressBar: true,
    positionClass: "toast-top-right",
    preventDuplicates: false,
    onclick: null,
    showDuration: "300",
    hideDuration: "1000",
    timeOut: "5000",
    extendedTimeOut: "1000",
    showEasing: "swing",
    hideEasing: "linear",
    showMethod: "fadeIn",
    hideMethod: "fadeOut",
};

function handleValidationErrors(form, errors) {
    form.addClass("was-validated");
    $.each(errors, (index, value) => {
        const input = findInputByName(form, index);
        input.addClass("is-invalid").removeClass("is-valid");
        input.parent().append(`<div class="invalid-feedback">${value}</div>`);
    });
}

function findInputByName(form, name) {
    let input = form.find(`[name="${name}"]`);
    if (input.length === 0) {
        input = form.find(`[name="${name}[]"]`);
    }
    return input;
}

function handleAjaxForm(form, btn, method, action, formData, onSuccess) {
    const originalBtnContent = btn.html();

    $.ajax({
        url: action,
        method: method,
        contentType: false,
        processData: false,
        data: formData,
        beforeSend: () => {
            form.removeClass("was-validated");
            form.find(".invalid-feedback").remove();
            form.find(".is-valid, .is-invalid").removeClass("is-valid is-invalid");
            btn.html(spinner).prop("disabled", true);
        },
        success: (response) => {
            btn.html(originalBtnContent).prop("disabled", false);
            form.removeAttr('inert');
            if (onSuccess) {
                onSuccess(response);
            } else {
                location.reload();
            }

            if (response.message) {
                if (response.success) {
                    toastr.success(response.message);
                } else {
                    toastr.warning(response.message);
                }
            }
            form.trigger("reset");
        },
        error: (response) => {
            btn.html(originalBtnContent).prop("disabled", false);
            form.removeAttr('inert');
            const errorMessage = response.responseJSON?.message || "Terjadi kesalahan! Silahkan coba lagi.";

            // Show error notification
            toastr.error(errorMessage);

            if (response.status === 422) {
                handleValidationErrors(form, response.responseJSON.errors);
            }
        },
    });
}

function submitForm(formSelector, onSuccess = null) {
    const form = $(formSelector);
    let method = form.attr("method").toLowerCase();
    const action = form.attr("action");
    const btn = $(event.target).closest("button");
    const formData = new FormData(form[0]);

    document.activeElement.blur();
    form.attr('inert', 'true');

    if (method === "put") {
        Swal.fire({
            title: "Apakah anda yakin?",
            text: "Data akan diperbarui!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Ya, Perbarui!",
            cancelButtonText: "Batal",
            confirmButtonColor: "#3085d6",
            reverseButtons: true,
        }).then((result) => {
            if (result.isConfirmed) {
                formData.append("_method", "put");
                handleAjaxForm(form, btn, "post", action, formData, onSuccess);
            } else {
                form.removeAttr('inert');
            }
        });
    } else {
        handleAjaxForm(form, btn, method, action, formData, onSuccess);
    }
}

function deleteForm(route, onSuccess = null) {
    Swal.fire({
        title: "Apakah anda yakin?",
        text: "Data yang dihapus tidak dapat dikembalikan!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Ya, Hapus!",
        cancelButtonText: "Batal",
        cancelButtonColor: "#d33",
        confirmButtonColor: "#3085d6",
        reverseButtons: true,
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: route,
                type: "DELETE",
                data: {
                    _token: $('meta[name="csrf-token"]').attr("content"),
                },
                success: (response) => {
                    if (response.message) {
                        if (response.success) {
                            toastr.success(response.message);
                        } else {
                            toastr.warning(response.message);
                        }
                    }
                    if (onSuccess) {
                        onSuccess(response);
                    } else {
                        location.reload();
                    }
                },
                error: (response) => {
                    toastr.error("Terjadi kesalahan! Data gagal dihapus.");
                    Swal.fire({
                        title: "Gagal!",
                        text: "Data gagal dihapus.",
                        icon: "error",
                    });
                },
            });
        }
    });
}

function isJsonString(str) {
    try {
        JSON.parse(str);
        return true;
    } catch {
        return false;
    }
}

/**
 * Remove all image from target
 * @param {String} form 
 */
const resetReadImage = (form) => {
    $(form).find("img").removeAttr("src")
}

/**
 * Load current file image into target or generate after parent
 * @param {Event} event 
 * @param {String} imageTarget 
 */
const readImage = ({ event, input = null, imageTarget = null }) => {
    var tgt = document.querySelector(input) == null ? (event.currentTarget || window.event.srcElement) : document.querySelector(input)
    var files = tgt.files;


    const image = document.createElement("img")
    image.className = "img-thumbnail"

    console.log(files);

    console.log($(imageTarget ?? image), (files.length));
    if (FileReader && files && files.length) {
        var fr = new FileReader()
        fr.onload = event => {

            $(imageTarget ?? image).attr('src', event.target.result)
        }
        fr.readAsDataURL(input == null ? event.currentTarget.files[0] : tgt.files[0])
    }

    if (!imageTarget) {
        event.currentTarget.parentElement.after(image);
    }
}

/**
 * Addressing url into storage
 * @param {String} url 
 * @returns string
 */
const storage_path = (url) => {
    return `${window.location.origin}/storage/${url}`
}