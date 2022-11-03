 <script src="https://cdn.tailwindcss.com"></script>

<div class="text-center p-2 text-bold">
    <h1 class="font-bold text-2xl"> edit your address </h1>
</div>


{{-- --}}

 <form action="/userAddress/{{ $address['id'] }}" method="post">
     @csrf
     @method('PATCH')

     <div class="bg-gray-300 p-3">
         <div class="col-2 p-3 text-center gap-3 justify-center">


             <div class="mt-4">
                 <label for="">طول </label>
                 <input name="latitude" type="text" class="p-3" value="{{ $address['latitude'] }}">
             </div>

              <div class="mt-4">
                 <label for=""> عرض  </label>
                 <input name="longitude" type="text" class="p-3" value="{{ $address['longitude'] }}">

             </div>


             <div class="mt-4">
                 <label for=""> استان </label>
                 <input name="state" type="text" class="p-3" value="{{ $address['state'] }}">

             </div>

             <div class="mt-4">
                 <label for="">   شهر </label>
                 <input name="city" type="text" class="p-3" value="{{ $address['city'] }}">
             </div>

             <div class="mt-4">
                 <label for="">خیابان </label>
                 <input name="avenue" type="text" class="p-3" value="{{ $address['avenue'] }}">

             </div>

             <div class="mt-4">
                 <label for=""> کوچه </label>
                 <input name="street" type="text" class="p-3" value="{{ $address['street'] }}">
             </div>

             <div class="mt-4">
                 <label for="">بلاک </label>
                 <input name="pelack" type="text" class="p-3" value="{{ $address['plack'] }}">

             </div>
             <div class="mt-4">
                 <label for=""> توضیحات </label>
                 <input name="description" type="text" class="p-3" value="{{ $address['description'] }}">
             </div>

         </div>

         <div class="mt-4 mb-5 text-center">
             <input type="submit" class=" blo bg-slate-700 text-white p-3 rounded-xl">

         </div>
     </div>
 </form>
{{-- --}}
