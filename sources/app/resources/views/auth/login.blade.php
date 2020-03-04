@extends('layouts.app')

@section('content')
<div class="mx-auto h-full flex justify-center items-center bg-gray-300">
    <div class="w-96 bg-blue-900 rounded-lg shadow-xl p-6">

        <h1 class="text-white text-3xl pt-2">Welcome back</h1>
        <h2 class="text-blue-300">Enter your credentials below</h2>

        <form method="POST" action="{{ route('login') }}" class="pt-6">
            @csrf

            <div class="relative">
                <label for="email" class="uppercase text-blue-500 text-xs font-bold absolute pl-3 pt-2">Email</label>

                <div class="">
                    <input
                        id="email"
                        type="email"
                        class="pt-8 w-full rounded p-3 bg-blue-800 text-gray-100 outline-none focus:bg-blue-700"
                        name="email"
                        value="{{ old('email') }}"
                            autocomplete="email"
                        autofocus
                        placeholder="your@email.net">

                    @error('email')
                    <span class="text-red-500 text-sm pl-3" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="relative pt-3">
                <label for="password" class="uppercase text-blue-500 text-xs font-bold absolute pl-3 pt-2">Password</label>

                <div class="">
                    <input
                        id="password"
                        type="password"
                        class="pt-8 w-full rounded p-3 bg-blue-800 text-gray-100 outline-none focus:bg-blue-700"
                        name="password"
                        placeholder="Password"
                        autocomplete="current-password">

                    @error('password')
                    <span class="text-red-500 text-sm pl-3" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="pt-2">
                <input class="" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                <label class="" for="remember">
                    {{ __('Remember Me') }}
                </label>
            </div>

            <div class="pt-6">
                <button type="submit" class="uppercase rounded text-blue-800 bg-gray-400 font-bold w-full py-2">Login</button>
            </div>

            <div class="flex justify-between pt-8 text-white text-sm font-bold">
                <a class="" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>

                <a class="" href="{{ route('register') }}">
                    Register
                </a>
            </div>
        </form>

    </div>
</div>
@endsection
