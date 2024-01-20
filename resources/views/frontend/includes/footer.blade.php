<footer class="text-center bg-gray-100">
    <div class="max-w-screen-xl px-4 py-12 mx-auto sm:px-6 lg:px-8">
        <div class="max-w-3xl mx-auto space-y-6">
            <div class="flex justify-center space-x-6">
                Feature content
            </div>

            <nav class="relative flex flex-wrap justify-center gap-8 p-8 text-sm font-bold border-1 border-black rounded-xl">
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
</footer>