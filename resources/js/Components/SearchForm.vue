<!-- resources/js/Pages/Events/SearchForm.vue -->

<template>
    <form @submit.prevent="searchEvents">
        <input type="date" v-model="date" placeholder="Date">
        <input type="text" v-model="location" placeholder="Location">
        <button type="submit">Search</button>
    </form>
</template>

<script>
import { ref } from 'vue';


export default {
    setup() {
        const date = ref(null);
        const location = ref('');

        const searchEvents = () => {
            // Emit the search event with the form data
            const searchData = { date: date.value, location: location.value };
            emit('search', searchData);
        };

        return {
            date,
            location,
            searchEvents
        };
    }
};
</script>
