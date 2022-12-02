
<script src="https://cdn.tailwindcss.com"></script>


<div class=" mt-4 mx-auto justify-center p-6">
{{--    @if (Route::has(''))--}}
        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('logout') }}">
            {{ __('logout') }}
{{--            {{ __('Forgot your password?') }}--}}

        </a>
{{--    @endif--}}

{{--    <x-primary-button class=" mt-4 mx-auto justify-center p-6">--}}
{{--        {{ __('Log in') }}--}}
{{--    </x-primary-button>--}}
</div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

{{--                new addresss   --}}


                <div class="p-6 bg-white border-b border-gray-200">

                    <h2>{{Auth::user()->name}}</h2>

                    <h2>{{Auth::user()->family}}</h2>
                    <h2>{{Auth::user()->id}}</h2>
{{--                    عملیاتی که ادمین می تواند انجام دهد   --}}
@can('admin-type')


                        {{--                    new category--}}


                        <div class="p-6 bg-white border-b border-gray-200">

                            <div class="text-center p-3">
                                <a href="/restaurantCategory">
                                    <p class="font-bold text-xl">دسته رستوران جدید</p>
                                </a>
                            </div>
                        </div>
                        {{--                    new food group --}}


                        <div class="p-6 bg-white border-b border-gray-200">

                            <div class="text-center p-3">
                                <a href="/foodCategory">
                                    <p class="font-bold text-xl">افزودن دسته غذا جدید</p>
                                </a>
                            </div>
                        </div>

                        <div class="p-6 bg-white border-b border-gray-200">

                            <div class="text-center p-3">
                                <a href="/allfood">
                                    <p class="font-bold text-xl">مشاهده غذا ها    </p>
                                </a>
                            </div>
                        </div>
                        <div class="p-6 bg-white border-b border-gray-200">

                            <div class="text-center p-3">
                                <a href="/allrest">
                                    <p class="font-bold text-xl">مشاهدهرستوران ها      </p>
                                </a>
                            </div>
                        </div>
                        <div class="p-6 bg-white border-b border-gray-200">

                            <div class="text-center p-3">
                                <a href="/fooddes">
                                    <p class="font-bold text-xl">مشاهد تخفیف ها      </p>
                                </a>
                            </div>
                        </div>


                        <div class="p-6 bg-white border-b border-gray-200">

                            <div class="text-center p-3">
                                <a href="/partydes">
                                    <p class="font-bold text-xl">مشاهد بارتی  ها      </p>
                                </a>
                            </div>
                        </div>



                        {{--                        عملیات های  فروشنده  --}}

                    @else


{{--    تکمیل مشخصات رستوران--}}

                        <div class="text-center p-3">
                            <a href="/restaurant">
                                <p class="font-bold text-xl">تکمیل مشخصات رستوران</p>
                            </a>
                        </div>


                        {{--    مشاهده لیست غذاهای رستوران --}}

                        <div class="text-center p-3">
                            <a href="/food">
                                <p class="font-bold text-xl">  مشاهده لیست غذاهای رستوران</p>
                            </a>
                        </div>
                        {{--                Discount --}}


                        <div class="p-6 bg-white border-b border-gray-200">

                            <div class="text-center p-3">
                                <a href="/discount">
                                    <p class="font-bold text-xl">مشاهده غذا ها  اعمال تخفیف ها </p>
                                </a>
                            </div>
                        </div>
{{--  orders --}}
                        <div class="p-6 bg-white border-b border-gray-200">

                            <div class="text-center p-3">
                                <a href="/orders">
                                    <p class="font-bold text-xl">مشاهده سفارشات </p>
                                </a>
                            </div>
                        </div>

{{--    comment --}}
                        <div class="p-6 bg-white border-b border-gray-200">

                            <div class="text-center p-3">
                                <a href="/comments">
                                    <p class="font-bold text-xl">مشاهده کامنت ها </p>
                                </a>
                            </div>
                        </div>
                    @endcan


            </div>
        </div>
    </div>



