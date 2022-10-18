<!-- Modal -->
<div class="modal fade" id="modal-edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Area</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <input type="hidden" id="area_id">

                <div class="form-group">
                    <label for="name" class="control-label">Name Area</label>
                    <input type="text" class="form-control" id="name-edit">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-name-edit"></div>
                </div>

                <div class="form-group">
                    <label for="name" class="control-label">Address</label>
                    <input type="text" class="form-control" id="address-edit">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-address-edit"></div>
                </div>

                <div class="form-group">
                    <label for="name" class="control-label">Link Address</label>
                    <input type="text" class="form-control" id="link_address-edit">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-link_address-edit"></div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">TUTUP</button>
                <button type="button" class="btn btn-primary" id="update">UPDATE</button>
            </div>
        </div>
    </div>
</div>

<script>
      //button create post event
      $('body').on('click', '#btn-edit-post', function () {
        let area_id = $(this).data("id");
        //fetch detail post with ajax
        $.ajax({
            url: `/area/${area_id}`,
            type: "GET",
            cache: false,
            success:function(response){
                //fill data to form
                $('#area_id').val(response.data.area_id);
                $('#name-edit').val(response.data.name);
                $('#address-edit').val(response.data.address);
                $('#link_address-edit').val(response.data.link_address);
                //open modal
                $('#modal-edit').modal('show');
            }
        });
    });
    //action update post
    $('#update').click(function(e) {
        e.preventDefault();

        //define variable
        let area_id = $('#area_id').val();
        let name = $('#name-edit').val();
        let address = $('#address-edit').val();
        let link_address = $('#link_address-edit').val();
        let token = $("meta[name='csrf-token']").attr("content");

        //ajax
        $.ajax({

            url: `/area/${area_id}`,
            type: "PUT",
            cache: false,
            data: {
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
                console.log(response);

                //append to post data
                $(`#index_${response.data.area_id}`).replaceWith(post);
                

                //close modal
                $('#modal-edit').modal('hide');


            },
            error: function(error) {

                if (error.responseJSON.name[0]) {

                    //show alert
                    $('#alert-name-edit').removeClass('d-none');
                    $('#alert-name-edit').addClass('d-block');

                    //add message to alert
                    $('#alert-name-edit').html(error.responseJSON.name[0]);
                }

                if (error.responseJSON.address[0]) {

                    //show alert
                    $('#alert-address-edit').removeClass('d-none');
                    $('#alert-address-edit').addClass('d-block');

                    //add message to alert
                    $('#alert-address-edit').html(error.responseJSON.address[0]);
                }

                if (error.responseJSON.link_address[0]) {

                    //show alert
                    $('#alert-link_address-edit').removeClass('d-none');
                    $('#alert-link_address-edit').addClass('d-block');

                    //add message to alert
                    $('#alert-link_address-edit').html(error.responseJSON.link_address[0]);
                }

            }

        });

    });
</script>
