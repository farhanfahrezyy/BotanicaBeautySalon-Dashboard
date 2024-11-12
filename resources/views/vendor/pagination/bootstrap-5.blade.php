@if ($paginator->hasPages())
    <nav class="d-flex justify-items-center justify-content-between my-4">
        <div class="d-flex justify-content-between flex-fill d-sm-none">
            <ul class="pagination">
                {{-- Link ke halaman sebelumnya --}}
                @if ($paginator->onFirstPage())
                    <li class="page-item disabled" aria-disabled="true">
                        <span class="page-link" style="color: #de968d; border-color: #de968d;">Previous</span>
                    </li>
                @else
                    <li class="page-item">
                        <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev" style="color: #de968d; border-color: #de968d;">Previous</a>
                    </li>
                @endif

                {{-- Link ke halaman berikutnya --}}
                @if ($paginator->hasMorePages())
                    <li class="page-item">
                        <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next" style="color: #de968d; border-color: #de968d;">Next</a>
                    </li>
                @else
                    <li class="page-item disabled" aria-disabled="true">
                        <span class="page-link" style="color: #de968d; border-color: #de968d;">Next</span>
                    </li>
                @endif
            </ul>
        </div>

        <div class="d-none flex-sm-fill d-sm-flex align-items-sm-center justify-content-sm-between">
            {{-- <div>
                <p class="small text-muted">
                    Showing
                    <span class="fw-semibold">{{ $paginator->firstItem() }}</span>
                    to
                    <span class="fw-semibold">{{ $paginator->lastItem() }}</span>
                    of
                    <span class="fw-semibold">{{ $paginator->total() }}</span>
                    results
                </p>
            </div> --}}

            <div>
                <ul class="pagination">
                    {{-- Link ke halaman sebelumnya --}}
                    @if ($paginator->onFirstPage())
                        <li class="page-item disabled" aria-disabled="true" aria-label="Previous">
                            <span class="page-link" aria-hidden="true" style="color: #de968d; border-color: #de968d;">&lsaquo;</span>
                        </li>
                    @else
                        <li class="page-item">
                            <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="Previous" style="color: #de968d; border-color: #de968d;">&lsaquo;</a>
                        </li>
                    @endif

                    {{-- Elemen Pagination --}}
                    @foreach ($elements as $element)
                        {{-- Tanda "Tiga Titik" --}}
                        @if (is_string($element))
                            <li class="page-item disabled" aria-disabled="true"><span class="page-link">{{ $element }}</span></li>
                        @endif

                        {{-- Array Links --}}
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <li class="page-item active" aria-current="page">
                                        <span class="page-link" style="background-color: #de968d; color: #fff; border-color: #de968d;">{{ $page }}</span>
                                    </li>
                                @else
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $url }}" style="color: #de968d; border-color: #de968d;">{{ $page }}</a>
                                    </li>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    {{-- Link ke halaman berikutnya --}}
                    @if ($paginator->hasMorePages())
                        <li class="page-item">
                            <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="Next" style="color: #de968d; border-color: #de968d;">&rsaquo;</a>
                        </li>
                    @else
                        <li class="page-item disabled" aria-disabled="true" aria-label="Next">
                            <span class="page-link" aria-hidden="true" style="color: #de968d; border-color: #de968d;">&rsaquo;</span>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
@endif
