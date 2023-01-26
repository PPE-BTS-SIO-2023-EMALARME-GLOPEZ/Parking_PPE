<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- FontAwesome Icons -->
    <script src="https://kit.fontawesome.com/69c46c92d5.js" crossorigin="anonymous"></script>
    <!-- Tailwind CSS -->
    @vite('resources/css/app.css')
    <title>Parking</title>
</head>

<body>
    <div class="h-screen w-screen sm:w-1/6  px-6 py-10 text-white bg-black flex flex-col fixed z-0">

        <!-- Navbar logo -->
        <div class="h-8 w-full text-center text-2xl lg:text-lg">
            <i class=" fa-solid fa-car-side"></i>
            <span class="ml-1">Parking</span>
        </div>

        <!-- User profile card -->
        <div class="w-full h-fit my-11 py-3 flex flex-col justify-center align-middle items-center">
            <!-- Profile pic -->
            <div class="w-16 h-16 mb-3 bg-blue-500 flex flex-col justify-end align-bottom items-end rounded-full">
                <!-- Edit badge -->
                <div class="flex flex-row justify-center items-center">
                    <i class="fa-solid fa-pen w-fit h-fit text-xs bg-orange-600 rounded-full"></i>
                </div>
            </div>
            <!-- Profile name -->
            <div class="text-lg lg:text-base text-white text-center">
                <!-- add blade user full name -->
                <span class="">Lopez</span>
                <span>Gabriel</span>
            </div>
        </div>

        <!-- Nav links -->
        <nav class="w-full h-fit xl:px-2 lg:text-sm text-base flex row xl:justify-start justify-center">
            <ul class="text-center">
                <li class="py-2">Dashboard</li>
                <li class="py-2"><span>Folders</span></li>
                <li class="py-2"><span>Favorites</span></li>
                <li class="py-2"><span>Settings</span></li>
            </ul>
        </nav>

        <!-- Déconnexion -->
        <div class="w-full h-full grow text-xs align-end flex flex-col justify-end">
            <button class="w-full text-center">
                <i class="fa-solid fa-door-open visible"></i>
                <span>Déconnexion</span>
            </button>
        </div>
    </div>
</body>

</html>