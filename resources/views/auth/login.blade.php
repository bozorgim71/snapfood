

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style>

    </style>

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
</head>
<body class="">


<form method="POST" action="{{ route('login') }}">
    @csrf
    <div class=" col-1 justify-center  form-group">
        <div class=" bg-gray-300 col-1 text-center mx-auto justify-center">

    <!-- Email UserAddress -->
            <div class="mt-4 mx-auto justify-center p-6">
        <x-input-label for="email" :value="__('Email')" />

        <x-text-input id="email" class=" mt-1 " type="email" name="email" :value="old('email')" required autofocus />

        <x-input-error :messages="$errors->get('email')" class="mt-2" />
      </div>

    <!-- Password -->
    <div class="mt-4 mx-auto justify-center p-6">
        <x-input-label for="password" :value="__('Password')" />

        <x-text-input id="password" class=" mt-1 "
                      type="password"
                      name="password"
                      required autocomplete="current-password" />

        <x-input-error :messages="$errors->get('password')" class="mt-2" />
    </div>

    <!-- Remember Me -->
    <div class="  mt-4 mx-auto justify-center p-6">
        <label for="remember_me" class="inline-flex items-center">
            <input id="remember_me" type="checkbox"
                   class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring
                   focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
            <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
        </label>
    </div>

    <div class=" mt-4 mx-auto justify-center p-6">
        @if (Route::has('password.request'))
            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                {{ __('Forgot your password?') }}
            </a>
        @endif

        <x-primary-button class=" mt-4 mx-auto justify-center p-6">
            {{ __('Log in') }}
        </x-primary-button>
    </div>
        </div>
    </div>

</form>

</body>
</html>
