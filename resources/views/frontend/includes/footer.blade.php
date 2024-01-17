<footer class="text-center bg-gray-100">
    <div class="max-w-screen-xl px-4 py-12 mx-auto sm:px-6 lg:px-8">
        <div class="max-w-3xl mx-auto space-y-6">
            <div class="flex justify-center space-x-6"></div>

            <nav class="relative flex flex-wrap justify-center gap-8 p-8 text-sm font-bold border-2 border-black rounded-xl">
                <a class="hover:opacity-75" href="#" target="_blank" rel="noopener noreferrer">
                    Laravel
                </a>

                <a class="hover:opacity-75" href="/blog" target="_blank" rel="noopener noreferrer">
                    Blog
                </a>

                <a class="hover:opacity-75" href="/portfolio" target="_blank" rel="noopener noreferrer">
                    Portfolio
                </a>
            </nav>

            <p class="max-w-lg mx-auto text-xs text-gray-500">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum, natus
                tempore illo laborum nam, modi quam sequi amet quo quasi impedit iure
                eum similique pariatur alias exercitationem, porro perspiciatis esse.
                Corporis odit consequatur sint sequi.
            </p>

            <p class="text-xs font-medium">
                &copy; {{ app_name() }}, {!! setting('footer_text') !!}
            </p>
        </div>
    </div>
</footer>