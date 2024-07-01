<?php

namespace App\Livewire;

use App\Models\Category;
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
    #[Url()]
    public $category = '';

    #[Url()]
    public $popular = false;
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

    public function clearFilters()
    {
        $this->search = '';
        $this->category = '';
        $this->resetPage();
    }

    #[Computed]
    public function posts()
    {
        /**
         * select * from "users" where "users"."id" = 81 limit 1
         * select * from "users" where "users"."id" = 86 limit 1
         *
         * select "categories".*, "category_post"."post_id" as "pivot_post_id", "category_post"."category_id" as "pivot_category_id" from "categories"
         * inner join "category_post" on "categories"."id" = "category_post"."category_id" where "category_post"."post_id" = 90
         * select "categories".*, "category_post"."post_id" as "pivot_post_id", "category_post"."category_id" as "pivot_category_id" from "categories"
         * inner join "category_post" on "categories"."id" = "category_post"."category_id" where "category_post"."post_id" = 81

         * select * from "users" where "users"."id" in (36, 81, 86, 90, 97)
         *
         * select "categories".*, "category_post"."post_id" as "pivot_post_id", "category_post"."category_id" as "pivot_category_id"
         * from "categories" inner join "category_post" on "categories"."id" = "category_post"."category_id"
         * where "category_post"."post_id" in (1, 81, 86, 90, 97)
         */
        return Post::published()
        ->with('author', 'categories')
        ->when($this->activeCategory, function ($query) {
            $query->withCategory($this->category);
        })
        ->when($this->popular, function ($query) {
            $query->popular();
        })
        ->search($this->search)
        ->orderBy('published_at', $this->sort)
        ->paginate(5);
    }

    #[Computed]
    public function activeCategory(){

        /**
         * (mulitiple) select * from "categories" where "slug" = '' limit 1
         */

        if ($this->category === null || $this->category === '') {
            return null;
        }

        return Category::where("slug", $this->category)->first();
    }
    public function render()
    {
        return view('livewire.post-list');
    }
}
