$(document).ready(() => {
    function reloadTable() {
        window.LaravelDataTables['page-profile-table'].draw(false);
    }

    window.onDelete = (event) => {
        const target = $(event.currentTarget).closest('[data-json]');

        if (target.length > 0) {
            const json = target.data('json');

            console.log(json);

            deleteForm(route('page-profile.destroy', json.id), reloadTable);
        } else {
            console.warn('Data JSON tidak ditemukan');
        }
    };
});