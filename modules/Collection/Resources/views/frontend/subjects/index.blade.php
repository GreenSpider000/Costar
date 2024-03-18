@extends('frontend.layouts.app')

@section('title') {{ __($module_title) }} @endsection

@section('content')

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
@endphp

<section class="quick-navigation rounded-lg p-2 bg-gray-100 text-sm">
    @foreach ($taxon_group_data as $group_key => $group_data)
    	<a href="#{{$group_data['taxon']->slug}}" class="quick-navigation-item uppercase">
    	    {{$group_data['taxon']->name}}
    	</a>
    @endforeach
    <div class="scroll-progress-indicator rounded-lg visible">0%</div>
</section>

<section class="bg-gray-100 text-gray-600 py-20">
    <div class="container mx-auto flex px-8 items-center justify-center flex-col">
        <div class="text-center lg:w-2/3 w-full">
            <h1 class="text-3xl sm:text-4xl mb-4 font-medium text-gray-800">
                {{ __($module_title) }}
            </h1>
            <p class="mb-8 leading-relaxed">
                The list of {{ __($module_name) }}.
            </p>

            @include('frontend.includes.messages')
        </div>
    </div>
</section>

<section class="bg-white text-gray-600 p-6 sm:p-20">
    <div class="container mx-auto px-8 sm:px-20">
        @foreach ($taxon_group_data as $group_key => $group_data)
            @php
            $taxon_url = route('frontend.taxons.show', [encode_id($group_data['taxon']->id), $group_data['taxon']->slug]);
            @endphp
            <dl class="mb-5 section-scroll-step" id="{{$group_data['taxon']->slug}}">
                <dt class="flex flex items-center mb-3">
                    <svg 
                        class="icon" 
                        viewBox="0 0 1024 1024" 
                        xmlns="http://www.w3.org/2000/svg" 
                        width="20" 
                        height="20"
                    >
                        <path d="M1004.512 444.256l-160-256c-23.36-37.408-64.384-60.16-108.512-60.16H128c-70.688 0-128 57.312-128 128v512c0 70.688 57.312 128 128 128h608c44.128 0 85.12-22.752 108.512-60.192l160-256c25.984-41.44 25.984-94.144 0-135.648zM950.24 545.984l-160 256.064c-11.744 18.816-32.064 30.048-54.24 30.048H128c-35.296 0-64-28.736-64-64v-512c0-35.296 28.704-64 64-64h608c22.176 0 42.496 11.264 54.24 30.048l160 256c12.896 20.64 12.896 47.264 0 67.84zM736 416.096c-53.056 0-96 42.976-96 96s42.944 96 96 96c52.992 0 96-43.008 96-96 0-53.024-43.008-96-96-96zm0 160.032c-35.36 0-64-28.672-64-64s28.64-64 64-64c35.328 0 64 28.672 64 64s-28.672 64-64 64z" fill="#555"/>
                    </svg>
                    <a class="uppercase text-xl ms-3" href="{{$taxon_url}}" ttarget="_blank">{{$group_data['taxon']->name}}</a>
                </dt>
                <dd class="grid grid-cols-1 sm:grid-cols-4 gap-6">
                    @foreach ($group_data['subject'] as $index => $data)
                        @php
                        $detail_url = route("frontend.$module_name.show",[encode_id($data['id']), $data['slug']]);
                        @endphp
                        <div 
                            class="flex flex-col p-4 bg-white border border-gray-200 rounded-lg shadow hover:shadow-lg dark:bg-gray-800 dark:border-gray-700"
                            data-toggle="tooltip" 
                            data-coreui-placement="top" 
                            title="{{$data['description'] ?? $data['name']}}"
                        >
                            <a href="{{$detail_url}}" target="_blank">
                                <h2 class="uppercase mb-2 text-lg font-semibold truncate">{{$data['name']}}</h2>
                            </a>
                            <p class="relative mb-1">
                                <i class="fa fa-fw fa-link absolute left-0 top-1 text-gray-500"></i>
                                <a class="block ml-8 truncate" href="{{$data['site'].'?from=costar'}}" target="_blank">{{$data['site']}}</a>
                            </p>
                            <p class="text-sm text-gray-400 truncate">{{$data['description']}}</p>
                            <!-- <div class="text-end"><a class="inline-flex items-center text-sm text-gray-700 hover:text-gray-100 bg-gray-200 hover:bg-gray-700 py-2 px-3 rounded" href="{{$detail_url}}" target="_blank">{{__('View details')}}</a></div> -->
                        </div>
                    @endforeach
                </dd>
            </dl>
        @endforeach
    </div>
</section>

<script>
    $(document).ready(function(){ 
        //////////////////////
    	// ScrollManager init
    	//////////////////////
    
    	let scrollToTopBtn = document.querySelector('.scroll-to-top'),
    		steps = document.querySelectorAll('.section-scroll-step'),
    		navigationContainer = document.querySelector('.quick-navigation'),
    		links = navigationContainer ? navigationContainer.querySelectorAll('a') : null,
    		progressIndicator = document.querySelector('.scroll-progress-indicator');
    
    	ScrollManager.init({
    		steps: steps,
    		scrollToTopBtn: scrollToTopBtn,
    		navigationContainer: navigationContainer,
    		links: links,
    
    		// Customize onScroll behavior
    		onScroll: function () {
    			const percentage = ScrollManager.scrollPercentage();
    			if (percentage >= 10) {
    			    scrollToTopBtn.classList.add('visible');
    				progressIndicator.innerHTML = percentage + "%";
    				progressIndicator.classList.add('visible');
    			} else {
    			    scrollToTopBtn.classList.remove('visible');
    				progressIndicator.classList.remove('visible');
    			}
    		},
    
    		// Behavior when a step changes
    		// default : highlight links 
    
    		// onStepChange: function (step) {},
    
    		// Customize the animation with jQuery, GSAP or velocity 
    		// default : jQuery animate()
    		// Eg with GSAP scrollTo plugin
    
    		//smoothScrollAnimation: function (target) {
    		//    TweenLite.to(window, 2, {scrollTo:{y:target}, ease:Power2.easeOut});
    		//}
    
    	});
    
    	//////////////////////
    	// END ScrollManager init
    	//////////////////////
    }); 
</script>

@endsection