<nav>
  @if ($errors->any())
    <div class="error">
      @foreach ($errors->all() as $error)
        <p>{{ $error }}</p>
      @endforeach
    </div>
  @endif
</nav>
