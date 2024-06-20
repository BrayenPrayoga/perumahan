@extends('template.backend.main')


@section('content')
<div class="row justify-content-center">
    <div class="col-md-10" align="center">
        <div id="home">
            <img src="{{asset('assets/img/logo.png')}}" width="30%">
            <div class="card">
                <div class="card-body" style="border-radius: 15px;">
                    <h1 style="font-size: 50px;padding: 15px;text-transform: uppercase;">SELAMAT DATANG <br><strong> {{Auth::guard('user')->user()->name}}</strong></h1>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection