<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Link } from '@inertiajs/vue3';
import { RedIntegerFormat } from 'three';

defineProps({
    event : Object,
    category: Object,
    isRegistered: Boolean,
    userId: Number
})

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
</script>

<template>
    <AppLayout title="Categories">
        <template #header>
            <h2 v-text="event.title" class="font-semibold text-xl text-gray-800 leading-tight ">
                
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
      <h1 v-text="event.title" class="lg:text-2xl text-xl font-semibold text-gray-800 "></h1>
      <p v-if="event.price === 0" class="lg:text-2xl text-xl font-semibold text-green-500">Free</p>
      <p v-else v-text="getPrice(event)" class="lg:text-2xl text-xl font-semibold text-gray-800"></p>
    </div>

    <div class="py-4 border-b border-gray-200 flex items-center justify-between">
      <p class="text-base leading-4 text-gray-800 ">Location</p>
      <div class="flex items-center justify-center">
        <p v-text="event.location" class="text-sm leading-none text-gray-600 "></p>
      </div>
    </div>

    <div class="py-4 border-b border-gray-200 flex items-center justify-between">
      <p class="text-base leading-4 text-gray-800 ">Capacity</p>
      <div class="flex items-center justify-center">
        <p v-text="event.capacity" class="text-sm leading-none text-gray-600"></p>
      </div>
    </div>

    <div class="py-4 border-b border-gray-200 flex items-center justify-between">
      <p class="text-base leading-4 text-gray-800 ">Category</p>
      <div class="flex items-center justify-center">
        <p v-if="!event.category_id" class="text-sm leading-none text-gray-600">Not Specified</p>
        <Link v-else :href="getCategoryLink(event)">
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
        <p v-text="event.start_date" class="text-sm leading-none text-gray-600"></p>
      </div>
    </div>

    <div class="py-4 border-b border-gray-200 flex items-center justify-between">
      <p class="text-base leading-4 text-gray-800 ">End</p>
      <div class="flex items-center justify-center">
        <p v-text="event.end_date" class="text-sm leading-none text-gray-600"></p>
      </div>
    </div>
    <Link :href="getDetachLink(event, userId)" v-if="isRegistered === true" class="dark:bg-white dark:text-gray-900 dark:hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-800 text-base flex items-center justify-center leading-none text-white bg-gray-800 w-full py-4 hover:bg-gray-700 focus:outline-none">
      Se désinscrire
    </Link>
    <Link :href="getAttachLink(event, userId)" v-if="isRegistered === false" class="dark:bg-white dark:text-gray-900 dark:hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-800 text-base flex items-center justify-center leading-none text-white bg-gray-800 w-full py-4 hover:bg-gray-700 focus:outline-none">
      S'inscrire
    </Link>
    
  </div>
</div>

    </AppLayout>
</template>

<script>

</script>
