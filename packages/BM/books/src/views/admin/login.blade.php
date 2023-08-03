
@include('books::layout.header-asset', ['title' => 'Login'])

<body>
    <div class="d-flex justify-content-center align-items-center mt-5">


        <div class="card">
            <h2 class="p-4">Login</h2>
            @if ($errors->count())
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="text-danger">{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            <form class="form px-4" action="{{ route('admin.login-post') }}" method="POST">
                @csrf
                <input type="text" name="username" class="form-control" placeholder="Username">

                <input type="password" name="password" class="form-control" placeholder="Password">

                <button type="submit" class="btn btn-dark btn-block">Login</button>

            </form>



        </div>


    </div>


    <style>
        body {

            background-color: #f2f2f2;
        }

        .card {
            width: 400px;
            border: none;
        }

        .btr {
            border-top-right-radius: 5px !important;
        }


        .btl {
            border-top-left-radius: 5px !important;
        }

        .btn-dark {
            color: #fff;
            background-color: #0d6efd;
            border-color: #0d6efd;
        }


        .btn-dark:hover {
            color: #fff;
            background-color: #0d6efd;
            border-color: #0d6efd;
        }


        .nav-pills {

            display: table !important;
            width: 100%;
        }

        .nav-pills .nav-link {
            border-radius: 0px;
            border-bottom: 1px solid #0d6efd40;

        }

        .nav-item {
            display: table-cell;
            background: #0d6efd2e;
        }


        .form {

            padding: 10px;
        }

        .form input {

            margin-bottom: 12px;
            border-radius: 3px;
        }


        .form input:focus {

            box-shadow: none;
        }
    </style>
