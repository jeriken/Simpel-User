<template>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">{{ postData.data }}</div>
            </div>
        </div>
    </div>
</template>
<script>
import axios from 'axios'


export default {
    data() {
        return {
            postData: ''
        };
    },
    methods: {
        getPostData() {
            let token = 'Bearer ' + localStorage.getItem('token')

            //send server with axios
            axios.get('/api/posts',
                {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Authorization': token
                    }
                })
                .then(response => {

                    if (response.data) {
                        this.postData = response.data
                    }

                }).catch(error => {
                    //set validation dari error response
                    this.postData = error.response.data
                })
        }
    },
    mounted() {
        this.getPostData();
    }
};
</script>