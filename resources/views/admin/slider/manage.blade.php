
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
                                <th>Data BS Target</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($sliders as $slider)
                            <tr>

                                    <td>{{$loop->iteration }}</td>
                                    <td>{{$slider->dataBs}}</td>
                                    <td>
                                        <img src="{{asset($slider->image)}}" alt="" height="50" width="60">
                                    </td>
                                    <td>
                                        <a href="{{route('slider.edit',['id'=>$slider->id])}}" class="btn  btn-outline-primary ">EDIT</a>
                                        <a href="{{route('slider.delete',['id'=>$slider->id])}}" onclick="return confirm('Are you sure to delete this ');" class="btn  btn-outline-danger ">DELETE</a>
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

@endsection
