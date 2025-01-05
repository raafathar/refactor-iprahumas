$(document).ready(() => {
    $('select').select2({
        dropdownParent: $('#modal'),
    });

    const modalInstance = bootstrap.Modal.getOrCreateInstance(document.getElementById('modal'));

    function reloadTable() {
        window.LaravelDataTables['usersetting-table'].draw(false);
    }

    function resetForm() {
        $('#usersetting-form').trigger('reset');
        $('#usersetting-form select').val(null).trigger('change');
    }

    function populateFormFields(formSelector, data) {
        const form = $(formSelector);

        form.find('input[name="name"]').val(data.name).trigger('change');
        form.find('input[name="email"]').val(data.email).trigger('change');
        form.find('select[name="role"]').val(data.role).trigger('change');
    }

    function generateDetailHTML(json) {
        const formatDate = (date) =>
            new Intl.DateTimeFormat('id-ID', { day: '2-digit', month: 'long', year: 'numeric' }).format(new Date(date));

        const upperCase = (string) => string.toUpperCase();

        const fields = [
            { label: 'Nama Lengkap', value: json.name },
            { label: 'Email', value: json.email },
            { label: 'Role', value: json.role },
        ];

        return fields
            .map(field => `
                <div class="col-md-12">
                    <div class="form-group row mb-3">
                        <label class="form-label text-start col-md-12">${field.label}:</label>
                        <div class="col-md-12">
                            <p>${field.value}</p>
                        </div>
                    </div>
                </div>
            `)
            .join('');
    }

    function onCreated() {
        modalInstance.hide();
        reloadTable();
    }

    $('#usersetting-form').submit((e) => e.preventDefault());

    $(document).on('hide.bs.modal', (event) => {
        if (document.activeElement) document.activeElement.blur();
    });

    window.onSubmit = function (event) {
        if (document.activeElement) document.activeElement.blur();
        submitForm('#usersetting-form', onCreated);
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
        $('#usersetting-form h5#modal-title').text('Tambah Pengguna');

        $('#usersetting-form')
            .attr('action', route('user-settings.store'))
            .attr('method', 'POST');
    };

    window.onEdit = function (event) {
        resetForm();
        const target = $(event.currentTarget).closest('[data-json]');
        if (target.length > 0) {
            const json = target.data('json');
            $('#usersetting-form h5#modal-title').text('Edit ' + json.name);

            populateFormFields('#usersetting-form', json);
            $('#usersetting-form')
                .attr('action', route('user-settings.update', json.id))
                .attr('method', 'PUT');
        } else {
            console.warn('Data JSON tidak ditemukan');
        }
    };

    window.onDelete = function (event) {
        const target = $(event.currentTarget).closest('[data-json]');
        if (target.length > 0) {
            const json = target.data('json');
            deleteForm(route('user-settings.destroy', json.id), reloadTable);
        } else {
            console.warn('Data JSON tidak ditemukan');
        }
    };
});
