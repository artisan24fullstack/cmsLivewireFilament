<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\WithPagination;
use Livewire\Attributes\Computed;

class PostList extends Component
{
    use WithPagination;

    // blog?pages=1&sort=asc or blog?pages=1&sort=desc
    #[Url()]
    public $sort = 'desc';
    #[Url()]
    public $search = '';

    public function setSort($sort){
        return $this->sort = ($sort === 'desc') ? 'desc' : 'asc';
    }

    // https://livewire.laravel.com/docs/lifecycle-hooks
    #[On('search')]
    public function updateSearch($search)
    {
        $this->search = $search;
        //dd('search');

    }

    #[Computed]
    public function posts(){
        return Post::published()
        ->orderBy('published_at', $this->sort)
        ->where('title', 'like', "%{$this->search}%")
        ->paginate(5);
    }
    public function render()
    {
        return view('livewire.post-list');
    }
}
