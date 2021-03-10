<template>
  <div class="flex flex-col mt-6">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
      <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
        <div
          class="shadow overflow-hidden border-b bg-white border-gray-200 sm:rounded-lg overflow-x-auto"
        >
          <div class="flex items-center justify-between mb-0">
            <h5 class="mx-6 my-5 font-semibold font bg-white">
              🎓 Educational Background
            </h5>
            <button
              @click="showEducationModal"
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
                  Level
                </th>
                <th
                  scope="col"
                  class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                >
                  Name of School
                </th>
                <th
                  scope="col"
                  class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                >
                  Course
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
                  Highest Units Earned
                </th>
                <th
                  scope="col"
                  class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                >
                  Year Graduated
                </th>
                <th
                  scope="col"
                  class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                >
                  Honors Received
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
                v-for="education in educations"
                :key="education.id"
              >
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="text-sm text-gray-900 capitalize">
                    {{ education.education_level }}
                  </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="text-sm text-gray-900 capitalize">
                    {{ education.education_school_name }}
                  </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="text-sm text-gray-900 capitalize">
                    {{ education.education_course }}
                  </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                  <div class="text-sm text-gray-900">
                    {{ format(education.from) }}
                  </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                  <div class="text-sm text-gray-900">
                    {{ format(education.to) }}
                  </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                  <div
                    v-if="education.education_highest_level_earned !== null"
                    class="text-sm text-gray-900 capitalize"
                  >
                    {{ education.education_highest_level_earned }}
                  </div>
                  <div v-else class="text-sm text-red-600">
                    No data available
                  </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                  <div class="text-sm text-gray-900">
                    {{ education.education_year_graduated }}
                  </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                  <div class="text-sm text-gray-900 capitalize">
                    {{ education.education_honors_received }}
                  </div>
                </td>
                <td class="px-1 py-4 whitespace-nowrap text-sm font-medium">
                  <span
                    @click="showEducationEditModal(education)"
                    class="text-indigo-600 cursor-pointer hover:text-indigo-900"
                    >✏️ Edit</span
                  >
                  <span
                    @click="
                      destroy(education.id, education.education_school_name)
                    "
                    class="text-red-600 inline-flex mt-2 cursor-pointer hover:text-red-900"
                    >🗑️ Delete</span
                  >
                </td>
              </tr>
              <tr v-if="educations.length === 0">
                <td
                  class="border-t text-red-500 text-sm px-6 py-4 font-bold"
                  colspan="4"
                >
                  ☹️ No educations added.
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <education-add-modal
      :showing="showEducation"
      :employee="employeeId"
      :modal.sync="showEducation"
    ></education-add-modal>
    <education-edit-modal
      :showing="showEducationEdit"
      :employee="employeeId"
      :education="educationItems"
      :modal.sync="showEducationEdit"
    ></education-edit-modal>
  </div>
</template>

<script>
import EducationAddModal from "@/Shared/Modals/EducationAddModal.vue";
import EducationEditModal from "@/Shared/Modals/EducationEditModal.vue";
import moment from "moment";

export default {
  components: {
    EducationAddModal,
    EducationEditModal,
  },
  inject: ["employeeId"],
  props: {
    educations: Array,
  },
  data() {
    return {
      educationItems: null,
      showEducation: false,
      showEducationEdit: false,
    };
  },
  methods: {
    format(value) {
      if (value) {
        return moment(String(value)).format("MMM D, YYYY");
      }
    },
    showEducationModal() {
      this.showEducation = true;
    },
    showEducationEditModal(item) {
      this.educationItems = item;
      this.showEducationEdit = true;
    },
    destroy(id, name) {
      swal({
        title: "Delete",
        text: `Are you sure you want to delete ${name}?`,
        buttons: true,
        dangerMode: true,
      }).then((willDelete) => {
        if (willDelete) {
          this.$inertia.delete(this.route("education.destroy", id));
        }
      });
    },
  },
};
</script>
