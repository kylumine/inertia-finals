<script setup>
import { defineProps } from 'vue';
import { useForm } from '@inertiajs/vue3';

const props = defineProps({
  project: Object
});

const form = useForm({
  name: props.project.name,
  description: props.project.description,
  imageUrl: props.project.imageUrl,
});

const submitForm = async () => {
  await form.put(`/project/${props.project.id}`);
};

const goBack = () => {
  window.history.back();
};
</script>


<template>
    <div class="p-8">
        <h1 class="text-4xl my-3 pink flex-1 m-2">Edit project</h1>
        <div class="border p-4 rounded w-2/4 m-4">
            <form @submit.prevent="submitForm">
                <table>
                    <tr>
                        <th class="text-left">Name:</th>
                        <td class="px-4">
                            <input class="w-full rounded-md py-2 px-3 focus:outline-none focus:border-pink-500" v-model="form.name" type="text">
                        </td>
                    </tr>
                    <tr>
                        <th class="text-left">Description:</th>
                        <td class="px-4">
                            <input class="w-full rounded-md py-2 px-3 focus:outline-none focus:border-pink-500" v-model="form.description" type="text">
                        </td>
                    </tr>
                    <tr>
                        <th class="text-left">Image URL:</th>
                        <td class="px-4">
                            <input class="w-full rounded-md py-2 px-3 focus:outline-none focus:border-pink-500" v-model="form.imageUrl" type="text">
                        </td>
                    </tr>
                </table>
                <div>
  
                </div>
                <div class="text-right">
                    <button type="button" @click="goBack" class="btn text-white bold bg-pink-400">Back</button>
                    <button type="submit" class="btn ml-2 text-white bg-pink-500">Save</button>
                </div>
            </form>
        </div>
    </div>
  </template>