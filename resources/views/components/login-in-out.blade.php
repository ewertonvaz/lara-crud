<div class="text-col-nav-item">
    @guest
        <form action="/user/login" method="get">
            @csrf
            <button type="submit">Log In</button>
        </form>
    @else
        <form action="/user/logout" method="post">
            <p>Olá, {{auth()->user()->name}}</p>
            @csrf
            <button type="submit">Log Out</button>
        </form>
    @endguest
</div>