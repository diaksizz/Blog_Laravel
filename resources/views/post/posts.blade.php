@extends('post.main')

@section('content')
<div class="page-content">
    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
                <div>
                    <h4 class="mb-3 mb-md-0">Welcome to Dashboard</h4>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-xl-12 grid-margin stretch-card">
                    <div class="card overflow-hidden">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover mb-0" id="table_id" class="display">
                                    <thead>
                                    <tr>
                                        <th class="pt-0">#</th>
                                        <th class="pt-0">Title</th>
                                        <th class="pt-0">Author</th>
                                        <th class="pt-0">Published Date</th>
                                        <th class="pt-0">Status</th>
                                        <th class="pt-0">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($datas as $index => $data)
                                    <tr>
                                        <td>{{ $index }}</td>
                                        <td>{{ $data->title }}</td>
                                        <td>{{ $data->author }}</td>
                                        <td>{{ $data->published_at }}</td>
                                        @if( $data->status == 'published' )
                                            <td><span class="badge badge-success">Released</span></td>
                                        @else
                                            <td><span class="badge badge-warning">Draft</span></td>
                                        @endif
                                        <td>
                                            <a class="btn btn-warning text-white" href="{{ route('post_update',['id' => $data->id]) }}">Update</a>
                                            <form method="post" action="{{route('post_delete')}}">
                                                @csrf
                                                <input type="hidden" name="id" value="{{$data->id}}">
                                                <button class="btn btn-danger" type="submit">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- row -->
</div>
<script>
	$(document).ready(function(){
		$('#table_id').DataTable({
			"columnDefs": [
			    { "orderable": true, "searchable": true }
			  ],
			"aLengthMenu": [[5,10,25,-1],[5,10,25, "All"]],
			"iDisplayLength": 5
		});
    });
</script>
@endsection