<!--<section class=" w-full relative text-gray-900 p-3">
    <div class="max-w-screen-lg mx-auto py-5 flex flex-col gap-10 ">
        <div>
            <h2 class="text-left text-3xl text-primary font-semibold">Latest News</h2>
            <span class="text-left text-sm italic text-primary font-semibold">Our Update & Latest News</span>
        </div>
        <div class="grid grid-cols-2 grid-flow-row gap-6">
            @foreach ($news as $newsItem)
                <div class=" h-96 bg-slate-50 drop-shadow-lg rounded-3xl overflow-hidden ">
                    <div class="text-primary flex flex-col justify-start h-full ">
                        <div class=" h-56  ">
                            <img class=" object-cover h-full w-full " src="/storage/img/blog-news/{{ $newsItem->image }}"
                                alt="">
                        </div>
                        <div class=" text-gray-700 p-3 flex flex-col justify-between ">
                            <a class="hover:underline text-justify" href="/news/{{ $newsItem->slug }}">
                                <h2 class=" font-semibold ">{{ $newsItem->title }}</h2>
                            </a>
                            <span>{{ $newsItem->created_at->diffForHumans() }}</span>
                            <p class="text-sm">{!! strip_tags(Str::limit($newsItem->content, 100, '...')) !!}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="flex justify-center text-sm">
            <a href="/news" class="bg-primary text-white rounded-tl-xl rounded-br-xl">
                <p class="py-2 px-3 ">Read All News</p>
            </a>
        </div>
</section>
-->