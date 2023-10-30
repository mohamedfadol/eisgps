<template>
    <div>
        <loading :active.sync="isLoad"
                 :is-full-page="fullPage"
                 :height="loaderHeight"
                 :width="loaderWidth"
                 :color="loaderColor"
                 :loader="loaderType"
                 :background-color="loaderBgColor"></loading>
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
            <div>

                <div class="dropdown-menu dashboard-dropdown dropdown-menu-left mt-2">
                    <a class="dropdown-item font-weight-bold" href="#"><span class="far fa-file-alt mr-2"></span>Document</a>
                    <a class="dropdown-item font-weight-bold" href="#"><span class="far fa-comment-dots mr-2"></span>Message</a>
                    <a class="dropdown-item font-weight-bold" href="#"><span class="fas fa-box-open mr-2"></span>Product</a>
                    <div role="separator" class="dropdown-divider"></div>
                    <a class="dropdown-item font-weight-bold" href="#"><span class="fas fa-rocket text-danger mr-2"></span>Subscription Plan</a>
                </div>
            </div>
            <div>
                <router-link :to="{name:'wasl-list'}">
                    <button type="button" class="btn btn-primary mr-2"><span class="fas fa-list-ol"></span></button>
                </router-link>
                <!--                <button class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
                <!--                    <span class="fa fa-plus mr-2" aria-hidden="true"></span> Add New-->
                <!--                    <span class="icon icon-small ml-1"><span class="fas fa-chevron-down"></span></span>-->
                <!--                </button>-->
                <!--                <div class="dropdown-menu dashboard-dropdown dropdown-menu-left mt-2" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(1047px, 136px, 0px);">-->
                <!--                    <a class="dropdown-item font-weight-bold" href="./New-device.html"><span class="fa fa-plus mr-2" aria-hidden="true"></span>Add New Device</a>-->
                <!--                    <a class="dropdown-item font-weight-bold" href=""><span class="fas fa-car mr-2"></span>Add New Car</a>-->
                <!--                    <a class="dropdown-item font-weight-bold" href=""><span class="fa fa-credit-card mr-2" aria-hidden="true"></span>Add New SIM Card</a>-->
                <!--                    <a class="dropdown-item font-weight-bold" href="#"><span class="fa fa-id-card mr-2" aria-hidden="true"></span>Add New Driver</a>-->
                <!--                    <a class="dropdown-item font-weight-bold" href="#"><span class="fa fa-users mr-2" aria-hidden="true"></span>Add New User</a>-->
                <!--                    <a class="dropdown-item font-weight-bold" href="#"><span class="fas fa-code-branch mr-2"></span>Add New Bransh</a>-->
                <!--                    <a class="dropdown-item font-weight-bold" href="#"><span class="fa fa-industry mr-2" aria-hidden="true"></span>Add New Facilites</a>-->

                <!--                </div>-->
            </div>
        </div>
        <form >
            <div class="row">
                <div class="col-12 col-xl-12">
                    <div class="card card-body bg-white border-light shadow-sm mb-4">
                        <h2 class="h5 mb-4 title_user">Facility Data</h2>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div>
                                    <label for="facilityType">Facility Type</label>
                                    <select @change="getFacility" class="form-select w-100 mb-0" id="facilityType" v-model="wassel.company.facilityType" aria-label="State select example">
                                        <option selected=""></option>
                                        <option value="I">Individually</option>
                                        <option value="C">Company</option>
                                    </select>
                                </div>
                            </div>


                            <div class="col-md-6 mb-3">
                                <div>
                                    <label>Identity Number <span class="required">*</span></label>
                                    <autocomplete
                                        placeholder="Identity number"
                                        input-class="form-control"
                                        results-display="id_number"
                                        resultsValue="id_number"
                                        @selected="getSearchInputValue"
                                        v-model="wassel.company.identityNumber"
                                        :source="identityNumbers">
                                    </autocomplete>


                                </div>
                            </div>





                            <div class="col-md-6 mb-3" v-if="wassel.company.facilityType !== 'I'">
                                <div class="form-group">
                                    <label for="comm_record_number">Commercial Record Number <span  class="required">*</span></label>
                                    <input class="form-control" v-model="wassel.company.commercial_record_number" id="comm_record_number" type="text"  placeholder="0000000000">
                                </div>
                            </div>


                            <div class="col-md-6 mb-3" v-if="wassel.company.facilityType !== 'I'" >
                                <label for="comm_rec_issue_hijri">Commercial Record Issue Date Hijri <span   class="required">*</span></label>
                                <input  class="form-control datepicker-input" v-model="wassel.company.commercial_record_issue_hijri_date" id="comm_rec_issue_hijri" type="date" placeholder="1350-07-20">
                            </div>


                            <div class="col-md-6 mb-3" v-if="wassel.company.facilityType === 'I'">
                                <div>
                                    <label for="birth_hijri">Date Of Birth Hijri <span  class="required">*</span></label>
                                    <input  class="form-control datepicker-input" v-model="wassel.company.bithday_hijri" id="birth_hijri" type="date" placeholder="1350-07-20" >
                                </div>
                            </div>


                            <div class="col-md-6 mb-3">
                                <div>
                                    <label for="phone_number">Phone Number <span class="required">*</span></label>
                                    <the-mask class="form-control" v-model="wassel.company.phone_number"
                                              mask="+966#########" id="phone_number" type="text"
                                              placeholder="+966#########"></the-mask>
                                </div>
                            </div>


                            <div class="col-md-6 mb-3">
                                <div>
                                    <label for="ext_number">Extension Number (optional)</label>
                                    <input v-model="wassel.company.extension_number" class="form-control" type="text" id="ext_number" placeholder="" >

                                </div>
                            </div>


                            <!--***************************************************************-->


                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="email_address">Email Address <span class="required">*</span></label>
                                    <input class="form-control" v-model="wassel.company.email" placeholder="name@example.com" id="email_address" type="email"  >
                                </div>
                            </div>
                            <div class="col-sm-6 " v-if="wassel.company.facilityType === 'C'">
                                <div class="form-group">
                                    <label for="manager_name">Manager Name <span  class="required">*</span></label>
                                    <input class="form-control" id="manager_name" v-model="wassel.company.manager_name" placeholder="Ahmed Mohammed" type="text" >
                                </div>
                            </div>





                            <div class="col-md-6 mb-3" v-if="wassel.company.facilityType === 'C'">
                                <div class="form-group">
                                    <label for="manager_phone_number">Manager Phone Number <span  class="required">*</span></label>
                                    <input class="form-control" v-model="wassel.company.manager_phone" id="manager_phone_number" placeholder="+966555555555" type="text"  >
                                </div>
                            </div>

                            <div class="col-md-6 mb-3" v-if="wassel.company.facilityType === 'C'">
                                <div class="form-group">
                                    <label for="manager_mobile">Manager Mobile Number <span  class="required">*</span></label>
                                    <input class="form-control"  v-model="wassel.company.manager_mobile" id="manager_mobile" placeholder="+966555555555" type="text">
                                </div>
                            </div>


                        </div>

                        <!--******************************************************-->

                        <h2 class="h5 mb-4 title_user">Vehicle Data</h2>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label>Vehicle Plate <span class="required">*</span></label>
                                    <autocomplete
                                        placeholder="1111 ب ب ب"
                                        input-class="form-control"
                                        results-display="plateNumber"
                                        resultsValue="plateNumber"
                                        @selected="getVehicleInputValue"
                                        v-model="wassel.vehicle.plate_number"
                                        :source="vehicles">
                                    </autocomplete>
                                </div>
                            </div>


                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="seq_number">Sequence Number <span class="required">*</span></label>
                                    <input v-model="wassel.vehicle.sequence_number" class="form-control" id="seq_number" placeholder="1234567890"  type="number" >
                                </div>
                            </div>


                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="plate_type">Plate Type <span class="required">*</span></label>
                                    <select v-model="wassel.vehicle.plate_type" id="plate_type" class="form-select w-100 mb-0">
                                        <option selected=""></option>
                                        <option value="8">تصدير</option>
                                        <option value="9">دبلوماسي</option>
                                        <option value="11">مؤقت</option>
                                        <option value="2">رخصة سير نقل عام</option>
                                        <option value="3">رخصة سير نقل خاص</option>
                                        <option value="7">رخصة سير مركبة أشغال عامة</option>
                                        <option value="6">رخصة سير سيارة أجرة</option>
                                        <option value="10">رخصة سير دراجة الية</option>
                                        <option value="1">رخصة سير خاصة</option>
                                        <option value="5">رخصة سير حافلة صغيرة خاصة</option>
                                        <option value="4">رخصة سير حافلة صغيرة عامة</option>

                                    </select>
                                </div>
                            </div>




                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="imei_number">Imei Number <span class="required">*</span></label>
                                    <input v-model="wassel.vehicle.imei" class="form-control" id="imei_number" placeholder=""  type="text" >
                                </div>
                            </div>

                            <!--                            <div class="col-md-6 mb-3">-->
                            <!--                                <div class="form-group">-->
                            <!--                                    <label for="lic_exp_date_hijri">License Expiry Date Hijri</label>-->
                            <!--                                    <div class="input-group">-->
                            <!--                                        <span class="input-group-text"><span class="far fa-calendar-alt"></span></span>-->
                            <!--                                        <input data-datepicker="" class="form-control" id="lic_exp_date_hijri" type="text" placeholder="1350-07-20" >-->
                            <!--                                    </div>-->

                            <!--                                </div>-->
                            <!--                            </div>-->
                            <!--                            -->
                            <!--                            <div class="col-md-6 mb-3">-->
                            <!--                                <div class="form-group">-->
                            <!--                                    <label for="zip">Brand [Arabic]</label>-->
                            <!--                                    <input class="form-control"  type="text" placeholder="رأس"  >-->
                            <!--                                </div>-->
                            <!--                            </div>-->
                            <!--                            -->
                            <!--                            <div class="col-md-6 mb-3">-->
                            <!--                                <div class="form-group">-->
                            <!--                                    <label for="zip">Manufacturer [Arabic]</label>-->
                            <!--                                    <input class="form-control" placeholder="مرسيدس" type="text" >-->
                            <!--                                </div>-->
                            <!--                            </div>-->

                            <!--                            <div class="col-md-6 mb-3">-->
                            <!--                                <div class="form-group">-->
                            <!--                                    <label >Model Year</label>-->
                            <!--                                    <select class="form-select w-100 mb-0">-->
                            <!--                                        <option selected=""></option>-->
                            <!--                                        <option >2020</option>-->
                            <!--                                        <option>2019</option>-->
                            <!--                                        <option>2018</option>-->

                            <!--                                    </select>-->
                            <!--                                </div>-->
                            <!--                            </div>-->




                            <!--                            <div class="col-md-6 mb-3">-->
                            <!--                                <div class="form-group">-->
                            <!--                                    <label for="zip">color [Arabic]</label>-->
                            <!--                                    <select class="form-select w-100 mb-0">-->
                            <!--                                        <option selected=""></option>-->
                            <!--                                        <option >احمر</option>-->
                            <!--                                        <option>اسود</option>-->
                            <!--                                        <option>ابيض</option>-->

                            <!--                                    </select>-->
                            <!--                                </div>-->
                            <!--                            </div>-->


                        </div>

                        <h2 class="h5 mb-4 title_user">Vehicle State</h2>
                        <!--******************************************************-->

                        <h2 class="h5 mb-4 title_user">Driver Data</h2>


                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="identity_number">Identity Number <span class="required">*</span></label>
                                    <input v-model="wassel.driver.identity_number" class="form-control" id="identity_number" type="text" placeholder="1000000000"  >
                                </div>
                            </div>


                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="birthday_driver">Birthday hijri<span class="required">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text"><span class="far fa-calendar-alt"></span></span>
                                        <input v-model="wassel.driver.birthday" class="form-control" id="birthday_driver" type="date" placeholder="" >
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label >Mobile Number <span class="required">*</span></label>
                                    <the-mask class="form-control" v-model="wassel.driver.driver_mobile"
                                              mask="+966#########" id="driver_mobile" type="text"
                                              placeholder="+966#########"></the-mask>
                                </div>
                            </div>


                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="name_driver">Name [Arabic]</label>
                                    <input v-model="wassel.driver.driver_name" id="name_driver" class="form-control"  type="text" placeholder="الاسم بالعربي" >
                                </div>
                            </div>




                        </div>

                        <h2 class="h5 mb-4 title_user">Vehicle Readings</h2>
                        <div class="row">
                            <div class="col-md-3 mb-3">
                                <div class="form-group">
                                    <label for="lattitude">Latitude<span class="required">*</span></label>
                                    <input v-model="wassel.live_location.latitude" class="form-control" id="lattitude" type="text" readonly  >
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <div class="form-group">
                                    <label for="Longitude">Longitude<span class="required">*</span></label>
                                    <input v-model="wassel.live_location.longitude" class="form-control" id="Longitude" type="text" readonly  >
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <div class="form-group">
                                    <label for="velocity">Velocity<span class="required">*</span></label>
                                    <input v-model="wassel.live_location.velocity" class="form-control" id="velocity" type="text" readonly  >
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <div class="form-group">
                                    <label for="veh_state">Vehicle State<span class="required">*</span></label>
                                    <input v-model="wassel.live_location.vehicule_state" class="form-control" id="veh_state" type="text" readonly  >
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <div class="form-group">
                                    <label for="location_time">Location Time<span class="required">*</span></label>
                                    <input v-model="wassel.live_location.deviceTime" class="form-control" id="location_time" type="text" readonly  >
