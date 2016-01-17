<?php

namespace App\Http\Controllers;

use App\Forum;
use App\Http\Requests;
use App\Thread;

class ForumController extends Controller
{
    /**
     * Displays threads belonging to the given forum.
     *
     * @param $id The forum to find threads for
     * @return Response
     */
    public function listThreadsForForum($id)
    {
        // We only care about the ID before the first hyphen
        $id = strtok($id, '-');

        $forum = Forum::where('id', $id)->first();

        $threads = Thread::where('forum', $id)
            ->join('users', 'users.id', '=', 'threads.author')
            ->join('categories', 'categories.id', '=', 'threads.forum')
            ->select('threads.*', 'users.username')
            ->paginate(20);

        return view('forum', compact('threads', 'forum'));
    }
}
