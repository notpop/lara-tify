<nav style="display: block;">
  @if ($errors->any())
    <ul style="color: red;white-space: pre-wrap;">
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  @endif
</nav>
