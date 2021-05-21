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
      <div class="flex">
        <button v-if="scholar.doc2 == null" class="btn-danger h-10 rounded-lg">
          <span class="font-semibold">No Document Uploaded</span>
        </button>
        <button
          v-else
          @click="printPdf()"
          class="btn-indigo h-10 rounded-lg transition duration-500 ease-in-out transform hover:-translate-y-1"
        >
          <span>🖨️ Print Form</span>
        </button>
      </div>
    </div>
    <div v-if="scholar.doc2 == null" class="btn-danger h-10 rounded-lg">
      <span class="font-semibold"
        >INFO: No document uploaded, please upload documentary requirements first to
        be able to print the form.</span
      >
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
                <div class="my-auto capitalize">
                  {{ scholar.contact.last_name }}
                  {{ scholar.contact.first_name }}
                  {{ scholar.contact.middle_name }}
                </div>
              </div>
            </div>
            <div class="flex">
              <div
                class="w-4/12 pl-2 py-1 border-t border-l border-r border-black"
              >
                Rank/Position:
              </div>
              <div class="w-8/12 pl-2 py-1 border-t border-r border-black">
                <div class="my-auto capitalize">
                  {{ scholar.contact.position }}
                </div>
              </div>
            </div>
            <div class="flex">
              <div
                class="w-4/12 pl-2 py-1 border-t border-l border-r border-black"
              >
                Department/College/Unit/Office:
              </div>
              <div class="w-8/12 pl-2 py-1 border-t border-r border-black">
                <div class="my-auto capitalize">
                  {{ scholar.office.office_name }}
                </div>
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
                <div class="my-auto capitalize">
                  {{ scholar.contact.permanent_block }}
                  {{ scholar.contact.permanent_street }}
                  {{ scholar.contact.permanent_village }}
                  {{ scholar.contact.permanent_barangay }}
                  {{ scholar.contact.permanent_city }}
                  {{ scholar.contact.permanent_province }}
                  {{ scholar.contact.permanent_zipcode }}
                </div>
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
                <div class="my-auto capitalize">
                  {{ scholar.contact.residential_block }}
                  {{ scholar.contact.residential_street }}
                  {{ scholar.contact.residential_village }}
                  {{ scholar.contact.residential_barangay }}
                  {{ scholar.contact.residential_city }}
                  {{ scholar.contact.residential_province }}
                  {{ scholar.contact.residential_zipcode }}
                </div>
              </div>
            </div>
            <div class="flex">
              <div
                class="w-4/12 pl-2 py-1 border-t border-l border-r border-black"
              >
                Email Address:
              </div>
              <div class="w-8/12 pl-2 py-1 border-t border-r border-black">
                <div class="my-auto">{{ scholar.contact.email }}</div>
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
                      {{ format(scholar.contact.birth_date) }}
                    </div>
                  </div>
                </div>
              </div>
              <div class="w-4/12 py-1 pl-2 border-t border-r border-black">
                Sex: <span class="italic text-sm">(Please tick/check)</span>
                <div class="flex">
                  <div class="w-1/2 text-sm text-center">
                    <div
                      v-if="scholar.contact.sex == 'Male'"
                      class="border-b border-black mx-2"
                    >
                      ✓
                    </div>
                    <div v-else class="border-b border-black mx-2">&nbsp;</div>
                  </div>
                  <div class="w-1/2">Male</div>
                  <div class="w-1/2 text-sm text-center">
                    <div
                      v-if="scholar.contact.sex == 'Female'"
                      class="border-b border-black mx-2"
                    >
                      ✓
                    </div>
                    <div v-else class="border-b border-black mx-2">&nbsp;</div>
                  </div>
                  <div class="w-1/2">Female</div>
                </div>
              </div>
              <div class="w-4/12 py-1 pl-2 border-t border-r border-black">
                Cellphone Number:
                <div class="w-4/4 text-center">
                  <div class="mx-2">{{ scholar.contact.phone }}</div>
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
                <div class="my-auto">
                  {{ scholar.contact.type_of_disability }}
                </div>
              </div>
            </div>
            <div class="flex">
              <div
                class="w-4/12 pl-2 py-1 border-t border-l border-r border-black"
              >
                Highest Educational Attainment:
              </div>
              <div class="w-8/12 pl-2 py-1 border-t border-r border-black">
                <div class="my-auto">
                  {{ scholar.contact.highest_educational_attainment }}
                </div>
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
                <div class="my-auto">
                  {{ scholar.contact.school_last_attended }}
                </div>
                <div class="my-auto">{{ scholar.contact.school_address }}</div>
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
                <div class="my-auto">{{ scholar.contact.degree_program }}</div>
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
                <div class="my-auto">
                  {{ scholar.contact.weighted_average }}
                </div>
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
                  <div v-if="scholar.scholarship_type == '1'">✓</div>
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
                    <div
                      v-if="scholar.scholarship_type == '1'"
                      class="border-b border-black mr-2"
                    >
                      {{ scholar.duration_number_of_months }}
                    </div>
                    <div v-else class="border-b border-black mr-2">&nbsp;</div>
                  </div>
                  <div class="w-2/4 italic text-sm">
                    Inclusive Dates: <span class="text-sm">(MM/YYYY)</span>
                  </div>
                  <div class="w-1/4 text-sm text-center">
                    <div
                      v-if="scholar.scholarship_type == '1'"
                      class="border-b border-black mr-2"
                    >
                      {{ scholar.scholarship_inclusive_dates }}
                    </div>
                    <div v-else class="border-b border-black mr-2">&nbsp;</div>
                  </div>
                </div>
              </div>
            </div>
            <div class="flex">
              <div
                class="w-4/12 pl-2 py-1 border-t border-l border-r border-black font-semibold"
              >
                <div class="flex">
                  <div v-if="scholar.scholarship_type == '2'">✓</div>
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
                    <div
                      v-if="scholar.scholarship_type == '2'"
                      class="border-b border-black mr-2"
                    >
                      {{ scholar.duration_number_of_months }}
                    </div>
                    <div v-else class="border-b border-black mr-2">&nbsp;</div>
                  </div>
                  <div class="w-2/4 italic text-sm">
                    Inclusive Dates: <span class="text-sm">(MM/YYYY)</span>
                  </div>
                  <div class="w-1/4 text-sm text-center">
                    <div
                      v-if="scholar.scholarship_type == '2'"
                      class="border-b border-black mr-2"
                    >
                      {{ scholar.scholarship_inclusive_dates }}
                    </div>
                    <div v-else class="border-b border-black mr-2">&nbsp;</div>
                  </div>
                </div>
                <div class="flex">
                  <div class="w-6/12 italic">
                    Sponsoring Institution/Agency:
                  </div>
                  <div class="w-8/12 text-center">
                    <div
                      v-if="scholar.scholarship_type == '2'"
                      class="border-b border-black mx-2"
                    >
                      {{ scholar.sponsoring_agency }}
                    </div>
                    <div v-else class="border-b border-black mr-2">&nbsp;</div>
                  </div>
                </div>
              </div>
            </div>
            <div class="flex">
              <div
                class="w-4/12 pl-2 py-1 border-t border-l border-r border-black font-semibold"
              >
                <div class="flex">
                  <div v-if="scholar.scholarship_type == '3'">✓</div>
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
                    <div
                      v-if="scholar.scholarship_type == '3'"
                      class="border-b border-black mr-2"
                    >
                      {{ scholar.duration_number_of_months }}
                    </div>
                    <div v-else class="border-b border-black mr-2">&nbsp;</div>
                  </div>
                  <div class="w-2/4 italic text-sm">
                    Inclusive Dates: <span class="text-sm">(MM/YYYY)</span>
                  </div>
                  <div class="w-1/4 text-sm text-center">
                    <div
                      v-if="scholar.scholarship_type == '3'"
                      class="border-b border-black mr-2"
                    >
                      {{ scholar.scholarship_inclusive_dates }}
                    </div>
                    <div v-else class="border-b border-black mr-2">&nbsp;</div>
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
                    class="p-1 my-auto"
                    v-if="scholar.scholarship_type == '4'"
                  >
                    ✓
                  </div>
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
                  <div class="p-1 my-auto" v-if="scholar.degree_type == '1'">
                    ✓
                  </div>
                  <div
                    class="text-sm h-2 border my-auto mx-4 border-black p-1"
                  ></div>
                  <div class="w-2/12">Masters:</div>
                  <div class="w-10/12 text-sm text-center">
                    <div
                      v-if="scholar.degree_type == '1'"
                      class="border-b border-black mr-2"
                    >
                      {{ scholar.degree_name }}
                    </div>
                    <div v-else class="border-b border-black mr-2">&nbsp;</div>
                  </div>
                </div>
                <div class="flex">
                  <div class="p-1 my-auto" v-if="scholar.degree_type == '2'">
                    ✓
                  </div>
                  <div
                    class="text-sm h-2 border my-auto mx-4 border-black p-1"
                  ></div>
                  <div class="w-2/12">Doctorate:</div>
                  <div class="w-10/12 text-sm text-center">
                    <div
                      v-if="scholar.degree_type == '2'"
                      class="border-b border-black mr-2"
                    >
                      {{ scholar.degree_name }}
                    </div>
                    <div v-else class="border-b border-black mr-2">&nbsp;</div>
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
                    class="p-1 my-auto"
                    v-if="
                      scholar.scholarship_type == '4' && scholar.plan == '1'
                    "
                  >
                    ✓
                  </div>
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
                  <div
                    v-if="
                      scholar.scholarship_type == '4' && scholar.plan == '1'
                    "
                    class="w-10/12 mr-3 border-b border-black text-center"
                  >
                    {{ scholar.grantee_agency }}
                  </div>
                  <div
                    v-else
                    class="w-10/12 mr-3 border-b border-black text-center"
                  >
                    &nbsp;
                  </div>
                </div>
                <div class="flex">
                  <div class="w-6/12 ml-16 font-normal italic">
                    School Intended to Enrol/Enrolled in:
                  </div>
                  <div
                    v-if="
                      scholar.scholarship_type == '4' && scholar.plan == '1'
                    "
                    class="w-10/12 mr-3 border-b border-black text-center"
                  >
                    {{ scholar.school_intended_to_enroll }}
                  </div>
                  <div
                    v-else
                    class="w-10/12 mr-3 border-b border-black text-center"
                  >
                    &nbsp;
                  </div>
                </div>
                <div class="flex">
                  <div class="w-3/12 ml-16 font-normal italic">
                    School Address:
                  </div>
                  <div
                    v-if="
                      scholar.scholarship_type == '4' && scholar.plan == '1'
                    "
                    class="w-full mr-3 border-b border-black text-center"
                  >
                    {{ scholar.school_address }}
                  </div>
                  <div
                    v-else
                    class="w-full mr-3 border-b border-black text-center"
                  >
                    &nbsp;
                  </div>
                </div>

                <div class="flex ml-16">
                  <div class="w-5/12 italic text-sm font-normal">
                    Duration: <span class="text-sm">(No. of Terms/Years)</span>
                  </div>
                  <div class="w-3/12 text-sm text-center">
                    <div
                      v-if="
                        scholar.scholarship_type == '4' && scholar.plan == '1'
                      "
                      class="border-b border-black mr-2"
                    >
                      {{ scholar.duration_number_of_years }}
                    </div>
                    <div v-else class="border-b border-black mr-2">&nbsp;</div>
                  </div>
                  <div class="w-4/12 italic text-sm font-normal">
                    Inclusive Dates: <span class="text-sm">(MM/YYYY)</span>
                  </div>
                  <div class="w-4/12 text-sm text-center">
                    <div
                      v-if="
                        scholar.scholarship_type == '4' && scholar.plan == '1'
                      "
                      class="border-b border-black mr-3"
                    >
                      {{ scholar.scholarship_inclusive_dates }}
                    </div>
                    <div v-else class="border-b border-black mr-3">&nbsp;</div>
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
                    class="p-1 my-auto"
                    v-if="
                      scholar.scholarship_type == '4' && scholar.plan == '2'
                    "
                  >
                    ✓
                  </div>
                  <div
                    class="text-sm h-2 border my-auto mr-4 ml-10 border-black p-1"
                  ></div>
                  <div>Plan B: College-Sponsored Scholarship</div>
                </div>
                <div class="flex">
                  <div class="w-6/12 ml-16 font-normal italic">
                    School Intended to Enrol/Enrolled in:
                  </div>
                  <div
                    v-if="
                      scholar.scholarship_type == '4' && scholar.plan == '2'
                    "
                    class="w-8/12 mr-3 border-b border-black text-center"
                  >
                    {{ scholar.school_intended_to_enroll }}
                  </div>
                  <div
                    v-else
                    class="w-8/12 mr-3 border-b border-black text-center"
                  >
                    &nbsp;
                  </div>
                </div>
                <div class="flex">
                  <div class="w-3/12 ml-16 font-normal italic">
                    School Address:
                  </div>
                  <div
                    v-if="
                      scholar.scholarship_type == '4' && scholar.plan == '2'
                    "
                    class="w-full mr-3 border-b border-black text-center"
                  >
                    {{ scholar.school_address }}
                  </div>
                  <div
                    v-else
                    class="w-full mr-3 border-b border-black text-center"
                  >
                    &nbsp;
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
                    <div
                      v-if="
                        scholar.scholarship_type == '4' &&
                        scholar.plan == '2' &&
                        scholar.school_type == '1'
                      "
                      class="border-b border-black mx-2"
                    >
                      ✓
                    </div>
                    <div v-else class="border-b border-black mx-2">&nbsp;</div>
                  </div>
                  <div class="w-2/4 font-normal italic">Public Institution</div>
                  <div class="w-1/4 text-sm text-center">
                    <div
                      v-if="
                        scholar.scholarship_type == '4' &&
                        scholar.plan == '2' &&
                        scholar.school_type == '2'
                      "
                      class="border-b border-black mx-2"
                    >
                      ✓
                    </div>
                    <div v-else class="border-b border-black mx-2">&nbsp;</div>
                  </div>
                  <div class="w-full font-normal italic">
                    CHED Recognized Private Institution
                  </div>
                </div>

                <div class="flex ml-16">
                  <div class="w-5/12 italic text-sm font-normal">
                    Duration: <span class="text-sm">(No. of Terms/Years)</span>
                  </div>
                  <div class="w-3/12 text-sm text-center">
                    <div
                      v-if="
                        scholar.scholarship_type == '4' && scholar.plan == '2'
                      "
                      class="border-b border-black mr-2"
                    >
                      {{ scholar.duration_number_of_years }}
                    </div>
                    <div v-else class="border-b border-black mr-2">&nbsp;</div>
                  </div>
                  <div class="w-4/12 italic text-sm font-normal">
                    Inclusive Dates: <span class="text-sm">(MM/YYYY)</span>
                  </div>
                  <div class="w-4/12 text-sm text-center">
                    <div
                      v-if="
                        scholar.scholarship_type == '4' && scholar.plan == '2'
                      "
                      class="border-b border-black mr-3"
                    >
                      {{ scholar.scholarship_inclusive_dates }}
                    </div>
                    <div v-else class="border-b border-black mr-3">&nbsp;</div>
                  </div>
                </div>
              </div>
            </div>

            <!-- PLAN C NA! -->
            <div class="flex">
              <div
                class="w-full pl-2 py-1 border-t border-l border-r border-black font-semibold"
              >
                <div class="flex">
                  <div
                    class="p-1 my-auto"
                    v-if="
                      scholar.scholarship_type == '4' && scholar.plan == '3'
                    "
                  >
                    ✓
                  </div>
                  <div
                    class="text-sm h-2 border my-auto mr-4 ml-10 border-black p-1"
                  ></div>
                  <div>Plan C: Study Leave</div>
                </div>

                <div class="flex ml-16">
                  <div class="w-5/12 italic text-sm font-normal">
                    Duration: <span class="text-sm">(No. of Terms/Years)</span>
                  </div>
                  <div class="w-3/12 text-sm text-center">
                    <div
                      v-if="
                        scholar.scholarship_type == '4' && scholar.plan == '3'
                      "
                      class="border-b border-black mr-2"
                    >
                      {{ scholar.duration_number_of_years }}
                    </div>
                    <div v-else class="border-b border-black mr-2">&nbsp;</div>
                  </div>
                  <div class="w-4/12 italic text-sm font-normal">
                    Inclusive Dates: <span class="text-sm">(MM/YYYY)</span>
                  </div>
                  <div class="w-4/12 text-sm text-center">
                    <div
                      v-if="
                        scholar.scholarship_type == '4' && scholar.plan == '3'
                      "
                      class="border-b border-black mr-3"
                    >
                      {{ scholar.scholarship_inclusive_dates }}
                    </div>
                    <div v-else class="border-b border-black mr-3">&nbsp;</div>
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
                    class="p-1 my-auto"
                    v-if="
                      scholar.scholarship_type == '4' && scholar.plan == '4'
                    "
                  >
                    ✓
                  </div>
                  <div
                    class="text-sm h-2 border my-auto mr-4 ml-10 border-black p-1"
                  ></div>
                  <div>Plan D: Thesis/Dissertation Assistance</div>
                </div>

                <div class="ml-16">
                  <div class="flex">
                    <div
                      class="p-1 my-auto"
                      v-if="
                        scholar.scholarship_type == '4' &&
                        scholar.plan == '4' &&
                        scholar.thesis_or_dissertation == '1'
                      "
                    >
                      ✓
                    </div>
                    <div
                      class="text-sm h-2 border my-auto mx-4 border-black p-1"
                    ></div>
                    <div class="w-2/12 font-normal">Thesis Title:</div>
                    <div class="w-10/12 text-sm text-center">
                      <div
                        v-if="
                          scholar.scholarship_type == '4' &&
                          scholar.plan == '4' &&
                          scholar.thesis_or_dissertation == '1'
                        "
                        class="border-b border-black mr-3"
                      >
                        {{ scholar.thesis_or_dissertation_name }}
                      </div>
                      <div v-else class="border-b border-black mr-3">
                        &nbsp;
                      </div>
                    </div>
                  </div>
                  <div class="flex">
                    <div
                      class="p-1 my-auto"
                      v-if="
                        scholar.scholarship_type == '4' &&
                        scholar.plan == '4' &&
                        scholar.thesis_or_dissertation == '2'
                      "
                    >
                      ✓
                    </div>
                    <div
                      class="text-sm h-2 border my-auto mx-4 border-black p-1"
                    ></div>
                    <div class="w-3/12 font-normal">Dissertation Title:</div>
                    <div class="w-10/12 text-sm text-center">
                      <div
                        v-if="
                          scholar.scholarship_type == '4' &&
                          scholar.plan == '4' &&
                          scholar.thesis_or_dissertation == '2'
                        "
                        class="border-b border-black mr-3"
                      >
                        {{ scholar.thesis_or_dissertation_name }}
                      </div>
                      <div v-else class="border-b border-black mr-3">
                        &nbsp;
                      </div>
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
                    class="p-1 my-auto"
                    v-if="scholar.recipient_before == 'Yes'"
                  >
                    ✓
                  </div>
                  <div
                    class="text-sm h-2 border my-auto mx-4 border-black p-1"
                  ></div>
                  <div class="w-6/12 font-normal">Yes, Sponsoring Agency:</div>
                  <div class="w-11/12 text-sm text-center">
                    <div
                      v-if="scholar.recipient_before == 'Yes'"
                      class="border-b border-black mr-3"
                    >
                      {{ scholar.sponsoring_agency_before }}
                    </div>
                    <div v-else class="border-b border-black mr-3">&nbsp;</div>
                  </div>
                </div>
                <div class="flex ml-10">
                  <div class="w-8/12 font-normal">
                    Period of Grant (MM/YYYY):
                  </div>
                  <div class="w-11/12 text-sm text-center">
                    <div
                      v-if="scholar.recipient_before == 'Yes'"
                      class="border-b border-black mr-3"
                    >
                      {{ scholar.period_of_grant }}
                    </div>
                    <div v-else class="border-b border-black mr-3">&nbsp;</div>
                  </div>
                </div>
                <div class="flex">
                  <div class="p-1" v-if="scholar.recipient_before == 'No'">
                    ✓
                  </div>
                  <div
                    class="text-sm h-2 border my-auto mx-4 border-black p-1"
                  ></div>
                  <div class="w-3/12 font-normal">No:</div>
                  <!-- <div class="w-11/12 text-sm text-center">
                    <div class="border-b border-black mr-3">2</div>
                  </div> -->
                </div>
              </div>
            </div>
            <div class="border-b-2 border-black mt-3"></div>
            <div class="flex pb-20">
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
        </section>
        <section
          slot="pdf-content"
          class="mt-16 bg-white font-sans mx-auto text-black"
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
          <div class="mt-4">
            <div class="flex">
              <div
                class="w-full pl-2 py-1 border-t border-l border-r border-black"
              >
                State briefly your reason/s in applying for staff development
                program:
                <span class="italic text-sm"
                  >(Is the need and priority attached to the area of
                  specialization?)</span
                >
              </div>
            </div>
            <div class="flex">
              <div
                class="w-full pl-2 py-1 border-t border-l border-r border-black"
              >
                <span class="uppercase font-semibold"
                  >Documentary Requirements:</span
                >
                <span class="italic text-sm"
                  >(Note: Fully accomplished Form with complete supporting
                  documents to be submmited not less than one (1) month prior to
                  target date of intake)</span
                >
              </div>
            </div>
            <div class="flex">
              <div
                class="w-full pl-2 py-1 border-t border-l border-r border-black"
              >
                <span class="font-semibold"
                  >Note to Immediate Supervisor: Please check if documents are
                  attached as required by the program applied for.</span
                >
              </div>
            </div>
            <div
              class="w-full pl-2 py-1 border-t border-l border-r border-black"
            >
              <div class="flex">
                <div
                  class="text-sm h-2 border my-auto mx-6 border-black p-1"
                ></div>
                <div class="w-full text-sm font-normal">
                  1. Fully accomplished Scholarship Application Form
                </div>
              </div>
              <div class="flex">
                <div
                  class="text-sm h-2 border my-auto mx-6 border-black p-1"
                ></div>
                <div class="w-full text-sm font-normal">
                  2. Certificate of Good Moral Character issued by HRM Services
                </div>
              </div>
              <div class="flex">
                <div
                  class="text-sm h-2 border my-auto mx-6 border-black p-1"
                ></div>
                <div class="w-full text-sm font-normal">
                  3. Certificate of No Pending Administrative Case issued by
                  Legal Services
                </div>
              </div>
              <div class="flex">
                <div
                  class="text-sm h-2 border my-auto mx-6 border-black p-1"
                ></div>
                <div class="w-full text-sm font-normal">
                  4. Certificate of I/OPCRF Rating (At least VS for 2 rating
                  periods preceding filing of application)
                </div>
              </div>
              <div class="flex">
                <div
                  class="text-sm h-2 border my-auto mx-6 border-black p-1"
                ></div>
                <div class="w-full text-sm font-normal">
                  5. Updated Service Record (Permanent appointment @ 3 yrs.
                  continuous service)
                </div>
              </div>
              <div class="flex">
                <div
                  class="text-sm h-2 border my-auto mx-6 border-black p-1"
                ></div>
                <div class="w-full text-sm font-normal">
                  6. Photocopy of PSA Birth Cerificate
                </div>
              </div>
              <div class="flex">
                <div
                  class="text-sm h-2 border my-auto mx-6 border-black p-1"
                ></div>
                <div class="w-full text-sm font-normal">
                  7. Certification as to scholastic standing of last educational
                  attainment (TOR)
                </div>
              </div>
              <div class="flex">
                <div
                  class="text-sm h-2 border my-auto mx-6 border-black p-1"
                ></div>
                <div class="w-full text-sm font-normal">
                  8. CSC Form 41: Medical Certificate (Certification as to
                  physical and mental health)
                </div>
              </div>
              <div class="flex">
                <div
                  class="text-sm h-2 border my-auto mx-6 border-black p-1"
                ></div>
                <div class="w-full text-sm font-normal">
                  9. Copy of Letter of Admission/Certificate of Enrolment
                </div>
              </div>
              <div class="flex">
                <div
                  class="text-sm h-2 border my-auto mx-6 border-black p-1"
                ></div>
                <div class="w-full text-sm font-normal">
                  10. Certification that the employee undergone Proposal Defense
                </div>
              </div>
              <div class="flex">
                <div
                  class="text-sm h-2 border my-auto mx-6 border-black p-1"
                ></div>
                <div class="w-full text-sm font-normal">
                  11. Copy of Approved Research Proposal
                </div>
              </div>
              <div class="flex">
                <div
                  class="text-sm h-2 border my-auto mx-6 border-black p-1"
                ></div>
                <div class="w-full text-sm font-normal">
                  12. Copy of Approved Program of Work
                </div>
              </div>
              <div class="flex">
                <div
                  class="text-sm h-2 border my-auto mx-6 border-black p-1"
                ></div>
                <div class="w-full text-sm font-normal">
                  13. Certification that the employee did not previously enjoy
                  scholarship grant from CatSU, issued by HRM Services
                </div>
              </div>
              <div class="flex">
                <div
                  class="text-sm h-2 border my-auto mx-6 border-black p-1"
                ></div>
                <div class="w-full text-sm font-normal">
                  14. Certification on Completion of Academic Requirements (CAR)
                </div>
              </div>
              <div class="flex">
                <div
                  class="text-sm h-2 border my-auto mx-6 border-black p-1"
                ></div>
                <div class="w-full text-sm font-normal">
                  15. Certification that the employee is done with Comprehensive
                  Exam
                </div>
              </div>
              <div class="flex">
                <div
                  class="text-sm h-2 border my-auto mx-6 border-black p-1"
                ></div>
                <div class="w-full text-sm font-normal">
                  16. Result/Report on Exam/Interview/Background Check by the
                  University Staff Development Committe, as deemed necessary
                </div>
              </div>
            </div>
            <div class="flex">
              <div
                class="w-8/12 pl-2 py-1 border-t font-semibold border-l text-center text-sm border-black"
              >
                Program
              </div>
              <div
                class="w-4/12 pl-2 py-1 border-t font-semibold border-l border-r text-center text-sm border-black"
              >
                Documentary Requirements
              </div>
            </div>
            <div class="flex">
              <div
                class="w-4/12 pl-2 py-1 border-t border-l text-sm border-black"
              >
                <div class="ml-4">
                  <ul class="list-disc">
                    <li>
                      Advanced Degree - Plan A: Outside Agency-Sponsored
                      Fellowship/Scholarship
                    </li>
                  </ul>
                </div>
              </div>
              <div
                class="w-4/12 pl-2 py-1 border-t border-l text-sm border-black"
              >
                <div class="ml-4">
                  <ul class="list-disc">
                    <li>2 yr (MA), 3 yr (PhD)</li>
                    <li>Subject to 1 academic year extension</li>
                  </ul>
                </div>
              </div>
              <div
                class="w-4/12 pl-2 py-1 border-t border-l border-r text-sm border-black"
              >
                <div class="ml-4">
                  <ul class="list-disc">
                    <li>Items Numbers 1-9</li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="flex">
              <div
                class="w-4/12 pl-2 py-1 border-t border-l text-sm border-black"
              >
                <div class="ml-4">
                  <ul class="list-disc">
                    <li>
                      Advanced Degree - Plan B: College Sponsored Scholarship
                    </li>
                  </ul>
                </div>
              </div>
              <div
                class="w-4/12 pl-2 py-1 border-t border-l text-sm border-black"
              >
                <div class="ml-4">
                  <ul class="list-disc">
                    <li>2 yr (MA), 3 yr (PhD)</li>
                    <li>Subject to 1 academic year extension</li>
                  </ul>
                </div>
              </div>
              <div
                class="w-4/12 pl-2 py-1 border-t border-l border-r text-sm border-black"
              >
                <div class="ml-4">
                  <ul class="list-disc">
                    <li>Items Numbers 1-9</li>
                    <li>
                      Not more than 45 years old for Masters, 50 year old for
                      Doctorate
                    </li>
                    <li>
                      GWA at least 2 for Masters, 1.5 for Doctorate; may be
                      waived when board licensed
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="flex">
              <div
                class="w-4/12 pl-2 py-1 border-t border-l text-sm border-black"
              >
                <div class="ml-4">
                  <ul class="list-disc">
                    <li>Advanced Degree - Plan C: Study Leave</li>
                  </ul>
                </div>
              </div>
              <div
                class="w-4/12 pl-2 py-1 border-t border-l text-sm border-black"
              >
                <div class="ml-4">
                  <ul class="list-disc">
                    <li>1 sem. - 2 yr @ CatSU</li>
                    <li>
                      Thesis/dissertation writing for 1 sem. - 1 yr (MA); 1 yr -
                      1/2 yr (PhD)
                    </li>
                  </ul>
                </div>
              </div>
              <div
                class="w-4/12 pl-2 py-1 border-t border-l border-r text-sm border-black"
              >
                <div class="ml-4">
                  <ul class="list-disc">
                    <li>Items Numbers 1-10</li>
                    <li>Items Numbers 11-12, if intention is to write</li>
                    <li>
                      Not more than 45 years old for Masters, 50 year old for
                      Doctorate
                    </li>
                  </ul>
                </div>
              </div>
            </div>

            <div class="flex">
              <div
                class="w-4/12 pl-2 py-1 border-t border-l text-sm border-black"
              >
                <div class="ml-4">
                  <ul class="list-disc">
                    <li>
                      Advanced Degree - Plan D: Thesis/Dissertation Assistance
                    </li>
                  </ul>
                </div>
              </div>
              <div
                class="w-4/12 pl-2 py-1 border-t border-l text-sm border-black"
              >
                <div class="ml-4">
                  <ul class="list-disc">
                    <li>Thesis/dissertation writing on his/her own</li>
                  </ul>
                </div>
              </div>
              <div
                class="w-4/12 pl-2 py-1 border-t border-l border-r text-sm border-black"
              >
                <div class="ml-4">
                  <ul class="list-disc">
                    <li>Items Numbers 1-6, 10-15</li>
                    <li>Not more than 55 years old</li>
                  </ul>
                </div>
              </div>
            </div>

            <div class="flex">
              <div
                class="w-4/12 pl-2 py-1 border-t border-l text-sm border-black"
              >
                <div class="ml-4">
                  <ul class="list-disc">
                    <li>Sabbatical Leave</li>
                  </ul>
                </div>
              </div>
              <div
                class="w-4/12 pl-2 py-1 border-t border-l text-sm border-black"
              >
                <div class="ml-4">
                  <ul class="list-disc">
                    <li>Leave with pay</li>
                    <li>A least a rank of Associate Prof. I</li>
                    <li>Study/research/travel program by CatSU</li>
                  </ul>
                </div>
              </div>
              <div
                class="w-4/12 pl-2 py-1 border-t border-l border-r text-sm border-black"
              >
                <div class="ml-4">
                  <ul class="list-disc">
                    <li>Items Numbers 1-6</li>
                    <li>VS I/O/D PCR Rating for 7 continuous years</li>
                    <li>At least 7 years in service</li>
                    <li>45-60 years old</li>
                  </ul>
                </div>
              </div>
            </div>

            <div class="flex">
              <div
                class="w-4/12 pl-2 py-1 border-t border-l text-sm border-black"
              >
                <div class="ml-4">
                  <ul class="list-disc">
                    <li>Training Grant Abroad</li>
                  </ul>
                </div>
              </div>
              <div
                class="w-4/12 pl-2 py-1 border-t border-l text-sm border-black"
              >
                <div class="ml-4">
                  <ul class="list-disc">
                    <li>Foreign org. sponsored</li>
                    <li>
                      Covers free airfare or land/sea travel expenses,
                      accomodation, other privileges
                    </li>
                    <li>Non-degree</li>
                    <li>Not to exceed 1 year</li>
                  </ul>
                </div>
              </div>
              <div
                class="w-4/12 pl-2 py-1 border-t border-l border-r text-sm border-black"
              >
                <div class="ml-4">
                  <ul class="list-disc">
                    <li>Items Numbers 1-9</li>
                    <li>At least 2 years in service</li>
                    <li>Not more than 55 years old</li>
                  </ul>
                </div>
              </div>
            </div>

            <div class="flex">
              <div
                class="w-4/12 pl-2 py-1 border-t border-l border-b text-sm border-black"
              >
                <div class="ml-4">
                  <ul class="list-disc">
                    <li>Local Training Grant</li>
                  </ul>
                </div>
              </div>
              <div
                class="w-4/12 pl-2 py-1 border-t border-l border-b text-sm border-black"
              >
                <div class="ml-4">
                  <ul class="list-disc">
                    <li>Non degree w/in PH</li>
                    <li>CatSU sponsored</li>
                    <li>Not to exceed 1 year</li>
                  </ul>
                </div>
              </div>
              <div
                class="w-4/12 pl-2 py-1 border-t border-l border-b border-r text-sm border-black"
              >
                <div class="ml-4"></div>
              </div>
            </div>
            <div class="flex mt-10">
              <div class="w-2/12"></div>
              <div class="w-5/12"></div>
              <div class="w-4/12 text-center uppercase font-semibold">
                {{ scholar.contact.first_name }}
                {{ scholar.contact.middle_name }}
                {{ scholar.contact.last_name }}
              </div>
              <div class="w-1/12"></div>
            </div>
            <div class="flex">
              <div class="w-2/12"></div>
              <div class="w-5/12"></div>
              <div class="w-4/12 border-t border-black text-center">
                (Complete Name & Signature)
              </div>
              <div class="w-1/12"></div>
            </div>
            <div class="flex mt-6">
              <div class="w-4/12 ml-6">Endorsed by:</div>
              <div class="w-4/12">Recommending Approval:</div>
              <div class="w-4/12">Approved:</div>
            </div>
            <div class="flex mt-6">
              <div
                v-if="scholar.user != null"
                class="w-4/12 mx-6 text-center uppercase font-semibold"
              >
                {{ scholar.user.first_name }} {{ scholar.user.last_name }}
              </div>
              <div
                v-else
                class="w-4/12 mx-6 text-center uppercase font-semibold"
              >
                &nbsp;
              </div>

              <div class="w-4/12 mx-6 text-center uppercase font-semibold">
                Juan Dela Cruz 1
              </div>
              <div class="w-4/12 mx-6 text-center uppercase font-semibold">
                Juan Dela Cruz 2
              </div>
            </div>
            <div class="flex">
              <div class="w-4/12 mx-6 border-t border-black text-center">
                Name & Signature of the Immediate Head
              </div>
              <div class="w-4/12 mx-6 border-t border-black text-center">
                Name & Signature of the Vice President
              </div>
              <div class="w-4/12 mx-6 border-t border-black text-center">
                Name & Signature of the SUC President
              </div>
            </div>
            <div class="flex mt-10">
              <div class="w-1/12 ml-6">Cc:</div>
              <div class="w-5/12">
                Chairperson, Staff Development Committee Members, Staff
                Development Committee AO-V, HRMS
              </div>
            </div>
            <div class="border-b-2 border-black mt-3"></div>
            <div class="flex pb-20">
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
        </section>
      </vue-html2pdf>
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
import FirstPage from "./FirstPage.vue";

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
    FirstPage,
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
    formatDate(value) {
      if (value) {
        return moment(String(value)).format("MM/YYYY");
      }
    },
  },
};
</script>

<style>
ul {
  list-style-type: disc;
}
</style>