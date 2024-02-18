<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Link } from '@inertiajs/vue3';
import { ref } from 'vue';
import { router } from '@inertiajs/vue3';
import Pagination from '@/Components/Pagination.vue';


defineProps({
    fullEvent : Object,
    reviews: Object,
    meanOfRatings: Number,
    similarEvents : Object,
    closeEvents: Object, 
    category: Object,
    isRegistered: Boolean,
    userId: Number
})


const isEventOver = (event) => {
    const endDate = new Date(event.end_date);
    const currentDate = new Date();
    return endDate < currentDate;
  };  


const form = ref({
  review: null,
  rating: null
})

function submit(fullEvent){
  console.log(form.value);
  router.post(route('events.review', { eventId: fullEvent.id }), form.value);
}


function getPrice(event){
    return event.price + " $"
}

function getCategoryLink(event){
    return "/categories/" + event.category_id
}

function getAttachLink(event, userId){
  return "/attach/event/" + event.id + "/user/" + userId
}

function getDetachLink(event, userId){
  return "/detach/event/" + event.id + "/user/" + userId
}


function getLink(event){
return "/events/" + event.id
}

</script>

<template>
    <AppLayout title="Categories">
        <template #header>
            <h2 v-text="fullEvent.title" class="font-semibold text-xl text-gray-800 leading-tight ">
                
            </h2>
        </template>

       <!-- component -->
<div class="md:flex items-start justify-center py-12 2xl:px-20 md:px-6 px-4">
  <!--- more free and premium Tailwind CSS components at https://tailwinduikit.com/ --->

  <div class="xl:w-2/6 lg:w-2/5 w-80 md:block hidden">
    <img class="w-full" alt="image of a girl posing" src="https://i.ibb.co/QMdWfzX/component-image-one.png" />
    <img class="mt-6 w-full" alt="image of a girl posing" src="https://i.ibb.co/qxkRXSq/component-image-two.png" />
  </div>
  <div class="md:hidden">
    <img class="w-full" alt="image of a girl posing" src="https://i.ibb.co/QMdWfzX/component-image-one.png" />
    <div class="flex items-center justify-between mt-3 space-x-4 md:space-x-0">
      <img alt="image-tag-one" class="md:w-48 md:h-48 w-full" src="https://i.ibb.co/cYDrVGh/Rectangle-245.png" />
      <img alt="image-tag-one" class="md:w-48 md:h-48 w-full" src="https://i.ibb.co/f17NXrW/Rectangle-244.png" />
      <img alt="image-tag-one" class="md:w-48 md:h-48 w-full" src="https://i.ibb.co/cYDrVGh/Rectangle-245.png" />
      <img alt="image-tag-one" class="md:w-48 md:h-48 w-full" src="https://i.ibb.co/f17NXrW/Rectangle-244.png" />
    </div>
  </div>
  <div class="xl:w-2/5 md:w-1/2 lg:ml-8 md:ml-6 md:mt-0 mt-6">
    <div class="border-b border-gray-200 pb-6 flex items-center justify-between">
      <h1 v-text="fullEvent.title" class="lg:text-2xl text-xl font-semibold text-gray-800 "></h1>
      <p v-if="fullEvent.price === 0" class="lg:text-2xl text-xl font-semibold text-green-500">Free</p>
      <p v-else v-text="getPrice(fullEvent)" class="lg:text-2xl text-xl font-semibold text-gray-800"></p>
    </div>

    <div class="py-4 border-b border-gray-200 flex items-center justify-between">
      <p class="text-base leading-4 text-gray-800 ">Location</p>
      <div class="flex items-center justify-center">
        <p v-text="fullEvent.location" class="text-sm leading-none text-gray-600 "></p>
      </div>
    </div>

    <div class="py-4 border-b border-gray-200 flex items-center justify-between">
      <p class="text-base leading-4 text-gray-800 ">Capacity</p>
      <div class="flex items-center justify-center">
        <p v-text="fullEvent.capacity" class="text-sm leading-none text-gray-600"></p>
      </div>
    </div>

    <div class="py-4 border-b border-gray-200 flex items-center justify-between">
      <p class="text-base leading-4 text-gray-800 ">Category</p>
      <div class="flex items-center justify-center">
        <p v-if="!fullEvent.category_id" class="text-sm leading-none text-gray-600">Not Specified</p>
        <Link v-else :href="getCategoryLink(fullEvent)">
        <!--<p  v-text="category.name" class="text-sm leading-none text-gray-600"></p>-->   
        <span
  class="inline-flex items-center justify-center rounded-full bg-purple-100 px-2.5 py-0.5 text-purple-700"
