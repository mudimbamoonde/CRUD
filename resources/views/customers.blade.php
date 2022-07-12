@extends("layouts.app")
@section("content")
<div class="card mt-4">
    <div class="card-body">
        @if (Session::get("msg"))
        <div class="alert alert-success">
            <b>{{ session::get("msg") }}</b>
        </div>
       @endif
      <table class="table table-responsive table-sm">
        <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Mobile Number</th>
                <th>Created At</th>
                <th>Modified At</th>
                <th>Control</th>
            </tr>
        </thead>
        <tbody>
            @foreach ( $customer as $cus )
            <tr>
                <td>{{ $cus->id }}</td>
                <td>{{ $cus->firstname }}</td> </td>
                <td>{{ $cus->lastname }}</td>
                <td>{{ $cus->email }}</td>
                <td>{{ $cus->mobilenumber }}</td>
                <td>{{ $cus->created_at->diffForHumans() }}</td>
                <td>{{ $cus->updated_at->diffForHumans()  }}</td>
                <td><a href="/customer/{{ $cus->id }}/edit" class="btn btn-primary">Edit</a> | <a href="/customer/{{ $cus->id }}/delete" class="btn btn-danger">Delete</atd>
            </tr>
            @endforeach
        </tbody>
      </table>
    </div>
</div>

@endsection