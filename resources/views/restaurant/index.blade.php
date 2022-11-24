<script src="https://cdn.tailwindcss.com"></script>
<div class="text-center mt-6    ">
    <table class="table-autow-full text-sm text-left text-gray-500 dark:text-gray-400 mx-auto shadow-xl">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
            <th scope="col" class="py-3 px-6">#</th>
            <th scope="col" class="py-3 px-6">نام</th>
            <th scope="col" class="py-3 px-6">توضیحات مختصر </th>
            <th scope="col" class="py-3 px-6">شماره تماس</th>
            <th scope="col" class="py-3 px-6">شماره حساب</th>
            <th scope="col" class="py-3 px-6">آدرس</th>
            <th scope="col" class="py-3 px-6">طول جفرافیایی</th>
            <th scope="col" class="py-3 px-6">عرض جغرافیایی</th>
            <th scope="col" class="py-3 px-6"> ایدی کاربر</th>
            <th scope="col" class="py-3 px-6">*</th>
            <th scope="col" class="py-3 px-6">*</th>
            <th scope="col" class="py-3 px-6">*</th>
            <th scope="col" class="py-3 px-6">*</th>
        </tr>
        </thead>


        <tbody>
        @foreach($restaurants as $restaurant)
        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
            <td class="py-4 px-6">{{$restaurant['id']}}</td>
            <td class="py-4 px-6">{{$restaurant['name']}}</td>
            <td class="py-4 px-6">{{$restaurant['description']}}</td>
            <td class="py-4 px-6">{{$restaurant['phone']}}</td>
            <td class="py-4 px-6">{{$restaurant['account']}}</td>
            <td class="py-4 px-6">{{$restaurant['address']}}</td>
            <td class="py-4 px-6">{{$restaurant['latitude']}}</td>
            <td class="py-4 px-6">{{$restaurant['longitude']}}</td>
            <td class="py-4 px-6">{{$restaurant['user_id']}}</td>
            <td class="py-4 px-6">{{$restaurant['cat_id']}}</td>
            <td class="py-4 px-6">
                <a href="/restaurant/{{ $restaurant['id'] }}/edit">ویرایش</a>
            </td>
            <td class="py-4 px-6">
                <a href="/restaurant/{{ $restaurant['id'] }}">غذاها</a>
            </td>
            <td class="py-4 px-6 text-red-600 ">
                <form action="/restaurant/{{ $restaurant['id'] }}" method="post">
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="Delete" class="cursor-pointer">
                </form>
            </td>
            @endforeach
        </tr>
        </tbody>

    </table>

</div>

<div class="text-center mt-3">
    <a class="text-bold text-xl" href="/restaurant/create">افزودن رستوران</a>
</div>
<div class="text-center mt-3">
    <a class="text-bold text-xl" href="/dashboard/">بازگشت</a>
</div>
