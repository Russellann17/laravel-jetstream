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
                    <tr class="bg-cyan-700 ">
                        <th scope="col" class="text-sm font-bold text-white px-6 py-2">ID</th>
                        <th scope="col" class="text-sm font-bold text-white px-6 py-2">Description</th>
                        <th scope="col" class="text-sm font-bold text-white px-6 py-2">Status</th>
                        <th scope="col" class="text-sm font-bold text-white px-6 py-2">Assignee</th>
                        <th scope="col" class="text-sm font-bold text-white px-6 py-2">Action</th>
                    </tr>
                <tbody>
                    <tr class="border-b odd:bg-white even:bg-slate-200 hover:bg-blue-500 hover:text-white" v-for="(task, index) in collection.tasks" :key="Index">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"> {{ task.id }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"> {{ task.description }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"> {{ task.status_string }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"> {{ task.assignee }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                            <div class="flex gap-2 justify-center px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                <SecondaryButton @click="editTask(task.id)">
                                    Edit
                                </SecondaryButton>
                                <DangerButton @click="showDeleteDialog">
                                    Delete
                                </DangerButton>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
</div>
</div>
</div>
 </div>
<!-- Delete confirmation Dialog-->
    <DialogModal :show="show_delete_dialog" @close="show_delete_dialog = false">
            <template #title>
                <h1>Delete Task</h1>
            </template>
    </DialogModal>
</AppLayout>
</template>
<script>
import AppLayout from"@/Layouts/AppLayout.vue";
import PrimaryButton from '@/Components/PrimaryButton.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import DangerButton from '@/Components/DangerButton.vue';
import DialogModal from '@/Components/DialogModal.vue';
import { router } from '@inertiajs/vue3'

export default{

    props:{
        collection:Object
    },

    components:{
        AppLayout,
        PrimaryButton,
        SecondaryButton,
        DangerButton,
        DialogModal
    },
    data:function(){
        return{
            show_delete_dialog: false
        }
    },
    methods:{
        createTask(){
            router.visit(route('tasks.create'), { method: 'get' })
        },
        editTask(id){
            this.$inertia.visit(route('tasks.edit', id), { method: 'get' })
        },
        showDeleteDialog(){
            this.show_delete_dialog = true;
        }
    }
}
</script>