<!--                               TODO change to GMT +3-->
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <div class="form-group">
                                    <label for="address">Address<span class="required">*</span></label>
                                    <input v-model="wassel.live_location.address" class="form-control" id="address" type="text" readonly  >
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <div class="form-group">
                                    <label for="RoleCode">RoleCode<span class="required">*</span></label>
                                    <input v-model="wassel.live_location.role_code" class="form-control" id="RoleCode" type="text" readonly  >
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <div class="form-group">
                                    <label for="veh_weight">Vehicle weight<span class="required">*</span></label>
                                    <input v-model="wassel.live_location.weight" class="form-control" id="veh_weight" type="text" readonly  >
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <div class="form-group">
                                    <label for="temperature">Temperature <span class="required">*</span></label>
                                    <input v-model="wassel.live_location.temperature" class="form-control" id="temperature" type="text" readonly  >
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-md-3" v-if="actionWithWasl === 1">
                                <button type="button" @click="SendToWassel" class="btn btn-primary">Send to Wasl</button>
                            </div>
                            <div class="col-md-3" v-if="actionWithWasl === 2">
                                <button type="button" @click="UpdateInWassel" class="btn btn-primary">Update in Wasl</button>
                            </div>
                            <!--                                    <div class="col-md-3" v-if="actionWithWasl ===2">-->
                            <!--                                        <button type="button" class="btn btn-primary">Delete from Wasl</button>-->
                            <!--                                    </div>-->
                        </div>


                    </div>

                </div>
            </div>
        </form>
    </div>
