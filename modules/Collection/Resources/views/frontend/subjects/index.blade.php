@extends('frontend.layouts.app')

@section('title') {{ __($module_title) }} @endsection

@section('content')

<section class="bg-gray-100 text-gray-600 py-10">
    <div class="container mx-auto flex px-8 items-center justify-center flex-col">
        <div class="text-center lg:w-2/3 w-full">
            <h1 class="text-3xl sm:text-4xl mb-4 font-medium text-gray-800">
                <i class="fa fa-fw fa-link text-gray-500"></i> {{ __($module_title) }}
            </h1>
            <p class="mb-8 leading-relaxed">
                The list of {{ __($module_name) }}.
            </p>
            
            <x-search />

            @include('frontend.includes.messages')
        </div>
    </div>
</section>

<section class="mx-auto flex md:flex-row flex-col bg-gray-100 text-gray-600 p-8">
    <div class="collection_sidebar relative flex flex-col flex-0-0-200">
        <div class="collection_sidebar_inner">
            <ul class="quick-navigation rounded-lg p-4 bg-white border border-gray-200">
                @foreach ($module_group_data as $group_key => $group_data)
                    @php
                    $tax_icon = $group_data['taxon']['icon_class'] ? icon($group_data['taxon']['icon_class']) : icon("fa fa-folder-open");
                    $taxon_name = $group_data['taxon']['name'];
                    $slug = $group_data['taxon']['slug'];
                    @endphp
                    <li class="quick-navigation-item my-2">
                    	<a href="#{{$slug}}" data-href="#{{$slug}}" class="quick-navigation-link block uppercase px-2 rounded font-base leading-10 text-gray-500">
                    	    {!! html_entity_decode($tax_icon) !!} {{$taxon_name}}
                    	</a>
                	</li>
                @endforeach
            </ul>
            <div class="scroll-progress-indicator rounded-lg visible">0%</div>
        </div>
    </div>
    <div class="collection_content flex flex-col flex-1 pl-6">
        @foreach ($module_group_data as $group_key => $group_data)
            @php
            $taxon_url = route('frontend.taxons.show', [encode_id($group_data['taxon']['id']), $group_data['taxon']['slug']]);
            @endphp
            <div id="{{$group_data['taxon']['slug']}}" class="card scroll-section mb-6 px-6 py-4 bg-white border border-gray-200 rounded-lg hover:shadow-lg">
                <div class="card-header flex items-center justify-between mb-3 pb-2 border-b">
                    <span class="flex items-center">
                        <svg 
                            class="icon" 
                            viewBox="0 0 1024 1024" 
                            xmlns="http://www.w3.org/2000/svg" 
                            width="20" 
                            height="20"
                        >
                            <path d="M1004.512 444.256l-160-256c-23.36-37.408-64.384-60.16-108.512-60.16H128c-70.688 0-128 57.312-128 128v512c0 70.688 57.312 128 128 128h608c44.128 0 85.12-22.752 108.512-60.192l160-256c25.984-41.44 25.984-94.144 0-135.648zM950.24 545.984l-160 256.064c-11.744 18.816-32.064 30.048-54.24 30.048H128c-35.296 0-64-28.736-64-64v-512c0-35.296 28.704-64 64-64h608c22.176 0 42.496 11.264 54.24 30.048l160 256c12.896 20.64 12.896 47.264 0 67.84zM736 416.096c-53.056 0-96 42.976-96 96s42.944 96 96 96c52.992 0 96-43.008 96-96 0-53.024-43.008-96-96-96zm0 160.032c-35.36 0-64-28.672-64-64s28.64-64 64-64c35.328 0 64 28.672 64 64s-28.672 64-64 64z" fill="#555"/>
                        </svg>
                        <span class="uppercase pl-2 text-xl font-medium">{{$group_data['taxon']['name']}}</span>
                    </span>
                    <span class="text-sm text-gray-400 hover:text-gray-500">
                        <a class="pr-1" href="{{$taxon_url}}" target="_blank">@lang('More')</a><i class="fa fal fa-angle-right"></i>
                    </span>
                </div>
                <div class="card-body grid grid-cols-1 sm:grid-cols-4 gap-4">
                    @foreach ($group_data['subject'] as $index => $data)
                        @php
                        $detail_url = route("frontend.$module_name.show",[encode_id($data['id']), $data['slug']]);
                        $target_link = setting('subject_target') == 0 ? $data['site'].'?from=costar' : $detail_url;
                        $favicon = getFavicon($data['site']);
                        @endphp
                        <div 
                            class="flex flex-col p-2 rounded-lg hover:bg-light-blue"
                            data-toggle="tooltip" 
                            data-coreui-placement="top" 
                            title="{{$data['description'] ?? $data['name']}}"
                        >
                            <a class="subject-item block" href="{{$target_link}}" target="_blank">
                                <div class="flex items-center">
                                    <div class="flex-0-0-48">
                                        <div class="favicon">
                                            <img class="rounded-lg" src="{{$favicon}}" width="36" alt="{{$data['name']}}" />
                                        </div>
                                    </div>
                                    <div class="flex-1 truncate">
                                        <h2 class="uppercase text-base truncate">{{$data['name']}}</h2>
                                        <p class="text-gray-500 truncate">
                                            {{$data['site']}}
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
</section>
<script>
    $(document).ready(function(){
        //////////////////////
    	// StickySidebar
    	//////////////////////
    	
        new StickySidebar(".collection_sidebar", {
            topSpacing: 20,
            bottomSpacing: 20,
            containerSelector: ".collection_content",
            innerWrapperSelector: ".collection_sidebar_inner",
        });


        //////////////////////
    	// ScrollManager init
    	//////////////////////
    
    	let navigationContainer = document.querySelector('.quick-navigation'),
    		links = navigationContainer ? navigationContainer.querySelectorAll('.quick-navigation-link') : null,
    		sections = document.querySelectorAll('.scroll-section'),
    		progressIndicator = document.querySelector('.scroll-progress-indicator'),
    		scrollToTopBtn = document.querySelector('.scroll-to-top');
    
    	ScrollManager.init({
    		sections: sections,
    		scrollToTopBtn: scrollToTopBtn,
    		navigationContainer: navigationContainer,
    		links: links,
    
    		// Customize onScroll behavior
    		onScroll: function () {
    			const percentage = ScrollManager.getScrollPercentage();
    			if (percentage >= 10) {
    			    scrollToTopBtn.classList.add('visible');
    				progressIndicator.innerHTML = percentage + "%";
    				progressIndicator.classList.add('visible');
    			} else {
    			    scrollToTopBtn.classList.remove('visible');
    				progressIndicator.classList.remove('visible');
    			}
    		},
    
    		// Behavior when a section changes
    		// default : highlight links 
    
    		// onSectionChange: function (section) {},
    
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