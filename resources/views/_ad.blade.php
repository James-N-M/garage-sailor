<div class="w-25 text-center">
    <div>
        <a href="{{ $ad->path() }}"> {{$ad->name}} </a>
    </div>
    <div>
        <p>{{ $ad->description }}</p>

        <span>{{ $ad->origin }}</span>
    </div>
    <div>
        {{ $ad->location }}
    </div>
</div>

