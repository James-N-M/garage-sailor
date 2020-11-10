<div class="card m-2">
    <div class="card-header d-flex justify-content-end">
        <span class="badge badge-primary mr-2">{{ $ad->origin }}</span>
        <a href="/planners/create"><i class="fas fa-plus-circle"></i></a>
    </div>
    <div class="card-body d-flex">
        <div class="mr-5">
            <img src="https://picsum.photos/150" alt="placeholder image">
        </div>
        <div>
            <a href="{{ $ad->path() }}"><h4>{{ $ad->name }}</h4></a>

            <div>
                <i class="fas fa-map-pin mr-2"></i>
                <span>{{ $ad->address }}</span>
            </div>

            <div>
                <i class="far fa-calendar-times mr-2"></i>
                <span>{{ $ad->start_date_time }}</span>
            </div>

            <div>
                <i class="far fa-clock mr-2"></i>
                <span>{{ $ad->start_date_time }}</span>
            </div>

            <p>{{ $ad->description }}</p>
        </div>
    </div>
    <div class="card-footer text-muted">
        @if($ad->creator)
            Created By: <a href="#">{{ $ad->creator->name }}</a>
        @endif
    </div>
</div>

