
<script src="https://cdn.tailwindcss.com"></script>



<div class="text-center mt-6    ">
    <table class="table-autow-full text-sm text-left text-gray-500 dark:text-gray-400 mx-auto shadow-xl">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>

            <th scope="col" class="py-3 px-6">#</th>
            <th scope="col" class="py-3 px-6">استان</th>
            <th scope="col" class="py-3 px-6">شهر</th>
            <th scope="col" class="py-3 px-6">خیابان</th>
            <th scope="col" class="py-3 px-6">کوچه</th>
            <th scope="col" class="py-3 px-6">بلاک</th>
            <th scope="col" class="py-3 px-6">توصیحات</th>
            <th scope="col" class="py-3 px-6">طول</th>
            <th scope="col" class="py-3 px-6">عرض</th>
            <th scope="col" class="py-3 px-6">*</th>
            <th scope="col" class="py-3 px-6">*</th>


        </tr>
        </thead>

        <tbody>

        </tbody>
        @foreach($address as $order)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <td class="py-4 px-6">
                    <a href="/userAddress/{{$order['id']}}"> {{$order['id']}} </a>
                </td>
                <td class="py-4 px-6">{{$order['state']}}</td>
                <td class="py-4 px-6">{{$order['city']}}</td>
                <td class="py-4 px-6">{{$order['avenue']}}</td>
                <td class="py-4 px-6">{{$order['street']}}</td>
                <td class="py-4 px-6">{{$order['plack']}}</td>
                <td class="py-4 px-6">{{$order['description']}}</td>
                <td class="py-4 px-6">{{$order['latitude']}}</td>
                <td class="py-4 px-6">{{$order['longitude']}}</td>

                <td class="py-4 px-6">
                    <a href="/userAddress/{{ $order['id'] }}/edit">ویرایش</a>
                </td>
                <td class="py-4 px-6 text-red-600 ">
                    <form action="/userAddress/{{ $order['id'] }}" method="post">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="Delete" class="cursor-pointer">
                    </form>
                </td>
            </tr>
        @endforeach
    </table>


    <div class="text-center p-3">
        <a href="/userAddress/create">
            <p class="font-bold text-xl">افزودن ادرس جدید برای خودم</p>
        </a>
    </div>

</div>
