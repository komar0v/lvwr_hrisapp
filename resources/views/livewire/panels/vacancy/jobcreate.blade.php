<div>
    <livewire:panels.partial.header />
    <livewire:panels.partial.sidebar />

    <main id="main" class="main">

        <div class="pagetitle">
            <div class="row">
                <div class="col text-start">
                    <h1>Create New Jobs Opening</h1>
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">Dashboard</li>
                            <li class="breadcrumb-item">Jobs</li>
                            <li class="breadcrumb-item active">Create New</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Job Details</h5>

                            <form wire:submit.prevent="saveJobData()">
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Job Title</label>
                                    <div class="col-sm-10">
                                        <input type="text" wire:model="jobTitle" class="form-control">
                                        <div class="text-danger">@error('jobTitle') {{ $message }} @enderror</div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Job Division</label>
                                    <div class="col-sm-10">
                                        <input type="text" wire:model="jobDivisions" class="form-control">
                                        <div class="text-danger">@error('jobDivisions') {{ $message }} @enderror</div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">City</label>
                                    <div class="col-sm-10">
                                        <input type="text" wire:model="jobCity" class="form-control">
                                        <div class="text-danger">@error('jobCity') {{ $message }} @enderror</div>
                                    </div>
                                </div>


                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Job Requirements</label>
                                    <div class="col-sm-10">
                                        <div id="newRow"></div>
                                        <div class="text-danger">@error('jobRequirements') {{ $message }} @enderror</div>
                                        <button id="addRow" type="button" class="btn btn-success">Add Requirements</button>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Job Description</label>
                                    <div class="col-sm-10">
                                        <div class="quilleditor">
                                            
                                        </div>
                                        <div class="text-danger">@error('jobDescription') {{ $message }} @enderror</div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-sm-10">
                                        <input wire:model="jobRequirements" type="hidden" name="jobRequirements" id="jobRequirements">
                                        <input wire:model="jobDescription" type="hidden" name="jobDescription" id="jobDescription">
                                        <button type="submit" id="submitButton" class="btn btn-primary">Save
                                            <div wire:loading wire:target="updateJobData">
                                                <div class="spinner-border float-end spinner-border-sm" role="status">
                                                    <span class="visually-hidden">Loading...</span>
                                                </div>
                                            </div>
                                        </button>
                                    </div>
                                </div>

                            </form>

                        </div>
                    </div>

                </div>
            </div>

        </section>

    </main><!-- End #main -->

    <livewire:panels.partial.footer />
    @script
    <script type="text/javascript">
        $(document).ready(function() {
            var jobRequirementsLivewire = new Set(@json($jobRequirements));

            var quill = new Quill('.quilleditor', {
                theme: 'snow'
            });

            // Add row
            $("#addRow").click(function() {
                var html = '';
                html += '<div class="inputFormRow">';
                html += '<div class="input-group mb-3">';
                html += '<input type="text" name="key[]" value="" required class="form-control" placeholder="have minimal one year work experience">';
                html += '<div class="input-group-append">';
                html += '<button type="button" class="btn btn-danger removeRow"><i class="bi bi-trash"></i></button>';
                html += '</div>';
                html += '</div>';
                html += '</div>';

                $('#newRow').append(html);
            });

            // Remove row
            $(document).on('click', '.removeRow', function() {
                var removedKey = $(this).closest('.input-group').find('input[name="key[]"]').val();
                jobRequirementsLivewire.delete(removedKey);
                $(this).closest('.inputFormRow').remove();
                updateHiddenInput();
            });

            // Update set and hidden input on blur
            $(document).on('blur', 'input[name="key[]"]', function() {
                var oldValue = $(this).attr('data-old-value'); // Get the old value
                var newValue = $(this).val(); // Get the new value

                jobRequirementsLivewire.delete(oldValue);
                jobRequirementsLivewire.add(newValue);

                $(this).attr('data-old-value', newValue); // Update the old value attribute
                $(this).prop('readonly', true);
                updateHiddenInput(); // Update the hidden input field
            });

            // Function to update the hidden input with the current set values
            function updateHiddenInput() {
                var jobRequirementsArray = Array.from(jobRequirementsLivewire);
                document.getElementById('jobRequirements').value = JSON.stringify(jobRequirementsArray);
            }

            $('#submitButton').click(function() {
                updateHiddenInput();
                document.getElementById('jobRequirements').dispatchEvent(new Event('input'));

                var isi_quill_editor = quill.root.innerHTML;
                document.getElementById('jobDescription').value = isi_quill_editor;
                document.getElementById('jobDescription').dispatchEvent(new Event('input'));
            });
        });
    </script>
    @endscript
</div>