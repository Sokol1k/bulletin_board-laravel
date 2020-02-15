require("./bootstrap");
require("./showMaps");
require("./createMaps");
require("./editMaps");
global.datepicker = require("./bootstrap-datepicker");
global.countrySelect = require("./countrySelect");
global.mask = require("./jquery.mask");

$("#inputEndDate").datepicker({
    format: "yyyy-mm-dd",
    startDate: "+0d"
});

$("#inputCountry").countrySelect({
    defaultCountry: "xx"
});

$("#inputPhone").mask("+00 (000) 000 00-00");

$("#countryCode").change(function() {
    if ($(this).val() < 10) {
        let mask = "+ " + $(this).val() + " (000) 000 00 00";
        let placeholder = "+ " + $(this).val() + " (___) ___ __ __";
        $("#inputPhone").mask(mask, { placeholder });
    } else if ($(this).val() < 100) {
        let mask = "+ " + $(this).val() + " (000) 000 00 00";
        let placeholder = "+ " + $(this).val() + " (___) ___ __ __";
        $("#inputPhone").mask(mask, { placeholder });
    } else if ($(this).val() < 1000) {
        let value = String($(this).val()).split("");
        let mask =
            "+ " + value[0] + value[1] + " (" + value[2] + "00) 000 00 00";
        let placeholder =
            "+ " + value[0] + value[1] + " (" + value[2] + "__) ___ __ __";
        $("#inputPhone").mask(mask, { placeholder, clearIfNotMatch: true });
    } else {
        let value = String($(this).val()).split("");
        let mask =
            "+ " +
            value[0] +
            value[1] +
            " (" +
            value[2] +
            value[3] +
            "0) 000 00 00";
        let placeholder =
            "+ " +
            value[0] +
            value[1] +
            " (" +
            value[2] +
            value[3] +
            "_) ___ __ __";
        $("#inputPhone").mask(mask, { placeholder });
    }
});

$("#inputImage").on("change", function() {
    if ($("#inputImage")[0].files[0].name.length >= 25) {
        $(".custom-file-label").text(
            $("#inputImage")[0].files[0].name.substr(0, 25) + "..."
        );
    } else {
        $(".custom-file-label").text($("#inputImage")[0].files[0].name);
    }
    $("#delete").css("display", "block");
});

$("#delete").on("click", function() {
    $(".custom-file-label").text("Choose file");
    $("#inputImage")[0].value = "";
    $("#delete").css("display", "none");
});

$(function() {
    $('[data-toggle="tooltip"]').tooltip();
});

if ($("#sessionStatus").val()) {
    $("#alertTextSuccess").text($("#sessionStatus").val());
    $(".alert-success")
        .fadeTo(3000, 500)
        .slideUp(500, function() {
            $(".alert-success").slideUp(500);
        });
}
if ($("#errorStatus").val()) {
    $("#alertTextDanger").text($("#errorStatus").val());
    $(".alert-danger")
        .fadeTo(3000, 500)
        .slideUp(500, function() {
            $(".alert-danger").slideUp(500);
        });
}
