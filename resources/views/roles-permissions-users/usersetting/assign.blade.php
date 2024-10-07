<x-app-layout>

    <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mt-3">

                        {{--  @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                        @endif  --}}

                        <div class="card-header">
                            <h2 style="color: rgb(103, 101, 101)">Assign Skills</h2>
                        </div>

                        <div style="margin-top: 20px; margin-left: 20px;">
                            <a href="{{ url('setting') }}" class="btn btn-danger float-end">Back</a>
                        </div>
    
                        <div class="card-body ">
                                <form action="{{ url('assign') }}" method="POST">
                                    @csrf

                                    <div class="row">

                                        <div class="col-md-6">
                                            <div class="mb-5">
                                                <label for="" style="font-weight: bold">Assign Language</label>
                                                <div id="languageDropdown" class="form-control">
                                                    <div id="selectedLanguagesContainer" class="d-flex flex-wrap">
                                                        <!-- Selected languages will appear here -->
                                                    </div>
                                                    <select id="languageSelect" name="languages[]" class="form-control" multiple style="display:none" onchange="displaySelectedLanguages()">
                                                        
                                                        <option value="">Select Language</option>
                                                        @foreach($languages as $language)
                                                            <option value="{{ $language->id }}">{{ $language->skill }}</option>
                                                        @endforeach

                                                        
                                                    </select>

                                                </div>
                                                
                                            </div>
                                        </div>



                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="" style="font-weight: bold">Assign Users</label>
                                                <select name="user_id" class="form-control">
                                                    <option value="">Select User</option>
                                                    
                                                    @foreach ($users as $user)
                                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                            
                                    </div>

                       
                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-primary mt-10">Assign</button>
                                    </div>

                                </form>

                        </div>
    
                    </div>
                </div>
            </div>
        </div>

        <script>
            function displaySelectedLanguages() {
                const select = document.getElementById('languageSelect');
                const container = document.getElementById('selectedLanguagesContainer');
                
                container.innerHTML = '';  // Clear existing labels
                
                for (let option of select.options) {
                    if (option.selected && option.value) {
                        const label = document.createElement('span');
                        label.classList.add('badge', 'bg-primary', 'me-2', 'mb-2');  // Bootstrap badge classes
                        label.textContent = option.text;
                        
                        container.appendChild(label);
                    }
                }
                
                // Hide the select dropdown after selection
                select.style.display = 'none';
            }
        
            document.getElementById('languageDropdown').addEventListener('click', function() {
                const select = document.getElementById('languageSelect');
                
                if (select.style.display === 'none') {
                    select.style.display = 'block';
                }
            });

            
        </script>
        
        <div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header alert-success">
                        <h5 class="modal-title" id="successModalLabel">Success</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        {{ session('success') }}
                    </div>
                    {{--  <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
                    </div>  --}}
                </div>
            </div>
        </div>
    
    </x-app-layout>
    
    <script>
        // Show success modal if there's a success message
        @if (session('success'))
        $(document).ready(function() {
            $('#successModal').modal('show');
        });
        @endif
    
    </script>
