@extends('frontend.layouts.app')

@section('title') {{ __("Subjects") }} @endsection

@section('content')

<section class="bg-gray-100 text-gray-600 py-20">
    <div class="container mx-auto flex px-5 items-center justify-center flex-col">
        <div class="text-center lg:w-2/3 w-full">
            <h1 class="text-3xl sm:text-4xl mb-4 font-medium text-gray-800">
                {{ __("Collections") }}
            </h1>
            <p class="mb-8 leading-relaxed"></p>

            @include('frontend.includes.messages')
        </div>
    </div>
</section>


@php

    $taxon_group_data = array();
    $fields = array('id', 'name', 'slug', 'site', 'taxon_id', 'taxon_name', 'description', 'meta_title', 'meta_keywords', 'meta_description', 'hits', 'order', 'status', 'created_at', 'updated_at');

    foreach($$module_name as $$module_name_singular) {
        $taxon_key = $$module_name_singular->taxon->name;
        $taxon_data= $$module_name_singular->taxon;
        $subject_fields = array();
        foreach($fields as $field) {
            $subject_fields[$field] = $$module_name_singular->$field;
        }
        if(!array_key_exists($taxon_key, $taxon_group_data)) {
            $taxon_group_data[$taxon_key] = array();
            $taxon_group_data[$taxon_key]['taxon'] = $taxon_data;
            $taxon_group_data[$taxon_key]['subject'] = array();
            array_push($taxon_group_data[$taxon_key]['subject'], $subject_fields);
        } else {
            $taxon_group_data[$taxon_key]['taxon'] = $taxon_data;
            array_push($taxon_group_data[$taxon_key]['subject'], $subject_fields);
        }
    }
    
    // print_r(json_encode($taxon_group_data));

@endphp

<section class="bg-white text-gray-600 p-6 sm:p-20">
    @foreach ($taxon_group_data as $group_key => $group_data)
        @php
        $taxon_url = route('frontend.taxons.show', [encode_id($group_data['taxon']->id), $group_data['taxon']->slug]);
        @endphp
        <dl class="mb-5">
            <dt class="mb-3">
                <a href="{{$taxon_url}}" ttarget="_blank">{{$group_data['taxon']->name}}</a>
            </dt>
            <dd class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                @foreach ($group_data['subject'] as $index => $data)
                    @php
                    $detail_url = route("frontend.$module_name.show",[encode_id($data['id']), $data['slug']]);
                    @endphp
                    <div class="flex flex-col p-4 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <p>{{$data['name']}}</p>
                        <p><a href="{{$data['site'].'?from=costar'}}" target="_blank">{{$data['site']}}</a></p>
                        <p>{{$data['description']}}</p>
                        <div class="text-end"><a class="inline-flex items-center text-sm outline outline-1 outline-gray-800 text-gray-700 hover:text-gray-100 bg-gray-200 hover:bg-gray-700 py-2 px-3 focus:outline-none rounded" href="{{$detail_url}}" target="_blank">{{__('View details')}}</a></div>
                    </div>
                @endforeach
            </dd>
        </dl>
    @endforeach
</section>


<!--
<section class="bg-white text-gray-600 p-6 sm:p-20">
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
        @foreach ($$module_name as $$module_name_singular)
        
        @php
        $detail_url = route("frontend.$module_name.show",[encode_id($$module_name_singular->id), $$module_name_singular->slug]);
        $taxon_url = route('frontend.taxons.show', [encode_id($$module_name_singular->taxon_id), $$module_name_singular->taxon->slug]);
        @endphp
        
        <x-frontend.card :url="$detail_url" :name="$$module_name_singular->name">
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                {{ __("Site") }}: <a href="{{$$module_name_singular->site}}" target="_blank">{{$$module_name_singular->site}}</a>
            </p>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                {{ __("Description") }}: {{$$module_name_singular->description}}
            </p>
            <p>
                {{ __("Taxon") }}: <x-frontend.badge :url="$taxon_url" :text="$$module_name_singular->taxon_name" />
            </p>
        </x-frontend.card>
        @endforeach
    </div>
    <div class="d-flex justify-content-center w-100 mt-4">
        {{$$module_name->links()}}
    </div>
</section>
-->

@endsection