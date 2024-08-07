<template>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">Selamat Datang {{ userData.name }}</div>
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
            axios.get('/api/profile',
                {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Authorization': token
                    }
                })
                .then(response => {

                    if (response.data) {
                        this.userData = response.data
                    }

                }).catch(error => {
                    //set validation dari error response
                    this.userData = error.response.data
                })
        }
    },
    mounted() {
        this.getUserData();
    }
};
</script>