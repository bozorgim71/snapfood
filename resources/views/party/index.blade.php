
<script src="https://cdn.tailwindcss.com"></script>

{{--id--}}
{{--start--}}
{{--end--}}
{{--date--}}
{{--food_id--}}
{{--created_at--}}
{{--updated_at--}}
{{--present--}}


<div class="text-center mt-6    ">
    <table class="table-autow-full text-sm text-left text-gray-500 dark:text-gray-400 mx-auto shadow-xl">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
{{--            id	name	materials	price	image_path	cat_id	restaurant_id	created_at	updated_at--}}
            <th scope="col" class="py-3 px-6">#</th>
            <th scope="col" class="py-3 px-6">   شروع  </th>
            <th scope="col" class="py-3 px-6">بایاان </th>
            <th scope="col" class="py-3 px-6">  تخفیف </th>
            <th scope="col" class="py-3 px-6">ایدی غذا</th>
            <th scope="col" class="py-3 px-6">*</th>
        </tr>
        </thead>

        <tbody>
        @foreach($party as $order)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <td class="py-4 px-6">
                    <a href="/foodCategory/{{$order['id']}}"> {{$order['id']}}</a>
                </td>
                <td class="py-4 px-6">{{$order['start']}}</td>
                <td class="py-4 px-6">{{$order['end']}}</td>
                <td class="py-4 px-6">{{$order['present']}}</td>
                <td class="py-4 px-6">{{$order['food_id']}}</td>

                <td class="py-4 px-6 text-red-600 ">
                    <form action="/party/{{ $order['id'] }}" method="post">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="Delete" class="cursor-pointer">
                    </form>
                </td>

            </tr>
        @endforeach
        </tbody>

    </table>
    <div class="text-center mt-6 ">
        <a href="/discount"> بازگشت   </a>
    </div>



</div>


