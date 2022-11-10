
<script src="https://cdn.tailwindcss.com"></script>
<div class="text-center p-2 text-bold">
    <h1 class="font-bold text-2xl">ایجاد   غذای جدید</h1>
</div>

{{--id	name	description	present	food_id	created_at	updated_at--}}

<form action="/discount/{{ $food['id'] }}" method="post">
    @csrf
    @method('PATCH')
 <div class="bg-gray-300 p-3">
        <div class=" col-2 p-3 text-center gap-3 justify-center">

            <!-- food_id -->
            <div class="mt-4">
                <label for="">توضیحات </label>
                <input name="food_id" type="hidden" class="p-3" value="{{ $food['id'] }}">
            </div>

            <!-- name -->
            <div class="mt-4">
                <label for="">نام تخفیف </label>
                <input name="name" type="text" class="p-3" value="name">
            </div>

            <!-- description -->
            <div class="mt-4">
                <label for="">توضیحات </label>
                <input name="description" type="text" class="p-3" value="description">
            </div>

            <!-- present -->

            <div class="mt-4">
                <label for="">  درصد تخفیف </label>
                <input name="present" type="text" class="p-3" value="0">
            </div>

        </div>

        <div class="mt-4 mb-5 text-center">
            <input type="submit" class=" blo bg-slate-700 text-white p-3 rounded-xl ">
        </div>
    </div>
</form>



