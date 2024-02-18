<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Link } from '@inertiajs/vue3';
import { ref } from 'vue';
import { router } from '@inertiajs/vue3';
import Pagination from '@/Components/Pagination.vue';


defineProps ({
    events: Array
})



const form = ref({
  date: null,
  location: null,
})

function submit() {
  console.log(form.value);
  router.post(route('events.search'), form.value);
}


function getLink(event){
return "/events/" + event.id
}

</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Events
            </h2>
        </template>

    
    <form @submit.prevent="submit">
    <label for="date">Date:</label>
    <input type="date" id="date" v-model="form.date"  />
    <label for="location">Location:</label>
    <input type="text" id="location" v-model="form.location" />
    <button type="submit">Search</button>
  </form>


    <div   class="container mx-auto my-12 grid grid-cols-1 p-5 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-4">
    
    <article v-for="event in events.data"  class="relative overflow-hidden rounded-lg shadow transition hover:shadow-lg cols-1">
<Link :key="event.id" :href="getLink(event)">
  
  <img
    alt="Office"
    src="https://images.unsplash.com/photo-1661956602116-aa6865609028?ixlib=rb-4.0.3&ixid=M3wxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=764&q=80"
    class="absolute inset-0 h-full w-full object-cover"
  />

  <div class="relative bg-gradient-to-t from-gray-900/50 h-full to-gray-900/25 pt-32 sm:pt-48 lg:pt-64">
    <div class="p-4 sm:p-6">
      <time v-text="event.start_date" datetime="2022-10-10" class="block text-xs text-white/90"></time>

      <a href="#">
        <h3 v-text="event.title" class="mt-0.5 text-lg text-white"></h3>
      </a>

      <p v-text="event.description" class="mt-2 line-clamp-3 text-sm/relaxed text-white/95"></p>
    </div>
  </div>

</Link>
</article>


</div>
<Pagination class=" flex items-center  justify-center mb-12 mx-auto" :links="events.links"/>
    </AppLayout>
</template>
