<template>
    <div>
        <loading :active.sync="isLoad"
                 :is-full-page="fullPage"
                 :height="loaderHeight"
                 :width="loaderWidth"
                 :color="loaderColor"
                 :loader="loaderType"
                 :background-color="loaderBgColor"></loading>
        <!-- carousel-->
        <div id="" class="carousel slide a " >
            <div class="carousel-inner mx-5 w-auto">
                <!--  -->
                <div class="carousel-item active border-0">
                    <div class="d-grid w-100">
                        <div class="row">

                            <div class="car-item car-click col-1 d-flex justify-content-center align-items-center flex-column">
                                <img src="/new/img/carimg.svg" class="icon-w" alt="test">
                                <p class="mt-2 mb-0">{{infoBar.deviceName}}</p>
                                <p class="mt-2 mb-0">{{infoBar.plateNumber}} </p>
                            </div>


                            <div class="car-item col-1 d-flex justify-content-center align-items-center flex-column">
                                <img src="/new/img/Icon ionic-ios-speedometer.svg" class="icon-w" alt="test">
                                <p class="mt-2 mb-0">{{infoBar.status}} </p>
                            </div>


                            <div class="car-item col-2 d-flex justify-content-center align-items-center flex-column">
                                <img src="/new/img/Icon ionic-md-speedometer.svg" class="icon-w " alt="test">
                                <p class="mt-2 mb-0"> 120 Km/h  </p>

                            </div>

                            <div class="car-item col-2 d-flex justify-content-center align-items-center flex-column">
                                <img src="/new/img/Icon awesome-power-off.svg" class="icon-w " alt="test">
                                <p class="mt-2 mb-0 text-truncate">9:00PM  </p>
                                <p class="mt-2 mb-0 text-truncate">15/7/2020  </p>
                            </div>

                            <div class="car-item col-2 d-flex justify-content-center align-items-center flex-column">
                                <img src="/new/img/Group 2218.svg" class=" icon-w" alt="test">
                                <p class="mt-2 mb-0"> ساعة 00:00 </p>
                            </div>

                            <div class="car-item col-1 d-flex justify-content-center align-items-center flex-column">
                                <img src="/new/img/Icon material-location-on.svg" class=" icon-w" alt="test">
                                <p class="mt-2 mb-0">Button </p>
                            </div>

                            <div class="car-item col-1 d-flex justify-content-center align-items-center flex-column">
                                <img src="/new/img/direction.png" class=" icon-w" alt="test">
                                <p class="mt-2 mb-0">NE </p>
                            </div>



                            <div class="car-item col-1 d-flex justify-content-center align-items-center flex-column">
                                <img src="/new/img/Icon awesome-gas-pump.svg" class=" icon-w" alt="test">
                                <p class="mt-2 mb-0">0 ليتر </p>
                            </div>

                            <div class="car-item col-1 d-flex justify-content-center align-items-center  flex-column">
                                <img src="/new/img/Group 2220.svg" class="icon-w " alt="test">
                                <p class="mt-2 mb-0">0 كم</p>
                            </div>

                        </div>
                    </div>
                </div>


            </div>

            <div class="icons-share">

                <div class="d-flex flex-column display-div">


                    <a href="#" class="mb-3">
                        <img src="/new/img/on.png" alt="" class="mar" width="15px" height="15px">
                    </a>

                    <a href="#" class="mb-3">
                        <img src="/new/img/off.png" alt="" class="mar" width="15px" height="15px">
                    </a>

                    <a href="#" class="mb-3">
                        <img src="/new/img/share.png" alt="" class="mar" width="15px" height="15px">
                    </a>

                </div>

            </div>





        </div>
<!--        TODO HIDE / SHOW only when click on car or search car-->
        <!-- carousel-->

        <!--map -->
        <div id="googleMap" class="map" style="height: 100vh;  position: initial;"></div>
        <div id="popup" class="ol-popup">
            <a href="#" id="popup-closer" class="ol-popup-closer"></a>
            <div id="popup-content"></div>
        </div>


    </div>

</template>

<script>
import Autocomplete from 'vuejs-auto-complete'
import 'ol/ol.css';
import Map from 'ol/Map';
import {Circle, Fill, Style,Text,Stroke, Icon} from 'ol/style';
import {Feature} from 'ol/index';
import {Vector as VectorSource} from 'ol/source';
import {Tile as TileLayer, Vector as VectorLayer} from 'ol/layer';
import {Point} from 'ol/geom';
import View from 'ol/View';
import XYZ from 'ol/source/XYZ';
import {toLonLat, useGeographic} from 'ol/proj';
import {FullScreen, defaults as defaultControls} from 'ol/control';
import {toStringHDMS} from "ol/coordinate";
import Overlay from 'ol/Overlay';

useGeographic();