>
  <svg
    xmlns="http://www.w3.org/2000/svg"
    fill="none"
    viewBox="0 0 24 24"
    stroke-width="1.5"
    stroke="currentColor"
    class="-ms-1 me-1.5 h-4 w-4"
  >
    <path
      stroke-linecap="round"
      stroke-linejoin="round"
      d="M14.25 7.756a4.5 4.5 0 100 8.488M7.5 10.5h5.25m-5.25 3h5.25M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
    />
  </svg>

  <p v-text="category.name" class="whitespace-nowrap text-sm"></p>
</span>

        </Link>
      </div>
    </div>


    <div class="py-4 border-b border-gray-200 flex items-center justify-between">
      <p class="text-base leading-4 text-gray-800 ">Start</p>
      <div class="flex items-center justify-center">
        <p v-text="fullEvent.start_date" class="text-sm leading-none text-gray-600"></p>
      </div>
    </div>

    <div class="py-4 border-b border-gray-200 flex items-center justify-between">
      <p class="text-base leading-4 text-gray-800 ">End</p>
      <div class="flex items-center justify-center">
        <p v-text="fullEvent.end_date" class="text-sm leading-none text-gray-600"></p>
      </div>
    </div>
    <Link :href="getDetachLink(fullEvent, userId)" v-if="isRegistered === true" class="dark:bg-white dark:text-gray-900 dark:hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-800 text-base flex items-center justify-center leading-none text-white bg-gray-800 w-full py-4 hover:bg-gray-700 focus:outline-none">
      Se désinscrire
    </Link>
    <Link :href="getAttachLink(fullEvent, userId)" v-if="isRegistered === false" class="dark:bg-white dark:text-gray-900 dark:hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-800 text-base flex items-center justify-center leading-none text-white bg-gray-800 w-full py-4 hover:bg-gray-700 focus:outline-none">
      S'inscrire
    </Link>
    
  </div>
</div>


    </AppLayout>

    <h2>Moyenne des reviews : {{ meanOfRatings/2*2 }}</h2>
    <div class="container mx-auto" v-if="Object.keys(reviews).length > 0">
      <h2> Reviews </h2>
    <div  v-for="review in reviews.data">

      <div class="flex gap-5 p-10 bg-slate-300">
        <div>{{ review.review }}</div>
        <div>{{ review.rating }}/5</div>
        {{ console.log(review) }}

      </div>
       
     
    </div>
    <Pagination class="mt-6" :links="reviews.links" />


    </div>

   
    {{ console.log(reviews) }}
    <div v-if="isEventOver(fullEvent)">
      <div  class="container mx-auto flex items-center justify-center flex-col">
      <h2>Laisser une review</h2>
      <form class="flex flex-col" @submit.prevent="submit(fullEvent)">
    <label for="review">Review</label>
    <input class="mb-5 border" type="textarea" id="review" v-model="form.review"  />
    <label for="location">Rating</label>
    <select name="rating" id="rating" v-model="form.rating">
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
      <option value="5">5</option>
    </select>
    <button class="mt-5 bg-blue-100 p-2" type="submit">Poster la review</button>
  </form>


    </div>
    </div>
   


   



<div class="container mx-auto">
    <h2 class="text-center text-4xl p-5">Évènements similaires</h2>

<div   class="container mx-auto my-12 grid grid-cols-1 p-5 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-4">
   
  
   <article v-if="similarEvents !== 0" v-for="event in similarEvents"  class="relative overflow-hidden rounded-lg shadow transition hover:shadow-lg cols-1">
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

<div v-if="similarEvents == 0"> <h1>Pas d'évents similaires</h1></div>
</div>




<h2 class="text-center text-4xl p-5">Évènements au même endroit</h2>

<div   class="container mx-auto my-12 grid grid-cols-1 p-5 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-4">
   
  
   <article v-if="closeEvents !== 0" v-for="event in closeEvents"  class="relative overflow-hidden rounded-lg shadow transition hover:shadow-lg cols-1">
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

<div v-if="closeEvents == 0"> <h1>Pas d'évènements au même endroit</h1></div>
</div>
</div>
</template>

<script>

</script>
