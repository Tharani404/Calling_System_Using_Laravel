<x-app-layout>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-3">
                    <div class="card-header">
                        <h2 style="color: rgb(103, 101, 101)">Edit Skill</h2>
                    </div>

                    <div style="margin-top: 20px; margin-left: 20px;">
                        <a href="{{ url('setting') }}" class="btn btn-danger float-end">Back</a>
                    </div>

                    <div class="card-body">
                        <form action="{{ url('setting/' . $language->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="skill" style="font-weight: bold">Skill</label>
                                <input type="text" name="skill" class="form-control" value="{{ $language->skill }}" required>
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
