<template>
  <div>
    <div class="flex justify-between">
      <h1 class="mb-8 font-bold text-3xl">
        <inertia-link
          class="text-indigo-400 hover:text-indigo-600"
          :href="route('employee.scholarship')"
          >Scholarship</inertia-link
        >
        <span class="text-indigo-400 font-medium">/</span> Form 92 🎓
      </h1>
      <button
        @click="printPdf()"
        class="btn-indigo h-10 rounded-lg transition duration-500 ease-in-out transform hover:-translate-y-1"
      >
        <span>🖨️ Print Form</span>
      </button>
    </div>
    <div>
      <vue-html2pdf
        :show-layout="true"
        :float-layout="false"
        :enable-download="false"
        :preview-modal="true"
        :paginate-elements-by-height="1400"
        :pdf-quality="2"
        :manual-pagination="true"
        pdf-format="legal"
        pdf-orientation="portrait"
        pdf-content-width="mx-auto"
        @hasStartedGeneration="hasStartedGeneration()"
        @hasGenerated="hasGenerated($event)"
        ref="html2Pdf"
      >
        <section
          slot="pdf-content"
          class="mt-2 bg-white font-sans mx-auto text-black"
          style="width: 800px; height: 1280px"
        >
          <div class="flex mt-6">
            <img class="mx-3 rounded-full" src="/img/logo.jpg" width="60px" />
            <div class="my-auto">
              <div class="text-sm italic mt-1">Republic of the Philippines</div>
              <div class="text-sm font-bold uppercase my-1">
                Catanduanes State University
              </div>
              <div class="text-sm italic mb-1">Virac, Catanduanes</div>
            </div>
          </div>
          <div class="border-t-2 mt-2 border-blue-600"></div>
          <div class="pt-5">
            <div class="text-center font-semibold uppercase">
              Scholarship Application Form
            </div>
          </div>
          <div class="pt-5">
            <div class="italic mx-16 text-justify">
              Instructions: Read general and documentary requirements. Fill in
              all he required information. Do not abbreviate. Do not leave an
              item blank. If item is not applicable, write N/A.
            </div>
          </div>
          <div class="pt-5">
            <div class="text-center font-semibold uppercase">
              Personal Information
            </div>
          </div>
          <div>
            <div class="flex">
              <div
                class="w-4/12 pl-2 py-1 border-t border-l border-r border-black"
              >
                Name of Employee: <br /><span class="italic text-sm"
                  >(Last Name, First Name, Middle Name)</span
                >
              </div>
              <div class="w-8/12 py-2 pl-1 border-t border-r border-black">
                <div class="my-auto">Mark Zuck Bird</div>
              </div>
            </div>
            <div class="flex">
              <div
                class="w-4/12 pl-2 py-1 border-t border-l border-r border-black"
              >
                Rank/Position:
              </div>
              <div class="w-8/12 pl-2 py-1 border-t border-r border-black">
                <div class="my-auto">Mark Zuck Bird</div>
              </div>
            </div>
            <div class="flex">
              <div
                class="w-4/12 pl-2 py-1 border-t border-l border-r border-black"
              >
                Department/College/Unit/Office:
              </div>
              <div class="w-8/12 pl-2 py-1 border-t border-r border-black">
                <div class="my-auto">Mark Zuck Bird</div>
              </div>
            </div>
            <div class="flex">
              <div
                class="w-4/12 pl-2 py-1 border-t border-l border-r border-black"
              >
                Permanent Home Address: <br /><span class="italic text-sm"
                  >(House/Block/Lot No., Street/ Subdivision/Village, Barangay,
                  City/Municipality, Province, Zip Code)</span
                >
              </div>
              <div class="w-8/12 py-2 pl-1 border-t border-r border-black">
                <div class="my-auto">Mark Zuck Bird</div>
              </div>
            </div>
            <div class="flex">
              <div
                class="w-4/12 pl-2 py-1 border-t border-l border-r border-black"
              >
                Present Address: <br /><span class="italic text-sm"
                  >(House/Block/Lot No., Street/ Subdivision/Village, Barangay,
                  City/Municipality, Province, Zip Code)</span
                >
              </div>
              <div class="w-8/12 py-2 pl-1 border-t border-r border-black">
                <div class="my-auto">Mark Zuck Bird</div>
              </div>
            </div>
            <div class="flex">
              <div
                class="w-4/12 pl-2 py-1 border-t border-l border-r border-black"
              >
                Email Address:
              </div>
              <div class="w-8/12 pl-2 py-1 border-t border-r border-black">
                <div class="my-auto">Mark Zuck Bird</div>
              </div>
            </div>
            <div class="flex">
              <div
                class="w-4/12 pl-2 py-1 border-t border-l border-r border-black"
              >
                Date of Birth:
                <div class="flex">
                  <div class="w-2/4 text-sm italic">(Month, Day, Year)</div>
                  <div class="w-2/4 text-sm text-center">
                    <div class="border-b border-black mx-2">
                      January 1, 1970
                    </div>
                  </div>
                </div>
              </div>
              <div class="w-4/12 py-1 pl-2 border-t border-r border-black">
                Sex: <span class="italic text-sm">(Please tick/check)</span>
                <div class="flex">
                  <div class="w-1/2 text-sm text-center">
                    <div class="border-b border-black mx-2">✓</div>
                  </div>
                  <div class="w-1/2">Male</div>
                  <div class="w-1/2 text-sm text-center">
                    <div class="border-b border-black mx-2">✓</div>
                  </div>
                  <div class="w-1/2">Female</div>
                </div>
              </div>
              <div class="w-4/12 py-1 pl-2 border-t border-r border-black">
                Cellphone Number:
                <div class="w-4/4 text-center">
                  <div class="mx-2">0920309628</div>
                </div>
              </div>
            </div>
            <div class="flex">
              <div
                class="w-4/12 pl-2 py-1 border-t border-l border-r border-black"
              >
                Type of Disability, if any:
              </div>
              <div class="w-8/12 pl-2 py-1 border-t border-r border-black">
                <div class="my-auto">Mark Zuck Bird</div>
              </div>
            </div>
            <div class="flex">
              <div
                class="w-4/12 pl-2 py-1 border-t border-l border-r border-black"
              >
                Highest Educational Attainment:
              </div>
              <div class="w-8/12 pl-2 py-1 border-t border-r border-black">
                <div class="my-auto">Mark Zuck Bird</div>
              </div>
            </div>
            <div class="flex">
              <div
                class="w-4/12 pl-2 py-1 border-t border-l border-r border-black"
              >
                Name of School Last Attended and<br />
                School Address:
              </div>
              <div class="w-8/12 pl-2 py-1 border-t border-r border-black">
                <div class="my-auto">Mark Zuck Bird</div>
              </div>
            </div>
            <div class="flex">
              <div
                class="w-4/12 pl-2 py-1 border-t border-l border-r border-black"
              >
                Degree Program:
                <span class="italic text-sm">(Pls. write in full)</span>
              </div>
              <div class="w-8/12 pl-2 py-1 border-t border-r border-black">
                <div class="my-auto">Mark Zuck Bird</div>
              </div>
            </div>
            <div class="flex">
              <div
                class="w-4/12 pl-2 py-1 border-t border-b border-l border-r border-black"
              >
                General Weighted Average (GWA):
              </div>
              <div
                class="w-8/12 pl-2 py-1 border-t border-b border-r border-black"
              >
                <div class="my-auto">Mark Zuck Bird</div>
              </div>
            </div>
            <div class="pt-5">
              <div class="text-center font-semibold uppercase">
                Staff Development Program Applied For:
                <span class="text-xs normal-case"> (Please tick the box)</span>
              </div>
            </div>
            <div class="flex">
              <div
                class="w-4/12 pl-2 py-1 border-t border-l border-r border-black font-semibold"
              >
                <div class="flex">
                  <div
                    class="text-sm h-2 border my-auto mx-4 border-black p-1"
                  ></div>
                  <div>Local Training Grant</div>
                </div>
              </div>
              <div class="w-8/12 pl-2 py-1 border-t border-r border-black">
                <div class="flex">
                  <div class="w-2/4 italic text-sm">
                    Duration: <span class="text-sm">(No. of Months)</span>
                  </div>
                  <div class="w-1/4 text-sm text-center">
                    <div class="border-b border-black mr-2">2</div>
                  </div>
                  <div class="w-2/4 italic text-sm">
                    Inclusive Dates: <span class="text-sm">(MM/YYYY)</span>
                  </div>
                  <div class="w-1/4 text-sm text-center">
                    <div class="border-b border-black mr-2">Jan 2, 1970</div>
                  </div>
                </div>
              </div>
            </div>
            <div class="flex">
              <div
                class="w-4/12 pl-2 py-1 border-t border-l border-r border-black font-semibold"
              >
                <div class="flex">
                  <div
                    class="text-sm h-2 border my-auto mx-4 border-black p-1"
                  ></div>
                  <div>Training Grant Abroad</div>
                </div>
              </div>
              <div class="w-8/12 pl-2 py-1 border-t border-r border-black">
                <div class="flex">
                  <div class="w-2/4 italic text-sm">
                    Duration: <span class="text-sm">(No. of Months)</span>
                  </div>
                  <div class="w-1/4 text-sm text-center">
                    <div class="border-b border-black mr-2">2</div>
                  </div>
                  <div class="w-2/4 italic text-sm">
                    Inclusive Dates: <span class="text-sm">(MM/YYYY)</span>
                  </div>
                  <div class="w-1/4 text-sm text-center">
                    <div class="border-b border-black mr-2">Jan 2, 1970</div>
                  </div>
                </div>
                <div class="flex">
                  <div class="w-6/12 italic">
                    Sponsoring Institution/Agency:
                  </div>
                  <div class="w-8/12 text-center">
                    <div class="border-b border-black mx-2">Sample Agency</div>
                  </div>
                </div>
              </div>
            </div>
            <div class="flex">
              <div
                class="w-4/12 pl-2 py-1 border-t border-l border-r border-black font-semibold"
              >
                <div class="flex">
                  <div
                    class="text-sm h-2 border my-auto mx-4 border-black p-1"
                  ></div>
                  <div>Sabbatical Leave</div>
                </div>
              </div>
              <div class="w-8/12 pl-2 py-1 border-t border-r border-black">
                <div class="flex">
                  <div class="w-2/4 italic text-sm">
                    Duration: <span class="text-sm">(No. of Months)</span>
                  </div>
                  <div class="w-1/4 text-sm text-center">
                    <div class="border-b border-black mr-2">2</div>
                  </div>
                  <div class="w-2/4 italic text-sm">
                    Inclusive Dates: <span class="text-sm">(MM/YYYY)</span>
                  </div>
                  <div class="w-1/4 text-sm text-center">
                    <div class="border-b border-black mr-2">Jan 2, 1970</div>
                  </div>
                </div>
              </div>
            </div>
            <div class="flex">
              <div
                class="w-4/12 pl-2 py-1 border-t border-l border-r border-black font-semibold"
              >
                <div class="flex">
                  <div
                    class="text-sm h-2 border my-auto mx-4 border-black p-1"
                  ></div>
                  <div>
                    Advanced Degree Program<br /><span
                      class="italic text-sm font-normal"
                      >(Pls. write in full)</span
                    >
                  </div>
                </div>
              </div>
              <div class="w-8/12 pl-2 py-1 border-t border-r border-black">
                <div class="flex">
                  <div
                    class="text-sm h-2 border my-auto mx-4 border-black p-1"
                  ></div>
                  <div class="w-2/12">Masters:</div>
                  <div class="w-10/12 text-sm text-center">
                    <div class="border-b border-black mr-2">2</div>
                  </div>
                </div>
                <div class="flex">
                  <div
                    class="text-sm h-2 border my-auto mx-4 border-black p-1"
                  ></div>
                  <div class="w-2/12">Doctorate:</div>
                  <div class="w-10/12 text-sm text-center">
                    <div class="border-b border-black mr-2">2</div>
                  </div>
                </div>
              </div>
            </div>
            <div class="flex">
              <div
                class="w-full pl-2 py-1 border-t border-l border-r border-black font-semibold"
              >
                <div class="flex">
                  <div
                    class="text-sm h-2 border my-auto mr-4 ml-10 border-black p-1"
                  ></div>
                  <div>
                    Plan A: Outside Agency-Sponsored Fellowship/Scholarship
                  </div>
                </div>
                <div class="flex">
                  <div class="w-4/12 ml-16 font-normal italic">
                    Grantee Institution/Agency:
                  </div>
                  <div class="w-10/12 mr-3 border-b border-black text-center">
                    Sample Agency
                  </div>
                </div>
                <div class="flex">
                  <div class="w-6/12 ml-16 font-normal italic">
                    School Intended to Enrol/Enrolled in:
                  </div>
                  <div class="w-8/12 mr-3 border-b border-black text-center">
                    Sample Agency
                  </div>
                </div>
                <div class="flex">
                  <div class="w-3/12 ml-16 font-normal italic">
                    School Address:
                  </div>
                  <div class="w-full mr-3 border-b border-black text-center">
                    Sample Agency
                  </div>
                </div>

                <div class="flex ml-16">
                  <div class="w-full italic text-sm font-normal">
                    Duration: <span class="text-sm">(No. of Terms/Years)</span>
                  </div>
                  <div class="w-full text-sm text-center">
                    <div class="border-b border-black mr-2">2</div>
                  </div>
                  <div class="w-full italic text-sm font-normal">
                    Inclusive Dates: <span class="text-sm">(MM/YYYY)</span>
                  </div>
                  <div class="w-full text-sm text-center">
                    <div class="border-b border-black mr-3">Jan 2, 1970</div>
                  </div>
                </div>
              </div>
            </div>
            <div class="flex">
              <div
                class="w-full pl-2 py-1 border-t border-l border-r border-black font-semibold"
              >
                <div class="flex">
                  <div
                    class="text-sm h-2 border my-auto mr-4 ml-10 border-black p-1"
                  ></div>
                  <div>Plan B: College-Sponsored Scholarship</div>
                </div>
                <div class="flex">
                  <div class="w-6/12 ml-16 font-normal italic">
                    School Intended to Enrol/Enrolled in:
                  </div>
                  <div class="w-8/12 mr-3 border-b border-black text-center">
                    Sample Agency
                  </div>
                </div>
                <div class="flex">
                  <div class="w-3/12 ml-16 font-normal italic">
                    School Address:
                  </div>
                  <div class="w-full mr-3 border-b border-black text-center">
                    Sample Agency
                  </div>
                </div>

                <div class="flex ml-16">
                  <div class="w-3/4 font-normal italic">
                    School Type:
                    <span class="italic text-sm font-normal"
                      >(Please tick)</span
                    >
                  </div>
                  <div class="w-1/4 text-sm text-center">
                    <div class="border-b border-black mx-2">✓</div>
                  </div>
                  <div class="w-2/4 font-normal italic">Public Institution</div>
                  <div class="w-1/4 text-sm text-center">
                    <div class="border-b border-black mx-2">✓</div>
                  </div>
                  <div class="w-full font-normal italic">
                    CHED Recognized Private Institution
                  </div>
                </div>

                <div class="flex ml-16">
                  <div class="w-full italic text-sm font-normal">
                    Duration: <span class="text-sm">(No. of Terms/Years)</span>
                  </div>
                  <div class="w-full text-sm text-center">
                    <div class="border-b border-black mr-2">2</div>
                  </div>
                  <div class="w-full italic text-sm font-normal">
                    Inclusive Dates: <span class="text-sm">(MM/YYYY)</span>
                  </div>
                  <div class="w-full text-sm text-center">
                    <div class="border-b border-black mr-3">Jan 2, 1970</div>
                  </div>
                </div>
              </div>
            </div>
            <div class="flex">
              <div
                class="w-full pl-2 py-1 border-t border-l border-r border-black font-semibold"
              >
                <div class="flex">
                  <div
                    class="text-sm h-2 border my-auto mr-4 ml-10 border-black p-1"
                  ></div>
                  <div>Plan C: Study Leave</div>
                </div>

                <div class="flex ml-16">
                  <div class="w-full italic text-sm font-normal">
                    Duration: <span class="text-sm">(No. of Terms/Years)</span>
                  </div>
                  <div class="w-full text-sm text-center">
                    <div class="border-b border-black mr-2">2</div>
                  </div>
                  <div class="w-full italic text-sm font-normal">
                    Inclusive Dates: <span class="text-sm">(MM/YYYY)</span>
                  </div>
                  <div class="w-full text-sm text-center">
                    <div class="border-b border-black mr-3">Jan 2, 1970</div>
                  </div>
                </div>
              </div>
            </div>
            <div class="flex">
              <div
                class="w-full pl-2 py-1 border-t border-l border-r border-black font-semibold"
              >
                <div class="flex">
                  <div
                    class="text-sm h-2 border my-auto mr-4 ml-10 border-black p-1"
                  ></div>
                  <div>Plan D: Thesis/Dissertation Assistance</div>
                </div>

                <div class="ml-16">
                  <div class="flex">
                    <div
                      class="text-sm h-2 border my-auto mx-4 border-black p-1"
                    ></div>
                    <div class="w-2/12 font-normal">Thesis Title:</div>
                    <div class="w-10/12 text-sm text-center">
                      <div class="border-b border-black mr-3">2</div>
                    </div>
                  </div>
                  <div class="flex">
                    <div
                      class="text-sm h-2 border my-auto mx-4 border-black p-1"
                    ></div>
                    <div class="w-3/12 font-normal">Dissertation Title:</div>
                    <div class="w-10/12 text-sm text-center">
                      <div class="border-b border-black mr-3">2</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="flex">
              <div
                class="w-4/12 pl-2 py-1 border-t border-b border-l border-r border-black"
              >
                Have you been a recipient of<br />scholarship before?
              </div>
              <div
                class="w-8/12 pl-2 py-1 border-t border-b border-r border-black"
              >
                <div class="flex">
                  <div
                    class="text-sm h-2 border my-auto mx-4 border-black p-1"
                  ></div>
                  <div class="w-6/12 font-normal">Yes, Sponsoring Agency:</div>
                  <div class="w-11/12 text-sm text-center">
                    <div class="border-b border-black mr-3">2</div>
                  </div>
                </div>
                <div class="flex ml-10">
                  <div class="w-8/12 font-normal">
                    Period of Grant (MM/YYYY):
                  </div>
                  <div class="w-11/12 text-sm text-center">
                    <div class="border-b border-black mr-3">2</div>
                  </div>
                </div>
                <div class="flex">
                  <div
                    class="text-sm h-2 border my-auto mx-4 border-black p-1"
                  ></div>
                  <div class="w-3/12 font-normal">No:</div>
                  <div class="w-11/12 text-sm text-center">
                    <div class="border-b border-black mr-3">2</div>
                  </div>
                </div>
              </div>
            </div>
            <div class="border-b-2 border-black mt-3"></div>
            <div class="flex">
              <div class="w-4/12">
                <div class="text-sm italic text-left">CSU-F-HRM-92</div>
              </div>
              <div class="w-4/12">
                <div class="text-sm text-center italic">Rev.0</div>
              </div>
              <div class="w-4/12">
                <div class="text-sm text-right italic">
                  Effectivity Date: February 17, 2021
                </div>
              </div>
            </div>
          </div>
        </section></vue-html2pdf
      >
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
import VueHtml2pdf from "vue-html2pdf";
import jobs from "../../../Shared/Modals/jobs.json";

export default {
  metaInfo: { title: "Form 96" },
  layout: Layout,
  components: {
    LoadingButton,
    SelectInput,
    TextInput,
    TextareaInput,
    FileInput,
    VSelectize,
    VueHtml2pdf,
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
        // scholarship_inclusive_dates
        scholarship_start_inclusive_dates: this.scholar
          .scholarship_start_inclusive_dates,
        scholarship_end_inclusive_dates: this.scholar
          .scholarship_end_inclusive_dates,
        school_type: this.scholar.school_type,
        thesis_or_dissertation: this.scholar.thesis_or_dissertation,
        thesis_or_dissertation_name: this.scholar.thesis_or_dissertation_name,
        recipient_before: this.scholar.recipient_before,
        sponsoring_agency_before: this.scholar.sponsoring_agency_before,
        // period_of_grant
        start_period_of_grant: this.scholar.start_period_of_grant,
        end_period_of_grant: this.scholar.end_period_of_grant,
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
    printPdf() {
      console.log(true);
      this.$refs.html2Pdf.generatePdf();
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
