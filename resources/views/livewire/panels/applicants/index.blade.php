<div>
    <livewire:panels.partial.header />
    <livewire:panels.partial.sidebar />

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Applicants</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Dashboard</li>
                    <li class="breadcrumb-item active">Applicants</li>
                    @if(request()->routeIs('panelApplicantsFilterPage'))
                    <li class="breadcrumb-item active">Filter</li>
                    @endif
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{request()->routeIs('panelApplicantsFilterPage') ? 'Filtered Applicants' : 'All Applicants' }}</h5>
                            <a wire:navigate href="{{ route('panelApplicantsIndexPage') }}" class="btn {{request()->routeIs('panelApplicantsIndexPage') ? 'btn-primary' : 'btn-outline-primary' }}">All</a>
                            <a wire:navigate href="{{ route('panelApplicantsFilterPage',['status' => 'Pending']) }}" class="btn {{request()->is('panels/applicants/filter/Pending') ? 'btn-primary' : 'btn-outline-primary' }}">Pending</a>
                            <a wire:navigate href="{{ route('panelApplicantsFilterPage',['status' => 'Processed']) }}" class="btn {{request()->is('panels/applicants/filter/Processed') ? 'btn-primary' : 'btn-outline-primary' }}">Processed</a>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">Name</th>
                                        <th scope="col">E-Mail</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Submission Date</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($applicantsList as $applicant)
                                    <tr>
                                        <td>{{$applicant['applicant_name']}}</td>
                                        <td>{{$applicant['applicant_email']}}</td>
                                        <td>{{$applicant['status']}}</td>
                                        <td>{{$applicant['created_at']}}</td>
                                        <td><a wire:navigate href="{{ route('panelApplicantsDetailsPage',['applicantId' => $applicant['id']]) }}">Details</a></td>
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