@extends('admin.dashboard')


@section('content')

    <h1>Manage Role's</h1>

 
    @if(Session::has('message'))
    <div class="alert alert-primary" role="alert">
        {{ Session::get('message') }}
    </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">First</th>
                <th scope="col">Name</th>
                <th scope="col">Manager</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($users as $user)

                @if (!$user->isAdmin)

                    <tr @if ($user->isManager) class="table-primary" 
                @else
                    class="table-light" @endif>
                        <th scope="row">{{ $user->id }}</th>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <form action="/admin/dashboard/manage-role/" method="post">
                                @csrf
                                @if($user->isManager)
                                <input class='managerSwitch' type="checkbox" checked name="handleManage" >
                                @else
                                <input class='managerSwitch' type="checkbox"  name="handleManage" >
                                @endif
                                <input type="hidden" name="user_id" value="{{ $user->id }}">
                                <button type="submit" class="btn btn-primary">Change</button>
                            </form>
                        </td>
                    </tr>



                @endif


            @endforeach


        </tbody>
    </table>
@endsection
