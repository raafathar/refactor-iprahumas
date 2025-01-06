$(document).ready(function () {
    $(document).ready(() => {

        function onCreated() {
            resetReadImage("#training-form")
            location.href = route("trainings.index")
        }

        window.onDelete = (event) => {
            const target = $(event.currentTarget).closest('[data-json]');

            if (target.length > 0) {
                const json = target.data('json');
                deleteForm(route('trainings.destroy', json.id), reloadTable);
            } else {
                console.warn('Data JSON tidak ditemukan');
            }
        }

        function reloadTable() {
            window.LaravelDataTables['training-table'].draw(false);
        }

        $("input[name='p_image']").change(event => {
            resetReadImage("form#training-form")

            var findImage = $("input[name='p_image']").parent().parent().find("img#p_image-update")
            if (findImage.length > 0) {
                readImage({ event: event, imageTarget: "img#p_image-update" })
            } else {
                readImage({ event: event })
            }

        })

        window.onSubmit = (event) => {
            event.preventDefault()
            if (document.activeElement) document.activeElement.blur();
            submitForm('#training-form', onCreated);
        };

        window.onEdit = (event) => {
            event.preventDefault()

            const target = $(event.currentTarget).closest('[data-json]');

            if (target.length > 0) {
                const json = target.data('json');
                $("form#banner-form-update").attr("action", route("banners.update", json.id))
                $('h5#modal-detail-update').text('Update ' + json.b_title);
                $('#modal-body-update').html(generateFormUpdate(json));
            }
        }

        window.onUpdate = (event) => {
            event.preventDefault()
            if (document.activeElement) document.activeElement.blur();
            submitForm('#training-form', () => {
                readImage({ event: event, input: "input[name='p_image']", imageTarget: "img#p_image-update" })
                location.reload()
            });
        }

        window.onSubmitRegistration = (event) => {
            event.preventDefault()
            if (document.activeElement) document.activeElement.blur();
            submitForm('#form-registration', () => { });
        }
    })
});