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
                        <li class="breadcrumb-item active">{{ $trans('events.title') }}</li>
                    </ul>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-6 right">
                </div>
            </div>
        </div>

        <div class="notification-center">
            <div class="hero row mx-3">
                <div class="col-md-12 contant d-flex  notication-body pt-3 px-3 text-secondary">
                    <div>
                        <img src="/new/img/car.png" alt="..." class="mr-3 mx-2">
                    </div>

                    <div class="mr-auto">
                        <p>Increase the high speed of the "Camry"</p>
                        <p class="fw-bold text-primary">2 hours ago </p>
                    </div>

                    <div>
                        <span class="far fa-times-circle pt-1 text-secondary hov float-right"></span>
                    </div>

                </div>
                <!---******************************-->
                <div class="col-md-12 contant d-flex  notication-body pt-3 px-3 text-secondary">
                    <div>
                        <img src="/new/img/car.png" alt="..." class="mr-3 mx-2">
                    </div>

                    <div class="mr-auto">
                        <p>Increase the high speed of the "Camry"</p>
                        <p class="fw-bold text-primary">2 hours ago </p>
                    </div>

                    <div>
                        <span class="far fa-times-circle pt-1 text-secondary hov float-right"></span>
                    </div>

                </div>
                <!---******************************-->

                <div class="col-md-12 contant d-flex  notication-body pt-3 px-3 text-secondary">
                    <div>
                        <img src="/new/img/car.png" alt="..." class="mr-3 mx-2">
                    </div>

                    <div class="mr-auto">
                        <p>Increase the high speed of the "Camry"</p>
                        <p class="fw-bold text-primary">2 hours ago </p>
                    </div>

                    <div>
                        <span class="far fa-times-circle pt-1 text-secondary hov float-right"></span>
                    </div>

                </div>
                <!---******************************-->

                <div class="col-md-12 contant d-flex  notication-body pt-3 px-3 text-secondary">
                    <div>
                        <img src="/new/img/car.png" alt="..." class="mr-3 mx-2">
                    </div>

                    <div class="mr-auto">
                        <p>Increase the high speed of the "Camry"</p>
                        <p class="fw-bold text-primary">2 hours ago </p>
                    </div>

                    <div>
                        <span class="far fa-times-circle pt-1 text-secondary hov float-right"></span>
                    </div>

                </div>
                <!---******************************-->
            </div>
        </div>
    </div>
</template>
