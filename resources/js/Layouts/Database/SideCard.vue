<script setup>
import NavLink from '@/Components/NavLink.vue';
import { Link } from '@inertiajs/vue3';


const props = defineProps({
    title: String,
    items: Array,
});

</script>

<template>
    <div class="inset-y-0 left-0 bg-gray-800 text-white w-64 p-4">
        <h2 class="text-xl font-semibold mb-4">{{ title }}</h2>
        <ul v-for="item in items">
            <Link :href="`/database?table=${item.name}`" class="mb-2 cursor-pointer hover:underline" replace>{{
                item.name }}</Link>
        </ul>
    </div>
</template>


<script>
export default {
    name: 'SideCard',
    props: {
        title: {
            type: String,
            default: 'Sidebar'
        },
        items: {
            type: Array,
            required: true
        }
    },
};
</script>