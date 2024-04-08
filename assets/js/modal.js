function closeModals()
{
    $("#destroy-id").val("");
    $(".modal").hide();
    $("input").val("");
}

function toggleModal(selector, id = null)
{
    const mode = selector.split("-")[0];
    if (mode == "#destroy") {
        $("#destroy-id").val(id);
    } else if (mode == "#edit") {
        $("#edit-id").val(id);
        const response = getData(id);

        if (response.status == 200) {
            $("#edit-category form input[name='name']").val(response.data.name);
        }
    }
    $(selector).show();
}

function getData(id) {
    let response = null;
    $.ajax({
        url: `/api/get_category.php?id=${id}`,
        method: "GET",
        async: false,
        success: function(res) {
            response = res;
        },
        error: function(err) {
            console.error(err);
        }
    })

    return response;
}