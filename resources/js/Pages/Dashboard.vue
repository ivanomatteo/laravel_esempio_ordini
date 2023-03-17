<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, router } from '@inertiajs/vue3';
import Paginator from 'primevue/paginator';
import DataTable from 'primevue/datatable';
import Column from 'primevue/column';
import ColumnGroup from 'primevue/columngroup';   // optional
import Row from 'primevue/row';                   // optional

import Alert from '../Components/Alert.vue';

import { DateTime } from "luxon";

import { ref, reactive } from 'vue';

let props = defineProps({
    myOrders: Object,
});


const loadPage = (option) => {
    router.visit(props.myOrders.path + '?page=' + (option.page + 1) + '&per_page=' + option.rows);
};

const formatDate = (str) => {
    return DateTime.fromISO(str).toLocaleString(DateTime.DATETIME_SHORT);
}

const azione = (item) => {

    console.log('azione!!!', item.created_at);
}


</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">You're logged in!</div>
                </div>
            </div>
        </div>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">


                    <DataTable lazy paginator :value="myOrders.data" @page="loadPage" :totalRecords="myOrders.total"
                        :first="myOrders.from" :rows="myOrders.per_page" :rowsPerPageOptions="[5, 10, 20, 50]"
                        tableStyle="min-width: 50rem">
                        <Column field="id" header="id"></Column>
                        <Column field="notes" header="notes"></Column>
                        <Column field="created_at" header="creato il">
                            <template #body="slotProps">
                                {{ formatDate(slotProps.data.created_at) }}
                            </template>
                        </Column>
                        <Column field="updated_at" header="modificato il">
                            <template #body="slotProps">
                                {{ formatDate(slotProps.data.created_at) }}
                            </template>
                        </Column>
                        <Column field="__commands" header="">
                            <template #body="slotProps">
                                <button class="btn-primary" @click="azione(slotProps.data)">aaa</button>
                            </template>
                        </Column>
                    </DataTable>


                    <Alert color="red">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat numquam alias nisi voluptates id a recusandae inventore eveniet hic officiis. Explicabo recusandae voluptatum reiciendis sint commodi quod illum neque quis.
                    </Alert>

                </div>
            </div>
        </div>


    </AuthenticatedLayout>
</template>
