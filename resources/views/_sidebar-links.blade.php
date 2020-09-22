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
            <li>My Ads</li>
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
            <li>My Items</li>
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
                href="#"
            >
                Sailors
            </a>
    @endauth
</ul>
