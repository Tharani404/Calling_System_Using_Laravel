
<x-app-layout>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-3">

                    {{--  @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                    @endif  --}}

                    <div class="card-header mt-3">
                        <h1 style="color: rgb(103, 101, 101)">Users</h1>
                    </div>

                    <div style="margin-top: 20px; margin-left: 20px;">
                        @can('create user')
                        <a href="{{ url('users/create') }}" class="btn btn-primary">Add Users</a>
                        @endcan
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Roles</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                  
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @if (!empty($user->getRoleNames()))
                                            @foreach ($user->getRoleNames() as $rolename)
                                            <label class="badge badge-primary mx-1">{{ $rolename }}</label>
                                                
                                            @endforeach
                                        @endif
                                    </td>
                                    <td>

                                        @can('update user')
                                        <a class="btn btn-primary mx-2" href="{{ url('users/'.$user->id.'/edit') }}">
                                            <svg class="w-5 h-7" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M7.24264 17.9967H3V13.754L14.435 2.319C14.8256 1.92848 15.4587 1.92848 15.8492 2.319L18.6777 5.14743C19.0682 5.53795 19.0682 6.17112 18.6777 6.56164L7.24264 17.9967ZM3 19.9967H21V21.9967H3V19.9967Z"></path></svg>

                                        </a>
                                        @endcan


                                        @can('delete user')
                                        <a class="btn btn-danger mx-2" href="{{ url('users/'.$user->id.'/delete') }}">
                                            <svg class="w-5 h-7" fill="currentColor" xmlns="http://www.w3.org/2000/svg" id="mdi-delete" viewBox="0 0 24 24"><path d="M19,4H15.5L14.5,3H9.5L8.5,4H5V6H19M6,19A2,2 0 0,0 8,21H16A2,2 0 0,0 18,19V7H6V19Z"></path></svg> 

                                        </a>
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
