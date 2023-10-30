<template>
    <nav class="side-navbar">
        <!-- Sidebar Header-->
        <div class="py-4 px-3 mb-4 bg-custom">
            <div class="media d-flex align-items-center flex-column justify-content-around">
                <img src="/new/img/logo.png" alt="EISGPS" style="width:75px" >
                <div class="media-body">
                    <h4 class="m-0 mt-2 text-white">{{name}}</h4>
                </div>
            </div>
        </div>


        <!-- Sidebar Navidation Menus-->
        <ul class="list-unstyled">
            <li :class="activeClass('home')">
                <router-link :to="{name:'home'}">
                    <i class="fa fa-home text-dark"></i>{{ $trans('menu.dashboard') }}
                </router-link>
            </li>

            <li :class="mainActiveClass(1)"><a href="#" class=" text-dark" data-toggle="collapse" data-target="#submenu-app">
                <i class="fa fa-list text-dark"></i>{{$trans('menu.system_list')}}</a>

                <div class="multi-level collapse text-dark" role="list" id="submenu-app" aria-expanded="false">
                    <ul class="flex-column nav">
                        <li :class="activeClass('users-list')">
                            <router-link :to="{name:'users-list'}" class="nav-link">
                                <i aria-hidden="true" class="fa fa-users text-dark"></i>
                                <span class="text-dark">{{ $trans('menu.users_list') }}</span>
                            </router-link>
                        </li>

                        <li :class="activeClass('facilities-list')">
                            <router-link :to="{name:'facilities-list'}" class="nav-link">
                                <i class="fa fa-industry text-dark"></i>
                                <span class="text-dark">{{$trans('menu.facilities-list')}}</span>
                            </router-link>
                        </li>

                        <li :class="activeClass('partners-list')">
                            <router-link :to="{name:'partners-list'}" class="nav-link">
                                <i class="fas fa-user-friends text-dark"></i>
                                <span class="text-dark">{{$trans('menu.partners_list')}}</span>
                            </router-link>
                        </li>

                        <li :class="activeClass('customers-list')">
                            <router-link :to="{name:'customers-list'}" class="nav-link">
                                <i class="fa fa-industry text-dark"></i>
                                <span class="text-dark">{{$trans('menu.customers_list')}}</span>
                            </router-link>
                        </li>

                        <li :class="activeClass('device-list')">
                            <router-link :to="{name:'device-list'}" class="nav-link">
                                <i class="fas fa-plus text-dark"></i>
                                <span class="text-dark">{{ $trans('menu.devices_list') }}</span>
                            </router-link>
                        </li>

                        <li :class="activeClass('cars-list')">
                            <router-link :to="{name:'cars-list'}" class="nav-link">
                                <i class="fas fa-car text-dark"></i>
                                <span class="text-dark">{{ $trans('menu.cars_list') }}</span>
                            </router-link>
                        </li>

                        <li :class="activeClass('drivers-list')">
                            <router-link :to="{name:'drivers-list'}" class="nav-link">
                                <i class="fa fa-id-card text-dark"></i>
                                <span class="text-dark">{{ $trans('menu.drivers-list') }}</span>
                            </router-link>
                        </li>

                        <li :class="activeClass('sim-cards')">
                            <router-link :to="{name:'sim-cards'}" class="nav-link">
                                <i class="fa fa-credit-card text-dark"></i>
                                <span class="text-dark">{{$trans('menu.sim-cards')}}</span>
                            </router-link>
                        </li>

                        <li :class="activeClass('branches-list')">
                            <router-link :to="{name:'branches-list'}" class="nav-link">
                                <i class="fas fa-code-branch text-dark"></i>
                                <span class="text-dark">{{$trans('menu.branches_list')}}</span>
                            </router-link>
                        </li>


                        <li :class="activeClass('commands-list')">
                            <router-link :to="{name:'commands-list'}" class="nav-link">
                                <i class="fas fa-link text-dark"></i>
                                <span class="text-dark">{{$trans('menu.commands_list')}}</span>
                            </router-link>
                        </li>

                        <li :class="activeClass('wasl-list')">
                            <router-link :to="{name:'wasl-list'}" class="nav-link">
                                <i class="fa fa-list-ol text-dark"></i>
                                <span class="text-dark">{{$trans('menu.wasl_list')}}</span>
                            </router-link>
                        </li>
                    </ul>
                </div>
            </li>


            <li :class="activeClass('add-new')">
                <router-link :to="{name:'add-new'}">
                    <i aria-hidden="true" class="fa fa-plus text-dark"></i>{{$trans('menu.add_new')}}
                </router-link>
            </li>
            <li :class="mainActiveClass(3)">
                <router-link :to="{name:'tracking-service'}" class="nav-link">
                    <i class="fas fa-car text-dark"></i>
                    <span class="text-dark">{{$trans('menu.register_in_wasl')}}</span>
                </router-link>
            </li>

            <li :class="activeClass('report')">
                <router-link :to="{name:'report'}" class="nav-link">
                    <i class="fa fa-chart-bar text-dark"></i>{{$trans('menu.statistics')}}
                </router-link>
            </li>
            <li :class="activeClass('geo-regions')">
                <router-link :to="{name:'geo-regions'}" class="nav-link">
                    <i class="fa fa-compass text-dark"></i>{{$trans('menu.geofences_list')}}
                </router-link>
            </li>
            <li :class="activeClass('subscriptions-list')">
                <router-link :to="{name:'subscriptions-list'}" class="nav-link">
                    <i class="fa fa-tasks text-dark"></i>{{$trans('menu.subscriptions-list')}}
                </router-link>
            </li>
            <li :class="activeClass('road-services')">
                <router-link :to="{name:'road-services'}" class="nav-link">
                    <i class="fa fa-road text-dark" ></i>{{$trans('menu.road_services')}}
                </router-link>
            </li>
            <li :class="activeClass('report')">
                <router-link :to="{name:'report'}" class="nav-link">
                    <i class="fa fa-file-alt text-dark" ></i>
                    {{$trans('menu.report')}}
