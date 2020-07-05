<template>
    <b-container>
        <div class="row">
            <div class="col-12">
                <h5 class="border-bottom py-2 mb-3">Popular Restaurants</h5>
            </div>
        </div>
        <div class="row row-cols-1 row-cols-md-4 justify-content-center">
            <restaurant-card v-for="(restaurant, index) in restaurants" :key="index" :restaurant="restaurant"/>
        </div>
    </b-container><!-- end of container -->
</template>

<script>
    import axios from "axios";
    import RestaurantCard from "../components/restaurants/RestaurantCard";

    export default {
        name: "Homepage",
        components: {RestaurantCard},
        data() {
            return {
                restaurants: []
            }
        },
        mounted() {
            axios.get("http://127.0.0.1:8000/api/restaurants").then(res => {
                console.log(res.data.data)
                this.restaurants = res.data.data;
            }).catch(error => console.error(error.response.data.errors));
        }
    }
</script>
