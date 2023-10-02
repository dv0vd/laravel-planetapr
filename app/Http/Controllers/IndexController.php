<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\AskQuestionRequest;
use App\Mail\AskQuestion;
use App\Models\News;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Mail;

class IndexController extends Controller
{
    private readonly int $newsIndexPageCount;
    private readonly int $newsNewsPagePagination;

    public function __construct(
    ) {
        $this->newsIndexPageCount = config('news.index_page_count');
        $this->newsNewsPagePagination = config('news.news_page_pagination_count');
    }

    public function askQuestion(AskQuestionRequest $request)
    {
        $validated = $request->validated();

        Mail::send(new AskQuestion($validated));

        return redirect()->back()->with('message', 'Спасибо! Мы постараемся ответить как можно скорее!');
    }

    public function contacts(): View
    {
        $title = 'Контакты, адрес, режим работы | Турагентство Белгород | Планета путешествий и развлечений';
        $description = 'Телефоны: +7(920)573-93-81, +7(920)561-46-86. Email: planetapr.su. Адрес: г. Белгород ул. Гостёнская 14 офис 7. Режим работы: Пн-Пт 10.00 - 18.00, перерыв 13.30 - 14.00.';

        return view('contacts', compact('title', 'description'));
    }

    public function index(): View
    {
        $description = 'Бронирование туров, жилья, отелей, заказ авиа, ж/д и автобусных билетов, организация пассажирских перевозок. С нетерпением ждём Вас!';
        $title = 'Турагентство Белгород | Планета путешествий и развлечений';

        // TODO replace with latest
        // todo scopes
        $news = News::where('active', true)->with('images')->orderByDesc('date')->limit($this->newsIndexPageCount)->get();

        return view('index', compact('title', 'description', 'news'));
    }

    public function news(): View
    {
        $title = 'Новости | Турагентство Белгород | Планета путешествий и развлечений';
        $description = 'Свежие новости туристической индустрии в России и мире, горящие туры и путёвки!';

        // TODO replace with latest
        $news = News::with('images')->orderByDesc('date')->paginate($this->newsNewsPagePagination);

        return view('news', compact('title', 'description', 'news'));
    }
}
