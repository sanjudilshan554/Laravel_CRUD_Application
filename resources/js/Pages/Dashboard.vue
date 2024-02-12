<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <div class="text-center">
                <h1>Student Management System Dashboard</h1>
            </div>
        </template>

        <div class="py-12">
            <div class="max-w-14xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                    <section class="p-3">
                        <!-- table -->
                        <section>

                            <button type="button" class="btn btn-success mt-3" data-bs-toggle="modal"
                                data-bs-target="#exampleModal" @click="showImgUsr()">
                                Add New User
                            </button>
                        </section>
                        <section>
                            <table class="table mt-5 text-center">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">uer id</th>
                                        <th scope="col">name</th>
                                        <th scope="col">image</th>
                                        <th scope="col">age</th>
                                        <th scope="col">status</th>
                                        <th scope="col">action</th>
                                    </tr>
                                </thead>
                                <tbody class="table_data">
                                    <tr v-for="(student, index) in students" class="table_data">

                                        <th class="align-middle " scope="row">{{ ++index }}</th>
                                        <td class="align-middle ">{{ student.id }}</td>
                                        <td class="align-middle ">{{ student.name }}</td>
                                        <td> <img :src="student.url" alt="profile image not setup"
                                                class="profile_image align-middle "></td>
                                        <td class="align-middle ">{{ student.age }}</td>
                                        <td class="align-middle ">{{ student.status }}</td>
                                        <td class="align-middle ">

                                            <button type="button" class="fa fa-pencil btn btn-primary buttons"
                                                @click="EditStudent(student.id)" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal">
                                            </button>

                                            <button class="fa fa-trash btn btn-danger buttons"
                                                @click="DeleteStudent(student.id)">
                                            </button>
                                        </td>

                                    </tr>
                                </tbody>
                            </table>
                        </section>

                        <!-- Modal -->
                        <section>
                            <div class="modal fade modal-xl" id="exampleModal" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content ">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Add New User</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body row ">
                                            <div class="confirm_message text-center">

                                                <div v-if="confirmGreen.status == 202" class="alert alert-success"
                                                    role="alert">
                                                    {{ confirmGreen.message }}
                                                </div>
                                                <div v-else-if="confirmGreen.status == 500" class="alert alert-danger"
                                                    role="alert">
                                                    {{ confirmGreen.message }}
                                                </div>
                                                <div v-else-if="confirmGreen.status == 201" class="alert alert-warning"
                                                    role="alert">
                                                    {{ confirmGreen.message }}
                                                </div>
                                                <div v-else class="alert alert-primary " role="alert"
                                                    value="Insert your data">
                                                    {{ confirmGreen.message }}
                                                </div>
                                            </div>

                                            <!-- Register Form -->
                                            <form v-if="confirmGreen.status == 202" @submit.prevent="NewStudent()">
                                                <div class="profile ">

                                                    <div v-if="ShowImgSrc == 0" class="imagePreviewWrapper mt-4"
                                                        :style="{ 'background-image': `url(${previewImage})` }"
                                                        @click="selectImage"></div>
                                                </div>
                                                <div v-if="ShowImgSrc == 1" class="update_image_setup">
                                                    <img :src="student.url" class="image_preview_for_update">
                                                </div>

                                                <div class="row mt-4">
                                                    <div class="col-4 text-right label">
                                                        <label for="name">Student name:</label>
                                                    </div>
                                                    <div class="col-6">
                                                        <input type="text" name="name" v-model="student.name"
                                                            class="form-control" placeholder="enter student name" required>
                                                    </div>
                                                </div>
                                                <div class="row mt-3">
                                                    <div class="col-4 text-right">
                                                        <label for="name">age:</label>
                                                    </div>
                                                    <div class="col-6">
                                                        <input type="text" name="name" v-model="student.age"
                                                            class="form-control" placeholder="enter student age" required>
                                                    </div>
                                                </div>

                                                <div class="row mt-3">
                                                    <div class="col-4 text-right">
                                                        <label for="image" class=""> Upload your profile image:</label>
                                                    </div>
                                                    <div class="col-6">
                                                        <input type="file" class="form-control" v-on:change="onImageChange"
                                                            ref="fileInput" @input="pickFile" @click="ChangeImageSetup()" />
                                                    </div>
                                                </div>
                                                <div class="modal-footer mt-2">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Create</button>

                                                </div>
                                            </form>

                                            <!-- Update Form -->
                                            <form v-else-if="confirmGreen.status == 201"
                                                @submit.prevent="UpdateStudent(this.student.id)">
                                                <div class="profile ">

                                                    <div v-if="ShowImgSrc == 0" class="imagePreviewWrapper mt-4"
                                                        :style="{ 'background-image': `url(${previewImage})` }"
                                                        @click="selectImage"></div>
                                                </div>
                                                <div v-if="ShowImgSrc == 1" class="update_image_setup">
                                                    <img :src="student.url" class="image_preview_for_update">
                                                </div>

                                                <div class="row mt-4">
                                                    <div class="col-4 text-right label">
                                                        <label for="name">Student name:</label>
                                                    </div>
                                                    <div class="col-6">
                                                        <input type="text" name="name" v-model="student.name"
                                                            class="form-control" placeholder="enter student name" required>
                                                    </div>
                                                </div>
                                                <div class="row mt-3">
                                                    <div class="col-4 text-right">
                                                        <label for="name">age:</label>
                                                    </div>
                                                    <div class="col-6">
                                                        <input type="text" name="name" v-model="student.age"
                                                            class="form-control" placeholder="enter student age" required>
                                                    </div>
                                                </div>

                                                <div class="row mt-3">
                                                    <div class="col-4 text-right">
                                                        <label for="image" class=""> profile image:</label>
                                                    </div>
                                                    <div class="col-6">
                                                        <input type="file" class="form-control" v-on:change="onImageChange"
                                                            ref="fileInput" @input="pickFile" @click="ChangeImageSetup()" />
                                                    </div>
                                                </div>

                                                <div class="row mt-3">
                                                    <div class="col-4 text-right">
                                                        <label for="name">status:</label>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-check form-switch">
                                                        <input class="form-check-input" v-model="student.status" type="checkbox" role="switch"
                                                            id="flexSwitchCheckDefault"
                                                            true-value="1" false-value="0">
                                                        <label class="form-check-label" for="flexSwitchCheckDefault">The user's status is inactive by default.</label>
                                                    </div>
                                                    </div>
                                                    
                                                </div>

                                                <div class="modal-footer mt-2">
                                                    <div class="modal">
                                                        <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal" >Close</button>
                                                    </div>
                                                    <button type="submit" class="btn btn-primary">Update Student</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </section>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>


