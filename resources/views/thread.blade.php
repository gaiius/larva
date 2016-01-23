@extends('layouts.app')

@section('title')
    {{ $thread->title }}
@endsection

@section('content')
    <div class="container spark-screen">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ $thread->title }}</div>

                    <div class="panel-body">
                        <div class="col-md-2">{{ $thread->username }}</div>
                        <div class="col-md-10">{{ $thread->body }}</div>
                    </div>
                </div>
            </div>
        </div>

        @foreach ($replies as $reply)
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="col-md-2">{{ $reply->username }}</div>
                        <div class="col-md-10">{{ $reply->body }}</div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

        {!! $replies->render() !!}
    </div>
@endsection
