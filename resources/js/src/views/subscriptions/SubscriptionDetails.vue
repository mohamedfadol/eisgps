<template>
    <div>
        <loading :active.sync="isLoad"
                 :background-color="loaderBgColor"
                 :color="loaderColor"
                 :height="loaderHeight"
                 :is-full-page="fullPage"
                 :loader="loaderType"
                 :width="loaderWidth"></loading>

        <div class="breadcrumb-holder container-fluid">
            <div class="row">
                <div class="col-sm-12 col-md-6 col-lg-6">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">{{ $trans('breadcrumb.dashboard') }}</a></li>
                        <li class="breadcrumb-item ">
                            <router-link :to="{name:'subscriptions-list'}" >
                                {{ $trans('menu.subscriptions-list') }}
                            </router-link>
                        </li>
                        <li class="breadcrumb-item active">{{ $trans('subscription.subscriptions-details') }}</li>
                    </ul>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-6 right">
                </div>
            </div>
        </div>
        <div class="add-new container px-5">
            <div class="your-sub">
                <Div class="row first-tab px-2 py-3">
                    <div class="col-md-3 logo-div text-center py-5">
                        <img src="/new/img/logo.png">
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex align-items-center mt-3">
                            <p class="subs-head subs-head-1 mb-0 px-3">Number of vehicles : </p>
                            <input type="text" class="input-sub2">
                        </div>

                        <div class="d-flex align-items-center mt-3">
                            <p class="subs-head subs-head-1 mb-0 px-3">Number of data strips : </p>
                            <input type="text" class="input-sub2">
                        </div>


                        <div class="d-flex align-items-center mt-3">
                            <p class="subs-head subs-head-1 mb-0 px-3">User Name: </p>
                            <input type="text" class="input-sub2">
                        </div>

                        <div class="d-flex align-items-center mt-3">
                            <p class="subs-head subs-head-1 mb-0 px-3">starting date: </p>
                            <input type="text" class="input-sub2">
                        </div>

                        <div class="d-flex align-items-center mt-3">
                            <p class="subs-head subs-head-1 mb-0 px-3">Expiry date : </p>
                            <input type="text" class="input-sub2">
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="d-flex flex-column mt-3 py-5">
                            <input type="text" class="input-sub2" placeholder="00:00 RS">
                            <p class="subs-head-1 mb-0 px-3 py-3 text-center">The price does not include tax </p>
                        </div>
                    </div>
                </Div>
            </div>




            <div class="   row mt-5 py-3  buttom-side">

                <div class="col-md-6">
                    <div class="row px-5 mb-4">
                        <p class="col-md-6 subs-head subs-head-1 mb-0 px-3 py-3">Price No. : </p>
                        <input type="text" class="input-sub2 col-md-6" placeholder="00:00 RS">
                    </div>
                    <div class="row px-5 mb-4">

                        <p class="col-md-6 subs-head subs-head-1 mb-0 px-3 py-3"> Value tax : </p>
                        <input type="text" class="input-sub2 col-md-6" placeholder="00.00 RS">
                    </div>
                    <div class="row px-5 mb-4">
                        <p class="col-md-6 subs-head subs-head-1 mb-0 px-3 py-3"> Total Price : </p>
                        <input type="text" class="input-sub2 col-md-6" placeholder="00.00 RS">
                    </div>



                </div>
                <div class="col-md-6 mb-5">
                    <div class=" d-flex align-items-center justify-content-around w-100 my-5 ">

                        <img src="/new/img/mada.png" class="icon-pay">
                        <img src="/new/img/visa.png" class="icon-pay2">
                        <img src="/new/img/mastercard.png" class="icon-pay3">
                    </div>

                    <div class="mt-3 px-5">
                        <p class="para subs-head text-center"> عملية الدفع لدينا آمنة و موثوقة ،حيث يتم تشفير معلوماتك الشخصية
                            وبيانات الدفع الخاصة بك بنظام تشفير موثوق كما اننا لا نقوم بتخزين أي معلومات تخص بطاقة الدفع على
                            النظام لدينا.
                        </p>
                    </div>



                </div>

                <div class="m-auto">
                    <button type="submit" class="btn-active text-center">الدفع</button>
                </div>
            </div>
        </div>
    </div>
</template>
