<template>
    <div class="body">
        <loading :active.sync="isLoad"
                 :is-full-page="fullPage"
                 :height="loaderHeight"
                 :width="loaderWidth"
                 :color="loaderColor"
                 :loader="loaderType"
                 :background-color="loaderBgColor"></loading>
        <section class="d-flex align-items-center  mt-lg-6 mb-lg-5 ">
            <div class="ol-sm-12 col-md-12 col-lg-12 col-xl-4 d-flex align-items-center justify-content-center conten2">
                <div class="login-main login-sign" v-if="firstStep" >

                    <div class="image-login">
                        <img src="/new/img/Group 15.png" class="Group-15">
                    </div>

                    <div class="both">


                        <div class="btn-login">
                            <button class="Group-2155" @click="toSecondView">تسجيل دخول</button>
                        </div>

                        <div class="text-link">
                            <p>
                                تسجيلك الدخول تكون قد وافقت على
                                <br>
                                <a href="#" class="link-login">الشروط والاحكام وعلى سياسة الضمان والارجاع</a>
                            </p>
                        </div>
                    </div>

                </div>
                <div class="login-main login-sign" v-if="secondStep" >

                    <div class="image-login">
                        <img src="/new/img/Group 15.png" class="Group-15">
                    </div>

                    <div class="both">
                        <div class="title-div text-light text-center">
                            <h3>تاكيد رقم الهاتف</h3>
                            <p>الرجاء إدخال رقم الهاتف التابع لحسابك لإرسال رمز الدخول</p>
                        </div>

                        <div class="form-group">
                            <!-- Form -->
                            <div class="form-group my-5">
                                <div class="input-group">
                                    <the-mask class="form-control" id="mobile" v-model="user.mobile"
                                              mask="+966#########" value="" type="text"
                                              placeholder="+966 _ _ _ _ _ _ _ _ _"></the-mask>
                                </div>
                                <div class="btn-login">
                                    <button class="Group-2155" @click="LoginMe">إرسال</button>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
                <div class="login-main login-sign" v-if="thirdStep" >

                    <div class="image-login">
                        <img src="/new/img/Group 15.png" class="Group-15">
                    </div>

                    <div class="both">
                        <div class="title-div text-light text-center">
                            <h3>تاكيد رمز التحقق</h3>
                            <p>الرجاء ادخال
                                رمز التحقق المرسل إلى رقم الهاتف الخاص بك</p>
                        </div>
                        <div style="color:white"> FOR DEV MODE ONLY : {{devCode}}</div>

                        <div class="form-group">
                            <!-- Form -->
                            <div class="form-group my-5">
                                <div class="input-group">
                                    <CodeInput :loading="false" :fieldWidth="50"  class="" v-on:change="onChange" v-on:complete="onComplete" />
                                </div>

                            </div>

                            <div class="link-send2 text-light text-center ">
                                <p>لم تحصل على الكود</p>
                                <a href="#" @click="LoginMe" >إرسال مرة أخرى</a>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </section>



        <!--                            <div v-if="thirdStep" >-->

        <!--                                <div class="title-div">-->
        <!--                                    <h3>تاكيد رقم الهاتف</h3>-->
        <!--                                    <p>الرجاء ادخال-->
        <!--                                        رمز التحقق المرسل إلى رقم الهاتف الخاص بك</p>-->
        <!--                                </div>-->
        <!--                                <div style="color:black"> FOR DEV MODE ONLY : {{devCode}}</div>-->

        <!--                                <div >-->

        <!--                                    <CodeInput :loading="false" :fieldWidth="50"  class="" v-on:change="onChange" v-on:complete="onComplete" />-->

        <!--                                </div>-->

        <!--                                <div class="link-send2">-->
        <!--                                    <p>لم تحصل على الكود؟</p>-->
        <!--                                    <a href="#" @click="toSecondView">إرسال مرة أخرى</a>-->
        <!--                                </div>-->
        <!--                            </div>-->

        <!--                            <div class="d-flex justify-content-center my-4">-->
        <!--                                <a href="#" class="btn btn-icon-only btn-pill btn-outline-light text-facebook mr-2" type="button" aria-label="facebook button" title="facebook button">-->
        <!--                                    <span aria-hidden="true" class="fab fa-facebook-f"></span>-->
        <!--                                </a>-->
        <!--                                <a href="#" class="btn btn-icon-only btn-pill btn-outline-light text-twitter mr-2" type="button" aria-label="twitter button" title="twitter button">-->
        <!--                                    <span aria-hidden="true" class="fab fa-twitter"></span>-->
        <!--                                </a>-->
        <!--                                <a href="#" class="btn btn-icon-only btn-pill btn-outline-light text-facebook" type="button" aria-label="github button" title="github button">-->
        <!--                                    <span aria-hidden="true" class="fab fa-github"></span>-->
        <!--                                </a>-->
        <!--                            </div>-->

        <!--                        </div>-->
        <!--                        &#45;&#45;-->
        <!--                    </div>-->
        <!--                    <div class="col-md-8">-->

        <!--                    </div>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--        </section>-->
    </div>

    <!--    <div>-->

    <!--        <div v-if="firstStep" class="login-main">-->

    <!--            <div class="image-login">-->
    <!--                <img src="/new/img/logo_eisgps.png" class="Group-15">-->
    <!--            </div>-->

    <!--            <div class="both">-->


    <!--                <div class="btn-login">-->
    <!--                    <button @click="toSecondView" class="Group-2155">تسجيل دخول</button>-->
    <!--                </div>-->

    <!--                <div class="text-link">-->
    <!--                    <p>-->
    <!--                        تسجيلك الدخول تكون قد وافقت على-->
    <!--                        <br>-->
    <!--                        <a href ="#" class="link-login">الشروط والاحكام وعلى سياسة الضمان والارجاع</a>-->
    <!--                    </p>-->
    <!--                </div>-->
    <!--            </div>-->

    <!--        </div>-->
    <!--            <div v-if="secondStep" class="main-sign">-->

    <!--                <div class="title-div">-->
    <!--                    <h3>أدخل رقم الهاتف</h3>-->
    <!--                    <p>الرجاء ادخال رقم الهاتف الخاص بك لاتمام عملية التسجيل بنجاح</p>-->
    <!--                </div>-->

    <!--                <div class="input-number">-->
    <!--                    <label>-->
    <!--                        <the-mask class="form-control" id="mobile" v-model="user.mobile"-->
    <!--                                  mask="+966#########" value="" type="text"-->
    <!--                                  placeholder="+966 _ _ _ _ _ _ _ _ _"></the-mask>-->
    <!--                    </label>-->
    <!--                </div>-->

    <!--                <div class="">-->
    <!--                    <button @click="LoginMe" class="Rectangle-2"> إرسال</button>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--            <div v-if="thirdStep" class="main-sign">-->

    <!--                <div class="title-div">-->
    <!--                    <h3>تاكيد رقم الهاتف</h3>-->
    <!--                    <p>الرجاء ادخال-->
    <!--                        رمز التحقق المرسل إلى رقم الهاتف الخاص بك</p>-->
    <!--                </div>-->
    <!--                <div style="color:white"> FOR DEV MODE ONLY : {{devCode}}</div>-->

    <!--                <div class="input-number">-->

    <!--                    <CodeInput :loading="false"  class="" v-on:change="onChange" v-on:complete="onComplete" />-->

    <!--                </div>-->

    <!--                <div class="link-send2">-->
    <!--                    <p>لم تحصل على الكود؟</p>-->
    <!--                    <a href="#" @click="toSecondView">إرسال مرة أخرى</a>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    <main class="mm">-->

    <!--        <section class="container d-flex align-items-center justify-content-start main-section w-100">-->

    <!--            &lt;!&ndash;content&ndash;&gt;-->
    <!--            <div class=" d-flex align-items-center justify-content-center mt-5 pt-6">-->

    <!--                <div class="bg-white shadow-soft border rounded border-light px-4 p-4 w-100 fmxw-700">-->
    <!--                    <div class="col-12 text-sm-center">-->
    <!--                        {{ $trans('login.switch') }}-->
    <!--                        <a @click="changeLang"> <img width="32" height="32" alt="" :src="lang_image"></a>-->

    <!--                    </div>-->
    <!--                    <div class="text-center text-md-center mb-3 mt-md-0">-->
    <!--                        <h3>{{ $trans('login.sign_text') }}</h3>-->
    <!--                    </div>-->
    <!--                    <form @submit.prevent="LoginMe"  class="mt-4">-->
    <!--                        &lt;!&ndash; Form &ndash;&gt;-->
    <!--                        <div class="form-group mb-3">-->

    <!--                            <div class="input-group input-group2">-->
    <!--                                <span class="input-group-text"><span class="fas fa-envelope"></span></span>-->
    <!--                                <input type="email" class="form-control" placeholder="example@company.com" v-model="user.email" id="email" autofocus="" required="">-->
    <!--                            </div>-->
    <!--                        </div>-->
    <!--                        &lt;!&ndash; End of Form &ndash;&gt;-->

    <!--                        &lt;!&ndash; Form &ndash;&gt;-->
    <!--&lt;!&ndash;                        <div class="form-group mb-3">&ndash;&gt;-->

    <!--&lt;!&ndash;                            <div class="input-group input-group">&ndash;&gt;-->
    <!--&lt;!&ndash;                                                        <span class="input-group-text" id="basic-addon1">&ndash;&gt;-->
    <!--&lt;!&ndash;                                                            <span class="fas fa-phone-alt"></span></span>&ndash;&gt;-->
    <!--&lt;!&ndash;                                <input type="tel" class="form-control" placeholder="+123 12-123-1234" autofocus&ndash;&gt;-->
    <!--&lt;!&ndash;                                       required>&ndash;&gt;-->
    <!--&lt;!&ndash;                            </div>&ndash;&gt;-->
    <!--&lt;!&ndash;                        </div>&ndash;&gt;-->
    <!--                        &lt;!&ndash; End of Form &ndash;&gt;-->

    <!--                        <div class="form-group">-->
    <!--                            &lt;!&ndash; Form &ndash;&gt;-->
    <!--                            <div class="form-group mb-3">-->
    <!--                                <div class="input-group input-group">-->
    <!--                                    <span class="input-group-text" id="basic-addon2"><span class="fas fa-unlock-alt"></span></span>-->
    <!--                                    <input type="password" placeholder="Password" class="form-control" v-model="user.password"  id="password" required="">-->
    <!--                                </div>-->
    <!--                            </div>-->
    <!--                            &lt;!&ndash; End of Form &ndash;&gt;-->
    <!--                            <div class="d-flex justify-content-between align-items-top mb-3">-->

    <!--                                <div><a href="#" class="small text-right">{{ $trans('login.lost_password') }}</a></div>-->
    <!--                            </div>-->
    <!--                        </div>-->
    <!--                        <button type="submit" class="btn btn-block btn-primary login-btn-color">{{ $trans('login.sign_btn') }}</button>-->
    <!--                    </form>-->

    <!--                    <div class="error-msg" v-if="err_message">-->
    <!--                        <i class="material-icons icon_alert_error">-->
    <!--                            warning-->
    <!--                        </i>{{message}}-->
    <!--                    </div>-->

    <!--                    <div class="d-flex justify-content-center m-t-10">-->
    <!--                        <a href="#" class="btn btn-icon-only btn-pill  text-facebook mr-2" type="button" aria-label="facebook button" title="facebook button">-->
    <!--                            <span aria-hidden="true" class="fab fa-facebook-f"></span>-->
    <!--                        </a>-->
    <!--                        <a href="#" class="btn btn-icon-only btn-pill  text-twitter mr-2" type="button" aria-label="twitter button" title="twitter button">-->
    <!--                            <span aria-hidden="true" class="fab fa-twitter"></span>-->
    <!--                        </a>-->
    <!--                        <a href="#" class="btn btn-icon-only btn-pill  text-facebook" type="button" aria-label="github button" title="github button">-->
    <!--                            <span aria-hidden="true" class="fab fa-google"></span>-->
    <!--                        </a>-->
    <!--                    </div>-->

    <!--                </div>-->


    <!--            </div>-->

    <!--        </section>-->



    <!--    </main>-->
