<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import SideCard from '@/Layouts/Database/SideCard.vue';

import DataTable from 'datatables.net-vue3';
import DataTablesCore from 'datatables.net';



import 'datatables.net-select';
import 'datatables.net-responsive';


DataTable.use(DataTablesCore);

const options = {
    dom: 'Bftip',
    responsive: true,
    select: true,
};



</script>

<template>
    <AppLayout title="Database">
        <!-- <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Database
            </h2>
        </template> -->

        <div class="py-12 grid-cols-1 sm:grid md:grid-cols-12 ">
            <div class="col-span-2 mx-3 mt-6 flex flex-col rounded-lg bg-gray-800 text-white">
                <SideCard title="Tables" :items="$page.props.tables"></SideCard>
            </div>
            <div v-if="$page.props.flash.message" class="alert">
                {{ $page.props.flash.message }}
            </div>
            <div class="col-span-10 mx-3 mt-6 flex flex-col rounded-lg bg-gray-800 text-white">
                <div class="w-full">
                    <!-- <div class="inset-y-0 left-0  w-64 p-4">
                        <h2 class="text-xl font-semibold mb-4" v-html="table"></h2>
                    </div> -->
                    <div class="p-4">
                        <DataTable :options="options" :data="$page.props.table.body"
                            class="table table-hover table-striped" width="100%">
                            <thead>
                                <tr>
                                    <th v-for="header in $page.props.table.header" :key="header">{{ header }}</th>
                                </tr>
                            </thead>
                        </DataTable>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>


<script>
export default {
    name: 'Database',
    components: {
        SideCard
    },
    data() {
        return {
            table: 'None'
        };
    },
}
</script>

<style>
@import 'datatables.net-dt';
</style>