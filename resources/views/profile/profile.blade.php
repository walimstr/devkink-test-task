@extends('layouts.app')
@push('css')
@endpush
@section('content')
    <div class="w-full h-screen flex items-center justify-center">
        <form class="w-full md:w-1/3 bg-white rounded-lg" method="POST" action="{{ route('profileUpdate') }}" >
            <div class="flex items-center justify-center">
                @if(session()->has('success'))
                    <div style="width:100%;" class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md" role="alert">
                        <div class="flex">
                            <div>
                                <p class="font-bold">Success</p>
                                <p class="text-sm">{{session()->get('success')}}</p>
                            </div>
                        </div>
                    </div>
                @endif
                @if(session()->has('error'))
                    <div style="width:100%;" class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                        <strong class="font-bold">Error!</strong>
                        <span class="block sm:inline">{{session()->get('error')}}</span>
                        <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                      </span>
                    </div>
                @endif
            </div>
            @csrf
            <h2 class="text-3xl text-center text-gray-700 mb-4">User Profile</h2>
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
                               name="first_name" value="{{\Auth::user()->first_name}}"
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
                               value="{{\Auth::user()->last_name}}"
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
                               value="{{\Auth::user()->email}}"
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
                        <input id="date" type='date' name="dob"
                               class="-mx-6 px-8 w-full border rounded px-3 py-2 text-gray-700 focus:outline-none" />
                    </div>
                </div>
                <br>
                <button type="submit"
                        class="w-full py-2 rounded-full bg-green-600 text-gray-100  focus:outline-none">Register
                </button>
            </div>
        </form>
    </div>
@endsection
@push('js')
    <script>
        let d = new Date('{{\Auth::user()->dob}}');
        let datestring = d.getFullYear().toString() + '-' + (d.getMonth()+1).toString().padStart(2, '0') + '-' + d.getDate().toString().padStart(2, '0');
        document.getElementById('date').value = datestring;
    </script>
@endpush
