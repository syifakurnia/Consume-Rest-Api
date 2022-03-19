@extends('layout.master')
     
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Data User</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{'users/create'}}">Create</a>
            </div>
        </div>
    </div>
    
    @if ($message = Session::get('success'))
        <div class="alert alert-primary" role="alert">
            <p>{{ $message }}</p>
        </div>
    @endif

<table class= "table table-bordered table-striped text-center table-hover">
    @php
    $number = 1;
    @endphp
    <!-- di foreach dari $users['data'] karena biasanya response dari API itu di bungkus dalam index data -->
    <tr class="table-primary">
        <th>No</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th width="200px">Action</th>
    </tr>
    @forelse($users['data'] as $user)
    <tr>
        <td>{{ $number++ }}</td>
        <td>{{ $user['firstName'] }}</td>
        <td>{{ $user['lastName'] }}</td>
        <td>
            <form method="POST" action="{{ 'users/'.$user['id'] }}">
                @method('DELETE')
                @csrf

                <a href="{{ 'users/'.$user['id'] }}" class="text-primary"><i class="fa fa-fw fa-edit"></i> Edit</a> |
                <button type="submit" class="text-danger btn btn-link" onClick="return confirm('Are you sure to delete this user?');"><i class="fa fa-fw fa-trash"></i> Delete</button>
            </form>
        </td>
    </tr>
    @empty
    <tr>
        <td colspan="6" style="text-align: center;">No Record(s) Found!</td>
    </tr>
    @endforelse
</table>



@endsection
