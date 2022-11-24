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








<div class="text-center mt-6    ">
    <table class="table-auto text-sm text-left text-gray-500 dark:text-gray-400 mx-auto shadow-xl">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
            {{--            id	name	materials	price	image_path	cat_id	restaurant_id	created_at	updated_at--}}
            <th scope="col" class="py-3 px-6">#</th>
            <th scope="col" class="py-3 px-6">نام محصول</th>
            <th scope="col" class="py-3 px-6">قیمت</th>
            <th scope="col" class="py-3 px-6">مواد اولیه</th>
            <th scope="col" class="py-3 px-6">کتگوری</th>
            <th scope="col" class="py-3 px-6">ویرایش</th>
            <th scope="col" class="py-3 px-6">حذف</th>
        </tr>
        </thead>

        <tbody>

        </tbody>
        @foreach($foods as $order)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <td class="py-4 px-6">
                    <a href="/foodCategory/{{$order['id']}}"> {{$order['id']}}</a>
                </td>
                <td class="py-4 px-6">{{$order['name']}}</td>
                <td class="py-4 px-6">{{$order['price']}}</td>
                <td class="py-4 px-6">{{$order['materials']}}</td>
                <td class="py-4 px-6">{{$order['cat_id']}}</td>
                <td class="py-4 px-6">
                    <a href="/food/{{ $order['id'] }}/edit">ویرایش</a>
                </td>

                <td class="py-4 px-6 text-red-600 ">
                    <form action="/food/{{ $order['id'] }}" method="post">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="Delete" class="cursor-pointer">
                    </form>
                </td>
            </tr>
        @endforeach
    </table>


    <div class="text-center p-3">
        <a href="/food/create">
            <p class="font-bold text-xl">افزودن  غذا</p>
        </a>
    </div>

</div>
