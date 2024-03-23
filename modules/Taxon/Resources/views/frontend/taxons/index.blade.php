@extends('frontend.layouts.app')

@section('title') {{ __($module_title) }} @endsection

@section('content')

<section class="bg-gray-100 text-gray-600 py-20">
    <div class="container mx-auto flex px-5 items-center justify-center flex-col">
        <div class="text-center lg:w-2/3 w-full">
            <h1 class="text-3xl sm:text-4xl mb-4 font-medium text-gray-800">
                <i class="fa fa-fw fa-link"></i> {{ __($module_title) }}
            </h1>
            <p class="mb-8 leading-relaxed">
                The list of {{ __($module_name) }}.
            </p>

            @include('frontend.includes.messages')
        </div>
    </div>
</section>

<section class="bg-white text-gray-600 p-6 sm:p-20">
    <div class="grid grid-cols-1 sm:grid-cols-4 gap-6">
        @foreach ($$module_name as $$module_name_singular)
            @php
                $detail_url = route("frontend.$module_name.show", [encode_id($$module_name_singular->id), $$module_name_singular->slug]);
                $icon = $$module_name_singular->icon_class ? icon($$module_name_singular->icon_class) : icon("fa fa-folder-open");
            @endphp
        
            <div class="flex flex-col p-4 bg-white border border-gray-200 rounded-lg hover:shadow-lg dark:bg-gray-800 dark:border-gray-700">
                <a class="py-2 px-3" href="{{$detail_url}}" target="_blank">
                    <div class="flex">
                        <span class="pr-2">{!! html_entity_decode($icon) !!}</span>
                        <h3 class="uppercase mb-2 font-semibold">
                            {{$$module_name_singular->name}}
                        </h3>
                    </div>
                    <p class="text-gray-400">{{$$module_name_singular->description}}</p>
                </a>
            </div>

        @endforeach
    </div>

    <div class="d-flex justify-content-center w-100 mt-3">
        {{$$module_name->links()}}
    </div>
</section>

@endsection