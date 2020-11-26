@extends('backend.layouts.master')

@section('title','Job Application')

@section('stylesheet')

@include('backend.components.datatablecss')

@endsection

@section('content')

<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card">
            <div class="header">
                <h2>Applications of {{$job->title}}</h2>
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
                                <th style="background: rgb(60, 64, 68);color:white;">Fullname</th>
                                <th style="background: rgb(60, 64, 68);color:white">email</th>
                                <th style="background: rgb(60, 64, 68);color:white;">University</th>
                                <th style="background: rgb(60, 64, 68);color:white;">Age</th>
                                <th style="background: rgb(60, 64, 68);color:white;">CV</th>
                            </tr>
                        </thead>
                        
                        <tbody id="permissionTable">
                            
                            @foreach ($applications as $index => $application)
                            <tr>
                                <td style="background: #595f66;color:white;">{{ $index + 1 }}</td>
                                <td style="background: #595f66;color:white;">{{$application->fullname}}</td>
                                <th style="background: #595f66;color:white;">{{$application->email}}</th>
                                <td style="background: #595f66;color:white;">{{$application->university}}</td>
                                <td style="background: #595f66;color:white;">{{$application->age}}</td>
                                
                                <td style="background: #595f66;color:white;"><a href="{{URL::to('/')}}/storage/uploads/cv/{{$application->cv}}" target="_blank">
                                    <button class="btn"><i class="fa fa-eye"></i> Open CV</button>
                                </a></td>
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