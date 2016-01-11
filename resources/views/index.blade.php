@extends('layouts.app')

@section('content')
<div class="container spark-screen">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            @foreach($categories as $category)
            <div class="panel panel-default">
                <div class="panel-heading">{{ $category->name }}</div>

                <div class="panel-body">
                    Your Application's Landing Page.
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
