<script src="https://cdn.tailwindcss.com"></script>
<div class="text-center p-5">
    <p> <span class="font-bold">{{ $category['name'] }}</span></p>
</div>

<form action="/foodCategory/{{ $category['id'] }}" method="post">
    @csrf
    @method('PATCH')
    <div class="bg-gray-300 p-3">
        <div class="flex p-3 text-center gap-3 justify-center">

            <label for="">نام سرویس</label>
            <input name="name" type="text" class="p-3" value="{{ $category['name'] }}">

            <label for="">هزینه سرویس</label>
            <input name="cost" type="text" class="p-3" value="{{ $category['description'] }}">

        </div>

        <div class="mt-4 mb-5 text-center">
            <input type="submit" class=" blo bg-slate-700 text-white p-3 rounded-xl">

        </div>
    </div>
</form>

