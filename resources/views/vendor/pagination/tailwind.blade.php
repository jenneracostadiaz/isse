@if ($paginator->hasPages())
    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="flex items-center justify-between">
        <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
            <div>
                <p class="text-sm text-gray-700 leading-5 dark:text-gray-400">
                    {!! __('Showing') !!}
                    @if ($paginator->firstItem())
                        <span class="font-medium">{{ $paginator->firstItem() }}</span>
                        {!! __('to') !!}
                        <span class="font-medium">{{ $paginator->lastItem() }}</span>
                    @else
                        {{ $paginator->count() }}
                    @endif
                    {!! __('of') !!}
                    <span class="font-medium">{{ $paginator->total() }}</span>
                    {!! __('results') !!}
                </p>
            </div>

            <div>
                <nav class="flex items-center space-x-2">
                    @if ($paginator->onFirstPage())
                        <span class="text-gray-600 hover:text-gray-600 p-4 inline-flex items-center gap-2 font-medium rounded-md" aria-disabled="true" aria-label="{{ __('pagination.previous') }} >
                            <span aria-hidden="true">«</span>
                            <span class="sr-only">Previous</span>
                        </span>
                    @else
                        <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="text-gray-400 hover:text-gray-200 p-4 inline-flex items-center gap-2 font-medium rounded-md">
                            <span aria-hidden="true">«</span>
                            <span class="sr-only">Previous</span>
                        </a>
                    @endif
                    
                    
                    
                    

                    @foreach ($elements as $element)
                        {{-- "Three Dots" Separator --}}
                        @if (is_string($element))
                            <span aria-disabled="true">
                                <span class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-700 bg-white border border-gray-300 cursor-default leading-5">
                                    
                                </span>
                            </span>
                            <span class="w-10 h-10 text-gray-400 hover:text-blue-600 p-4 inline-flex items-center text-sm font-medium rounded-full" href="#">
                                {{ $element }}
                            </span>
                        @endif

                        {{-- Array Of Links --}}
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <span aria-current="page" class="w-10 h-10 bg-blue-500 text-white p-4 inline-flex items-center text-sm font-medium rounded-full" href="#">
                                        {{ $page }}
                                    </span>
                                @else
                                    <a class="w-10 h-10 text-gray-400 hover:text-blue-600 p-4 inline-flex items-center text-sm font-medium rounded-full"
                                        href="{{ $url }}" aria-label="{{ __('Go to page :page', ['page' => $page]) }}">{{ $page }}</a>
                                @endif
                            @endforeach
                        @endif
                    @endforeach
                    
                    @if ($paginator->hasMorePages())
                        <a class="text-gray-400 hover:text-gray-200 p-4 inline-flex items-center gap-2 font-medium rounded-md" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="{{ __('pagination.next') }}">
                            <span class="sr-only">Next</span>
                            <span aria-hidden="true">»</span>
                        </a>
                    @else
                        <span class="text-gray-600 hover:text-gray-600 p-4 inline-flex items-center gap-2 font-medium rounded-md" aria-disabled="true" aria-label="{{ __('pagination.next') }}" aria-hidden="true">
                            <span class="sr-only">Next</span>
                            <span aria-hidden="true">»</span>
                        </span>
                    @endif
                  </nav>
            </div>
        </div>
    </nav>
@endif
