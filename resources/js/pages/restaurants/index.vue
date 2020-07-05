<template>
    <b-container>
        <b-row>
            <b-col>
                <h3>Restaurant Foods</h3>
                <food-card v-for="(food, index) in foods" :key="index" :food="food" />
            </b-col>
        </b-row>
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
                foods: [],
				slug: this.$route.params.slug
            }
        },
        created() {
            axios.get(`http://127.0.0.1:8000/api/restaurant/${this.slug}`).then(res => {
                this.foods = res.data.data[0].foods;
            }).catch(error => console.error(error.response.data.errors));
        }
    }
</script>
