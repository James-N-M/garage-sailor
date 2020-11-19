<template>
    <div class="map">
        <div>
            <div class="form-group">
                <label>Start</label>
                <select v-model="start" class="form-control" name="start" @change="calculateRouteSequence">
                    <option value=""></option>
                    <option v-for="ad in ads" :value="ad">{{ ad.name }}</option>
                </select>
            </div>

            <div class="form-group">
                <label>End</label>
                <select v-model="end" class="form-control" name="start" @change="calculateRouteSequence">
                    <option value=""></option>
                    <option v-for="ad in ads" :value="ad">{{ ad.name }}</option>
                </select>
            </div>
        </div>
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
            <gmap-custom-marker
                v-for="(ad, index) in ads"
                :key="index"
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
        // start: {},
        // end: {},
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
            waypoints: [],
            start: {},
            end: {},
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

            if (!_.isEmpty(this.start) && !_.isEmpty(this.end)) {
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
                        "app_code": process.env.MIX_HERE_KEY
                    }
                }).then(response => {
                    return response.data.results[0].waypoints
                });
            }
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
            // update to use here path
            return this.ads.map(function (ad) {
                return {'lat': parseFloat(ad.latitude), 'lng': parseFloat(ad.longitude)};
            });
        },
        sortedAds() {
            let sorted = [];
            this.waypoints.forEach((waypoint) => {
                for(let i = 0; i < this.ads.length; i++) {
                    if (waypoint.lat == this.ads[i].latitude && waypoint.lng == this.ads[i].longitude) {
                        sorted.push(this.ads[i]);
                    }
                }
            });
            return sorted;
        }
    },
    mounted() {
        this.calculateRouteSequence();
    }
}
</script>

<style scoped>

</style>