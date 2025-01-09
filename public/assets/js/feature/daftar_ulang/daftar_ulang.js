$(document).ready(() => {
    $('select').select2({});

    function populateFormFields(formSelector, data) {
        const form = $(formSelector);

        // if role user is user
        if (data.role == 'user') {
            form.find('select[name="position_id"]').val(data.form.position_id).trigger('change');
            form.find('select[name="instance_id"]').val(data.form.instance_id).trigger('change');
            form.find('input[name="work_unit"]').val(data.form.work_unit).trigger('change');
            form.find('select[name="skill_id[]"]').val(data.form.skills.map(skill => skill.id)).trigger('change');
            form.find('input[name="work_unit"]').val(data.form.work_unit).trigger('change');

        }
    }

    const json = $('#re-register-form').data('json');

    populateFormFields('#re-register-form', json);

    $('#re-register-form').submit((e) => e.preventDefault());


    window.onSubmit = function (event) {
        if (document.activeElement) document.activeElement.blur();
        submitForm('#re-register-form', null);
    };
});
