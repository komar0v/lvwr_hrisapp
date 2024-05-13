<div>
    <livewire:landingpage.partial.header />

    <main class="main">

        <!-- Page Title -->
        <div class="page-title">
            <div class="container">
                <nav class="breadcrumbs">
                    <ol>
                        <li>MNATA</li>
                        <li class="current">Jobs</li>
                    </ol>
                </nav>
                <h1>Jobs</h1>
            </div>
        </div><!-- End Page Title -->

        <section id="starter-section" class="starter-section section">

            <div class="container">
                
                <div class="row">

                @foreach($jobList as $job)
                    <div class="col-md-6 col-xl-3">
                        <div class="card">
                            <img class="card-img-top img-fluid" src="https://source.unsplash.com/400x200?geometry,pattern?sig={{$job['id']}}">
                            <div class="card-body">
                                <p class="card-text h5">{{$job['title']}}</p>
                                <p class="card-text h6"><i class="bi bi-geo-alt-fill"></i> {{$job['cities']}}</p>
                                <a wire:navigate href="{{ route('jobDetailsPage', ['jobId' => $job['id']]) }}" class="btn btn-primary">Apply</a>
                            </div>
                        </div>
                    </div>
                @endforeach
                </div>
            </div>

        </section>

    </main>


    <livewire:landingpage.partial.footer />

</div>