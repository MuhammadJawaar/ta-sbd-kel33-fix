<!-- resources/views/auth/login.blade.php -->

<form action="{{ url('/login') }}" method="post">
    @csrf

    <label for="nomer_handphone">Nomor Handphone:</label>
    <input type="text" name="nomer_handphone" required>

    <label for="password">Password:</label>
    <input type="password" name="password" required>

    <button type="submit">Login</button>
</form>
