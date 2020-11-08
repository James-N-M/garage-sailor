<template>
    <div class="map">
        <gmap-map
            :center="mapCenter"
            :zoom="10"
            style="width: 100%; height: 440px;"
        >
            <gmap-polyline v-bind:path.sync="path" v-bind:options="{ strokeColor:'#008000'}"></gmap-polyline>
            <gmap-info-window
                :options="infoWindowOptions"
                :position="infoWindowPosition"
                :opened="infoWindowOpened"
                @closeclick="handleInfoWindowClose"
            >
                <div class="info-window">
                    <h2 v-text="activeAd.name"></h2>
                    <h5 v-text="'Hours:'"></h5>
                    <p v-text="activeAd.address"></p>
                    <p v-text="activeAd.city"></p>
                </div>
            </gmap-info-window>
<!--            <gmap-marker-->
<!--                v-for="(ad, index) in ads"-->
<!--                :key="ad.id"-->
<!--                :position="getPosition(ad)"-->
<!--                :clickable="true"-->
<!--                :draggable="false"-->
<!--                @click="handleMarkerClicked(ad)"-->
<!--            ></gmap-marker>-->
            <gmap-custom-marker
                v-for="(ad, index) in ads"
                :key="ad.id"
                :marker="getPosition(ad)"
                @click.native="handleMarkerClicked(ad)"
            >
                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50">
                    <circle cx="25" cy="25" r="25" fill="#000000" />
                    <text x="50%" y="50%" text-anchor="middle" fill="white" font-size="25px" dy=".3em">{{index}}</text>
                </svg>
            </gmap-custom-marker>
        </gmap-map>
    </div>
</template>

<script>

import GmapCustomMarker from 'vue2-gmap-custom-marker';

export default {
    components: {
        'gmap-custom-marker': GmapCustomMarker
    },
    name: "Map",
    props: {
        ads: {
            type: Array,
            default: []
        },
        start: {},
        end: {},
    },
    data() {
        return {
            infoWindowOptions: {
                pixelOffset: {
                    width: 0,
                    height: -35
                }
            },
            activeAd: {},
            infoWindowOpened: false,
        }
    },
    methods: {
        getPosition(ad) {
            return {
                lat: parseFloat(ad.latitude),
                lng: parseFloat(ad.longitude)
            }
        },
        handleMarkerClicked(ad) {
            this.activeAd = ad;
            this.infoWindowOpened = true;
        },
        handleInfoWindowClose() {
            this.activeRestaurant = {};
            this.infoWindowOpened = false;
        },
        calculateRouteSequence() {
            let waypoints = {};
            for(let i = 0; i < this.ads.length; i++) {
                waypoints["destination" + (i + 1)] = `${this.ads[i].latitude},${this.ads[i].longitude}`;
            }

            return axios({
                "method": "GET",
                "url": "https://wse.api.here.com/2/findsequence.json",
                "params": {
                    "start": `${this.start.latitude},${this.start.longitude}`,
                    ...waypoints,
                    "end": `${this.end.latitude},${this.end.longitude}`,
                    "mode": "fastest;car;traffic:enabled",
                    "departure": "now",
                    "app_id": "UopEqQ2s4Nm4G0DVqeRv",
                    "app_code": "ypEJhHh9KXdCy35mBlReQoGe-8AD7yeTaMmJWl8-7x4"
                }
            }).then(response => {
                return response.data.results[0].waypoints
            });
        }
    },
    computed: {
        mapCenter() {
            if (!this.ads.length) {
                return {
                    lat: 10,
                    lng: 10
                }
            }

            return {
                lat: parseFloat(this.ads[0].latitude),
                lng: parseFloat(this.ads[0].longitude)
            }
        },
        infoWindowPosition() {
            return {
                lat: parseFloat(this.activeAd.latitude),
                lng: parseFloat(this.activeAd.longitude)
            };
        },
        path() {
            return this.ads.map(function (ad) {
                return {'lat': parseFloat(ad.latitude), 'lng': parseFloat(ad.longitude)};
            });
        }
    },
    mounted() {
        console.log(this.calculateRouteSequence());
    }
}
</script>

<style scoped>

</style>
