@props(['category'])
<x-badge
wire:navigate href="{{route('posts.index', ['category' => $category->title])}}"
>
    {{$category->title}}
</x-badge>
