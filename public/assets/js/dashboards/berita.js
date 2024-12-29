$(document).ready(() => {
    window.onDelete = function (event) {
        const target = $(event.currentTarget).closest('[data-json]');
        if (target.length > 0) {
            const json = target.data('json');
            deleteForm(route('beritas.destroy', json.id), reloadTable);
        } else {
            console.warn('Data JSON tidak ditemukan');
        }
    };
});