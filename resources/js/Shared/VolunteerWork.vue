<template>
  <div class="flex flex-col mt-6">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
      <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
        <div
          class="shadow overflow-hidden border-b bg-white border-gray-200 sm:rounded-lg"
        >
          <div class="flex items-center justify-between mb-0">
            <h5 class="mx-6 my-5 font-semibold font bg-white">
              ⛑️ Voluntary Work Involvement
            </h5>
            <button
              @click="showVolunteerModal"
              class="h-8 text-sm items-center text-blue-600 font-semibold rounded-lg my-2 mx-6"
            >
              ➕ Add
            </button>
          </div>
          <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-white">
              <tr class="transition-all hover:bg-gray-100 hover:shadow-lg">
                <th
                  scope="col"
                  class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                >
                  Organization Name
                </th>
                <th
                  scope="col"
                  class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                >
                  From
                </th>
                <th
                  scope="col"
                  class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                >
                  To
                </th>
                <th
                  scope="col"
                  class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                >
                  Number of Hours
                </th>
                <th
                  scope="col"
                  class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                >
                  Nature of Work
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
                class="transition-all hover:bg-gray-100 hover:shadow-lg"
                v-for="volunteer in volunteers"
                :key="volunteer.id"
              >
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="text-sm text-gray-900 capitalize">
                    {{ volunteer.volunteers_organization }}
                  </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="text-sm text-gray-900">
                    {{ format(volunteer.volunteers_from) }}
                  </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="text-sm text-gray-900">
                    {{ format(volunteer.volunteers_to) }}
                  </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                  <div class="text-sm text-gray-900">
                    {{ volunteer.volunteers_number_of_hours }}
                  </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                  <div class="text-sm text-gray-900 capitalize">
                    {{ volunteer.volunteers_nature_of_work }}
                  </div>
                </td>
                <td class="px-1 py-4 whitespace-nowrap text-sm font-medium">
                  <span
                    @click="showVolunteerEditModal(volunteer)"
                    class="text-indigo-600 cursor-pointer hover:text-indigo-900"
                    >✏️ Edit</span
                  >
                  <span
                    @click="
                      destroy(volunteer.id, volunteer.volunteers_organization)
                    "
                    class="text-red-600 inline-flex mt-2 cursor-pointer hover:text-red-900"
                    >🗑️ Delete</span
                  >
                </td>
              </tr>
              <tr v-if="volunteers.length === 0">
                <td
                  class="border-t px-6 text-red-500 text-sm py-4 font-bold"
                  colspan="4"
                >
                  ☹️ No voluntary work added.
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <volunteer-add-modal
      :showing="showVolunteer"
      :employee="employeeId"
      :modal.sync="showVolunteer"
    ></volunteer-add-modal>
    <volunteer-edit-modal
      :showing="showVolunteerEdit"
      :employee="employeeId"
      :volunteer="volunteerItems"
      :modal.sync="showVolunteerEdit"
    ></volunteer-edit-modal>
  </div>
</template>
<script>
import VolunteerAddModal from "@/Shared/Modals/VolunteerAddModal.vue";
import VolunteerEditModal from "@/Shared/Modals/VolunteerEditModal.vue";
import moment from "moment";

export default {
  components: {
    VolunteerAddModal,
    VolunteerEditModal
  },
  inject: ["employeeId"],
  props: { volunteers: Array },
  data() {
    return {
      volunteerItems: null,
      showVolunteer: false,
      showVolunteerEdit: false,
    };
  },
  methods: {
    format(value) {
      if (value) {
        return moment(String(value)).format("MMM D, YYYY");
      }
    },
    showVolunteerModal() {
      this.showVolunteer = true;
    },
    showVolunteerEditModal(item) {
      this.volunteerItems = item;
      this.showVolunteerEdit = true;
    },
    destroy(id, name) {
      swal({
        title: "Delete",
        text: `Are you sure you want to delete ${name}?`,
        buttons: true,
        dangerMode: true,
      }).then((willDelete) => {
        if (willDelete) {
          this.$inertia.delete(this.route("volunteer.destroy", id));
        }
      });
    },
  },
};
</script>
