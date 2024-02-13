<template>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">S-M System </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <!-- <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li> -->
                </ul>
        
                    <div class="btnTxt">
                        <ResponsiveNavLink :href="route('profile.edit')" class="btn btn-info btn-sm mainbtn "> Profile </ResponsiveNavLink>
                        <ResponsiveNavLink :href="route('logout')" method="post" as="button" class="btn btn-danger btn-sm mainbtn">
                            Log Out
                        </ResponsiveNavLink>
                    </div>
            </div>
        </div>
    </nav>
</template>

<script>
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';
import { Link } from '@inertiajs/vue3'

export default {

    components: {
        Link,
        ResponsiveNavLink
    }
}

</script>

<style scoped>

.mainbtn{
   color:white;
   margin-left:2vh;
   text-align: center;
   align-items: center;
   justify-content: center;
   display: flex;
   box-shadow: 1px 1px 2px rgb(133, 122, 122);
}

.mainbtn:hover{
    box-shadow: 1px 1px 3px rgb(29, 27, 27);
}

.btnTxt{
    display: flex;
}
</style>