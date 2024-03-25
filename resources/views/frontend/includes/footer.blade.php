<footer class="text-center bg-gray-100">
    <div class="max-w-screen-xl px-4 py-12 mx-auto sm:px-6 lg:px-8">
        <div class="max-w-3xl mx-auto space-y-6">

            <nav class="relative flex flex-wrap justify-center gap-8 p-4 text-sm font-bold">
                <a href="{{ route('frontend.categories.index') }}" class="text-gray-600 border-transparent border-b-2 hover:border-orange-600 px-3 py-2 text-base font-medium transition ease-out duration-300">
                    {{__('Categories')}}
                </a>
                <a href="{{ route('frontend.tags.index') }}" class="text-gray-600 border-transparent border-b-2 hover:border-orange-600 px-3 py-2 text-base font-medium transition ease-out duration-300">
                    {{__('Tags')}}
                </a>
                <a href="{{ route('frontend.taxons.index') }}" class="text-gray-600 border-transparent border-b-2 hover:border-orange-600 px-3 py-2 text-base font-medium transition ease-out duration-300">
                    {{__('Taxons')}}
                </a>
            </nav>

            <p class="text-xs font-medium">
                &copy; {{ app_name() }}, {!! setting('footer_text') !!}
            </p>
        </div>
    </div>
    <div class="relative">
        <button class="scroll-to-top rounded-lg">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="20" height="20" fill="#f0f0f0">
                <path d="M256 48a208 208 0 1 1 0 416 208 208 0 1 1 0-416zm0 464A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM377 271L273 167c-9.4-9.4-24.6-9.4-33.9 0L135 271c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l87-87 87 87c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9z"/>
            </svg>
        </button>
    </div>
</footer>