<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';

// 

</script>

<script>
import axios from 'axios';
export default {

    components: {

    },

    created() {
        this.studenDetails();
    },

    data() {
        return {
            student: {
                id: '',
                name: '',
                image: '',
                age: '',
                status: 0,
            },
            previewImage: null,

            students: [],

            confirmGreen: [],

            ShowImgSrc: '',


        };
    },

    computed:{
        isStatusInactive(){
            return this.student.status !==1;
        }
    },  

    methods: {

        async studenDetails() {
            try {
                const response = await axios.get(route('student.get'));
                this.students = response.data.data;
            } catch (error) {
                console.log('Error', error);
            }
        },

        async DataReset() {
            //resetting fields 
            this.student.name = '';
            this.student.age = '';
            this.student.image = '';
            this.previewImage = null; // reset the image preview 
            this.$refs.fileInput.value = ''; //reset the image selection
        },

        async NewStudent() {
            try {
                const config = {
                    headers: { "content-type": "multipart/form-data" },
                };

                // post response to back end
                const response = await axios.post(route('student.store'), this.student, config);
                this.confirmGreen = response.data; // assign response to preview messages 

                this.DataReset();

                // calling function to update page table
                this.studenDetails();
                this.confirmGreen.status = 202;
            } catch (error) {
                console.log('Error:', error);
            }
        },

        onImageChange(e) {
            console.log(e.target.files[0]);
            this.student.image = e.target.files[0];
        },

        selectImage() {
            this.$refs.fileInput.click();
        },
        pickFile() {
            let input = this.$refs.fileInput;
            let file = input.files;
            if (file && file[0]) {
                let reader = new FileReader();
                reader.onload = (e) => {
                    this.previewImage = e.target.result;
                };
                reader.readAsDataURL(file[0]);
                this.$emit("input", file[0]);
            }
        },

        async DeleteStudent(id) {
            const response = await axios.get(route('student.delete', id));
            this.studenDetails();
        },

        async EditStudent(id) {
            try {
                const response = await axios.get(route('student.get_one', id));
                this.student = response.data.data;
                this.student.image = response.data.url;
                this.ShowImgSrc = 1;
                this.confirmGreen.status = 201;
                this.confirmGreen.message = "Edit user data";
                this.student.id = id;
            } catch (error) {
                console.log('Error:', error);
            }
        },

        async showImgUsr() {
            this.ShowImgSrc = 0;
            this.confirmGreen.status = 202;
            this.confirmGreen.message = "Enter New User Data";

            this.DataReset();
        },

        async ChangeImageSetup() {
            this.ShowImgSrc = 0;
        },

        async UpdateStudent(id) {

            try {
                const config = {
                    headers: { "content-type": "multipart/form-data" },
                };

                const response = await axios.post(route('student.update', id), this.student, config);
                console.log(response);
                this.DataReset();
                this.studenDetails();
                return response;
            } catch (error) {
                console.log('Error:', error);
            }
        }
    },
};
</script>

<style>
.imagePreviewWrapper {
    padding-top: 2vh;
    width: 150px;
    height: 150px;
    display: block;
    cursor: pointer;
    backdrop-filter: 1px 1px 1px black;
    border-radius: 50%;
    border-color: black;
    border: 2px solid #007bff;
    background-size: cover;

}


.image_preview_for_update {
    width: 150px;
    height: 150px;
    display: block;
    cursor: pointer;
    backdrop-filter: 1px 1px 1px black;
    border-radius: 50%;
    border-color: black;
    border: 2px solid #f70000;
    background-size: cover;
    margin: auto;
}

.profile {
    justify-content: center;
    display: flex;
}

.profile_image {
    width: 8vh;
    height: 8vh;
    border-radius: 50%;
    cursor: pointer;
}

.align-middle {
    vertical-align: middle;
}

.buttons {
    margin-left: 1vh;
}

.form-switch .form-check-input{
    width: 2.5rem;
    height: 1.2rem;
}

.form-switch .form-check-input:checked{
    background-color: rgb(0, 241, 32);
    border:none;
}


.form-switch .form-check-input:checked + .form-check-label::before {
    background-color: #e70000; /* Change to your desired color */
}

.form-check-label{
    color: #e70000;
    margin-left: 1rem;
}
</style>