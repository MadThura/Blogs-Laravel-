<div class="dropdown">
    <button class="btn btn-outline-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
        {{request('category') ? $currentCategory : 'Filter By Category'}}
    </button>
    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
        @if(request('category'))
        <a class="dropdown-item" href="
               /?{{request('author') ? 'author='.request('author') : '' }}
                {{request('search') ? 'search='.request('search') : '' }}">No filter</a>
        @endif
        @foreach($categories as $category)
        <li>
            <a class="dropdown-item" href="/?category={{$category->slug}}
                {{request('author') ? '&author='.request('author') : '' }}
                {{request('search') ? '&search='.request('search') : '' }}">
                {{$category->name}}
            </a>
        </li>
        @endforeach
    </ul>
</div>