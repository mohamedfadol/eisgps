<template>
    <div>
        <loading :active.sync="isLoad"
                 :is-full-page="fullPage"
                 :height="loaderHeight"
                 :width="loaderWidth"
                 :color="loaderColor"
                 :loader="loaderType"
                 :background-color="loaderBgColor"></loading>
<!--        <div class="d-block mb-4 mt-4 mb-md-0">-->
<!--            <nav aria-label="breadcrumb" class="d-none d-md-inline-block">-->
<!--                <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">-->
<!--                    <li class="breadcrumb-item"><a href="#"><span class="fas fa-home"></span></a></li>-->

<!--                    <li class="breadcrumb-item active" aria-current="page">-->
<!--                        <router-link :to="{name:'commands-list'}">{{$trans('commands.commands_list')}}</router-link>-->
<!--                    </li>-->

<!--                    <li class="breadcrumb-item active" aria-current="page">-->
<!--                        {{$trans('commands.update_cmd')}}-->
<!--                    </li>-->
<!--                </ol>-->
<!--            </nav>-->
<!--        </div>-->


<!--        <div class="row">-->
<!--            <div class="col-12">-->
<!--                <form @submit.prevent="updateCommand">-->
<!--                    <div class="card card-body bg-white border-light shadow-sm mb-4">-->


<!--                        <h2 class="h5 my- title_user">{{$trans('commands.update_cmd')}}</h2>-->

<!--                        <div class="row" style = "margin-top: 3%;">-->
<!--                            <div class="col-sm-6 mb-3">-->
<!--                                <label for="desc">{{$trans('commands.desc')}}</label>-->
<!--                                <input v-model="command.description" class="form-control" id="desc" type="text"  >-->
<!--                            </div>-->


<!--                            <div class="col-md-6 mb-3">-->
<!--                                <label for="cmd_type">{{$trans('commands.type')}}</label>-->
<!--                                <select v-model="command.type" class="form-select w-100 mb-0" id="cmd_type" name="state" aria-label="State select example">-->

<!--                                    <option value="custom">Custom command</option>-->
<!--                                    <option value="deviceIdentification">Device Identification</option>-->
<!--                                    <option value="positionSingle">Single Reporting</option>-->
<!--                                    <option value="positionPeriodic">Periodic Reporting</option>-->
<!--                                    <option value="positionStop">Stop Reporting</option>-->
<!--                                    <option value="engineStop">Engine Stop</option>-->
<!--                                    <option value="engineResume">Engine Resume</option>-->
<!--                                    <option value="alarmArm">Arm Alarm</option>-->
<!--                                    <option value="alarmDisarm">Disarm Alarm</option>-->
<!--                                    <option value="alarmDismiss">Dismiss Alarm</option>-->

<!--                                    &lt;!&ndash;                                    "commandSetTimezone": "Set Timezone",&ndash;&gt;-->
<!--                                    &lt;!&ndash;                                    "commandRequestPhoto": "Request Photo",&ndash;&gt;-->
<!--                                    &lt;!&ndash;                                    "commandPowerOff": "Power Off Device",&ndash;&gt;-->
<!--                                    &lt;!&ndash;                                    "commandRebootDevice": "Reboot Device",&ndash;&gt;-->
<!--                                    &lt;!&ndash;                                    "commandFactoryReset": "Factory Reset",&ndash;&gt;-->
<!--                                    &lt;!&ndash;                                    "commandSendSms": "Send SMS",&ndash;&gt;-->
<!--                                    &lt;!&ndash;                                    "commandSendUssd": "Send USSD",&ndash;&gt;-->
<!--                                    &lt;!&ndash;                                    "commandSosNumber": "Set SOS Number",&ndash;&gt;-->
<!--                                    &lt;!&ndash;                                    "commandSilenceTime": "Set Silence Time",&ndash;&gt;-->
<!--                                    &lt;!&ndash;                                    "commandSetPhonebook": "Set Phonebook",&ndash;&gt;-->
<!--                                    &lt;!&ndash;                                    "commandVoiceMessage": "Voice Message",&ndash;&gt;-->
<!--                                    &lt;!&ndash;                                    "commandOutputControl": "Output Control",&ndash;&gt;-->
<!--                                    &lt;!&ndash;                                    "commandVoiceMonitoring": "Voice Monitoring",&ndash;&gt;-->
<!--                                    &lt;!&ndash;                                    "commandSetAgps": "Set AGPS",&ndash;&gt;-->
<!--                                    &lt;!&ndash;                                    "commandSetIndicator": "Set Indicator",&ndash;&gt;-->
<!--                                    &lt;!&ndash;                                    "commandConfiguration": "Configuration",&ndash;&gt;-->
<!--                                    &lt;!&ndash;                                    "commandGetVersion": "Get Version",&ndash;&gt;-->
<!--                                    &lt;!&ndash;                                    "commandFirmwareUpdate": "Update Firmware",&ndash;&gt;-->
<!--                                    &lt;!&ndash;                                    "commandSetConnection": "Set Connection",&ndash;&gt;-->
<!--                                    &lt;!&ndash;                                    "commandSetOdometer": "Set Odometer",&ndash;&gt;-->
<!--                                    &lt;!&ndash;                                    "commandGetModemStatus": "Get Modem Status",&ndash;&gt;-->
<!--                                    &lt;!&ndash;                                    "commandGetDeviceStatus": "Get Device Status",&ndash;&gt;-->
<!--                                    &lt;!&ndash;                                    "commandSetSpeedLimit": "Set Speed Limit",&ndash;&gt;-->
<!--                                    &lt;!&ndash;                                    "commandModePowerSaving": "Modify Power Saving",&ndash;&gt;-->
<!--                                    &lt;!&ndash;                                    "commandModeDeepSleep": "Modify Deep Sleep",&ndash;&gt;-->
<!--                                    &lt;!&ndash;                                    "commandMovementAlarm": "Movement Alarm",&ndash;&gt;-->
<!--                                    &lt;!&ndash;                                    "commandFrequency": "Frequency",&ndash;&gt;-->
<!--                                    &lt;!&ndash;                                    "commandTimezone": "Timezone Offset",&ndash;&gt;-->
<!--                                    &lt;!&ndash;                                    "commandMessage": "Message",&ndash;&gt;-->
<!--                                    &lt;!&ndash;                                    "commandRadius": "Radius",&ndash;&gt;-->
<!--                                    &lt;!&ndash;                                    "commandEnable": "Enable",&ndash;&gt;-->
<!--                                    &lt;!&ndash;                                    "commandData": "Data",&ndash;&gt;-->
<!--                                    &lt;!&ndash;                                    "commandIndex": "Index",&ndash;&gt;-->
<!--                                    &lt;!&ndash;                                    "commandPhone": "Phone Number",&ndash;&gt;-->
<!--                                    &lt;!&ndash;                                    "commandServer": "Server",&ndash;&gt;-->
<!--                                    &lt;!&ndash;                                    "commandPort": "Port",&ndash;&gt;-->

