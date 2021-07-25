<!-- Experience-->
<section class="resume-section" id="experience">
    <div class="resume-section-content">
        <h2 class="mb-5">Experience</h2>
        @foreach($experience as $ex)
        <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
            <div class="flex-grow-1">
                <h3 class="mb-0">{{$ex->title}}</h3>
                <div class="subheading mb-3">{{$ex->role}}</div>
                <p>
                    {{$ex->description}}
                </p>
            </div>
            <div class="flex-shrink-0"><span class="text-primary">{{\Carbon\Carbon::parse($ex->start_period)->format('F yy')}} - {{\Carbon\Carbon::parse($ex->end_period)->format('F yy')}}</span></div>
        </div>
        @endforeach
    </div>
</section>
