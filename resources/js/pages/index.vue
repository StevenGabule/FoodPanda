<template>
<div>
    <Navbar />
    <router-view></router-view>
</div>

</template>

<script>
import Navbar from '../components/layouts/Navbar'

    export default {
        components: { Navbar },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
