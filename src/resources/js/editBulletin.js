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

var defaultImage = $('#inputDefaultImage').val();
console.log(defaultImage);

if($("#image").attr("src") != defaultImage) {
    $("#deleteImage").css("display", "block");
}

$("#inputImage").on("change", function() {
    $("#deleteImage").css("display", "none");
});

$("#delete").on("click", function() {
    $("#image").attr("src", localStorage["currentImage"]);
    if (localStorage["currentImage"] != defaultImage)
        $("#deleteImage").css("display", "block");
});

$("#deleteImage").on("click", function() {
    $("#image").attr("src", defaultImage);
    $('#inputDeleteImage').val('delete');
    $(this).css("display", "none");
});

$("#inputImage").change(function() {
    readURL(this);
});
