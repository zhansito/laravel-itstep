<a href="{{ route("home") }}">home</a>
<a href="{{ route("info.about") }}">about</a>
<a href="{{ route("contacts.contacts") }}">contacts</a>
@guest
    <a href="/login">login</a>
@endguest