import axios from "axios";

$("#btnConfirmed").on("click", function(event) {
    $("#spinner").css("display", "block");
    let url = $(this).data("url");
    axios
        .put(url)
        .then(response => {
            location.reload();
        })
        .catch(error => {
            location.reload();
        });
});

$("#exampleModal").on("show.bs.modal", function(event) {
    var button = $(event.relatedTarget);
    var modal = $(this);
    if (button.data("type") == 1) {
        modal
            .find("h5")
            .html(
                "Are you sure you want to confirm the user <b>" +
                    button.data("name") +
                    "</b>?"
            );
        $("#btnConfirmed").data("url", button.data("url"));
    } else if (button.data("type") == 2) {
        modal
            .find("h5")
            .html(
                "Are you sure you want to reject the user <b>" +
                    button.data("name") +
                    "</b>?"
            );
        $("#btnConfirmed").data("url", button.data("url"));
    }
});
