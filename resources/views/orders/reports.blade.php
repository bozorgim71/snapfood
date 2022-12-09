
<script src="https://cdn.tailwindcss.com"></script>

<div class="text-center mt-6    ">
    <table class="table-autow-full text-sm text-left text-gray-500 dark:text-gray-400 mx-auto shadow-xl">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>

            <th scope="col" class="py-3 px-6">#</th>
            <th scope="col" class="py-3 px-6">ایدی مشتری</th>

            <th scope="col" class="py-3 px-6">کد سفارش</th>
            <th scope="col" class="py-3 px-6">ایدی رستوران</th>
            <th scope="col" class="py-3 px-6">سفارشات</th>
            <th scope="col" class="py-3 px-6">وضعیت سفارش </th>
        </tr>
        </thead>

        <tbody>

        </tbody>
        @foreach($orders as $order)
            @if($order['status']=='received')
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <td class="py-4 px-6">{{$order['id']}}</td>
                <td class="py-4 px-6">{{$order['user_id']}}</td>
                <td class="py-4 px-6">{{$order['code']}}</td>
                <td class="py-4 px-6">{{$order['restaurant_id']}}</td>
                <td class="py-4 px-6">
                    {{$order['foods_name']}}
                </td>
                <td class="py-4 px-6">{{$order['status']}}</td>


            </tr>
            @endif
        @endforeach
    </table>


    <div class="text-center p-3">

        <p class="font-bold text-xl">درآمد کل رستوران</p>
        <p class="font-bold text-xl"> {{$income}} </p>

    </div>

    <div class="text-center p-3">

        <p class="font-bold text-xl">تعداد کل سفارش ها</p>
        <p class="font-bold text-xl"> {{$totalOrder}} </p>

    </div>
    <div class="text-center p-3">
        <a href="/dashboard">
            <p class="font-bold text-xl">بازگشت</p>
        </a>
    </div>

</div>
