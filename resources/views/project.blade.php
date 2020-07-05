@extends('layouts.base')

@section('content')
    <header class="page-header">
        <h1>{{ $project->name }}</h1>
        <p class="hours-estimate">{{ $project->calculateTotalHours() }} hours</p>
    </header>

    <table>
        <thead>
            <tr>
                <th>Task</th>
                <th>Assigned To</th>
                <th>Estimated Hours</th>
            </tr>
        </thead>
        <tbody>
            @foreach($project->tasks as $task)
                <tr>
                    <td>{{ $task->name }}</td>
                    <td><a href="/?user={{ $task->user->name }}">{{ ucwords($task->user->name) }}</a></td>
                    <td>{{ $task->hours_estimate }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="page-actions">
        <a href="{{ request()->headers->get('referer') }}" class="button button--large">Back</a>
    </div>
@endsection
