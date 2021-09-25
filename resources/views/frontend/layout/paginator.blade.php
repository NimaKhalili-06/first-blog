@if ($paginator->hasPages())
    <div class="col-lg-12">
        <ul class="page-numbers">
            @if ($paginator->onFirstPage())
                <li class="disabled"><span><i class="fa fa-angle-double-left"></i></span>
                </li>
            @else
                <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev"><i
                            class="fa fa-angle-double-left"></i></a></li>
            @endif
            @foreach ($elements as $element)

                @if (is_string($element))
                    <li class="disabled"><span>{{ $element }}</span></li>
                @endif



                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="active"><a>{{ $page }}</a></li>
                        @else
                            <li><a href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach



            @if ($paginator->hasMorePages())
                <li><a href="{{ $paginator->nextPageUrl() }}" rel="next"><i
                            class="fa fa-angle-double-right"></i></a></li>
            @else
                <li class="disabled"><span><i class="fa fa-angle-double-right"></i></span>
                </li>
            @endif
        </ul>
    </div>
@endif
