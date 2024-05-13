<div>
    <main>
        <!-- section -->
        <section>
            <div class="container d-flex flex-column">
                <!-- row -->
                <div class="row min-vh-100 justify-content-center align-items-center">
                    <!-- col -->
                    <div class="offset-lg-1 col-lg-10 py-8 py-xl-0">

                        <div class="row justify-content-center align-items-center">
                            <!-- content -->
                            <div class="col-md-6">

                                <div>
                                    <img src="{{ url(env('ASSETS_LP_URL') . '/img/mnata_nobg_md.png') }}" width="500" height="100" />
                                    <h1 class="text-center">Logging out.. <div class="spinner-border" role="status"></div>
                                    </h1>
                                    <p class="mb-6 h4 text-center">
                                        {{$data['message'] ?? 'Hmm..'}} Sampai jumpa lagi
                                    </p>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="text-center">
                                    <!-- img -->
                                    <img src="https://media1.tenor.com/m/046QtZSEqmIAAAAC/penguin-artic.gif" class="img-fluid" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <script>
        window.setTimeout(function() {
            window.location.href = "{{ route('panelLoginPage') }}";
        }, 6000);
    </script>

</div>