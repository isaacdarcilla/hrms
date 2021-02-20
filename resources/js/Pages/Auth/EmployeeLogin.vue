<template>
  <div class="p-6 bg-gray-200 min-h-screen flex justify-center items-center">
    <div
      class="flex items-center min-h-screen p-4 bg-gray-200 lg:justify-center"
    >
      <div
        class="flex flex-col overflow-hidden bg-white rounded-md shadow-lg max md:flex-row md:flex-1 lg:max-w-screen-md"
      >
        <div class="p-4 py-6 text-white bg-indigo-600">
          <div class="justify-center py-4 content-center">
              <img class="mx-auto object-center" src="/img/user.png" width="80">
          </div>
          <div class="my-3 text-4xl font-bold tracking-wider text-center">
            <a>CatSU HRMS</a>
          </div>
          <p class="mt-6 font-semibold text-center text-gray-300 md:mt-0">
            Catanduanes State University Human Resource Management System
          </p>
          <p
            class="flex flex-col items-center justify-center mt-10 text-center"
          >
            <span>Login to get started.</span>
          </p>
          <inertia-link :href="route('login')"
            class="flex flex-col items-center justify-center mt-6 font-semibold text-center"
          >
            <span class="underline">Go to Admin panel</span>
          </inertia-link>
        </div>
        <div class="p-5 bg-white md:flex-1">
          <h3 class="my-4 mx-5 text-2xl font-semibold text-gray-700">
            Employee Panel
          </h3>
          <form
            @submit.prevent="submit"
            class="flex flex-col space-y-5 mx-5 pb-5"
          >
            <div class="flex flex-col space-y-1">
              <label for="email" class="text-sm pb-2 font-semibold text-gray-500"
                >Email address</label
              >
              <input
                v-model="form.email"
                type="text"
                placeholder="Enter your email address"
                class="px-4 py-2 transition duration-300 border border-gray-300 rounded focus:border-transparent focus:outline-none focus:ring-4 focus:ring-blue-200"
              />
              <div v-if="errors" class="form-error">{{ errors.message }}</div>
            </div>
            <div class="flex flex-col space-y-1">
              <div class="flex items-center justify-between">
                <label
                  for="password"
                  class="text-sm font-semibold pb-2 text-gray-500"
                  >Password</label
                >
              </div>
              <input
                v-model="form.password"
                type="password"
                id="password"
                placeholder="Enter your password"
                class="px-4 py-3 transition duration-300 border border-gray-300 rounded focus:border-transparent focus:outline-none focus:ring-4 focus:ring-blue-200"
              />
            </div>
            <div class="flex items-center space-x-2">
              <input
                v-model="form.remember"
                type="checkbox"
                id="remember"
                class="w-4 h-4 transition duration-300 rounded focus:ring-2 focus:ring-offset-0 focus:outline-none focus:ring-blue-200"
              />
              <label for="remember" class="text-sm font-semibold text-gray-900"
                >Remember login credentials</label
              >
            </div>
            <div class="items-center text-right">
              <loading-button
                :loading="sending"
                class="btn-indigo h-8 align-middle"
                type="submit"
                >Login</loading-button
              >
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import LoadingButton from "@/Shared/LoadingButton";
import Logo from "@/Shared/Logo";
import TextInput from "@/Shared/TextInput";

export default {
  metaInfo: { title: "Login" },
  components: {
    LoadingButton,
    Logo,
    TextInput,
  },
  props: {
    errors: Object,
  },
  data() {
    return {
      sending: false,
      form: {
        email: "",
        password: "",
        remember: true,
      },
    };
  },
  methods: {
    submit() {
      const data = {
        email: this.form.email,
        password: this.form.password,
      };

      this.$inertia.post(this.route("login.attempt.employee"), data, {
        onStart: () => (this.sending = true),
        onFinish: () => (this.sending = false),
      });
    },
  },
};
</script>
