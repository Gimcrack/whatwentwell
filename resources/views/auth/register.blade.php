@extends('layouts.app')

@section('content')
    <x-auth-page title="Register">

        <form class="flex flex-col flex-1 h-full justify-center w-full p-6 space-y-6" method="POST" action="{{ route('register') }}">
            @csrf

{{--            <div class="flex flex-wrap">--}}
{{--                <label for="name" class="block font-bold font-heading mb-2">--}}
{{--                    {{ __('Name') }}--}}
{{--                </label>--}}

{{--                <x-input autofocus id="name" type="name"--}}
{{--                         name="name" value="{{ old('name') }}"--}}
{{--                         required autocomplete="name"></x-input>--}}

{{--                <x-invalid-helptext field="name"></x-invalid-helptext>--}}
{{--            </div>--}}

            <div class="flex flex-wrap">
                <label for="email" class="block font-bold font-heading mb-2">
                    {{ __('Email Address') }}
                </label>

                <x-input id="email" type="email"
                       name="email" value="{{ old('email') }}"
                       required autocomplete="email"></x-input>

                <x-invalid-helptext field="email"></x-invalid-helptext>
            </div>

            <div class="flex flex-wrap">
                <label for="password" class="block font-bold font-heading mb-2">
                    {{ __('Password') }}
                </label>

                <x-input id="password" type="password"
                       name="password" value="{{ old('password') }}"
                       required autocomplete="password"></x-input>

                <x-invalid-helptext field="password"></x-invalid-helptext>
            </div>

{{--            <div class="flex flex-wrap">--}}
{{--                <label for="password-confirm" class="block font-bold font-heading mb-2">--}}
{{--                    {{ __('Confirm Password') }}--}}
{{--                </label>--}}

{{--                <x-input id="password-confirm" type="password-confirm"--}}
{{--                       name="password-confirm"--}}
{{--                       required autocomplete="new-password"></x-input>--}}
{{--            </div>--}}

            <div class="flex flex-wrap items-center justify-center space-x-10">
                <button type="submit"
                        class="btn btn-3d btn-green">
                    {{ __('Register') }}
                </button>
            </div>

            <div class="flex items-center font-heading">
                @if (Route::has('register'))
                    <p class="w-full text-center">
                        {{ __('Already have an account?') }}
                        <a class="text-blue-500 hover:text-blue-700 no-underline" href="{{ route('login') }}">
                            {{ __('Login') }}
                        </a>
                    </p>
                @endif
            </div>
        </form>

    </x-auth-page>
@endsection
