$(document).ready(() => {
    $('select').select2({
        dropdownParent: $('#modal'),
    });

    const modalInstance = bootstrap.Modal.getOrCreateInstance(document.getElementById('modal'));

    function reloadTable() {
        window.LaravelDataTables['registration-table'].draw(false);
    }

    function resetForm() {
        $('#registration-form').trigger('reset');
        $('#registration-form select').val(null).trigger('change');
    }

    function populateFormFields(formSelector, data) {
        const form = $(formSelector);

        form.find('select[name="status"]').val(data.form.status).trigger('change');
        form.find('input[name="reason"]').val(data.form.reason).trigger('change');
    }

    function convertReligion(religion) {
        const religionMap = {
            islam: "Islam",
            christian: "Kristen",
            catholic: "Katolik",
            hindu: "Hindu",
            buddha: "Buddha",
            konghucu: "Konghucu",
            other: "Lainnya"
        };

        return religionMap[religion];
    }

    function generateDetailHTML(json) {
        const formatDate = (date) =>
            new Intl.DateTimeFormat('id-ID', { day: '2-digit', month: 'long', year: 'numeric' }).format(new Date(date));

        const upperCase = (string) => string?.toUpperCase() ?? '-';

        const fields = [
            { label: 'Nama Lengkap', value: json.name },
            { label: 'Email', value: json.email ?? '-' },
            { label: 'NIP', value: json.form.nip ?? '-' },
            { label: 'Tanggal Lahir', value: formatDate(json.form.dob) ?? '-' },
            { label: 'Agama', value: convertReligion(json.form.religion) ?? '-' },
            { label: 'Nomor Telepon', value: json.form.phone ?? '-' },
            { label: 'Pendidikan Terakhir', value: upperCase(json.form?.last_education) },
            { label: 'Jurusan', value: json.form.last_education_major ?? '-' },
            { label: 'Universitas', value: json.form.last_education_institution ?? '-' },
            { label: 'Unit Kerja', value: json.form.work_unit ?? '-' },
            { label: 'Jabatan', value: json.form?.position?.name ?? '-' },
            { label: 'Instansi', value: json.form?.instance?.name ?? '-' },
            { label: 'Pangkat/Golongan', value: json.form?.golongan?.name ?? '-' },
            { label: 'Keahlian', value: json.form?.skills?.map(skill => skill.name).join(', ') ?? '-' },
            { label: 'Periode', value: json.form?.periods?.map(period => period.name).join(', ') ?? '-' },
            { label: 'Provinsi', value: json.form?.province?.name ?? '-' },
            { label: 'Kabupaten/Kota', value: json.form?.district?.name ?? '-' },
            { label: 'Kecamatan', value: json.form?.subdistrict?.name ?? '-' },
            { label: 'Kelurahan', value: json.form?.village?.name ?? '-' },
            { label: 'Alamat Lengkap', value: json.form?.address ?? '-' },
            {
                label: 'Bukti Pembayaran',
                value: json.form.payment_proof_url
                ? `<img src="${json.form.payment_proof_url}" alt="Bukti Pembayaran" class="img-fluid" width="100%">`
                : 'Belum Melakukan Pembayaran'
            },
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

    $('#registration-form').submit((e) => e.preventDefault());

    $(document).on('hide.bs.modal', (event) => {
        if (document.activeElement) document.activeElement.blur();
    });

    window.onSubmit = function (event) {
        if (document.activeElement) document.activeElement.blur();
        submitForm('#registration-form', onCreated);
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

    window.onEdit = function (event) {
        resetForm();
        const target = $(event.currentTarget).closest('[data-json]');
        if (target.length > 0) {
            const json = target.data('json');
            $('#registration-form h5#modal-title').text('Edit ' + json.name);

            // field form
            toggleReasonField(json.form.status);
            $('#registration-form').find('select[name="status"]').on('change', function () {
                const newStatus = $(this).val();
                toggleReasonField(newStatus);
            });

            populateFormFields('#registration-form', json);
            $('#registration-form')
                .attr('action', route('registration.update', json.id))
                .attr('method', 'PUT');
        } else {
            console.warn('Data JSON tidak ditemukan');
        }
    };

    function toggleReasonField(status) {
        if (status !== 'rejected') {
            $('#registration-form').find('.col-reason').addClass('d-none');
            $('#registration-form').find('input[name="reason"]').prop('disabled', true).prop('readonly', true).removeAttr('required');
        } else {
            $('#registration-form').find('.col-reason').removeClass('d-none');
            $('#registration-form').find('input[name="reason"]').prop('disabled', false).prop('readonly', false).attr('required', true);
        }
    }

    window.onDelete = function (event) {
        const target = $(event.currentTarget).closest('[data-json]');
        if (target.length > 0) {
            const json = target.data('json');
            deleteForm(route('registration.destroy', json.id), reloadTable);
        } else {
            console.warn('Data JSON tidak ditemukan');
        }
    };
});
