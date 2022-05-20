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
@section('register')
<div class="form">
    <p class="title">Register User</p>
    <div class="col-12">
        <form method="post" action="{{ route('auth.register.post') }}">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="row">
                <div class="col-12">
                    <div class="form-group form-input">
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Name" value="{{ old('name') }}">
                        @error('name')
                            <div class="invalid-feedback d-block" style="text-align: left">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
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
                        <input type="text" name="address" class="form-control @error('address') is-valied @enderror" placeholder="Address" value="{{ old('address') }}">
                        @error('address')
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
                        <button type="submit" class="btn btn-dark" style="width: 100%">Register</button>
                    </div>
                </div>
            </div>  
        
          </form>
    </div>
</div>
@endsection