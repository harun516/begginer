<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>User Data</title>
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
                <h4 class="text-center">User Data</a></h4>
                <div class="card border-0 shadow-sm rounded-md mt-4">
                    <div class="card-body">

                        <a href="javascript:void(0)" class="btn btn-success mb-2" id="btn-create-post">Add User</a>

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>User Id</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>Area Id</th>
                                    <th>Link Maps</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="table-user">
                                @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->user_id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->phone}}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->address }}</td>
                                    <td>{{ $user->area_id }}</td>
                                    <td>{{ $user->link_address }}</td>
                                    <td class = "text-center">
                                       <a href="javascript:void(0)" id="btn-edit-post" data.id="{{ $user->user_id }}" class="btn btn-primary btn-sm"> Edit </a>
                                       <a href="javascript:void(0)" id="btn-delete-post" data.id="{{ $user->user_id }}" class="btn btn-danger btn-sm"> Delete </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('user.create')
        {{-- @include('area.delete')
        @include('area.edit') --}}
    </body>
    </html>
