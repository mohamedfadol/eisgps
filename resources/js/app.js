import Vue from 'vue'
import VueRouter from 'vue-router'
import VueMoment from 'vue-moment'
import VueMeta from 'vue-meta'
import SmartTable from 'vuejs-smart-table'
import Loading from 'vue-loading-overlay';
import 'vue-loading-overlay/dist/vue-loading.css';
import VueSession from 'vue-session'
import VueDatetimeJs from 'vue-datetime-js';
import VueCookies from 'vue-cookies';

Vue.use(require('vue-chartist'))
Vue.use(Loading);
Vue.use(VueCookies);
Vue.component('loading', Loading);
Vue.component('date-picker', VueDatetimeJs);

window.Vue = require('vue');
Vue.use(VueMeta, {
    // optional pluginOptions
    refreshOnceOnNavigation: true
})
// Vue.use(VueGoogleMaps, {
//     load: {
//         key: 'AIzaSyANrKskLj72NvodFbVQu0kRQYUDEDq85c8'
//     },
//     installComponents: true
// })
Vue.use(VueRouter)
Vue.use(SmartTable)
Vue.use(VueSession)



import App from './App.vue'
import Login from './src/views/Login.vue'
import Layout from './src/views/layouts/Layout.vue'
import Dashboard from './src/views/Dashboard.vue'
import DevicesList from './src/views/devices/DevicesList.vue'
import DeviceEdit from './src/views/devices/DeviceEdit.vue'
import Report from './src/views/Report.vue'
import TrackingService from './src/views/wasl/TrackingService.vue'
import WaslList from './src/views/wasl/WaslList.vue'
import WaslVehiclesList from './src/views/wasl/WaslVehiclesList.vue'
import WaslDriversList from './src/views/wasl/WaslDriversList.vue'
import UsersList from './src/views/users/UsersList.vue'
import DetailsUser from './src/views/users/DetailsUser.vue'
import UserAddNew from './src/views/users/UserAddNew.vue'
import EditUser from './src/views/users/EditUser.vue'
import PartnersList from './src/views/partners/PartnersList.vue'
import CustomersList from './src/views/customers/CustomersList.vue'
import BranchesList from './src/views/branches/BranchesList.vue'
import AddBranche from './src/views/branches/AddBranche.vue'
import FacilitiesList from './src/views/facilities/FacilitiesList.vue'
import FacilityEdit from './src/views/facilities/FacilityEdit.vue'
import GeographicalRegions from './src/views/geo-area/GeographicalRegions.vue'
import MyProfile from './src/views/MyProfile.vue'
import AddGeographicalArea from './src/views/geo-area/AddGeographicalArea.vue'
import SubscriptionsList from './src/views/subscriptions/SubscriptionsList.vue'
import SimCardsList from './src/views/simcards/SimCardsList.vue'
import SimCardsDetails from './src/views/simcards/SimCardsDetails.vue'
import DriversList from './src/views/drivers/DriversList.vue'
import DriverEdit from './src/views/drivers/DriverEdit.vue'
import CommandsList from './src/views/commands/CommandsList.vue'
import NotificationsList from './src/views/notifications/NotificationsList.vue'
import NewCommand from './src/views/commands/NewCommand.vue'
import EditCommand from './src/views/commands/EditCommand.vue'
import CarsList from './src/views/cars/CarsList.vue'
import CarEdit from './src/views/cars/CarEdit.vue'
import AddNew from './src/views/AddNew.vue'
import AboutUs from './src/views/AboutUs.vue'
import ContactUs from './src/views/ContactUs.vue'
import SubscriptionDetails from './src/views/subscriptions/SubscriptionDetails.vue'
import Events from './src/views/Events.vue'
import RoadServices from './src/views/RoadServices.vue'
import NotFound from './src/views/NotFound.vue'


require('lang.js');
import VueLang from '@eli5/vue-lang-js'
// get the data source
import translations from './vue-translations.js';

Vue.use(VueLang, {
    messages: translations, // Provide locale file
    locale: 'ar', // Set locale
    fallback: 'ar' // Set fallback lacale
});

