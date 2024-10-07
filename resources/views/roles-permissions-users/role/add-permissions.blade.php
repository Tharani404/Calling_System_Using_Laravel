<x-app-layout>
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                {{--  @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif  --}}


                <div class="card  mt-3">
                    <div class="card-header">
                        <h2 style="color: rgb(103, 101, 101)">Role : {{ $role->name }}</h2>
                    </div>

                    <div style="margin-top: 20px; margin-left: 20px;">
                        <a href="{{ url('roles') }}" class="btn btn-danger">Back</a>
                    </div>
    
    
                    <div class="card-body">

                            <form action="{{ url('roles/'.$role->id.'/give-permissions') }}" method="POST">
                                @csrf
                                @method('PUT')
    
                                <div class="mb-3">
                                    @error('permission')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                        <label for="">Permissions</label>

                                        <div class="row">
                                            @foreach ($permissions as $permission)
                                            
                                            <div class="col-md-2">
                                                <label>
                                                    <input 
                                                        type="checkbox" 
                                                        name="permission[]" 
                                                        value="{{ $permission->name }}" 
                                                        {{ in_array($permission->id, $rolePermissions) ? 'checked':'' }}
                                                    />
                                                    {{ $permission->name }}
                                                </label>
                                            </div>
                                            @endforeach
                                        </div>
                                </div>

                                <div class="mb-3">
                                    <button type="submit" class="btn btn-success mt-3">Update</button>
                                </div>
                    
    
                            </form>
                    </div>
    
                </div>
            </div>
        </div>
    </div>

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