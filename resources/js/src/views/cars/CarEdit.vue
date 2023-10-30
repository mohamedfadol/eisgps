<template>
    <div>
        <loading :active.sync="isLoad"
                 :is-full-page="fullPage"
                 :height="loaderHeight"
                 :width="loaderWidth"
                 :color="loaderColor"
                 :loader="loaderType"
                 :background-color="loaderBgColor"></loading>

        <div class="breadcrumb-holder container-fluid">
            <div class="row">
                <div class="col-sm-12 col-md-6 col-lg-6">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item">
                            <router-link :to="{name:'home'}">{{ $trans('breadcrumb.dashboard') }}</router-link>
                        </li>
                        <li class="breadcrumb-item active">
                            <router-link :to="{name:'cars-list'}">{{$trans('menu.cars_list')}}</router-link>
                        </li>
                        <li class="breadcrumb-item active">{{$trans('cars.cars_edit')}}</li>
                    </ul>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-6 right">
                </div>
            </div>
        </div>

        <div class="container" >
            <div class="row">
                <div class="col-md-6 mb-3">
                    <div>
                        <label for="veh_code">{{ $trans('device.device_id') }} </label>
                        <autocomplete
                            :placeholder="uniqueIdInit"
                            input-class="form-control"
                            results-display="uniqueId"
                            resultsValue="uniqueId"

                            v-model="vehicle.imei"
                            :source="devices">
                        </autocomplete>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div>
                        <label for="veh_code">{{$trans('add_form.vehicle_code')}}</label>
                        <input v-model="vehicle.vehicle_code" class="form-control" id="veh_code"
                               type="text" placeholder="">
