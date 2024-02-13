<!--  LAYOUT OF PAGES  -->
<template>
    <div>
            <Nav />

            <slot name="content">
                <!-- conent -->
            </slot>
    </div>
</template>

<!-- IMPORITNG NAVBAR -->
<script>
import Nav from '@/Components/Navbar/Navbar.vue';

    export default {
        components:{
            Nav
        }
    }
</script>


<style>
   /*  */
</style>