<template>
  <div>
    <h1 class="mb-8 font-bold text-3xl">Job Posting 💼</h1>
    <div class="mb-6 flex justify-between items-center">
      <search-filter
        v-model="form.search"
        class="w-full max-w-md mr-4"
        @reset="reset"
      >
        <label class="block text-gray-700">Filter Jobs</label>
        <select v-model="form.trashed" class="mt-1 w-full form-select">
          <option :value="null" />
          <option value="with">Active</option>
          <option value="only">Inactive</option>
        </select>
      </search-filter>
      <div class="inline">
        <inertia-link
          class="btn-blue mr-4 rounded-lg transition duration-500 ease-in-out transform hover:-translate-y-1"
          :href="route('jobs.list')"
        >
          <span class="font-semibold">💼 View Listing</span>
        </inertia-link>
        <button
          @click="showModal"
          class="btn-indigo rounded-lg transition duration-500 ease-in-out transform hover:-translate-y-1"
        >
          <span>➕ Create</span>
          <span class="hidden md:inline">Job Posting</span>
        </button>
      </div>
    </div>
    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
      <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-white">
          <tr class="transition-all hover:bg-gray-100 hover:shadow-lg">
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
              Department
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
              Education
            </th>
            <th
              scope="col"
              class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
            >
              Experience
            </th>
            <th
              scope="col"
              class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
            >
              Training
            </th>
            <th
              scope="col"
              class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
            >
              Eligibility
            </th>
            <th
              scope="col"
              class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
            >
              Action
            </th>
          </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
          <tr
            v-for="job in jobs.data"
            :key="job.id"
            class="hover:bg-gray-100 focus-within:bg-gray-100"
          >
            <td
              class="px-6 py-4 whitespace-nowrap transition duration-500 ease-in-out transform hover:-translate-y-1"
            >
              <inertia-link
                class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"
                :href="route('jobs')"
                tabindex="-1"
              >
                <div
                  class="capitalize font-semibold"
                  v-if="job.position !== null"
                >
                  {{ job.position }}
                </div>
                <div v-else class="text-sm text-gray-500">
                  No data available
                </div>
                <div class="capitalize text-sm text-blue-500">
                  {{ job.item_number }}
                </div>
              </inertia-link>
            </td>
            <td
              class="px-6 py-4 whitespace-nowrap transition duration-500 ease-in-out transform hover:-translate-y-1"
            >
              <inertia-link
                class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"
                :href="route('jobs')"
                tabindex="-1"
              >
                <div class="capitalize" v-if="job.department !== null">
                  {{ job.department }}
                </div>
                <div v-else class="text-sm text-gray-500">
                  No data available
                </div>
              </inertia-link>
            </td>
            <td
              class="px-6 py-4 whitespace-nowrap transition duration-500 ease-in-out transform hover:-translate-y-1"
            >
              <inertia-link
                class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"
                :href="route('jobs')"
                tabindex="-1"
              >
                <div v-if="job.salary_grade !== null">
                  {{ job.salary_grade }}
                </div>
                <div v-else class="text-sm text-gray-500">
                  No data available
                </div>
              </inertia-link>
            </td>
            <td
              class="px-6 py-4 whitespace-nowrap transition duration-500 ease-in-out transform hover:-translate-y-1"
            >
              <inertia-link
                class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"
                :href="route('jobs')"
                tabindex="-1"
              >
                <div class="capitalize" v-if="job.education !== null">
                  {{ job.education }}
                </div>
                <div v-else class="text-sm text-gray-700">None required</div>
              </inertia-link>
            </td>

            <td
              class="px-6 py-4 whitespace-nowrap transition duration-500 ease-in-out transform hover:-translate-y-1"
            >
              <inertia-link
                class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"
                :href="route('jobs')"
                tabindex="-1"
              >
                <div class="capitalize" v-if="job.experience !== null">
                  {{ job.experience }}
                </div>
                <div v-else class="text-sm text-gray-700">None required</div>
              </inertia-link>
            </td>
            <td
              class="px-6 py-4 whitespace-nowrap transition duration-500 ease-in-out transform hover:-translate-y-1"
            >
              <inertia-link
                class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"
                :href="route('jobs')"
                tabindex="-1"
              >
                <div class="capitalize" v-if="job.training !== null">
                  {{ job.training }}
                </div>
                <div v-else class="text-sm text-gray-700">None required</div>
              </inertia-link>
            </td>
            <td
              class="px-6 py-4 whitespace-nowrap transition duration-500 ease-in-out transform hover:-translate-y-1"
            >
              <inertia-link
                class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"
                :href="route('jobs')"
                tabindex="-1"
              >
                <div class="capitalize" v-if="job.eligibility !== null">
                  {{ job.eligibility }}
                </div>
                <div v-else class="text-sm text-gray-700">None required</div>
              </inertia-link>
            </td>
            <td
              class="px-1 py-4 whitespace-nowrap text-sm font-medium transition duration-500 ease-in-out transform hover:-translate-y-1"
            >
              <span
                v-if="!job.deleted_at"
                @click="showEditModal(job)"
                class="text-indigo-600 cursor-pointer hover:text-indigo-900"
                >✏️ Edit</span
              >
              <span
                v-if="!job.deleted_at"
                @click="destroy(job.id, job.item_number)"
                class="text-red-600 inline-flex mt-2 cursor-pointer hover:text-red-900"
                >🗑️ Delete</span
              >
              <span
                v-else
                @click="restore(job.id, job.item_number)"
                class="text-yellow-600 inline-flex mt-2 cursor-pointer hover:text-yellow-900"
                >♻️ Restore</span
              >
            </td>
          </tr>
        </tbody>
        <tr v-if="jobs.data.length === 0">
          <td class="border-t px-6 py-4 text-red-500 font-bold" colspan="4">
            ☹️ No jobs found.
          </td>
        </tr>
      </table>
    </div>
    <modal-create :showing="showAddJob" :modal.sync="showAddJob"></modal-create>
    <modal-edit
      :showing="showEditJob"
      :job="job"
      :modal.sync="showEditJob"
    ></modal-edit>
    <pagination :links="jobs.links" />
  </div>
