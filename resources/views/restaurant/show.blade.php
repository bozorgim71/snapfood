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
            <th scope="col" class="py-3 px-6">ایدی دسته بندی</th>
        </tr>
        </thead>

        <tbody>

        </tbody>
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
        </tr>
    </table>

</div>

<div class="text-center mt-3">
    <a class="text-bold text-xl" href="/restaurant">بازگشت</a>
</div>
