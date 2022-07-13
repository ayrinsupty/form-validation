<!DOCTYPE html>
<html>
<head>
    <title>Laravel 9 Form Validation</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <section>
        <div class="container">
            <div class="row">
                <div class="col md-12">
                    @if(Session::has('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                            @php
                                Session::forget('success');
                             @endphp
                        </div>
                    @endif

                    <!-- Way 1: Display All Error Messages -->
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="card-header">
                        <h1 style="text-align: center">Laravel 9 Form Validation</h1>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ url('user/create') }}">
                            {{ csrf_field() }}
                            <div class="form-group mb-3">
                                <label for="inputName">Name:</label>
                                <input
                                    type="text"
                                    name="name"
                                    id="inputName"
                                    class="form-control @error('name') is-invalid @enderror"
                                    placeholder="Name">

                                <!-- Way 2: Display Error Message -->
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="inputPassword">Password:</label>
                                <input
                                type="password"
                                    name="password"
                                    id="inputPassword"
                                    class="form-control @error('password') is-invalid @enderror"
                                    placeholder="Password">

                                    <!-- Way 3: Display Error Message -->
                                    @if ($errors->has('password'))
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>

                                <div class="form-group mb-3">
                                    <label for="inputEmail">Email:</label>
                                <input
                                    type="text"
                                    name="email"
                                    id="inputEmail"
                                    class="form-control @error('email') is-invalid @enderror"
                                    placeholder="Email">

                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @endif
                            </div>

                            <div class="form-group mb-3">
                                <button class="btn btn-success btn-submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>

