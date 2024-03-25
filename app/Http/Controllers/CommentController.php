<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Services\CommentService;
use Illuminate\Support\Facades\Request;

class CommentController extends Controller
{
    private $commentService;

    public function __construct(CommentService $commentService)
    {
        $this->commentService = $commentService;
    }

    public function store(Request $req, CommentRequest $request)
    {
        return 'a';
        $this->commentService->createComment($request);

        return back();
    }

    public function destroy($id)
    {
        $this->commentService->deleteComment($id);

        return back();
    }
}
