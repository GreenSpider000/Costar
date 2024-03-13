@extends('frontend.layouts.app')

@section('title') {{ $$module_name_singular->name }} @endsection

@section('content')

<section class="bg-gray-100 text-gray-600 body-font px-6 sm:px-20">
    <div class="container mx-auto flex py-8 sm:py-16 md:flex-row flex-col items-center">
        <div class="w-full flex flex-col items-center">
            <h1 class="sm:text-4xl text-3xl mb-4 font-medium text-gray-800">
                {{$$module_name_singular->name}}
            </h1>

            @include('frontend.includes.messages')
        </div>
    </div>
</section>

<section class="py-6 sm:py-10 px-6 sm:px-20">
    <div class="container mx-auto flex md:flex-row flex-col">
        <div class="w-full flex flex-row">
            <div class="flex flex-col flex-0-0-100">
                <img class="w-20 h-20 rounded-full" src="{{asset('images/avatars/'.rand(1, 8).'.jpg')}}" alt="image" />
            </div>
            <div class="flex flex-col flex-1">
                @if($$module_name_singular->site != "")
                <div class="mb-2 leading-relaxed">
                    <a href="{{$$module_name_singular->site}}" target="_blank">{{$$module_name_singular->site}}</a>
                </div>
                @endif
                <div class="mb-2 text-gray-400">
                    {!!$$module_name_singular->description!!}
                </div>
                <div class="mb-2">
                    <x-frontend.badge :url="route('frontend.taxons.show', [encode_id($$module_name_singular->taxon_id), $$module_name_singular->taxon->slug])" :text="$$module_name_singular->taxon_name" />
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@push ("after-style")

@endpush

@push ("after-scripts")
<script type="module" src="{{ asset('vendor/sharer/sharer@0.5.1.min.js') }}"></script>
@endpush