<!--                        TODO Same as Device name-->
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div>
                        <label>{{$trans('cars.plate_number')}} <span class="required">*</span></label>

                        <div class="row">
                            <div class="col-md-4">
                                <the-mask class="form-control"  v-model="plateNumber.fournumbers" mask="####" type="text"
                                          placeholder="1111"></the-mask>

                            </div>
                            <div class="col-md-8">
                                <div class="row">

                                    <select v-model="plateNumber.leftLetter" class="form-control form-select minius"
                                            aria-label="">
                                        <option value="أ">أ</option>
                                        <option value="ب">ب</option>
                                        <option value="ح">ح</option>
                                        <option value="د">د</option>
                                        <option value="ر">ر</option>
                                        <option value="س">س</option>
                                        <option value="ص">ص</option>
                                        <option value="ط">ط</option>
                                        <option value="ع">ع</option>
                                        <option value="ق">ق</option>
                                        <option value="ك">ك</option>
                                        <option value="ل">ل</option>
                                        <option value="م">م</option>
                                        <option value="ن">ن</option>
                                        <option value="ه">ه</option>
                                        <option value="و">و</option>
                                        <option value="ي">ي</option>
                                    </select>
                                    <select v-model="plateNumber.middleLetter" class="form-control form-select minius"
                                            aria-label="">
                                        <option value="أ">أ</option>
                                        <option value="ب">ب</option>
                                        <option value="ح">ح</option>
                                        <option value="د">د</option>
                                        <option value="ر">ر</option>
                                        <option value="س">س</option>
                                        <option value="ص">ص</option>
                                        <option value="ط">ط</option>
                                        <option value="ع">ع</option>
                                        <option value="ق">ق</option>
                                        <option value="ك">ك</option>
                                        <option value="ل">ل</option>
                                        <option value="م">م</option>
                                        <option value="ن">ن</option>
                                        <option value="ه">ه</option>
                                        <option value="و">و</option>
                                        <option value="ي">ي</option>
                                    </select>
                                    <select v-model="plateNumber.rightLetter" class="form-select form-control minius"
                                            aria-label="">
                                        <option value="أ">أ</option>
                                        <option value="ب">ب</option>
                                        <option value="ح">ح</option>
                                        <option value="د">د</option>
                                        <option value="ر">ر</option>
                                        <option value="س">س</option>
                                        <option value="ص">ص</option>
                                        <option value="ط">ط</option>
                                        <option value="ع">ع</option>
                                        <option value="ق">ق</option>
                                        <option value="ك">ك</option>
                                        <option value="ل">ل</option>
                                        <option value="م">م</option>
                                        <option value="ن">ن</option>
                                        <option value="ه">ه</option>
                                        <option value="و">و</option>
                                        <option value="ي">ي</option>
                                    </select>


                                </div>

                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div>
                        <label for="vehicle_serial_number">{{$trans('add_form.vehicle_serial_number')}}
                            <span class="required" >*</span></label>
                        <the-mask mask="#########" class="form-control" id="vehicle_serial_number"
                                  v-model="vehicle.vehicle_serial_number" type="text"
                                  placeholder="123456789"></the-mask>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="type_licence">{{$trans('add_form.plate_type')}} <span class="required">*</span></label>
                        <select v-model="vehicle.plate_type" id="type_licence"
                                class="form-control form-select mb-0" aria-label="">
                            <option value="8">{{$trans('add_form.pt_export')}}</option>
                            <option value="9">{{$trans('add_form.pt_diplomat')}}</option>
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
                    <div class="d-flex flex-column">

                        <div class="d-flex flex-column">
                            <label for="vehicle_type">{{$trans('add_form.vehicle_type')}}</label>
                            <select @change="changeVehicleType('V')" v-model="vehicle.vehicle_type" id="vehicle_type"
                                    class="form-control form-select mb-0">
                                <option value="car">{{ $trans('add_form.cat_car') }}</option>
                                <option value="van">{{ $trans('add_form.cat_van') }}</option>
                                <option value="bus">{{ $trans('add_form.cat_bus') }}</option>
                                <option value="truck">{{ $trans('add_form.cat_truck') }}</option>
                                <option value="trailer">{{ $trans('add_form.cat_trailer') }}</option>
                                <option value="pick up">{{ $trans('add_form.cat_pickup') }}</option>
                                <option value="motorcycle">{{ $trans('add_form.cat_motorcycle') }}</option>
                                <option value="winch">{{ $trans('add_form.cat_winch') }}</option>

                            </select>
                        </div>


                    </div>


                </div>
                <div class="col-md-6 mb-3">
                    <div class="d-flex flex-column">

                        <div class="d-flex flex-column">
                            <label for="manuf_company">{{$trans('add_form.manuf_company')}}</label>
                            <select v-model="vehicle.manufacture_company" id="manuf_company" class="form-control form-select mb-0"
                                    aria-label="">
                                <option value="انفنيتي">{{$trans('add_form.car_infiniti')}}</option>
                                <option value="اوبل">{{$trans('add_form.car_opel')}}</option>
                                <option value="اودي">{{$trans('add_form.car_audi')}}</option>
                                <option value="ايسوزو">{{$trans('add_form.car_isuzu')}}</option>
                                <option value="بورش">{{$trans('add_form.car_porsche')}}</option>
                                <option value="بي ام دبليو">{{$trans('add_form.car_bmw')}}</option>
                                <option value="بيجو">{{$trans('add_form.car_peugeot')}}</option>
                                <option value="تشيري">{{$trans('add_form.car_chery')}}</option>
                                <option value="تويوتا">{{$trans('add_form.car_toyota')}}</option>
                                <option value="جاكوار">{{$trans('add_form.car_jaguar')}}</option>
                                <option value="جي ام سي">{{$trans('add_form.car_gmc')}}</option>
                                <option value="جيب">جيب</option>
                                <option value="جيلي">جيلي</option>
                                <option value="دايو">دايو</option>
                                <option value="دودج">دودج</option>
                                <option value="ديهاتسو">ديهاتسو</option>
                                <option value="رينو">رينو</option>
                                <option value="سانج يونج">سانج يونج</option>
                                <option value="سوزوكي">سوزوكي</option>
                                <option value="سيتروين">سيتروين</option>
                                <option value="شيفروليه">شيفروليه</option>
                                <option value="فورد">فورد</option>
                                <option value="فولفو">فولفو</option>
                                <option value="فولكس واجن">فولكس واجن</option>
                                <option value="كاديلاك">كاديلاك</option>
                                <option value="كرايزلر">كرايزلر</option>
                                <option value="كيا">كيا</option>
                                <option value="لاند روفر">لاند روفر</option>
                                <option value="لكزس">لكزس</option>
                                <option value="لنكولن">لنكولن</option>
                                <option value="مازدا">مازدا</option>
                                <option value="مان">مان</option>
                                <option value="مرسيدس">مرسيدس</option>
                                <option value="ميتسوبيشي">ميتسوبيشي</option>
                                <option value="ميركوري">ميركوري</option>
                                <option value="نيسان">نيسان</option>
                                <option value="همر">همر</option>
                                <option value="هوندا">هوندا</option>
                                <option value="هونداي">هونداي</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="manufacturing_year">{{$trans('add_form.manuf_year')}}</label>
                        <select v-model="vehicle.manufacturing_year" id="manufacturing_year"
                                class="form-control form-select mb-0" aria-label="">
                            <option v-for="year in years" :value="year">{{ year }}</option>

                        </select>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="city">{{$trans('add_form.vehicle_color')}}</label>
                        <select v-model="vehicle.vehicle_color" class="form-control form-select mb-0"
                                aria-label="">
                            <option value="ابيض">{{$trans('add_form.color_white')}}</option>
                            <option value="احمر">احمر</option>
                            <option value="اخضر">اخضر</option>
                            <option value="ازرق">ازرق</option>
                            <option value="اسود">اسود</option>
                            <option value="اصفر">اصفر</option>
                            <option value="برتقالي">برتقالي</option>
                            <option value="بنفسجي">بنفسجي</option>
                            <option value="بني">بني</option>
                            <option value="بيج">بيج</option>
                            <option value="ذهبي">ذهبي</option>
                            <option value="رمادي">رمادي</option>
                            <option value="فضي">فضي</option>
                            <option value="لؤلؤي">لؤلؤي</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="state">{{$trans('add_form.curr_counter_reader')}}</label>
                    <input v-model="vehicle.current_counter_reader" class="form-control"
                           type="text" placeholder="">
                </div>
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label>{{$trans('add_form.fuel_type')}}</label>
                        <select v-model="vehicle.fuel_type" class="form-control form-select mb-0"
                                aria-label="">
                            <option value="بنزين 91">{{$trans('add_form.gazoil91')}}</option>
                            <option value="بنزين 95">{{$trans('add_form.gazoil95')}}</option>
                            <option value="ديزل">{{$trans('add_form.diesel')}}</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label> Date Expiration library form </label>
                    <date-picker
                        v-model="vehicle.date_exp_library_form"
                        :locale="'en'" :calendar="'gregory'"
                        :format="'YYYY-MM-DD'"
                        :color="'#000000'"
                        :inputClass="'form-control datepicker-input'"
                        :display-format="'DD/MM/YYYY'"
                    ></date-picker>

                </div>
                <div class="col-md-6 mb-3">
                    <label >{{$trans('add_form.history_examination')}}</label>
                    <date-picker
                        v-model="vehicle.history_periodic_exam"
                        :locale="'en'" :calendar="'gregory'"
                        :format="'YYYY-MM-DD'"
                        :color="'#000000'"
                        :inputClass="'form-control datepicker-input'"
                        :display-format="'DD/MM/YYYY'"
                    ></date-picker>

                </div>
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="structure_no">{{$trans('add_form.structure_no')}}</label>
                        <input v-model="vehicle.structure_no" id="structure_no"
                               class="form-control" type="text" placeholder="">
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="engine_serial_number">{{$trans('add_form.engine_serial_no')}}</label>
                        <input id="engine_serial_number" v-model="vehicle.engine_serial_number"
                               class="form-control" type="text" placeholder="">
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="supplier">{{$trans('add_form.supplier')}}</label>
                        <input v-model="vehicle.supplier" id="supplier" class="form-control"
                               type="text" placeholder="">


                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label>{{$trans('add_form.date_purchase')}}</label>
                        <date-picker
                            v-model="vehicle.purchase_date"
                            :locale="'en'" :calendar="'gregory'"
                            :format="'YYYY-MM-DD'"
                            :color="'#000000'"
                            :inputClass="'form-control datepicker-input'"
                            :display-format="'DD/MM/YYYY'"
                        ></date-picker>


                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="insurance_company">{{$trans('add_form.insurance_company')}}</label>
                        <input id="insurance_company" class="form-control"
                               v-model="vehicle.insurance_company" type="text" placeholder="">

                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="insurance_number">{{$trans('add_form.insurance_number')}}</label>
                    <input id="insurance_number" class="form-control"
                           v-model="vehicle.insurance_number" type="text" placeholder="">
                </div>
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label>{{$trans('add_form.insurance_start')}}</label>
                        <date-picker
                            v-model="vehicle.start_insurance_date"
                            :locale="'en'" :calendar="'gregory'"
                            :format="'YYYY-MM-DD'"
                            :color="'#000000'"
                            :inputClass="'form-control datepicker-input'"
                            :display-format="'DD/MM/YYYY'"
                        ></date-picker>

                    </div>
                </div>
                <div class="col-md-6 mb-3">

                    <label >{{$trans('add_form.insurance_end')}}</label>
                    <date-picker
                        v-model="vehicle.end_insurance_date"
                        :locale="'en'" :calendar="'gregory'"
                        :format="'YYYY-MM-DD'"
                        :color="'#000000'"
                        :inputClass="'form-control datepicker-input'"
                        :display-format="'DD/MM/YYYY'"
                    ></date-picker>

                </div>
                <div class="col-md-6 mb-3">
                    <div>
                        <label for="storage_box">{{$trans('add_form.storage_box')}}</label>
                        <input id="storage_box" class="form-control"
                               v-model="vehicle.storage_box_capacity" type="number"
                               placeholder="">
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div>
                        <label for="doors_no">{{$trans('add_form.nb_doors')}}</label>
                        <input id="doors_no" v-model="vehicle.number_doors" class="form-control"
                               type="number" placeholder="">
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="seats_no">{{$trans('add_form.nb_seats')}}</label>
                    <input id="seats_no" v-model="vehicle.seats_number" class="form-control"
                           type="number" placeholder="">
                </div>
                <div class="col-md-6 mb-3">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="gender">{{$trans('add_form.motion_vector')}}</label>
                        </div>
                        <div class="col-md-3">
                            <input v-model="vehicle.have_motion_vector" type="radio"
                                   value="yes">
                            <label>Yes</label>
                        </div>
                        <div class="col-md-3">
                            <input v-model="vehicle.have_motion_vector" type="radio" value="no">
                            <label>No</label>
                        </div>
                    </div>

                </div>
            </div>
            <div class="collapse show" id="stepx" tabindex="-1" style="outline: none;">
                <table class="table user-table table-hover">

                    <tbody>
                    <tr class="child-table"
                        style="text-align: center; font-weight: bold; background: #dde9f1;">

                        <th class="border-bottom">{{$trans('add_form.weight_tons')}}</th>
                        <th class="border-bottom">{{$trans('add_form.sensor_volt')}}</th>

                    </tr>

                    </tbody>
                    <tbody>


                    <tr>

                        <td><span class="font-weight-normal">
                                        <input type="number" placeholder="00.00">
                                      </span></td>
                        <td><span class="font-weight-normal">
                                      <input type="number" placeholder="00.00">
                                     </span></td>

                    </tr>


                    <tr>

                        <td><span class="font-weight-normal">
                                      <input type="number" placeholder="00.00">
                                    </span></td>
                        <td><span class="font-weight-normal">
                                    <input type="number" placeholder="00.00">
                                   </span></td>

                    </tr>


                    <tr>

                        <td><span class="font-weight-normal">
                                    <input type="number" placeholder="00.00">
                                  </span></td>
                        <td><span class="font-weight-normal">
                                  <input type="number" placeholder="00.00">
                                 </span></td>

                    </tr>


                    <tr>

                        <td><span class="font-weight-normal">
                                  <input type="number" placeholder="00.00">
                                </span></td>
                        <td><span class="font-weight-normal">
                                <input type="number" placeholder="00.00">
                               </span></td>

                    </tr>
                    </tbody>
                </table>


            </div>

            <div class="col-12 text-center">
                <div class="mt-3 mb-3 ">
                    <button type="submit" @click="updateVehicle" class="btn btn-success">{{$trans('action.save')}}</button>
                </div>
            </div>


        </div>
    </div>
