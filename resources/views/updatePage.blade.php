@include('header')

<main>
    <form action="/update" method="post">
        @csrf
        <input type="hidden" name="taskID" value="{{$taskID}}">
        <input type="text" name="title">
        <input type="submit">
    </form>
</main>

@include('footer')