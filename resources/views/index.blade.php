@extends('layouts.app')

@section('content')
<div class="container spark-screen">
    <div class="row">
        <div class="col-md-9">
            @foreach($categories as $category)
                <div class="panel panel-default">
                    <div class="panel-heading">{{ $category->name }}</div>

                    <div class="panel-body">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th class="col-md-8">@lang('app.forum')</th>
                                <th class="col-md-2">@lang('app.threads')</th>
                                <th class="col-md-2">@lang('app.posts')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($category->forums as $forum)
                                <tr>
                                    <td>
                                        <p>
                                            <a href="{{ URL::to('forums/' . $forum->id . '-' . str_slug($forum->name, '-')) }}">
                                                {{ $forum->name }}
                                            </a>
                                        </p>
                                        <p>{{ $forum->description }}</p>
                                    </td>
                                    <td>
                                        @if (isset($forum->threads_count))
                                            {{ $forum->threads_count->first()->count }}
                                        @else
                                            0
                                        @endif
                                    </td>
                                    <td></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="col-md-3">
            @if (Auth::guest())
                @include('partials.blocks.login')
            @else
                @include('partials.blocks.user-info')
            @endif
        </div>
    </div>
</div>
@endsection
