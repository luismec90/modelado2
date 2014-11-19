$(function () {

    $("#toast-container").delay(3000).fadeOut('normal');

    $("form").submit(function (e) {
        $(this).find('[type=submit]').each(function (index) {
            $(this).data("loading-text", "Enviando...").button("loading");
        });
    });

    $("#btn-subir-imagen").click(function () {
        $("#modal-subir-imagen").modal();
    });

    $("#div-imagenes .btn-eliminar-imagen").click(function () {
        $("#photo_id").val($(this).data("photo-id"));
        $("#modal-eliminar-imagen").modal();
    });

    $("#div-albumes .btn-eliminar-album").click(function () {
        $("#album_id").val($(this).data("album-id"));
        $("#modal-eliminar-album").modal();
    });

    $("body").on("change", ".btn-file :file", function () {
        var input = $(this);
        var label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
        input.parent().parent().siblings("input").val(label);
    });
    $('.images').abigimage();
});