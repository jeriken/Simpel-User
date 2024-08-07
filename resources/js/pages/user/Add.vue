<template>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-8">
            <form class="space-y-4" @submit.prevent="submit">

                <div>
                    <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Nama</label>
                    <div class="mt-2">
                        <input id="name" name="name" type="text" v-model="name" autocomplete="name" required
                            class="block w-full rounded-md border-0 p-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email</label>
                    <div class="mt-2">
                        <input id="email" name="email" type="email" v-model="email" autocomplete="email" required
                            class="block w-full rounded-md border-0 p-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div>
                    <div class="flex items-center justify-between">
                        <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                    </div>
                    <div class="mt-2">
                        <input id="password" name="password" type="password" v-model="password"
                            autocomplete="current-password" required
                            class="block w-full rounded-md border-0 p-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div>
                    <div class="flex items-center justify-between">
                        <label for="password_confirmation" class="block text-sm font-medium leading-6 text-gray-900">Password Confirmation</label>
                    </div>
                    <div class="mt-2">
                        <input id="password_confirmation" name="password_confirmation" type="password" v-model="passwordConfirmation"
                            autocomplete="current-password" required
                            class="block w-full rounded-md border-0 p-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div>
                    <button type="submit"
                        class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Daftar</button>
                </div>
            </form>
        </div>
    </div>

</template>

<script>
import axios from 'axios'


export default {
    data() {
        return {
            name: '',
            email: '',
            password: '',
            passwordConfirmation: '',
        };
    },
    methods: {
        submit() {
            let name = this.name
            let email = this.email
            let password = this.password
            let password_confirmation = this.passwordConfirmation

            let token = 'Bearer ' + localStorage.getItem('token')

            //send server with axios
            axios.post('/api/users',
                {
                    name,
                    email,
                    password,
                    password_confirmation
                },
                {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Authorization': token
                    }
                })
                .then(response => {

                    //redirect ke halaman dashboard
                    this.$router.push('/user')

                }).catch(error => {
                    //set validation dari error response
                    this.validation = error.response.data
                })
        }
    }
};
</script>