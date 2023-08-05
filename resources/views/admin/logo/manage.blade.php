@extends('admin.master')
@section('body')
    <div class="row">
        <div class="col-md-12">

            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Data Table</h4>
                    <h6 class="card-subtitle">Data table example</h6>
                    <div class="table-responsive m-t-40">
                        <table id="myTable" class="table table-striped border">
                            <thead>
                            <tr>
                                <th>SI.NO</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                @foreach($logos as $logo)
                                    <td>{{$loop->iteration }}</td>
                                    <td>
                                        <img src="{{asset($logo->image)}}" alt="" height="50" width="60">
                                    </td>
                                    <td>
                                        <a href="{{route('logo.edit',['id'=>$logo->id])}}" class="btn  btn-outline-primary ">EDIT</a>
                                        <a href="{{route('logo.delete',['id'=>$logo->id])}}" onclick="return confirm('Are you sure to delete this ');" class="btn  btn-outline-danger ">DELETE</a>
                                    </td>
                                @endforeach
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
