@extends('layouts.welcome')

@section('title', 'login')

@section('content')

<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center mt-5">

        <div class="col-xl-10 col-lg-12 col-md-9">


            <div class="card o-hidden border-0 shadow-lg my-5 w-100" style="background-color: lightyellow;">
                <div class="card-body p-0">

                    <!-- Nested Row within Card Body -->
                    <div class="row d-flex justify-content-center">
                        <!-- <div class="col-lg-6 d-none d-lg-block bg-login-image"></div> -->
                        <div class="col-lg-6">

                            @if (session('status'))
                                <div class="col-12 offset-6 mt-4">
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <i class="fa-solid fa-check"></i> {{ session('status') }}

                                    </div>
                                </div>
                            @endif
                            <div class="p-5">
                                <div class="text-center">
                                    <i class="fa-solid fa-panorama fa-2x mb-2" style="color:blueviolet;"></i>
                                    <h1 class="h4  mb-4" style="color: blueviolet;">Dream Wedding Login</h1>
                                </div>
                                <form action="{{ route('login') }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label" style="color: blueviolet;">အီးမေးလ်လိပ်စာ</label>
                                        <input name="email" value="{{ old('email') }}" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                        @error('email')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label" style="color: blueviolet;">စကားဝှက်</label>
                                        <input name="password" type="password" class="form-control" id="exampleInputPassword1">
                                        @error('password')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                    </div>

                                    <button type="submit" class="w-100 btn btn-primary" style="background-color: blueviolet;">အကောင့်ဝင်ရန်</button>
                                </form>
                                <hr>

                                <div class="text-center">
                                    <a class="small" href="{{ route('auth#registerPage') }}">အကောင့်တစ်ခုဖန်တီးပါ</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>


@endsection
