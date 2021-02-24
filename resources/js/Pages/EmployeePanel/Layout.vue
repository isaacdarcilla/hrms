<template>
  <div>
    <div class="flex-1 flex flex-col">
      <nav class="px-4 flex justify-between bg-indigo-800 h-16">
        <ul class="flex items-center">
          <li class="h-8 w-8 mx-3">
            <img class="h-full w-full mx-auto" src="/img/logo.png" />
          </li>
        </ul>

        <ul class="flex items-center">
          <li>
            <logo class="fill-white" width="120" height="28" />
          </li>
        </ul>

        <ul class="flex items-center">
          <li class="h-8 w-8 mx-3">
            <img
              class="h-full w-full rounded-full mx-auto"
              :src="
                employee.photo !== null
                  ? '/storage/' + employee.photo
                  : '/img/user.png'
              "
            />
          </li>
        </ul>
      </nav>
    </div>
    <flash-messages class="mx-10 my-10" />
  </div>
</template>
<script>
import FlashMessages from "@/Shared/FlashMessages";
import Logo from "@/Shared/Logo";
import swal from "sweetalert";

export default {
  components: {
    FlashMessages,
    Logo
  },
  props: {
    employee: Object,
  },
};
</script>
