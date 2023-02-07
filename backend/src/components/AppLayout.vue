<template>
  <div class="min-h-full flex bg-gray-200" v-if="currentUser.id">

    <SideBar :class="{'-ml-[200px]': !SideBarOpened}"/>
    <!--main-->
    <div class="flex-1">
      <Navbar @toggle-sidebar="toggleSidebar"></Navbar>
      <main class="p-6">
        <div class="p-4 rounded bg-white">
          <router-view></router-view>
        </div>
      </main>
    </div>
  </div>
  <div v-else class="flex items-center justify-center min-h-full bg-gray-200">
    <svg
        class="animate-spin -ml-1 mr-3 h-10 w-10 text-blue-900"
        xmlns="http://www.w3.org/2000/svg"
        fill="none"
        viewBox="0 0 24 24"
      >
        <circle
          class="opacity-25"
          cx="12"
          cy="12"
          r="10"
          stroke="currentColor"
          stroke-width="4"
          ></circle>
          <path
            class="opacity-75"
            fill="currentColor"
            d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"
          ></path>
        </svg>
        <span>
          <div class="mt-2">
            Loading
          </div>
        </span>
  </div>
</template>
  
<script setup>
  import SideBar from "./SideBar.vue";
  import Navbar from "./Navbar.vue";
  import { ref, onMounted, computed } from "vue";
  import store from "../store";
  import LoadingSpinner from "./core/LoadingSpinner.vue";

const {title} = defineProps({
  title: String
})

const currentUser = computed(() => store.state.user.data); 

onMounted( () => {
  SideBarOpened.value = false;
  store.dispatch('getUser')
})

const SideBarOpened = ref(true)



function toggleSidebar(){
  SideBarOpened.value = !SideBarOpened.value;
  console.log('Sidebar Opened');
}


</script>
  
  <style scoped>
  </style>