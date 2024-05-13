<div>
    <livewire:panels.partial.header />
    <livewire:panels.partial.sidebar />

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Applicant Details</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Dashboard</li>
                    <li class="breadcrumb-item">Applicants</li>
                    <li class="breadcrumb-item active">{{$applicantData['applicant_name']}}</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="profile-overview">
                                <h5 class="card-title">Details</h5>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">Full Name</div>
                                    <div class="col-lg-9 col-md-8">{{$applicantData['applicant_name']}}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Email</div>
                                    <div class="col-lg-9 col-md-8">{{$applicantData['applicant_email']}}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Applying for</div>
                                    <div class="col-lg-9 col-md-8">{{$applicantData['title']}} <a wire:navigate href="{{ route('panelVacancyJobDetailsPage',['jobId' => $applicantData['job_id']]) }}">Details</a></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Status</div>
                                    <div class="col-lg-9 col-md-8">
                                        <span class="badge {{$applicantData['status'] === 'Pending' ? 'bg-warning' : 'bg-success'}}">
                                            {{$applicantData['status']}}
                                        </span>
                                    </div>
                                </div>

                                @if($applicantData['status']!='Pending')
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Reccomendation</div>
                                    <div class="col-lg-9 col-md-8">{{$applicantData['recommendation']}}</div>
                                </div>

                                <h5 class="card-title">Reason</h5>
                                <p>{{$applicantData['reason']}}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Actions</h5>

                            <div class="row">
                                <div class="col">
                                    <button wire:click="manualProcessResume('{{$applicantData['id']}}')" class="btn btn-primary"><i class="bi bi-chevron-double-right"></i> Manual Process Resume
                                        <div wire:loading wire:target="manualProcessResume">
                                            <div class="spinner-border float-end spinner-border-sm" role="status">
                                                <span class="visually-hidden">Loading...</span>
                                            </div>
                                        </div>
                                    </button>
                                </div>

                                <div class="col">
                                    <button wire:click="downloadResume('{{$applicantData['id']}}')" class="btn btn-primary"><i class="bi bi-download"></i> Download Resume
                                        <div wire:loading wire:target="downloadResume">
                                            <div class="spinner-border float-end spinner-border-sm" role="status">
                                                <span class="visually-hidden">Loading...</span>
                                            </div>
                                        </div>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main><!-- End #main -->


    <livewire:panels.partial.footer />
</div>