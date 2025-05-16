
<!-- resources/views/vendor/pagination/custom.blade.php -->
{{-- <link rel="stylesheet" href="{{ asset('css/paginate-custom.css') }}"> --}}

@if ($paginator->hasPages())
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            @if ($paginator->onFirstPage())
            <li class="page-item disabled">
                <span class="page-link">
                 First
                </span>
            </li>
            <li class="page-item disabled">
                <span class="page-link" >
                    «
                </span>
            </li>
            @else
            <li class="page-item">
                <a class="page-link" 
                href="{{ $paginator->url('') }}">
                 First
                </a>
            </li>
            <li class="page-item">
                <a class="page-link" 
                href="{{ $paginator->previousPageUrl() }}">
                    «
                </a>
            </li>
            @endif
    
            @foreach ($elements as $element)
                @if (is_string($element))
                    <li class="page-item disabled">
                        <span class="page-link">{{ $element }}</span>
                    </li>
                @endif
    
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active">
                                <a class="page-link">{{ $page }}</a>
                            </li>
                        @else
                        <li class="page-item">
                            <a class="page-link" 
                            href="{{ $url }}">{{ $page }}</a>
                        </li>
                        @endif
                    @endforeach
                @endif
            @endforeach
    
            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="page-link" 
                    href="{{ $paginator->nextPageUrl() }}" 
                    rel="next">
                    »
                    </a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->url($paginator->lastPage()) }}" rel="last" >Last</a>
                </li>
            @else
                <li class="page-item disabled">
                    <span class="page-link">
                        »
                    </span>
                </li>

                <li class="page-item disabled">
                    <span class="page-link">Last</span>
                </li>
            @endif
        </ul>
    </nav>
@endif
  