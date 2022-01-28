<nav>
  @if (session('message'))
    <p class="message" style="color: green;white-space: pre-wrap;word-wrap: break-word;">{{ session('message') }}</p>
  @endif
</nav>
