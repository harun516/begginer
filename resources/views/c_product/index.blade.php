<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Prduct - SSG POS</title>
    <style>
        body {
            background-color: lightgray !important;
        }

    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>

    <div class="container" style="margin-top: 50px">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded-md mt-4">
                    <div class="card-body">

                        <a href="javascript:void(0)" class="btn btn-success mb-2" id="btn-create-post">Add Product</a>

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Product Id</th>
                                    <th>Product Name</th>
                                    <th>Purchase Price</th>
                                    <th>Selling Price</th>
                                    <th>Stock</th>
                                    <th>Area Id</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($c_products as $c_product)
                                <tr>
                                    <td>{{ $c_product->product_id }}</td>
                                    <td>{{ $c_product->product_name }}</td>
                                    <td>{{ $c_product->price_purchase }}</td>
                                    <td>{{ $c_product->selling_purchase }}</td>
                                    <td>{{ $c_product->stock }}</td>
                                    <td>{{ $c_product->area_id }}</td>
                                    <td class="text-center">
                                        <a href="javascript:void(0)" id="btn-edit-post" data-id="{{ $c_product->id }}" class="btn btn-primary btn-sm">Edit</a>
                                        <a href="javascript:void(0)" id="btn-delete-post" data-id="{{ $c_product->id }}" class="btn btn-danger btn-sm">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('c_product.create')
    {{-- @include('posts.edit')
    @include('posts.delete') --}}
</body>
</html>