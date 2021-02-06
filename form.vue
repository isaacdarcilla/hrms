<div class="mt-4 bg-white rounded shadow overflow-hidden">
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
