<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
</head>
<style>
    /* Reset default browser styles */
* {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
}

/* Global styles */
body {
  font-family: 'figtree', sans-serif;
  background-color: #f2f2f2;
}

.container {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
}

.content {
  text-align: center;
  padding: 30px;
  background-color: #fff;
  border-radius: 10px;
  box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

.logo {
  width: 100px;
  margin-bottom: 20px;
}

.title {
  font-size: 24px;
  font-weight: 10px;
  margin-bottom: 10px;
}

.subtitle {
  font-size: 16px;
  color: #666;
  margin-bottom: 20px;
}

.links {
  display: flex;
  justify-content: center;
}

.welcome-page {
  margin-top: 20px;
}

.welcome {
  display: inline-block;
  padding: 10px 20px;
  background-color: #007bff;
  color: #fff;
  font-size: 14px;
  text-decoration: none;
  border-radius: 5px;
  margin-right: 10px;
  transition: background-color 0.3s;
}

.welcome:hover {
  background-color: #0056b3;
}

</style>
<body>
    <div class="container">
        <div class="content">
            <h1 class="title">Welcome @can('pemilik-only')<b>back!</b>@endcan</h1>
            <p class="subtitle">pharmacy backoffice application</p>
            <div class="links">
                @if (Route::has('login'))
                <div class="welcome-page">
                    @auth
                        <a href="{{ url('/home') }}" class="welcome">Go to Dasboard</a>
                    @else
                        <a href="{{ route('login') }}" class="welcome">Sign In</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="welcome">Sign Up</a>
                        @endif
                    @endauth
                </div>
                @endif
            </div>
        </div>
    </div>
</body>
</html>