</template>
<script>
import {TheMask} from 'vue-the-mask'
import CodeInput from "vue-verification-code-input";

export default {
    components: {TheMask,CodeInput},
    data(){
        return {
            lang_image : "/assets/img/en.png",
            errors: [],
            message: null,
            err_message:false,
            user: {
                mobile:null,
                sms_lang:'ar',
            },
            devCode:null,
            confirm:{
                code:null,
                mobile :null
            },
            firstStep:true,
            secondStep:false,
            thirdStep:false,

        }
    },
    beforeMount(){

    },
    mounted() {
        let token =  localStorage.getItem('eisgps-token');
        let user =  localStorage.getItem('user');
        let loginToken =  localStorage.getItem('loginToken');

        if(token !== null && user !== null && loginToken !== null)
        {
            this.$router.push({name:'home'})
        }

        this.getLanguageImage();
    },
    methods : {
        getLanguageImage(){
            if(this.$lang.getLocale() === "en"){
                this.lang_image = "/assets/img/en.png";
            }else{
                this.lang_image = "/assets/img/ar.png";
            }

            localStorage.setItem('lang',this.$lang.getLocale());
        },
        changeLang(){
            if(this.$lang.getLocale() === "en"){
                this.$lang.setLocale('ar');
                this.$moment.locale('en-tn')
                this.lang_image = "/assets/img/ar.png";
            }else{
                this.$lang.setLocale('en');
                this.$moment.locale('en-gb')
                this.lang_image = "/assets/img/en.png";
            }
            localStorage.setItem('lang',this.$lang.getLocale());
        },
        LoginMe() {
            this.isLoad = true;
            this.err_message = false;
            axios.post('/mobile/login/request',this.user)
                .then(({data}) => {
                    this.isLoad = false;
                    if(data.success === false){
                        let lang = localStorage.getItem('lang');
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: data.message[lang],
                        })
                    }else{
                        this.devCode = data.code;
                        this.toThirdView()
                    }
                })
                .catch(({errors}) => {
                    this.isLoad = false;
                    this.err_message = true;
                    this.message = "ERROR On login"
                });
        },
        toSecondView(){
            this.firstStep = false;
            this.secondStep = true;
            this.thirdStep = false;
        },
        toThirdView(){
            this.firstStep = false;
            this.secondStep = false;
            this.thirdStep = true;

        },
        onChange(v) {

        },
        onComplete(v) {
            this.isLoad = true;
            this.confirm.mobile = this.user.mobile;
            this.confirm.code = v;
            axios.post('/mobile/login/confirm',this.confirm)
                .then(({data}) => {
                    this.isLoad = false;
                    if(data.success === false){
                        let lang = localStorage.getItem('lang');
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: data.message[lang],
                        })
                    }else{

                        localStorage.setItem('eisgps-token', data.token);
                        localStorage.setItem('user', JSON.stringify(data.user));
                        localStorage.setItem('loginToken', data.loginToken);
                        this.$router.push({name:'home'});
                    }
                })
                .catch(({errors}) => {
                    this.isLoad = false;
                    this.err_message = true;
                    this.message = "ERROR On login"
                });

        }



    }
}
</script>

<style lang="scss">
@import "../../../../public/new/css/style.default.css";
@import "../../../../public/new/css/new-style.css";
@import "../../../../public/new/css/style-login.css";

.mt-55{
    margin-top: 5rem !important;
}

.policy{
    color: black;
}


//
//.main-sign{
//    min-height: 100vh !important;
//    height: auto;
//    text-align: center;
//}
//.btn-send {
//    margin-top: 20px !important;
//}
//.link-send2{
//    margin-top: 20px !important;
//}
//.react-code-input-container{
//    width: auto !important;
//}
</style>
