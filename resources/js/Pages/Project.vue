<script setup>
import MyLayout from '@/Layouts/MyLayout.vue';
import { useForm } from '@inertiajs/vue3';
import { Link, usePage } from "@inertiajs/vue3";
import { ref } from 'vue';

defineOptions({
  layout: MyLayout
});

const props = defineProps({
    project: Array
});

const form = useForm({
  name: props.project.name,
  description: props.project.description,
  imageUrl: props.project.category_id,
});

const delEmp = (project) => {
  const del = confirm("Are you sure you want to delete?");
  if (del) {
    form.delete(`/project/${project.id}`, {
      preserveScroll: true
    }).then(() => {
      // Handle success or other actions after deletion
    });
  }
};
</script>

<template>
  <div class="mt-[-8%]">

    <div class="flex justify-between items-center mt-[10%] ml-[2%]">
        <div class="flex items-center space-x-4">
            <Link href='/portfolio' class="btn arrow">←</Link>
            <h1 class="text-4xl fw-bold">Portfolio</h1>
        </div>
        <div class="mr-[1%]">
            <Link href='/project/create' class="bg-pink-400 text-white rounded fw-bold p-2">
                Add Project
            </Link>
        </div>
    </div>

    
    <div class="overflow-auto h-[60vh] p-2 container">
      <div v-for="project in project" :key="project.id" class="mt-2 border p-2 bg-white rounded">    
          <div class="flex gap-2">
            <div class="w-[50%]">
              <img :src="project.imageUrl" alt="Portfolio Image" class="w-full rounded h-40 object-cover">
            </div>
            <div class="w-full flex flex-col justify-between">
              <div>
              <div class="flex items-center">
                <h1 class="text-4xl flex-1 nn tit">{{ project.name }}</h1>
                <button @click="delEmp(project)" class="bg-pink-400 hover:bg-red-500 text-white py-2 px-3 rounded transition ease-linear duration-200">X</button>
              </div>
              <p class="nn">{{ project.description }}</p>
            </div>
            <div class="flex justify-end">
          <Link :href="'/project/' + project.id + '/edit'"  class="bg-pink-300 text-white">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-pencil-square rounded" viewBox="0 0 16 16">
              <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
              <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
            </svg>
          </Link>
        </div>
            </div>
          </div>
        </div>
      </div>    
    
  </div>  

</template>



<style scoped>

.tit{
  font-weight: bold;
  font-size: 2.25rem;
  color: #ff69b4;
}
.nn{
  text-align: center;

}
/* .divv {
  display: flex;
} */
.row {
  padding: 20px;
}
.tt {
  font-size: 30px;
}
.text-4xl {
  font-size: 2.25rem;
  color: rgb(255, 255, 255);
  text-shadow: #ff69b4 2px 2px;
}
.arrow{
    font-size: 2.25rem;
    color: #ff69b4;
}
.arrow:hover{
    color: rgb(255, 223, 255);
}

.btn-pink {
            background-color: #ff69b4;
            color: #ffffff;
        }
</style>
