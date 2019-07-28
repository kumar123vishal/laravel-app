@extends('layouts.app')

@section('content')
<?php
$data =[$notCompletedTask];
?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard
                <a href="{{ url('task/create') }}" class="btn btn-success btn-right">+ Add Task</a>
                </div>
                

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-condensed">
                        <thead>
                        <tr>
                            <th>Sr. No</th>
                            <th>Task</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $i = 1; ?>
                        @foreach($tasks as $task)
                        <?php
                        $status = "Not Completed";
                        if($task->status == 1){
                            $status = "Completed";
                        }
                        ?>
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$task->task}}</td>
                            <td>{{$status}}</td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div id="container"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
$(function () {
    $('#container').highcharts({
        title: {
            text: 'Task not completed in last 1 hour',
            x: -20 //center
        },
        xAxis: {
            title: {
                text: 'Minutes'
            },
            categories: ['0', '10', '20', '30', '40', '50',
                '60']
        },
        yAxis: {
            title: {
                text: 'Tasks'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },
        tooltip: {
            valueSuffix: ''
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        },
        series: [{
            name: 'Task not Completed',
            data: <?php echo json_encode($data);?>
        }]
    });
});
</script>

@endsection

