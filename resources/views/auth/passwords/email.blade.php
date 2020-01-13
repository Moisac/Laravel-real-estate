@extends('layouts.app')

@section('content')
<div class="mx-auto h-full flex justify-center items-center bg-gray-300">
    <div class="w-96 bg-secondary-900 rounded-lg shadow-xl p-6">
        <div class="col-md-8">
            <div class="card">
                 <h2 class="text-white text-3xl pb-1 pt-5">Forgot your password?<h2>
                <h4 class="text-blue-300 text-xl pb-5">Reset your password below</h4>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="relative mb-5">
                            <label for="email" class="uppercase text-white text-xs font-bold absolute pl-3 pt-2">E-mail</label>

                            <div>
                                <input id="email" type="email" class="text-white text-lg pt-8 w-full rounded p-3 bg-secondary-600 outline-none focus:bg-secondary-800 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="your email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="mt-5">
                                <button type="submit" class="uppercase rounded w-full text-blue-500 bg-gray-400 p-3 text-lg text-bold">
                                    Send Password Reset Link
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
