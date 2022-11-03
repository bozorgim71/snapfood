
<script src="https://cdn.tailwindcss.com"></script>
<div class="text-center p-2 text-bold">
    <h1 class="font-bold text-2xl">ایجاد کتگوری جدید برای رستوان ها</h1>
</div>

<form action="/restaurantCategory" method="post">
    @csrf
    <div class="bg-gray-300 p-3">
        <div class="flex p-3 text-center gap-3 justify-center">

            <!-- name -->
            <div class="mt-4">
                <x-input-label for="name" :value="__('name')" />

                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required />

                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>
            <!-- description -->
            <div class="mt-4">
                <x-input-label for="description" :value="__('description')" />

                <x-text-input id="description" class="block mt-1 w-full" type="text" name="description" :value="old('description')" required />

                <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div>

        </div>

        <div class="mt-4 mb-5 text-center">
            <input type="submit" class=" blo bg-slate-700 text-white p-3 rounded-xl ">
        </div>
    </div>
</form>
