<footer class="flex flex-wrap items-center justify-around px-4 py-4 text-sm border-t border-gray-100 ">

    <div class="flex space-x-4">
        @foreach (config('app.supported_locales') as $locale => $data)
            <a href="{{ route('locale', $locale) }}">
                <x-dynamic-component :component="'flag-country-' . $data['icon']" class="w-6 h-6" />
            </a>
        @endforeach
        {{--
        <a href="{{route('locale', 'en')}}">
            <x-flag-language-en class="w-6 h-6" />
        </a>
        <a href="{{route('locale', 'fr')}}">
            <x-flag-language-fr class="w-6 h-6" />
        </a>
         --}}
    </div>
    <div class="flex space-x-4">
        <a class="text-gray-500 hover:text-yellow-500" href="">{{ __('menu.login') }} </a>
        <a class="text-gray-500 hover:text-yellow-500" href="">{{ __('menu.profile') }} </a>
        <a class="text-gray-500 hover:text-yellow-500" href="">{{ __('menu.blog') }} </a>
    </div>
</footer>
