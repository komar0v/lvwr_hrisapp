<div>
    <livewire:panels.partial.header />
    <livewire:panels.partial.sidebar />

    <main id="main" class="main">

        <div class="pagetitle">
            <div class="row">
                <div class="col text-start">
                    <h1>Opening Jobs</h1>
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">Dashboard</li>
                            <li class="breadcrumb-item active">Jobs</li>
                        </ol>
                    </nav>
                </div>
                <div class="col text-end">
                    <a wire:navigate href="{{ route('panelVacancyJobCreatePage') }}" class="btn btn-primary"><i class="bi bi-plus-lg me-1"></i> New Job Openings</a>
                </div>
            </div>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">All Opening Jobs</h5>

                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">Title</th>
                                        <th scope="col">City</th>
                                        <th scope="col">Created Date</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($jobList as $job)
                                    <tr>
                                        <td>{{$job['title']}}</td>
                                        <td>{{$job['cities']}}</td>
                                        <td>{{$job['created_at']}}</td>
                                        <td><a wire:navigate href="{{ route('panelVacancyJobDetailsPage',['jobId' => $job['id']]) }}">Details</a></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main><!-- End #main -->


    <livewire:panels.partial.footer />
</div>