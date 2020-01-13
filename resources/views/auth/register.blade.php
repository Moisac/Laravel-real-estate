@extends('layouts.app')

@section('content')
<div class="mx-auto h-full flex justify-center items-center bg-gray-300">
    <div class="w-1/2">
    <div class="w-120 bg-blue-900 rounded-lg shadow-xl p-4 mx-auto">
        <div>
            <div>
                <h2 class="text-white text-3xl pb-1 pt-3">Bun venit!<h2>
                <h4 class="text-blue-300 text-xl pb-4">Creaza un cont nou mai jos!</h4>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" class="relative mb-5">
                        @csrf

                        <div class="relative mb-4">
                            <label for="name" class="uppercase text-white text-xs font-bold absolute pl-3 pt-2">Nume</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="text-white text-lg pt-8 w-full rounded p-3 bg-third-900 opacity-50 outline-none focus:opacity-75 @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Numele tau aici">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="relative mb-4">
                            <label for="email" class="uppercase text-white text-xs font-bold absolute pl-3 pt-2">E-mail</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="text-white text-lg pt-8 w-full rounded p-3 bg-third-900 opacity-50 outline-none focus:opacity-75 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="exemplu@gmail.com">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="relative mb-4">
                            <label for="email" class="uppercase text-white text-xs font-bold absolute pl-3 pt-2">Telefon</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="text-white text-lg pt-8 w-full rounded p-3 bg-third-900 opacity-50 outline-none focus:opacity-75 @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" placeholder="Numarul tau aici">

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="relative mb-4">
                            <label for="password" class="uppercase text-white text-xs font-bold absolute pl-3 pt-2">Parola</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="text-white text-lg pt-8 w-full rounded p-3 bg-third-900 opacity-50 outline-none focus:opacity-75 @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Parola ta aici">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="relative mb-4">
                            <label for="password-confirm" class="uppercase text-white text-xs font-bold absolute pl-3 pt-2">Confirma parola</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="text-white text-lg pt-8 w-full rounded p-3 bg-third-900 opacity-50 outline-none focus:opacity-75" name="password_confirmation" required autocomplete="new-password" placeholder="Confirma parola aici">
                            </div>
                        </div>

                        <div class="pt-2">
                                <button type="submit" class="uppercase rounded text-blue-500 w-full bg-gray-400 p-3 text-xl text-bold">
                                    Creaza cont
                                </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="w-1/2">
        <img class="h-full" src="{{ asset('uploads/frontend/login.jpg') }}" alt="">
    </div>
</div>
@endsection
