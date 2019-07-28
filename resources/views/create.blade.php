@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Create Task
                <a href="{{ url('/task') }}" class="btn btn-info btn-right">< Back</a>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    @if(session()->has("tMessage"))
                    <div alert alert-success>
                        {{session()->get("tMessage")}}
                    </div>
                    @endif
                </div>

                <form class="form-horizontal" action="{{ url('/task') }}" method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="email">Task:</label>
                        <div class="col-sm-10">
                            <input type="task" class="form-control" id="task" placeholder="Enter task" name="task">
                        </div>
                    </div>
                    
                    <div class="form-group">        
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
