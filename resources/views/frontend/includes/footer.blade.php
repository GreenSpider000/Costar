<footer class="text-center bg-gray-100">
    <div class="max-w-screen-xl px-4 py-12 mx-auto sm:px-6 lg:px-8">
        <div class="max-w-3xl mx-auto space-y-6">
            <div class="flex justify-center space-x-6"></div>

            <nav class="relative flex flex-wrap justify-center gap-8 p-8 text-sm font-bold border-2 border-black rounded-xl">
                <a class="hover:opacity-75" href="https://laravel.com/" target="_blank" rel="noopener noreferrer">
                    Laravel
                </a>

                <a class="hover:opacity-75" href="https://laravel.com/docs" target="_blank" rel="noopener noreferrer">
                    Laravel doc
                </a>
            </nav>

            <p class="text-xs font-medium">
                &copy; {{ app_name() }}, {!! setting('footer_text') !!}
            </p>
        </div>
    </div>
</footer>