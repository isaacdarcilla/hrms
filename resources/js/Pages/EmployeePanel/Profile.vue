<template>
  <div>
    <div class="mb-10 mt-0">
      <div class="mb-6 mt-1 flex justify-between items-center">
        <div class="text-3xl font-bold">
          <span class="text-blue-600">My Profile</span> /
          {{ employee.first_name }}
        </div>
        <button
          @click="showPasswordModal"
          class="btn-indigo rounded-lg transition duration-500 ease-in-out transform hover:-translate-y-1"
        >
          <span>✏️ Edit</span>
          <span class="hidden md:inline">Password</span>
        </button>
      </div>
      <div
        v-if="notices.length !== 0"
        class="mb-4 flex items-center justify-between rounded"
      >
        <div class="flex items-center">
          <div class="mx-4 pb-4">📢</div>
          <div class="pb-4 text-gray text-sm font-medium">
            {{ format(notices[0].created_at) }} • {{ notices[0].notice_type }} •
            {{ notices[0].notice_subject }} •
            {{ notices[0].notice_description }}
          </div>
        </div>
      </div>
      <div class="h-full">
        <div class="grid gap-6 mb-4 md:grid-cols-2 xl:grid-cols-2">
          <div
            class="rounded-xl bg-white shadow-md transition duration-500 ease-in-out transform hover:-translate-y-1"
          >
            <div
              :class="
                hidden ? 'hidden' : 'flex items-center justify-between mb-0'
              "
            >
              <h5
                @click="cancel()"
                class="mx-8 mt-5 text-sm cursor-pointer text-yellow-600 font bg-white"
              >
                Cancel
              </h5>
              <h5
                v-if="!sending"
                @click.prevent="save()"
                class="mx-8 mt-5 cursor-pointer text-sm text-blue-600 font bg-white"
              >
                Save
              </h5>
              <h5
                v-else
                class="mx-8 mt-5 cursor-wait text-sm text-blue-600 font bg-white"
              >
                Saving...
              </h5>
            </div>
            <figure class="bg-white rounded-xl p-6">
              <input
                type="file"
                accept="image/*"
                class="hidden"
                ref="file"
                @change="change"
              />
              <img
                class="w-32 h-32 rounded-full mx-auto"
                :src="
                  contact.photo === null ? image : `/storage/` + contact.photo
                "
                :alt="contact.first_name"
                width="384"
                height="512"
              />
              <div v-if="contact.deleted_at" class="pt-2"></div>
              <div v-else class="text-center pt-2">
                <button
                  @click="browse()"
                  class="rounded-full text-blue-600 hover:bg-gray-400 hover:bg-opacity-50 font-semibold p-2 focus:outline-none text-sm text-gray transition duration-200"
                >
                  Update Photo
                </button>
              </div>
              <div class="pt-2 text-center space-y-4">
                <figcaption class="text-lg font-large font-semibold">
                  <div class="text-cyan-600 block capitalize">
                    {{ contact.first_name }}
                    {{ contact.middle_name }}
                    {{ contact.last_name }}
                    {{ contact.name_extension }}
                    <span
                      v-if="contact.username"
                      class="lowercase font-semibold hover:text-blue-600 cursor-pointer"
                      >({{ contact.username }})</span
                    >
                  </div>
                  <div class="text-gray-600 block lowercase">
                    {{ contact.email }}
                  </div>
                  <div
                    v-if="contact.agency_employee_id === null"
                    class="text-gray-500 block pt-2"
                  >
                    No data available
                  </div>
                  <div v-else class="text-gray-500 block uppercase pt-2">
                    #{{ contact.agency_employee_id }}
                  </div>
                </figcaption>
              </div>
            </figure>
          </div>
          <personal-information :contact="contact"></personal-information>
        </div>
      </div>

      <div class="h-full pt-3">
        <div class="grid gap-6 mb-4 md:grid-cols-2 xl:grid-cols-2">
          <family-background :family="family"></family-background>
          <childrens :childrens="childrens" :family="family"></childrens>
        </div>
      </div>

      <educational-background :educations="educations"></educational-background>

      <civil-service :eligibilities="eligibilities"></civil-service>

      <work-experience :experiences="experiences"></work-experience>

      <volunteer-work :volunteers="volunteers"></volunteer-work>

      <trainings :trainings="trainings"></trainings>

      <div
        id="documents"
        class="w-full h-full mt-6 transition duration-500 ease-in-out transform hover:-translate-y-1"
      >
        <div
          class="shadow overflow-hidden border-b bg-white border-gray-200 sm:rounded-lg"
        >
          <div class="flex items-center justify-between mb-0">
            <h5 class="mx-6 my-5 font-semibold font bg-white">📑 Documents</h5>
            <button
              @click="showDocumentModal"
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
                  Document Name
                </th>
                <th
                  scope="col"
                  class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                >
                  Document Type
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
                v-for="document in documents"
                :key="document.id"
              >
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                  <div class="text-sm text-gray-900 normal-case">
                    {{ document.document_name }}
                  </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                  <div class="text-sm text-gray-900 capitalize">
                    {{ document.document_type }}
                  </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                  <a
                    :href="'/storage/' + document.document_file"
                    class="text-indigo-600 cursor-pointer hover:text-indigo-900"
                    >💾 Download</a
                  >
                  <span
                    @click="destroy(document.id, document.document_name)"
                    class="text-red-600 inline-flex mt-2 cursor-pointer hover:text-red-900"
                    >🗑️ Delete</span
                  >
                </td>
              </tr>
              <tr v-if="documents.length === 0">
                <td
                  class="border-t px-6 py-4 text-red-500 text-sm font-bold"
                  colspan="4"
                >
                  ☹️ No documents added.
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

      <other-informations
        :skills="skills"
        :memberships="memberships"
        :recognitions="recognitions"
        class="flex"
      ></other-informations>

      <document-add-modal
        :showing="showDocument"
        :employee="contact"
        :modal.sync="showDocument"
      ></document-add-modal>

      <password
        :showing="showPassword"
        :employee="contact"
        :modal.sync="showPassword"
      ></password>
    </div>
  </div>