</template>

<script>
import Icon from "@/Shared/Icon";
import Layout from "@/Shared/Layout";
import mapValues from "lodash/mapValues";
import Pagination from "@/Shared/Pagination";
import pickBy from "lodash/pickBy";
import SearchFilter from "@/Shared/SearchFilter";
import ModalCreate from "@/Pages/Job/ModalCreate";
import ModalEdit from "@/Pages/Job/ModalEdit";
import throttle from "lodash/throttle";

export default {
  metaInfo: { title: "Job Posting" },
  layout: Layout,
  components: {
    Icon,
    Pagination,
    SearchFilter,
    ModalCreate,
    ModalEdit,
  },
  props: {
    jobs: Object,
    filters: Object,
  },
  data() {
    return {
      job: null,
      showAddJob: false,
      showEditJob: false,
      form: {
        search: this.filters.search,
        trashed: this.filters.trashed,
      },
    };
  },
  watch: {
    form: {
      handler: throttle(function () {
        let query = pickBy(this.form);
        this.$inertia.replace(
          this.route(
            "jobs",
            Object.keys(query).length ? query : { remember: "forget" }
          )
        );
      }, 150),
      deep: true,
    },
  },
  methods: {
    showModal() {
      this.showAddJob = true;
    },
    showEditModal(item) {
      this.job = item;
      this.showEditJob = true;
    },
    reset() {
      this.form = mapValues(this.form, () => null);
    },
    destroy(id, name) {
      swal({
        title: "Delete",
        text: `Are you sure you want to delete ${name}?`,
        buttons: true,
        dangerMode: true,
      }).then((willDelete) => {
        if (willDelete) {
          this.$inertia.delete(this.route("jobs.destroy", id));
        }
      });
    },
    restore(id, name) {
      swal({
        title: "Restore",
        text: `Are you sure you want to restore ${name}?`,
        buttons: true,
        dangerMode: false,
      }).then((willDelete) => {
        if (willDelete) {
          this.$inertia.put(this.route("jobs.restore", id));
        }
      });
    },
    reset() {
      this.form = mapValues(this.form, () => null);
    },
  },
};
</script>
 Job
