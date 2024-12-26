$(document).ready(() => {
    $('select').select2({
        dropdownParent: $('#modal'),
    });

    const modalInstance = bootstrap.Modal.getOrCreateInstance(document.getElementById('modal'));

    function reloadTable() {
        window.LaravelDataTables['users-table'].draw(false);
    }

    function resetForm() {
        $('#users-form').trigger('reset');
        $('#users-form select').val(null).trigger('change');
    }

    function populateFormFields(formSelector, data) {
        const form = $(formSelector);

        form.find('input[name="name"]').val(data.name).trigger('change');
        form.find('input[name="nip"]').val(data.form.nip).trigger('change');
        form.find('input[name="email"]').val(data.email).trigger('change');
        form.find('select[name="position_id"]').val(data.form.position_id).trigger('change');
        form.find('select[name="instance_id"]').val(data.form.instance_id).trigger('change');
        form.find('select[name="golongan_id"]').val(data.form.golongan_id).trigger('change');
        form.find('input[name="work_unit"]').val(data.form.work_unit).trigger('change');
        form.find('select[name="skill_id"]').val(data.form.skill_id).trigger('change');
        form.find('input[name="dob"]').val(new Date(data.form.dob).toISOString().split('T')[0]).trigger('change');
        form.find('select[name="religion"]').val(data.form.religion).trigger('change');
        form.find('input[name="phone"]').val(data.form.phone).trigger('change');
        form.find('select[name="last_education"]').val(data.form.last_education).trigger('change');
        form.find('input[name="last_education_major"]').val(data.form.last_education_major).trigger('change');
        form.find('input[name="last_education_institution"]').val(data.form.last_education_institution).trigger('change');
        $('#province_id').append(new Option(data.form.province.name, data.form.province.id, true, true)).trigger('change');
        $('#district_id').append(new Option(data.form.district.name, data.form.district.id, true, true)).trigger('change');
        $('#subdistrict_id').append(new Option(data.form.subdistrict.name, data.form.subdistrict.id, true, true)).trigger('change');
        $('#village_id').append(new Option(data.form.village.name, data.form.village.id, true, true)).trigger('change');
        form.find('input[name="address"]').val(data.form.address).trigger('change');
    }

    function generateDetailHTML(json) {
        const formatDate = (date) => 
            new Intl.DateTimeFormat('id-ID', { day: '2-digit', month: 'long', year: 'numeric' }).format(new Date(date));

        const upperCase = (string) => string.charAt(0).toUpperCase() + string.slice(1);

        const fields = [
            { label: 'Nama Lengkap', value: json.name },
            { label: 'Email', value: json.email },
            { label: 'NIP', value: json.form.nip },
            { label: 'Tanggal Lahir', value: formatDate(json.form.dob) },
            { label: 'Agama', value: json.form.religion },
            { label: 'Nomor Telepon', value: json.form.phone },
            { label: 'Pendidikan Terakhir', value: upperCase(json.form.last_education) },
            { label: 'Jurusan', value: json.form.last_education_major },
            { label: 'Universitas', value: json.form.last_education_institution },
            { label: 'Unit Kerja', value: json.form.work_unit },
            { label: 'Jabatan', value: json.form.position.name },
            { label: 'Instansi', value: json.form.instance.name },
            { label: 'Pangkat/Golongan', value: json.form.golongan.name },
            { label: 'Keahlian', value: json.form.skill.name },
            { label: 'Provinsi', value: json.form.province.name },
            { label: 'Kabupaten/Kota', value: json.form.district.name },
            { label: 'Kecamatan', value: json.form.subdistrict.name },
            { label: 'Kelurahan', value: json.form.village.name },
            { label: 'Alamat Lengkap', value: json.form.address },
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

    $('#users-form').submit((e) => e.preventDefault());

    $(document).on('hide.bs.modal', (event) => {
        if (document.activeElement) document.activeElement.blur();
    });

    window.onSubmit = function (event) {
        if (document.activeElement) document.activeElement.blur();
        submitForm('#users-form', onCreated);
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
        $('#users-form h5#modal-title').text('Tambah Anggota');

        // field form
        $('#users-form').find('label[for="profile_picture"]').each(function() {
            if ($(this).find('.text-danger').length === 0) {
                $(this).append('<span class="text-danger">*</span>');
            }
        });
        $('#users-form').find('input[name="profile_picture"]').prop('required', true);

        $('#users-form')
                .attr('action', route('users.store'))
                .attr('method', 'POST');
    };

    window.onEdit = function (event) {
        resetForm();
        const target = $(event.currentTarget).closest('[data-json]');
        if (target.length > 0) {
            const json = target.data('json');
            $('#users-form h5#modal-title').text('Edit ' + json.name);

            // field form
            $('#users-form').find('input[name="email"]').prop('disabled', true).prop('readonly', true).removeAttr('required');
            $('#users-form').find('label[for="profile_picture"]').find('span.text-danger').remove();
            $('#users-form').find('input[name="profile_picture"]').removeAttr('required');

            populateFormFields('#users-form', json);
            $('#users-form')
                .attr('action', route('users.update', json.id))
                .attr('method', 'PUT');
        } else {
            console.warn('Data JSON tidak ditemukan');
        }
    };

    window.onDelete = function (event) {
        const target = $(event.currentTarget).closest('[data-json]');
        if (target.length > 0) {
            const json = target.data('json');
            deleteForm(route('users.destroy', json.id), reloadTable);
        } else {
            console.warn('Data JSON tidak ditemukan');
        }
    };

    $("select#province_id").select2({
        dropdownParent: $('#modal'),
        ajax: createAjaxConfig("provinces", (data) => {
            const items = data.data?.data || [];

            return {
                results: items.map(item => ({
                    id: item.id,
                    text: item.name
                }))
            };
        }),
        minimumInputLength: 2,
        cache: true,
    });

    $("select#district_id").select2({
        dropdownParent: $('#modal'),
        ajax: createAjaxConfig("districts", (data) => {
            const items = data.data?.data || [];

            return {
                results: items
                .filter(item => item.province_id == $("#province_id").val())
                .map(item => ({
                    id: item.id,
                    text: item.name
                }))
            };
        }),
        minimumInputLength: 2,
        cache: true,
    });

    $("select#subdistrict_id").select2({
        dropdownParent: $('#modal'),
        ajax: createAjaxConfig("subdistricts", (data) => {
            const items = data.data?.data || [];

            return {
                results: items
                .filter(item => item.district_id == $("#district_id").val())
                .map(item => ({
                    id: item.id,
                    text: item.name
                }))
            };
        }),
        minimumInputLength: 2,
        cache: true,
    });

    $("select#village_id").select2({
        dropdownParent: $('#modal'),
        ajax: createAjaxConfig("villages", (data) => {
            const items = data.data?.data || [];

            return {
                results: items
                .filter(item => item.subdistrict_id == $("#subdistrict_id").val())
                .map(item => ({
                    id: item.id,
                    text: item.name
                }))
            };
        }),
        minimumInputLength: 2,
        cache: true,
    });

    function createAjaxConfig(category, processData) {
        return {
            url: `${window.location.origin}/api/${category}`,
            dataType: 'json',
            delay: 500,
            data: function (params) {
                return {
                    search: params.term 
                };
            },
            processResults: processData,
        };
    }

    $("select#district_id").attr("disabled", true).val("").trigger("change")
    $("select#subdistrict_id").attr("disabled", true).val("").trigger("change")
    $("select#village_id").attr("disabled", true).val("").trigger("change")

    $("select#province_id").on("change", () => {
        $("select#district_id").attr("disabled", false).val("").trigger("change")
        $("select#subdistrict_id").attr("disabled", true).val("").trigger("change")
        $("select#village_id").attr("disabled", true).val("").trigger("change")
        $("select#village_id").val("")
    })

    $("select#district_id").on("change", () => {
        $("select#subdistrict_id").attr("disabled", false).val("").trigger("change")
        $("select#village_id").attr("disabled", true).val("").trigger("change")
    })

    $("select#subdistrict_id").on("change", () => {
        $("select#village_id").attr("disabled", false).val("").trigger("change")
    })
});