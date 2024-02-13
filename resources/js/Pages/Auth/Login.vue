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
        onFinish: ()=> {
            localStorage.setItem('isLoggedIn', 'true');
        },
    });
};
</script>

<template>

    <div class="card">
        
    <GuestLayout>
        <Head title="Log in" />
        <h3 class="text-center">Login </h3>

        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
            {{ status }}
        </div>

        <div class="mt-5">
            <form @submit.prevent="submit">
            <div>
                <div class="row mb-3">
                    <div class="col-3">
                        <InputLabel for="email" value="Email:" />
                    </div>
                    <div class="col-9 ">
                        <TextInput
                        id="email"
                        type="email"
                        class="form-control inputs"
                        v-model="form.email"
                        required
                        autofocus
                        autocomplete="username"/>

                    <InputError class="mt-2" :message="form.errors.email" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <InputLabel for="password" value="Password:" />
                    </div>
                    <div class="col-9">
                        <TextInput
                        id="password"
                        type="password"
                        class="form-control inputs"
                        v-model="form.password"
                        required
                        autocomplete="current-password"
                        :class="form-control"
                        />

                        <InputError class="mt-2" :message="form.errors.password" />
                    </div>
                </div>
            </div>

            <div class="block mt-4">
                <label class="flex items-center">
                    <Checkbox name="remember" v-model:checked="form.remember" />
                    <span class="ms-2 text-sm text-gray-600">Remember me</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                <Link
                    v-if="canResetPassword"
                    :href="route('password.request')"
                    class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                >
                    Forgot your password?
                </Link>

                <PrimaryButton class="ms-4 btn btn-dark" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Log in
                </PrimaryButton>
            </div>
        </form>
        </div>
       
    </GuestLayout>
</div>
</template>

<style>

.card{
    box-shadow: 1px 1px 5px black;
}

.inputs{
    width:40vh;
    font-size: small;
}
</style>
