@extends("layouts.layout")
@section("content")

    <div class="container mt-5">

        <h2 class="mb-4">welcome {{$data->name}}, User Management Dashboard</h2>

        <a class="btn btn-danger" href="{{route("logout")}}">Logout</a>

        {{-- Create User --}}
        <form method="POST" class="mb-4" action="{{route("adduser")}}">
            @csrf
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="row g-2">
                <div class="col-md-3">
                    <input type="text" name="name" class="form-control" placeholder="Name">
                </div>
                <div class="col-md-3">
                    <input type="email" name="email" class="form-control" placeholder="Email">
                </div>
                <div class="col-md-3">
                    <input type="password" name="password" class="form-control" placeholder="Password">
                </div>
                <div class="col-md-3">
                    <button type="submit" class="btn btn-success w-100">Add User</button>
                </div>
            </div>
        </form>

        {{-- Users Table --}}
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <!-- Example row start -->
                @php
                    use App\Models\User;
                    $allUsers = User::all();
                @endphp
                @foreach ($allUsers as $user)

                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>
                            <div>
                                <button data-url="{{route("updateuser", $user->id)}}" data-name="{{$user->name}}"
                                    data-email="{{$user->email}}" data-id="{{$user->id}}" class="btn btn-success"
                                    onclick="openMyModal(this)">update</button>

                                <a class="btn btn-danger" href="{{route("deleteUser", $user->id)}}">Delete</a>

                            </div>
                        </td>
                    </tr>

                @endforeach
                <!-- Example row end -->
            </tbody>
        </table>


    </div>


    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Contact Form</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <form id="contactForm" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Name:</label>
                            <input type="text" name="name" class="form-control" id="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" name="email" class="form-control" id="email" required>
                        </div>
                        <button type="submit">submit</button>
                    </form>
                </div>

                <div class="modal-footer">
                    
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>


    <script>
        function openMyModal(form) {
            const modalElement = document.getElementById('myModal');
            console.log(form.dataset);

            let email = form.dataset.email;
            let name = form.dataset.name;
            let id = form.dataset.id;
            let url = form.dataset.url;
            let updateForm = document.querySelector("#contactForm");
            console.log(url);

            updateForm.setAttribute("action", url);

            modalElement.querySelector("#name").value = name;
            modalElement.querySelector("#email").value = email;


            const modal = new bootstrap.Modal(modalElement);
            modal.show();
        }
    </script>


@endsection