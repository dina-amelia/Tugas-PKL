$(".delete-confirm").click(function (event) {
    var form = $(this).closest("form");
    var name = $(this).data("name");
    event.preventDefault();
    Swal.fire({
        title: "Apakah kamu yakin?",
        text: "Kamu tidak dapat mengembalikan ini!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Ya, hapus saja",
    }).then((result) => {
        if (result.isConfirmed) {
            form.submit();
        }
    });
});
