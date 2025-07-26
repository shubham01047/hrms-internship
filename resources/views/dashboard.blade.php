<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>wait until someone assigns you a role or try to login after sometime</h1>
    <form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit"
        class="bg-red-600 hover:bg-red-700 text-white font-semibold py-2 px-4 rounded-full transition duration-300 ease-in-out">
        Logout
    </button>
</form>
</body>
</html>