<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Services\CommentService;

class CommentController extends Controller
{
    private $commentService;

    public function __construct(CommentService $commentService)
    {
        $this->commentService = $commentService;
    }

    public function store(CommentRequest $request)
    {
        $this->commentService->createComment($request);

        return back();
    }

    public function destroy($id)
    {
        $this->commentService->deleteComment($id);

        return back();
    }
}
