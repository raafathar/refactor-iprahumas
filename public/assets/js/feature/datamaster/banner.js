$(document).ready(() => {
    const modalInstance = bootstrap.Modal.getOrCreateInstance(document.getElementById('modal-created'));

    const modalInstanceUpdate = bootstrap.Modal.getOrCreateInstance(document.getElementById('modal-update'));


    // console.log($("#banner-form"));
    $("#banner-form").submit(e => e.preventDefault())



    function onCreated() {
        modalInstance.hide();
        resetReadImage("#banner-form")
        reloadTable();
    }

    function reloadTable() {
        window.LaravelDataTables['banner-table'].draw(false);
    }

    window.onDelete = (event) => {
        const target = $(event.currentTarget).closest('[data-json]');

        if (target.length > 0) {
            const json = target.data('json');

            deleteForm(route('banners.destroy', json.id), reloadTable);
        } else {
            console.warn('Data JSON tidak ditemukan');
        }
    }

    const generateFormUpdate = (json) => {

        return ` <!-- Judul -->
                    <div class="form-group mb-3">
                        ${Form({ title: "Judul", name: "b_title", value: json.b_title, required: true })}
                    </div>

                    <!-- Gambar -->
                    <div class="mb-3">
                        ${Form({ title: "Gambar", name: "b_image", type: "file" })}
                        <img src="${storage_path(json.b_image)}"
                            class="img-fluid img-thumbnail shadow-none mb-3 mt-4" alt="Banner update">
                    </div>

                    <!-- is Active -->
                    <div class="form-check form-switch mb-3">
                       ${Form({ title: "Aktif", name: "b_is_active", type: "checkbox", condition: () => json.b_is_active == "1" ? "checked" : "" })}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn bg-danger-subtle text-danger"
                            data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary" onclick="onUpdate(event)">Update</button>
                    </div>

                    `
    }

    $("input[name='b_image']").change(event => {
        readImage(event, "#b_image-show")
    })

    window.onSubmit = function (event) {
        event.preventDefault()
        if (document.activeElement) document.activeElement.blur();
        submitForm('#banner-form', onCreated);
    };

    window.onEdit = (event) => {
        event.preventDefault()

        const target = $(event.currentTarget).closest('[data-json]');

        console.log(target);
        if (target.length > 0) {
            const json = target.data('json');
            $("form#banner-form-update").attr("action", route("banners.update", json.id))
            $('h5#modal-detail-update').text('Update ' + json.b_title);
            console.log($('h5#modal-detail-update'));
            $('#modal-body-update').html(generateFormUpdate(json));
        }
    }

    window.onUpdate = (event) => {
        event.preventDefault()
        if (document.activeElement) document.activeElement.blur();
        submitForm('#banner-form-update', () => {
            modalInstanceUpdate.hide()
            reloadTable()
        });
    }
})