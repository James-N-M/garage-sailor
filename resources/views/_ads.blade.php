<div>
    @forelse ($ads as $ad)
        @include('_ad')
    @empty
        <p>No Ads yet.</p>
    @endforelse
</div>
