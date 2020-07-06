<template>
    <b-container>
        <div class="row">
            <div class="col-12">
                <h4 class="mb-3 mt-3">{{ name }}</h4>
            </div>
        </div>
        <div class="row row-cols-1 row-cols-md-3 justify-content-center">
            <food-card v-for="(food, index) in foods" :key="index" :food="food"/>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <p>Subtotal</p>
                            <p>PHP 0.00</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p>Delivery Fee</p>
                            <p>PHP 0.00</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </b-container>
</template>

<script>
    import axios from 'axios';
    import FoodCard from "../../components/foods/FoodCard";

    export default {
        components: {
            FoodCard
        },
        data() {
            return {
                name: '',
                avatar: '',
                foods: [],
                slug: this.$route.params.slug
            }
        },
        created() {
            axios.get(`http://127.0.0.1:8000/api/restaurant/${this.slug}`).then(res => {
                this.name =  res.data.data[0].name
                this.avatar =  res.data.data[0].avatar
                this.foods = res.data.data[0].foods;
            }).catch(error => console.error(error.response.data.errors));
        }
    }
</script>
