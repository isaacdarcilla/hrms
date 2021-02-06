<template>
  <div>
    <h1 class="mb-8 font-bold text-3xl">
      <inertia-link
        class="text-indigo-400 hover:text-indigo-600"
        :href="route('employees')"
        >Employees</inertia-link
      >
      <span class="text-indigo-400 font-medium">/</span>
      {{ form.first_name }} {{ form.last_name }} 👥
    </h1>
    <trashed-message v-if="contact.deleted_at" class="mb-6" @restore="restore">
      This contact has been deleted.
    </trashed-message>
    <div class="h-full">
      <div class="border-b-2 block md:flex">
        <div class="w-full md:w-2/5 p-4 sm:p-6 lg:p-8 rounded-xl bg-white shadow-md">
          <figure class="bg-white rounded-xl p-8">
            <img
              class="w-32 h-32 rounded-full mx-auto"
              src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=4&amp;w=256&amp;h=256&amp;q=60"
              alt=""
              width="384"
              height="512"
            />
            <div class="pt-6 text-center space-y-4">
              <figcaption class="text-lg font-large font-semibold">
                <div class="text-cyan-600">{{ contact.first_name }} {{ contact.last_name }}</div>
                <div class="text-gray-500">{{ contact.email }}</div>
              </figcaption>
            </div>
          </figure>
        </div>

        <div class="w-full md:w-3/5 p-8 lg:ml-4 rounded-xl bg-white shadow-md">
          <div class="rounded p-3">
            <div class="pb-6">
              <label for="name" class="font-semibold text-gray-700 block pb-1"
                >Name</label
              >
              <div class="flex">
                <input
                  disabled
                  id="username"
                  class="border-1 rounded-r px-4 py-2 w-full"
                  type="text"
                  value="Jane Name"
                />
              </div>
            </div>
            <div class="pb-4">
              <label for="about" class="font-semibold text-gray-700 block pb-1"
                >Email</label
              >
              <input
                disabled
                id="email"
                class="border-1 rounded-r px-4 py-2 w-full"
                type="email"
                value="example@example.com"
              />
              <span class="text-gray-600 pt-4 block opacity-70"
                >Personal login information of your account</span
              >
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="bg-white rounded shadow overflow-hidden">
      <form @submit.prevent="submit">
        <div class="p-8 -mr-6 -mb-8 flex flex-wrap">
          <text-input
            v-model="form.first_name"
            :error="errors.first_name"
            class="pr-6 pb-8 w-full lg:w-1/2"
            label="First name"
          />
          <text-input
            v-model="form.last_name"
            :error="errors.last_name"
            class="pr-6 pb-8 w-full lg:w-1/2"
            label="Last name"
          />
          <select-input
            v-model="form.organization_id"
            :error="errors.organization_id"
            class="pr-6 pb-8 w-full lg:w-1/2"
            label="Organization"
          >
            <option :value="null" />
            <option
              v-for="organization in organizations"
              :key="organization.id"
              :value="organization.id"
            >
              {{ organization.name }}
            </option>
          </select-input>
          <text-input
            v-model="form.email"
            :error="errors.email"
            class="pr-6 pb-8 w-full lg:w-1/2"
            label="Email"
          />
          <text-input
            v-model="form.phone"
            :error="errors.phone"
            class="pr-6 pb-8 w-full lg:w-1/2"
            label="Phone"
          />
          <text-input
            v-model="form.address"
            :error="errors.address"
            class="pr-6 pb-8 w-full lg:w-1/2"
            label="Address"
          />
          <text-input
            v-model="form.city"
            :error="errors.city"
            class="pr-6 pb-8 w-full lg:w-1/2"
            label="City"
          />
          <text-input
            v-model="form.region"
            :error="errors.region"
            class="pr-6 pb-8 w-full lg:w-1/2"
            label="Province/State"
          />
          <select-input
            v-model="form.country"
            :error="errors.country"
            class="pr-6 pb-8 w-full lg:w-1/2"
            label="Country"
          >
            <option :value="null" />
            <option value="CA">Canada</option>
            <option value="US">United States</option>
          </select-input>
          <text-input
            v-model="form.postal_code"
            :error="errors.postal_code"
            class="pr-6 pb-8 w-full lg:w-1/2"
            label="Postal code"
          />
        </div>
        <div
          class="px-8 py-4 bg-gray-100 border-t border-gray-200 flex items-center"
        >
          <button
            v-if="!contact.deleted_at"
            class="text-red-600 hover:underline"
            tabindex="-1"
            type="button"
            @click="destroy"
          >
            Delete Contact
          </button>
          <loading-button
            :loading="sending"
            class="btn-indigo ml-auto"
            type="submit"
            >Update Contact</loading-button
          >
        </div>
      </form>
    </div>
  </div>
</template>

<script>
import Layout from "@/Shared/Layout";
import LoadingButton from "@/Shared/LoadingButton";
import SelectInput from "@/Shared/SelectInput";
import TextInput from "@/Shared/TextInput";
import TrashedMessage from "@/Shared/TrashedMessage";

export default {
  metaInfo() {
    return {
      title: `${this.form.first_name} ${this.form.last_name}`,
    };
  },
  layout: Layout,
  components: {
    LoadingButton,
    SelectInput,
    TextInput,
    TrashedMessage,
  },
  props: {
    errors: Object,
    contact: Object,
    organizations: Array,
  },
  remember: "form",
  data() {
    return {
      sending: false,
      form: {
        first_name: this.contact.first_name,
        last_name: this.contact.last_name,
        organization_id: this.contact.organization_id,
        email: this.contact.email,
        phone: this.contact.phone,
        address: this.contact.address,
        city: this.contact.city,
        region: this.contact.region,
        country: this.contact.country,
        postal_code: this.contact.postal_code,
      },
    };
  },
  methods: {
    submit() {
      this.$inertia.put(
        this.route("employees.update", this.contact.id),
        this.form,
        {
          onStart: () => (this.sending = true),
          onFinish: () => (this.sending = false),
        }
      );
    },
    destroy() {
      if (confirm("Are you sure you want to delete this contact?")) {
        this.$inertia.delete(this.route("employees.destroy", this.contact.id));
      }
    },
    restore() {
      if (confirm("Are you sure you want to restore this contact?")) {
        this.$inertia.put(this.route("employees.restore", this.contact.id));
      }
    },
  },
};
</script>
