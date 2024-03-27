@if(env('FACEBOOK_ACTIVE') || env('GITHUB_ACTIVE') || env('GOOGLE_ACTIVE'))
<div class="mb-4">
    <div class="text-center mt-2 mb-4">
        Sign in with social profiles
    </div>

    <div class="pb-4 text-center">
        @if(env('FACEBOOK_ACTIVE'))
        <x-buttons.link href="{{route('social.login', 'facebook')}}" class="bg-blue-600 hover:bg-blue-700">
            <span class="">Facebook</span>
        </x-buttons.link>
        @endif

        @if(env('GITHUB_ACTIVE'))
        <x-buttons.link href="{{route('social.login', 'github')}}" class="bg-gray-600 hover:bg-gray-700">
            <span class="">Github</span>
        </x-buttons.link>
        @endif

        @if(env('GOOGLE_ACTIVE'))
        <x-buttons.link href="{{route('social.login', 'google')}}" class="bg-red-600 hover:bg-red-700">
            <span class="">Google</span>
        </x-buttons.link>
        @endif
    </div>

    <hr>
</div>
@endif