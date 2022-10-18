<!-- Modal -->
<div class="modal fade" id="modal-create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="form-group">
                    <label for="name" class="control-label">Product Id</label>
                    <input type="text" class="form-control" id="product_id">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-product_id"></div>
                </div>

                <div class="form-group">
                    <label for="name" class="control-label">Product Name</label>
                    <input type="text" class="form-control" id="product_name">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-product_name"></div>
                </div>

                <div class="form-group">
                    <label for="name" class="control-label">Purchase Price</label>
                    <input type="text" class="form-control" id="purchase_price">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-purchase_price"></div>
                </div>

                <div class="form-group">
                    <label for="name" class="control-label">Selling Price</label>
                    <input type="text" class="form-control" id="selling_price">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-selling_price"></div>
                </div>

                <div class="form-group">
                    <label for="name" class="control-label">Area Id</label>
                    <input type="text" class="form-control" id="area_id">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-area_id"></div>
                </div>



            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="store">Simpan</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
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
        let product_id = $('#product_id').val();
        let product_name = $('#product_name').val();
        let purchase_price = $('#purchase_price').val();
        let selling_price = $('#selling_price').val();
        let area_id = $('#area_id').val();
        let token = $("meta[name='csrf-token']").attr("content");

        //ajax
        $.ajax({

            url: `/c_product`,
            type: "POST",
            cache: false,
            data: {
                "product_id": product_id,
                "product_name": product_name,
                "purchase_price": purchase_price,
                "selling_price": selling_price,
                "area_id": area_id,
                "_token": token
            },
            dataType: "json",
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
                    <tr id="index_${response.data.product_id}">
                        <td>${response.data.product_name}</td>
                        <td>${response.data.purchase_price}</td>
                        <td>${response.data.selling_price}</td>
                        <td>${response.data.area_id}</td>
                        <td class="text-center">
                            <a href="javascript:void(0)" id="btn-edit-post" data-id="${response.data.product_id}" class="btn btn-primary btn-sm">Edit</a>
                            <a href="javascript:void(0)" id="btn-delete-post" data-id="${response.data.product_id}" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                `;

                //append to table
                $('#table-posts').prepend(post);

                //clear form
                $('#product_id').val('');
                $('#product_name').val('');
                $('#purchase_price').val('');
                $('#selling_price').val('');
                $('#area_id').val('');
                //close modal
                $('#modal-create').modal('hide');


            },
            error: function(error) {

                if (error.responseJSON.product_id[0]) {

                    //show alert
                    $('#alert-product_id').removeClass('d-none');
                    $('#alert-product_id').addClass('d-block');

                    //add message to alert
                    $('#alert-product_id').html(error.responseJSON.product_id[0]);
                }

                if (error.responseJSON.product_name[0]) {

                    //show alert
                    $('#alert-product_name').removeClass('d-none');
                    $('#alert-product_name').addClass('d-block');

                    //add message to alert
                    $('#alert-product_name').html(error.responseJSON.product_name[0]);
                }

                if (error.responseJSON.purchase_price[0]) {

                    //show alert
                    $('#alert-purchase_price').removeClass('d-none');
                    $('#alert-purchase_price').addClass('d-block');

                    //add message to alert
                    $('#alert-purchase_price').html(error.responseJSON.purchase_price[0]);
                }
                if (error.responseJSON.selling_price[0]) {

                    //show alert
                    $('#alert-selling_price').removeClass('d-none');
                    $('#alert-selling_price').addClass('d-block');

                    //add message to alert
                    $('#alert-selling_price').html(error.responseJSON.selling_price[0]);
                }
                if (error.responseJSON.area_id[0]) {

                    //show alert
                    $('#alert-area_id').removeClass('d-none');
                    $('#alert-area_id').addClass('d-block');

                    //add message to alert
                    $('#alert-area_id').html(error.responseJSON.area_id[0]);
                }

            }

        });

    });
</script>
