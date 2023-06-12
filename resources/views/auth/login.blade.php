@extends('layout.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-6 offset-3">
            <div class="card">
                <div class="card-header bg-dark text-center">
                    <span class="text-white">User Login</span>
                </div>
                <div class="card-body">
                    <form action="{{ url('/login') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="">Enter Email</label>
                            <input type="email" class="form-control" name="email">
                        </div>
                        <div class="form-group">
                            <label for="">Enter Password</label>
                            <input type="password" class="form-control" name="password">
                        </div>


                        <input type="submit" value="Login" class="btn btn-dark">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection