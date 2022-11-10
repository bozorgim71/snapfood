
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


        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class=" col-1 justify-center  form-group">
                <div class=" col-1 bg-gray-100 text-center mx-auto justify-center">

            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Name')" />

                <x-text-input id="name" class=" mt-1 " type="text" name="name" :value="old('name')" required autofocus />

                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Family -->
            <div>
                <x-input-label for="family" :value="__('Family')" />

                <x-text-input id="family" class="  mt-1  " type="text" name="family" :value="old('family')" required autofocus />

                <x-input-error :messages="$errors->get('family')" class="mt-2" />
            </div>

            <!-- Phone -->
            <div>
                <x-input-label for="phone" :value="__('Phone')" />

                <x-text-input id="phone" class="  mt-1  " type="text" name="phone" :value="old('phone')" required autofocus />

                <x-input-error :messages="$errors->get('phone')" class="mt-2" />
            </div>

            <!-- Email UserAddress -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" />

                <x-text-input id="email" class="  mt-1  " type="email" name="email" :value="old('email')" required />

                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input id="password" class="  mt-1 "
                                type="password"
                                name="password"
                                required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-text-input id="password_confirmation" class=" mt-1 "
                                type="password"
                                name="password_confirmation" required />

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <div class=" items-center mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-primary-button class="  items-center justify-cenetr mt-4 ">
                    {{ __('Register') }}
                </x-primary-button>
            </div>
                </div>
            </div>

        </form>


</body>
</html>
