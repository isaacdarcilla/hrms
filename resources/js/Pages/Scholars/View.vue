<template>
  <div>
    <h1 class="mb-8 font-bold text-3xl">
      <inertia-link
        class="text-indigo-400 hover:text-indigo-600"
        :href="route('scholarship.index')"
        >Scholarship</inertia-link
      >
      <span class="text-indigo-400 font-medium">/</span> View Scholarship 🎓
    </h1>
    <div class="bg-white rounded shadow overflow-hidden">
      <form @submit.prevent="submit">
        <div class="p-8 -mr-6 flex flex-wrap">
          <!-- First -->
          <text-input
            disabled="true"
            v-model="form.type_of_disability"
            :error="errors.type_of_disability"
            class="pr-6 pb-8 w-full lg:w-1/2"
            label="Type of Disability (If Any)"
            placeholder="Enter disability"
          />
          <div class="pr-6 pb-8 w-full lg:w-1/2">
            <label class="form-label">Highest Educational Attainment *</label>
            <select
              disabled
              class="form-input block w-full"
              v-model="form.highest_educational_attainment"
            >
              <option value="Some Elementary">Some Elementary</option>
              <option value="Elementary Graduate">Elementary Graduate</option>
              <option value="Some High School">Some High School</option>
              <option value="High School Graduate">High School Graduate</option>
              <option value="Some College">Some College</option>
              <option value="College Graduate">College Graduate</option>
              <option value="Masters Graduate">Masters Graduate</option>
              <option value="Doctoral Graduate">Doctoral Graduate</option>
            </select>
            <div
              v-if="$page.errors.highest_educational_attainment !== null"
              class="form-error"
            >
              {{ $page.errors.highest_educational_attainment }}
            </div>
          </div>
          <text-input
            disabled="true"
            v-model="form.school_last_attended"
            :error="errors.school_last_attended"
            class="pr-6 pb-8 w-full lg:w-1/2"
            label="Last School Attended *"
            placeholder="Enter last school attended"
          />
          <text-input
            disabled="true"
            v-model="form.school_address"
            :error="errors.school_address"
            class="pr-6 pb-8 w-full lg:w-1/2"
            label="School Address *"
            placeholder="Enter school address"
          />
          <text-input
            disabled="true"
            v-model="form.degree_program"
            :error="errors.degree_program"
            class="pr-6 pb-8 w-full lg:w-1/2"
            label="Degree Program (Write in full) *"
            placeholder="Enter degree program"
          />
          <text-input
            disabled="true"
            v-model="form.weighted_average"
            :error="errors.weighted_average"
            class="pr-6 pb-8 w-full lg:w-1/2"
            label="General Weighted Average (GWA) *"
            placeholder="Enter gwa"
          />
          <!-- End -->

          <div class="pr-6 pb-8 w-full lg:w-1/2">
            <label class="form-label">Scholarship Type *</label>
            <select
              disabled
              @change="handleType"
              class="form-input block w-full"
              v-model="form.scholarship_type"
            >
              <option value="1">Local Training Grant</option>
              <option value="2">Training Grant Abroad</option>
              <option value="3">Sabbatical Leave</option>
              <option value="4">Advanced Degree Program</option>
            </select>
            <div
              v-if="$page.errors.scholarship_type !== null"
              class="form-error"
            >
              {{ $page.errors.scholarship_type }}
            </div>
          </div>

          <!-- Local only  -->
          <text-input
            v-if="
              form.scholarship_type == '1' ||
              form.scholarship_type == '2' ||
              form.scholarship_type == '3'
            "
            disabled="true"
            v-model="form.duration_number_of_months"
            :error="errors.duration_number_of_months"
            class="pr-6 pb-8 w-full lg:w-1/2"
            label="Duration (No. of Months) *"
            placeholder="Enter number of months"
          />

          <div
            v-if="
              form.scholarship_type == '1' ||
              form.scholarship_type == '2' ||
              form.scholarship_type == '3'
            "
            class="pr-6 pb-8 w-full lg:w-1/2"
          >
            <label class="form-label">Inclusive Date *</label>
            <div class="flex items-center">
              <input
                v-model="form.scholarship_inclusive_dates"
                class="form-input block w-full"
                readonly
                placeholder="Select start date"
              />
            </div>
            <div
              v-if="$page.errors.scholarship_inclusive_dates !== null"
              class="form-error"
            >
              {{ $page.errors.scholarship_inclusive_dates }}
            </div>
          </div>

          <!-- Tranining grant abroad only -->
          <text-input
            disabled="true"
            v-if="form.scholarship_type == '2'"
            v-model="form.sponsoring_agency"
            :error="errors.sponsoring_agency"
            class="pr-6 pb-8 w-full lg:w-1/2"
            label="Sponsoring Institution/Agency *"
            placeholder="Enter sponsoring agency"
          />

          <!-- Advanced degree only -->
          <select-input
            disabled="true"
            v-if="form.scholarship_type == '4'"
            v-model="form.degree_type"
            :error="errors.degree_type"
            class="pr-6 pb-8 w-full lg:w-1/2"
            label="Degree Type *"
          >
            <option value="1">Masters Degree</option>
            <option value="2">Doctorate Degree</option>
          </select-input>

          <text-input
            disabled="true"
            v-if="form.scholarship_type == '4'"
            v-model="form.degree_name"
            :error="errors.degree_name"
            class="pr-6 pb-8 w-full lg:w-1/2"
            label="Degree Name *"
            placeholder="Enter degree name"
          />

          <!--  -->

          <select-input
            disabled="true"
            v-if="form.scholarship_type == '4'"
            v-model="form.plan"
            :error="errors.plan"
            class="pr-6 pb-8 w-full lg:w-1/2"
            label="Plan *"
          >
            <option value="1">
              Plan A: Outside Agency-Sponsored Fellowship/Scholarship
            </option>
            <option value="2">Plan B: College-Sponsored Scholarship</option>
            <option value="3">Plan C: Study Leave</option>
            <option value="4">Plan D: Thesis/Dissertation Assistance</option>
          </select-input>

          <!-- Plan A only -->

          <text-input
            disabled="true"
            v-if="form.plan == '1'"
            v-model="form.grantee_agency"
            :error="errors.grantee_agency"
            class="pr-6 pb-8 w-full lg:w-1/2"
            label="Grantee Institution/Agency *"
            placeholder="Enter grantee agency"
          />

          <text-input
            disabled="true"
            v-if="form.plan == '1'"
            v-model="form.school_intended_to_enroll"
            :error="errors.school_intended_to_enroll"
            class="pr-6 pb-8 w-full lg:w-1/2"
            label="School Intended To Enroll In *"
            placeholder="Enter school intended to enroll in"
          />

          <text-input
            disabled="true"
            v-if="form.plan == '1'"
            v-model="form.intended_school_address"
            :error="errors.intended_school_address"
            class="pr-6 pb-8 w-full lg:w-1/2"
            label="School Address *"
            placeholder="Enter school address"
          />

          <text-input
            disabled="true"
            v-if="form.plan == '1'"
            v-model="form.duration_number_of_years"
            :error="errors.duration_number_of_years"
            class="pr-6 pb-8 w-full lg:w-1/2"
            label="Duration (No. of Years) *"
            placeholder="Enter number of years"
          />

          <div v-if="form.plan == '1'" class="pr-6 pb-8 w-full lg:w-1/2">
            <label class="form-label">Inclusive Date *</label>
            <div class="flex items-center">
              <input
                disabled="true"
                v-model="form.scholarship_inclusive_dates"
                class="form-input block w-full"
                readonly
                placeholder="Select start date"
              />
            </div>
            <div
              v-if="$page.errors.scholarship_inclusive_dates !== null"
              class="form-error"
            >
              {{ $page.errors.scholarship_inclusive_dates }}
            </div>
          </div>

          <!-- End -->

          <!-- Plan B only -->

          <text-input
            disabled="true"
            v-if="form.plan == '2'"
            v-model="form.school_intended_to_enroll"
            :error="errors.school_intended_to_enroll"
            class="pr-6 pb-8 w-full lg:w-1/2"
            label="School Intended To Enroll In *"
            placeholder="Enter school intended to enroll in"
          />

          <text-input
            disabled="true"
            v-if="form.plan == '2'"
            v-model="form.school_address"
            :error="errors.school_address"
            class="pr-6 pb-8 w-full lg:w-1/2"
            label="School Address *"
            placeholder="Enter school address"
          />

          <select-input
            disabled="true"
            v-if="form.plan == '2'"
            v-model="form.school_type"
            :error="errors.school_type"
            class="pr-6 pb-8 w-full lg:w-1/2"
            label="School Type *"
          >
            <option value="1">Public Institution</option>
            <option value="2">CHED Recognized Private Institution</option>
          </select-input>

          <text-input
            disabled="true"
            v-if="form.plan == '2'"
            v-model="form.duration_number_of_years"
            :error="errors.duration_number_of_years"
            class="pr-6 pb-8 w-full lg:w-1/2"
            label="Duration (No. of Years) *"
            placeholder="Enter number of years"
          />

          <div v-if="form.plan == '2'" class="pr-6 pb-8 w-full lg:w-1/2">
            <label class="form-label">Inclusive Date *</label>
            <div class="flex items-center">
              <input
                disabled="true"
                v-model="form.scholarship_inclusive_dates"
                class="form-input block w-full"
                readonly
                placeholder="Select start date"
              />
            </div>
            <div
              v-if="$page.errors.scholarship_inclusive_dates !== null"
              class="form-error"
            >
              {{ $page.errors.scholarship_inclusive_dates }}
            </div>
          </div>

          <!-- End -->

          <!-- Plan C only -->

          <text-input
            disabled="true"
            v-if="form.plan == '3'"
            v-model="form.duration_number_of_years"
            :error="errors.duration_number_of_years"
            class="pr-6 pb-8 w-full lg:w-1/2"
            label="Duration (No. of Years) *"
            placeholder="Enter number of years"
          />

          <div v-if="form.plan == '3'" class="pr-6 pb-8 w-full lg:w-1/2">
            <label class="form-label">Inclusive Date *</label>
            <div class="flex items-center">
              <input
                disabled="true"
                v-model="form.scholarship_inclusive_dates"
                class="form-input block w-full"
                readonly
                placeholder="Select start date"
              />
            </div>
            <div
              v-if="$page.errors.scholarship_inclusive_dates !== null"
              class="form-error"
            >
              {{ $page.errors.scholarship_inclusive_dates }}
            </div>
          </div>

          <!-- End -->

          <!-- Plan D only -->

          <select-input
            v-if="form.plan == '4'"
            disabled="true"
            v-model="form.thesis_or_dissertation"
            :error="errors.thesis_or_dissertation"
            class="pr-6 pb-8 w-full lg:w-1/2"
            label="Thesis/Dissertation Assistance *"
          >
            <option value="1">Thesis Assistance</option>
            <option value="2">Dissertation Assistance</option>
          </select-input>

          <text-input
            v-if="form.plan == '4'"
            disabled="true"
            v-model="form.thesis_or_dissertation_name"
            :error="errors.thesis_or_dissertation_name"
            class="pr-6 pb-8 w-full lg:w-1/2"
            label="Thesis/Dissertation Name *"
            placeholder="Enter thesis or dissertation name"
          />
          <!-- End -->

          <select-input
            disabled="true"
            v-model="form.recipient_before"
            :error="errors.recipient_before"
            class="pr-6 pb-8 w-full lg:w-1/2"
            label="Have you been a recipient of scholarship before? *"
          >
            <option value="" selected disabled>Select option</option>
            <option value="Yes">Yes</option>
            <option value="No">No</option>
          </select-input>

          <text-input
            disabled="true"
            v-if="form.recipient_before == 'Yes'"
            v-model="form.sponsoring_agency_before"
            :error="errors.sponsoring_agency_before"
            class="pr-6 pb-8 w-full lg:w-1/2"
            label="Sponsoring Agency *"
            placeholder="Enter sponsoring agency"
          />

          <div
            v-if="form.recipient_before == 'Yes'"
            class="pr-6 pb-8 w-full lg:w-1/2"
          >
            <label class="form-label">Period of Grant *</label>
            <div class="flex items-center">
              <input
                disabled="true"
                v-model="form.period_of_grant"
                class="form-input block w-full"
                readonly
                placeholder="Select start date"
              />
            </div>
            <div
              v-if="$page.errors.period_of_grant !== null"
              class="form-error"
            >
              {{ $page.errors.period_of_grant }}
            </div>
          </div>

          <textarea-input
            disabled="true"
            v-model="form.reason_of_applying"
            :error="errors.reason_of_applying"
            class="pr-6 pb-8 w-full lg:w-1/2"
            label="Reason for Applying *"
            placeholder="State briefly your reason for applying for staff development program."
          />
        </div>
        <!-- <div
          class="px-8 py-4 bg-gray-100 border-t border-gray-200 flex justify-end items-center"
        >
          <loading-button :loading="sending" class="btn-indigo" type="submit"
            >Update</loading-button
          >
        </div> -->
      </form>
    </div>
  </div>