</template>
<script>
import Layout from "@/Pages/EmployeePanel/Layout";
import Password from "@/Pages/EmployeePanel/Password";
import moment from "moment";
import { ToggleButton } from "vue-js-toggle-button";
import LoadingButton from "@/Shared/LoadingButton";
import SelectInput from "@/Shared/SelectInput";
import TextInput from "@/Shared/TextInput";
import TrashedMessage from "@/Shared/TrashedMessage";
import EducationalBackground from "@/Shared/EducationalBackground.vue";
import CivilService from "@/Shared/CivilService.vue";
import WorkExperience from "@/Shared/WorkExperience.vue";
import VolunteerWork from "@/Shared/VolunteerWork.vue";
import Trainings from "@/Shared/Trainings.vue";
import OtherInformations from "@/Shared/OtherInformations.vue";
import PersonalInformation from "@/Shared/PersonalInformation.vue";
import FamilyBackground from "@/Shared/FamilyBackground.vue";
import Childrens from "@/Shared/Childrens.vue";
import DocumentAddModal from "@/Shared/Modals/DocumentAddModal.vue";

export default {
  metaInfo: { title: "Profile" },
  layout: Layout,
  components: {
    ToggleButton,
    LoadingButton,
    SelectInput,
    TextInput,
    TrashedMessage,
    EducationalBackground,
    CivilService,
    WorkExperience,
    VolunteerWork,
    Trainings,
    OtherInformations,
    PersonalInformation,
    FamilyBackground,
    Childrens,
    DocumentAddModal,
    Password,
  },
  props: {
    notices: Array,
    employee: Object,
    errors: Object,
    contact: Object,
    educations: Array,
    experiences: Array,
    eligibilities: Array,
    volunteers: Array,
    trainings: Array,
    skills: Array,
    recognitions: Array,
    memberships: Array,
    family: Object,
    childrens: Array,
    documents: Array,
  },

  remember: "form",
  data() {
    return {
      showDocument: false,
      showPassword: false,
      hidden: true,
      sending: false,
      file: null,
      image: "/img/user.png",
      status: this.contact.status === "1" ? true : false,
      form: {
        first_name: this.contact.first_name,
        last_name: this.contact.last_name,
        organization_id: this.contact.organization_id,
        email: this.contact.email,
        phone: this.contact.phone,
      },
    };
  },
  provide() {
    return { employeeId: this.contact, familyObject: this.family };
  },
  watch: {
    status(status) {
      this.$emit("input", status);
      this.active(status);
    },
  },
  methods: {
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
    showDocumentModal() {
      this.showDocument = true;
    },
    showPasswordModal() {
      this.showPassword = true;
    },
    capitalize: function (value) {
      return value.toLowerCase().replace(/\b./g, function (a) {
        return a.toUpperCase();
      });
    },
    active(active) {
      let status = active ? "1" : "0";
      let data = new FormData();
      data.append("status", status);
      data.append("_method", "PUT");

      this.$inertia.post(
        this.route("employees.update.status", this.contact.id),
        data,
        {
          onStart: () => (this.sending = true),
          onFinish: () => (this.sending = false),
        }
      );
    },
    browse() {
      this.hidden = false;
      this.$refs.file.click();
    },
    change(event) {
      this.file = event.target.files[0];
      this.$emit("input", this.file);
      let reader = new FileReader();
      reader.readAsDataURL(this.file);
      reader.onload = (event) => {
        this.image = event.target.result;
      };
    },
    cancel() {
      (this.file = null), (this.hidden = true);
      this.image = "/img/user.png";
      this.$emit("input", this.file);
    },
    save() {
      let data = new FormData();
      data.append("photo", this.file);
      data.append("_method", "PUT");

      this.$inertia.post(
        this.route("employees.update.photo", this.contact.id),
        data,
        {
          onStart: () => (this.sending = true),
          onFinish: () => (this.sending = false),
        }
      );
    },
    destroy(id, name) {
      swal({
        title: "Delete",
        text: `Are you sure you want to delete ${name}?`,
        buttons: true,
        dangerMode: true,
      }).then((willDelete) => {
        if (willDelete) {
          this.$inertia.delete(this.route("document.destroy", id));
        }
      });
    },
  },
};
</script>
