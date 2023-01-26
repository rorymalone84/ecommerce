<template>
    <GuestLayout title="Sign in to your account">
      <form class="mt-8 space-y-6" @submit.prevent="login" method="POST">
        <div v-if="errorMessage" class="flex items-center rounded justify-center py-3 px-5 bg-white text-red 500">
          {{ errorMessage }}
        </div>


        <input type="hidden" name="remember" value="true" />
        <div class="-space-y-px rounded-md shadow-sm">
          <div>
            <label for="email-address" class="sr-only">Email address</label>
            <input
              id="email-address"
              v-model="user.email"
              name="email"
              type="email"
              autocomplete="email"
              required=""
              class="
                relative
                block
                w-full
                appearance-none
                rounded-none rounded-t-md
                border border-gray-300
                px-3
                py-2
                text-gray-900
                placeholder-gray-500
                focus:z-10
                focus:border-indigo-500
                focus:outline-none
                focus:ring-indigo-500
                sm:text-sm
              "
              placeholder="Email address"
            />
          </div>
          <div>
            <label for="password" class="sr-only">Password</label>
            <input
              id="password"
              v-model="user.password"
              name="password"
              type="password"
              autocomplete="current-password"
              required=""
              class="
                relative
                block
                w-full
                appearance-none
                rounded-none rounded-b-md
                border border-gray-300
                px-3
                py-2
                text-gray-900
                placeholder-gray-500
                focus:z-10
                focus:border-indigo-500
                focus:outline-none
                focus:ring-indigo-500
                sm:text-sm
              "
              placeholder="Password"
            />
          </div>
        </div>

        <div class="flex items-center justify-between">
          <div class="flex items-center">
            <input
              id="remember-me"
              v-model="user.remember"
              name="remember-me"
              type="checkbox"
              class="
                h-4
                w-4
                rounded
                border-gray-300
                text-indigo-600
                focus:ring-indigo-500
              "
            />
            <label for="remember-me" class="ml-2 block text-sm text-gray-900"
              >Remember me</label
            >
          </div>

          <div class="text-sm">
            <router-link
                :to="{name: 'requestPassword'}"
                class="font-medium text-indigo-600 hover:text-indigo-500"
                >Forgot your password?
            </router-link>
          </div>
        </div>

        <div>
          <button
            type="submit"
            :disabled="loading"
            :class="{
              'cursor-not-allowed':loading,
              'hover-bg-blue-500':loading
            }"            
            class="
              group
              relative
              flex
              w-full
              justify-center
              rounded-md
              border border-transparent
              bg-indigo-600
              py-2
              px-4
              text-sm
              font-medium
              text-white
              hover:bg-indigo-700
              focus:outline-none
              focus:ring-2
              focus:ring-indigo-500
              focus:ring-offset-2
            "
          >
            <svg class="animate-spin h-5 w-5 mr-3 ..." viewBox="0 0 24 24" v-if="loading">
              <!-- ... -->
            </svg>
            <span class="absolute inset-y-0 left-0 flex items-center pl-3">
              <LockClosedIcon
                class="h-5 w-5 text-indigo-500 group-hover:text-indigo-400"
                aria-hidden="true"
              />
            </span>
            Sign in
          </button>
        </div>
      </form>
    </GuestLayout>
</template>

<script setup>
import { LockClosedIcon } from "@heroicons/vue/20/solid";
import GuestLayout from "../components/GuestLayout.vue";
import { ref, createApp } from "vue";
import store from "../store";
import router from "../router";

const user = {
  email:'',
  password: '',
  remember: false
}

let loading = ref(false);
let errorMessage = ref("");

function login(){
  loading.value = true;
  store.dispatch('login', user)
  .then(() => {
  loading.value.false;
  router.push({ 
    name: 'app.dashboard'
  })    
})
.catch(({response}) => {
  loading.value = false;
  errorMessage.value = response.data.message;
})
}


</script>

<style>
</style>