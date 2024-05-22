<script setup>
import Mylayout from '@/Layouts/MyLayout.vue';
import { Head } from '@inertiajs/vue3';

defineOptions({
        layout: Mylayout
    });
</script>

<template>
        <div class="py-12 welcome">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-12 flex justify-center"><img src="../Components/home.png" alt="me" class="w-[100vh] welcome-img"></div>
                </div>
            </div>
        </div>
    
</template>
