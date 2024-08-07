<script setup>
import GuestLayout from './layout/GuestLayout.vue';
import AdminLayout from './layout/AdminLayout.vue';
</script>

<template>
    <div id="app">
        <div v-if="$route.meta.layout == 'Admin'">
            <AdminLayout>
                <template #header>
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ $route.meta.title }}</h2>
                </template>
                <router-view />
            </AdminLayout>
        </div>
        <div v-else>
            <GuestLayout>
                <router-view />
            </GuestLayout>
        </div>
    </div>
</template>