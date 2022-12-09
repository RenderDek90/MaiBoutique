<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Load...</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        {{-- Styles --}}
        <link rel="stylesheet" href="loading.css">

        {{-- Tailwind --}}
        <script src="https://cdn.tailwindcss.com"></script>

    </head>
    <body>
        <div class="bg-gray-900 h-screen w-screen content-center body-load z-10">

            <div class="text-white h-screen flex flex-col items-center justify-center">
                <div class="flex">
                    <div>
                        <div class="lds-ring"><div></div><div></div><div></div><div></div></div>
                    </div>
                    <div>
                        <div><p class="text-6xl title-load">MaiBoutique</p></div>
                        <div><p class="loading loading-animation">Loading...</p></div>
                    </div>
                </div>
            </div>
        </div>
    </body>

</html>
