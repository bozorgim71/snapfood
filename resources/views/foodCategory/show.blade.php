<script src="https://cdn.tailwindcss.com"></script>
<div class="text-center mt-6    ">
    <table class="table-autow-full text-sm text-left text-gray-500 dark:text-gray-400 mx-auto shadow-xl">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
            <th scope="col" class="py-3 px-6">#</th>
            <th scope="col" class="py-3 px-6">نام</th>
            <th scope="col" class="py-3 px-6">توضیحات مختصر </th>
        </tr>
        </thead>

        <tbody>

        </tbody>
        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
            <td class="py-4 px-6">
                {{$category['id']}}
            </td>
            <td class="py-4 px-6">{{$category['name']}}</td>
            <td class="py-4 px-6">{{$category['description']}}</td>
        </tr>
    </table>

</div>

<div class="text-center mt-3">
    <a class="text-bold text-xl" href="/foodCategory">بازگشت</a>
</div>
