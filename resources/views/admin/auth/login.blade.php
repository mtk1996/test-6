<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="{{ asset('/assets/css/argon.min.css') }}">
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-6 offset-3">
                <div class="card">
                    <div class="card-header bg-primary text-white text-center">
                        <span>Admin Login</span>
                    </div>
                    <div class="card-body">
                        @if($errors->any())
                        @foreach($errors->all() as $e)
                        <div class="alert alert-danger">{{ $e }}</div>
                        @endforeach
                        @endif

                        @if(session()->has('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif
                        <form action="{{ url('/admin/login') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="">Enter Email</label>
                                <input type="email" name="email" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Enter Password</label>
                                <input type="password" name="password" class="form-control">
                            </div>
                            <input type="submit" value="Login" class="btn btn-primary">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>