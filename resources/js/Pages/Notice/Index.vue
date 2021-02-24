<template>
  <div>
    <h1 class="mb-8 font-bold text-3xl">Announcements 📢</h1>
    <div class="mb-6 flex justify-between items-center">
      <search-filter
        v-model="form.search"
        class="w-full max-w-md mr-4"
        @reset="reset"
      >
        <label class="block text-gray-700">Filter Notice</label>
        <select v-model="form.trashed" class="mt-1 w-full form-select">
          <option :value="null" />
          <option value="with">Active</option>
          <option value="only">Inactive</option>
        </select>
      </search-filter>
      <button @click="showModal" class="btn-indigo rounded-lg">
        <span>➕ Create</span>
        <span class="hidden md:inline">Announcement</span>
      </button>
    </div>
    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
      <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-white">
          <tr class="transition-all hover:bg-gray-100 hover:shadow-lg">
            <th
              scope="col"
              class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
            >
              Notice Type
            </th>
            <th
              scope="col"
              class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
            >
              Notice Subject
            </th>
            <th
              scope="col"
              class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
            >
              Notice Body
            </th>
            <th
              scope="col"
              class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
            >
              Posted On
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
            v-for="notice in notices.data"
            :key="notice.id"
            class="hover:bg-gray-100 focus-within:bg-gray-100"
          >
            <td
              class="px-6 py-4 whitespace-nowrap transition duration-500 ease-in-out transform hover:-translate-y-1"
            >
              <inertia-link
                :href="route('notices')"
                class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"
              >
                <div class="capitalize">
                  {{ notice.notice_type }}
                </div>
              </inertia-link>
            </td>
            <td
              class="px-6 py-4 whitespace-nowrap transition duration-500 ease-in-out transform hover:-translate-y-1"
            >
              <inertia-link
                :href="route('notices')"
                class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"
              >
                <div class="capitalize font-semibold">
                  {{ notice.notice_subject }}
                </div>
              </inertia-link>
            </td>
            <td
              class="px-6 py-4 whitespace-nowrap transition duration-500 ease-in-out transform hover:-translate-y-1"
            >
              <inertia-link
                :href="route('notices')"
                class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"
              >
                <div class="normal-case">
                  {{ truncate(notice.notice_description) }}
                </div>
              </inertia-link>
            </td>
            <td
              class="px-6 py-4 whitespace-nowrap transition duration-500 ease-in-out transform hover:-translate-y-1"
            >
              <inertia-link
                :href="route('notices')"
                class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"
              >
                <div class="capitalize text-blue-600">
                  {{ format(notice.created_at) }}
                </div>
              </inertia-link>
            </td>
            <td
              class="px-1 py-4 whitespace-nowrap text-sm font-medium transition duration-500 ease-in-out transform hover:-translate-y-1"
            >
              <span
                v-if="!notice.deleted_at"
                @click="showEditModal(notice)"
                class="text-indigo-600 cursor-pointer hover:text-indigo-900"
                >✏️ Edit</span
              >
              <span
                @click="destroy(notice.id, notice.notice_subject)"
                v-if="!notice.deleted_at"
                class="text-red-600 inline-flex mt-2 cursor-pointer hover:text-red-900"
                >🗑️ Delete</span
              >
              <span
                v-else
                @click="restore(notice.id, notice.notice_subject)"
                class="text-yellow-600 inline-flex mt-2 cursor-pointer hover:text-yellow-900"
                >♻️ Restore</span
              >
            </td>
          </tr>
        </tbody>
        <tr v-if="notices.data.length === 0">
          <td class="border-t px-6 py-4 text-red-500 font-bold" colspan="4">
            ☹️ No notices found.
          </td>
        </tr>
      </table>
    </div>
    <modal-create
      :showing="showAddNotice"
      :modal.sync="showAddNotice"
    ></modal-create>
    <modal-edit
      :showing="showEditNotice"
      :notice="notice"
      :modal.sync="showEditNotice"
    ></modal-edit>
    <pagination :links="notices.links" />
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
import ModalCreate from "@/Pages/Notice/ModalCreate";
import ModalEdit from "@/Pages/Notice/ModalEdit";

export default {
  metaInfo: { title: "Notice Board & Announcement" },
  layout: Layout,
  components: {
    Icon,
    Pagination,
    SearchFilter,
    ModalCreate,
    ModalEdit,
  },
  props: {
    notices: Object,
    filters: Object,
  },
  data() {
    return {
      notice: null,
      showAddNotice: false,
      showEditNotice: false,
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
            "notices",
            Object.keys(query).length ? query : { remember: "forget" }
          )
        );
      }, 150),
      deep: true,
    },
  },
  methods: {
    truncate(input) {
      if (input.length > 50) {
        return input.substring(0, 50) + "...";
      }
      return input;
    },
    showModal() {
      this.showAddNotice = true;
    },
    showEditModal(item) {
      this.notice = item;
      this.showEditNotice = true;
    },
    format(value) {
      if (value) {
        return moment(String(value)).format("MMMM D, YYYY h:mm A");
      }
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
          this.$inertia.delete(this.route("notices.destroy", id));
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
          this.$inertia.put(this.route("notices.restore", id));
        }
      });
    },
  },
};
</script>
