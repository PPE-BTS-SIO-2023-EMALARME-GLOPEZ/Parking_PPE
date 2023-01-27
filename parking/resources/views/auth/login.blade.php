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
    <title>Login</title>
</head>

<body class="bg-beige h-screen w-screen flex flex-col justify-center align-middle items-center">

    <div class="h-2/5 w-2/6 p-6 text-white bg-lavande rounded-3xl shadow-lg">
        <h2>Connexion</h2>
        <form action="{{ route('authenticate') }}" method="post" class="h-full w-full flex flex-col justify-around ">
            @csrf
            <fieldset>
                <label for="username">Nom d'utilisateur</label>
                <input type="text" name="username" class="w-full text-black rounded-md">
            </fieldset>
            <fieldset>
                <label for="password">Mot de passe</label><br>
                <input type="password" name="password" class="w-full text-black rounded-md">
            </fieldset>
            <button type="submit">Se connecter</button>
        </form>

        <!-- toast error -->
        @foreach ($errors->all() as $error)
        <div class="text-black">
            {{ $error}}
        </div>
        @endforeach
    </div>

</body>

</html>