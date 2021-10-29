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
        <form class="w-full md:w-1/3 bg-white rounded-lg" method="POST" action="{{ route('register') }}" >
            @csrf
            <div class="flex font-bold justify-center mt-6">
                <img class="h-20 w-20"
                     src="https://raw.githubusercontent.com/sefyudem/Responsive-Login-Form/master/img/avatar.svg">
            </div>
            <h2 class="text-3xl text-center text-gray-700 mb-4">Register Form</h2>
            <div class="px-12 pb-10">
                <div class="w-full mb-2">
                    @error('first_name')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                    <div class="flex items-center">
                        <i class='ml-3 fill-current text-gray-400 text-xs z-10 fas fa-user'></i>
                        <input type='text' placeholder="First Name"
                               name="first_name" value="{{old('first_name')}}"
                               class="-mx-6 px-8  @error('first_name') is-invalid @enderror w-full border rounded px-3 py-2 text-gray-700 focus:outline-none" />
                    </div>
                </div>
                <div class="w-full mb-2">
                    @error('last_name')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                    <div class="flex items-center">
                        <i class='ml-3 fill-current text-gray-400 text-xs z-10 fas fa-user'></i>
                        <input type='text' placeholder="Last Name"
                               name="last_name"
                               value="{{old('last_name')}}"
                               class="-mx-6 px-8 @error('last_name') is-invalid @enderror w-full border rounded px-3 py-2 text-gray-700 focus:outline-none" />
                    </div>
                </div>
                <div class="w-full mb-2">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                    <div class="flex items-center">
                        <i class='ml-3 fill-current text-gray-400 text-xs z-10 fas fa-user'></i>
                        <input type='email'  placeholder="Email Address" name="email"
                               value="{{old('email')}}"
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
                        <input type='password' placeholder="Password" name="password"  autocomplete="new-password"
                               class="-mx-6 @error('password') is-invalid @enderror px-8 w-full border rounded px-3 py-2 text-gray-700 focus:outline-none" />
                    </div>
                </div>
                <div class="w-full mb-2">
                    <div class="flex items-center">
                        <i class='ml-3 fill-current text-gray-400 text-xs z-10 fas fa-lock'></i>
                        <input type='password' placeholder="Confirm Password" name="password_confirmation"  autocomplete="new-password"
                               class="-mx-6 px-8 w-full border rounded px-3 py-2 text-gray-700 focus:outline-none" />
                    </div>
                </div>
                <div class="w-full mb-2">
                    @error('dob')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                    <div class="flex items-center">
                        <i class='ml-3 fill-current text-gray-400 text-xs z-10 fas fa-calendar'></i>
                        <input type='date' name="dob"
                               class="-mx-6 px-8 w-full border rounded px-3 py-2 text-gray-700 focus:outline-none" />
                    </div>
                </div>
                <br>
                <button type="submit"
                        class="w-full py-2 rounded-full bg-green-600 text-gray-100  focus:outline-none">Register
                </button>
                <br>
                <a href="/login" class="text-xs text-gray-500 float-right mb-4">Already Have Then Login</a>
            </div>
        </form>
    </div>
@endsection
