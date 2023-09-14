<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Contracts\View\View;

class IndexController extends Controller
{
    private readonly int $newsIndexPageCount;
    private readonly int $newsNewsPagePagination;

    public function __construct(
    ) {
        $this->newsIndexPageCount = config('news.index_page_count');
        $this->newsNewsPagePagination = config('news.news_page_pagination_count');
    }

    public function index(): View
    {
        $description = 'Бронирование туров, жилья, отелей, заказ авиа, ж/д и автобусных билетов, организация пассажирских перевозок. С нетерпением ждём Вас!';
        $title = 'Турагентство Белгород | Планета путешествий и развлечений';
        $news = News::with('images')->orderByDesc('date')->limit($this->newsIndexPageCount)->get();

        return view('index', compact('title', 'description', 'news'));
    }

    public function news(): View
    {
        $title = 'Новости';
        $description = 'Свежие новости туристической индустрии в России и мире, горящие туры и путёвки!';

        $news = News::with('images')->orderByDesc('date')->paginate($this->newsNewsPagePagination);

        return view('news', compact('title', 'description', 'news'));
    }
}