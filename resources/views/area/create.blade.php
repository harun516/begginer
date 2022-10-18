<!-- Modal -->
<div class="modal fade" id="modal-create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Area</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="form-group">
                    <label for="name" class="control-label">Area id</label>
                    <input type="text" class="form-control" id="area_id">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-area_id"></div>
                </div>

                <div class="form-group">
                    <label for="name" class="control-label">Area Name</label>
                    <input type="text" class="form-control" id="name">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-name"></div>
                </div>

                <div class="form-group">
                    <label for="name" class="control-label">Address</label>
                    <input type="text" class="form-control" id="address">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-address"></div>
                </div>

                <div class="form-group">
                    <label for="name" class="control-label">Link Address</label>
                    <input type="text" class="form-control" id="link_address">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-link_address"></div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">TUTUP</button>
                <button type="button" class="btn btn-primary" id="store">SIMPAN</button>
            </div>
        </div>
    </div>
</div>

<script>
    //button create post event
    $('body').on('click', '#btn-create-post', function() {

        //open modal
        $('#modal-create').modal('show');
    });

    //action create post
    $('#store').click(function(e) {
        e.preventDefault();

        //define variable
        let area_id = $('#area_id').val();
        let name = $('#name').val();
        let address = $('#address').val();
        let link_address = $('#link_address').val();
        let token = $("meta[name='csrf-token']").attr("content");

        //ajax
        $.ajax({

            url: `/area`,
            type: "POST",
            cache: false,
            data: {
                "area_id": area_id,
                "name": name,
                "address": address,
                "link_address": link_address,
                "_token": token
            },
            success: function(response) {

                //show success message
                Swal.fire({
                    type: 'success',
                    icon: 'success',
                    title: `${response.message}`,
                    showConfirmButton: false,
                    timer: 3000
                });

                //data post
                let post = `
                    <tr id="index_${response.data.area_id}">
                        <td>${response.data.name}</td>
                        <td>${response.data.address}</td>
                        <td>${response.data.link_address}</td>
                        <td class="text-center">
                            <a href="javascript:void(0)" id="btn-edit-post" data-id="${response.data.area_id}" class="btn btn-primary btn-sm">Edit</a>
                            <a href="javascript:void(0)" id="btn-delete-post" data-id="${response.data.area_id}" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                `;

                //append to table
                $('#table-posts').prepend(post);

                //clear form
                $('#area_id').val('');
                $('#name').val('');
                $('#address').val('');
                $('#link_address').val('');

                //close modal
                $('#modal-create').modal('hide');


            },
            error: function(error) {

                if (error.responseJSON.area_id[0]) {

                    //show alert
                    $('#alert-area_id').removeClass('d-none');
                    $('#alert-area_id').addClass('d-block');

                    //add message to alert
                    $('#alert-area_id').html(error.responseJSON.area_id[0]);
                }

                if (error.responseJSON.name[0]) {

                    //show alert
                    $('#alert-name').removeClass('d-none');
                    $('#alert-name').addClass('d-block');

                    //add message to alert
                    $('#alert-name').html(error.responseJSON.name[0]);
                }

                if (error.responseJSON.address[0]) {

                    //show alert
                    $('#alert-address').removeClass('d-none');
                    $('#alert-address').addClass('d-block');

                    //add message to alert
                    $('#alert-address').html(error.responseJSON.address[0]);
                }

                if (error.responseJSON.link_address[0]) {

                    //show alert
                    $('#alert-link_address').removeClass('d-none');
                    $('#alert-link_address').addClass('d-block');

                    //add message to alert
                    $('#alert-link_address').html(error.responseJSON.link_address[0]);
                }

            }

        });

    });
</script>
