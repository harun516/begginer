<!-- Modal -->
<div class="modal fade" id="modal-create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="form-group">
                    <label for="name" class="control-label">User Id</label>
                    <input type="text" class="form-control" id="user_id">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-user_id"></div>
                </div>

              <div class="form-grop">
                    <label for="">Area Id</label>
                    <select name="area_id" class="form-control" id="area_id">
                        <option value="">--Choose Area--</option>
                    </select>
              </div>

                <div class="form-group">
                    <label for="name" class="control-label">Name</label>
                    <input type="text" class="form-control" id="name">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-name"></div>
                </div>

                <div class="form-group">
                    <label for="name" class="control-label">Password</label>
                    <input type="password" class="form-control" id="password">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-password"></div>
                </div>

                <div class="form-group">
                    <label for="name" class="control-label">Phone</label>
                    <input type="number" class="form-control" id="phone">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-phone"></div>
                </div>

                <div class="form-group">
                    <label for="name" class="control-label">Email</label>
                    <input type="email" class="form-control" id="email">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-email"></div>
                </div>

                <div class="form-group">
                    <label for="name" class="control-label">Address</label>
                    <textarea class="form-control" id="address" rows="3"></textarea>
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-address"></div>
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
    //dropdown
    $(document).ready(function(){
      	$.ajax({
            type: 'POST',
          	url: "get_provinsi.php",
          	cache: false, 
          	success: function(msg){
              $("#combo3").html(msg);
            }
        });
     });


    //button create post event
    $('body').on('click', '#btn-create-post', function() {

        //open modal
        $('#modal-create').modal('show');
    });

    //action create post
    $('#store').click(function(e) {
        e.preventDefault();

        //define variable
        let user_id = $('#user_id').val();
        let area_id = $('#area_id').val();
        let name = $('#name').val();
        let password = $('#password').val();
        let phone = $('#phone').val();
        let email = $('#email').val();
        let address = $('#address').val();
        let token = $("meta[name='csrf-token']").attr("content");

        //ajax
        $.ajax({

            url: `/user`,
            type: "POST",
            cache: false,
            data: {
                "user_id": user_id,
                "area_id": area_id,
                "name": name,
                "password": password,
                "phone": phone,
                "email": email,
                "address": address,
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
                    <tr id="index_${response.data.user_id}">
                        <td>${response.data.area_id}</td>
                        <td>${response.data.name}</td>
                        <td>${response.data.password}</td>
                        <td>${response.data.phone}</td>
                        <td>${response.data.email}</td>
                        <td>${response.data.address}</td>
                        <td class="text-center">
                            <a href="javascript:void(0)" id="btn-edit-post" data-id="${response.data.user_id}" class="btn btn-primary btn-sm">Edit</a>
                            <a href="javascript:void(0)" id="btn-delete-post" data-id="${response.data.user_id}" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                `;

                //append to table
                $('#table-user').prepend(post);

                //clear form
                $('#user_id').val('');
                $('#area_id').val('');
                $('#name').val('');
                $('#passoword').val('');
                $('#phone').val('');
                $('#email').val('');
                $('#address').val('');

                //close modal
                $('#modal-create').modal('hide');


            },
            error: function(error) {

                if (error.responseJSON.user_id[0]) {

                    //show alert
                    $('#alert-user_id').removeClass('d-none');
                    $('#alert-user_id').addClass('d-block');

                    //add message to alert
                    $('#alert-user_id').html(error.responseJSON.user_id[0]);
                }

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

                if (error.responseJSON.password[0]) {

                    //show alert
                    $('#alert-password').removeClass('d-none');
                    $('#alert-password').addClass('d-block');

                    //add message to alert
                    $('#alert-password').html(error.responseJSON.password[0]);
                }

                if (error.responseJSON.phone[0]) {

                    //show alert
                    $('#alert-phone').removeClass('d-none');
                    $('#alert-phone').addClass('d-block');

                    //add message to alert
                    $('#alert-phone').html(error.responseJSON.phone[0]);
                }

                if (error.responseJSON.email[0]) {

                    //show alert
                    $('#alert-email').removeClass('d-none');
                    $('#alert-email').addClass('d-block');

                    //add message to alert
                    $('#alert-email').html(error.responseJSON.email[0]);
                }

                if (error.responseJSON.address[0]) {

                    //show alert
                    $('#alert-address').removeClass('d-none');
                    $('#alert-address').addClass('d-block');

                    //add message to alert
                    $('#alert-address').html(error.responseJSON.address[0]);
                }

            }

        });

    });
</script>
