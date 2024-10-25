<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,viewport-fit=cover">
    {!! \App\Http\Utils\Meta::render() !!}

    {{-- tailwind css --}}
    <title>{{ $title }}</title>
    @livewireStyles

    @if ($companyInfo->company_logo == 'logo.png')
        <link rel="shortcut icon" href="/assets/img/logo.png" type="image/x-icon">
    @else
        <link rel="shortcut icon" href="/assets/img/caa-logo.png" type="image/x-icon">
    @endif
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="/assets/css/atresnaStyle.css">
    {{-- add font awesome --}}
    <script src="https://kit.fontawesome.com/7a249e95a6.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" integrity="sha512-1cK78a1o+ht2JcaW6g8OXYwqpev9+6GqOkz9xmBN9iUUhIndKtxwILGWYOSibOKjLsEdjyjZvYDq/cZwNeak0w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body class="text-gray-800">

    <div class="w-full h-full m-0 font-primary flex flex-col gap-10">
        {{-- Navigasi Components --}}
        <section>
            @include('components.navigasi')
        </section>
        {{-- End Navigasi Components --}}
        @yield('konten')
        @include('components.footer')
        {{-- <div id="modalMenubar" class="hidden  hape:flex-col absolute h-screen backdrop-blur-md w-full  top-20">
            <div class="flex justify-end ">
                <div class=" w-2/3 h-screen bg-white flex flex-col gap-3 p-6 ">
                    <div class="flex justify-between">
                        <div class="text-xl font-semibold text-primary">
                            Menu Navigasi
                        </div>
                        <button onclick="closedModal()"
                            class=" font-semibold px-2 rounded-xl text-xl text-red-600 ">x</button>
                    </div>
                    <ul class="flex flex-col gap-4 text-lg font-semibold text-gray-600">
                        <li class=" @if (url()->current() == env('APP_URL')) font-bold text-primary @endif ">
                            <a href="/">Beranda</a>
                        </li>
                        <li>
                            <a class=" @if (url()->current() == env('APP_URL') . '/servis') font-bold text-primary @endif"
                                href="/servis">Servis</a>
                        </li>
                        <li>
                            <a class=" @if (url()->current() == env('APP_URL') . '/news') font-bold text-primary @endif"
                                href="/news">News</a>
                        </li>
                        <li>
                            <a class=" @if (url()->current() == env('APP_URL') . '/about') font-bold text-primary @endif"
                                href="/about">About</a>
                        </li>

                    </ul>

                </div>
            </div>
        </div> --}}
    </div>
    @livewireScripts
    <script src="/assets/js/atresnaScript.js"></script>
</body>

</html>
