
<script src="https://cdn.tailwindcss.com"></script>



<div class="text-center mt-6    ">
    <table class="table-autow-full text-sm text-left text-gray-500 dark:text-gray-400 mx-auto shadow-xl">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
            {{--            id	name	materials	price	image_path	cat_id	restaurant_id	created_at	updated_at--}}
            <th scope="col" class="py-3 px-6">#</th>
            <th scope="col" class="py-3 px-6">نام محصول</th>
            <th scope="col" class="py-3 px-6">قیمت</th>
            <th scope="col" class="py-3 px-6">مواد اولیه</th>
            <th scope="col" class="py-3 px-6">کتگوری</th>

        </tr>
        </thead>

        <tbody>

        </tbody>
        @foreach($foods as $order)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <td class="py-4 px-6">
                    <a > {{$order['id']}}</a>
                </td>
                <td class="py-4 px-6">{{$order['name']}}</td>
                <td class="py-4 px-6">{{$order['price']}}</td>
                <td class="py-4 px-6">{{$order['materials']}}</td>
                <td class="py-4 px-6">{{$order['cat_id']}}</td>



            </tr>
        @endforeach
    </table>


    <div class="text-center p-3">
        <a href="/dashboard">
            <p class="font-bold text-xl" >  back</p>
        </a>
    </div>

</div>
