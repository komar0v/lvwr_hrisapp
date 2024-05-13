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
                        <li class="current">Application Submited</li>
                    </ol>
                </nav>
                <h1>Application Submited</h1>
            </div>
        </div><!-- End Page Title -->

        <section id="starter-section" class="starter-section section">

            <div class="container">
                <p>{{$responseData['message']}}</p>
                <p>We'll contact you for the next step via your email {{$responseData['applicant_email']}}. Thank you.</p>
            </div>

        </section>

    </main>


    <livewire:landingpage.partial.footer />

</div>