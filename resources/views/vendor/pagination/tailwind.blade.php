@if ($paginator->hasPages())
    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="flex items-center justify-between">
        <div class="flex justify-between flex-1 sm:hidden">
            @if ($paginator->onFirstPage())
            @else
                <a href="{{ $paginator->previousPageUrl() }}"
                    class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-white  border border-gray-300 leading-5 rounded-md focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 transition ease-in-out duration-150">
                    Назад
                </a>
            @endif

            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}"
                    class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-white  border border-gray-300 leading-5 rounded-md focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 transition ease-in-out duration-150">
                    Дальше
                </a>
            @else
            @endif
        </div>

        <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between mt-3">
            <div>
                <p class="text-sm text-gray-700 leading-5">
                    Результаты c
                    @if ($paginator->firstItem())
                        <span class="font-medium">{{ $paginator->firstItem() }}</span>
                        по
                        <span class="font-medium">{{ $paginator->lastItem() }}</span>
                    @else
                        {{ $paginator->count() }}
                    @endif
                    из
                    <span class="font-medium">{{ $paginator->total() }}</span>
                </p>
            </div>
        </div>
    </nav>
@endif
