<x-app-layout>

    <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mt-3">
                        <div class="card-header ">
                            {{--  <h2>Add New Skills</h2>  --}}
                            <a href="{{ url('campeign') }}" class="btn btn-danger float-end">Back</a>
                        </div>
    
                        <div class="card-body ">
                                <form action="{{ url('campeign') }}" method="POST">
                                    @csrf
    
                                    <div class="mb-3">
                                        
                                            <label for="name">Campaign Name</label>
                                            <input type="text" name="name" class="form-control" required>
                                        
                                    </div>
                        
                                    <div class="mb-3">
                                        
                                            <label for="type">Campaign Type</label>
                                            <select name="type" class="form-control" required>
                                                <option value="">Select Type</option>
                                                <option value="Daily">Daily</option>
                                                <option value="Continuous">Continuous</option>
                                            </select>
                                        
                                    </div>

                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-primary">Save</button>

                                    </div>
                                </form>
                        </div>
    
                    </div>
                </div>
            </div>
        </div>

    </x-app-layout>