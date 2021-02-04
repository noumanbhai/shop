@extends('admin.dashbord')
{{-- Dashbord start --}}
@section('title')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">News Email</h1>

</div>
@endsection
{{-- Dashbord start --}}
@section('main')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">News Tables</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Email</th>
                        <th>Subsribe Time</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($newsleters as $key=> $newsleter)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$newsleter->email}}</td>
                        <td>{{\carbon\Carbon::parse($newsleter->created_at)->diffForHumans()}}</td>
                        <td>
                            <form action="{{ route('other.destroy', $newsleter->id)}}" method="post">
                                @csrf
                                @method('DELETE')

                                <button class="btn btn-danger" onclick="return confirm('Are you sure?')" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Main Content End  -->
@endsection