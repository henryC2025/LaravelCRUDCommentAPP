require("./bootstrap");

import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.start();

let commentCategory = "";
let commentCode = "";

function getTableName(tableID) {
    if (tableID == "TableResults") {
        commentCategory = "result";
        commentCode = "RO";
    } else if (tableID == "TableTerminology") {
        commentCategory = "terminology";
        commentCode = "TE";
    }
}

function isValidEmailAddress(emailAddress) {
    var validation = new RegExp(
        /^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i
    );
    return validation.test(emailAddress);
}

$(document).ready(function ($) {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $("#addNewComment").click(function () {
        $("#addEditCommentForm").trigger("reset");
        $("#ajaxCommentModel").html("Add Comment");
        $("#ajax-comment-model").modal("show");
    });

    $("body").on("click", ".edit", function () {
        var id = $(this).data("id");
        var tableID = $(this).closest("table").attr("id");
        getTableName(tableID);

        // ajax
        $.ajax({
            type: "POST",
            url: `edit-${commentCategory}-comment`,
            data: {
                id: id,
            },
            dataType: "json",
            success: function (res) {
                $("#ajaxCommentModel").html("Edit Comment");
                $("#ajax-comment-model").modal("show");
                $("#id").val(res.id);
                $("#comment_name").val(res.comment_name);
                $("#forename").val(res.forename);
                $("#surname").val(res.surname);
                $("#email").val(res.email);
                $("#validated").val(res.validated);
                $("#style").val(res.style);
            },
        });
    });

    $("body").on("click", ".delete", function () {
        var tableID = $(this).closest("table").attr("id");
        getTableName(tableID);

        if (confirm("Delete Record?") == true) {
            var id = $(this).data("id");

            // ajax
            $.ajax({
                type: "POST",
                url: `delete-${commentCategory}-comment`,
                data: {
                    id: id,
                },
                dataType: "json",
                success: function (res) {
                    window.location.reload();
                },
            });
        }
    });

    $("body").on("click", ".addBtn", function (event) {
        const validationLabel = document.querySelector("#validationLabel");
        const validationDiv = document.querySelector("#validationDiv");
        const styleLabel = document.querySelector("#styleLabel");
        const styleDiv = document.querySelector("#styleDiv");

        validationLabel.classList.add("hidden");
        validationDiv.classList.add("hidden");
        styleLabel.classList.add("hidden");
        styleDiv.classList.add("hidden");

        var tableID = $(this).closest("table").attr("id");
        getTableName(tableID);
    });

    $("body").on("click", "#edit-button", function (event) {
        const validationLabel = document.querySelector("#validationLabel");
        const validationDiv = document.querySelector("#validationDiv");
        const styleLabel = document.querySelector("#styleLabel");
        const styleDiv = document.querySelector("#styleDiv");

        validationLabel.classList.remove("hidden");
        validationDiv.classList.remove("hidden");
        styleLabel.classList.remove("hidden");
        styleDiv.classList.remove("hidden");
    });

    $("body").on("click", "#btn-save", function (event) {
        var tableID = $(this).closest("table").attr("id");
        getTableName(tableID);

        var id = $("#id").val();
        var comment_id = commentCode.concat(String(id).padStart(2, "0"));
        var comment_name = $("#comment_name").val();
        var forename = $("#forename").val();
        var surname = $("#surname").val();
        var email = $("#email").val();
        var validated = $("#validated").val();
        var style = $("#style").val();

        if (!(id || comment_name || forename || surname || email)) {
            console.log("empty");
        }

        if (isValidEmailAddress(email)) {
            //Do stuff
            // ajax
            $.ajax({
                type: "POST",
                url: `add-update-${commentCategory}-comment`,
                data: {
                    id: id,
                    comment_id: comment_id,
                    comment_name: comment_name,
                    forename: forename,
                    surname: surname,
                    email: email,
                    validated: validated,
                    style: style,
                },
                dataType: "json",
                success: function (res) {
                    window.location.reload();
                    $("#btn-save").html("Submit");
                    $("#btn-save").attr("disabled", false);
                },
            });
        } else {
            alert("Invalid email");
        }
    });
});

$("#btnGet").click(function () {
    var message = "";

    //Loop through all checked CheckBoxes in GridView.
    $("#Table1 input[type=checkbox]:checked").each(function () {
        var row = $(this).closest("tr")[0];
        message += "⚫" + row.cells[2].innerHTML;
        message += "\n";
    });

    $("#TableTerminology input[type=checkbox]:checked").each(function () {
        var row = $(this).closest("tr")[0];
        message += "⚫" + row.cells[2].innerHTML;
        message += "\n";
    });

    $("#TableResults input[type=checkbox]:checked").each(function () {
        var row = $(this).closest("tr")[0];
        message += "⚫" + row.cells[2].innerHTML;
        message += "\n";
    });

    $("#message").html(message);

    return false;
});

$("#copy").click(function () {
    $("#message").select();
    document.execCommand("copy");
    alert("Copied On clipboard");
});

$("#clear").click(function () {
    $("#message").html("");
});

$(".selectall-button").click(function () {
    var checkBoxes = document.getElementsByTagName("input");
    for (var i = 0, max = checkBoxes.length; i < max; i++) {
        if (checkBoxes[i].type === "checkbox") checkBoxes[i].checked = true;
    }
});

$(".deselectall-button").click(function () {
    var checkBoxes = document.getElementsByTagName("input");
    for (var i = 0, max = checkBoxes.length; i < max; i++) {
        if (checkBoxes[i].type === "checkbox") checkBoxes[i].checked = false;
    }
});
