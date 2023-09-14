<x-layout>

    <x-slot:title>
        {{ $title }}
    </x-slot>
    <x-slot:description>
        {{ $description }}
    </x-slot>

    <div class="container">
        <div class="row">
            <div class="col-lg text-white">
                <h1 id="news" class="font-weight-bold  text-center text-uppercase mt-3">Новости</h1>

                @if ($news)
                    @foreach ($news as $n)
                        <x-news-item :title="$n->title" :description="$n->description" :date="$n->date" :images="$n->images" />
                    @endforeach
                    <div class="text-center">
                        {{ $news->links() }}
                    </div>
                @endif

            </div>
        </div>
    </div>

</x-layout>
