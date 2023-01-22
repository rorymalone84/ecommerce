<template>
  <div class="min-h-full flex bg-gray-200">
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
</template>
  
<script setup>
  import SideBar from "./SideBar.vue";
  import Navbar from "./Navbar.vue";
  import { ref, onMounted } from "vue";

const {title} = defineProps({
  title: String
})

onMounted( () => {
  SideBarOpened.value = false;
})

const SideBarOpened = ref(true)



function toggleSidebar(){
  SideBarOpened.value = !SideBarOpened.value;
  console.log('Sidebar Opened');
}


</script>
  
  <style scoped>
  </style>