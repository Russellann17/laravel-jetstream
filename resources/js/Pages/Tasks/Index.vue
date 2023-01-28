<template>
<AppLayout Title="Task Management">
    <template #header>
        <PrimaryButton class="float-right" @click="createTask">
                Create Task
            </PrimaryButton>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Task Management
            </h2>
        </template>

        <div class="flex flex-col">
  <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
    <div class="py-4 inline-block min-w-full sm:px-6 lg:px-8">
      <div class="overflow-hidden">
        <table class="min-w-full text-center">
          <thead class="border-b bg-gray-800">
                    <tr>
                        <th scope="col" class="text-sm font-bold text-white px-6 py-2">ID</th>
                        <th scope="col" class="text-sm font-bold text-white px-6 py-2">Description</th>
                        <th scope="col" class="text-sm font-bold text-white px-6 py-2">Status</th>
                        <th scope="col" class="text-sm font-bold text-white px-6 py-2">Assignee</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b" v-for="(task, index) in collection.tasks" :key="Index">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"> {{ task.id }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"> {{ task.description }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"> {{ task.status }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"> {{ task.assignee }}</td>
                    </tr>
                </tbody>
            </table>
</div>
</div>
</div>
 </div>

</AppLayout>
</template>
<script>
import AppLayout from"@/Layouts/AppLayout.vue";
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { router } from '@inertiajs/vue3'

export default{

    props:{
        collection:Object
    },

    components:{
        AppLayout,
        PrimaryButton
    },

    methods:{
        createTask(){
            router.visit(route('tasks.create'), { method: 'get' })
        }
    }
}
</script>