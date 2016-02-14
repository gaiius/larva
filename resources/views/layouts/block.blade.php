<div class="panel panel-default">
    @if (isset($title))
        <div class="panel-heading">{!! $title !!}</div>
    @endif

    @if (isset($content) or isset($include))
        <div class="panel-body">
            @if (isset($include_vars) and isset($include))
                @include($include, $include_vars)
            @elseif (isset($include))
                @include($include)
            @elseif (isset($content))
                {!! $content !!}
            @endif
        </div>
    @endif
</div>
