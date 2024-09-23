@include('header')

<main>
    <h1>DASHBOARD</h1>
    <p>{{session("userID")}}</p>
    <p>{{session("username")}}</p>
    <br>
    <ol>
        @foreach ($tasks as $task)
            <li>
                <span>{{$task["title"]}}</span>
                <a href="{{route("updatePage", ["taskID" => $task['taskID']])}}"><button>
                    Update
                </button></a>
                <a href="{{route("delete", ["taskID" => $task["taskID"]])}}"><button>delete</button></a>
            </li>
        @endforeach
    </ol>
    <form action="{{route("create")}}" method="post">
        @csrf
        <input type="text" name="title" required>
        @error('title')
            <span class="warn-msg">{{ $message }}</span>
        @enderror
        <button type="submit">create task</button>
    </form>
</main>

@include('footer')