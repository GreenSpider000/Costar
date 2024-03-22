@extends('frontend.layouts.app')

@section('title') {{$$module_name_singular->name}} - {{ __($module_title) }} @endsection

@section('content')

<section class="bg-gray-100 text-gray-600 py-10 sm:py-20">
    <div class="container mx-auto flex px-5 items-center justify-center flex-col">
        <div class="text-center lg:w-2/3 w-full">
            <h1 class="text-3xl sm:text-4xl mb-4 font-medium text-gray-800">
                <i class="fa fa-fw fa-link text-gray-500"></i> {{$$module_name_singular->name}}
            </h1>
            <p class="flex-1 h-full mb-3 font-normal text-gray-700 dark:text-gray-400">
                <a href="{{$$module_name_singular->site}}" target="_blank">
                    {{$$module_name_singular->site}}
                </a>
            </p>
            <p class="mb-8 leading-relaxed">
                {{$$module_name_singular->description}}
            </p>
            @include('frontend.includes.messages')
        </div>
    </div>
</section>

<section class="bg-white text-gray-600 p-8">
    <div class="grid grid-cols-1 sm:grid-cols-4 gap-6">
        @foreach ($subjects as $subject)
        @php
        $detail_url = route("frontend.subjects.show",[encode_id($subject->id), $subject->slug]);
        $target_link = setting('subject_target') == 0 ? $subject->site.'?from=costar' : $detail_url;
        $favicon = getFavicon($subject->site);
        @endphp
        <div 
            class="bg-white rounded-lg border border-gray-200 shadow hover:shadow-lg dark:bg-gray-800 dark:border-gray-700"
            data-toggle="tooltip" 
            data-coreui-placement="top" 
            title="{{$subject->description ?? $subject->name}}"
        >
            <div class="flex flex-col items-stretch p-3">
                <a class="subject-item block" href="{{$target_link}}" target="_blank">
                    <div class="flex items-center">
                        <div class="flex-0-0-48">
                            <div class="favicon">
                                <img class="rounded-lg" src="{{$favicon}}" width="36" alt="{{$subject['name']}}" />
                            </div>
                        </div>
                        <div class="flex-1 truncate">
                            <h2 class="uppercase text-base font-semibold truncate">
                                {{$subject->name}}
                            </h2>
                            <p class="text-gray-500 truncate">
                                {{$subject['site']}}
                            </p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        @endforeach
    </div>
    <div class="d-flex justify-content-center w-100 mt-4">
        {{$subjects->links()}}
    </div>
</section>

@endsection