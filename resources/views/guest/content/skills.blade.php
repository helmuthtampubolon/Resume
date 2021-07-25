<!-- Skills-->
<section class="resume-section" id="skills">
    <div class="resume-section-content">
        <h2 class="mb-5">Technical Skills</h2>
        @foreach($scategory as $k)
            <div class="subheading mb-3 mt-5">{{$k->type}} <!--Programming Languages & Tools--></div>
            <ul class="list-inline dev-icons">
                @foreach($skills as $s)
                    @if($s->type==$k->type)
                        @if($s->icon!=null)
                            <li class="list-inline-item"><i class="{{$s->icon}}"></i></li>
                        @endif
                    @endif
                @endforeach
                {{--                    <li class="list-inline-item"><i class="fab fa-html5"></i></li>--}}
                {{--                <li class="list-inline-item"><i class="fab fa-css3-alt"></i></li>--}}
                {{--                <li class="list-inline-item"><i class="fab fa-js-square"></i></li>--}}
                {{--                <li class="list-inline-item"><i class="fab fa-angular"></i></li>--}}
                {{--                <li class="list-inline-item"><i class="fab fa-react"></i></li>--}}
                {{--                <li class="list-inline-item"><i class="fab fa-node-js"></i></li>--}}
                {{--                <li class="list-inline-item"><i class="fab fa-sass"></i></li>--}}
                {{--                <li class="list-inline-item"><i class="fab fa-less"></i></li>--}}
                {{--                <li class="list-inline-item"><i class="fab fa-wordpress"></i></li>--}}
                {{--                <li class="list-inline-item"><i class="fab fa-gulp"></i></li>--}}
                {{--                <li class="list-inline-item"><i class="fab fa-grunt"></i></li>--}}
                {{--                <li class="list-inline-item"><i class="fab fa-npm"></i></li>--}}
            </ul>
        <div class="row">
            <div class="col-4">
                <ul class="fa-ul mb-0">
                    <?php $c=1; ?>
                    @foreach($skills as $i => $s)
                        @if($s->type==$k->type)
                            <li>
                                <span class="fa-li"><i class="fas fa-check"></i></span>
                                {{$s->name}}
                            </li>
                            @if((($c)%5)==0)
                                <?='</ul></div><div class="col-4"><ul class="fa-ul mb-0">'?>
                            @endif
                            <?php $c++ ?>
                        @endif
                    @endforeach
                    {{--                <li>--}}
                    {{--                    <span class="fa-li"><i class="fas fa-check"></i></span>--}}
                    {{--                    Mobile-First, Responsive Design--}}
                    {{--                </li>--}}
                    {{--                <li>--}}
                    {{--                    <span class="fa-li"><i class="fas fa-check"></i></span>--}}
                    {{--                    Cross Browser Testing & Debugging--}}
                    {{--                </li>--}}
                    {{--                <li>--}}
                    {{--                    <span class="fa-li"><i class="fas fa-check"></i></span>--}}
                    {{--                    Cross Functional Teams--}}
                    {{--                </li>--}}
                    {{--                <li>--}}
                    {{--                    <span class="fa-li"><i class="fas fa-check"></i></span>--}}
                    {{--                    Agile Development & Scrum--}}
                    {{--                </li>--}}
                </ul>
            </div>
        </div>
        @endforeach
        {{--        <div class="subheading mb-3">Workflow</div>--}}
    </div>
</section>
