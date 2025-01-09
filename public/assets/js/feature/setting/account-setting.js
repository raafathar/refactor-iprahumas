$(document).ready(() => {
    $('select').select2({});

    function reloadPage() {
        location.reload();
    }

    function populateFormFields(formSelector, data) {
        const form = $(formSelector);

        form.find('input[name="name"]').val(data.name).trigger('change');
        form.find('input[name="email"]').val(data.email).trigger('change');

        // if role user is user
        if (data.role == 'user') {
            form.find('input[name="nip"]').val(data.form.nip).trigger('change');
            form.find('input[name="new_member_number"]').val(data.form.new_member_number).trigger('change');
            form.find('select[name="position_id"]').val(data.form.position_id).trigger('change');
            form.find('select[name="instance_id"]').val(data.form.instance_id).trigger('change');
            form.find('select[name="golongan_id"]').val(data.form.golongan_id).trigger('change');
            form.find('input[name="work_unit"]').val(data.form.work_unit).trigger('change');
            form.find('select[name="skill_id[]"]').val(data.form.skills.map(skill => skill.id)).trigger('change');
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
    }

    const json = $('#account-setting-form').data('json');
    populateFormFields('#account-setting-form', json);

    $('#account-setting-form').submit((e) => e.preventDefault());

    $("input#profile_picture").change(function (e) {
        const file = e.target.files[0];
        const reader = new FileReader();
        reader.onloadend = function () {
            $("#image-preview").attr("src", reader.result);
        }
        reader.readAsDataURL(file);
    });

    window.onSubmit = function (event) {
        // if (document.activeElement) document.activeElement.blur();
        submitForm('#account-setting-form', null);
    };

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
                    search: params.term,
                    filter: getFilterValue(category)
                };
            },
            processResults: processData,
        };
    }

    function getFilterValue(category) {
        switch (category) {
            case "districts":
                return $("#province_id").val();
            case "subdistricts":
                return $("#district_id").val();
            case "villages":
                return $("#subdistrict_id").val();
            default:
                return null;
        }
    }
});
