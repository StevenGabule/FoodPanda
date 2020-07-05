<template>
    <div class="card">
        <div class="card-body">
            <p class="card-text">{{ food.name}}</p>
        </div>
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
