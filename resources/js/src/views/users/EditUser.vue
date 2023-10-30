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
                        <li class="breadcrumb-item ">
                            <router-link :to="{name:'users-list'}">{{ $trans('users.users_list') }}</router-link>
                        </li>
                        <li class="breadcrumb-item active">{{ $trans('users.users_edit') }}</li>
                    </ul>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-6 right">
                </div>
            </div>
        </div>

        <div class="container">


            <div class="row">
                <div class="col-md-6 mb-3">
                    <div>
                        <label for="fullname">{{$trans('add_form.full_name')}} <span class="required">*</span></label>
                        <input class="form-control" v-model="user.fullname" id="fullname"
                               type="text"
                               :placeholder="$trans('add_form.full_name_plh')">
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div>
                        <label for="account_type">{{$trans('add_form.account_type')}} <span class="required">*</span></label>
                        <select class="form-control form-select mb-0"
                                v-model="user.account_type" id="account_type"
                                aria-label="Gender select example">
                            <option value="1">{{$trans('main.company')}}</option>
                            <option value="2">{{$trans('main.customer')}}</option>
                            <option value="3">{{$trans('main.partner')}}</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="email">{{$trans('add_form.email')}} <span class="required">*</span></label>
                        <input class="form-control" id="email" v-model="user.email" type="email"
                               placeholder="name@example.com"
                        >
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="phone">{{$trans('add_form.phone')}} <span class="required">*</span></label>
                        <the-mask class="form-control" id="phone" v-model="user.phone"
                                  mask="+966#########" value="" type="text"
                                  placeholder="+966#########"></the-mask>


                    </div>
                </div>
            </div>

            <div class="row align-items-center">
                <div class="col-md-6 mb-3">
                    <label>{{$trans('add_form.birthday_hijri')}} <span  v-if="user.wassel" class="required">*</span></label>
                    <div class="input-group">
                        <date-picker
                            v-model="user.birthday"
                            :locale="'en'" :calendar="'hijri'"
                            :format="'iYYYY-iMM-iDD'"
                            :color="'#000000'"
                            :inputClass="'form-control datepicker-input'"
                            :display-format="'iDD/iMM/iYYYY'"

                        ></date-picker>

                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="gender">{{$trans('add_form.gender')}}</label>
                    <select class="form-control form-select mb-0" id="gender" v-model="user.user_gender"
                            aria-label="Gender select example">
                        <option value="M">{{$trans('main.male')}}</option>
                        <option value="F">{{$trans('main.female')}}</option>
                    </select>
                </div>
            </div>


            <div class="row">
                <div class="col-sm-9 mb-3">
                    <div class="form-group">
                        <label for="address">{{$trans('add_form.address')}}</label>
                        <input class="form-control" id="address" v-model="user.address"
                               type="text"
                               :placeholder="$trans('add_form.address_plh')">
                    </div>
                </div>
                <div class="col-sm-3 mb-3">
                    <div class="form-group">
                        <label for="number">{{$trans('add_form.number')}}</label>
                        <input class="form-control" id="number" v-model="user.addressNo"
                               type="number" :placeholder="$trans('add_form.number_plh')">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4 mb-3">
                    <div class="form-group">
                        <label for="city">{{$trans('add_form.city')}}</label>
                        <input class="form-control" id="city" v-model="user.city" type="text"
                               :placeholder="$trans('add_form.city_plh')">
                    </div>
                </div>
                <div class="col-sm-4 mb-3">
                    <label for="state">{{$trans('add_form.state')}}</label>
                    <input class="form-control" id="state" v-model="user.state" type="text"
                           :placeholder="$trans('add_form.state')">
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="zip">{{$trans('add_form.zip')}}</label>
                        <the-mask mask="#####" v-model="user.zipCode"  class="form-control" id="zip" type="text"
                                  placeholder="11111"></the-mask>

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 mb-3">
                    <div>
                        <label for="map_layer">{{$trans('add_form.map')}}</label>
                        <input class="form-control" id="map_layer" v-model="user.maplayer"
                               type="text" :placeholder="$trans('add_form.map')"
                        >
                    </div>
                </div>

                <div class="col-sm-4 mb-3">
                    <div class="form-group">
                        <label for="longitude">{{$trans('add_form.long')}}</label>
                        <input class="form-control" id="longitude" v-model="user.long"
                               type="text" :placeholder="$trans('add_form.long')"
                        >
                    </div>
                </div>

                <div class="col-sm-4 mb-3">
                    <div class="form-group">
                        <label for="latitude">{{$trans('add_form.lat')}}</label>
                        <input class="form-control" id="latitude" v-model="user.lat" type="text"
                               :placeholder="$trans('add_form.lat')">
                    </div>
                </div>

                <div class="col-sm-4 mb-3">
                    <div class="form-group">
                        <label for="Approximation">{{$trans('add_form.approx')}}</label>
                        <input class="form-control" v-model="user.approximation"
                               id="Approximation" type="number" placeholder="12"
                        >
                    </div>
                </div>


                <div class="col-sm-6 mb-3">
                    <label for="coordinate_formula">{{$trans('add_form.coord_format')}}</label>
                    <select v-model="user.coordinate_format" class="form-control form-select w-100 mb-0"
                            id="coordinate_formula"
                            aria-label="State select example">
                        <option value="dd">{{$trans('add_form.dd')}}</option>
                        <option value="ddm">{{$trans('add_form.ddm')}}</option>
                        <option value="dms">{{$trans('add_form.dms')}}</option>

                    </select>
                </div>


                <div class="col-md-6 mb-3">
                    <label for="pol">{{$trans('add_form.pol')}}</label>
                    <input class="form-control" v-model="user.pol" id="pol" type="text"
                           placeholder="">

                </div>

            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <div class="form-check dashboard-check">
                        <input v-model="user.twelveHour" class="form-check-input"
                               type="checkbox" value="" id="12hours">
                        <label class="form-check-label" for="12hours">
                            <label for="12hours">{{$trans('add_form.12h')}}</label>
                        </label>
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <div class="form-check dashboard-check">
                        <input v-model="user.isDisabled" class="form-check-input"
                               type="checkbox" value="" id="disabled">
                        <label class="form-check-label" for="disabled">
                            <label for="disabled">{{$trans('add_form.disabled')}}</label>
                        </label>
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <div class="form-check dashboard-check">
                        <input v-model="user.isAdmin" class="form-check-input" type="checkbox"
                               value="0" id="admin">
                        <label class="form-check-label" for="admin">
                            <label for="admin">{{$trans('add_form.disabled')}}</label>
                        </label>
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <div class="form-check dashboard-check">
                        <input v-model="user.deviceReadOnly" class="form-check-input"
                               type="checkbox" value="" id="device_readonly">
                        <label class="form-check-label" for="device_readonly">
                            <label for="device_readonly">{{$trans('add_form.device_read_only')}}</label>
                        </label>
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <div class="form-check dashboard-check">
                        <input v-model="user.readOnly" class="form-check-input" type="checkbox"
                               value="" id="realonly">
                        <label class="form-check-label" for="realonly">
                            <label for="realonly">{{$trans('add_form.read_only')}}</label>
                        </label>
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <div class="form-check dashboard-check">
                        <input v-model="user.wassel" class="form-check-input" type="checkbox"
                               id="wassel">
                        <label class="form-check-label" for="wassel">
                            <label for="wassel">{{$trans('add_form.wassel')}}</label>
                        </label>
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <div class="form-check dashboard-check">
                        <input v-model="user.limitCommands" class="form-check-input"
                               type="checkbox" value="" id="limit_command">
                        <label class="form-check-label" for="limit_command">
                            <label for="limit_command">{{$trans('add_form.limit_cmd')}}</label>
                        </label>
                    </div>
                </div>
            </div>

            <div class="row align-items-center">
                <div class="col-md-6 mb-3">
                    <label >{{$trans('add_form.start_date')}}</label>
                    <div class="input-group">
                        <date-picker
                            v-model="user.start_date"
                            :locale="'en'" :calendar="'gregory'"
                            :format="'YYYY-MM-DD'"
                            :color="'#000000'"
                            :inputClass="'form-control datepicker-input'"
                            :display-format="'DD/MM/YYYY'"
                        ></date-picker>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label >{{$trans('add_form.exp_date')}}</label>
                    <div class="input-group">
                        <date-picker
                            v-model="user.expiry_date"
                            :locale="'en'" :calendar="'gregory'"
                            :format="'YYYY-MM-DD'"
                            :color="'#000000'"
                            :inputClass="'form-control datepicker-input'"
                            :display-format="'DD/MM/YYYY'"
                        ></date-picker>
                    </div>
                </div>

            </div>

            <div class="row align-items-center">

                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="max_users">{{$trans('add_form.max_users')}}</label>
                        <input v-model="user.max_users" class="form-control" id="max_users"
                               type="number" placeholder="0">
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label >{{$trans('add_form.max_devices')}}</label>
                        <input v-model="user.max_devices" class="form-control"
                               id="max_device" type="number" placeholder="0">
                    </div>
                </div>



                <div class="col-md-6 mb-3" v-if="user.account_type === '2'">
                    <div class="form-group">
                        <label for="id_number_i"> {{$trans('add_form.id_number')}}
                            <span class="required">*</span></label>
                        <the-mask mask="##########" v-model="user.ident_number" type="text"
                                  class="form-control" id="id_number_i"
                                  placeholder="100#######"></the-mask>
                    </div>
                </div>
            </div>

            <div class="row" v-for="(attr, index ) in user.attributes">
                <div class="col-sm-6 mb-3">
                    <label for="proprety"> {{$trans('add_form.property_name')}}</label>
                    <select v-model="attr.name" class="form-control form-select w-100 mb-0" id="proprety"
                            aria-label="State select example">

                        <option value="mail.smtp.host">{{ $trans('attr.attributeMailSmtpHost') }}
                        </option>
                        <option value="mail.smtp.port">{{ $trans('attr.attributeMailSmtpPort') }}
                        </option>
                        <option value="mail.smtp.starttls.enable">
                            {{ $trans('attr.attributeMailSmtpStarttlsEnable') }}
                        </option>
                        <option value="mail.smtp.starttls.required">
                            {{ $trans('attr.attributeMailSmtpStarttlsRequired') }}
                        </option>
                        <option value="mail.smtp.ssl.enable">
                            {{ $trans('attr.attributeMailSmtpSslEnable') }}
                        </option>
                        <option value="mail.smtp.ssl.trust">
                            {{ $trans('attr.attributeMailSmtpSslTrust') }}
                        </option>
                        <option value="mail.smtp.ssl.protocols">
                            {{ $trans('attr.attributeMailSmtpSslProtocols') }}
                        </option>
                        <option value="mail.smtp.from">{{ $trans('attr.attributeMailSmtpFrom') }}
                        </option>
                        <option value="mail.smtp.auth">{{ $trans('attr.attributeMailSmtpAuth') }}
                        </option>
                        <option value="mail.smtp.username">
                            {{ $trans('attr.attributeMailSmtpUsername') }}
                        </option>
                        <option value="mail.smtp.password">
                            {{ $trans('attr.attributeMailSmtpPassword') }}
                        </option>
                        <option value="web.liveRouteLength">
                            {{ $trans('attr.attributeWebLiveRouteLength') }}
                        </option>
                        <option value="web.selectZoom">{{ $trans('attr.attributeWebSelectZoom') }}
                        </option>
                        <option value="web.maxZoom">{{ $trans('attr.attributeWebMaxZoom') }}</option>
                        <option value="ui.disableReport">{{ $trans('attr.attributeUiDisableReport') }}
                        </option>
                        <option value="ui.disableEvents">{{ $trans('attr.attributeUiDisableEvents') }}
                        </option>
                        <option value="ui.disableVehicleFetures">
                            {{ $trans('attr.attributeUiDisableVehicleFetures') }}
                        </option>
                        <option value="ui.disableDrivers">
                            {{ $trans('attr.attributeUiDisableDrivers') }}
                        </option>
                        <option value="ui.disableComputedAttributes">
                            {{ $trans('attr.attributeUiDisableComputedAttributes') }}
                        </option>
                        <option value="ui.disableCalendars">
                            {{ $trans('attr.attributeUiDisableCalendars') }}
                        </option>
                        <option value="ui.disableMaintenance">
                            {{ $trans('attr.attributeUiDisableMaintenance') }}
                        </option>
                        <option value="ui.hidePositionAttributes">
                            {{ $trans('attr.attributeUiHidePositionAttributes') }}
                        </option>
                        <option value="distanceUnit">{{ $trans('attr.settingsDistanceUnit') }}</option>
                        <option value="speedUnit">{{ $trans('attr.settingsSpeedUnit') }}</option>
                        <option value="volumeUnit">{{ $trans('attr.settingsVolumeUnit') }}</option>
                        <option value="timezone">{{ $trans('attr.sharedTimezone') }}</option>
                        <option value="notificationTokens">{{
                                $trans('attr.attributeNotificationTokens')
                            }}
                        </option>

                    </select>
                </div>


                <div class="col-md-6 mb-3">
                    <label for="proprety_val">{{$trans('add_form.property_value')}}</label>
                    <input v-model="attr.value" class="form-control" id="proprety_val" type="text">

                </div>


            </div>


            <a @click="addElement(user.attributes)" class="clickable" >
                <span data-brackets-id="25270" class="fas fa-plus mr-2"></span>{{$trans('add_form.more')}}
            </a>

            <div class="row">

                <div class="col-12 text-center">
                    <div class="mt-3 mb-3 ">
                        <button type="submit" @click="updateUser" class="btn btn-success">{{$trans('action.save')}}</button>
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
            user: {
                lang: localStorage.getItem('lang'),
                attributes: [{
                    name: null,
                    value: null
                }],
            },
            idUser:null,

        }
    },
    async mounted () {
        this.idUser = this.$route.params.idUser;
        await this.getUser()
    },
    methods: {

        async updateUser(){
            let lang = localStorage.getItem('lang');
            this.isLoad = true;
            let id = this.idUser;
            await axios.put('/user/'+id, this.user, {
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


        async getUser() {
            let id = this.idUser;
            this.isLoad = true;
            await  axios.get('/user/'+id, {
                headers: this.tokenHeader
            }).then(({data}) => {
                this.isLoad = false;
                this.user.fullname = data.data.name;
                this.user.account_type = data.data.user.accountType;
                this.user.birthday = data.data.user.birthday;
                this.user.user_gender = data.data.user.gender;
                this.user.email = data.data.email;
                this.user.phone = data.data.phone;
                this.user.address = data.data.user.address;
                this.user.addressNo = data.data.user.addressNo;
                this.user.city = data.data.user.city;
                this.user.state = data.data.user.state;
                this.user.zipCode = data.data.user.zipCode;
                this.user.maplayer = data.data.user.mapLayer;
                this.user.wassel = data.data.user.wassel;
                this.user.ident_number = data.data.user.id_number;
                this.user.start_date = data.data.user.start_date;
                this.user.expiry_date = data.data.user.expiry_date;
                this.user.lat = data.data.latitude;
                this.user.long = data.data.longitude;
                this.user.approximation = data.data.zoom;
                this.user.coordinate_format = data.data.coordinateFormat;
                this.user.twelveHour = data.data.twelveHourFormat;
                this.user.pol = data.data.poiLayer;
                this.user.limitCommands = data.data.limitCommands;
                this.user.max_devices = data.data.deviceLimit;
                this.user.max_users = data.data.userLimit;
                this.user.readOnly = data.data.readonly;
                this.user.deviceReadOnly = data.data.deviceReadonly;
                this.user.isAdmin = data.data.administrator;

                let attrs = [];


                $.each(data.data.attributes, function(key, value) {
                    attrs.push({
                        name:key,
                        value:value
                    })
                });
                this.user.attributes = attrs;


            }).catch(({errors}) => {
                this.isLoad = false;
            });

        },

        addElement(obj) {
            obj.push({
                name: null,
                value: null
            })
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
