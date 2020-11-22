<div class="pagination-container">
    @if ($paginator->hasPages())
        <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}">
            <div class="pagination">
                @if ($paginator->onFirstPage())
                <span class="pagination-span">
                    <i class="fas fa-arrow-left"></i>
                </span>
                @else
                    <a href="{{ $paginator->previousPageUrl() }}">
                        <i class="fas fa-arrow-left"></i>
                    </a>
                @endif
                @for ($i = 1; $i <=$paginator->lastPage() ; $i++)
                    <a href="{{$paginator->url($i)}}"><span class="page-number">{{$i}}</span></a>
                @endfor
                
                @if ($paginator->hasMorePages())
                    <a href="{{ $paginator->nextPageUrl() }}">
                        <i class="fas fa-arrow-right"></i>
                    </a>
                @else
                    <span class="pagination-span">
                        <i class="fas fa-arrow-right"></i>
                    </span>
                @endif
            </div>
        </nav>
    @endif
</div>