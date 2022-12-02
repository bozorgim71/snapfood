

<script src="https://cdn.tailwindcss.com"></script>

<div class="text-center mt-6    ">
    <table class="table-autow-full text-sm text-left text-gray-500 dark:text-gray-400 mx-auto shadow-xl">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>


{{--            id message answer status score restaurant_id user_id order_id--}}

            <th scope="col" class="py-3 px-6">#</th>
            <th scope="col" class="py-3 px-6">ایدی مشتری</th>
            <th scope="col" class="py-3 px-6">ایدی سفارش</th>
            <th scope="col" class="py-3 px-6">ایدی رستوران</th>
            <th scope="col" class="py-3 px-6">بیام</th>
            <th scope="col" class="py-3 px-6">باسخ</th>
            <th scope="col" class="py-3 px-6">وضعیت کامنت</th>
            <th scope="col" class="py-3 px-6">#</th>
</tr>
        </thead>

        <tbody>

        </tbody>
@foreach($comments as $order)
    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
        <td class="py-4 px-6">{{$order['id']}}</td>
        <td class="py-4 px-6">{{$order['user_id']}}</td>
        <td class="py-4 px-6">{{$order['order_id']}}</td>
        <td class="py-4 px-6">{{$order['restaurant_id']}}</td>
        <td class="py-4 px-6">{{$order['message']}}</td>
        <td class="py-4 px-6">
            {{$order['answer']}}
        </td>
        <td class="py-4 px-6">{{$order['status']}}</td>

        <td class="py-4 px-6 text-red-600 ">
            <form action="/comments" method="post">
                @csrf
                <div class="mt-4">
                    <input type="hidden" value={{ $order['id'] }}  name="order_id" >

                    <x-input-label for="status" :value="__('وضعتیت')" />

                    <select name="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm
                                    rounded-lg focus:ring-blue-500 focus:border-blue-500   p-2.5 dark:bg-gray-700
                                    dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500
                                    dark:focus:border-blue-500 text-center">

                        <option value="ordered">user_add</option>
                        <option value="sending">seller_commit</option>
                        <option value="received">seller_delete</option>

                    </select>

                    <input type="submit" value="change status" class="cursor-pointer">
            </form>
        </td>
    </tr>
    @endforeach
    </table>


    <div class="text-center p-3">
        <a href="/dashboard">
            <p class="font-bold text-xl">بازگشت</p>
        </a>
    </div>

    </div>
