<template>
    <div>
        <div id="items" v-for="(item, counter) in items"
             v-bind:key="counter">
            <h3>Add Items</h3>
            <div class="form-group">
                <label>Item {{ counter + 1 }} name</label>
                <input v-model="item.name" type="text" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Item {{ counter + 1 }} description</label>
                <input v-model="item.description" type="text" class="form-control">
            </div>

            <div class="form-group">
                <label>Item {{ counter + 1 }} price</label>
                <input v-model="item.price" type="text" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Item {{ counter + 1 }} category</label>
                <select v-model="item.category" type="text" class="form-control">
                    <option value="1">Apparel</option>
                    <option value="2">Electronics</option>
                    <option value="3">Entertainment</option>
                    <option value="4">Books</option>
                    <option value="5">Garden Outdoor </option>
                    <option value="6">Home Goods</option>
                    <option value="7">Musical Instruments</option>
                    <option value="8">Pet Supplies</option>
                    <option value="9">Sporting Goods</option>
                    <option value="10">Toys and Goods</option>
                </select>
            </div>
        </div>
        <button v-on:click="add" class="btn btn-success mb-2">Add Item</button>
        <br>
    </div>
</template>

<script>
export default {
name: "CreateItems",
    data(){
        return {
            items: [],
        }
    },
    methods : {
        add() {
            this.items.push({
                name: '',
                description: '',
                price: '',
                category: '',
            })
        }
    }
}
</script>

<style scoped>

</style>
