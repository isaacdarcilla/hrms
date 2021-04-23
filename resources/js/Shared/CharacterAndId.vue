<template>
  <div class="grid gap-8 mb-8 md:grid-cols-2 xl:grid-cols-2">
    <div
      class="flex flex-col mt-6 transition duration-500 ease-in-out transform hover:-translate-y-1"
    >
      <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
          <div
            class="shadow overflow-hidden border-b bg-white border-gray-200 sm:rounded-lg"
          >
            <div class="flex items-center justify-between mb-0">
              <h5 class="mx-6 my-5 font-semibold font bg-white">
                😄 Character References
              </h5>
              <button
                @click="showSkillModal"
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
                    Name
                  </th>
                  <th
                    scope="col"
                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                  >
                    Address
                  </th>
                  <th
                    scope="col"
                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                  >
                    Telephone
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
                  v-for="reference in references"
                  :key="reference.id"
                >
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    <div class="text-sm text-gray-900 capitalize">
                      {{ reference.name }}
                    </div>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    <div class="text-sm text-gray-900 capitalize">
                      {{ reference.address }}
                    </div>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    <div class="text-sm text-gray-900 capitalize">
                      {{ reference.telephone_number }}
                    </div>
                  </td>
                  <td class="px-1 py-4 whitespace-nowrap text-sm font-medium">
                    <span
                      @click="showEditSkillModal(reference)"
                      class="text-indigo-600 cursor-pointer hover:text-indigo-900"
                      >✏️ Edit</span
                    >
                    <span
                      @click="destroySkill(reference.id, reference.name)"
                      class="text-red-600 inline-flex mt-2 cursor-pointer hover:text-red-900"
                      >🗑️ Delete</span
                    >
                  </td>
                </tr>
                <tr v-if="references.length === 0">
                  <td
                    class="border-t px-6 py-4 text-red-500 text-sm font-bold"
                    colspan="4"
                  >
                    ☹️ No references added.
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div
      class="flex flex-col mt-6 transition duration-500 ease-in-out transform hover:-translate-y-1"
    >
      <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
          <div
            class="shadow overflow-hidden border-b bg-white border-gray-200 sm:rounded-lg"
          >
            <div class="flex items-center justify-between mb-0">
              <h5 class="mx-6 my-5 font-semibold font bg-white">
                💳 Government Issued ID
              </h5>
              <button
                @click="showRecognitionModal"
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
                    Issued ID
                  </th>
                  <th
                    scope="col"
                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                  >
                    ID Number
                  </th>
                  <th
                    scope="col"
                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                  >
                    Date of Issuance
                  </th>
                  <th
                    scope="col"
                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                  >
                    Place of Issuance
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
                  v-for="recognition in recognitions"
                  :key="recognition.id"
                >
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    <div class="text-sm text-gray-900 capitalize">
                      {{ recognition.recognitions_name }}
                    </div>
                  </td>
                  <td
                    class="px-1 py-4 whitespace-nowrap text-sm font-medium"
                  >
                    <span
                      @click="showEditRecognitionModal(recognition)"
                      class="text-indigo-600 cursor-pointer hover:text-indigo-900"
                      >✏️ Edit</span
                    >
                    <span
                      @click="
                        destroyRecognition(
                          recognition.id,
                          recognition.recognitions_name
                        )
                      "
                      class="text-red-600 inline-flex mt-2 cursor-pointer hover:text-red-900"
                      >🗑️ Delete</span
                    >
                  </td>
                </tr>
                <tr v-if="recognitions.length === 0">
                  <td
                    class="border-t px-6 text-red-500 text-sm py-4 font-bold"
                    colspan="4"
                  >
                    ☹️ No recognitions added.
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <CharacterAddModal
      :showing="showSkill"
      :employee="employeeId"
      :modal.sync="showSkill"
    ></CharacterAddModal>
    <skill-edit-modal
      :showing="showEditSkill"
      :employee="employeeId"
      :skill="skill"
      :modal.sync="showEditSkill"
    ></skill-edit-modal>
  </div>
</template>
<script>
import CharacterAddModal from "@/Shared/Modals/CharacterAddModal.vue";
import SkillEditModal from "@/Shared/Modals/SkillEditModal.vue";
import RecognitionAddModal from "@/Shared/Modals/RecognitionAddModal.vue";
import RecognitionEditModal from "@/Shared/Modals/RecognitionEditModal.vue";

export default {
  components: {
    CharacterAddModal,
    SkillEditModal,
    RecognitionAddModal,
    RecognitionEditModal,
  },
  inject: ["employeeId"],
  props: {
    references: Array,
    recognitions: Array,
  },
  data() {
    return {
      skill: null,
      showSkill: false,
      showEditSkill: false,
      recognition: null,
      showRecognition: false,
      showEditRecognition: false,
    };
  },
  methods: {
    showSkillModal() {
      this.showSkill = true;
    },
    showRecognitionModal() {
      this.showRecognition = true;
    },
    showEditSkillModal(item) {
      this.skill = item;
      this.showEditSkill = true;
    },
    showEditRecognitionModal(item) {
      this.recognition = item;
      this.showEditRecognition = true;
    },
    destroySkill(id, name) {
      swal({
        title: "Delete",
        text: `Are you sure you want to delete ${name}?`,
        buttons: true,
        dangerMode: true,
      }).then((willDelete) => {
        if (willDelete) {
          this.$inertia.delete(this.route("skill.destroy", id));
        }
      });
    },
    destroyRecognition(id, name) {
      swal({
        title: "Delete",
        text: `Are you sure you want to delete ${name}?`,
        buttons: true,
        dangerMode: true,
      }).then((willDelete) => {
        if (willDelete) {
          this.$inertia.delete(this.route("recognition.destroy", id));
        }
      });
    },
  },
};
</script>
