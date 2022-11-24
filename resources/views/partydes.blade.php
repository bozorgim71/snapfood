
<script src="https://cdn.tailwindcss.com"></script>



<div class="text-center mt-6    ">
    <table class="table-autow-full text-sm text-left text-gray-500 dark:text-gray-400 mx-auto shadow-xl">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>

            <th scope="col" class="py-3 px-6"> #</th>
            <th scope="col" class="py-3 px-6"> start</th>
            <th scope="col" class="py-3 px-6"> end</th>
            <th scope="col" class="py-3 px-6">food_id</th>
            <th scope="col" class="py-3 px-6"> rest_id</th>

        </tr>
        </thead>

        <tbody>

        </tbody>
        @foreach($categories as $order)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <td class="py-4 px-6">
                    <a href="/foodCategory/{{$order['id']}}">مشاهده</a>
                </td>
                <td class="py-4 px-6">{{$order['start']}}</td>
                <td class="py-4 px-6">{{$order['end']}}</td>
                <td class="py-4 px-6">{{$order['user_id']}}</td>
                <td class="py-4 px-6">{{$order['food_id']}}</td>
            </tr>
        @endforeach
    </table>


    <div class="text-center p-3">
        <a href="/foodCategory/create">
            <p class="font-bold text-xl">افزودن دسته بندی جدید برای غذا</p>
        </a>
    </div>

</div>
