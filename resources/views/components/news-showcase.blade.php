<div class="max-w-screen-lg mx-auto grid grid-flow-row grid-cols-3 gap-5 my-20">
    @foreach ($news->items() as $item)
        <a href="/news/{{ $item->slug }}" class="flex flex-col bg-white drop-shadow rounded-lg gap-2">
            <div class=" h-48  ">
                <img class="rounded-tr-lg rounded-tl-lg object-cover h-full w-full "
                    src="/storage/img/blog-news/{{ $item->image }}" alt="">
            </div>
            <div class="p-3 flex flex-col gap-2">
                <h3 class="text-lg font-semibold text-gray-700 ">{{ $item->title }}</h3>
                <div class=" text-justify ">
                    {!! strip_tags(Str::limit($item->content, 300, '...')) !!}
                </div>
            </div>
        </a>
    @endforeach

</div>
<div class="">
    {{ $news->links() }}
</div>
