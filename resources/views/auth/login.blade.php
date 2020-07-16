@extends('layouts.app')

@section('content')
    <x-auth-page title="Login">
        <form class="w-full p-6 space-y-6" method="POST" action="{{ route('login') }}">
            @csrf

            <div class="flex flex-wrap">
                <label for="email" class="block font-bold font-heading mb-2">
                    {{ __('Email Address') }}
                </label>

                <x-input autofocus id="email" type="email"
                       name="email" value="{{ old('email') }}"
                       required autocomplete="email"></x-input>

                <x-invalid-helptext field="email"></x-invalid-helptext>
            </div>

            <div class="flex flex-wrap">
                <label for="password" class="block font-bold font-heading mb-2">
                    {{ __('Password') }}
                </label>

                <x-input id="password" type="password"
                       name="password" required></x-input>

                <x-invalid-helptext field="password"></x-invalid-helptext>
            </div>

            <div class="flex">
                <label class="inline-flex items-center font-heading" for="remember">
                    <input type="checkbox" name="remember" id="remember"
                           class="form-checkbox" {{ old('remember') ? 'checked' : '' }}>
                    <span class="ml-4">{{ __('Remember Me') }}</span>
                </label>
            </div>

            <div class="flex flex-wrap items-center justify-center space-x-10">
                <button type="submit"
                        class="btn btn-3d btn-green">
                    {{ __('Login') }}
                </button>

                @if (Route::has('password.request'))
                    <a class="btn btn-outline btn-green"
                       href="{{ route('password.request') }}">
                        {{ __('Forgot Password?') }}
                    </a>
                @endif
            </div>

            <div class="flex items-center font-heading">
                @if (Route::has('register'))
                    <p class="w-full text-center">
                        {{ __("Don't have an account?") }}
                        <a class="text-blue-500 hover:text-blue-700 no-underline" href="{{ route('register') }}">
                            {{ __('Register') }}
                        </a>
                    </p>
                @endif
            </div>

        </form>
    </x-auth-page>
@endsection
