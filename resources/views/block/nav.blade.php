<nav>
  @if ($errors->any())
    <ul style="color: red;">
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  @endif

  @if (session('message'))
    <p class="message" style="color: green;">{{ session('message') }}</p>
  @endif
</nav>
