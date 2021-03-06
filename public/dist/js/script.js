const { Alert } = require("bootstrap");

function alertDeleteElement(id, path) {
    // body...
    // alert(path);
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'btn btn-danger'
        },
        buttonsStyling: true
    })

    swalWithBootstrapButtons.fire({
        title: 'Confirmer La Suppression?',
        text: "Cette action est irreversible!",
        icon: 'warning',
        width: 600,
        padding: '3em',
        backdrop: `
        rgba(68,68,68,0.7)
        `
        ,

        showCancelButton: true,
        confirmButtonText: 'Oui, Supprimer!',
        cancelButtonText: 'Non!',
        reverseButtons: true
    }).then((result) => {

        if (result.isConfirmed) {
            var data = {
                // "_token": $('input[name=_token]').val(),
                "id": id,
            }
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "DELETE",
                url: path,
                data: data,
                success: function (response) {
                    swalWithBootstrapButtons.fire(
                        response['status'],
                        '....',
                        'success',
                    ).then((result) => {
                        if (response['type'] !== 'error') {
                            location.reload();
                        }
                    });
                }
            });
        } else if (
            /* Read more about handling dismissals below */
            result.dismiss === Swal.DismissReason.cancel
        ) {
            swalWithBootstrapButtons.fire(
                'Annulé',
                'Suppression annulée',
                'error'
            )
        }
    });

}


function sendComment() {
    var phase = document.getElementById('phase_id');
    var user = document.getElementById('user_id');
    var commentaire = document.getElementById('commentaire');
    // alert(phase.value)
    console.log(phase);
    var data = {
        "phase_id": id,
        "user_id": user,
        "commentaire": commentaire
      }
    $.ajax({
        type: "GET",
        url: "/user/commentaire",
        data: data,
        success: function (response) {

        Swal.fire({
            icon: 'success',
            title: response['status'],
            showConfirmButton: true,
            timer: 4000
        }).then((result) => {
            console.log(response.id)
            alert("Commentaire ok")
        });
        }
    });
    console.log(data);
    return false;
}
