$(document).ready(() => {
    const modalInstance = bootstrap.Modal.getOrCreateInstance(document.getElementById('modal'));

    function reloadTable() {
        window.LaravelDataTables['letter-type-table'].draw(false);
    }

    function resetForm() {
        $('#letter-type-form').trigger('reset');
        $('#letter-type-form select').val(null).trigger('change');
    }

    function populateFormFields(formSelector, data) {
        const form = $(formSelector);

        form.find('input[name="name"]').val(data.name).trigger('change');
        form.find('input[name="kode"]').val(data.kode).trigger('change');
    }

    // function generateDetailHTML(json) {
    //     const fields = [
    //         { label: 'Urutan', value: json.kode },
    //         { label: 'Nama Pangkat/Golongan', value: json.name },
    //     ];

    //     return fields
    //         .map(field => `
    //             <div class="col-md-12">
    //                 <div class="form-group row mb-3">
    //                     <label class="form-label text-start col-md-12">${field.label}:</label>
    //                     <div class="col-md-12">
    //                         <p>${field.value}</p>
    //                     </div>
    //                 </div>
    //             </div>
    //         `)
    //         .join('');
    // }

    function onCreated() {
        modalInstance.hide();
        reloadTable();
    }

    $('#letter-type-form').submit((e) => e.preventDefault());

    $(document).on('hide.bs.modal', (event) => {
        if (document.activeElement) document.activeElement.blur();
    });

    window.onSubmit = function (event) {
        if (document.activeElement) document.activeElement.blur();
        submitForm('#letter-type-form', onCreated);
    };

    window.onDetail = function (event) {
        const target = $(event.currentTarget).closest('[data-json]');
        if (target.length > 0) {
            const json = target.data('json');
            $('#modal-detail h5#modal-title').text('Detail ' + json.name);
            $('#add-detail-content').html(generateDetailHTML(json));
        } else {
            console.warn('Data JSON tidak ditemukan');
        }
    };

    window.onStore = function (event) {
        resetForm();
        $('#letter-type-form h5#modal-title').text('Tambah Kode Jenis');

        $('#letter-type-form')
                .attr('action', route('letter-types.store'))
                .attr('method', 'POST');
    };

    window.onEdit = function (event) {
        resetForm();
        const target = $(event.currentTarget).closest('[data-json]');
        if (target.length > 0) {
            const json = target.data('json');
            $('#letter-type-form h5#modal-title').text('Edit ' + json.name);

            populateFormFields('#letter-type-form', json);

            $('#letter-type-form')
                .attr('action', route('letter-types.update', json.id))
                .attr('method', 'PUT');
        } else {
            console.warn('Data JSON tidak ditemukan');
        }
    };

    window.onDelete = function (event) {
        const target = $(event.currentTarget).closest('[data-json]');
        if (target.length > 0) {
            const json = target.data('json');
            deleteForm(route('letter-types.destroy', json.id), reloadTable);
        } else {
            console.warn('Data JSON tidak ditemukan');
        }
    };
});