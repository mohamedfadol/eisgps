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
                            <router-link :to="{name:'drivers-list'}">{{ $trans('menu.drivers-list') }}</router-link>
                        </li>
                        <li class="breadcrumb-item active">{{ $trans('drivers.edit_driver') }}</li>
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
                        <label for="fullname_driver">{{ $trans('add_form.driver_name') }}
                            <span  class="required">*</span></label>
                        <input id="fullname_driver" v-model="driver.full_name"
                               class="form-control" type="text"
                               placeholder="Enter driver full name">
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div>
                        <label for="driver_id_number">{{ $trans('add_form.driver_id') }} <span
                             class="required">*</span></label>
                        <the-mask mask="##########" id="driver_id_number"
                                  v-model="driver.driver_id_number" class="form-control"
                                  type="text" placeholder="1234567890"></the-mask>

                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="driver_mobile">{{ $trans('add_form.driver_mobile') }} <span
                             class="required">*</span></label>
                        <the-mask class="form-control" v-model="driver.driver_mobile"
                                  mask="+966#########" id="driver_mobile" type="text"
                                  placeholder="+966#########"></the-mask>

                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label >{{ $trans('add_form.driver_birthday') }} <span
                         class="required">*</span></label>
                    <div class="input-group">
                        <date-picker
                            v-model="driver.driver_birthday"
                            :locale="'en'" :calendar="'hijri'"
                            :format="'iYYYY-iMM-iDD'"
                            :color="'#000000'"
                            :inputClass="'form-control datepicker-input'"
                            :display-format="'iDD/iMM/iYYYY'"

                        ></date-picker>

                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="driver_gender">{{ $trans('add_form.driver_gender') }}</label>
                    <select v-model="driver.driver_gender" class="form-control form-select mb-0"
                            id="driver_gender" aria-label="Gender select example">
                        <option value="M">{{$trans('main.male')}}</option>
                        <option value="F">{{$trans('main.female')}}</option>
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="driver_email">{{ $trans('add_form.email') }}</label>
                        <input v-model="driver.driver_email" class="form-control"
                               id="driver_email" type="email" placeholder="name@company.com">
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="nationality">{{ $trans('add_form.driver_nationality') }}</label>
                        <input v-model="driver.driver_nationality" class="form-control"
                               id="nationality" type="text">
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="lic_type">{{ $trans('add_form.driver_lic_type') }} </label>
                        <select v-model="driver.driver_licence_type" id="lic_type"
                                class="form-control form-select mb-0" aria-label="">
                            <option value="تصدير">تصدير</option>
                            <option value="دبلوماسي">دبلوماسي</option>
                            <option value="مؤقت">مؤقت</option>
                            <option value="معدات ثقيلة">معدات ثقيلة</option>
                            <option value="رخصة سير نقل عام">رخصة سير نقل عام</option>
                            <option value="رخصة سير نقل خاص">رخصة سير نقل خاص</option>
                            <option value="رخصة سير مركبة أشغال عامة">رخصة سير مركبة أشغال عامة
                            </option>
                            <option value="رخصة سير سيارة أجرة">رخصة سير سيارة أجرة</option>
                            <option value="رخصة سير دراجة الية">رخصة سير دراجة الية</option>
                            <option value="رخصة سير خاصة">رخصة سير خاصة</option>
                            <option value="رخصة سير حافلة صغيرة">رخصة سير حافلة صغيرة</option>
                            <option value="رخصة سير حافلة عامة">رخصة سير حافلة عامة</option>

                        </select>

                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label >{{ $trans('add_form.driver_date_lic') }}</label>
                        <date-picker
                            v-model="driver.driver_date_issuance"
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
                        <label >{{ $trans('add_form.driver_exp_lic') }}</label>
                        <date-picker
                            v-model="driver.driver_license_expiration"
                            :locale="'en'" :calendar="'gregory'"
                            :format="'YYYY-MM-DD'"
                            :color="'#000000'"
                            :inputClass="'form-control datepicker-input'"
                            :display-format="'DD/MM/YYYY'"
                        ></date-picker>

                    </div>
                </div>



            </div>
            <div class="row">

                <div class="col-12 text-center">
                    <div class="mt-3 mb-3 ">
                        <button type="submit" @click="updateDriver" class="btn btn-success">{{$trans('action.save')}}</button>
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
            driver: {
                lang: localStorage.getItem('lang'),
            },
            idDriver:null,

        }
    },
    async mounted () {
        this.idDriver = this.$route.params.idDriver;
        await this.getDriver()
    },
    methods: {

        async updateDriver(){
            let lang = localStorage.getItem('lang');
            this.isLoad = true;
            let id = this.idDriver;
            await axios.put('/driver/'+id, this.driver, {
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


        async getDriver() {
            let id = this.idDriver;
            this.isLoad = true;
            await  axios.get('/driver/'+id, {
                headers: this.tokenHeader
            }).then(({data}) => {
                this.isLoad = false;
                this.driver.full_name = data.data.name;
                this.driver.driver_id_number = data.data.uniqueId;
                this.driver.driver_birthday = data.data.driver.birthday;
                this.driver.driver_gender = data.data.driver.gender;
                this.driver.driver_email = data.data.driver.email;
                this.driver.driver_mobile = data.data.driver.phone;
                this.driver.driver_nationality = data.data.driver.nationality;
                this.driver.driver_licence_type = data.data.driver.licence_type;
                this.driver.driver_date_issuance = data.data.driver.date_licence;
                this.driver.driver_license_expiration = data.data.driver.exp_date_licence;



            }).catch(({errors}) => {
                this.isLoad = false;
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
