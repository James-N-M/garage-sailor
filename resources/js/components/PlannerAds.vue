<template>
    <div>
        <div class="form-group">
            <label for="exampleInputPassword1">date</label>
            <input type="date" v-model="date" class="form-control" id="exampleInputPassword1" name="date" @change="getAds">
        </div>

        <div id="ads" v-for="(ad, counter) in ads"
             v-bind:key="counter">
            <div class="card-header d-flex justify-content-end">
                <span class="badge badge-primary mr-2">{{ ad.origin }}</span>
                <a href="/planners/create"><i class="fas fa-plus-circle"></i></a>
            </div>
            <div class="card-body d-flex">
                <div class="mr-5">
                    <img src="https://picsum.photos/150" alt="placeholder image">
                </div>
                <div>
                    <h4>{{ ad.name }}</h4>

                    <div>
                        <i class="fas fa-map-pin mr-2"></i>
                        <span>{{ ad.address }}</span>
                    </div>

                    <div>
                        <i class="far fa-calendar-times mr-2"></i>
                        <span>{{ ad.start_date_time }}</span>
                    </div>

                    <div>
                        <i class="far fa-clock mr-2"></i>
                        <span>{{ ad.start_date_time }}</span>
                    </div>

                    <p>{{ ad.description }}</p>
                </div>
            </div>
            <div class="card-footer text-muted">
                <input type="radio" id="ad" :name="'ads['  + counter  + ']'" :value="ad.id">
                <label for="ad">Include Ad</label><br>
            </div>
        </div>
        <br>
    </div>
</template>

<script>
export default {
name: "CreatePlanner.vue",
    data(){
        return {
            ads: [],
            date: ''
        }
    },
    methods : {
        getAds() {
            axios.get(`/api/ads?date=${this.date}`).then((response) => {
                this.ads = response.data;
            }).finally(() => {
                // loading
            });
        },
    },
}
</script>

<style scoped>

</style>