export default {


    components: {
        Autocomplete,
    },

    data() {
        return {
            infoBar:{
                deviceName:null,
                plateNumber:null,
                status:null
            },
            devices: [],
            image: '/new/img/carimg.svg',
            position: {},
            state: null,
            loader: null,
            server: {},

            oneCarPos: {
                latitude: null,
                longitude: null
            },
            carStat: {
                veh_speed: 0,
                flightDistance: 0,
                totalDistance: 0,
                veh_weight: 0,
                device_protocol: ".",
                veh_state: ".",
                battery: 0,
                operating_hours: 0,
            },

            graphStat: {
                movingCars: 0,
                parkedCars: 0,
                igniteTheEngine: 0,
                online: 0,
                offline: 0,
                inert: 0,
            },


            numStatData: {
                series: []
            },
            numStatOptions: {
                distributeSeries: true
            },

            vehEventData: {
                labels: [],
                series: []
            },


            vehEventOptions: {
                donut: false

            },

            conditionVehData: {
                labels: [],
                series: []
            },
            conditionVehOptions: {
                donut: true
            },


            infoWindowPos: null,
            infoWinOpen: false,
            currentMidx: null,

            infoOptions: {
                content: '',
                //optional: offset infowindow so it visually sits nicely on top of our marker
                pixelOffset: {
                    width: 0,
                    height: -35
                }
            },

            events:[],



        }
    },
    beforeMount() {


    },
    async mounted() {
        if (localStorage.getItem('lang') === 'ar') {
            this.$moment.locale('ar-tn')
        } else {
            this.$moment.locale('en-gb')
        }


        await this.getServerInfo();
        await this.getDevicesList();



    },
    methods: {
        async getDevicesList() {

            var center = [this.server.longitude,this.server.latitude];
            const finalCenter = (center);
            var source = new VectorSource();

            var container = document.getElementById('popup');
            var content = document.getElementById('popup-content');
            var closer = document.getElementById('popup-closer');

            var overlay = new Overlay({
                element: container,
                autoPan: true,
                autoPanAnimation: {
                    duration: 250,
                },
            });

            closer.onclick = function () {
                overlay.setPosition(undefined);
                closer.blur();
                return false;
            };

            var map = new Map({
                controls: defaultControls().extend([new FullScreen()]),
                target: 'googleMap',
                layers: [
                    new TileLayer({
                        source: new XYZ({
                            url:'http://mt0.google.com/vt/lyrs=m&hl=en&x={x}&y={y}&z={z}',

                        }),
                    }) ,

                    new VectorLayer({
                        source: source,

                    }),

                ],
                overlays: [overlay],
                view: new View({
                    center:finalCenter,
                    zoom:this.server.zoom,
                }),
            });

            var markerStyle = function (myIcon,label,color) {
                return new Style({
                    image: new Icon({
                        anchor: [0, 0],
                        anchorXUnits: 'fraction',
                        anchorYUnits: 'pixels',
                        src: myIcon,
                    }),

                    text: new Text({
                        text: label,
                        fill: new Fill({
                            color: ''+color+''
                        }),
                        stroke: new Stroke({
                            color: 'black',
                            width: 1
                        }),
                        font: 'bold 12px sans-serif',
                        offsetY: -8,offsetX:20
                    })
                })
            }




            var clickEvent = map.on('click', function (evt) {

                var feature = map.forEachFeatureAtPixel(evt.pixel, function (feature) {
                    return feature;
                });
                if (feature) {
                    console.log(evt)
                    var coordinate = evt.coordinate;

                    var hdms = toStringHDMS(toLonLat(coordinate));

                    // content.innerHTML = '<p>You clicked here:</p><code>' + hdms + '</code>';
                    // overlay.setPosition(coordinate);
                }else{

                }




            });



            var markers = {};

            let userConnected = JSON.parse(localStorage.getItem('user'));
            this.isLoad = true;

            await axios.get(this.traccar_api+'/session?token='+userConnected.token,{
                headers: {
                    Accept: 'application/json',
                    'Content-Type': 'application/json',
                    withCredentials: true
                }
            })
                .then(({data}) => {

                    axios.get('/devices', {
                        headers: this.tokenHeader
                    }).then(({data}) => {
                        this.isLoad = false;
                        var url = this.socket_traccar;
                        var socket = new WebSocket(url);
                        socket.onclose = function (event) {
                            console.log('socket closed');
                        };
                        let devices = data.data
                        this.devices = data.data;
                        let events = this.events;
                        let graphStat = this.graphStat;
                        socket.onmessage = function (event) {
                            var data = JSON.parse(event.data);

                            if(data.events !== undefined){
                                var searchDevice = devices.find(function (device) { return device.id === data.events[0].deviceId });
                                data.events[0].deviceName = searchDevice.name;
                                events.push(data.events[0])

                            }

                            if (data.positions) {

                                for (var i = 0; i < data.positions.length; i++) {
                                    var position = data.positions[i];
                                    var marker = markers[position.deviceId];

                                    var point = new Point([position.longitude,position.latitude]);
                                    if (!marker) {
                                        var device = devices.find(function (device) { return device.id === position.deviceId });
                                        marker =new Feature(point);

                                        var statusDevice = 'red';
                                        if(device.status === 'online'){
                                            statusDevice = 'green';
                                        }else if(device.status === 'offline'){
                                            statusDevice = 'red';
                                        }else{
                                            statusDevice = 'orange';
                                        }
                                        marker.setStyle(markerStyle('/new/img/carimg.svg',device.name,statusDevice));
                                        markers[position.deviceId] = marker;
                                        source.addFeature(marker);
                                        clickEvent()


                                        // if(position.attributes.ignition === true){
                                        //     graphStat.igniteTheEngine +=1;
                                        // }
                                        // if(position.attributes.motion === true){
                                        //     graphStat.movingCars +=1;
                                        // }
                                        // if(position.attributes.motion === false){
                                        //     graphStat.parkedCars +=1;
                                        // }

                                    }else{

                                        // map.once('postcompose', function(event) {
                                        //     console.info('move');
                                        //     setInterval(function(){
                                        //         marker.setGeometry(point)
                                        //
                                        //     }, 500);
                                        // });

                                        setTimeout(function() {
                                            marker.setGeometry(point)
                                        }, 500);



                                        //marker.setGeometry(point)

                                    }

                                }
                            }




                        };

                        // this.numStatData.series.push(devices.length);
                        // this.numStatData.series.push(data.data.length);
                        // this.numStatData.series.push(100);


                        // this.graphStat.inert = data.stat.inertDevice;
                        // this.graphStat.offline = data.stat.offlineDevice;
                        // this.graphStat.online = data.stat.onlineDevice;



                        // let sum = data.stat.inertDevice + data.stat.offlineDevice + data.stat.onlineDevice;
                        //
                        // this.conditionVehData.series.push(data.stat.inertDevice);
                        // this.conditionVehData.series.push(data.stat.offlineDevice);
                        // this.conditionVehData.series.push(data.stat.onlineDevice);
                        //
                        // this.conditionVehData.labels.push(Math.round(data.stat.inertDevice / sum * 100) + '%');
                        // this.conditionVehData.labels.push(Math.round(data.stat.offlineDevice / sum * 100) + '%');
                        // this.conditionVehData.labels.push(Math.round(data.stat.onlineDevice / sum * 100) + '%');
                        //
                        // let sumEv = graphStat.movingCars + graphStat.parkedCars + graphStat.igniteTheEngine;
                        //
                        //
                        //
                        // this.vehEventData.series.push(graphStat.movingCars);
                        // this.vehEventData.series.push(graphStat.parkedCars);
                        // this.vehEventData.series.push(graphStat.igniteTheEngine);
                        //
                        // this.vehEventData.labels.push(Math.round(graphStat.movingCars / sumEv * 100) + '%');
                        // this.vehEventData.labels.push(Math.round(graphStat.parkedCars / sumEv * 100) + '%');
                        // this.vehEventData.labels.push(Math.round(graphStat.igniteTheEngine / sumEv * 100) + '%');
                        //


                    }).catch(({errors}) => {
                        this.isLoad = false
                    });


                } )
                .catch(({errors}) => {
                });




        },

        async getServerInfo(){
            this.isLoad = true;
            await axios.get('/server',{
                headers: this.tokenHeader
            })
                .then(({data}) => {
                    this.isLoad = false;
                    this.server = data.data

                } )
                .catch(({errors}) => {
                    this.isLoad = false;
                });
        },

        getClass(id) {

            return {
                'carousel-item active d-grid': id === 0,
                'carousel-item d-grid': id !== 0
            }
        },

        viewPosition(id){
            // this.isLoad = true;
            // axios.get("/events/"+id,{
            //     headers: this.tokenHeader
            // })
            //     .then((data) => {
            //         this.isLoad = false;
            //         this.events = data.data.data
            //
            //
            //     }).catch(({errors}) => {
            //     this.isLoad = false;
            // });
        },



    }
}
</script>


<style type="scss">
.ct-series-b .ct-slice-donut {
    stroke: red;
}
.carousel {
    width:100% !important;
    position: absolute !important;
}
.ct-series-a .ct-slice-donut {
    stroke: #F8BD7A;
}

.ol-popup {
    position: absolute;
    background-color: white;
    box-shadow: 0 1px 4px rgba(0,0,0,0.2);
    padding: 15px;
    border-radius: 10px;
    border: 1px solid #cccccc;
    bottom: 12px;
    left: -50px;
    min-width: 280px;
}
.ol-popup:after, .ol-popup:before {
    top: 100%;
    border: solid transparent;
    content: " ";
    height: 0;
    width: 0;
    position: absolute;
    pointer-events: none;
}
.ol-popup:after {
    border-top-color: white;
    border-width: 10px;
    left: 48px;
    margin-left: -10px;
}
.ol-popup:before {
    border-top-color: #cccccc;
    border-width: 11px;
    left: 48px;
    margin-left: -11px;
}
.ol-popup-closer {
    text-decoration: none;
    position: absolute;
    top: 2px;
    right: 8px;
}
.ol-popup-closer:after {
    content: "✖";
}

</style>
