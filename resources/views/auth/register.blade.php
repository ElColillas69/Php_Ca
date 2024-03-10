@extends('layouts.app')

@section('content')
<main class="sm:container sm:mx-auto sm:max-w-lg sm:mt-10">
    <div class="flex justify-center">
        <div class="w-full">
            <section class="bg-white shadow-md sm:rounded-md">

                <header class="bg-gray-200 text-gray-700 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
                    <h2 class="font-semibold text-lg">{{ __('Register') }}</h2>
                </header>

                <form class="px-6 py-8 space-y-6 sm:px-10 sm:space-y-8" method="POST" action="{{ route('register') }}">
                    @csrf

                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">{{ __('Name') }}</label>
                        <input id="name" type="text" name="name" value="{{ old('name') }}" required autocomplete="name"
                            class="mt-1 form-input w-full rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 @error('name') border-red-500 @enderror">
                        @error('name')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">{{ __('E-Mail Address') }}</label>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email"
                            class="mt-1 form-input w-full rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 @error('email') border-red-500 @enderror">
                        @error('email')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700">{{ __('Password') }}</label>
                        <input id="password" type="password" name="password" required autocomplete="new-password"
                            class="mt-1 form-input w-full rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 @error('password') border-red-500 @enderror">
                        @error('password')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="password-confirm" class="block text-sm font-medium text-gray-700">{{ __('Confirm Password') }}</label>
                        <input id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password"
                            class="mt-1 form-input w-full rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                    </div>

                    <div class="flex justify-between items-center">
                        <button type="submit"
                            class="w-full py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Register') }}
                        </button>
                        <p class="mt-4 text-sm text-gray-600 sm:mt-0">
                            {{ __('Already have an account?') }}
                            <a href="{{ route('login') }}" class="font-medium text-indigo-600 hover:text-indigo-500">
                                {{ __('Login') }}
                            </a>
                        </p>
                    </div>
                </form>

            </section>
        </div>
    </div>
</main>
@endsection