<!--                                </select>-->
<!--                            </div>-->



<!--                        </div>-->

<!--                        <div class="row">-->


<!--                            <div class="col-md-6 mb-3">-->
<!--                                <label for="dev_protocol">{{$trans('commands.dev_protocol')}}</label>-->
<!--                                <input v-model="command.device" class="form-control" id="dev_protocol" type="text"  >-->
<!--                            </div>-->

<!--                            <div class="col-sm-6 mb-3">-->
<!--                                <label for="data">{{$trans('commands.data')}}</label>-->
<!--                                <input v-model="command.data" class="form-control" id="data" type="text"  >-->
<!--                            </div>-->

<!--                        </div>-->

<!--                        <div class="row">-->
<!--                            <div class="col-md-6 mb-3">-->
<!--                                <div class="form-check dashboard-check">-->
<!--                                    <input v-model="command.sendSMS" class="form-check-input" type="checkbox" value="" id="userCheck55">-->
<!--                                    <label class="form-check-label" for="userCheck55">-->
<!--                                        <label for="userCheck55">{{$trans('commands.send_sms')}}</label>-->
<!--                                    </label>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->



<!--                        <div class="mt-3 text-right" style="margin-top: 5%;">-->
<!--                            <button type="submit" class="btn btn-success">{{$trans('commands.update')}}</button>-->
<!--                        </div>-->



<!--                        &lt;!&ndash;*****************************************************************&ndash;&gt;-->

<!--                    </div>-->
<!--                </form>-->
<!--            </div>-->
<!--        </div>-->
    </div>
</template>

<script>

export default {
    data () {
        return {
            command:{
                lang: localStorage.getItem('lang'),
                description:null,
                type:null,
                data:null,
                sendSMS:null,
            },
            cmd:null
        }
    },
    mounted () {
        this.cmd = this.$route.params.idCmd;
        this.getCommand();
    },
    methods: {
        updateCommand(){
            this.isLoad = true;
            let id = this.cmd;
            axios.put('/command/'+id,this.command,{
                headers: this.tokenHeader
            }).then(({data}) => {
                this.isLoad = false;
                if(data.success === true){

                    Swal.fire(
                        data.message,
                        "",
                        'success'
                    )
                }else{
                    Swal.fire(
                        this.$trans('action.error'),
                        data.message,
                        'error'
                    )
                }

            }).catch(({errors}) => {
                this.isLoad = false;
            });
        },

        getCommand(){

            let id = this.cmd;
            this.isLoad = true;
            axios.get('/command/'+id,{
                headers: this.tokenHeader
            }).then(({data}) => {
                this.isLoad = false;
                this.command.description = data.data.description;
                this.command.type = data.data.type;
                this.command.data = data.data.attributes.data;
                this.command.sendSMS = data.data.textChannel;
                this.command.device = data.data.device;


            }).catch(({errors}) => {
                this.isLoad = false;
            });
        }
    }
}
</script>

