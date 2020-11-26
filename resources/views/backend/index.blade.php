@extends('backend.layouts.master')

@section('title',transWord('Home'))

@section('stylesheet')
    
@endsection

@section('content')
<div class="row clearfix">
    {!! statisticsWidget($components) !!}
</div>

<div class="row row-cards">
    <div class="col-xl-6 col-lg-6 col-md-12">
        <div class="card">
            <div class="header">
                <h2>Pie Chart</h2>
            </div>
            <div class="body">
                <div id="chart-pie" style="height: 300px"></div>
            </div>
        </div>            
    </div>
    <div class="col-xl-6 col-lg-6 col-md-12">
        <div class="card">
            <div class="header">
                <h2>Bar Chart</h2>
            </div>
            <div class="body">
                <div id="chart-bar" style="height: 300px"></div>
            </div>
        </div>          
    </div>
    <div class="col-xl-6 col-lg-6 col-md-12">
        <div class="card">
            <div class="header">
                <h2>Area Chart Sracked</h2>
            </div>
            <div class="body">
                <div id="chart-area-spline-sracked" style="height: 300px"></div>
            </div>
        </div>
    </div>
    
</div>

@endsection

@section('javascript')
<script src="{{ asset('dashboard/assets/js/pages/charts/c3.js') }}"></script>
<script src="{{ asset('dashboard/assets/custom/c3-chart.js') }}"></script>
<script>
    var id = '#chart-area-spline-sracked';
    var data = [
        ['data1', 11, 8, 15, 18, 19, 17],
        ['data2', 7, 7, 5, 7, 9, 12],
        ['data3', 17, 27, 15, 7, 19, 2]
    ];
    var groups = [['data1','data2','data3']];
    var colors = {
        'data1': '#007FFF', // blue
        'data2': '#9367B4', // pink
        'data3': '#888888', // pink
    };
    var names = {
        // name of each serie
        'data1': 'Maximum',
        'data2': 'Minimum',
        'data3': 'AVG',
    };
    var x_axis_data = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'];
    drawAreaChart(id,data,groups,colors,names,x_axis_data);
</script>

<script>
    var id2 = '#chart-pie';
    var columns = [
        // each columns data
        ['A1', 10],
        ['A2', 20],
        ['A3', 30],
        ['A4', 40]
    ];
    var colors2 = {
        'A1': '#1c3353', // blue darker
        'A2': '#007FFF', // blue
        'A3': '#c8d9f1', // blue lighter
        'A4': '#7ea5dd', // blue light            
    };
    var names2 = {
        // name of each serie
        'A1': 'darker',
        'A2': 'blue',
        'A3': 'lighter',
        'A4': 'light',
    };
    drawPieChart(id2,columns,colors2,names2);
</script>

<script>
    var id3 = '#chart-bar';
    var columns2 = [
        // each columns data
        ['data1', 11, 8, 15, 18, 19, 17],
        ['data2', 7, 7, 5, 7, 9, 12]
    ];
    var colors3 = {
        'data1': '#007FFF', // blue
        'data2': '#9367B4', // pink
    };
    var names3 = {
        // name of each serie
        'data1': 'Maximum',
        'data2': 'Minimum'
    };
    var x_axis_data2 = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'];
    drawBarChart(id3,columns2,colors3,names3,x_axis_data2);
</script>
@endsection