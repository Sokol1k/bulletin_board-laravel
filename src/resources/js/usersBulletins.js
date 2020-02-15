import axios from "axios";

$("#btnDelete").on("click", function(event) {
    $("#spinner").css("display", "block");
    let url = $(this).data("url");
    axios
        .delete(url)
        .then(response => {
            location.reload();
        })
        .catch(error => {
            location.reload();
        });
});

$("#deleteModal").on("show.bs.modal", function(event) {
    var button = $(event.relatedTarget);
    var modal = $(this);
    modal
        .find("h5")
        .html(
            "Are you sure you want to remove bulletin <b>" +
                button.data("name") +
                "</b>?"
        );
    $("#btnDelete").data("url", button.data("url"));
});
