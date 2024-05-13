<div>
    <livewire:panels.partial.header />
    <livewire:panels.partial.sidebar />

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>MNATA System Logs</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">System</li>
                    <li class="breadcrumb-item active">Logs</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">


            <div class="row">
                <div class="col-lg-12">

                    <div wire:poll class="card">
                        <div class="card-body pt-4">
                            <button wire:click="clearSystemLog()" class="btn btn-warning"><i class="bi bi-trash me-1"></i>
                                Clear Log
                                <div wire:loading wire:target="clearSystemLog">
                                    <div class="spinner-border float-end spinner-border-sm" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>
                                </div>
                            </button>
                        </div>
                    </div>

                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div wire:poll.4s class="card-body">
                            <h5 class="card-title">System Log Viewer</h5>
                            <div class="p-2" style="background-color: #D3D3D3; height: 450px; overflow-y: auto;">
                                <p><samp>{!! $sysLog !!}</samp></p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main><!-- End #main -->


    <livewire:panels.partial.footer />
</div>