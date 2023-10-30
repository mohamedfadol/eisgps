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
                        <li class="breadcrumb-item active">{{ $trans('menu.road_services') }}</li>
                    </ul>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-6 right">
                </div>
            </div>
        </div>

        <section class="add-new str-add-new container px-5">
            <div class="row ">
                <div class="col-12">

                    <div class="container d-flex">
                        <ul class="tabs">

                            <li class="tab">

                                <input type="radio" name="tabs" checked="checked" id="tab1">
                                <label for="tab1">
                                    <i class="fas fa-first-aid"></i>
                                    <br>
                                    <p>{{$trans('roads.emergency')}}</p>

                                </label>


                                <div id="tab-content1" class="content pt-5">
                                    <div class="details-div str-details-div px-3">

                                        <!---****************-->
                                        <div class="input-container str-input-container d-flex align-items-center justify-content-between container2 my-2 mt-5">
                                            <div class="details-car px-4 py-2">
                                                <div class="badge d-flex justify-content-center text-black device-input">
                                                    <p class="m-0">محل الحربي يتم تصفيته</p>
                                                </div>
                                                <div class="under-badge date-timediv align-right ">
                                                    <p class="m-0"> المدينة المنورة</p>
                                                </div>
                                            </div>
                                            <div class="location-details  px-4">
                                                <a href="#" class="km">0.2 كم</a>

                                            </div>
                                        </div>
                                        <!---****************-->

                                        <!---****************-->
                                        <div class="input-container str-input-container d-flex align-items-center justify-content-between container2 my-2 mt-4">
                                            <div class="details-car px-4 py-2">
                                                <div class="badge d-flex justify-content-center text-black device-input">
                                                    <p class="m-0">محل الحربي يتم تصفيته</p>
                                                </div>
                                                <div class="under-badge date-timediv align-right ">
                                                    <p class="m-0"> المدينة المنورة</p>
                                                </div>
                                            </div>
                                            <div class="location-details  px-4">
                                                <a href="#" class="km">0.2 كم</a>


                                            </div>
                                        </div>
                                        <!---****************-->
                                        <!---****************-->
                                        <div class="input-container str-input-container d-flex align-items-center justify-content-between container2 my-2 mt-4">
                                            <div class="details-car px-4 py-2">
                                                <div class="badge d-flex justify-content-center text-black device-input">
                                                    <p class="m-0">محل الحربي يتم تصفيته</p>
                                                </div>
                                                <div class="under-badge date-timediv align-right ">
                                                    <p class="m-0"> المدينة المنورة</p>
                                                </div>
                                            </div>
                                            <div class="location-details  px-4">
                                                <a href="#" class="km">0.2 كم</a>


                                            </div>
                                        </div>
                                        <!---****************-->
                                        <!---****************-->
                                        <div class="input-container str-input-container d-flex align-items-center justify-content-between container2 my-2 mt-4" style="margin-bottom: 200px !important;">
                                            <div class="details-car px-4 py-2">
                                                <div class="badge d-flex justify-content-center text-black device-input">
                                                    <p class="m-0">محل الحربي يتم تصفيته</p>
                                                </div>
                                                <div class="under-badge date-timediv align-right ">
                                                    <p class="m-0"> المدينة المنورة</p>
                                                </div>
                                            </div>
                                            <div class="location-details  px-4">
                                                <a href="#" class="km">0.2 كم</a>

                                            </div>
                                        </div>
                                        <!---****************-->
                                    </div>
                                </div>
                            </li>

                            <!--********************************************************-->
                            <li class="tab">
                                <input type="radio" name="tabs" id="tab2">
                                <label for="tab2">

                                    <i class="fas fa-hospital"></i>
                                    <br>
                                    <p>{{$trans('roads.hospitals')}}</p>

                                </label>

                                <div id="tab-content2 " class="content pt-5">
                                    <div class="details-div str-details-div px-3">

                                        <!---****************-->
                                        <div class="input-container str-input-container d-flex align-items-center justify-content-between container2 my-2 mt-5">
                                            <div class="details-car px-4 py-2">
                                                <div class="badge d-flex justify-content-center text-black device-input">
                                                    <p class="m-0">محل الحربي يتم تصفيته</p>
                                                </div>
                                                <div class="under-badge date-timediv align-right ">
                                                    <p class="m-0"> المدينة المنورة</p>
                                                </div>
                                            </div>
                                            <div class="location-details  px-4">
                                                <a href="#" class="km">0.2 كم</a>

                                            </div>
                                        </div>
                                        <!---****************-->

                                        <!---****************-->
                                        <div class="input-container str-input-container d-flex align-items-center justify-content-between container2 my-2 mt-4">
                                            <div class="details-car px-4 py-2">
                                                <div class="badge d-flex justify-content-center text-black device-input">
                                                    <p class="m-0">محل الحربي يتم تصفيته</p>
                                                </div>
                                                <div class="under-badge date-timediv align-right ">
                                                    <p class="m-0"> المدينة المنورة</p>
                                                </div>
                                            </div>
                                            <div class="location-details  px-4">
                                                <a href="#" class="km">0.2 كم</a>


                                            </div>
                                        </div>
                                        <!---****************-->
                                        <!---****************-->
                                        <div class="input-container str-input-container d-flex align-items-center justify-content-between container2 my-2 mt-4">
                                            <div class="details-car px-4 py-2">
                                                <div class="badge d-flex justify-content-center text-black device-input">
                                                    <p class="m-0">محل الحربي يتم تصفيته</p>
                                                </div>
                                                <div class="under-badge date-timediv align-right ">
                                                    <p class="m-0"> المدينة المنورة</p>
                                                </div>
                                            </div>
                                            <div class="location-details  px-4">
                                                <a href="#" class="km">0.2 كم</a>


                                            </div>
                                        </div>
                                        <!---****************-->
                                        <!---****************-->
                                        <div class="input-container str-input-container d-flex align-items-center justify-content-between container2 my-2 mt-4" style="margin-bottom: 200px !important;">
                                            <div class="details-car px-4 py-2">
                                                <div class="badge d-flex justify-content-center text-black device-input">
                                                    <p class="m-0">محل الحربي يتم تصفيته</p>
                                                </div>
                                                <div class="under-badge date-timediv align-right ">
                                                    <p class="m-0"> المدينة المنورة</p>
                                                </div>
                                            </div>
                                            <div class="location-details  px-4">
                                                <a href="#" class="km">0.2 كم</a>

                                            </div>
                                        </div>
                                        <!---****************-->
                                    </div>
                                </div>
                            </li>
                            <!--********************************************************-->

                            <li class="tab">
                                <input type="radio" name="tabs" id="tab3">
                                <label for="tab3">

                                    <i class="fas fa-wrench"></i>
                                    <br>
                                    {{$trans('roads.maintenance_center')}}

                                </label>
                                <div id="tab-content3 " class="content pt-5">
                                    <div class="details-div str-details-div px-3">

                                        <!---****************-->
                                        <div class="input-container str-input-container d-flex align-items-center justify-content-between container2 my-2 mt-5">
                                            <div class="details-car px-4 py-2">
                                                <div class="badge d-flex justify-content-center text-black device-input">
                                                    <p class="m-0">محل الحربي يتم تصفيته</p>
                                                </div>
                                                <div class="under-badge date-timediv align-right ">
                                                    <p class="m-0"> المدينة المنورة</p>
                                                </div>
                                            </div>
                                            <div class="location-details  px-4">
                                                <a href="#" class="km">0.2 كم</a>

                                            </div>
                                        </div>
                                        <!---****************-->

                                        <!---****************-->
                                        <div class="input-container str-input-container d-flex align-items-center justify-content-between container2 my-2 mt-4">
                                            <div class="details-car px-4 py-2">
                                                <div class="badge d-flex justify-content-center text-black device-input">
                                                    <p class="m-0">محل الحربي يتم تصفيته</p>
                                                </div>
                                                <div class="under-badge date-timediv align-right ">
                                                    <p class="m-0"> المدينة المنورة</p>
                                                </div>
                                            </div>
                                            <div class="location-details  px-4">
                                                <a href="#" class="km">0.2 كم</a>


                                            </div>
                                        </div>
                                        <!---****************-->
                                        <!---****************-->
                                        <div class="input-container str-input-container d-flex align-items-center justify-content-between container2 my-2 mt-4">
                                            <div class="details-car px-4 py-2">
                                                <div class="badge d-flex justify-content-center text-black device-input">
                                                    <p class="m-0">محل الحربي يتم تصفيته</p>
                                                </div>
                                                <div class="under-badge date-timediv align-right ">
                                                    <p class="m-0"> المدينة المنورة</p>
                                                </div>
                                            </div>
                                            <div class="location-details  px-4">
                                                <a href="#" class="km">0.2 كم</a>


                                            </div>
                                        </div>
                                        <!---****************-->
                                        <!---****************-->
                                        <div class="input-container str-input-container d-flex align-items-center justify-content-between container2 my-2 mt-4" style="margin-bottom: 200px !important;">
                                            <div class="details-car px-4 py-2">
                                                <div class="badge d-flex justify-content-center text-black device-input">
                                                    <p class="m-0">محل الحربي يتم تصفيته</p>
                                                </div>
                                                <div class="under-badge date-timediv align-right ">
                                                    <p class="m-0"> المدينة المنورة</p>
                                                </div>
                                            </div>
                                            <div class="location-details  px-4">
                                                <a href="#" class="km">0.2 كم</a>

                                            </div>
                                        </div>
                                        <!---****************-->
                                    </div>
                                </div>
                            </li>

                        </ul>

                    </div>
                </div>
            </div>
            <div class="my-5"></div>
        </section>

    </div>
</template>
<style type="scss">
.badge{

    background: transparent  !important;
    box-shadow: none  !important;
}
</style>
