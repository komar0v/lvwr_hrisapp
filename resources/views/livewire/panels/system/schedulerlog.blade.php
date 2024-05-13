<div>
    <livewire:panels.partial.header />
    <livewire:panels.partial.sidebar />

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>MNATA Scheduler Logs</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">System</li>
                    <li class="breadcrumb-item active">Scheduler Logs</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">

            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div wire:poll.5s class="card-body">
                            <h5 class="card-title">Scheduler Log Viewer</h5>
                            <div class="p-2" style="background-color: #D3D3D3; height: 450px; overflow-y: auto;">
                                <p><samp>{!! $scheLog !!}</samp></p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main><!-- End #main -->


    <livewire:panels.partial.footer />
</div>