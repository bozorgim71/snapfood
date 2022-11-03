
<script src="https://cdn.tailwindcss.com"></script>



<div class="text-center mt-6    ">
    <table class="table-autow-full text-sm text-left text-gray-500 dark:text-gray-400 mx-auto shadow-xl">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>

            <th scope="col" class="py-3 px-6">مشاهده</th>
            <th scope="col" class="py-3 px-6">نام دسته بندی</th>
            <th scope="col" class="py-3 px-6">توضیحات دسته بندی</th>

            <th scope="col" class="py-3 px-6">*</th>
            <th scope="col" class="py-3 px-6">*</th>
        </tr>
        </thead>

        <tbody>

        </tbody>
        @foreach($categories as $order)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <td class="py-4 px-6">
                    <a href="/restaurantCategory/{{$order['id']}}">مشاهده</a>
                </td>
                <td class="py-4 px-6">{{$order['name']}}</td>
                <td class="py-4 px-6">{{$order['description']}}</td>

                <td class="py-4 px-6">
                    <a href="/restaurantCategory/{{ $order['id'] }}/edit">ویرایش</a>
                </td>
                <td class="py-4 px-6 text-red-600 ">
                    <form action="/restaurantCategory/{{ $order['id'] }}" method="post">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="Delete" class="cursor-pointer">
                    </form>
                </td>
            </tr>
        @endforeach
    </table>


    <div class="text-center p-3">
        <a href="/restaurantCategory/create">
            <p class="font-bold text-xl">افزودن دسته بندی جدید برای رستوران</p>
        </a>
    </div>

</div>
