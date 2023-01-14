<template>
  <!--sidebar-->
  <div class="w-[200px] bg-cyan-900  text-white py-4 px-2 rounded-l-xl transition-all duration-300 ease-in-out">
      Sidebar
      <router-link :to="{name: 'app.dashboard'}" class="flex items-center hover:bg-black/10 py-2 px-2 transition-colors">
        <span class="mr-2 text-gray-400">
          <HomeIcon class="w-5"></HomeIcon>
        </span>
        <span class="text-sm font-light">Dashboard</span>
      </router-link>
      <router-link :to="{name: 'app.dashboard'}" class="flex items-center hover:bg-black/10 py-2 px-2 rounded transition-colors">
        <span class="mr-2 text-gray-400">
          <ViewColumnsIcon class="w-5"></ViewColumnsIcon>
        </span>
        <span class="text-sm font-light">Products</span>
      </router-link>
      <router-link :to="{name: 'app.dashboard'}" class="flex items-center hover:bg-black/10 py-2 px-2 rounded transition-colors">
        <span class="mr-2 text-gray-400">
          <UsersIcon class="w-5"></UsersIcon>
        </span>
        <span class="text-sm font-light">Users</span>
      </router-link>
      <router-link :to="{name: 'app.dashboard'}" class="flex items-center hover:bg-black/10 py-2 px-2 rounded transition-colors">
        <span class="mr-2 text-gray-400">
          <ChartBarIcon class="w-5"></ChartBarIcon>
        </span>
        <span class="text-sm font-light">Stats</span>
      </router-link>         
  </div>    
</template>
<script setup>
import { HomeIcon, UsersIcon, ViewColumnsIcon, ChartBarIcon } from "@heroicons/vue/20/solid";
  
</script>
  
<style scoped>
</style>