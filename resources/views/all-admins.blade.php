@extends('layouts.app')

@section('subtitle', 'All Jobs')

@section('content')
        <h3>All Admins</h3>
        <p><button type="submit" class="large-button" onClick="window.location='{{ action("JobController@addAdminUser") }}';">Create Admin User</button></p>
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Created at</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($admins as $admin)
                    <tr>
                        <td>{{ $admin->name }}</td>
                        <td>{{ $admin->email }}</td>
                        <td>{{ $admin->created_at }}</td>
                        <td>
                            <button type="button" class="medium-button-red" onClick="if(confirm('Are you sure you want to delete this admin user?')){ window.location='{{ action("JobController@deleteAdminUser", ["id"=>$admin->id]) }}'; }"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
@endsection