@extends('layouts.app')
@push('css')
    <style>
        b, strong {
            color:red;
        }
    </style>
@endpush
@section('content')
<div class="w-full h-screen flex items-center justify-center">
    <form class="w-full md:w-1/3 bg-white rounded-lg" method="POST" action="{{route('login')}}">
        @csrf
        <div class="flex font-bold justify-center mt-6">
            <img class="h-20 w-20"
                 src="https://raw.githubusercontent.com/sefyudem/Responsive-Login-Form/master/img/avatar.svg">
        </div>
        <h2 class="text-3xl text-center text-gray-700 mb-4">Login Form</h2>
        <div class="px-12 pb-10">
            <div class="w-full mb-2">
                @error('email')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
                <div class="flex items-center">
                    <i class='ml-3 fill-current text-gray-400 text-xs z-10 fas fa-user'></i>
                    <input type='text' value="{{old('email')}}" placeholder="Email Address" name="email"
                           class="-mx-6 px-8  @error('email') is-invalid @enderror w-full border rounded px-3 py-2 text-gray-700 focus:outline-none" />
                </div>
            </div>
            <div class="w-full mb-2">
                @error('password')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
                <div class="flex items-center">
                    <i class='ml-3 fill-current text-gray-400 text-xs z-10 fas fa-lock'></i>
                    <input type='password' placeholder="Password" name="password"
                           class="-mx-6 px-8 w-full @error('password') is-invalid @enderror border rounded px-3 py-2 text-gray-700 focus:outline-none" />
                </div>
            </div>
            @if (Route::has('password.request'))
                <a href="{{route('password.request')}}" class="text-xs text-gray-500 float-right mb-4">Forgot Password?</a>
            @endif
            <button type="submit"
                    class="w-full py-2 rounded-full bg-green-600 text-gray-100  focus:outline-none">Login
            </button>
            <a href="/register" class="text-xs text-gray-500 float-right mb-4">Don't Have Then Register First</a>
        </div>
    </form>
</div>
@endsection
