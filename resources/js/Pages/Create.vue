<script setup>
    import MyLayout from '@/Layouts/MyLayout.vue';
    import { Link } from '@inertiajs/vue3';
    import { useForm } from '@inertiajs/vue3';
    import 'tailwindcss/tailwind.css';

    defineOptions({
        layout: MyLayout
    });

    const form = useForm({
        name: '',
        description: '',
        imageUrl: '',
    });

    const submit = () => {
        form.submit('post', '/project');
    };

    const props = defineProps({
        project: Object
    })
</script>

<template>
    <div class="p-8">
    <h1 class="text-4xl my-3 pink flex-1 m-2 fw-bold">New Project</h1>

<div class="border p-4 rounded w-2/4 m-4">
    <form @submit.prevent="submit">
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

            <div class="text-right">
                    <Link  href="/project" class="btn text-white bold bg-pink-400">Back</Link>
                    <button type="submit" class="btn ml-2 text-white bg-pink-500">Submit</button>
                </div>
    </form>        
</div>
</div>
</template>