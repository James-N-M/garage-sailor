<template>
    <div class="map">
        <gmap-map
            :center="mapCenter"
            :zoom="15"
            style="width: 100%; height: 600px;"
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
                         :position="getPosition(this.ad)"
                         :clickable="true"
                         :draggable="false"
                         @click="handleMarkerClicked(ad)"
            ></gmap-marker>
        </gmap-map>
    </div>
</template>

<script>
export default {
    name: "Google-Map",
    props: {
        ad: {
            type: Object,
        },
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
            return {
                lat: parseFloat(this.ad.latitude),
                lng: parseFloat(this.ad.longitude)
            }
        },
        infoWindowPosition() {
            return {
                lat: parseFloat(this.activeAd.latitude),
                lng: parseFloat(this.activeAd.longitude)
            };
        }
    },
}
</script>

<style scoped>

</style>
