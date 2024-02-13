<script setup>
import Checkbox from '@/Components/Checkbox.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

defineProps({
    canResetPassword: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.post(route('login'), {
        onFinish: () => {
            localStorage.setItem('isLoggedIn', 'true');
        },
    });
};
</script>

<template>
    <div class="card">
        <GuestLayout>
            <!-- back to home -->
            <section>
                <Link href="/" class="fa-solid fa-arrow-left back_btn">
                </Link>
            </section>

            <!-- header section -->

            <Head title="Log in" />
            <h3 class="text-center">Login </h3>
            <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
                {{ status }}
            </div>

            <!-- login form  -->
            <div class="mt-5 ">
                <form @submit.prevent="submit">

                    <!-- upper section -->
                    <div class="forms">
                        <div class="row mb-3">
                            <div class="col-3">
                                <InputLabel for="email" value="Email:" />
                            </div>
                            <div class="col-9 ">
                                <TextInput id="email" type="email" class="form-control inputs" v-model="form.email" required
                                    autofocus autocomplete="username" />
                                <InputError class="error" :message="form.errors.email" />
                            </div>
                        </div>
                        <div class="row pass">
                            <div class="col-3">
                                <InputLabel for="password" value="Password:" />
                            </div>
                            <div class="col-9">
                                <TextInput id="password" type="password" class="form-control inputs" v-model="form.password"
                                    required autocomplete="current-password" :class="form - control" />
                                <InputError class="error" :message="form.errors.password" />
                            </div>
                        </div>
                    </div>

                    <div class="row remember ">
                        <div class="col-7">
                            <!-- below section -->
                            <div class="remember">
                                <label class="flex items-right">
                                    <Checkbox name="remember" v-model:checked="form.remember" />
                                    <span class="ms-2 text-sm text-gray-600">Remember me</span>
                                </label>
                            </div>
                        </div>
                        <div class="col-5">

                        </div>
                    </div>


                    <div class="row">
                        <div class="col-3">

                        </div>
                        <div class="col">
                            <div class="flex items-center justify-end mt-4">
                                <Link v-if="canResetPassword" :href="route('password.request')"
                                    class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Forgot your password?
                                </Link>
                                <PrimaryButton class="ms-4 btn btn-dark" :class="{ 'opacity-25': form.processing }"
                                    :disabled="form.processing">
                                    Log in
                                </PrimaryButton>
                            </div>
                        </div>
                    </div>


                </form>

            </div>
        </GuestLayout>
    </div>
</template>

<!-- ajust the view of bootstrap form -->
<style scoped>
.inputs {
    font-size: small;
}

.remember {
    align-items: right;
    justify-content: right;
    display:flex;
}

/* form controll adjustments */
.setups {
    width: 35vh;
    font-size: smaller;
}

/* back button size */
.back {
    width: 8vi;
}

.pass {
    padding-top: 2rem;
}

.back_btn {
    background-color: none;
    background: none;
    border: none;
    text-decoration: none;
}

.error {
    color: red;
}

.forms {
    padding: 2vh;
    width: 25rem;
}
</style>
