$(document).ready(() => {
    $('select').select2({
        dropdownParent: $('#modal'),
    });

    const modalInstance = bootstrap.Modal.getOrCreateInstance(document.getElementById('modal'));

    function reloadTable() {
        window.LaravelDataTables['period-table'].draw(false);
    }

    function resetForm() {
        $('#period-form').trigger('reset');
        $('#period-form select').val(null).trigger('change');
    }

    function populateFormFields(formSelector, data) {
        const form = $(formSelector);

        form.find('input[name="name"]').val(data.name).trigger('change');
        form.find('select[name="status"]').val(data.status).trigger('change');
        form.find('input[name="start_date"]').val(new Date(data.start_date).toISOString().split('T')[0]).trigger('change');
        form.find('input[name="end_date"]').val(new Date(data.end_date).toISOString().split('T')[0]).trigger('change');
    }

    function generateDetailHTML(json) {
        const formatDate = (date) => 
            new Intl.DateTimeFormat('id-ID', { day: '2-digit', month: 'long', year: 'numeric' }).format(new Date(date));

        const upperCase = (string) => string.toUpperCase();
        
        const fields = [
            { label: 'Nama Periode', value: json.name },
            { label: 'Status', value: upperCase(json.status) },
            { label: 'Tanggal Mulai', value: formatDate(json.start_date) },
            { label: 'Tanggal Berakhir', value: formatDate(json.end_date) },
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

    $('#period-form').submit((e) => e.preventDefault());

    $(document).on('hide.bs.modal', (event) => {
        if (document.activeElement) document.activeElement.blur();
    });

    window.onSubmit = function (event) {
        if (document.activeElement) document.activeElement.blur();
        submitForm('#period-form', onCreated);
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
        $('#period-form h5#modal-title').text('Tambah Periode');

        $('#period-form')
                .attr('action', route('periods.store'))
                .attr('method', 'POST');
    };

    window.onEdit = function (event) {
        resetForm();
        const target = $(event.currentTarget).closest('[data-json]');
        if (target.length > 0) {
            const json = target.data('json');
            $('#period-form h5#modal-title').text('Edit ' + json.name);

            populateFormFields('#period-form', json);

            $('#period-form')
                .attr('action', route('periods.update', json.id))
                .attr('method', 'PUT');
        } else {
            console.warn('Data JSON tidak ditemukan');
        }
    };

    window.onDelete = function (event) {
        const target = $(event.currentTarget).closest('[data-json]');
        if (target.length > 0) {
            const json = target.data('json');
            deleteForm(route('periods.destroy', json.id), reloadTable);
        } else {
            console.warn('Data JSON tidak ditemukan');
        }
    };
});