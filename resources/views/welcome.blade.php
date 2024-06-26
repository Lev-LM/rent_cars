@extends('dashboard')
@section('push')
@if (Route::has('login'))
<div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
    @auth

    @else
        @foreach (Config::get('languages') as $lang => $language)
            @if ($lang != App::getLocale())
                <a style="margin-right:20px" href="{{ route('lang.switch', $lang) }}"> {{$language}}</a>
            @endif
        @endforeach
        <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

        @if (Route::has('register'))
            <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
        @endif
    @endauth
</div>
@endif
@endsection

