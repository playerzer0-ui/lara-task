@include('header')

<main>
    @if ($title == "register")
    <h1>Register</h1>
    <form action="{{route("registerData")}}" method="post"> 
    @else
    <h1>Login</h1>
    <form action="{{route("loginData")}}" method="post">
    @endif
        @csrf
        <label>username</label>
        <input type="text" name="username" required> <br>
        @error('username')
            <span class="warn-msg">{{ $message }}</span> <br>
        @enderror
        <label>password</label>
        <input type="password" name="userPassword" required> <br>
        @error('userPassword')
            <span class="warn-msg">{{ $message }}</span> <br>
        @enderror
        <button type="submit">submit</button>
    </form>
</main>

@include('footer')