@if (isset($$module_name_singular))

    @php
    if(!isset($meta_page_type)){
        $meta_page_type = 'website';
    }
    @endphp
    @switch($meta_page_type)
        @case('website')
            <meta property="page:type" content="website" />
            @break

        @case('page')
            <meta property="page:type" content="page" />
            <meta property="page:meta_title" content="{{$$module_name_singular->meta_title}}" />
            <meta property="page:meta_keywords" content="{{$$module_name_singular->meta_keywords}}" />
            <meta property="page:meta_description" content="{{$$module_name_singular->meta_description}}" />
            <meta property="page:published_time" content="{{$$module_name_singular->created_at}}" />
            <meta property="page:modified_time" content="{{$$module_name_singular->updated_at}}" />
            <meta property="page:author" content="{{isset($$module_name_singular->created_by_alias)? $$module_name_singular->created_by_alias : $$module_name_singular->created_by_name}}" />

            @break

        @case('article')
            <meta property="page:type" content="article" />
            <meta property="article:meta_title" content="{{$$module_name_singular->meta_title}}" />
            <meta property="article:meta_keywords" content="{{$$module_name_singular->meta_keywords}}" />
            <meta property="article:meta_description" content="{{$$module_name_singular->meta_description}}" />
            @php
            $tags_arr = array();;
            foreach($$module_name_singular->tags as $tag) {
                array_push($tags_arr, $tag->name);
            }
            @endphp
            <meta property="article:tag" content="{{implode(',', $tags_arr)}}" />
            <meta property="article:published_time" content="{{$$module_name_singular->created_at}}" />
            <meta property="article:modified_time" content="{{$$module_name_singular->updated_at}}" />
            <meta property="article:author" content="{{isset($$module_name_singular->created_by_alias)? $$module_name_singular->created_by_alias : $$module_name_singular->created_by_name}}" />
            <meta property="article:category_name" content="{{$$module_name_singular->category_name}}" />

            @break

        @case('collection')
            <meta property="page:type" content="collection" />
            <meta property="collection:taxon_name" content="{{$$module_name_singular->taxon_name}}" />
            <meta property="collection:meta_title" content="{{$$module_name_singular->meta_title}}" />
            <meta property="collection:meta_keywords" content="{{$$module_name_singular->meta_keywords}}" />
            <meta property="collection:meta_description" content="{{$$module_name_singular->meta_description}}" />
            <meta property="collection:published_time" content="{{$$module_name_singular->created_at}}" />
            <meta property="collection:modified_time" content="{{$$module_name_singular->updated_at}}" />

            @break

        @case('profile')
            <meta property="page:type" content="profile" />
            <meta property="profile:first_name" content="{{$$module_name_singular->first_name}}" />
            <meta property="profile:last_name" content="{{$$module_name_singular->last_name}}" />
            <meta property="profile:username" content="{{$$module_name_singular->email}}" />
            <meta property="profile:gender" content="{{$$module_name_singular->gender}}" />

            @break

        @default

    @endswitch

@endif

<!--canonical link-->
<meta name="generator" content="Laravel Costar" />
<link rel="canonical" href="{{url()->full()}}">
