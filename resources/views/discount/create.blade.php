
<script src="https://cdn.tailwindcss.com"></script>
<div class="text-center p-2 text-bold">
    <h1 class="font-bold text-2xl">ایجاد   غذای جدید</h1>
</div>

<form action="/food" method="post">
    @csrf

    {{--           	name	materials	price	image_path	cat_id	restaurant_id	 --}}
    <div class="bg-gray-300 p-3">
        <div class=" col-2 p-3 text-center gap-3 justify-center">

            <!-- name -->
            <div class="mt-4">
                <x-input-label for="name" :value="__('name')" />

                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required />

                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>
            <!-- materials -->
            <div class="mt-4">
                <x-input-label for="materials" :value="__('materials')" />

                <x-text-input id="materials" class="block mt-1 w-full" type="text" name="materials" :value="old('materials')" required />

                <x-input-error :messages="$errors->get('materials')" class="mt-2" />
            </div>

            <!-- price -->
            <div class="mt-4">
                <x-input-label for="price" :value="__('price')" />

                <x-text-input id="price" class="block mt-1 w-full" type="text" name="price" :value="old('price')" required />

                <x-input-error :messages="$errors->get('price')" class="mt-2" />
            </div>

            <!-- restaurant -->
            <div class="mt-4">
                <x-input-label for="rest_id" :value="__('نام رستوران')" />


                <select name="rest_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm
                                    rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700
                                    dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500
                                    dark:focus:border-blue-500 text-center">
                    @foreach (\App\Models\Restaurant::all() as $service)
                        <option value="{{$service['id']}}">
                            {{$service['name']}}
                        </option>
                    @endforeach
                </select>

                <x-input-error :messages="$errors->get('rest_id')" class="mt-2" />
            </div>

            <!-- category -->
            <div class="mt-4">
                <x-input-label for="cat_id" :value="__(' نوع غذا')" />

                <select name="cat_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm
                                    rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700
                                    dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500
                                    dark:focus:border-blue-500 text-center">

                    @foreach (\App\Models\FoodCategory::all() as $ser)
                        <option value="{{$ser['id']}}">
                            {{$ser['name']}}
                        </option>
                    @endforeach
                </select>

                <x-input-error :messages="$errors->get('cat_id')" class="mt-2" />
            </div>

        </div>

        <div class="mt-4 mb-5 text-center">
            <input type="submit" class=" blo bg-slate-700 text-white p-3 rounded-xl ">
        </div>
    </div>
</form>
