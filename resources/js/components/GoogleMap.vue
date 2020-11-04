<template>
    <div class="map">
        <gmap-map
            :center="mapCenter"
            :zoom="10"
            style="width: 100%; height: 440px;"
        >
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
            <gmap-marker
                v-for="(ad, index) in ads"
                :key="ad.id"
                :position="getPosition(ad)"
                :clickable="true"
                :draggable="false"
                @click="handleMarkerClicked(ad)"
            ></gmap-marker>
        </gmap-map>
    </div>
</template>

<script>
export default {
    name: "Map",
    props: {
        ads: {
            type: Array,
            default: []
        }
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
    }
}
</script>

<style scoped>

</style>
