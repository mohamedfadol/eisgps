<template>
    <div class="header">
        <nav class="navbar">

            <div class="container-fluid">
                <div class="navbar-holder d-flex align-items-center justify-content-between">
                    <!-- Navbar Header-->
                    <div class="navbar-header">
                        <!-- Navbar Brand -->

                        <router-link :to="{name:'home'}" class="navbar-brand d-sm-inline-block">
                            <div class="brand-text  d-lg-inline-block">
                                <img src="/new/img/logo.png" alt="Logo" style="height: 50px;">
                            </div>
                        </router-link>
                        <!-- Toggle Button-->
                        <a id="toggle-btn" href="#" class="menu-btn active"><span></span><span></span><span></span></a>
                    </div>
                    <!-- Navbar Menu -->
                    <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
                        <!-- Topbar Search -->
                        <div class=" h-100">
                            <div class=" h-100">
                                <div class="searchbar">
                                    <input class="search_input" type="text" name="" :placeholder="$trans('header.search')">
                                    <a href="#" class="search_icon"><i class="fas fa-search"></i></a>
                                </div>
                            </div>
                        </div>

                        <!-- Languages dropdown    -->

                        <li class="nav-item dropdown">
                            <a id="languages" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link language">
                                <i class="fas fa-globe "></i>
                            </a>
                            <ul aria-labelledby="languages" class="dropdown-menu">
                                <li><a rel="nofollow" href="#" @click="changeLang('ar')" class="dropdown-item"> <img src="/new/img/flags/16/SA.png" alt="Arabic" class="mr-2">العربية</a></li>
                                <li><a rel="nofollow" href="#" @click="changeLang('en')" class="dropdown-item"> <img src="/new/img/flags/16/US.png" alt="English" class="mr-2">English</a></li>

                            </ul>
                        </li>

                        <!-- Notifications-->
                        <li class="nav-item dropdown">
                            <a id="notifications" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link">
                                <i class="fas fa-bell fa-fw"></i>
                                <span class="badge bg-red badge-corner">0</span></a>
                            <ul aria-labelledby="notifications" class="dropdown-menu">
                                <li><a rel="nofollow" href="#" class="dropdown-item">
                                    <div class="notification">
                                        <div class="notification-content"><i class="fa fa-envelope"></i>You have 6 new messages </div>
                                        <div class="notification-time"><small>6 minutes ago</small></div>
                                    </div></a></li>
                                <li><a rel="nofollow" href="#" class="dropdown-item">
                                    <div class="notification">
                                        <div class="notification-content"> <i class="fas fa-poll-h iconi"></i>You have 2 Requests</div>
                                        <div class="notification-time"><small>5 minutes ago</small></div>
                                    </div></a></li>

                                <li><a rel="nofollow" href="#" class="dropdown-item">
                                    <div class="notification">
                                        <div class="notification-content"><i class="fas fa-users iconi"></i>You have 2 Buyers</div>
                                        <div class="notification-time"><small>20 minutes ago</small></div>
                                    </div></a></li>
                                <li>
                                    <router-link :to="{name:'events'}" class="dropdown-item all-notifications text-center">
                                        <strong>{{$trans('main.all_notifs')}}</strong>
                                    </router-link>


                                </li>
                            </ul>
                        </li>


                        <!-- Charts --->
                        <li class="nav-item dropdown">
                            <a id="messages" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link">
                                <i class="fa fa-pie-chart" aria-hidden="true"></i>
                                <span class="badge bg-red badge-corner">0</span></a>
                            <ul aria-labelledby="notifications" class="dropdown-menu">
                                <li>
                                    <div class="statistics-item d-flex justify-content-between mb-2" style="width: 100%;">

                                        <div class="title">
                                            <h5>المركبات المتصلة</h5>
                                            <input type="text">
                                        </div>

                                        <div class="chart">
                                            <div class="circles-wrp" style="position: relative; display: inline-block;">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80">
                                                    <path fill="transparent" stroke="#D3B6C6" stroke-width="7" d="M 39.992565928065126 3.500000757060633 A 36.5 36.5 0 1 1 39.949302232260386 3.500035209108127 Z"></path>
                                                    <path fill="transparent" stroke="#4B253A" stroke-width="7" d="M 39.992565928065126 3.500000757060633 A 36.5 36.5 0 0 1 59.07174573163989 71.12103010421852 "></path>
                                                </svg>
                                                <div class="circles-text" style="position: absolute; top: 0px; left: 0px; text-align: center; width: 100%; font-size: 28px; height: 80px; line-height: 80px;">
                                                    <span class="circles-integer">50</span>
                                                    <!--<span class="circles-decimals">26</span>-->
                                                </div>
                                            </div>
                                        </div>
                                    </div></li>
                                <!--****************************-->
                                <li>
                                    <div class="statistics-item d-flex justify-content-between mb-2" style="width: 100%;">

                                        <div class="title">
                                            <h5>المركبات المتحركة</h5>
                                            <input type="text">
                                        </div>

                                        <div class="chart">
                                            <div class="circles-wrp" style="position: relative; display: inline-block;">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80">
                                                    <path fill="transparent" stroke="#D3B6C6" stroke-width="7" d="M 39.992565928065126 3.500000757060633 A 36.5 36.5 0 1 1 39.949302232260386 3.500035209108127 Z"></path>
                                                    <path fill="transparent" stroke="#4B253A" stroke-width="7" d="M 39.992565928065126 3.500000757060633 A 36.5 36.5 0 0 1 59.07174573163989 71.12103010421852 "></path>
                                                </svg>
                                                <div class="circles-text" style="position: absolute; top: 0px; left: 0px; text-align: center; width: 100%; font-size: 28px; height: 80px; line-height: 80px;">
                                                    <span class="circles-integer">50</span>
                                                    <!--<span class="circles-decimals">26</span>-->
                                                </div>
                                            </div>
                                        </div>
                                    </div></li>
                                <!--****************************-->
                                <li>
                                    <div class="statistics-item d-flex justify-content-between mb-2" style="width: 100%;">

                                        <div class="title">
                                            <h5>إشعال المحرك</h5>
                                            <input type="text">
                                        </div>

                                        <div class="chart">
                                            <div class="circles-wrp" style="position: relative; display: inline-block;">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80">
                                                    <path fill="transparent" stroke="#D3B6C6" stroke-width="7" d="M 39.992565928065126 3.500000757060633 A 36.5 36.5 0 1 1 39.949302232260386 3.500035209108127 Z"></path>
                                                    <path fill="transparent" stroke="#4B253A" stroke-width="7" d="M 39.992565928065126 3.500000757060633 A 36.5 36.5 0 0 1 59.07174573163989 71.12103010421852 "></path>
                                                </svg>
                                                <div class="circles-text" style="position: absolute; top: 0px; left: 0px; text-align: center; width: 100%; font-size: 28px; height: 80px; line-height: 80px;">
                                                    <span class="circles-integer">50</span>
                                                    <!--<span class="circles-decimals">26</span>-->
                                                </div>
                                            </div>
                                        </div>
                                    </div></li>
                                <!--****************************-->
                                <li>
                                    <div class="statistics-item d-flex justify-content-between mb-2" style="width: 100%;">

                                        <div class="title">
                                            <h5>المركبات غيرالمتصلة</h5>
                                            <input type="text">
                                        </div>

                                        <div class="chart">
                                            <div class="circles-wrp" style="position: relative; display: inline-block;">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80">
                                                    <path fill="transparent" stroke="#D3B6C6" stroke-width="7" d="M 39.992565928065126 3.500000757060633 A 36.5 36.5 0 1 1 39.949302232260386 3.500035209108127 Z"></path>
                                                    <path fill="transparent" stroke="#4B253A" stroke-width="7" d="M 39.992565928065126 3.500000757060633 A 36.5 36.5 0 0 1 59.07174573163989 71.12103010421852 "></path>
                                                </svg>
                                                <div class="circles-text" style="position: absolute; top: 0px; left: 0px; text-align: center; width: 100%; font-size: 28px; height: 80px; line-height: 80px;">
                                                    <span class="circles-integer">50</span>
                                                    <!--<span class="circles-decimals">26</span>-->
                                                </div>
                                            </div>
                                        </div>
                                    </div></li>
                                <!--****************************-->
                                <li>
                                    <div class="statistics-item d-flex justify-content-between mb-2" style="width: 100%;">

                                        <div class="title">
                                            <h5>المركبات المتوقفة</h5>
                                            <input type="text">
                                        </div>

                                        <div class="chart">
                                            <div class="circles-wrp" style="position: relative; display: inline-block;">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80">
                                                    <path fill="transparent" stroke="#D3B6C6" stroke-width="7" d="M 39.992565928065126 3.500000757060633 A 36.5 36.5 0 1 1 39.949302232260386 3.500035209108127 Z"></path>
                                                    <path fill="transparent" stroke="#4B253A" stroke-width="7" d="M 39.992565928065126 3.500000757060633 A 36.5 36.5 0 0 1 59.07174573163989 71.12103010421852 "></path>
                                                </svg>
                                                <div class="circles-text" style="position: absolute; top: 0px; left: 0px; text-align: center; width: 100%; font-size: 28px; height: 80px; line-height: 80px;">
                                                    <span class="circles-integer">50</span>
                                                    <!--<span class="circles-decimals">26</span>-->
                                                </div>
                                            </div>
                                        </div>
                                    </div></li>
                                <!--****************************-->
                            </ul>
                        </li>

                        <!-- Languages dropdown    -->

                        <li class="nav-item dropdown">
                            <a id="user" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link language">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                            </a>


                            <ul aria-labelledby="languages" class="dropdown-menu">
                                <li>
                                    <router-link class="dropdown-item" :to="{name:'my-profile'}">
                                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                        {{$trans('submenu.profile')}}
                                    </router-link>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                        {{$trans('submenu.settings')}}
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#" @click="logout">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                        {{ $trans('menu.logout') }}
                                    </a>
                                </li>

                            </ul>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <!--    <nav class="navbar navbar-top navbar-expand navbar-dashboard navbar-dark pl-0 pr-2 pb-0">-->
    <!--        <div class="container-fluid px-0">-->
    <!--            <div class="d-flex justify-content-between w-100" id="navbarSupportedContent">-->
    <!--                <div class="d-flex align-items-center">-->
    <!--                    <button id="sidebar-toggle" class="sidebar-toggle mr-3 btn btn-icon-only btn-lg btn-circle d-none d-md-inline-block"><span class="fas fa-bars"></span></button>-->
    <!--                    &lt;!&ndash; Search form &ndash;&gt;-->
    <!--                    <form class="navbar-search form-inline" id="navbar-search-main">-->
    <!--                        <div class="input-group input-group-merge search-bar">-->
    <!--                            <span class="input-group-text" id="topbar-addon"><span class="fas fa-search"></span></span>-->
    <!--                            <input type="text" class="form-control" id="topbarInputIconLeft" :placeholder="$trans('header.search')" aria-label="Search" aria-describedby="topbar-addon">-->
    <!--                        </div>-->
    <!--                    </form>-->
    <!--                </div>-->
    <!--                &lt;!&ndash; Navbar links &ndash;&gt;-->
    <!--                <ul class="navbar-nav align-items-center">-->
    <!--                    <li class="nav-item dropdown">-->
    <!--                        <a class="nav-link text-dark mr-lg-3 icon-notifications" data-unread-notifications="true" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
    <!--                          <span class="icon icon-sm">-->
    <!--                            <span class="fas fa-bell bell-shake"></span>-->
    <!--                            <span class="icon-badge rounded-circle unread-notifications"></span>-->
    <!--                          </span>-->
    <!--                        </a>-->
    <!--                        <div class="dropdown-menu dashboard-dropdown dropdown-menu-lg dropdown-menu-center mt-2 py-0">-->
    <!--                            <div class="list-group list-group-flush">-->
    <!--                                <a href="#" class="text-center text-primary font-weight-bold border-bottom border-light py-3">{{$trans('header.notifs')}}</a>-->
    <!--                                <a href="" class="list-group-item list-group-item-action border-bottom border-light">-->
    <!--                                    <div class="row align-items-center">-->
    <!--&lt;!&ndash;                                        <div class="col-auto">&ndash;&gt;-->
    <!--&lt;!&ndash;                                            &lt;!&ndash; Avatar &ndash;&gt;&ndash;&gt;-->
    <!--&lt;!&ndash;                                            <img alt="Image placeholder" src="/assets/img/team/user.png" class="user-avatar lg-avatar rounded-circle">&ndash;&gt;-->
    <!--&lt;!&ndash;                                        </div>&ndash;&gt;-->
    <!--&lt;!&ndash;                                        <div class="col pl-0 ml&#45;&#45;2">&ndash;&gt;-->
    <!--&lt;!&ndash;                                            <div class="d-flex justify-content-between align-items-center">&ndash;&gt;-->
    <!--&lt;!&ndash;                                                <div>&ndash;&gt;-->
    <!--&lt;!&ndash;                                                    <h4 class="h6 mb-0 text-small">Jose Leos</h4>&ndash;&gt;-->
    <!--&lt;!&ndash;                                                </div>&ndash;&gt;-->
    <!--&lt;!&ndash;                                                <div class="text-right">&ndash;&gt;-->
    <!--&lt;!&ndash;                                                    <small class="text-danger">a few moments ago</small>&ndash;&gt;-->
    <!--&lt;!&ndash;                                                </div>&ndash;&gt;-->
    <!--&lt;!&ndash;                                            </div>&ndash;&gt;-->
    <!--&lt;!&ndash;                                            <p class="font-small mt-1 mb-0">Added you to an event "Project stand-up" tomorrow at 12:30 AM.</p>&ndash;&gt;-->
    <!--&lt;!&ndash;                                        </div>&ndash;&gt;-->
    <!--                                    </div>-->
    <!--                                </a>-->
    <!--                                <a href="#" class="dropdown-item text-center text-primary font-weight-bold py-3">{{$trans('header.view_all')}}</a>-->
    <!--                            </div>-->
    <!--                        </div>-->
    <!--                    </li>-->
    <!--                    <li class="nav-item dropdown">-->
    <!--                        <a class="nav-link pt-1 px-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
    <!--                            <div class="media d-flex align-items-center">-->
    <!--                                <img class="user-avatar md-avatar rounded-circle" alt="Image placeholder" src="/assets/img/team/user.png">-->
    <!--                                <div class="media-body ml-2 text-dark align-items-center d-none d-lg-block">-->
    <!--                                    <span class="mb-0 font-small font-weight-bold">{{name}} </span>-->
    <!--                                </div>-->
    <!--                            </div>-->
    <!--                        </a>-->
    <!--                        <div class="dropdown-menu dashboard-dropdown dropdown-menu-right mt-2">-->
    <!--                            <router-link class="dropdown-item font-weight-bold" :to="{name:'my-profile'}"><span class="far fa-user-circle"></span>{{$trans('submenu.profile')}}</router-link>-->
    <!--                            <a class="dropdown-item font-weight-bold" href="#"><span class="fas fa-cog"></span>{{$trans('submenu.settings')}}</a>-->
    <!--                            <a class="dropdown-item font-weight-bold" href="#"><span class="fas fa-envelope-open-text"></span>{{$trans('submenu.messages')}}</a>-->
    <!--                            <a class="dropdown-item font-weight-bold" href="#"><span class="fas fa-user-shield"></span>{{$trans('submenu.support')}}</a>-->
    <!--                            <div role="separator" class="dropdown-divider"></div>-->
    <!--                            <a @click="logout" class="dropdown-item font-weight-bold" ><span class="fas fa-sign-out-alt text-danger"></span>{{ $trans('menu.logout') }}</a>-->
    <!--                        </div>-->
    <!--                    </li>-->
    <!--                </ul>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </nav>-->

</template>
<script>
export default {

    data(){
        return {
            name:null
        }
    },
    beforeMount(){

    },
    mounted() {
        let user = JSON.parse(localStorage.getItem('user'));
        this.name = user.email;


    },
    methods : {

        logout(){
            localStorage.removeItem('eisgps-token');
            localStorage.removeItem('user');
            localStorage.removeItem('loginToken');
            this.$session.destroy()
            this.$router.push({name:'login'});
        },

        changeLang(lang) {
            if (lang === "ar") {
                this.$lang.setLocale('ar');
                this.$moment.locale('ar-tn')
            } else {
                this.$lang.setLocale('en');
                this.$moment.locale('en-gb')
            }


            localStorage.setItem('lang', this.$lang.getLocale());
        },



    }
}
</script>
