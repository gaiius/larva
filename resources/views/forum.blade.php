@extends('layouts.app')

@section('title')
    {{ $forum->name }}
@endsection

@section('content')
    <div class="container spark-screen">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ $forum->name }}</div>

                    <div class="panel-body">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th class="col-md-8">@lang('app.thread')</th>
                                <th class="col-md-2">@lang('app.replies')</th>
                                <th class="col-md-2">@lang('app.latest_reply')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($threads as $thread)
                                <tr>
                                    <td>
                                        <p>
                                            <a href="{{ URL::to('threads/' . $thread->id . '-' . str_slug($thread->title, '-')) }}">
                                                {{ $thread->title }}
                                            </a>
                                        </p>
                                        <p>{{ $thread->username }}, @datetime($thread->created_at)</p>
                                    </td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                {!! $threads->render() !!}
            </div>
        </div>
    </div>
@endsection
