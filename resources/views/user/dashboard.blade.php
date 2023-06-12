@extends('layout.master')

@section('content')
<div class="container mt-2">
    <div id="root">

    </div>
</div>

@endsection


@section('js')
<script>
    const blade_user = @json($user);
</script>
<script src="{{ asset('/js/Profile.js') }}"></script>
@endsection