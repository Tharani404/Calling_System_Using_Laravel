<x-app-layout>

    <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mt-3">

                        {{--  @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                        @endif  --}}

                        <div class="card-header">
                            <h2 style="color: rgb(103, 101, 101)">Campaign</h2>
                        </div>

                        <div style="margin-top: 20px; margin-right: 20px;">
                            <a href="{{ url('campeign/create') }}" class="btn btn-secondary float-right bg-success p-2" style="--bs-bg-opacity: .5;"> + Create</a>
                        </div>

                        <div class="card-body">
                            <table class="table table-bordered table-striped ">
                                <thead class="table-secondary">
                                    <tr>
                                        <th>ID</th>
                                        <th>NAME</th>
                                        <th>TYPE</th>
                                        <th>ACTION</th>
                                        <th>UPLOAD CAMPAIGN DATA</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($campeign as $campeigns)
                                    <tr>
                                        <td>{{ $campeigns->id }}</td>
                                        <td>{{ $campeigns->name }}</td>
                                        <td>{{ $campeigns->type }}</td>
                                        <td>
                                            
                                            {{--  @can('edit skill')  --}}
                                            <a href="{{ url('campeign/' . $campeigns->id . '/edit') }}" class="btn btn-primary">
                                                <svg class="w-5 h-7" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M7.24264 17.9967H3V13.754L14.435 2.319C14.8256 1.92848 15.4587 1.92848 15.8492 2.319L18.6777 5.14743C19.0682 5.53795 19.0682 6.17112 18.6777 6.56164L7.24264 17.9967ZM3 19.9967H21V21.9967H3V19.9967Z"></path></svg>
                                            </a>
                                            {{--  @endcan  --}}

                                            {{--  @can('delete skill')  --}}
                                            <form action="{{ url('campeign/' . $campeigns->id) }}" method="POST" style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">
                                                    <svg class="w-5 h-7" fill="currentColor" xmlns="http://www.w3.org/2000/svg" id="mdi-delete" viewBox="0 0 24 24"><path d="M19,4H15.5L14.5,3H9.5L8.5,4H5V6H19M6,19A2,2 0 0,0 8,21H16A2,2 0 0,0 18,19V7H6V19Z"></path></svg>                                                </button>
                                            </form>
                                            {{--  @endcan   --}}
                                        

                                        <td>
                                            <button class="btn " data-toggle="modal" data-target="#uploadModal" data-id="{{ $campeigns->id }}">Upload File</button>
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

        <!-- Modal -->
    <div class="modal fade" id="uploadModal" tabindex="-1" role="dialog" aria-labelledby="uploadModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="uploadModalLabel">Upload File for Campaign</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ url('campeign') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="campaign_id" id="campaign_id" value="">
                        <p>Campaign ID: <span id="campaign_id_display"></span></p>
                        <div class="form-group">
                            <label for="file">Choose File</label>
                            <input type="file" name="file" id="file" class="form-control" accept=".xlsx, .xls">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
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
    $('#uploadModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Button that triggered the modal
        var campaignId = button.data('id'); // Extract the campaign ID from data-* attributes

        var modal = $(this);
        modal.find('#campaign_id').val(campaignId);
        modal.find('#campaign_id_display').text(campaignId);
    });

    // Show success modal if there's a success message
    @if (session('success'))
        $(document).ready(function() {
            $('#successModal').modal('show');
        });
    @endif

</script>
