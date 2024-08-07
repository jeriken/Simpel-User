<template>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-8">
        <div class="flex justify-between mb-8">
            <h1 class="font-semibold text-xl">
                Daftar User
            </h1>
            <a href="user/add"><button type="submit"
                    class="rounded-md bg-indigo-600 px-8 py-2 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Tambah
                    User</button></a>
        </div>
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div>
                <div class="overflow-scroll px-0">
                    <table class="w-full min-w-max table-auto text-left">
                        <thead>
                            <tr>
                                <th class="border-y border-blue-gray-100 bg-blue-gray-50/50 p-4">
                                    <p
                                        class="block antialiased font-sans text-sm text-blue-gray-900 font-bold leading-none opacity-70">
                                        ID</p>
                                </th>
                                <th class="border-y border-blue-gray-100 bg-blue-gray-50/50 p-4">
                                    <p
                                        class="block antialiased font-sans text-sm text-blue-gray-900 font-bold leading-none opacity-70">
                                        Email</p>
                                </th>
                                <th class="border-y border-blue-gray-100 bg-blue-gray-50/50 p-4">
                                    <p
                                        class="block antialiased font-sans text-sm text-blue-gray-900 font-bold leading-none opacity-70">
                                        Nama</p>
                                </th>
                                <th class="border-y border-blue-gray-100 bg-blue-gray-50/50 p-4">
                                    <p
                                        class="block antialiased font-sans text-sm text-blue-gray-900 font-bold leading-none opacity-70">
                                        Tanggal Join</p>
                                </th>
                                <th class="border-y border-blue-gray-100 bg-blue-gray-50/50 p-4">
                                    <p
                                        class="block antialiased font-sans text-sm text-blue-gray-900 font-bold leading-none opacity-70">
                                        Aksi</p>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="user in userData">
                                <td class="p-4 border-b border-blue-gray-50">
                                    <p
                                        class="block antialiased font-sans text-sm leading-normal text-blue-gray-900 font-bold">
                                        {{ user.id }}</p>
                                </td>
                                <td class="p-4 border-b border-blue-gray-50">
                                    <p
                                        class="block antialiased font-sans text-sm leading-normal text-blue-gray-900 font-normal">
                                        {{ user.email }}</p>
                                </td>
                                <td class="p-4 border-b border-blue-gray-50">
                                    <p
                                        class="block antialiased font-sans text-sm leading-normal text-blue-gray-900 font-normal">
                                        {{ user.name }}</p>
                                </td>
                                <td class="p-4 border-b border-blue-gray-50">
                                    <p
                                        class="block antialiased font-sans text-sm leading-normal text-blue-gray-900 font-normal">
                                        {{ date(user.created_at) }}</p>
                                </td>

                                <td class="p-4 border-b border-blue-gray-50">
                                    <a :href="'/user/edit/' + user.id">
                                        <button
                                            class="relative align-middle select-none font-sans font-medium text-center uppercase transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none w-10 max-w-[40px] h-10 max-h-[40px] rounded-lg text-xs text-gray-900 hover:bg-gray-900/10 active:bg-gray-900/20"
                                            type="button">
                                            <span
                                                class="absolute top-1/2 left-1/2 transform -translate-y-1/2 -translate-x-1/2">
                                                <svg width="24px" height="24px" viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M12 4H6C4.89543 4 4 4.89543 4 6V18C4 19.1046 4.89543 20 6 20H18C19.1046 20 20 19.1046 20 18V12M9 15V12.5L17.75 3.75C18.4404 3.05964 19.5596 3.05964 20.25 3.75V3.75C20.9404 4.44036 20.9404 5.55964 20.25 6.25L15.5 11L11.5 15H9Z"
                                                        stroke="#000000" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg>
                                            </span>
                                        </button>
                                    </a>
                                    <button
                                        class="relative align-middle select-none font-sans font-medium text-center uppercase transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none w-10 max-w-[40px] h-10 max-h-[40px] rounded-lg text-xs text-gray-900 hover:bg-gray-900/10 active:bg-gray-900/20"
                                        type="button" @click="deleteData(user.id)">
                                        <span
                                            class="absolute top-1/2 left-1/2 transform -translate-y-1/2 -translate-x-1/2">
                                            <svg width="24px" height="24px" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M10 11V17" stroke="#000000" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M14 11V17" stroke="#000000" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M4 7H20" stroke="#000000" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                <path
                                                    d="M6 7H12H18V18C18 19.6569 16.6569 21 15 21H9C7.34315 21 6 19.6569 6 18V7Z"
                                                    stroke="#000000" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                                <path
                                                    d="M9 5C9 3.89543 9.89543 3 11 3H13C14.1046 3 15 3.89543 15 5V7H9V5Z"
                                                    stroke="#000000" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </svg>
                                        </span>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</template>
<script>
import axios from 'axios'


export default {
    data() {
        return {
            userData: ''
        };
    },
    methods: {
        getUserData() {
            let token = 'Bearer ' + localStorage.getItem('token')

            //send server with axios
            axios.get('/api/users',
                {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Authorization': token
                    }
                })
                .then(response => {

                    if (response.data) {
                        this.userData = response.data
                        console.log(this.userData)
                    }

                }).catch(error => {
                    //set validation dari error response
                    this.userData = error.response.data
                })
        },
        deleteData(id) {
            let token = 'Bearer ' + localStorage.getItem('token')

            //send server with axios
            axios.delete('/api/users/' + id,
                {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Authorization': token
                    }
                })
                .then(response => {
                    this.getUserData();
                }).catch(error => {
                    //set validation dari error response
                    this.error = error.response.data
                })
        },
        date(date) {
            var dateNew = new Date(date);
            return new Intl.DateTimeFormat("id-ID", {
                day: "2-digit",
                month: "short",
                year: "numeric",
            }).format(dateNew);
        },
    },
    mounted() {
        this.getUserData();
    }
};
</script>