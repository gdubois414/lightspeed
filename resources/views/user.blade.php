@extends('layouts.base')

@section('content')
    <header class="page-header">
        <h1>{{ ucwords($user->name) }}'s Project List</h1>
    </header>

    <table>
        <thead>
        <tr>
            <th>Project</th>
            <th>Members</th>
            <th>Estimated Hours</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($user->projects as $project)
            <tr>
                <td><a href="/project/{{ $project->slug }}">{{ $project->name }}</a></td>
                <td>
                    @foreach($project->users as $project_user)
                        <a href="/?user={{ $project_user->name }}">{{ ucwords($project_user->name) }}</a>{{ $loop->last ? '' : ', ' }}
                    @endforeach
                </td>
                <td>{{ $project->calculateTotalHours() }}</td>
                <td><a href="/project/{{ $project->slug }}" class="button">View</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
