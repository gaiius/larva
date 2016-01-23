<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Reply;
use App\Thread;

class ThreadController extends Controller
{
    /**
     * Displays a given thread.
     *
     * @param $id int The thread to display
     * @return Response
     */
    public function displayThread($id)
    {
        // We only care about the ID before the first hyphen
        $id = strtok($id, '-');

        // Retrieve the first post of the thread
        $thread = Thread::where('threads.id', $id)
            ->join('users', 'users.id', '=', 'threads.author')
            ->select('threads.*', 'users.username')
            ->first();

        $replies = Reply::where('replies.thread', $id)
            ->join('users', 'users.id', '=', 'replies.author')
            ->select('replies.*', 'users.username')
            ->paginate(20);

        return view('thread', compact('thread', 'replies'));
    }
}
