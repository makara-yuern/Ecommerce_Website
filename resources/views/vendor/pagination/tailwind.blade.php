<nav id="pagination-bottom" class="flex justify-end mt-6">
    <ul class="flex items-center">
        <!-- Previous Page Link -->
        @if ($users->onFirstPage())
        <li>
            <span class="px-3 py-2 border border-gray-300  text-gray-500 cursor-not-allowed shadow-sm">Previous</span>
        </li>
        @else
        <li>
            <a id="previous-link" href="{{ $users->previousPageUrl() }}" aria-label="Previous" class="px-3 py-2 border border-gray-300  text-blue-500 hover:bg-gray-200 shadow-sm" data-page="{{ $users->currentPage() - 1 }}">
                Previous
            </a>
        </li>
        @endif

        <!-- Pagination Elements -->
        @foreach ($users->getUrlRange(1, $users->lastPage()) as $page => $url)
        <li>
            <a href="{{ $url }}" class="px-3 py-2 border border-gray-300  {{ $users->currentPage() == $page ? 'bg-blue-600 text-white' : 'text-blue-500 hover:bg-gray-200' }} shadow-sm pagination-item" data-page="{{ $page }}">
                {{ $page }}
            </a>
        </li>
        @endforeach

        <!-- Next Page Link -->
        @if ($users->hasMorePages())
        <li>
            <a id="next-link" href="{{ $users->nextPageUrl() }}" aria-label="Next" class="px-3 py-2 border border-gray-300  text-blue-500 hover:bg-gray-200 shadow-sm" data-page="{{ $users->currentPage() + 1 }}">
                Next
            </a>
        </li>
        @else
        <li>
            <span class="px-3 py-2 border border-gray-300  text-gray-500 cursor-not-allowed shadow-sm">Next</span>
        </li>
        @endif
    </ul>
</nav>