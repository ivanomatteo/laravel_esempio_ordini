<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';



defineProps({
    myOrders: Object,
});



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




                    <table>

                        <thead>
                            <tr>
                                <th>id</th>
                                <th>notes</th>
                                <th>creato il</th>
                                <th>modificato il</th>
                            </tr>
                        </thead>

                        <tbody>

                            <tr v-for="o in myOrders.data">
                                <td>{{ o.id }}</td>
                                <td>{{ o.notes }}</td>
                                <td>{{ o.created_at }}</td>
                                <td>{{ o.updated_at }}</td>

                            </tr>

                        </tbody>

                    </table>

                    <Link :href="myOrders.prev_page_url">
                    prev
                    </Link>
                    <Link :href="myOrders.next_page_url">
                    next
                    </Link>


                </div>
            </div>
        </div>


    </AuthenticatedLayout>
</template>