Vue.mixin({
    data: function() {
        return {
            globalVar:'global',
            MAPBOX_API_KEY:'pk.eyJ1IjoiZGFsaWRocCIsImEiOiJja20zc212MzYzam1mMm9wM2pvaTR1dDVwIn0.ez3CnQYak324gbe-7Gtf3Q',
            get myFunction(){
                return{
                    username: 'root',
                    password: 'password'
                }

            },
            get tokenHeader() {
                return {
                    Authorization: 'Bearer ' + localStorage.getItem('loginToken'),
                    Accept: 'application/json',
                    withCredentials: true
                }
            },



            base_api : "/api/v1",
            //socket_traccar:"ws://eisgps.net:8081/api/socket",
            socket_traccar:"ws://88.99.71.157:8081/api/socket",
            traccar_api:"http://88.99.71.157/apiv2/api",

            isLoad: false,
            fullPage: true,
            loaderHeight:64,
            loaderWidth:128,
            loaderColor:"#0a0a0a",
            loaderType:"dots", //spinner , bars, dots
            loaderBgColor:"#cccccc",

            datatablePerPage: 10,


        }
    }
})


const moment = require('moment');

if(localStorage.getItem('lang') === 'ar'){
    moment.locale('ar-tn');
}else{
    moment.locale('en-gb');
}


Vue.use(VueMoment, {
    moment
});

