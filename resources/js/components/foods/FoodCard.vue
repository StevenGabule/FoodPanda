<template>
    <div class="col mb-3">
        <div class="card">
            <!--<img src="https://picsum.photos/600/300/?image=25" class="card-img-top" alt="...">-->
            <div class="card-body">
                <h5 class="card-title text-dark">{{ food.name}}</h5>
                <h6 class="font-weight-bold">Price: {{ food.price}}</h6>
                <button class="btn btn-info btn-sm">Add To Cart</button>
            </div>
        </div><!-- end of card -->
    </div>
</template>

<script>
    export default {
        name: 'FoodCard',
        props: ['food']
    }
</script>

<style scoped>

</style>
