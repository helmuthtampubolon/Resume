<section class="resume-section" id="about">
    <div class="resume-section-content">
        <h1 class="mb-0">
            <!-- Nama Depan -->
            {{$profile->first_name}}
            <!-- Nama Belakang -->
            <span class="text-primary">{{$profile->last_name}}</span>
        </h1>
        <div class="subheading mb-5">
            <!-- alamat lengkap -->
            {{$profile->address}}
            <a href="mailto:name@email.com">
                <!-- email -->
                {{$profile->email}}
            </a>
        </div>
        <p class="lead mb-5">
            <?php
                echo $profile['about'];
            ?>
        </p>
        <div class="social-icons">
            @foreach($social_media as $sm)
            <a class="social-icon" href="{{$sm->link}}"><i class="fab {{$sm->icon}}"></i></a>
            @endforeach
        </div>
    </div>
</section>
