<div>
    <livewire:panels.partial.header />
    <livewire:panels.partial.sidebar />

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>MNATA Dashboard Panel</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">
                <div class="col-lg-6">

                    <div class="card info-card sales-card">

                        <div class="card-body">
                            <h5 class="card-title">Total Applicants</span></h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-file-earmark-easel"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>{{$applicantCounters['applicant_total']}}</h6>
                                    <span class="text-success small pt-1 fw-bold">Applicants</span>

                                </div>
                            </div>
                        </div>

                    </div>

                </div>

                <div class="col-lg-6">

                    <div class="card">
                        <div class="card-body">

                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title">Applicants</h5>
                                    <div id="pieChart1"></div>

                                </div>
                                <div class="col">
                                    <h5 class="card-title">Recommendation after process</h5>
                                    <div id="pieChart2"></div>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main><!-- End #main -->


    <livewire:panels.partial.footer />
    @script

    <script>
        new ApexCharts(document.querySelector("#pieChart2"), {
            series: [{{$applicantResultCounters['applicant_rejected']}}, {{$applicantResultCounters['applicant_processed']}}],
            chart: {
                height: 350,
                type: 'pie',
                toolbar: {
                    show: true
                }
            },
            labels: ['Rejected', 'Approved']
        }).render();

        new ApexCharts(document.querySelector("#pieChart1"), {
            series: [{{$applicantCounters['applicant_pending']}}, {{$applicantCounters['applicant_processed']}}],
            chart: {
                height: 350,
                type: 'pie',
                toolbar: {
                    show: true
                }
            },
            labels: ['Pending', 'Processed']
        }).render();
    </script>
    @endscript
</div>