</template>
<script>
import Autocomplete from 'vuejs-auto-complete'
import {TheMask} from 'vue-the-mask'


export default {
    components: {
        Autocomplete,TheMask,
    },


    data () {
        return {
            wassel:{
                company:{
                    identityNumber:null
                },
                vehicle:{},
                driver: {
                    birthday:null,
                    driver_mobile:null,
                    driver_name:null,
                    identity_number:null
                },
                live_location:{
                    weight:0.0,
                    address:null,
                    temperature:null
                },
                lang:localStorage.getItem('lang'),
                traccar_id:null,
                device_id:null,
                driver_id:null

            },
            identityNumbers:[],
            vehicles:[],

            itemSelected: {},
            vehicleSelected:{},
            driverSelected:{},
            actionWithWasl :0,
            checkAction:{
                company:null,
                vehicle:null,
                driver:null
            }
        }
    },
    beforeMount() {

    },

    async mounted () {

    },
    methods: {
        async getFacility(){

            this.isLoad = true;
            await axios.get('/wasl/facility/'+this.wassel.company.facilityType,{
                headers: this.tokenHeader
            })
                .then(({data}) => {
                    this.isLoad = false;
                    this.identityNumbers = data.data;

                } )
                .catch(({errors}) => {
                    this.isLoad = false;
                });
        },

        async getVehicleInputValue(data) {
            this.vehicleSelected = data.selectedObject;
            this.wassel.vehicle.sequence_number = this.vehicleSelected.vehicle.serial_number;
            this.wassel.vehicle.imei = this.vehicleSelected.uniqueId;
            this.wassel.vehicle.plate_type = this.vehicleSelected.vehicle.plate_type;

            this.isLoad = true;
            await axios.get('/device/'+this.vehicleSelected.id+'/driver',{
                headers: this.tokenHeader
            })
                .then(({data}) => {
                    this.isLoad = false;
                    this.driverSelected = data.data;

                    this.checkAction.company = this.itemSelected.traccar_id;
                    this.checkAction.vehicle = this.vehicleSelected.id;
                    this.checkAction.driver =  this.driverSelected.driver.traccar_driver_id;

                    this.isLoad = true;
                    axios.post('/wasl/check/action',this.checkAction, {
                        headers: this.tokenHeader
                    }).then(({data}) => {
                        this.isLoad = false;
                        if(data.action === true){
                            this.actionWithWasl = 1;
                        }else{
                            this.actionWithWasl = 2;
                        }


                    }).catch(({errors}) => {
                        this.isLoad = false;
                    });



                } )
                .catch(({errors}) => {
                    this.isLoad = false;
                });

            if(this.vehicleSelected.positionId !== 0){
                await axios.get('/positions/'+this.vehicleSelected.positionId,{
                    headers: this.tokenHeader
                })
                    .then(({data}) => {
                        this.isLoad = false;
                        this.wassel.live_location = data.data

                        var state_veh = "";


                        if (data.data.attributes.ignition === false){
                            state_veh = "PARKED_ENGINE_OFF";
                        }else if(data.data.attributes.ignition === true && data.data.attributes.motion === false){
                            state_veh = "PARKED_ENGINE_ON";
                        }
                        else if(data.data.attributes.ignition === true && data.data.attributes.motion === true){
                            state_veh = "MOVING";
                        }

                        this.wassel.live_location.vehicule_state = state_veh;
                        this.wassel.live_location.role_code = "T1";
                        this.wassel.live_location.velocity = data.data.speed;
                        this.wassel.live_location.weight = data.data.attributes.adc1;
                        this.wassel.live_location.temperature = data.data.attributes.temp1;

                            axios.get('/google/geocode/'+this.wassel.live_location.latitude+'/'+this.wassel.live_location.longitude,{
                                headers: this.tokenHeader
                            })
                                .then(({data}) => {

                                    this.wassel.live_location.address = data.address
                                } )
                                .catch(({errors}) => {
                                    this.wassel.live_location.address = errors.address
                                });




                    } )
                    .catch(({errors}) => {
                        this.isLoad = false;
                    });
            }

            this.wassel.driver.driver_name = this.driverSelected.name;
            this.wassel.driver.birthday = this.driverSelected.driver.birthday;
            this.wassel.driver.driver_mobile = this.driverSelected.driver.phone;
            this.wassel.driver.identity_number = this.driverSelected.driver.id_number;
        },

        async getSearchInputValue(data) {
            this.isLoad = true;
            this.itemSelected = data.selectedObject;

            if(this.wassel.company.facilityType === "I"){
                this.wassel.company.phone_number = this.itemSelected.mobile;
                this.wassel.company.email = this.itemSelected.email;
                this.wassel.company.bithday_hijri = this.itemSelected.birthday;
            }else{
                this.wassel.company.commercial_record_issue_hijri_date = this.itemSelected.facility.commercial_register_start_date;
                this.wassel.company.phone_number = this.itemSelected.facility.phone;
                this.wassel.company.email = this.itemSelected.facility.mail_box;
                this.wassel.company.manager_name = this.itemSelected.facility.manager_name;
                this.wassel.company.manager_phone = this.itemSelected.facility.manager_phone;
                this.wassel.company.manager_mobile = this.itemSelected.facility.manager_mobile;
                this.wassel.company.commercial_record_number = this.itemSelected.facility.commercial_register_number;
            }

            await axios.get('/user/'+this.itemSelected.traccar_id+'/devices',{
                headers: this.tokenHeader
            })
                .then(({data}) => {
                    this.isLoad = false;
                    this.vehicles = data.data
                } )
                .catch(({errors}) => {
                    this.isLoad = false;
                });



        },

        async SendToWassel(){
            this.wassel.traccar_id = this.itemSelected.traccar_id;
            this.wassel.device_id = this.vehicleSelected.id;
            this.wassel.driver_id = this.driverSelected.driver.traccar_driver_id;

            this.isLoad = true;
            await  axios.post('/wasl/operating-companies',this.wassel,{
                headers: this.tokenHeader
            })
                .then(({data}) => {
                    this.isLoad = false;
                    if(data.success === false){
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: data.message,
                        })
                    }else{
                        this.isLoad = false;
                        Swal.fire({
                            icon: 'success',
                            title: data.message,
                            showConfirmButton: true,
                        })

                    }
                    this.wassel = {
                        company:{
                            identityNumber:null
                        },
                        vehicle:{},
                        driver: {
                            birthday:null,
                            driver_mobile:null,
                            driver_name:null,
                            identity_number:null
                        },
                        live_location:{
                            weight:0.0,
                            address:null,
                            temperature:null
                        },
                        lang:localStorage.getItem('lang'),
                        traccar_id:null,
                        device_id:null,
                        driver_id:null

                    };
                })
                .catch(({errors}) => {
                    this.isLoad = false;
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: errors.message,
                    })
                });
        },

        async UpdateInWassel(){
            this.wassel.traccar_id = this.itemSelected.traccar_id;
            this.wassel.device_id = this.vehicleSelected.id;
            this.wassel.driver_id = this.driverSelected.driver.traccar_driver_id;

            this.isLoad = true;
            await  axios.put('/wasl/update/operating-companies',this.wassel,{
                headers: this.tokenHeader
            })
                .then(({data}) => {
                    this.isLoad = false;
                    if(data.success === false){
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: data.message,
                        })
                    }else{
                        Swal.fire({
                            icon: 'success',
                            title: data.message,
                            showConfirmButton: true,
                        })

                    }
                    this.wassel = {
                        company:{
                            identityNumber:null
                        },
                        vehicle:{},
                        driver: {
                            birthday:null,
                            driver_mobile:null,
                            driver_name:null,
                            identity_number:null
                        },
                        live_location:{
                            weight:0.0,
                            address:null,
                            temperature:null
                        },
                        lang:localStorage.getItem('lang'),
                        traccar_id:null,
                        device_id:null,
                        driver_id:null

                    };
                })
                .catch(({errors}) => {
                    this.isLoad = true;
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: errors.message,
                    })
                });
        }

    }
}
</script>
