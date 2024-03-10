@extends('layouts.app')

@section('content')
<main class="sm:container sm:mx-auto sm:max-w-lg sm:mt-10">
    <div class="flex justify-center">
        <div class="w-full">
            <section class="bg-white shadow-md sm:rounded-md">

                <header class="bg-gray-200 text-gray-700 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
                    <h2 class="font-semibold text-lg">
                        {{ __('Confirm Password') }}
                    </h2>
                </header>

                <form class="px-6 py-8 space-y-6 sm:px-10 sm:space-y-8" method="POST" action="{{ route('password.confirm') }}">
                    @csrf

                    <p class="text-gray-600 leading-normal">
                        {{ __('Please confirm your password before continuing.') }}
                    </p>

                    <div class="mt-6">
                        <label for="password" class="block text-sm font-medium text-gray-700">{{ __('Password') }}</label>
                        <input id="password" type="password" name="password" required autocomplete="current-password"
                            class="mt-1 form-input w-full rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 @error('password') border-red-500 @enderror">
                        @error('password')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mt-6 flex items-center justify-between">
                        <button type="submit"
                            class="w-full flex justify-center items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Confirm Password') }}
                        </button>

                        @if (Route::has('password.request'))
                            <a class="mt-2 text-sm text-blue-600 hover:text-blue-500"
                                href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </div>
                </form>

            </section>
        </div>
    </div>
</main>
@endsection
