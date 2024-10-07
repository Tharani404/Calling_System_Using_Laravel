<x-app-layout>

    <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mt-3">

                        {{--  @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                        @endif  --}}

                        <div class="card-header">
                            <h2 style="color: rgb(103, 101, 101)">Skill Managment</h2>
                        </div>
    
                        <div style="margin-top: 20px; margin-right: 20px;">
                            <a href="{{ url('setting/create') }}" class="btn btn-secondary float-right p-2" style="--bs-bg-opacity: .5;">Add Skills</a>
                            <a href="{{ url('assign') }}" class="btn btn-secondary float-right p-2" style="--bs-bg-opacity: .5; margin-right: 15px;">Assign Skills</a>
                        </div>
                        

                        <div class="card-body">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>SKILL</th>
                                        <th>DATE</th>
                                        <th>ACTION</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($languages as $language)
                                    <tr>
                                        <td>{{ $language->id }}</td>
                                        <td>{{ $language->skill }}</td>
                                        <td>{{ $language->created_at->format('Y-m-d') }}</td>
                                        <td>
                                            
                                            @can('edit skill')
                                            <a href="{{ url('setting/' . $language->id . '/edit') }}" class="btn btn-primary">
                                                <svg class="w-5 h-7" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M7.24264 17.9967H3V13.754L14.435 2.319C14.8256 1.92848 15.4587 1.92848 15.8492 2.319L18.6777 5.14743C19.0682 5.53795 19.0682 6.17112 18.6777 6.56164L7.24264 17.9967ZM3 19.9967H21V21.9967H3V19.9967Z"></path></svg>
                                            </a>
                                            @endcan

                                            @can('delete skill')
                                            <form action="{{ url('setting/' . $language->id) }}" method="POST" style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">
                                                    <svg class="w-5 h-7" fill="currentColor" xmlns="http://www.w3.org/2000/svg" id="mdi-delete" viewBox="0 0 24 24"><path d="M19,4H15.5L14.5,3H9.5L8.5,4H5V6H19M6,19A2,2 0 0,0 8,21H16A2,2 0 0,0 18,19V7H6V19Z"></path></svg>                                                </button>
                                                    
                                                </button>
                                            </form>
                                            @endcan 
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
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
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
                    </div>
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
