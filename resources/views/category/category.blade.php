@extends('master')

@section('content')
<div class="row mt-3">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">All Category</div>
            <div class="card-body">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary right" data-toggle="modal" data-target="#addNew">add New</button>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Body</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php( $count = 1)
                        @foreach($categories as $category)
                        <tr>
                            <td>{{ $count++ }}</td>
                            <td>{{ str_limit($category->title, 30) }}</td>
                            <td>{{ str_limit($category->description, 50) }}</td>
                            <td>
                                <a class="btn btn-success" href="{{ URL::to('edit/'.$category->id) }}">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <button class="btn btn-info" data-mytitle="{{$category->title}}" data-mydescription="{{$category->description}}" data-catid="{{$category->id}}" data-toggle="modal" data-target="#editNew">
                                    <i class="far fa-edit"></i>
                                </button>
                                <a class="btn btn-danger" data-catid="{{$category->id}}" data-toggle="modal" data-target="#deleteNew">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>
                         @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- create Modal -->
<div class="modal fade" id="addNew" tabindex="-1" role="dialog" aria-labelledby="addNewLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addNewLabel">Add New</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ url('insert')}}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" class="form-control" placeholder="Enter Title">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" class="form-control" rows="4" placeholder="Enter Description"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editNew" tabindex="-1" role="dialog" aria-labelledby="editNewLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editNewLabel">Edit New</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ url('update')}}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title" class="form-control" placeholder="Enter Title">
                        <input type="hidden" name="category_id" id="cat_id" value="">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" class="form-control" rows="4" placeholder="Enter Description"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Delete Modal -->
<div class="modal fade" id="deleteNew" tabindex="-1" role="dialog" aria-labelledby="deleteNewLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="background: rgba(231, 76, 60, 1);">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteNewLabel">Delete Confirmation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ url('delete')}}" method="POST">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="category_id" id="cat_id" value="">
                    <h3 style="text-align: center;">Are You Sure to Delete</h3>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-primary">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection