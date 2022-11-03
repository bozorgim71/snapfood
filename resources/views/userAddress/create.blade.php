<script src="https://cdn.tailwindcss.com"></script>

<div class="text-center p-2 text-bold">
    <h1 class="font-bold text-2xl">Create Your new Book</h1>
</div>

<form action="/userAddress" method="post">
    @csrf
    <div class="bg-gray-300 p-3">
        <div class="flex p-3 text-center gap-3 justify-center">

            <!-- latitude -->
            <div class="mt-4">
                <x-input-label for="latitude" :value="__('latitude')" />

                <x-text-input id="latitude" class="block mt-1 w-full" type="text" name="latitude" :value="old('latitude')" required />

                <x-input-error :messages="$errors->get('latitude')" class="mt-2" />
            </div>
            <!-- longitude -->
            <div class="mt-4">
                <x-input-label for="longitude" :value="__('longitude')" />

                <x-text-input id="longitude" class="block mt-1 w-full" type="text" name="longitude" :value="old('longitude')" required />

                <x-input-error :messages="$errors->get('longitude')" class="mt-2" />
            </div>
            <!-- state -->
            <div class="mt-4">
                <x-input-label for="state" :value="__('state')" />

                <x-text-input id="state" class="block mt-1 w-full" type="text" name="state" :value="old('state')" required />

                <x-input-error :messages="$errors->get('state')" class="mt-2" />
            </div>

            <!-- city -->
            <div class="mt-4">
                <x-input-label for="city" :value="__('city')" />

                <x-text-input id="city" class="block mt-1 w-full" type="text" name="city" :value="old('city')" required />

                <x-input-error :messages="$errors->get('city')" class="mt-2" />
            </div>

            <!-- avenue -->
            <div class="mt-4">
                <x-input-label for="avenue" :value="__('avenue')" />

                <x-text-input id="avenue" class="block mt-1 w-full" type="text" name="avenue" :value="old('avenue')" required />

                <x-input-error :messages="$errors->get('avenue')" class="mt-2" />
            </div>

            <!-- street -->
            <div class="mt-4">
                <x-input-label for="street" :value="__('street')" />

                <x-text-input id="street" class="block mt-1 w-full" type="text" name="street" :value="old('street')" required />

                <x-input-error :messages="$errors->get('street')" class="mt-2" />
            </div>

            <!-- pelack -->
            <div class="mt-4">
                <x-input-label for="pelack" :value="__('pelack')" />

                <x-text-input id="pelack" class="block mt-1 w-full" type="text" name="pelack" :value="old('pelack')" required />

                <x-input-error :messages="$errors->get('pelack')" class="mt-2" />
            </div>

            <!-- description -->
            <div class="mt-4">
                <x-input-label for="description" :value="__('description')" />

                <x-text-input id="description" class="block mt-1 w-full" type="text" name="description" :value="old('description')" required />

                <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div>
        </div>

        <div class="mt-4 mb-5 text-center">
            <input type="submit" class=" blo bg-slate-700 text-white p-3 rounded-xl">
        </div>
    </div>
</form>