const router = new VueRouter({
    mode: 'history',
    routes: [
        //TODO ForgotPassword
        {
            path: '/',
            name: 'login',
            component: Login,
            meta: { title: 'LOGIN PAGE' }
        },
        {
            path: '',
            name: 'layout',
            component: Layout,
            children: [
                {
                    path: '/dashboard',
                    name: 'home',
                    component: Dashboard,
                    meta: { title: 'Dashboard',path:'home' }
                },
                {
                    path: '/users',
                    name: 'users-list',
                    component: UsersList,
                    meta: { title: 'Users List',path:'users-list',level: 1 }
                },
                {
                    path: '/user/:idUser',
                    name: 'users-details',
                    component: DetailsUser,
                    meta: { title: 'Details User',path:'users-list',level: 1 }
                },
                {
                    path: '/user/:idUser/add',
                    name: 'users-addnew',
                    component: UserAddNew,
                    meta: { title: 'User Add new',path:'users-list',level: 1 }
                },
                {
                    path: '/user/:idUser/update',
                    name: 'users-edit',
                    component: EditUser,
                    meta: { title: 'Edit User',path:'users-list',level: 1 }
                },
                {
                    path: '/partners',
                    name: 'partners-list',
                    component: PartnersList,
                    meta: { title: 'Partners List',path:'partners-list',level: 1 }
                },
                {
                    path: '/customers',
                    name: 'customers-list',
                    component: CustomersList,
                    meta: { title: 'Customers List',path:'customers-list',level: 1 }
                },
                {
                    path: '/add-new',
                    name: 'add-new',
                    component: AddNew,
                    meta: { title: 'Add New',path:'add-new'}
                },

                {
                    path: '/drivers',
                    name: 'drivers-list',
                    component: DriversList,
                    meta: { title: 'Drivers List',path:'drivers-list' ,level: 1 }
                },
                {
                    path: '/driver/:idDriver/update',
                    name: 'driver-edit',
                    component: DriverEdit,
                    meta: { title: 'Driver Edit',path:'drivers-list' ,level: 1 }
                },
                {
                    path: '/tracking-service',
                    name: 'tracking-service',
                    component: TrackingService,
                    meta: { title: 'Tracking List', path:'tracking-service',level : 3 }
                },
                {
                    path: '/wasl',
                    name: 'wasl-list',
                    component: WaslList,
                    meta: { title: 'Wasl List', path:'wasl-list',level : 1 }
                },
                {
                    path: '/wasl/:idUser/vehicles',
                    name: 'wasl-vehicles-list',
                    component: WaslVehiclesList,
                    meta: { title: 'Wasl Vehicles List',  path:'wasl-list',level : 1  }
                },
                {
                    path: '/wasl/:idUser/drivers',
                    name: 'wasl-drivers-list',
                    component: WaslDriversList,
                    meta: { title: 'Wasl Drivers List',  path:'wasl-list',level : 1  }
                },
                {
                    path: '/branches',
                    name: 'branches-list',
                    component: BranchesList,
                    meta: { title: 'Branches List',path:'branches-list',level : 1 }
                },
                {
                    path: '/notifications',
                    name: 'notifications-list',
                    component: NotificationsList,
                    meta: { title: 'Notifications List', path:'notifications-list'}
                },
                {
                    path: '/commands',
                    name: 'commands-list',
                    component: CommandsList,
                    meta: { title: 'Commands List', path:'commands-list',level :1}
                },
                {
                    path: '/command/add',
                    name: 'new-command',
                    component: NewCommand,
                    meta: { title: 'New Command',path:'commands-list',level :1 }
                },
                {
                    path: '/command/:idCmd/update',
                    name: 'edit-command',
                    component: EditCommand,
                    meta: { title: 'Edit Command',path:'commands-list',level :1 }
                },
                {
                    path: '/branches/add',
                    name: 'new-branches',
                    component: AddBranche,
                    meta: { title: 'New Branche' }
                },
                {
                    path: '/sim-cards',
                    name: 'sim-cards',
                    component: SimCardsList,
                    meta: { title: 'Sim Cards List',path:'sim-cards',level: 1  }
                },
                {
                    path: '/sim/:idSim',
                    name: 'sim-details',
                    component: SimCardsDetails,
                    meta: { title: 'Sim Cards Details',path:'sim-cards',level: 1  }
                },

                {
                    path: '/cars',
                    name: 'cars-list',
                    component: CarsList,
                    meta: { title: 'Cars List',path:'cars-list',level: 1 }
                },
                {
                    path: '/car/:idCar/update',
                    name: 'car-edit',
                    component: CarEdit,
                    meta: { title: 'Cars Edit',path:'cars-list',level: 1 }
                },

                {
                    path: '/devices',
                    name: 'device-list',
                    component: DevicesList,
                    meta: { title: 'Devices List',path:'device-list' ,level: 1}
                },
                {
                    path: '/devices/:idDevice/update',
                    name: 'device-edit',
                    component: DeviceEdit,
                    meta: { title: 'Devices Edit',path:'device-list' ,level: 1}
                },

                {
                    path: '/subscriptions',
                    name: 'subscriptions-list',
                    component: SubscriptionsList,
                    meta: { title: 'Subscriptions List',path:'subscriptions-list',level:2 }
                },
                {
                    path: '/facilities',
                    name: 'facilities-list',
                    component: FacilitiesList,
                    meta: { title: 'Facilities List',path:'facilities-list' ,level: 1 }
                },
                {
                    path: '/events/all',
                    name: 'events',
                    component: Events,
                    meta: { title: 'Events List'}
                },
                {
                    path: '/facility/:idCompany/update',
                    name: 'facility-edit',
                    component: FacilityEdit,
                    meta: { title: 'Facilities Edit',path:'facilities-list' ,level: 1 }
                },

                {
                    path: '/geographical-regions',
                    name: 'geo-regions',
                    component: GeographicalRegions,
                    meta: { title: 'Geographical regions',path:'geo-regions',level: 2 }
                },
                {
                    path: '/geographical-regions/add',
                    name: 'new-area',
                    component: AddGeographicalArea,
                    meta: { title: 'New Geographical regions' }
                },
                {
                    path: '/report',
                    name: 'report',
                    component: Report,
                    meta: { title: 'Report',path:'report',level : 2  }
                },
                {
                    path: '/road-services',
                    name: 'road-services',
                    component: RoadServices,
                    meta: { title: 'Road Services',path:'road-services',level : 2  }
                },
                {
                    path: '/profile',
                    name: 'my-profile',
                    component: MyProfile,
                    meta: { title: 'My Profile' }
                },
                {
                    path: '/subscription/:idSub/details',
                    name: 'subscription-details',
                    component: SubscriptionDetails,
                    meta: { title: 'Subscription details',  path:'subscription-details',level : 2  }
                },
                {
                    path: '/contact-us',
                    name: 'contact-us',
                    component: ContactUs,
                    meta: { title: 'Contact Us' ,path:'contact-us',level:2}
                },
                {
                    path: '/about-us',
                    name: 'about-us',
                    component: AboutUs,
                    meta: { title: 'About Us' ,path:'about-us',level:2}
                },
                {
                    path: '/not-found',
                    name: 'not-found',
                    component: NotFound,
                    meta: { title: 'Page not found' }
                },


            ]
        },

                // {
        //     path: '/home',
        //     name: 'home',
        //     component: Home,
        //     meta: { title: 'HOME PAGE' },
        //     children : [
        //         {
        //             path: '/moncafe',
        //             name: 'cafe',
        //             component: Cafe,
        //             meta: { title: 'CAFE' }
        //         },
        //         {
        //             path: '/newcafe',
        //             name: 'newcafe',
        //             component: NewCafe,
        //             meta: { title: 'NEW CAFE' }
        //         }
        //     ]
        // },


    ],
});


router.beforeEach((to, from, next) => {
    if (!to.matched.length) {
        next('/notFound');
    } else {
        document.title = to.meta.title;
        next();
    }
})

const app = new Vue({
    el: '#app',
    components: { App },
    router,
});



