<header class="flex flex-row justify-between items-center bg-col-header border p-2">
    <nav id="navbar" class="navbar">
        <x-logotipo class="text-white text-2xl font-bold" logowidth="w-6">
            {{ env('APP_LOGO_TEXT', 'Logotipo') }}
        </x-logotipo>

        {{-- Menu de navegação --}}
        <div id="main-menu" class="main-menu">
            <x-menu-item itemurl="/">Home</x-menu-item>
            <x-menu-item itemurl="/equipamento">{{__('equipamentos')}}</x-menu-item>
            <x-menu-item itemurl="/setor">{{__('setores')}}</x-menu-item>
        </div>

        <x-login-in-out />
    </nav>
</header>