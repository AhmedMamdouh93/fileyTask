@extends('backend.layouts.master')

@section('title','Jobs')

@section('stylesheet')

@include('backend.components.datatablecss')

@endsection

@section('content')

<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card">
            <div class="header">
                <h2>All Jobs</h2>
                <ul class="header-dropdown dropdown">
                    
                    <li><a href="javascript:void(0);" class="full-screen"><i class="icon-frame"></i></a></li>
                
                </ul>
            </div>
            <div class="body">
                <div class="table-responsive">
                        <table id="example" class="display table table-hover js-basic-example dataTable table-custom spacing5" style="width:100%">
                        <thead>
                            <tr>
                                <th style="background: rgb(60, 64, 68);color:white;">#</th>
                                <th style="background: rgb(60, 64, 68);color:white;">Id</th>
                                <th style="background: rgb(60, 64, 68);color:white;">Title</th>
                                <th style="background: rgb(60, 64, 68);color:white;">Date From</th>
                                <th style="background: rgb(60, 64, 68);color:white;">Date To</th>
                                <th style="background: rgb(60, 64, 68);color:white"></th>
                            </tr>
                        </thead>
                        
                        <tbody id="permissionTable">
                            
                            @foreach ($jobs as $index => $job)
                            <tr>
                                <td style="background: #595f66;color:white;">{{ $index + 1 }}</td>
                                <td style="background: #595f66;color:white;">{{$job->id}}</td>
                                <td style="background: #595f66;color:white;">{{$job->title}}</td>
                                <td style="background: #595f66;color:white;">{{$job->date_from}}</td>
                                <td style="background: #595f66;color:white;">{{$job->date_to}}</td>
                                <td style="background: #595f66;color:white;">
                                    <li class="dropdown language-menu" style="list-style: none">
                                        <a href="javascript:void(0);" class="dropdown-toggle icon-menu" data-toggle="dropdown" style="color: white;">
                                            <i class="fa fa-bars"></i>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item pt-2 pb-2" href="{{ route('view.job',$job->id) }}"><i class="fa fa-eye"></i>Show</a>
                                        </div>
                                    </li>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('javascript')

@include('backend.components.datatablejs')

<script>

</script>
@endsection