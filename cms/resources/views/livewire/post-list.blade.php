<div class=" px-3 lg:px-7 py-6">
    <div class="flex justify-between items-center border-b border-gray-100">
        <div class="text-gray-400">
            @if($this->activeCategory || $search)
                <button wire:click='clearFilters()' class="text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-full text-sm px-2.5 py-1.5 me-1 mb-1 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">X</button>
            @endif

            @if($this->activeCategory)
            All Posts From
                <x-badge
                wire:navigate href="{{route('posts.index', ['category' => $this->activeCategory->title])}}"
                >
                    {{$this->activeCategory->title}}
                </x-badge>
            @endif

            @if($search)
                containing <strong class="text-black">{{$search}}</strong>
            @endif

        </div>
        <div class="flex items-center space-x-4 font-light ">
            <x-checkbox wire:model.live="popular" />
            <x-label> {{ __('Popular') }} </x-label>
            <button wire:click="setSort('desc')" class="{{ $sort === 'desc' ? 'text-gray-900 border-b border-gray-700' : 'text-gray-500' }} py-4">Latest</button>
            <button  wire:click="setSort('asc')" class="{{ $sort === 'asc' ? 'text-gray-900 border-b border-gray-700' : 'text-gray-500' }} py-4">Oldest</button>
        </div>
    </div>
    <div class="py-4">
        @foreach ($this->posts as $post)
            <x-posts.post-item wire:key="{{ $post->id }}" :post="$post"/>
        @endforeach
    </div>

    <div class="my-3">
        {{$this->posts->onEachSide(1)->links()}}
    </div>
</div>
