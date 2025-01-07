$(document).ready(() => {
    function reloadTable() {
        window.LaravelDataTables['beritas-table'].draw(false);
    }

    function onCreated() {

        resetReadImage("#berita-form")
        location.href = route("beritas.index")
    }

    $("input[name='b_image']").change(event => {
        resetReadImage("form#berita-form")

        var findImage = $("input[name='b_image']").parent().parent().find("img#b_image-update")
        if (findImage.length > 0) {
            readImage({ event: event, imageTarget: "img#b_image-update" })
        } else {
            readImage({ event: event })
        }

    })

    window.onUpdate = (event) => {
        event.preventDefault()
        if (document.activeElement) document.activeElement.blur();
        $("textarea[name='b_content']").text(ContentEditor.getData())
        submitForm('#berita-form', () => {
            readImage({ event: event, input: "input[name='b_image']", imageTarget: "img#b_image-update" })
            location.reload()
        });
    }

    window.onSubmit = (event) => {
        event.preventDefault()
        if (document.activeElement) document.activeElement.blur();
        $("textarea[name='b_content']").text(ContentEditor.getData())
        submitForm('#berita-form', onCreated);
    };

    window.onDelete = (event) => {
        const target = $(event.currentTarget).closest('[data-json]');

        if (target.length > 0) {
            const json = target.data('json');

            deleteForm(route('beritas.destroy', json.id), reloadTable);
        } else {
            console.warn('Data JSON tidak ditemukan');
        }
    };
});