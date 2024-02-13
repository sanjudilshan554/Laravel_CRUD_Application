<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
    <!-- header section -->
    <div class="card">
        <GuestLayout>
            <section>
                <Link href="/" class="fa-solid fa-arrow-left back_btn">
                </Link>
            </section>
            <h3 class="text-center">Register New User</h3>
            <Head title="Register" />

            <!-- register form  -->
            <form @submit.prevent="submit">
                <div>
                    <div class="row mt-4">
                        <div class="col-5">
                            <InputLabel for="name" value="Name:" />
                        </div>
                        <div class="col-7">
                            <TextInput id="name" type="text" class="mt-1 block w-full form-control setups"
                                v-model="form.name" required autofocus autocomplete="name" />
                            <InputError class="mt-2 error" :message="form.errors.name" />
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-5">
                            <InputLabel for="email" value="Email:" />
                        </div>
                        <div class="col-7">
                            <TextInput id="email" type="email" class="mt-1 block w-full form-control setups"
                                v-model="form.email" required autocomplete="username" />
                            <InputError class="mt-2 error" :message="form.errors.email" />
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-5">
                            <InputLabel for="password" value="Password:" />
                        </div>
                        <div class="col-7">
                            <TextInput id="password" type="password" class="mt-1 block w-full form-control setups"
                                v-model="form.password" required autocomplete="new-password" />
                            <InputError class="mt-2" :message="form.errors.password" />
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-5">
                            <InputLabel for="password_confirmation" value="Confirm Password:" />
                        </div>
                        <div class="col-7">
                            <TextInput id="password_confirmation" type="password"
                                class="mt-1 block w-full form-control setups" v-model="form.password_confirmation" required
                                autocomplete="new-password" />
                            <InputError class="mt-2" :message="form.errors.password_confirmation" />
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-5">
                            <Link :href="route('login')"
                                class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Already registered?
                            </Link>
                        </div>
                        <div class="col-6">
                            <PrimaryButton class="ms-4" :class="{ 'opacity-25': form.processing }"
                                :disabled="form.processing">
                                Register
                            </PrimaryButton>
                        </div>
                    </div>
                </div>
            </form>
        </GuestLayout>
    </div>
</template>

<!-- importiong non refreshes links  -->
<script>
    import { Link } from '@inertiajs/vue3'
</script>


<style scoped>
.error {
    color: red;
}

.inputs{
    font-size: small;
}
/* form controll adjustments */
.setups {
    margin: auto;
    font-size: smaller;
}

/* back button size */
.back {
    width: 8vi;
}

/* also spread to login */
.back_btn {
    background-color: none;
    background: none;
    border: none;
    text-decoration: none;
}

.inputs{
    font-size: small;
}
</style>
