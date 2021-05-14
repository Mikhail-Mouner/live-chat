@extends('layouts.app')

@section('content')
    <main class="sm:container sm:mx-auto sm:mt-10">
        <div class="w-full sm:px-6">

            <section class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-sm sm:shadow-lg">

                <header class="font-semibold bg-gray-200 text-gray-700 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
                    {{ __('general.welcome') }}
                </header>

                <div class="w-full p-6">
                    <p class="text-gray-700">
                    {{ __('general.paragraph') }}
                    </p>
                </div>
                <a href="{{ LaravelLocalization::getLocalizedURL('ar') }}">
                    {{ __('general.Follow this link') }}
                </a>

                {{ LaravelLocalization::getLocalizedURL('en') }}
                <br />
                {{ LaravelLocalization::getNonLocalizedURL('/en/about') }}
                <br />
                {{--
                {{ LaravelLocalization::getURLFromRouteNameTranslated('ar', 'routes.about') }}
                <br />
                {{ LaravelLocalization::getSupportedLocales() }}
                <br />
                {{ LaravelLocalization::getLocalesOrder() }}
                <br />
                {{ LaravelLocalization::getSupportedLanguagesKeys() }}
                <br />
                {{ LaravelLocalization::getCurrentLocale() }}
                <br />
                {{ LaravelLocalization::getCurrentLocaleDirection() }}
                <br />
                {{ LaravelLocalization::getCurrentLocaleScript() }}
                <br />
                --}}
                <ul>
                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                        <li>
                            <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                {{ $properties['native'] }}
                            </a>
                        </li>
                    @endforeach
                </ul>

            </section>
        </div>
    </main>
@endsection
