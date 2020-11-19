<div class="card m-2">
    <div class="card-header d-flex justify-content-end">
        <span class="badge badge-primary mr-2">{{ $ad->origin }}</span>
        <a href="/planners/create"><i class="fas fa-plus-circle"></i></a>
    </div>
    <div class="card-body d-flex">
        <div class="mr-5">
            <img style="height: 150px; width: 150px;"src="{{url($ad->imagePath())}}" alt="placeholder image">
        </div>
        <div>
            <a href="{{ $ad->path() }}"><h4>{{ $ad->name }}</h4></a>

            <div class="align-items-center d-flex">
                <div style="width: 25px; color: darkred;"><i class="fas fa-map-pin"></i></div>
                <div><span>{{ $ad->address }}</span></div>
            </div>

            <div class="align-items-center d-flex">
                <div style="width: 25px; color: darkcyan"><i class="far fa-calendar-times"></i></div>
                <div><span>{{ $ad->start_date_time }}</span></div>
            </div>

            <div class="align-items-center d-flex">
                <div style="width: 25px;"><i class="far fa-clock"></i></div>
                <div><span>{{ $ad->end_date_time }}</span></div>
            </div>

            <p class="pt-2">{{ $ad->description }}</p>
        </div>
    </div>
    <div class="card-footer text-muted">
        @if($ad->creator)
            Created By: <a href="#">{{ $ad->creator->name }}</a>
        @endif
    </div>
</div>