<!--                    TODO Add this page-->
                </router-link>
            </li>
            <li :class="activeClass('contact-us')">
                <router-link :to="{name:'contact-us'}" class="nav-link">
                    <i class="fa fa-question-circle  text-dark" ></i>{{$trans('menu.support')}}
                </router-link>
            </li>
            <li :class="activeClass('about-us')">
                <router-link :to="{name:'about-us'}" class="nav-link">
                    <i class="fa fa-info-circle text-dark" ></i>{{$trans('menu.about_us')}}
                </router-link>
            </li>
            <!-- <li><a href="Backup.html"><img src="/new/img/Icon feather-log-out.svg" alt="" class="mar">خروج </a></li>-->
        </ul></nav>
    <!--    <nav id="sidebarMenu" class="sidebar d-md-block bg-primary text-white collapse" data-simplebar>-->
    <!--        <div class="sidebar-inner px-4 pt-3">-->
    <!--            <div-->
    <!--                class="user-card d-flex d-md-none align-items-center justify-content-between justify-content-md-center pb-4">-->
    <!--                <div class="d-flex align-items-center">-->

    <!--                    <div class="d-block">-->
    <!--                        <h2 class="h6">{{$trans('main.hi')}}, {{ name }}</h2>-->
    <!--                        <a @click="logout" class="btn btn-secondary text-dark btn-xs"><span class="mr-2"><span-->
    <!--                            class="fas fa-sign-out-alt"></span></span>{{ $trans('menu.logout') }}</a>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--                <div class="collapse-close d-md-none">-->
    <!--                    <a href="#sidebarMenu" class="fas fa-times" data-toggle="collapse"-->
    <!--                       data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="true"-->
    <!--                       aria-label="Toggle navigation"></a>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--            <ul class="nav flex-column pt-3 pt-md-0">-->
    <!--                <li :class="activeClass('home')">-->
    <!--                    <router-link :to="{name:'home'}">-->
    <!--          <span class="nav-link  collapsed  d-flex justify-content-between align-items-center" data-toggle="collapse"-->
    <!--                data-target="#submenu-dashboard">-->
    <!--            <span>-->
    <!--              <span class="sidebar-icon"><span class="fas fa-chart-pie"></span></span>-->
    <!--              <span class="sidebar-text">{{ $trans('menu.dashboard') }}</span>-->
    <!--            </span>-->
    <!--          </span>-->
    <!--                    </router-link>-->
    <!--                </li>-->

    <!--                <li :class="mainActiveClass(1)">-->
    <!--               <span  class="nav-link  collapsed  d-flex justify-content-between align-items-center" data-toggle="collapse" data-target="#submenu-AddNew">-->
    <!--            <span>-->
    <!--              <span class="sidebar-icon"><span class="fa fa-list" aria-hidden="true"></span></span>-->
    <!--              <span  class="sidebar-text">{{$trans('menu.system_list')}}</span>-->
    <!--            </span>-->
    <!--            <span class="link-arrow"><span class="fas fa-chevron-right"></span></span>-->
    <!--          </span>-->
    <!--                    <div  class="multi-level collapse " role="list" id="submenu-AddNew" aria-expanded="false">-->
    <!--                        <ul  class="flex-column nav">-->
    <!--                            <li :class="activeClass('users-list')">-->
    <!--                                <router-link :to="{name:'users-list'}" class="nav-link">-->
    <!--                                    <span class="sidebar-icon"><span class="fa fa-users" aria-hidden="true"></span></span>-->
    <!--                                    <span class="sidebar-text">{{ $trans('menu.users_list') }}</span>-->
    <!--                                </router-link>-->
    <!--                            </li>-->
    <!--                            <li class="nav-item  ">-->
    <!--                                <router-link :to="{name:'facilities-list'}" class="nav-link">-->
    <!--                                    <span class="sidebar-icon"><span class="fa fa-industry"></span></span>-->
    <!--                                    <span class="sidebar-text">{{$trans('menu.facilities-list')}}</span>-->
    <!--                                </router-link>-->
    <!--                            </li>-->
    <!--                            <li :class="activeClass('partners-list')">-->
    <!--                                <router-link :to="{name:'partners-list'}" class="nav-link">-->
    <!--                                    <span class="sidebar-icon"><span class="fas fa-user-friends"></span></span>-->
    <!--                                    <span class="sidebar-text">{{$trans('menu.partners_list')}}</span>-->
    <!--                                </router-link>-->
    <!--                            </li>-->
    <!--                            <li :class="activeClass('customers-list')">-->
    <!--                                <router-link :to="{name:'customers-list'}" class="nav-link">-->
    <!--                                    <span class="sidebar-icon"><span class="fa fa-users" aria-hidden="true"></span></span>-->
    <!--                                    <span class="sidebar-text">{{$trans('menu.customers_list')}}</span>-->
    <!--                                </router-link>-->
    <!--                            </li>-->
    <!--                            <li :class="activeClass('device-list')">-->
    <!--                                <router-link :to="{name:'device-list'}" class="nav-link">-->
    <!--                                    <span class="sidebar-icon"><span class="fas fa-plus" aria-hidden="true"></span></span>-->
    <!--                                    <span class="sidebar-text">{{ $trans('menu.devices_list') }}</span>-->
    <!--                                </router-link>-->
    <!--                            </li>-->
    <!--                            <li :class="activeClass('cars-list')">-->
    <!--                                <router-link :to="{name:'cars-list'}" class="nav-link">-->
    <!--                                    <span class="sidebar-icon"><span class="fas fa-car" aria-hidden="true"></span></span>-->
    <!--                                    <span class="sidebar-text">{{ $trans('menu.cars_list') }}</span>-->
    <!--                                </router-link>-->
    <!--                            </li>-->
    <!--                            <li :class="activeClass('drivers-list')">-->
    <!--                                <router-link :to="{name:'drivers-list'}" class="nav-link">-->
    <!--                                    <span class="sidebar-icon"><span class="fa fa-id-card" aria-hidden="true"></span></span>-->
    <!--                                    <span class="sidebar-text">{{ $trans('menu.drivers-list') }}</span>-->
    <!--                                </router-link>-->
    <!--                            </li>-->
    <!--                            <li :class="activeClass('sim-cards')">-->
    <!--                                <router-link :to="{name:'sim-cards'}" class="nav-link">-->
    <!--                                    <span class="sidebar-icon"><span class="fa fa-credit-card"></span></span>-->
    <!--                                    <span class="sidebar-text">{{$trans('menu.sim-cards')}}</span>-->
    <!--                                </router-link>-->
    <!--                            </li>-->
    <!--                            <li :class="activeClass('branches-list')">-->
    <!--                                <router-link :to="{name:'branches-list'}" class="nav-link">-->
    <!--                                    <span class="sidebar-icon"><span class="fas fa-code-branch"></span></span>-->
    <!--                                    <span class="sidebar-text">{{$trans('menu.branches_list')}}</span>-->
    <!--                                </router-link>-->
    <!--                            </li>-->
    <!--&lt;!&ndash;                            <li class="nav-item">&ndash;&gt;-->
    <!--&lt;!&ndash;                                <a href="#" class="nav-link">&ndash;&gt;-->
    <!--&lt;!&ndash;                                    <span class="sidebar-icon"><span class="fa fa-toggle-on" aria-hidden="true"></span></span>&ndash;&gt;-->
    <!--&lt;!&ndash;                                    <span class="sidebar-text">{{$trans('menu.permissions_list')}}</span>&ndash;&gt;-->
    <!--&lt;!&ndash;                                </a>&ndash;&gt;-->
    <!--&lt;!&ndash;                            </li>&ndash;&gt;-->
    <!--&lt;!&ndash;                            <li class="nav-item  ">&ndash;&gt;-->
    <!--&lt;!&ndash;                                <router-link :to="{name:'subscriptions-list'}" class="nav-link">&ndash;&gt;-->
    <!--&lt;!&ndash;                                    <span class="sidebar-icon"><span class="fas fa-tasks"></span></span>&ndash;&gt;-->
    <!--&lt;!&ndash;                                    <span class="sidebar-text">{{$trans('menu.subscriptions-list')}}</span>&ndash;&gt;-->
    <!--&lt;!&ndash;                                </router-link>&ndash;&gt;-->
    <!--&lt;!&ndash;                            </li>&ndash;&gt;-->
    <!--                            <li :class="activeClass('commands-list')">-->
    <!--                                <router-link :to="{name:'commands-list'}" class="nav-link">-->
    <!--                                    <span class="sidebar-icon"><span class="fas fa-link"></span></span>-->
    <!--                                    <span class="sidebar-text">{{$trans('menu.commands_list')}}</span>-->
    <!--                                </router-link>-->
    <!--                            </li>-->
    <!--&lt;!&ndash;                            <li class="nav-item ">&ndash;&gt;-->
    <!--&lt;!&ndash;                                <a href="#" class="nav-link">&ndash;&gt;-->
    <!--&lt;!&ndash;                                    <span class="sidebar-icon"><span class="fas fa-clipboard-list"></span></span>&ndash;&gt;-->
    <!--&lt;!&ndash;                                    <span class="sidebar-text">{{$trans('menu.task_list')}}</span>&ndash;&gt;-->
    <!--&lt;!&ndash;                                </a>&ndash;&gt;-->
    <!--&lt;!&ndash;                            </li>&ndash;&gt;-->
    <!--&lt;!&ndash;                            <li class="nav-item ">&ndash;&gt;-->
    <!--&lt;!&ndash;                                <a href="#" class="nav-link">&ndash;&gt;-->
    <!--&lt;!&ndash;                                    <span class="sidebar-icon"><span class="fa fa-compass" aria-hidden="true"></span></span>&ndash;&gt;-->
    <!--&lt;!&ndash;                                    <span class="sidebar-text">{{$trans('menu.geofences_list')}}</span>&ndash;&gt;-->
    <!--&lt;!&ndash;                                </a>&ndash;&gt;-->
    <!--&lt;!&ndash;                            </li>&ndash;&gt;-->
    <!--                            <li :class="activeClass('wasl-list')">-->
    <!--                                <router-link :to="{name:'wasl-list'}" class="nav-link">-->
    <!--                                    <span class="sidebar-icon"><span class="fa fa-list-ol" aria-hidden="true"></span></span>-->
    <!--                                    <span class="sidebar-text">{{$trans('menu.wasl_list')}}</span>-->
    <!--                                </router-link>-->
    <!--                            </li>-->
    <!--                        </ul>-->
    <!--                    </div>-->
    <!--                </li>-->


    <!--                <li :class="activeClass('add-new')">-->
    <!--                    <span class="nav-link d-flex justify-content-between align-items-center collapsed" data-toggle="collapse" data-target="#submenu-lists" aria-expanded="false">-->
    <!--                  <router-link :to="{name:'add-new'}">-->
    <!--                    <span class="sidebar-icon"><span class="fa fa-plus" aria-hidden="true"></span></span>-->
    <!--                    <span class="sidebar-text">{{$trans('menu.add_new')}}</span>-->
    <!--                  </router-link>-->
    <!--                    </span>-->
    <!--                </li>-->

    <!--                <li :class="mainActiveClass(2)" >-->
    <!--                 <span class="nav-link  collapsed  d-flex justify-content-between align-items-center" data-toggle="collapse" data-target="#submenu-lists3">-->
    <!--                <span>-->
    <!--                  <span class="sidebar-icon"><span class="fa fa-cogs" aria-hidden="true"></span></span>-->
    <!--                  <span class="sidebar-text">{{$trans('menu.lts')}}</span>-->
    <!--                </span>-->
    <!--                <span class="link-arrow"><span class="fas fa-chevron-right"></span></span>-->
    <!--              </span>-->
    <!--                    <div  class="multi-level collapse " role="list" id="submenu-lists3" aria-expanded="false">-->
    <!--                        <ul  class="flex-column nav">-->
    <!--                            <li class="nav-item">-->
    <!--                                <a href="#" class="nav-link">-->
    <!--                                    <span class="sidebar-icon"><span class="fas fa-location-arrow"></span></span>-->
    <!--                                    <span class="sidebar-text">{{$trans('menu.lts')}}</span>-->
    <!--                                </a>-->
    <!--                            </li>-->

    <!--&lt;!&ndash;                            <li :class="activeClass('geo-regions')">&ndash;&gt;-->
    <!--&lt;!&ndash;                                <router-link :to="{name:'geo-regions'}" class="nav-link">&ndash;&gt;-->
    <!--&lt;!&ndash;                                    <span class="sidebar-icon"><span class="fas fa-location-arrow"></span></span>&ndash;&gt;-->
    <!--&lt;!&ndash;                                    <span class="sidebar-text">{{$trans('menu.geo-regions')}}</span>&ndash;&gt;-->
    <!--&lt;!&ndash;                                </router-link>&ndash;&gt;-->
    <!--&lt;!&ndash;                            </li>&ndash;&gt;-->
    <!--                        </ul>-->
    <!--                    </div>-->
    <!--                </li>-->


    <!--                <li :class="mainActiveClass(3)">-->
    <!--          <span  class="nav-link  collapsed  d-flex justify-content-between align-items-center" data-toggle="collapse" data-target="#submenu-lists4">-->
    <!--        <span>-->
    <!--          <span class="sidebar-icon"><span class="fa fa-file" aria-hidden="true"></span></span>-->
    <!--          <span  class="sidebar-text">{{$trans('menu.register_in_wasl')}}</span>-->
    <!--        </span>-->
    <!--        <span class="link-arrow"><span class="fas fa-chevron-right"></span></span>-->
    <!--      </span>-->
    <!--                    <div  class="multi-level collapse " role="list" id="submenu-lists4" aria-expanded="false">-->
    <!--                        <ul  class="flex-column nav">-->
    <!--                            <li :class="activeClass('tracking-service')">-->
    <!--                                <router-link :to="{name:'tracking-service'}" class="nav-link">-->
    <!--                                    <span class="sidebar-icon"><span class="far fa-file-alt"></span></span>-->
    <!--                                    <span class="sidebar-text">{{$trans('menu.tracking_service')}} </span>-->
    <!--                                </router-link>-->
    <!--                            </li>-->
    <!--&lt;!&ndash;                            <li class="nav-item">&ndash;&gt;-->
    <!--&lt;!&ndash;                                <a href="#" class="nav-link">&ndash;&gt;-->
    <!--&lt;!&ndash;                                    <span class="sidebar-icon"><span class="far fa-file-alt"></span></span>&ndash;&gt;-->
    <!--&lt;!&ndash;                                    <span class="sidebar-text">{{$trans('menu.sfda')}}</span>&ndash;&gt;-->
    <!--&lt;!&ndash;                                </a>&ndash;&gt;-->
    <!--&lt;!&ndash;                            </li>&ndash;&gt;-->
    <!--&lt;!&ndash;                            <li class="nav-item">&ndash;&gt;-->
    <!--&lt;!&ndash;                                <a href="#" class="nav-link">&ndash;&gt;-->
    <!--&lt;!&ndash;                                    <span class="sidebar-icon"><span class="far fa-file-alt"></span></span>&ndash;&gt;-->
    <!--&lt;!&ndash;                                    <span class="sidebar-text">{{$trans('menu.airport_taxi_service')}}</span>&ndash;&gt;-->
    <!--&lt;!&ndash;                                </a>&ndash;&gt;-->
    <!--&lt;!&ndash;                            </li>&ndash;&gt;-->
    <!--                        </ul>-->
    <!--                    </div>-->

    <!--                </li>-->

    <!--&lt;!&ndash;                <li class="nav-item ">&ndash;&gt;-->
    <!--&lt;!&ndash;                    <a href="#" class="nav-link">&ndash;&gt;-->
    <!--&lt;!&ndash;                        <span class="sidebar-icon"><span class="fa fa-bell" aria-hidden="true"></span></span>&ndash;&gt;-->
    <!--&lt;!&ndash;                        <span class="sidebar-text">{{$trans('menu.alert_list')}}</span>&ndash;&gt;-->
    <!--&lt;!&ndash;                    </a>&ndash;&gt;-->
    <!--&lt;!&ndash;                </li>&ndash;&gt;-->

    <!--                <li :class="activeClass('notifications-list')">-->
    <!--                    <router-link :to="{name:'notifications-list'}" class="nav-link">-->
    <!--                        <span class="sidebar-icon"><span class="fa fa-bell" aria-hidden="true"></span></span>-->
    <!--                        <span class="sidebar-text">{{$trans('menu.notifs_list')}}</span>-->
    <!--                    </router-link>-->
    <!--                </li>-->

    <!--                <li class="nav-item">-->
    <!--                    <a @click="changeLang" class="nav-link d-flex align-items-center">-->
    <!--                        <span class="sidebar-icon"><span class="fas fa-language"></span></span>-->
    <!--                        <span class="sidebar-text">{{ $trans('login.switch') }} <img width="32" height="32" alt="" :src="lang_image"></span>-->
    <!--                    </a>-->

    <!--                </li>-->
    <!--                <li class="nav-item ">-->
    <!--                    <a @click="logout" class="nav-link">-->
    <!--                        <span class="sidebar-icon"><span class="fas fa-sign-out-alt"></span></span>-->
    <!--                        <span class="sidebar-text">{{ $trans('menu.logout') }}</span>-->
    <!--                    </a>-->
    <!--                </li>-->

    <!--            </ul>-->

    <!--        </div>-->
    <!--    </nav>-->
</template>
<script>
export default {

    data() {
        return {
            name: null,
        }
    },
    beforeMount() {
    },
    mounted() {
        let user = JSON.parse(localStorage.getItem('user'));
        this.name = user.name;

    },
    methods: {


        activeClass: function (...names) {
            for (let name of names) {
                if (this.$route.meta.path === name)
                    return 'nav-item active';
                else
                    return 'nav-item'
            }


        },

        mainActiveClass: function (...levels) {
            for (let level of levels) {
                if (this.$route.meta.level === level)
                    return 'nav-item active';
                else
                    return 'nav-item'
            }


        },


    }
}
</script>

<style type="scss">
.bg-custom {
    background: url("/new/img/background2.png");
    background-position: center;
    background-repeat: no-repeat;
    border-radius: 0px 0px 15px 15px;
    -webkit-border-radius: 0px 0px 15px 15px;
    -moz-border-radius: 0px 0px 15px 15px;
    -ms-border-radius: 0px 0px 15px 15px;
    -o-border-radius: 0px 0px 15px 15px;
}
.active {
    border-bottom: none;
}
</style>
