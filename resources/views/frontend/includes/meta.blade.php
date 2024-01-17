@php
if(!isset($meta_page_type)){
$meta_page_type = 'website';
}
@endphp

@switch($meta_page_type)
@case('website')
<meta property="og:type" content="website" />
@break

@case('article')
<meta property="og:type" content="article" />
<meta property="article:published_time" content="{{$$module_name_singular->created_at}}" />
<meta property="article:modified_time" content="{{$$module_name_singular->updated_at}}" />
<meta property="article:author" content="{{isset($$module_name_singular->created_by_alias)? $$module_name_singular->created_by_alias : $$module_name_singular->created_by_name}}" />
<meta property="article:section" content="{{$$module_name_singular->category_name}}" />
@foreach ($$module_name_singular->tags as $tag)
<meta property="article:tag" content="{{$tag->name}}" />
@endforeach

@break

@case('collection')
<meta property="og:type" content="collection" />
<meta property="collection:published_time" content="{{$$module_name_singular->created_at}}" />
<meta property="collection:modified_time" content="{{$$module_name_singular->updated_at}}" />
<meta property="collection:author" content="{{isset($$module_name_singular->created_by_alias)? $$module_name_singular->created_by_alias : $$module_name_singular->created_by_name}}" />
<meta property="collection:section" content="{{$$module_name_singular->taxon_name}}" />
@break


@case('profile')
<meta property="og:type" content="profile" />
<meta property="profile:first_name" content="{{$$module_name_singular->first_name}}" />
<meta property="profile:last_name" content="{{$$module_name_singular->last_name}}" />
<meta property="profile:username" content="{{$$module_name_singular->email}}" />
<meta property="profile:gender" content="{{$$module_name_singular->gender}}" />
@break

@default

@endswitch

<!-- Meta -->
<meta property="og:url" content="{{url()->full()}}" />
<meta property="og:title" content="@yield('title') | {{ config('app.name') }}" />
<meta property="og:site_name" content="{{setting('meta_site_name')}}" />
<meta property="og:description" content="{{ setting('meta_description') }}" />
<meta property="og:image" content="{{ asset(setting('meta_image')) }}" />
<meta property="og:image:width" content="1200" />
<meta property="og:image:height" content="630" />


<!--canonical link-->
<meta name="generator" content="Laravel Costar" />
<link rel="canonical" href="{{url()->full()}}">
