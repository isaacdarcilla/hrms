<template>
  <div class="rounded-xl bg-white shadow-md">
    <div class="flex items-center justify-between mb-0">
      <h5 class="mx-6 my-5 font-semibold font bg-white">
        👨‍👩‍👧‍👦 Family Background
      </h5>
      <button
        v-if="family !== null"
        @click="showFamilyEditModal"
        class="h-8 text-sm items-center text-blue-600 font-semibold rounded-lg my-2 mx-6"
      >
        ✏️ Edit
      </button>
      <button
        v-else
        @click="showFamilyModal"
        class="h-8 text-sm items-center text-blue-600 font-semibold rounded-lg my-2 mx-6"
      >
        ➕ Add
      </button>
    </div>
    <div v-if="family === null">
      <figcaption
        class="text-md text-center text-red-500 pt-4 font-large font-semibold"
      >
        😟 No data available.
      </figcaption>
    </div>
    <div v-else class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-2">
      <div class="rounded pl-4 pt-4 mx-4">
        <div class="pb-1">
          <label
            for="name"
            class="font-semibold text-gray-700 text-sm block pb-1"
            >Spouse
            <span class="text-blue-600 capitalize">
              {{ family.spouse_first_name }}
              {{ family.spouse_middle_name }}
              {{ family.spouse_last_name }}
              {{ family.spouse_name_extension }}
            </span>
          </label>
        </div>
        <div class="pb-1">
          <label
            for="about"
            class="font-semibold text-gray-700 text-sm block pb-1"
            >Spouse Occupation
            <span class="text-blue-600 capitalize">{{
              family.spouse_occupation
            }}</span></label
          >
        </div>
        <div class="pb-1">
          <label
            for="about"
            class="font-semibold text-gray-700 text-sm block pb-1"
            >Spouse Business
            <span class="text-blue-600 capitalize">{{
              family.spouse_business_name
            }}</span></label
          >
        </div>
        <div class="pb-1">
          <label
            for="about"
            class="font-semibold text-gray-700 text-sm block pb-1"
            >Spouse Address
            <span class="text-blue-600 capitalize">{{
              family.spouse_business_address
            }}</span></label
          >
        </div>
        <div class="pb-1">
          <label
            for="about"
            class="font-semibold text-gray-700 text-sm block pb-1"
            >Spouse Telephone
            <span class="text-blue-600 capitalize">{{
              family.spouse_telephone
            }}</span></label
          >
        </div>
      </div>
      <div class="rounded pl-4 pt-4 mx-4">
        <div class="pb-1">
          <label
            for="name"
            class="font-semibold text-gray-700 text-sm block pb-1"
            >Father
            <span class="text-blue-600 capitalize">
              {{ family.father_first_name }}
              {{ family.father_middle_name }}
              {{ family.father_last_name }}
              {{ family.father_name_extension }}
            </span>
          </label>
        </div>
        <div class="pb-1">
          <label
            for="name"
            class="font-semibold text-gray-700 text-sm block pb-1"
            >Mother
            <span class="text-blue-600 capitalize">
              {{ family.mother_first_name }}
              {{ family.mother_middle_name }}
              {{ family.mother_last_name }}
            </span>
          </label>
        </div>
      </div>
    </div>
    <family-add-modal
      :showing="showFamily"
      :employee="employeeId"
      :modal.sync="showFamily"
    ></family-add-modal>
    <family-edit-modal
      :showing="showEditFamily"
      :employee="employeeId"
      :family="familyObject"
      :modal.sync="showEditFamily"
    ></family-edit-modal>
  </div>
</template>
<script>
import FamilyAddModal from "@/Shared/Modals/FamilyAddModal.vue";
import FamilyEditModal from "@/Shared/Modals/FamilyEditModal.vue";

export default {
  components: {
      FamilyAddModal,
      FamilyEditModal,
  },
  props: {
      family: Object,
  },
  inject: ["employeeId", "familyObject"],
  data() {
    return {
      showFamily: false,
      showEditFamily: false,
    };
  },
  methods: {
    showFamilyModal() {
      this.showFamily = true;
    },
    showFamilyEditModal() {
      this.showEditFamily = true;
    },
  }
};
</script>
