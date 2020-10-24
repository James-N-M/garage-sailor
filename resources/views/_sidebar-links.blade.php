<div class="sidebar list-unstyled">
    <li>
        <a
            class="mb-2 bg-dark"
            href="{{ route('home') }}"
        >
            Ads
        </a>
        <ul>
            <a href="/ads/create"><li>Create Ad</li></a>
            @auth
                <a href="/users/{{auth()->user()->id}}/ads"><li>My Ads</li></a>
            @endauth
        </ul>
    </li>

    <li>
        <a
            class="mb-2 bg-dark"
            href="/items"
        >
            Items
        </a>
        <ul>
            @auth
            <a href="/users/{{auth()->user()->id}}/items"><li>My Items</li></a>
            @endauth
        </ul>
    </li>

    <li>
        <a
            class="mb-2 bg-dark"
            href="/categories"
        >
            Categories
        </a>
        <ul>
            @forelse ($categories as $category)
                <li><a href="/categories/{{$category->id}}">{{$category->name}}</a></li>
            @empty
                <p>No categories yet.</p>
            @endforelse
        </ul>
    </li>

    @auth
        <li>
            <a
                class="mb-2 bg-dark"
                href="/planners"
            >
                My Planners
            </a>
            <ul>
                <a href="/planners/create"><li>Create Planer</li></a>
            </ul>
    @endauth

    @auth
        <li>
            <a
                class="mb-2 bg-dark"
                href="/users"
            >
                Sailors
            </a>
    @endauth
</div>
