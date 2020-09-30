<ul>
    <li>
        <a
            class="mb-4"
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
            class="mb-4"
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

    @auth
        <li>
            <a
                class="mb-4"
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
                class="mb-4"
                href="/users"
            >
                Sailors
            </a>
    @endauth
</ul>
