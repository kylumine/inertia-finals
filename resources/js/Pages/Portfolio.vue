<script setup>
import { ref } from 'vue';
import { Head, Link, usePage } from '@inertiajs/vue3';
import { Inertia } from '@inertiajs/inertia';
import Mylayout from '@/Layouts/MyLayout.vue';
import EditModal from '@/Components/EditModal.vue';

defineOptions({
    layout: Mylayout,
});

const { props } = usePage();
const initialData = ref(props.aboutMeContent || 'Tell me about yourself');

const showModal = ref(false);

const openModal = () => {
    showModal.value = true;
};

const closeModal = () => {
    showModal.value = false;
};

const updateData = (data) => {
    initialData.value = data;
    // Update the backend to persist changes
    Inertia.put(route('about-me.update'), { content: data }, {
        onSuccess: () => {
            console.log('Data updated successfully');
        },
        onError: (errors) => {
            console.error('Error updating data:', errors);
        }
    });
};
</script>

<template>
    <Head title="About Me" />
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <h1 class="text-4xl h1">About Me</h1>
                <hr />
                <p class="mt-[5%] text-center">{{ initialData }}</p>
                <div class="buttons marginb">
                    <button @click="openModal" class="but btn btn-pink">Edit</button>
                    <Link href="/project" class="but btn btn-pink">Projects</Link>
                </div>
            </div>
        </div>
    </div>

    <EditModal :show="showModal" :initialData="initialData" @updatedData="updateData" @close="closeModal" />
</template>

<style scoped>
.marginb {
    margin-bottom: 50px;
}
.h1 {
    margin-top: 100px;
    margin-left: 100px;
    color: #ff69b4;
}
p {
    max-width: 800px;
    margin-left: 200px;
}
.buttons {
    display: flex;
    align-items: center;
    justify-content: space-evenly;
    margin-top: 40px;
}
.but {
    padding: 10px 20px;
    width: 200px;
    text-align: center;
}
</style>
