@extends('master')
@section('css')
<style>
    .form{
        display: table;
        text-align: center;
        margin: 5% auto;
        width: 35%;
        border: 1px solid;
    }
    .title{
        margin: 0;
        font-size: 28px;
        font-weight: bold;
        background: silver;
    }
    .form-input{
        padding: 4% 4% 0;
    }
    @media only screen and (max-width: 720px) {
        .form{
            display: table;
            text-align: center;
            margin: 5% auto;
            width: 80%;
            border: 1px solid;
        }
    }
</style>
@endsection
@section('login')
<div class="form">
    <p class="title">Login</p>
    <div class="col-12">
        @if(Session::has('message'))
            <p class="alert alert-danger">{{ Session::get('message') }}</p>
        @endif
        <form method="post" action="{{ route('auth.login.post') }}">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="row">
                <div class="col-12">
                    <div class="form-group form-input">
                        <input type="email" name="email" class="form-control @error('email') is-valied @enderror" placeholder="Email" value="{{ old('email') }}">
                        @error('email')
                            <div class="invalid-feedback d-block" style="text-align: left">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group form-input">
                        <input type="password" name="password" class="form-control @error('password') is-valied @enderror" placeholder="Password" value="{{ old('password') }}">
                        @error('password')
                            <div class="invalid-feedback d-block" style="text-align: left">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-12">
                    <div class="text-center" style="padding: 4% 4%">
                        <button type="submit" class="btn btn-dark" style="width: 100%">Login</button>
                    </div>
                </div>
            </div>  
        
          </form>
    </div>
</div>
@endsection