<template>
  <div>
    <h1 class="mb-8 font-bold text-3xl">
      <inertia-link
        class="text-indigo-400 hover:text-indigo-600"
        :href="route('employee.scholarship')"
        >Scholarship</inertia-link
      >
      <span class="text-indigo-400 font-medium">/</span> Apply Scholarship 🎓
    </h1>
    <div class="bg-white rounded shadow overflow-hidden">
      <form @submit.prevent="submit">
        <div class="p-8 -mr-6 flex flex-wrap">
          <select-input
            v-model="form.scholarship_type"
            :error="errors.scholarship_type"
            class="pr-6 pb-8 w-full lg:w-1/2"
            label="Scholarship Type *"
          >
            <option @click="form.plan = null" value="1">
              Local Training Grant
            </option>
            <option @click="form.plan = null" value="2">
              Training Grant Abroad
            </option>
            <option @click="form.plan = null" value="3">
              Sabbatical Leave
            </option>
            <option value="4">Advanced Degree Program</option>
          </select-input>

          <!-- Local only  -->
          <text-input
            v-if="
              form.scholarship_type == '1' ||
              form.scholarship_type == '2' ||
              form.scholarship_type == '3'
            "
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
            <label class="form-label">Inclusive Date (Start) *</label>
            <v-date-picker v-model="form.start_inclusive_dates">
              <template v-slot="{ inputValue, togglePopover }">
                <div class="flex items-center">
                  <input
                    @focus="togglePopover"
                    :value="format(inputValue)"
                    class="form-input block w-full"
                    readonly
                    placeholder="Select start date"
                  />
                </div>
              </template>
            </v-date-picker>
            <div
              v-if="$page.errors.start_inclusive_dates !== null"
              class="form-error"
            >
              {{ $page.errors.start_inclusive_dates }}
            </div>
          </div>
          <div
            v-if="
              form.scholarship_type == '1' ||
              form.scholarship_type == '2' ||
              form.scholarship_type == '3'
            "
            class="pr-6 pb-8 w-full lg:w-1/2"
          >
            <label class="form-label">Inclusive Date (End) *</label>
            <v-date-picker v-model="form.end_inclusive_dates">
              <template v-slot="{ inputValue, togglePopover }">
                <div class="flex items-center">
                  <input
                    @focus="togglePopover"
                    :value="format(inputValue)"
                    class="form-input block w-full"
                    readonly
                    placeholder="Select end date"
                  />
                </div>
              </template>
            </v-date-picker>
            <div
              v-if="$page.errors.end_inclusive_dates !== null"
              class="form-error"
            >
              {{ $page.errors.end_inclusive_dates }}
            </div>
          </div>

          <!-- Tranining grant abroad only -->
          <text-input
            v-if="form.scholarship_type == '2'"
            v-model="form.sponsoring_agency"
            :error="errors.sponsoring_agency"
            class="pr-6 pb-8 w-full lg:w-1/2"
            label="Sponsoring Institution/Agency *"
            placeholder="Enter sponsoring agency"
          />

          <!-- Advanced degree only -->
          <select-input
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
            v-if="form.scholarship_type == '4'"
            v-model="form.degree_name"
            :error="errors.degree_name"
            class="pr-6 pb-8 w-full lg:w-1/2"
            label="Degree Name *"
            placeholder="Enter degree name"
          />

          <!--  -->

          <select-input
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
            v-if="form.plan == '1'"
            v-model="form.grantee_agency"
            :error="errors.grantee_agency"
            class="pr-6 pb-8 w-full lg:w-1/2"
            label="Grantee Institution/Agency *"
            placeholder="Enter grantee agency"
          />

          <text-input
            v-if="form.plan == '1'"
            v-model="form.school_intended_to_enroll"
            :error="errors.school_intended_to_enroll"
            class="pr-6 pb-8 w-full lg:w-1/2"
            label="School Intended To Enroll In *"
            placeholder="Enter school intended to enroll in"
          />

          <text-input
            v-if="form.plan == '1'"
            v-model="form.school_address"
            :error="errors.school_address"
            class="pr-6 pb-8 w-full lg:w-1/2"
            label="School Address *"
            placeholder="Enter school address"
          />

          <text-input
            v-if="form.plan == '1'"
            v-model="form.duration_number_of_years"
            :error="errors.duration_number_of_years"
            class="pr-6 pb-8 w-full lg:w-1/2"
            label="Duration (No. of Years) *"
            placeholder="Enter number of years"
          />

          <div v-if="form.plan == '1'" class="pr-6 pb-8 w-full lg:w-1/2">
            <label class="form-label">Inclusive Date (Start) *</label>
            <v-date-picker v-model="form.scholarship_start_inclusive_dates">
              <template v-slot="{ inputValue, togglePopover }">
                <div class="flex items-center">
                  <input
                    @focus="togglePopover"
                    :value="format(inputValue)"
                    class="form-input block w-full"
                    readonly
                    placeholder="Select start date"
                  />
                </div>
              </template>
            </v-date-picker>
            <div
              v-if="$page.errors.scholarship_start_inclusive_dates !== null"
              class="form-error"
            >
              {{ $page.errors.scholarship_start_inclusive_dates }}
            </div>
          </div>

          <div v-if="form.plan == '1'" class="pr-6 pb-8 w-full lg:w-1/2">
            <label class="form-label">Inclusive Date (End) *</label>
            <v-date-picker v-model="form.scholarship_end_inclusive_dates">
              <template v-slot="{ inputValue, togglePopover }">
                <div class="flex items-center">
                  <input
                    @focus="togglePopover"
                    :value="format(inputValue)"
                    class="form-input block w-full"
                    readonly
                    placeholder="Select end date"
                  />
                </div>
              </template>
            </v-date-picker>
            <div
              v-if="$page.errors.scholarship_end_inclusive_dates !== null"
              class="form-error"
            >
              {{ $page.errors.scholarship_end_inclusive_dates }}
            </div>
          </div>

          <!-- End -->

          <!-- Plan B only -->

          <text-input
            v-if="form.plan == '2'"
            v-model="form.school_intended_to_enroll"
            :error="errors.school_intended_to_enroll"
            class="pr-6 pb-8 w-full lg:w-1/2"
            label="School Intended To Enroll In *"
            placeholder="Enter school intended to enroll in"
          />

          <text-input
            v-if="form.plan == '2'"
            v-model="form.school_address"
            :error="errors.school_address"
            class="pr-6 pb-8 w-full lg:w-1/2"
            label="School Address *"
            placeholder="Enter school address"
          />

          <select-input
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
            v-if="form.plan == '2'"
            v-model="form.duration_number_of_years"
            :error="errors.duration_number_of_years"
            class="pr-6 pb-8 w-full lg:w-1/2"
            label="Duration (No. of Years) *"
            placeholder="Enter number of years"
          />

          <div v-if="form.plan == '2'" class="pr-6 pb-8 w-full lg:w-1/2">
            <label class="form-label">Inclusive Date (Start) *</label>
            <v-date-picker v-model="form.scholarship_start_inclusive_dates">
              <template v-slot="{ inputValue, togglePopover }">
                <div class="flex items-center">
                  <input
                    @focus="togglePopover"
                    :value="format(inputValue)"
                    class="form-input block w-full"
                    readonly
                    placeholder="Select start date"
                  />
                </div>
              </template>
            </v-date-picker>
            <div
              v-if="$page.errors.scholarship_start_inclusive_dates !== null"
              class="form-error"
            >
              {{ $page.errors.scholarship_start_inclusive_dates }}
            </div>
          </div>

          <div v-if="form.plan == '2'" class="pr-6 pb-8 w-full lg:w-1/2">
            <label class="form-label">Inclusive Date (End) *</label>
            <v-date-picker v-model="form.scholarship_end_inclusive_dates">
              <template v-slot="{ inputValue, togglePopover }">
                <div class="flex items-center">
                  <input
                    @focus="togglePopover"
                    :value="format(inputValue)"
                    class="form-input block w-full"
                    readonly
                    placeholder="Select end date"
                  />
                </div>
              </template>
            </v-date-picker>
            <div
              v-if="$page.errors.scholarship_end_inclusive_dates !== null"
              class="form-error"
            >
              {{ $page.errors.scholarship_end_inclusive_dates }}
            </div>
          </div>

          <!-- End -->

          <!-- Plan C only -->

          <text-input
            v-if="form.plan == '3'"
            v-model="form.duration_number_of_years"
            :error="errors.duration_number_of_years"
            class="pr-6 pb-8 w-full lg:w-1/2"
            label="Duration (No. of Years) *"
            placeholder="Enter number of years"
          />

          <div v-if="form.plan == '3'" class="pr-6 pb-8 w-full lg:w-1/2">
            <label class="form-label">Inclusive Date (Start) *</label>
            <v-date-picker v-model="form.scholarship_start_inclusive_dates">
              <template v-slot="{ inputValue, togglePopover }">
                <div class="flex items-center">
                  <input
                    @focus="togglePopover"
                    :value="format(inputValue)"
                    class="form-input block w-full"
                    readonly
                    placeholder="Select start date"
                  />
                </div>
              </template>
            </v-date-picker>
            <div
              v-if="$page.errors.scholarship_start_inclusive_dates !== null"
              class="form-error"
            >
              {{ $page.errors.scholarship_start_inclusive_dates }}
            </div>
          </div>

          <div v-if="form.plan == '3'" class="pr-6 pb-8 w-full lg:w-1/2">
            <label class="form-label">Inclusive Date (End) *</label>
            <v-date-picker v-model="form.scholarship_end_inclusive_dates">
              <template v-slot="{ inputValue, togglePopover }">
                <div class="flex items-center">
                  <input
                    @focus="togglePopover"
                    :value="format(inputValue)"
                    class="form-input block w-full"
                    readonly
                    placeholder="Select end date"
                  />
                </div>
              </template>
            </v-date-picker>
            <div
              v-if="$page.errors.scholarship_end_inclusive_dates !== null"
              class="form-error"
            >
              {{ $page.errors.scholarship_end_inclusive_dates }}
            </div>
          </div>

          <!-- End -->

          <!-- Plan D only -->

          <select-input
            v-if="form.plan == '4'"
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
            v-model="form.thesis_or_dissertation_name"
            :error="errors.thesis_or_dissertation_name"
            class="pr-6 pb-8 w-full lg:w-1/2"
            label="Thesis/Dissertation Name *"
            placeholder="Enter thesis or dissertation name"
          />
          <!-- End -->

          <select-input
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
            <label class="form-label">Period of Grant (Start) *</label>
            <v-date-picker v-model="form.start_period_of_grant">
              <template v-slot="{ inputValue, togglePopover }">
                <div class="flex items-center">
                  <input
                    @focus="togglePopover"
                    :value="format(inputValue)"
                    class="form-input block w-full"
                    readonly
                    placeholder="Select start date"
                  />
                </div>
              </template>
            </v-date-picker>
            <div
              v-if="$page.errors.start_period_of_grant !== null"
              class="form-error"
            >
              {{ $page.errors.start_period_of_grant }}
            </div>
          </div>

          <div
            v-if="form.recipient_before == 'Yes'"
            class="pr-6 pb-8 w-full lg:w-1/2"
          >
            <label class="form-label">Period of Grant (End) *</label>
            <v-date-picker v-model="form.end_period_of_grant">
              <template v-slot="{ inputValue, togglePopover }">
                <div class="flex items-center">
                  <input
                    @focus="togglePopover"
                    :value="format(inputValue)"
                    class="form-input block w-full"
                    readonly
                    placeholder="Select end date"
                  />
                </div>
              </template>
            </v-date-picker>
            <div
              v-if="$page.errors.end_period_of_grant !== null"
              class="form-error"
            >
              {{ $page.errors.end_period_of_grant }}
            </div>
          </div>

          <textarea-input
            v-model="form.reason_of_applying"
            :error="errors.reason_of_applying"
            class="pr-6 pb-8 w-full lg:w-1/2"
            label="Reason for Applying *"
            placeholder="State briefly your reason for applying for staff development program."
          />
        </div>
        <div
          class="px-8 py-4 bg-gray-100 border-t border-gray-200 flex justify-end items-center"
        >
          <loading-button :loading="sending" class="btn-indigo" type="submit"
            >Apply</loading-button
          >
        </div>
      </form>
    </div>
  </div>