</template>

<script>
import Layout from "@/Shared/Layout";
import LoadingButton from "@/Shared/LoadingButton";
import SelectInput from "@/Shared/SelectInput";
import TextInput from "@/Shared/TextInput";
import TextareaInput from "@/Shared/TextareaInput";
import FileInput from "@/Shared/FileInput";
import moment from "moment";
import VSelectize from "@isneezy/vue-selectize";
import jobs from "../../Shared/Modals/jobs.json";

export default {
  metaInfo: { title: "View Scholarship" },
  layout: Layout,
  components: {
    LoadingButton,
    SelectInput,
    TextInput,
    TextareaInput,
    FileInput,
    VSelectize,
  },
  props: {
    errors: Object,
    employee: Object,
    scholar: Object,
  },
  remember: "form",
  watch: {
    form: {
      handler(e) {},
      deep: true,
    },
  },
  data() {
    return {
      sending: false,
      options: jobs,
      form: {
        contact_id: this.employee.id,
        office_id: this.employee.department,
        type_of_disability: this.scholar.contact.type_of_disability,
        highest_educational_attainment: this.scholar.contact
          .highest_educational_attainment,
        school_last_attended: this.scholar.contact.school_last_attended,
        school_address: this.scholar.contact.school_address,
        degree_program: this.scholar.contact.degree_program,
        weighted_average: this.scholar.contact.weighted_average,

        status: this.scholar.status,
        scholarship_number: this.scholar.scholarship_number,
        scholarship_type: this.scholar.scholarship_type,
        duration_number_of_months: this.scholar.duration_number_of_months,
        // inclusive_dates
        start_inclusive_dates: this.scholar.start_inclusive_dates,
        end_inclusive_dates: this.scholar.end_inclusive_dates,
        sponsoring_agency: this.scholar.sponsoring_agency,
        degree_type: this.scholar.degree_type,
        degree_name: this.scholar.degree_name,
        plan: this.scholar.plan,
        grantee_agency: this.scholar.grantee_agency,
        school_intended_to_enroll: this.scholar.school_intended_to_enroll,
        intended_school_address: this.scholar.school_address,
        duration_number_of_years: this.scholar.duration_number_of_years,
        scholarship_inclusive_dates: this.scholar.scholarship_inclusive_dates,
        school_type: this.scholar.school_type,
        thesis_or_dissertation: this.scholar.thesis_or_dissertation,
        thesis_or_dissertation_name: this.scholar.thesis_or_dissertation_name,
        recipient_before: this.scholar.recipient_before,
        sponsoring_agency_before: this.scholar.sponsoring_agency_before,
        period_of_grant: this.scholar.period_of_grant,
        reason_of_applying: this.scholar.reason_of_applying,
        // doc1: null,
        // doc2: null,
        // doc3: null,
        // doc4: null,
        // doc5: null,
        // doc6: null,
        // doc7: null,
        // doc8: null,
        // doc9: null,
        // doc10: null,
        // doc11: null,
        // doc12: null,
        // doc13: null,
        // doc14: null,
        // doc15: null,
        // doc16: null,
        // immediate_head_name: null,
        // vp_name: null,
        // suc_president_name: null,
      },
    };
  },
  methods: {
    handleType(e) {
      console.log(e.target.value);
      if (e.target.value != 4) {
        this.form.plan = null;
      }
    },
    submit() {
      this.$inertia.put(
        this.route("employee.scholarship.update", this.scholar.id),
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
