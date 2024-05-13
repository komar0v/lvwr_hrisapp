<div>
    <livewire:landingpage.partial.header />

    <main class="main">

        <!-- Page Title -->
        <div class="page-title">
            <div class="container">
                <nav class="breadcrumbs">
                    <ol>
                        <li>MNATA</li>
                        <li>Jobs</li>
                        <li class="current">{{$jobDetails['title']}}</li>
                    </ol>
                </nav>
                <h1>{{$jobDetails['title']}}</h1>
            </div>
        </div><!-- End Page Title -->

        <section id="starter-section" class="starter-section section">

            <div class="container">
                <p>{!!$jobDetails['description']!!}</p>
                <p>Location/City : {{$jobDetails['cities']}}</p>

                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Apply Now
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <form class="row g-3" wire:submit.prevent="submit_job_application('{{$jobDetails['id']}}')">
                                    <div class="col-auto">
                                        <label class="form-label">Full Name</label>
                                        <input type="text" class="form-control" wire:model="applicantFullName" id="inputPassword2" placeholder="Joko Sembung">
                                        <div class="text-danger">@error('applicantFullName') {{ $message }} @enderror</div>
                                    </div>
                                    <div class="col-auto">
                                        <label class="form-label">EMail</label>
                                        <input type="text" wire:model="applicantEmail" class="form-control" placeholder="yourmail@email.com">
                                        <div class="text-danger">@error('applicantEmail') {{ $message }} @enderror</div>
                                    </div>
                                    <div class="col-auto">
                                        <label for="formFile" class="form-label">CV/Resume (PDF File)</label>
                                        <input class="form-control" wire:model="applicantResume" type="file" id="formFile" accept="application/pdf">
                                        <div class="text-danger">@error('applicantResume') {{ $message }} @enderror</div>
                                    </div>
                                    <div class="col-auto">
                                        <br>
                                        <button type="submit" class="btn btn-primary"> Submit Job Application</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </section>

    </main>


    <livewire:landingpage.partial.footer />

</div>