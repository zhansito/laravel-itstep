<div class="w-full bg-indigo-700">
    <div class="container mx-auto py-4 text-white flex items-center justify-between text-md">
        <div class="flex">
            <div class="px-4">
                <a href='{{ route("home") }}'>Главная</a>
            </div>
            <div class="px-4">
                <a href='{{ route("info.about") }}'>О проекте</a>
            </div>
        </div>
        <div>
            @guest
                <div class="px-4">
                    <a href='/login'>Войти</a>
                </div>
            @endguest
            @auth
                <div class="px-4">
                    <a href='/logout'>Выйти</a>
                </div>
            @endauth
        </div>
    </div>
</div>