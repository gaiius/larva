@include('layouts.block', array(
    'content' => 'Welcome ' . Auth::user()->username . '!',
))
