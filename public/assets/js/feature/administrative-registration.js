$(`select`).select2()

// $("select#province_id").select2({
//     ajax: {
//         url: `${window.location.origin}/api/provinces`,
//         dataType: 'json',
//         delay: 500,
//         data: function (params) {
//             return {
//                 search: params.term
//             };
//         },
//         processResults: function (data) {
//             const items = data.data && data.data.data ? data.data.data : [];

//             return {
//                 results: items.map(item => ({
//                     id: item.id,
//                     text: item.name
//                 }))
//             };
//         }
//     },
//     minimumInputLength: 1,
// });

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