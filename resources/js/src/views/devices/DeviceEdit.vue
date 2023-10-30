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
                        <li class="breadcrumb-item"><router-link :to="{name:'home'}">{{ $trans('breadcrumb.dashboard') }}</router-link></li>
                        <li class="breadcrumb-item active">
                            <router-link :to="{name:'device-list'}"> {{$trans('menu.devices_list')}}</router-link>
                        </li>
                        <li class="breadcrumb-item active">{{$trans('device.edit_device')}}</li>
                    </ul>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-6 right">
                </div>
            </div>
        </div>

        <div class="container">

            <div class="row">
                <div class="col-md-12 mb-3">
                    <div class="form-group">
                        <div v-if="device.disabled === false && device.status === 'online'"><span class="fas fa-signal text-success mr-2"></span>{{$trans('home.online')}}</div>
                        <div  v-else-if="device.disabled === false && device.status === 'offline'"><span class="fas fa-signal text-danger ml-2"></span> {{$trans('home.offline')}}</div>
                        <div  v-else-if="device.disabled === false && device.status === 'unknown'"><span class="fas fa-signal text-warning ml-2"></span> {{$trans('home.unknown')}}</div>
                        <div  v-else><span class="fas fa-times-circle text-danger ml-2"></span> {{$trans('main.inactive')}}</div>
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="device_name">{{$trans('device.device_name')}}<span class="required">*</span></label>
                        <input v-model="device.device_name" class="form-control"
                               id="device_name" type="text">
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="imei">{{$trans('device.device_id')}}<span class="required">*</span></label>
                        <input v-model="device.imei" class="form-control" id="imei"
                               type="text">
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="sim">{{$trans('add_form.related_sim_card')}} <span class="required">*</span></label>
                        <input v-model="device.sim_card" class="form-control" id="sim" readonly
                               type="text">
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

                                    <select v-model="plateNumber.leftLetter" class="form-select form-control minius"
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
                                    <select v-model="plateNumber.rightLetter" class="form-control form-select minius"
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
                    <label for="branch">{{$trans('device.branch_city')}}</label>
                    <input v-model="device.device_branch" class="form-control" id="branch"
                           type="text">
                </div>


                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="dev_model">{{$trans('device.device_model')}}</label>
                        <input v-model="device.device_model" class="form-control"
                               id="dev_model" type="text">
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="protocol">{{ $trans('commands.dev_protocol') }}</label>
                        <input v-model="device.device_protocol" class="form-control" readonly
                               id="protocol" type="text">
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <div class="d-flex flex-column">

                        <div class="d-flex flex-column">
                            <label for="device_cat">{{$trans('add_form.device_category')}}</label>
                            <select @change="changeVehicleType('D')" v-model="device.device_category" id="device_cat"
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






            </div>

            <div class="row" v-for="(attr, index ) in device.attributes">
                <div class="col-sm-6 mb-3">
                    <label for="attr_name2">{{ $trans('add_form.property_name') }}</label>
                    <select v-model="attr.name" class="form-select form-control w-100 mb-0" id="attr_name2"
                            aria-label="State select example">
                        <option value="web.reportColor">
                            {{ $trans('attr.attributeWebReportColor') }}
                        </option>
                        <option value="devicePassword">
                            {{ $trans('attr.attributeDevicePassword') }}
                        </option>
                        <option value="processing.copyAttributes">
                            {{ $trans('attr.attributeProcessingCopyAttributes') }}
                        </option>
                        <option value="decoder.timezone">{{ $trans('attr.sharedTimezone') }}
                        </option>
                        <option value="deviceInactivityStart">
                            {{ $trans('attr.attributeDeviceInactivityStart') }}
                        </option>
                        <option value="deviceInactivityPeriod">
                            {{ $trans('attr.attributeDeviceInactivityPeriod') }}
                        </option>
                        <option value="speedLimit">{{ $trans('attr.attributeSpeedLimit') }}</option>
                        <option value="report.ignoreOdometer">
                            {{ $trans('attr.attributeReportIgnoreOdometer') }}
                        </option>

                    </select>
                </div>


                <div class="col-md-6 mb-3">
                    <label for="attr_val">{{ $trans('add_form.property_value') }}</label>
                    <input v-model="attr.value" class="form-control" id="attr_val" type="text">

                </div>
            </div>

            <a @click="addElement(device.attributes)" class="clickable" >
                <span data-brackets-id="25270" class="fas fa-plus mr-2"></span>{{$trans('add_form.more')}}
            </a>


            <div class="row">

                <div class="col-12 text-center">
                    <div class="mt-3 mb-3 ">
                        <button type="submit" @click="updateDevice" class="btn btn-success">{{$trans('action.save')}}</button>
                    </div>
                </div>

            </div>

        </div>


    </div>
