<!-- Education-->
<section class="resume-section" id="education">
    <div class="resume-section-content">
        <h2 class="mb-5">Education</h2>
        @foreach($education as $edu)
        <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
            <div class="flex-grow-1">
                <h3 class="mb-0">{{$edu->name}}</h3>
                <div class="subheading mb-3">{{$edu->status}}</div>
                @if($edu->major != "-")
                <div>{{$edu->major}}</div>
                @endif
                @if($edu->gpa!=null)
                <p>GPA: {{$edu->gpa}}</p>
                    @endif
            </div>
            <div class="flex-shrink-0"><span class="text-primary">{{$edu->start_period}} - {{$edu->end_period}}</span></div>
        </div>
        @endforeach
    </div>
</section>
