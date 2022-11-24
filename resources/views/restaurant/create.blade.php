
<script src="https://cdn.tailwindcss.com"></script>
<div class="text-center p-2 text-bold">
    <h1 class="font-bold text-2xl">نکمیل مشحصات رستوان  </h1>
</div>

<form action="/restaurant" method="post">
    @csrf

    <div class="bg-gray-300 p-3">
        <div class=" col-1  p-3 text-center gap-3 justify-center px-5 ">

        <!-- name -->
            <div class="mt-4 px-4 ">
                <x-input-label for="name" :value="__('name')" />

                <x-text-input id="name" class=" mt-1" type="text" name="name" :value="old('name')" required />

                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- description -->
            <div class="mt-4">
                <x-input-label for="description" :value="__('description')" />

                <x-text-input id="description" class=" mt-1 " type="text" name="description" :value="old('description')" required />

                <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div>

            <!-- address -->
            <div class="mt-4">
                <x-input-label for="address" :value="__('address')" />

                <x-text-input id="address" class=" mt-1 " type="text" name="address" :value="old('address')" required />

                <x-input-error :messages="$errors->get('address')" class="mt-2" />
            </div>

            <!-- phone -->
            <div class="mt-4">
                <x-input-label for="phone" :value="__('phone')" />

                <x-text-input id="phone" class=" mt-1 " type="text" name="phone" :value="old('phone')" required />

                <x-input-error :messages="$errors->get('phone')" class="mt-2" />
            </div>

            <!-- account -->
            <div class="mt-4">
                <x-input-label for="account" :value="__('account')" />

                <x-text-input id="account" class="  mt-1  " type="text" name="account" :value="old('account')" required />

                <x-input-error :messages="$errors->get('account')" class="mt-2" />
            </div>

            <!-- latitude -->
            <div class="mt-4">
                <x-input-label for="latitude" :value="__('latitude')" />

                <x-text-input id="latitude" class="  mt-1 " type="text" name="latitude" :value="old('latitude')" required />

                <x-input-error :messages="$errors->get('latitude')" class="mt-2" />
            </div>

            <!-- longitude -->
            <div class="mt-4">
                <x-input-label for="longitude" :value="__('longitude')" />

                <x-text-input id="longitude" class="  mt-1 " type="text" name="longitude" :value="old('longitude')" required />

                <x-input-error :messages="$errors->get('longitude')" class="mt-2" />
            </div>


            <!-- longitude -->
            <div class="mt-4">
                <x-input-label for="rest_id" :value="__('نوع رستوران')" />


                            <select name="rest_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm
                                    rounded-lg focus:ring-blue-500 focus:border-blue-500   p-2.5 dark:bg-gray-700
                                    dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500
                                    dark:focus:border-blue-500 text-center">


                                @foreach (\App\Models\RestaurantCategory::all() as $service)
                                <option value="{{$service['id']}}">
                                    {{$service['name']}}
                                </option>
                                @endforeach
                            </select>

                <x-input-error :messages="$errors->get('rest_id')" class="mt-2" />
            </div>




        </div>

        <div class="mt-4 mb-5 text-center">
            <input type="submit" class=" blo bg-slate-700 text-white p-3 rounded-xl ">
        </div>
    </div>
</form>
