<template>
  <div class="rounded-xl bg-white shadow-md">
    <div class="flex items-center justify-between mb-0">
      <h5 class="mx-6 my-5 font-semibold font bg-white">
        🥳 Personal Information
      </h5>
      <button
        @click="showChildrenModal"
        class="h-8 text-sm items-center text-blue-600 font-semibold rounded-lg my-2 mx-6"
      >
        ✏️ Edit
      </button>
    </div>
    <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-2">
      <div class="rounded pl-4 pt-4 mx-4">
        <div class="pb-1">
          <label
            for="name"
            class="font-semibold text-gray-700 text-sm block pb-1"
            >Birthday
            <span v-if="contact.birth_date !== null" class="text-blue-600">{{
              format(contact.birth_date)
            }}</span>
            <span v-else class="text-red-500">No data available</span>
          </label>
        </div>
        <div class="pb-1">
          <label
            for="about"
            class="font-semibold text-gray-700 text-sm block pb-1"
            >Birth Place
            <span
              v-if="contact.birth_place !== null"
              class="text-blue-600 capitalize"
              >{{ contact.birth_place }}</span
            ><span v-else class="text-red-500">No data available</span></label
          >
        </div>

        <div class="pb-1">
          <label
            for="about"
            class="font-semibold text-gray-700 text-sm block pb-1"
            >Height
            <span v-if="contact.height !== null" class="text-blue-600"
              >{{ contact.height }} CM</span
            ><span v-else class="text-red-500">No data available</span>
          </label>
        </div>
        <div class="pb-1">
          <label
            for="about"
            class="font-semibold text-gray-700 text-sm block pb-1"
            >Weight
            <span v-if="contact.weight !== null" class="text-blue-600"
              >{{ contact.weight }} KG</span
            ><span v-else class="text-red-500">No data available</span></label
          >
        </div>
        <div class="pb-1">
          <label
            for="about"
            class="font-semibold text-gray-700 text-sm block pb-1"
            >Blood Type
            <span
              v-if="contact.blood_type !== null"
              class="text-blue-600 capitalize"
              >{{ contact.blood_type }}</span
            ><span v-else class="text-red-500">No data available</span></label
          >
        </div>
        <div class="pb-1">
          <label
            for="about"
            class="font-semibold text-gray-700 text-sm block pb-1"
            >GSIS
            <span v-if="contact.gsis_id !== null" class="text-blue-600">{{
              contact.gsis_id
            }}</span
            ><span v-else class="text-red-500">No data available</span></label
          >
        </div>
        <div class="pb-1">
          <label
            for="about"
            class="font-semibold text-gray-700 text-sm block pb-1"
            >SSS
            <span v-if="contact.sss_id !== null" class="text-blue-600">{{
              contact.sss_id
            }}</span
            ><span v-else class="text-red-500">No data available</span></label
          >
        </div>
        <div class="pb-1">
          <label
            for="about"
            class="font-semibold text-gray-700 text-sm block pb-1"
            >TIN
            <span v-if="contact.tin_id !== null" class="text-blue-600">{{
              contact.tin_id
            }}</span
            ><span v-else class="text-red-500">No data available</span></label
          >
        </div>
        <div class="pb-1">
          <label
            for="about"
            class="font-semibold text-gray-700 text-sm block pb-1"
            >Pagibig
            <span v-if="contact.pagibig_id !== null" class="text-blue-600">{{
              contact.pagibig_id
            }}</span
            ><span v-else class="text-red-500">No data available</span></label
          >
        </div>
        <div class="pb-1">
          <label
            for="about"
            class="font-semibold text-gray-700 text-sm block pb-1"
            >PhilHealth
            <span v-if="contact.philhealth_id !== null" class="text-blue-600">{{
              contact.philhealth_id
            }}</span
            ><span v-else class="text-red-500">No data available</span></label
          >
        </div>
      </div>
      <div class="rounded pl-4 pt-4 mx-4">
        <div class="pb-1">
          <label
            for="about"
            class="font-semibold text-gray-700 text-sm block pb-1"
            >Civil Status
            <span
              v-if="contact.civil_status !== null"
              class="text-blue-600 capitalize"
              >{{ contact.civil_status }}</span
            ><span v-else class="text-red-500">No data available</span></label
          >
        </div>
        <div class="pb-1">
          <label
            for="about"
            class="font-semibold text-gray-700 text-sm block pb-1"
            >Sex
            <span
              v-if="contact.sex !== null"
              class="text-blue-600 capitalize"
              >{{ contact.sex }}</span
            ><span v-else class="text-red-500">No data available</span></label
          >
        </div>
        <div class="pb-1">
          <label
            for="about"
            class="font-semibold text-gray-700 text-sm block pb-1"
            >Citizenship
            <span
              v-if="contact.citizenship !== null"
              class="text-blue-600 capitalize"
              >{{ contact.citizenship }}</span
            ><span v-else class="text-red-500">No data available</span></label
          >
        </div>
        <div class="pb-1">
          <label
            for="about"
            class="font-semibold text-gray-700 text-sm block pb-1"
            >Residential Address
            <span class="text-blue-600 capitalize"
              >{{ contact.residential_block }}
              {{ contact.residential_street }}
              {{ contact.residential_village }}
              {{ contact.residential_barangay }}
              {{ contact.residential_city }}
              {{ contact.residential_province }}
              {{ contact.residential_zipcode }}
            </span></label
          >
        </div>
        <div class="pb-1">
          <label
            for="about"
            class="font-semibold text-gray-700 text-sm block pb-1"
            >Permanent Address
            <span class="text-blue-600 capitalize"
              >{{ contact.permanent_block }}
              {{ contact.permanent_street }}
              {{ contact.permanent_village }}
              {{ contact.permanent_barangay }}
              {{ contact.permanent_city }}
              {{ contact.permanent_province }}
              {{ contact.permanent_zipcode }}
            </span></label
          >
        </div>
        <div class="pb-1">
          <label
            for="about"
            class="font-semibold text-gray-700 text-sm block pb-1"
            >Telephone
            <span v-if="contact.telephone !== null" class="text-blue-600">{{
              contact.telephone
            }}</span
            ><span v-else class="text-red-500">No data available</span></label
          >
        </div>
        <div class="pb-1">
          <label
            for="about"
            class="font-semibold text-gray-700 text-sm block pb-1"
            >Mobile Number
            <span v-if="contact.phone !== null" class="text-blue-600">{{
              contact.phone
            }}</span
            ><span v-else class="text-red-500">No data available</span></label
          >
        </div>
      </div>
    </div>
    <employee-edit-modal
      :showing="showModal"
      :employee="contact"
      :modal.sync="showModal"
    ></employee-edit-modal>
  </div>
</template>
<script>
import EmployeeEditModal from "@/Shared/Modals/EmployeeEditModal.vue";
import moment from "moment";

export default {
  components: {
    EmployeeEditModal,
  },
  props: {
    contact: Object,
  },
  data() {
    return {
      showModal: false,
      employee: null,
    };
  },
  methods: {
    showChildrenModal() {
      this.showModal = true;
    },
    capitalize: function (value) {
      return value.toLowerCase().replace(/\b./g, function (a) {
        return a.toUpperCase();
      });
    },
    format(value) {
      if (value) {
        return moment(String(value)).format("MMMM D, YYYY");
      }
    },
  },
};
</script>
