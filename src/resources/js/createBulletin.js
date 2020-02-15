function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            localStorage["currentImage"] = $("#image").attr("src");
            $("#image").attr("src", e.target.result);
        };

        reader.readAsDataURL(input.files[0]);
    }
}

$("#delete").on("click", function() {
    $("#image").attr("src", localStorage["currentImage"]);
});

$("#inputImage").change(function() {
    readURL(this);
});
