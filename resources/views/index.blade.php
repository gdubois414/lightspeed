@extends('layouts.base')
@section('content')
    <h1>Users List</h1>

    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Projects</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td><a href="/?users={{ $user->name }}">{{ ucwords($user->name) }}</a></td>
                    <td>
                        @foreach($user->projects as $project)
                            <a href="/project/{{ $project->slug }}">{{ $project->name }}{{ $loop->last ? '' : ', ' }}</a>
                        @endforeach
                    </td>
                    <td>
                        <a href="/?users={{ $user->name }}" class="button">View</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
