$(document).ready(() => {
    $('select').select2();

    $('#register-form').submit((e) => e.preventDefault());

    window.onSubmit = function (event) {
        if (document.activeElement) document.activeElement.blur();
        submitForm('#register-form', null);
    };

    $('button#search-btn').on('click', function () {
        const nip = $('#input-search').val();

        if (nip === '') {
            $('#user-result').html('<p>Masukkan NIP untuk mencari data.</p>');
            return;
        }

        $.ajax({
            url: `${window.location.origin}/api/users`,
            method: 'GET',
            data: {
                search: nip
            },
            success: function(response) {
                if (response.success) {
                  const user = response.data?.data[0] || [];

                  populateFormFields('#register-form', user);
                } else {
                    $('#user-result').html(`<p>Data user tidak ditemukan</p>`);
                }
            },
            error: function() {
                $('#user-result').html('<p>Terjadi kesalahan. Silakan coba lagi.</p>');
            }
        });
    });

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

    $("select#province_id").select2({
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
        ajax: createAjaxConfig("villages", (data) => {
            const items = data.data?.data || [];

            return {
                results: items
                .filter(item => item.subdistrict_id == $("#subdistrict_id").val())
                .map(item => ({
                    id: item.id,
                    text: item.name
                })),
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