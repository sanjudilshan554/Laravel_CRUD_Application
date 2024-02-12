<template>
    <div>
            <Nav />
            <slot name="content">
                
            </slot>
    </div>
</template>

<script>

    import Nav from '@/Components/Navbar/Navbar.vue';

    export default {
        components:{
            Nav
        }
    }
</script>


<style>
    
</style>