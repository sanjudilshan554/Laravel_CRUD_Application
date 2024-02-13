<template>
    <AppLayout>
        <Head title="Dashboard" />
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand sm_system" href="#">S-M System </a>
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
        
                <div>
                    <Link href="/login" class="btn btn-outline-success btn-sm logbtn pub">Login</Link> 
                    <Link href="/register" class="regbtn pub btn btn-outline-dark btn-sm">Register</Link>
         
        </div>
            </div>
        </div>
    </nav>
        <div class="text-center">
            <h1 class="head">Welcome to Student Management System</h1>
        </div>

        <div class="setup">
            <img src="image/setup_images/homes.png" alt="image load fail" class="home_image"/>
        </div>

    </AppLayout>
</template>

<script >
import { Link } from '@inertiajs/vue3'

export default {

    components:{
        Link
    },  

    data() {
        return {
            isLoggedIn: false,
        };
    },
    mounted() {
        this.isLoggedIn = this.checkLoginStatus();
    },
    methods: {
        checkLoginStatus() {
        },
        logout() {
            this.isLoggedIn = false;
        }
    }
};
</script>

<style scoped>

.head{
    background-color: rgb(221, 224, 224);
    box-shadow: 1px 1px 10px black;
}

.home {
    align-items: center;
    justify-content: center;
    margin: auto;
    display: flex;
    color: rgb(8, 82, 92);
}

.pub{
    text-decoration: none;
    margin-left: 1vh;
}

.logbtn{
    
    color: black;
}

.logbtn:hover{
    color: white;
}
.regbtn{
    color:black;
}

.regbtn:hover{
    color:white;
}

.setup{
    display: flex;
    justify-content: center;
}

.home_image{
    margin-top: 5vh;
    display: flex;
    height: 50vh;
}

.sm_system{
    text-shadow:1px 1px 3px rgb(90, 88, 88);
    font-weight: bolder;
}
</style>