</template>

<script>
import {TheMask} from 'vue-the-mask'
export default {
    components: {TheMask},
    data () {
        return {
            device: {
                device_name:null,
                attributes: [{
                    name: null,
                    value: null
                }],
                lang: localStorage.getItem('lang'),
                plate_number:null,
                sim_card:null,
                device_protocol:null
            },
            groups: [],
            idDevice:null,
            simCard: {},
            plateNumber: {
                fournumbers: null,
                rightLetter: null,
                middleLetter: null,
                leftLetter: null,
            }

        }
    },
    async mounted () {
        this.idDevice = this.$route.params.idDevice;

        await this.getGroupsList()
        await this.getDevice()
    },
    methods: {

        async getDevice() {
            let id = this.idDevice;
            this.isLoad = true;
            await  axios.get('/device/'+id, {
                headers: this.tokenHeader
            }).then(({data}) => {
                this.isLoad = false;
                //this.device = data.data;
                this.device.device_name = data.data.name
                this.device.device_model = data.data.model
                this.device.imei = data.data.uniqueId
                this.device.device_branch = data.data.groupId
                this.device.device_category = data.data.category;
                this.device.sim_card = data.data.phone;
                this.device.positionId = data.data.positionId;
                this.device.disabled = data.data.disabled;
                this.device.status = data.data.status;

                this.plateNumber.fournumbers = data.data.plateNum[0];
                this.plateNumber.rightLetter = data.data.plateNum[1];
                this.plateNumber.middleLetter = data.data.plateNum[2];
                this.plateNumber.leftLetter = data.data.plateNum[3];

                let attrs = [];


                $.each(data.data.attributes, function(key, value) {
                    attrs.push({
                        name:key,
                        value:value
                    })
                });
                this.device.attributes = attrs;

                this.getActualPosition();


            }).catch(({errors}) => {
                this.isLoad = false;
            });

        },

        async getGroupsList() {
            this.isLoad = true;
            await axios.get('/groups', {
                headers: this.tokenHeader
            }).then(({data}) => {
                this.isLoad = false;
                this.groups = data.data;


            }).catch(({errors}) => {
                this.isLoad = false;
            });

        },


        getGroupName(groupId){
            let output = undefined;
            $.each(this.groups, function(key, value) {
                if(groupId === value.id){
                    output = value.name
                }

            });

            return output;

        },
        addElement(obj) {
            obj.push({
                name: null,
                value: null
            })
        },

        async updateDevice() {
            this.device.plate_number = this.plateNumber.fournumbers+" "+this.plateNumber.rightLetter+" "+this.plateNumber.middleLetter+" "+this.plateNumber.leftLetter;

            let lang = localStorage.getItem('lang');
            this.isLoad = true;
            let id = this.idDevice;
            await axios.put('/device/'+id, this.device, {
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

        async getActualPosition(){
            await axios.get('/positions/'+this.device.positionId,{
                headers: this.tokenHeader
            })
                .then(({data}) => {
                    this.isLoad = false;



                    if(data.data.attributes.io11 && data.data.attributes.io14){
                        this.device.sim_card = data.data.attributes.io11+""+data.data.attributes.io14;
                    }
                    this.device.device_protocol = data.data.protocol

                } )
                .catch(({errors}) => {
                    this.isLoad = false;
                });
        }


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
