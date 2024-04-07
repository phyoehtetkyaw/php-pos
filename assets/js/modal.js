function closeModals()
{
    $("#destroy-id").val("");
    $(".modal").hide();
}

function toggleModal($selector, $id = null)
{
    if ($selector.split("-")[0] == "#destroy") {
        $("#destroy-id").val($id);
    }
    console.log($id);
    $($selector).show();
}