</template>

<script>
import Layout from "@/Pages/EmployeePanel/Layout";
import LoadingButton from "@/Shared/LoadingButton";
import SelectInput from "@/Shared/SelectInput";
import TextInput from "@/Shared/TextInput";
import TextareaInput from "@/Shared/TextareaInput";
import FileInput from "@/Shared/FileInput";
import moment from "moment";
import VSelectize from "@isneezy/vue-selectize";
import jobs from "../../../Shared/Modals/jobs.json";

export default {
  metaInfo: { title: "Apply Scholarship" },
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
  },
  remember: "form",
  data() {
    return {
      sending: false,
      options: jobs,
      form: {
        contact_id: this.employee.id,

        type_of_disability: null,
        highest_educational_attainment: null,
        school_last_attended: null,
        school_address: null,
        degree_program: null,
        weighted_average: null,

        status: null,
        scholarship_number: null,
        scholarship_type: null,
        duration_number_of_months: null,
        // inclusive_dates: null,
        start_inclusive_dates: null,
        end_inclusive_dates: null,
        sponsoring_agency: null,
        degree_type: null,
        degree_name: null,
        plan: null,
        grantee_agency: null,
        school_intended_to_enroll: null,
        school_address: null,
        duration_number_of_years: null,
        // scholarship_inclusive_dates: null,
        scholarship_start_inclusive_dates: null,
        scholarship_end_inclusive_dates: null,
        school_type: null,
        thesis_or_dissertation: null,
        thesis_or_dissertation_name: null,
        recipient_before: null,
        sponsoring_agency_before: null,
        // period_of_grant: null,
        start_period_of_grant: null,
        end_period_of_grant: null,
        reason_of_applying: null,
        doc1: null,
        doc2: null,
        doc3: null,
        doc4: null,
        doc5: null,
        doc6: null,
        doc7: null,
        doc8: null,
        doc9: null,
        doc10: null,
        doc11: null,
        doc12: null,
        doc13: null,
        doc14: null,
        doc15: null,
        doc16: null,
        immediate_head_name: null,
        vp_name: null,
        suc_president_name: null,
      },
    };
  },
  methods: {
    submit() {
      this.$inertia.post(this.route("employee.scholarship.store"), this.form, {
        onStart: () => (this.sending = true),
        onFinish: () => (this.sending = false),
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
