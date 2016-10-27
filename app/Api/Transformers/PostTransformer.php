<?php

namespace Api\Transformers;

use App\Post;
use League\Fractal\TransformerAbstract;

class PostTransformer extends TransformerAbstract
{
    public function transform(Post $post)
    {
        return [
            'ID' => (int) $post->id,
            'title' => $post->title,
            'body' => $post->body,
            'author' => $post->user->name // user is a relationship 
        ];
    }
}
