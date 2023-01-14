<template>
  <div class="min-h-full flex bg-gray-200">
    <SideBar :class="{'-ml-[200px]': !SideBarOpened}"/>
    <!--main-->
    <div class="flex-1">
      <Heading @toggle-sidebar="toggleSidebar"></Heading>
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
  import Heading from "./Heading.vue";
  import { ref } from "vue";

const {title} = defineProps({
  title: String
})

const SideBarOpened = ref(true)

function toggleSidebar(){
  SideBarOpened.value = !SideBarOpened.value;
  console.log('Sidebar Opened');
}


</script>
  
  <style scoped>
  </style>