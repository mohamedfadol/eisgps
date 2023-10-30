<template>
<div>
    <select v-model="name"  class="form-select w-100 mb-0" id="proprety"
            aria-label="State select example">

        <option selected value=""></option>
        <option value="mail.smtp.host">{{$trans('attr.xxx')}}</option>
        <option value="mail.smtp.port">{{$trans('attr.xxx')}}</option>
        <option value="mail.smtp.starttls.enable">{{$trans('attr.xxx')}}</option>
        <option value="mail.smtp.starttls.required">{{$trans('attr.xxx')}}</option>
        <option value="mail.smtp.ssl.enable">{{$trans('attr.xxx')}}</option>
        <option value="mail.smtp.ssl.trust">{{$trans('attr.xxx')}}</option>
        <option value="mail.smtp.ssl.protocols">{{$trans('attr.xxx')}}</option>
        <option value="mail.smtp.from">{{$trans('attr.xxx')}}</option>
        <option value="mail.smtp.auth">{{$trans('attr.xxx')}}</option>
        <option value="mail.smtp.username">{{$trans('attr.xxx')}}</option>
        <option value="web.liveRouteLength">{{$trans('attr.xxx')}}</option>
        <option value="web.selectZoom">{{$trans('attr.xxx')}}</option>
        <option value="web.maxZoom">{{$trans('attr.xxx')}}</option>
        <option value="ui.disableReport">{{$trans('attr.xxx')}}</option>
        <option value="ui.disableEvents">{{$trans('attr.attributeUiDisableEvents')}}</option>
        <option value="ui.disableVehicleFetures">{{$trans('attr.attributeUiDisableVehicleFetures')}}</option>
        <option value="ui.disableDrivers">{{$trans('attr.attributeUiDisableDrivers')}}</option>
        <option value="ui.disableComputedAttributes">{{ $trans('attr.attributeUiDisableComputedAttributes') }}</option>
        <option value="ui.disableCalendars">{{ $trans('attr.attributeUiDisableCalendars') }}</option>
        <option value="ui.disableMaintenance">{{ $trans('attr.attributeUiDisableMaintenance') }}</option>
        <option value="ui.hidePositionAttributes">{{ $trans('attr.attributeUiHidePositionAttributes') }}</option>
        <option value="distanceUnit">{{ $trans('attr.settingsDistanceUnit') }}</option>
        <option value="speedUnit">{{ $trans('attr.settingsSpeedUnit') }}</option>
        <option value="volumeUnit">{{ $trans('attr.settingsVolumeUnit') }}</option>
        <option value="timezone">{{ $trans('attr.sharedTimezone') }}</option>
        <option value="notificationTokens">{{ $trans('attr.attributeNotificationTokens') }}</option>

    </select>

</div>
</template>

<script>
export default {
    name: 'UserAttributes',
    props: {
        name: String
    }
}
</script>
