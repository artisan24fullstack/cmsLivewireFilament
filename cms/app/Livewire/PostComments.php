<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Attributes\Computed;
use Livewire\Component;

class PostComments extends Component
{
    public Post $post;

    public string $comment;

    public function postComment(){
        //dd('hi');
    }

    #[Computed()]
    public function comments(){
        return $this?->post->comments()->latest()->paginate(5);
    }

    public function render()
    {
        return view('livewire.post-comments');
    }
}
