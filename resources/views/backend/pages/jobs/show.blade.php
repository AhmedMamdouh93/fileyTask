@extends('backend.layouts.master')

@section('title',transWord('Show Page Data'))

@section('stylesheet')

@endsection

@section('content')

@include('backend.components.errors')

<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card">
            <div class="header">
                <h2>@lang('tr.Page Data')</h2>
                <ul class="header-dropdown dropdown">
                    
                    <li><a href="javascript:void(0);" class="full-screen"><i class="icon-frame"></i></a></li>
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('edit_pages',$pagedata->id) }}"><i class="fa fa-edit"></i> {{ transWord('Edit Data') }}</a></li>
                            <li><a href="{{ route('destroy_pages',$pagedata->id) }}" onclick="return confirm('{{ transWord('Are You Sure?') }}')"><i class="fa fa-trash"></i> @lang('tr.Delete Data')</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="body">
                <h3>@lang('tr.Page Data')</h3>
                <hr>
                    
                <div class="row">
                    <div class="col-lg-12"><h5>{{ transWord('Title') }}: {{ getDataFromJsonByLanguage($pagedata->title) }}</h5></div>
                    <div class="col-lg-12"><h5>{{ transWord('Page Tag') }}: {{ getDataFromJsonByLanguage($pagedata->slug) }}</h5></div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-lg-12"><h5>@lang('tr.Meta Data')</h5></div>
                    <div class="col-lg-12"><h5>@lang('tr.Meta Title'): {{ getDataFromJsonByLanguage($pagedata->meta_title) }}</h5></div>
                    <div class="col-lg-12"><h5>@lang('tr.Meta Descriptions'): {{ getDataFromJsonByLanguage($pagedata->meta_desc) }}</h5></div>
                    <div class="col-lg-12"><h5>@lang('tr.Meta Keywords'): {{ getDataFromJsonByLanguage($pagedata->meta_keywords) }}</h5></div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-lg-12">
                        <h5>@lang('tr.Content')</h5>
                        {!! getDataFromJsonByLanguage($pagedata->content) !!}
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-lg-12">
                        @if ($pagedata->publish == 1)
                        <span class="badge badge-primary" style="font-weight: bold;font-size:15px;padding:10px;">{{ transWord('Publish') }}</span>
                        @else
                        <span class="badge badge-danger" style="font-weight: bold;font-size:15px;padding:10px;">@lang('tr.Unpublish')</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('javascript')

@endsection