</template>
<script>
import {TheMask} from 'vue-the-mask'
import Autocomplete from 'vuejs-auto-complete'

export default {
    components: {TheMask,Autocomplete},
    data () {
        return {
            vehicle: {
                lang: localStorage.getItem('lang'),
                plate_number:null,

            },
            plateNumber: {
                fournumbers: null,
                rightLetter: null,
                middleLetter: null,
                leftLetter: null,
            },
            years:[],
            limitCommands: false,
            commands: [],
            idCar:0,
            devices: [],
            uniqueIdInit:null

        }
    },
     beforeMount(){
       this.getCarInfos();
    },
    async mounted () {
        this.idCar = this.$route.params.idCar;
        this.listYears();
        await this.getCommands();

        this.getDevicesList()
    },
    methods: {
        getDevicesList() {
            this.isLoad = true;
            axios.get('/devices', {
                headers: this.tokenHeader
            }).then(({data}) => {
                this.isLoad = false;
                this.devices = data.data;


            }).catch(({errors}) => {
                this.isLoad = false;
            });

        },
        listYears() {
            let years = [];
            for (var i = new Date().getFullYear(); i >= 1980; i--) {
                years.push(i);
            }

            this.years = years;
        },
        async getCommands() {
            this.isLoad = true;
            await axios.get('/commands', {
                headers: this.tokenHeader
            }).then(({data}) => {
                this.isLoad = false;
                this.commands = data.data;


            }).catch(({errors}) => {
                this.isLoad = false;
            });
        },

         getCarInfos() {
            this.isLoad = true;
            let id = this.$route.params.idCar
             axios.get('/car/'+id, {
                headers: this.tokenHeader
            }).then(({data}) => {
                this.isLoad = false;

                this.plateNumber.fournumbers = data.data.plateNum[0];
                this.plateNumber.rightLetter = data.data.plateNum[1];
                this.plateNumber.middleLetter = data.data.plateNum[2];
                this.plateNumber.leftLetter = data.data.plateNum[3];



                this.vehicle.vehicle_code = data.data.code
                this.vehicle.vehicle_type = data.data.type
                this.vehicle.manufacture_company = data.data.manufacture
                this.vehicle.vehicle_model = data.data.model
                this.vehicle.manufacturing_year = data.data.manufacture_year
                this.vehicle.vehicle_color = data.data.color
                this.vehicle.current_counter_reader = data.data.counter
                this.vehicle.fuel_type = data.data.fuel_type
                this.vehicle.fuel_cost = data.data.fuel_cost
                this.vehicle.fuel_cons_liters = data.data.fuel_consumption
                this.vehicle.tank_capacity = data.data.tank_capacity
                this.vehicle.plate_type = data.data.plate_type
                this.vehicle.insurance_type = data.data.type
                this.vehicle.vehicle_serial_number = data.data.serial_number
                this.vehicle.date_exp_library_form = data.data.exp_library
                this.vehicle.history_periodic_exam = data.data.exam_date
                this.vehicle.structure_no = data.data.structure_number
                this.vehicle.engine_serial_number = data.data.engine_serial_number
                this.vehicle.supplier = data.data.supplier
                this.vehicle.purchase_date = data.data.purchase_date
                this.vehicle.insurance_company = data.data.insurance_type
                this.vehicle.insurance_number = data.data.insurance_number
                this.vehicle.start_insurance_date = data.data.start_insurance_date
                this.vehicle.end_insurance_date = data.data.end_insurance_date
                this.vehicle.storage_box_capacity = data.data.storage_box_capacity
                this.vehicle.number_doors = data.data.doors_number
                this.vehicle.seats_number = data.data.seats_number
                this.vehicle.motion_vector = data.data.motion_vector
                this.uniqueIdInit = data.data.unique_id
                this.vehicle.imei = data.data.unique_id



            }).catch(({errors}) => {
                this.isLoad = false;
            });
        },

        async updateVehicle() {
            this.vehicle.plate_number = this.plateNumber.fournumbers+" "+this.plateNumber.rightLetter+" "+this.plateNumber.middleLetter+" "+this.plateNumber.leftLetter;
            let lang = localStorage.getItem('lang');
            this.isLoad = true;
            let id = this.idCar;
            await axios.put('/car/'+id, this.vehicle, {
                headers: this.tokenHeader
            })
                .then(({data}) => {
                    this.isLoad = false;
                    if (data.success === true) {
                        Swal.fire({
                            icon: 'success',
                            title: data.message,
                            showConfirmButton: true,
                        })
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: data.message,
                        })
                    }
                })
                .catch(({errors}) => {
                    this.isLoad = false;
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: this.$trans('action.failed'),
                    })
                });
        },

    }
}
</script>
<style type="scss">
.table > :not(caption) > * > * {
    border-bottom-width: 0;
}

.form-check .form-check-input{
    float: none;
    border-color: black;
}
</style>
