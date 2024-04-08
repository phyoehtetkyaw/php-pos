function closeModals()
{
    $("#destroy-id").val("");
    $(".modal").hide();
    $("input").val("");
}

function toggleModal(selector, id = null)
{
    const mode = selector.split("-")[0];
    const name = selector.split("-")[1];
    
    if (mode == "#destroy") {
        $("#destroy-id").val(id);
    } else if (mode == "#edit") {
        $("#edit-id").val(id);
        const response = getData(id, name);

        if (response.status == 200) {
            $(`#edit-${name} form input[name='name']`).val(response.data.name);
        }
    }
    $(selector).show();
}

function getData(id, name) {
    let response = null;
    $.ajax({
        url: `/api/get_${name}.php?id=${id}`,
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