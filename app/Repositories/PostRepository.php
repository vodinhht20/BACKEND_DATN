<?php

namespace App\Repositories;

use App\Repositories\BaseRepository;

class PostRepository extends BaseRepository
{
    public function getModel()
    {
        return \App\Models\Post::class;
    }

    public function getListPosts($branch_id)
    {
        $posts = $this->model->OrderBy('id', 'desc')
        ->where('branch_id', $branch_id)
        ->orWhere('branch_id', null)
        ->limit(10)
        ->get();
        return $posts;
    }

    public function getPost($slug, $branch_id)
    {
        $post = $this->model->where('slug', $slug)
        ->where('branch_id', $branch_id)
        ->with('employee:id,fullname,avatar')
        ->with('category:id,name')
        ->first();
        return $post;
    }
}
