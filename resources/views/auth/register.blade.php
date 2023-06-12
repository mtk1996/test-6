@extends('layout.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-6 offset-3">
            <div class="card">
                <div class="card-header bg-dark text-center">
                    <span class="text-white">Cretae Account</span>
                </div>
                <div class="card-body">
                    <form action="{{ url('/register') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="">Enter Email</label>
                            <input type="email" class="form-control" name="email">
                        </div>
                        <div class="form-group">
                            <label for="">Enter Password</label>
                            <input type="password" class="form-control" name="password">
                        </div>

                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" class="form-control" name="name">
                        </div>
                        <div class="form-group">
                            <label for="">Phone</label>
                            <input type="text" class="form-control" name="phone">
                        </div>
                        <div class="form-group">
                            <label for="">Address</label>
                            <textarea name="address" class="form-control"></textarea>
                        </div>
                        <input type="submit" value="Create Account" class="btn btn-dark">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection