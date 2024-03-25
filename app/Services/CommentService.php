<?php

namespace App\Services;

use App\Repositories\CommentRepository;
use App\Http\Requests\CommentRequest;

class CommentService
{
    private $commentRepository;

    public function __construct(CommentRepository $commentRepository)
    {
        $this->commentRepository = $commentRepository;
    }

    public function createComment(CommentRequest $request)
    {
        
        $this->commentRepository->create([
            'user_id' => $request->user()->id,
            'body' => $request->input('body')
        ]);
    }

    public function deleteComment($id)
    {
        $this->commentRepository->delete($id);
    }
}
