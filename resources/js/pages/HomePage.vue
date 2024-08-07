<template>
    <h1 class="text-blue-900">Wait</h1>
</template>
<script>
export default {
    data() {
        return {
            isLoggedIn: localStorage.getItem('token'),
        };
    },
    methods: {
        redirect(){
            if(this.isLoggedIn){
                this.$router.push('/dashboard') 
            }else{
                this.$router.push('/login') 
            }
        }
    },
    mounted() {
        this.redirect()
    }
};
</script>