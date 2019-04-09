$(document).ready(function () {


    $("table").on("click", ".btn-delete", function (e) {

        var href = $(this).data("href");
        swal({
            title: 'Emin misiniz?',
            text: "Kaydı kalıcı olarak silmek istedğinizden!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Evet Sil!',
            cancelButtonText: 'Vazgeç'
        }).then((result) => {
            if (result.value) {
                window.location.href = href;
            }
        })
    });




});

