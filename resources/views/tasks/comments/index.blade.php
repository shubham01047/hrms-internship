<x-app-layout>
    @if (session('success'))
        <div>
            <p>Success! {{ session('success') }}</p>
        </div>
    @endif
    @if (session('error'))
        <div>
            <p>Error! {{ session('error') }}</p>
        </div>
    @endif
    <h2>Comments for Task: {{ $task->title }}</h2>
    <form action="{{ route('tasks.comments.store', [$task->project_id, $task->id]) }}" method="POST">
        @csrf
        <textarea name="comment" rows="3" required></textarea><br>
        <button type="submit">Add Comment</button>
        <a href="{{ route('projects.show', ['project' => $project]) }}">Back to Task</a>
        </a>

    </form>
    <ul>
        @foreach($comments as $comment)
            <li>
                <strong>{{ $comment->user->name }}:</strong> {{ $comment->comment }}
                <small>({{ $comment->created_at->diffForHumans() }})</small>
            </li>
        @endforeach
    </ul>
</x-app-layout>