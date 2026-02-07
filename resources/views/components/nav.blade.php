<div class="navbar bg-base-100 shadow-sm">
  <div class="flex-1">
    <a class="btn btn-ghost text-xl">Christmas Wishlist</a>
  </div>
  <div class="flex-none">
    <ul class="menu menu-horizontal px-1">
      <li><a href="/">Home</a></li>
        @auth
          <li>
            <form method="POST" action="/logout">
              @csrf
              @method('DELETE')
              <button>Log out</button>
            </form>
          </li>
        @else
          <li><a href="/register">Register</a></li>
          <li><a href="/login">Login</a></li>
        @endauth
      {{-- <li>
        <details>
          <summary>Parent</summary>
          <ul class="bg-base-100 rounded-t-none p-2">
            <li><a>Link 1</a></li>
            <li><a>Link 2</a></li>
          </ul>
        </details>
      </li> --}}
    </ul>
  </div>
</div>
