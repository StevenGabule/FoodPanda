<template>
    <div class="col mb-4">
        <div class="card">
            <b-link :to="'restaurant/'+restaurant.slug">
                <img src="https://picsum.photos/600/300/?image=25" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title text-dark">{{ restaurant.name}}</h5>
                    <p class="card-text text-dark">{{ restaurant.short_description}}</p>
                </div>
            </b-link><!-- end of link -->
        </div><!-- end of card -->
    </div>
</template>

<script>
    export default {
        name: 'RestaurantCard',
        props: ['restaurant']
    }
</script>

<style scoped>
    .card-title {
        font-size: 16px;
        margin-bottom: 0;
    }

    .card-body {
        padding: 5px 0 0 10px;
    }
</style>

