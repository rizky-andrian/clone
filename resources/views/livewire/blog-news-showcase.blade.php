<div class="max-w-screen-lg mx-auto hape:-mt-10 ">
    <div class="flex flex-col gap-10 mx-3">
        <div class="text-center font-semibold text-2xl text-primary  ">
            <h2>Berita dan Update Terbaru</h2>
        </div>
        <div class="hape:flex hape:flex-col grid grid-flow-row grid-cols-2 gap-5">
            @foreach ($blogs as $item)
                <div class="flex-1 flex flex-col rounded-lg bg-slate-50 drop-shadow-lg">
                    <div class="flex-1 max-h-48  ">
                        <img class="h-full w-full hape:max-h-32 object-cover rounded-tl-lg rounded-tr-lg"
                            src="{{ '/storage/img/blog-news/' . $item->image }}" alt="{{ $item->title }}">
                    </div>
                    <div class="flex-1 my-2 flex flex-col gap-2 m-3">
                        <div class="flex flex-col gap-1">
                            <a class=" hover:font-semibold  font-italic text-primary "
                                href="{{ '/news/' . $item->slug }}"> {{ $item->title }}</a>
                            <div class="text-xs text-gray-700 font-semibold">
                                {{ \Carbon\Carbon::parse($item->created_at)->diffForhumans() }}
                            </div>
                        </div>
                        <div class="text-sm">
                            {!! Str::limit($item->content, 230, '...') !!}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        @if (url()->full() == env('APP_URL'))
            <div class="text-center text-sm">
                <button
                    class=" text-primary-color-mtma py-2 hape:bg-primary hape:text-white rounded-full bg-secondary text-primary  border-primary-color-mtma border-2 hover:bg-primary hover:text-white">
                    <a href="/news" class="py-2 px-6">
                        Selengkapnya
                    </a>
                </button>

            </div>
        @endif

    </div>
</div>
