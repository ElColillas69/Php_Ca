@extends('layouts.app')

@section('content')
<main class="sm:container sm:mx-auto sm:max-w-lg sm:mt-10">
    <div class="flex justify-center">
        <div class="w-full">
            @if (session('resent'))
            <div class="bg-green-100 border border-green-600 text-green-700 px-4 py-3 rounded mb-4" role="alert">
                <p class="text-sm">{{ __('A fresh verification link has been sent to your email address.') }}</p>
            </div>
            @endif

            <section class="bg-white shadow-md sm:rounded-md">
                <header class="bg-gray-200 text-gray-700 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
                    <h2 class="font-semibold text-lg">{{ __('Verify Your Email Address') }}</h2>
                </header>

                <div class="p-6 sm:p-8">
                    <p class="text-gray-700 leading-normal text-sm mb-6">
                        {{ __('Before proceeding, please check your email for a verification link.') }}
                    </p>

                    <p class="text-gray-700 leading-normal text-sm mb-6">
                        {{ __('If you did not receive the email') }}, 
                        <a href="{{ route('verification.resend') }}" class="text-blue-500 hover:text-blue-700 underline">{{ __('click here to request another') }}</a>.
                    </p>
                </div>
            </section>
        </div>
    </div>
</main>
@endsection
