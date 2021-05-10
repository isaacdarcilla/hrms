<template>
  <div>
    <h1 class="mb-8 font-bold text-3xl">
      <inertia-link
        class="text-indigo-400 hover:text-indigo-600"
        :href="route('psipop.index')"
        >Psipop</inertia-link
      >
      <span class="text-indigo-400 font-medium">/</span> Edit Psipop 📂
    </h1>
    <div class="bg-white rounded shadow overflow-hidden">
      <form @submit.prevent="submit">
        <div class="p-8 -mr-6 flex flex-wrap">
          <text-input
            v-model="form.item_number"
            :error="errors.item_number"
            class="pr-6 pb-8 w-full lg:w-1/2"
            label="Item Number *"
            placeholder="Enter item number"
          />
          <div class="pr-6 pb-8 w-full lg:w-1/2">
            <label class="form-label">Position *</label>
            <v-selectize
              v-model="form.position"
              :options="options"
              :limit="10"
              label="Position *"
              class="form-input block w-full"
              placeholder="Type and select position"
            />
            <div v-if="$page.errors.position !== null" class="form-error">
              {{ $page.errors.position }}
            </div>
          </div>
          <text-input
            v-model="form.tin_number"
            :error="errors.tin_number"
            class="pr-6 pb-8 w-full lg:w-1/2"
            label="TIN Number *"
            placeholder="Enter TIN number"
          />
          <select-input
            disabled="true"
            v-model="form.incumbent_name"
            :error="errors.incumbent_name"
            class="pr-6 pb-8 w-full lg:w-1/2"
            label="Incumbent Name *"
          >
            <option class="capitalize" v-for="e in employees" :key="e.id">
              {{ e.last_name }}, {{ e.first_name }} {{ e.middle_name }}
            </option>
          </select-input>
          <select-input
            v-model="form.sex"
            :error="errors.sex"
            class="pr-6 pb-8 w-full lg:w-1/2"
            label="Sex *"
          >
            <option value="Male">Male</option>
            <option value="Female">Female</option>
          </select-input>

          <div class="pr-6 pb-8 w-full lg:w-1/2">
            <label class="form-label">Birth Date *</label>
            <v-date-picker v-model="form.birth_date">
              <template v-slot="{ inputValue, togglePopover }">
                <div class="flex items-center">
                  <input
                    @focus="togglePopover"
                    :value="format(inputValue)"
                    class="form-input block w-full"
                    readonly
                    placeholder="Select birth date"
                  />
                </div>
              </template>
            </v-date-picker>
            <div v-if="$page.errors.birth_date !== null" class="form-error">
              {{ $page.errors.birth_date }}
            </div>
          </div>

          <div class="pr-6 pb-8 w-full lg:w-1/2">
            <label class="form-label">Original Appoint Date *</label>
            <v-date-picker v-model="form.appoint_date">
              <template v-slot="{ inputValue, togglePopover }">
                <div class="flex items-center">
                  <input
                    @focus="togglePopover"
                    :value="format(inputValue)"
                    class="form-input block w-full"
                    readonly
                    placeholder="Select appoint date"
                  />
                </div>
              </template>
            </v-date-picker>
            <div v-if="$page.errors.appoint_date !== null" class="form-error">
              {{ $page.errors.appoint_date }}
            </div>
          </div>

          <div class="pr-6 pb-8 w-full lg:w-1/2">
            <label class="form-label">Latest Promotion Date *</label>
            <v-date-picker v-model="form.last_promo_date">
              <template v-slot="{ inputValue, togglePopover }">
                <div class="flex items-center">
                  <input
                    @focus="togglePopover"
                    :value="format(inputValue)"
                    class="form-input block w-full"
                    readonly
                    placeholder="Select last promotion date"
                  />
                </div>
              </template>
            </v-date-picker>
            <div
              v-if="$page.errors.last_promo_date !== null"
              class="form-error"
            >
              {{ $page.errors.last_promo_date }}
            </div>
          </div>

          <text-input
            v-model="form.salary_grade"
            :error="errors.salary_grade"
            class="pr-6 pb-8 w-full lg:w-1/2"
            label="Salary Grade *"
            placeholder="Enter salary grade"
          />
          <text-input
            v-model="form.monthly_salary"
            :error="errors.monthly_salary"
            class="pr-6 pb-8 w-full lg:w-1/2"
            label="Monthly Salary *"
            placeholder="Enter monthly salary"
          />
          <text-input
            v-model="form.authorized_salary"
            :error="errors.authorized_salary"
            class="pr-6 pb-8 w-full lg:w-1/2"
            label="Annual Salary *"
            placeholder="Enter authorized salary"
          />
          <text-input
            v-model="form.actual_salary"
            :error="errors.actual_salary"
            class="pr-6 pb-8 w-full lg:w-1/2"
            label="Actual Salary *"
            placeholder="Enter actual salary"
          />
        </div>
        <div
          class="px-8 py-4 bg-gray-100 border-t border-gray-200 flex justify-end items-center"
        >
          <loading-button :loading="sending" class="btn-indigo" type="submit"
            >Update Psipop</loading-button
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
import FileInput from "@/Shared/FileInput";
import moment from "moment";
import VSelectize from "@isneezy/vue-selectize";
import jobs from "../../Shared/Modals/jobs.json";

export default {
  metaInfo: { title: "Edit Psipop" },
  layout: Layout,
  components: {
    LoadingButton,
    SelectInput,
    TextInput,
    FileInput,
    VSelectize,
  },
  props: {
    errors: Object,
    employees: Array,
    psipop: Object,
  },
  remember: "form",
  data() {
    return {
      sending: false,
      options: jobs,
      form: {
        item_number: this.psipop.item_number,
        position: this.psipop.position,
        tin_number: this.psipop.tin_number,
        incumbent_name: this.psipop.incumbent_name,
        sex: this.psipop.sex,
        birth_date: this.psipop.birth_date,
        appoint_date: this.psipop.appoint_date,
        last_promo_date: this.psipop.last_promo_date,
        salary_grade: this.psipop.salary_grade,
        filled_position: 1,
        monthly_salary: this.psipop.monthly_salary,
        authorized_salary: this.psipop.authorized_salary,
        actual_salary: this.psipop.actual_salary,
      },
    };
  },
  mounted() {
    this.increment(this.psipop.last_promo_date);
  },
  watch: {
    form: {
      handler(e) {
        this.form.authorized_salary = (e.monthly_salary * 12).toString();
      },
      deep: true,
    },
  },
  methods: {
    increment(date) {
      console.log(date);
    },
    submit() {
      this.$inertia.put(
        this.route("psipop.update", this.psipop.id),
        this.form,
        {
          onStart: () => (this.sending = true),
          onFinish: () => (this.sending = false),
        }
      );
    },
    format(value) {
      if (value) {
        return moment(String(value)).format("MMMM D, YYYY");
      }
    },
  },
};
</script>
