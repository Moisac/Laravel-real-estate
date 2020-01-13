@extends('layouts.app')

@section('content')

<div class="row flex">
    <div class="w-1/2">
        <img class="h-full" src="{{ asset('uploads/frontend/login.jpg') }}" alt="">
    </div>

    <div class="w-1/2">
        <div class="mx-auto h-full flex justify-center items-center bg-gray-300 p-5">
    <div class="w-96 bg-blue-900 rounded-lg shadow-xl p-6">
        <div>
            <div>

                    <h2 class="text-white text-3xl pb-1 pt-4">Intra in cont!<h2>
                    <h4 class="text-blue-300 text-xl pb-4">Introdu datele de logare mai jos.</h4>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="relative mb-4">
                            <label for="email" class="uppercase text-white text-xs font-bold absolute pl-3 pt-2">E-mail</label>

                            <div>
                                <input id="email" type="email" class="text-white text-lg pt-8 w-full rounded p-3 bg-third-900 opacity-50 outline-none focus:opacity-75 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="exemplu@gmail.com">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="relative mb-4">
                            <label for="password" class="uppercase text-white text-xs font-bold absolute pl-3 pt-2">Parola</label>

                            <div>
                                <input id="password" type="password" class="text-white text-lg pt-8 w-full rounded p-3 bg-third-900 opacity-50 outline-none focus:opacity-75 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Parola ta aici">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="pt-5">
                            <button type="submit" class="uppercase rounded text-blue-500 w-full bg-gray-400 p-3 text-xl text-bold">
                                Intra in cont
                            </button>
                        </div>

                        <div class="flex justify-between">
                            <div class="mt-4">
                                <div >
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="text-white" for="remember">
                                            Salveaza datele
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-5">
                                <div class="text-white">

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            Ti-ai uitat parola?
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>

                        
                    </form>
                    <div class="mt-5">
                                <div class="text-white">
                                    <a class="uppercase rounded text-blue-500 bg-gray-400 p-2 text-xs text-bold" href="{{ route('register') }}">
                                        Creaza un cont nou
                                    </a>
                                </div>
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
