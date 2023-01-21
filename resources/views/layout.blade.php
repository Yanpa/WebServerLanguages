<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="icon" href="images/favicon.ico" />
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
            integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
        />
        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        colors: {
                            laravel: "#A80DE4",
                        },
                    },
                },
            };
        </script>
        <title>WareHouse</title>
    </head>

    <body class="mb-48">
        <nav class="flex justify-between items-center mb-4">
            <a href="/">
                <div class="m-2 ml-4">
                    <img src="images/warehouse.png" alt="" class="logo"/>                    
                </div>
            </a>
            <ul class="flex space-x-6 mr-6 text-lg">
                @auth
                    <li>
                        <span>Welcome {{auth()->user()->username}}</span>
                    </li>
                    <li>
                        <a href="/products/create">Create Product</a>
                    </li>
                    <li>
                        <form class="inline" action="/logout" method="POST">
                            @csrf
                            <button type="submit">Logout</button>
                        </form>
                    </li>
                @else
                    <li>
                        <a href="/register" class="hover:text-laravel"> 
                            Register
                        </a>
                    </li>
                    <li>
                        <a href="/login" class="hover:text-laravel">
                            Login
                        </a>
                    </li>
                @endauth
            </ul>
        </nav>
    
        @yield('content')

    </body>
</html>