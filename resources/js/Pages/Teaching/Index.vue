<template>
  <div>
    <h1 class="mb-8 font-bold text-3xl">Teaching & Non-teaching Profiles 👩‍🏫</h1>
    <div class="mb-6 flex justify-between items-center">
      <search-filter
        v-model="form.search"
        class="w-full max-w-md mr-4"
        @reset="reset"
      >
        <button>Select Filter Options</button>
      </search-filter>
    </div>
    <div class="shadow overflow-x-auto border-b border-gray-200 sm:rounded-lg">
      <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-white">
          <tr class="transition-all hover:bg-gray-100 hover:shadow-lg">
            <th
              scope="col"
              class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
            >
              Employee Name
            </th>
            <th
              scope="col"
              class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
            >
              Type
            </th>
            <th
              scope="col"
              class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
            >
              Birthday
            </th>
            <th
              scope="col"
              class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
            >
              Age
            </th>
            <th
              scope="col"
              class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
            >
              Sex
            </th>
            <th
              scope="col"
              class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
            >
              Civil Status
            </th>
            <th
              scope="col"
              class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
            >
              Tenure of Employment
            </th>
            <th
              scope="col"
              class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
            >
              Home College
            </th>
            <th
              scope="col"
              class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
            >
              Home Department
            </th>
            <th
              scope="col"
              class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
            >
              Position
            </th>
            <th
              scope="col"
              class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
            >
              Salary Grade
            </th>
            <th
              scope="col"
              class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
            >
              Monthly Salary
            </th>
            <th
              scope="col"
              class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
            >
              Annual Salary
            </th>
            <th
              scope="col"
              class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
            >
              Professional Licensure Passed
            </th>

            <th
              scope="col"
              class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
            >
              Bachelor's Degree
            </th>
            <th
              scope="col"
              class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
            >
              Bachelor's Degree Specialization
            </th>
            <th
              scope="col"
              class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
            >
              Master's Degree
            </th>
            <th
              scope="col"
              class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
            >
              Master's Degree Specialization
            </th>
            <th
              scope="col"
              class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
            >
              Master's Degree Units Earned
            </th>
            <th
              scope="col"
              class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
            >
              Doctorate's Degree
            </th>
            <th
              scope="col"
              class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
            >
              Doctorate's Degree Specialization
            </th>
            <th
              scope="col"
              class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
            >
              Doctorate's Degree Units Earned
            </th>
            <th
              scope="col"
              class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
            >
              Name of School
            </th>
          </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
          <tr
            v-for="profile in profiles.data"
            :key="profile.id"
            class="hover:bg-gray-100 focus-within:bg-gray-100"
          >
            <td
              class="px-6 py-4 whitespace-nowrap transition duration-500 ease-in-out transform hover:-translate-y-1"
            >
              <inertia-link
                :href="route('teaching.nonteaching.list')"
                class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"
              >
                <div class="capitalize">
                  {{ profile.contact.first_name }}
                  {{ profile.contact.middle_name }}
                  {{ profile.contact.last_name }}
                </div>
              </inertia-link>
            </td>
            <td
              class="px-6 py-4 whitespace-nowrap transition duration-500 ease-in-out transform hover:-translate-y-1"
            >
              <inertia-link
                :href="route('teaching.nonteaching.list')"
                class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"
              >
                <div class="capitalize">
                  {{ profile.type }}
                </div>
              </inertia-link>
            </td>
            <td
              class="px-6 py-4 whitespace-nowrap transition duration-500 ease-in-out transform hover:-translate-y-1"
            >
              <inertia-link
                :href="route('teaching.nonteaching.list')"
                class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"
              >
                <div class="capitalize">
                  {{ format(profile.contact.birth_date) }}
                </div>
              </inertia-link>
            </td>
            <td
              class="px-6 py-4 whitespace-nowrap transition duration-500 ease-in-out transform hover:-translate-y-1"
            >
              <inertia-link
                :href="route('teaching.nonteaching.list')"
                class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"
              >
                <div class="capitalize">
                  {{ age(profile.contact.birth_date) }}
                </div>
              </inertia-link>
            </td>
            <td
              class="px-6 py-4 whitespace-nowrap transition duration-500 ease-in-out transform hover:-translate-y-1"
            >
              <inertia-link
                :href="route('teaching.nonteaching.list')"
                class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"
              >
                <div class="capitalize">
                  {{ profile.contact.sex }}
                </div>
              </inertia-link>
            </td>
            <td
              class="px-6 py-4 whitespace-nowrap transition duration-500 ease-in-out transform hover:-translate-y-1"
            >
              <inertia-link
                :href="route('teaching.nonteaching.list')"
                class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"
              >
                <div class="capitalize">
                  {{ profile.contact.civil_status }}
                </div>
              </inertia-link>
            </td>
            <td
              class="px-6 py-4 whitespace-nowrap transition duration-500 ease-in-out transform hover:-translate-y-1"
            >
              <inertia-link
                :href="route('teaching.nonteaching.list')"
                class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"
              >
                <div class="capitalize">
                  {{ profile.contact.status_of_appointment }}
                </div>
              </inertia-link>
            </td>
            <td
              class="px-6 py-4 whitespace-nowrap transition duration-500 ease-in-out transform hover:-translate-y-1"
            >
              <inertia-link
                :href="route('teaching.nonteaching.list')"
                class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"
              >
                <div class="capitalize">
                  {{ profile.office.office_name }}
                </div>
              </inertia-link>
            </td>
            <td
              class="px-6 py-4 whitespace-nowrap transition duration-500 ease-in-out transform hover:-translate-y-1"
            >
              <inertia-link
                :href="route('teaching.nonteaching.list')"
                class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"
              >
                <div class="capitalize">
                  {{ profile.office.office_name }}
                </div>
              </inertia-link>
            </td>
            <td
              class="px-6 py-4 whitespace-nowrap transition duration-500 ease-in-out transform hover:-translate-y-1"
            >
              <inertia-link
                :href="route('teaching.nonteaching.list')"
                class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"
              >
                <div class="capitalize">
                  {{ profile.position }}
                </div>
              </inertia-link>
            </td>
            <td
              class="px-6 py-4 whitespace-nowrap transition duration-500 ease-in-out transform hover:-translate-y-1"
            >
              <inertia-link
                :href="route('teaching.nonteaching.list')"
                class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"
              >
                <div class="capitalize">
                  {{ profile.salary_grade }}
                </div>
              </inertia-link>
            </td>
            <td
              class="px-6 py-4 whitespace-nowrap transition duration-500 ease-in-out transform hover:-translate-y-1"
            >
              <inertia-link
                :href="route('teaching.nonteaching.list')"
                class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"
              >
                <div class="capitalize">
                  {{ currency(profile.monthly_salary) }}
                </div>
              </inertia-link>
            </td>
            <td
              class="px-6 py-4 whitespace-nowrap transition duration-500 ease-in-out transform hover:-translate-y-1"
            >
              <inertia-link
                :href="route('teaching.nonteaching.list')"
                class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"
              >
                <div class="capitalize">
                  {{ currency(profile.annual_salary) }}
                </div>
              </inertia-link>
            </td>
            <td
              class="px-6 py-4 whitespace-nowrap transition duration-500 ease-in-out transform hover:-translate-y-1"
            >
              <inertia-link
                :href="route('teaching.nonteaching.list')"
                class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"
              >
                <div class="capitalize">
                  {{ profile.professional_licensure_passed }}
                </div>
              </inertia-link>
            </td>

            <td
              class="px-6 py-4 whitespace-nowrap transition duration-500 ease-in-out transform hover:-translate-y-1"
            >
              <inertia-link
                :href="route('teaching.nonteaching.list')"
                class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"
              >
                <div class="capitalize">
                  {{ profile.bachelors_degree }}
                </div>
              </inertia-link>
            </td>
            <td
              class="px-6 py-4 whitespace-nowrap transition duration-500 ease-in-out transform hover:-translate-y-1"
            >
              <inertia-link
                :href="route('teaching.nonteaching.list')"
                class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"
              >
                <div class="capitalize">
                  {{ profile.bachelors_specialization }}
                </div>
              </inertia-link>
            </td>
            <td
              class="px-6 py-4 whitespace-nowrap transition duration-500 ease-in-out transform hover:-translate-y-1"
            >
              <inertia-link
                :href="route('teaching.nonteaching.list')"
                class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"
              >
                <div class="capitalize">
                  {{ profile.masters_degree }}
                </div>
              </inertia-link>
            </td>
            <td
              class="px-6 py-4 whitespace-nowrap transition duration-500 ease-in-out transform hover:-translate-y-1"
            >
              <inertia-link
                :href="route('teaching.nonteaching.list')"
                class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"
              >
                <div class="capitalize">
                  {{ profile.masters_specialization }}
                </div>
              </inertia-link>
            </td>
            <td
              class="px-6 py-4 whitespace-nowrap transition duration-500 ease-in-out transform hover:-translate-y-1"
            >
              <inertia-link
                :href="route('teaching.nonteaching.list')"
                class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"
              >
                <div class="capitalize">
                  {{ profile.masters_units_earned }}
                </div>
              </inertia-link>
            </td>
            <td
              class="px-6 py-4 whitespace-nowrap transition duration-500 ease-in-out transform hover:-translate-y-1"
            >
              <inertia-link
                :href="route('teaching.nonteaching.list')"
                class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"
              >
                <div class="capitalize">
                  {{ profile.doctorate_degree }}
                </div>
              </inertia-link>
            </td>
            <td
              class="px-6 py-4 whitespace-nowrap transition duration-500 ease-in-out transform hover:-translate-y-1"
            >
              <inertia-link
                :href="route('teaching.nonteaching.list')"
                class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"
              >
                <div class="capitalize">
                  {{ profile.doctorate_specialization }}
                </div>
              </inertia-link>
            </td>
            <td
              class="px-6 py-4 whitespace-nowrap transition duration-500 ease-in-out transform hover:-translate-y-1"
            >
              <inertia-link
                :href="route('teaching.nonteaching.list')"
                class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"
              >
                <div class="capitalize">
                  {{ profile.doctorate_units_earned }}
                </div>
              </inertia-link>
            </td>
            <td
              class="px-6 py-4 whitespace-nowrap transition duration-500 ease-in-out transform hover:-translate-y-1"
            >
              <inertia-link
                :href="route('teaching.nonteaching.list')"
                class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"
              >
                <div class="capitalize">
                  {{ profile.name_of_school }}
                </div>
              </inertia-link>
            </td>
          </tr>
        </tbody>
        <tr v-if="profiles.data.length === 0">
          <td class="border-t px-6 py-4 text-red-500 font-bold" colspan="4">
            ☹️ No profile found.
          </td>
        </tr>
      </table>
    </div>
    <pagination :links="profiles.links" />
  </div>
