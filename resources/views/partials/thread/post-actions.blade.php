<div class="row">
    <div class="col-md-8">
        @datetime($post->created_at)
        @if ($post->updated_at != $post->created_at)
            <span class="date-modified">(@lang('thread.edited_at') @datetime($thread->updated_at))</span>
        @endif
    </div>
    <div class="col-md-1"></div>
    <div class="col-md-1"></div>
    <div class="col-md-1"></div>
    <div class="col-md-1"></div>
</div>
