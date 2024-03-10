@extends('layouts.app')

@section('content')
<main class="sm:container sm:mx-auto sm:max-w-lg sm:mt-10">
    <div class="flex justify-center">
        <div class="w-full">
            <section class="bg-white shadow-md sm:rounded-md">

                <header class="bg-gray-200 text-gray-700 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
                    <h2 class="font-semibold text-lg">
                        {{ __('Login') }}
                    </h2>
                </header>

                <form class="px-6 py-8 space-y-6 sm:px-10 sm:space-y-8" method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="mt-6">
                        <label for="email" class="block text-sm font-medium text-gray-700">{{ __('E-Mail Address') }}</label>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email"
                            class="mt-1 form-input w-full rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 @error('email') border-red-500 @enderror">
                        @error('email')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mt-6">
                        <label for="password" class="block text-sm font-medium text-gray-700">{{ __('Password') }}</label>
                        <input id="password" type="password" name="password" required autocomplete="current-password"
                            class="mt-1 form-input w-full rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 @error('password') border-red-500 @enderror">
                        @error('password')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex items-center justify-between mt-6">
                        <div class="flex items-center">
                            <input type="checkbox" name="remember" id="remember" class="form-checkbox h-4 w-4 text-indigo-600 transition duration-150 ease-in-out">
                            <label for="remember" class="ml-2 block text-sm text-gray-900">
                                {{ __('Remember Me') }}
                            </label>
                        </div>

                        @if (Route::has('password.request'))
                        <div class="text-sm">
                            <a href="{{ route('password.request') }}" class="font-medium text-indigo-600 hover:text-indigo-500">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        </div>
                        @endif
                    </div>

                    <div class="mt-6">
                        <button type="submit"
                            class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition duration-150 ease-in-out">
                            {{ __('Login') }}
                        </button>
                    </div>

                    @if (Route::has('register'))
                    <p class="mt-4 text-sm text-center text-gray-600">
                        {{ __("Don't have an account?") }}
                        <a href="{{ route('register') }}" class="font-medium text-indigo-600 hover:text-indigo-500">
                            {{ __('Register') }}
                        </a>
                    </p>
                    @endif
                </form>

            </section>
        </div>
    </div>
</main>
@endsection