</template>

<script>
import Icon from "@/Shared/Icon";
import Layout from "@/Shared/Layout";
import mapValues from "lodash/mapValues";
import Pagination from "@/Shared/Pagination";
import pickBy from "lodash/pickBy";
import SearchFilter from "@/Shared/SearchFilter";
import throttle from "lodash/throttle";
import moment from "moment";

export default {
  metaInfo: { title: "Teaching & Non-teaching Profile" },
  layout: Layout,
  components: {
    Icon,
    Pagination,
    SearchFilter,
  },
  props: {
    filters: Object,
    profiles: Object,
  },
  data() {
    return {
      form: {
        search: this.filters.search,
      },
    };
  },
  watch: {
    form: {
      handler: throttle(function () {
        let query = pickBy(this.form);
        this.$inertia.replace(
          this.route(
            "teaching.nonteaching.list",
            Object.keys(query).length ? query : { remember: "forget" }
          )
        );
      }, 150),
      deep: true,
    },
  },
  methods: {
    currency(price, sign = "₱ ") {
      const pieces = parseFloat(price).toFixed(2).split("");
      let ii = pieces.length - 3;
      while ((ii -= 3) > 0) {
        pieces.splice(ii, 0, ",");
      }
      return sign + pieces.join("");
    },
    age(birthday) {
      return moment().diff(moment(String(birthday), "YYYY-MM-DD"), "years");
    },
    truncate(input) {
      if (input.length > 50) {
        return input.substring(0, 50) + "...";
      }
      return input;
    },
    format(value) {
      if (value) {
        return moment(String(value)).format("MMMM D, YYYY");
      }
    },
    reset() {
      this.form = mapValues(this.form, () => null);
    },
  },
};
</script>
