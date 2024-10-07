<x-app-layout>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-3">
                    <div class="card-header">
                        <h2 style="color: rgb(103, 101, 101)">Edit Campaign</h2>
                    </div>

                    <div style="margin-top: 20px; margin-left: 20px;">
                        <a href="{{ url('campeign') }}" class="btn btn-danger float-end">Back</a>
                    </div>

                    <div class="card-body">
                        <form action="{{ url('campeign/' . $campeigns->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            


                            <div class="mb-3">
                                        
                                <label for="name">Campaign Name</label>
                                <input type="text" name="name" class="form-control" value="{{ $campeigns->name }}" required>
                            
                            </div>
                
                            <div class="mb-3">
                                
                                    <label for="type">Campaign Type</label>
                                    <select name="type" class="form-control" value="{{ $campeigns->type }}" required>
                                        <option value="">Select Type</option>
                                        <option value="Daily">Daily</option>
                                        <option value="Continuous">Continuous</option>
                                    </select>
                                
                            </div>



                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
