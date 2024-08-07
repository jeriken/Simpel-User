<template>

</template>
<script>
export default {
    mounted() {
        //set token
        localStorage.setItem('token', "")

        //redirect ke halaman login
        this.$router.push('/login') 
    }
};
</script>