<template>
    <div>
        <select v-model="name"  class="form-select w-100 mb-0" id="proprety"
                aria-label="State select example">

            <option selected value=""></option>
            <option value="web.reportColor">{{$trans('attr.attributeWebReportColor')}}</option>
            <option value="devicePassword">{{$trans('attr.attributeDevicePassword')}}</option>
            <option value="processing.copyAttributes">{{$trans('attr.attributeProcessingCopyAttributes')}}</option>
            <option value="decoder.timezone">{{$trans('attr.sharedTimezone')}}</option>
            <option value="deviceInactivityStart">{{$trans('attr.attributeDeviceInactivityStart')}}</option>
            <option value="deviceInactivityPeriod">{{$trans('attr.attributeDeviceInactivityPeriod')}}</option>
            <option value="speedLimit">{{$trans('attr.attributeSpeedLimit')}}</option>
            <option value="report.ignoreOdometer">{{$trans('attr.attributeReportIgnoreOdometer')}}</option>

        </select>

    </div>
</template>

<script>
export default {
    name: 'DeviceAttributes',
    props: {
        name: String
    }
}
</script>
