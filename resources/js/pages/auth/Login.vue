<template>
    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <img class="mx-auto h-10 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600"
                alt="Your Company">
            <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Login ke Dashboard
            </h2>
        </div>

        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            <form class="space-y-6" @submit.prevent="login">
                <div>
                    <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email</label>
                    <div class="mt-2">
                        <input id="email" name="email" v-model="email" autocomplete="email" required
                            class="block w-full rounded-md border-0 p-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                    <div v-if="loginFailed && validation.errors.email" class="font-sm relative block w-full rounded-lg bg-red-500 p-2 mt-2 text-sm leading-5 text-white opacity-100">
                        <div class="mr-12">Error: {{ validation.errors.email[0] }}</div>
                    </div>
                </div>

                <div>
                    <div class="flex items-center justify-between">
                        <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                        <!-- <div class="text-sm">
                            <a href="#" class="font-semibold text-indigo-600 hover:text-indigo-500">Forgot password?</a>
                        </div> -->
                    </div>
                    <div class="mt-2">
                        <input id="password" name="password" type="password" v-model="password"
                            autocomplete="current-password" required
                            class="block w-full rounded-md border-0 p-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                    <div v-if="loginFailed && validation.errors.password" class="font-sm relative block w-full rounded-lg bg-red-500 p-2 mt-2 text-sm leading-5 text-white opacity-100">
                        <div class="mr-12">Error: {{ validation.errors.password[0] }}</div>
                    </div>
                    
                </div>

                <div>
                    <button type="submit"
                        class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Login</button>
                </div>
                <div v-if="loginFailed && validation.message == 'Unauthorized'"
                        class="font-sm text-center relative block w-full rounded-lg bg-red-500 p-4 mt-2 text-sm leading-5 text-white opacity-100">
                        <div>Email atau Password salah.</div>
                    </div>
            </form>

            <p class="mt-10 text-center text-sm text-gray-500">
                Belum punya akun?
                <a href="/register" class="font-semibold leading-6 text-indigo-600 hover:text-indigo-500">Daftar</a>
            </p>
        </div>
    </div>
</template>

<script>
import axios from 'axios'


export default {
    data() {
        return {
            email: '',
            password: '',
            validation: [],
            loginFailed: ''
        };
    },
    methods: {
        login() {
            let email = this.email
            let password = this.password

            //send server with axios
            axios.post('/api/auth/login',
                {
                    email,
                    password,
                },
                {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(response => {

                    if (response.data) {

                        //set token
                        localStorage.setItem('token', response.data.token)

                        //redirect ke halaman dashboard
                        this.$router.push('/dashboard') 
                    }

                    //set state loginFailed to false
                    this.loginFailed = false


                }).catch(error => {
                    //set validation dari error response
                    this.validation = error.response.data

                    //set state loginFailed to true
                    this.loginFailed = true
                })
        }
    }
};
</script>