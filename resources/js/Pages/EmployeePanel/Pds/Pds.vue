<template>
  <div>
    <div class="flex justify-between">
      <h1 class="mb-8 font-bold text-3xl">
        <inertia-link
          class="text-indigo-400 hover:text-indigo-600"
          :href="route('employee.profile', employee.id)"
          >Form</inertia-link
        >
        <span class="text-indigo-400 font-medium">/</span> PDS
      </h1>
      <div class="flex">
        <button
          @click="printPdf()"
          class="btn-indigo h-10 rounded-lg transition duration-500 ease-in-out transform hover:-translate-y-1"
        >
          <span>🖨️ Print Form</span>
        </button>
      </div>
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
        <!-- Page 1 -->

        <section
          slot="pdf-content"
          class="mt-2 bg-white font-sans mx-auto text-black"
          style="width: 800px; height: 1280px"
        >
          <div class="flex mt-6">
            <div class="my-auto">
              <div class="text-sm italic mt-1 font-semibold">
                CS Form No. 212
              </div>
              <div class="text-xs italic my-1">Revised 2017</div>
            </div>
          </div>
          <div class="mx-auto text-center font-extrabold text-2xl">
            PERSONAL DATA SHEET
          </div>
          <div class="italic text-xs font-semibold text-justify mt-3">
            WARNING: Any misrepresentation made in the Personal Data Sheet and
            the Work Experience Sheet shall cause the filing of
            administrative/criminal case/s against the person concerned.
          </div>
          <div class="italic text-xs font-semibold text-justify">
            READ THE ATTACHED GUIDE TO FILLING OUT THE PERSONAL DATA SHEET (PDS)
            BEFORE ACCOMPLISHING THE PDS FORM.
          </div>
          <div class="flex mt-1">
            <div class="w-8/12 text-xxs">
              Print legibly. Tick appropriate boxes ( ) and use separate sheet
              if necessary. Indicate N/A if not applicable. DO NOT ABBREVIATE.
            </div>
            <div
              class="w-1/12 pl-2 bg-gray-500 border-t border-l text-xxs border-r border-black"
            >
              1. CS ID No.
            </div>
            <div
              class="w-3/12 pl-2 text-right border-t text-xxs border-r border-black"
            >
              (Do not fill up. For CSC use only)
            </div>
          </div>
          <div class="flex">
            <div
              class="w-full border-t-2 border-l border-r border-black font-semibold italic text-base bg-gray-500"
            >
              I. PERSONAL INFORMATION
            </div>
          </div>
          <div class="flex">
            <div
              class="w-2/12 bg-gray-300 text-xs pl-2 py-1 border-t-2 border-l border-r border-black"
            >
              2. SURNAME
            </div>
            <div
              class="w-10/12 text-xs py-1 pl-1 border-t-2 border-r border-black"
            >
              <div class="my-auto capitalize">{{ employee.last_name }}</div>
            </div>
          </div>
          <div class="flex">
            <div
              class="w-2/12 bg-gray-300 text-xs pl-2 py-1 border-t border-l border-r border-black"
            >
              &nbsp;&nbsp;&nbsp;FIRST NAME
            </div>
            <div
              class="w-7/12 text-xs py-1 pl-1 border-t border-r border-black"
            >
              <div class="my-auto capitalize">{{ employee.first_name }}</div>
            </div>
            <div
              class="w-3/12 bg-gray-300 text-xs py-1 pl-1 border-t border-r border-black"
            >
              <div class="flex-row">
                <div>NAME EXTENSION (JR., SR)</div>
                <div class="my-auto capitalize">
                  {{ employee.name_extension }}
                </div>
              </div>
            </div>
          </div>
          <div class="flex">
            <div
              class="w-2/12 bg-gray-300 text-xs pl-2 py-1 border-t border-l border-r border-black"
            >
              &nbsp;&nbsp;&nbsp;MIDDLE NAME
            </div>
            <div
              class="w-10/12 text-xs py-1 pl-1 border-t border-r border-black"
            >
              <div class="my-auto capitalize">{{ employee.middle_name }}</div>
            </div>
          </div>
          <div class="flex">
            <div
              class="w-2/12 bg-gray-300 text-xs pl-2 py-1 border-t border-l border-r border-black"
            >
              <div class="flex-row mb-3">
                <div>3. DATE OF BIRTH</div>
                <div>&nbsp;&nbsp;&nbsp;(mm/dd/yyy)</div>
              </div>
            </div>
            <div
              class="w-3/12 text-xs py-1 pl-1 border-t border-r border-black"
            >
              <div class="my-auto capitalize">
                {{ formatDate(employee.birth_date) }}
              </div>
            </div>
            <div
              class="w-3/12 bg-gray-300 text-xs pl-2 py-1 border-t border-r border-black"
            >
              16. CITIZENSHIP
            </div>
            <div
              class="w-4/12 text-xs pl-2 py-1 border-t border-r border-black"
            >
              <div class="flex-row">
                <div class="flex">
                  <div
                    v-if="employee.citizenship == 'Filipino'"
                    class="text-sm h-2 border bg-black my-auto mx-2 border-black p-1"
                  ></div>
                  <div
                    v-else
                    class="text-sm h-2 border my-auto mx-2 border-black p-1"
                  ></div>
                  <div>
                    <span class="text-xs">Filipino</span>
                  </div>
                  <div
                    v-if="employee.citizenship != 'Filipino'"
                    class="text-sm h-2 border bg-black my-auto mx-2 border-black p-1"
                  ></div>
                  <div
                    v-else
                    class="text-sm h-2 border my-auto mx-2 border-black p-1"
                  ></div>
                  <div>
                    <span class="text-xs">Dual Citizenship</span>
                  </div>
                </div>
                <div class="flex float-right mt-2">
                  <div
                    class="text-sm h-2 border my-auto mx-2 border-black p-1"
                  ></div>
                  <div>
                    <span class="text-xs">by birth</span>
                  </div>
                  <div
                    class="text-sm h-2 border my-auto mx-2 border-black p-1"
                  ></div>
                  <div>
                    <span class="text-xs">by naturalization</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="flex">
            <div
              class="w-2/12 bg-gray-300 text-xs pl-2 py-1 border-t border-l border-r border-black"
            >
              <div class="flex-row">
                <div>4. PLACE OF BIRTH</div>
              </div>
            </div>
            <div
              class="w-3/12 text-xs py-1 pl-1 border-t border-r border-black"
            >
              <div class="my-auto capitalize">{{ employee.birth_place }}</div>
            </div>
            <div
              class="w-3/12 bg-gray-300 text-xs pl-2 py-1 border-r text-center border-black"
            >
              If holder of dual citizenship,
            </div>
            <div class="w-4/12 text-xs pl-2 py-1 border-r border-black">
              <div class="flex">
                <div class="text-xs text-center mx-auto">
                  Pls. indicate country:
                </div>
              </div>
            </div>
          </div>
          <div class="flex">
            <div
              class="w-2/12 bg-gray-300 text-xs pl-2 py-1 border-t border-l border-r border-black"
            >
              <div class="flex-row">
                <div>5. SEX</div>
              </div>
            </div>
            <div
              class="w-3/12 text-xs py-1 pl-1 border-t border-r border-black"
            >
              <div class="flex justify-between">
                <div class="flex mx-3">
                  <div
                    v-if="employee.sex == 'Male'"
                    class="text-sm h-2 border bg-black my-auto mx-2 border-black p-1"
                  ></div>
                  <div
                    v-else
                    class="text-sm h-2 border my-auto mx-2 border-black p-1"
                  ></div>
                  <div>
                    <span class="text-xs">Male</span>
                  </div>
                </div>
                <div class="flex mr-6">
                  <div
                    v-if="employee.sex == 'Female'"
                    class="text-sm h-2 border bg-black my-auto ml-2 mr-3 border-black p-1"
                  ></div>
                  <div
                    v-else
                    class="text-sm h-2 border my-auto mx-2 border-black p-1"
                  ></div>
                  <div>
                    <span class="text-xs">Female</span>
                  </div>
                </div>
              </div>
            </div>
            <div
              class="w-3/12 bg-gray-300 text-xs pl-2 py-1 border-r text-center border-black"
            >
              please indicate the details.
            </div>
            <div
              class="w-4/12 text-xs pl-2 py-1 border-r border-t border-black"
            >
              <div class="flex">
                <div class="text-xs">&nbsp;</div>
              </div>
            </div>
          </div>
          <div class="flex">
            <div
              class="w-2/12 bg-gray-300 text-xs pl-2 py-1 border-t border-l border-r border-black"
            >
              <div class="flex-row">
                <div>6. CIVIL STATUS</div>
              </div>
            </div>
            <div
              class="w-3/12 text-xs py-1 pl-1 border-t border-r border-black"
            >
              <div class="flex justify-between">
                <div class="flex mx-3">
                  <div
                    v-if="employee.civil_status == 'Single'"
                    class="text-sm h-2 border bg-black my-auto mx-2 border-black p-1"
                  ></div>
                  <div
                    v-else
                    class="text-sm h-2 border my-auto mx-2 border-black p-1"
                  ></div>
                  <div>
                    <span class="text-xs">Single</span>
                  </div>
                </div>
                <div class="flex mr-6">
                  <div
                    v-if="employee.civil_status == 'Married'"
                    class="text-sm h-2 border bg-black my-auto mx-2 border-black p-1"
                  ></div>
                  <div
                    v-else
                    class="text-sm h-2 border my-auto mx-2 border-black p-1"
                  ></div>
                  <div>
                    <span class="text-xs">Married</span>
                  </div>
                </div>
              </div>
              <div class="flex justify-between">
                <div class="flex mx-3">
                  <div
                    v-if="employee.civil_status == 'Widowed'"
                    class="text-sm h-2 border bg-black my-auto mx-2 border-black p-1"
                  ></div>
                  <div
                    v-else
                    class="text-sm h-2 border my-auto mx-2 border-black p-1"
                  ></div>
                  <div>
                    <span class="text-xs">Widowed</span>
                  </div>
                </div>
                <div class="flex mr-3">
                  <div
                    v-if="employee.civil_status == 'Separated'"
                    class="text-sm h-2 border bg-black my-auto mx-2 border-black p-1"
                  ></div>
                  <div
                    v-else
                    class="text-sm h-2 border my-auto mx-2 border-black p-1"
                  ></div>
                  <div>
                    <span class="text-xs">Separated</span>
                  </div>
                </div>
              </div>
              <div class="flex justify-between">
                <div class="flex mx-3">
                  <div
                    v-if="employee.civil_status == 'Divorced'"
                    class="text-sm h-2 border bg-black my-auto mx-2 border-black p-1"
                  ></div>
                  <div
                    v-else
                    class="text-sm h-2 border my-auto mx-2 border-black p-1"
                  ></div>
                  <div>
                    <span class="text-xs">Other/s: </span
                    ><span
                      v-if="employee.civil_status == 'Divorced'"
                      class="font-semibold"
                      >{{ employee.civil_status }}</span
                    >
                  </div>
                </div>
              </div>
            </div>
            <div
              class="w-2/12 bg-gray-300 text-xs pl-2 py-1 border-r border-t border-black"
            >
              <div class="flex-row">
                <div>17. RESIDENTIAL ADDRESS</div>
              </div>
            </div>
            <div class="w-5/12 text-xs pt-1 border-t border-r border-black">
              <div class="flex-row">
                <div class="flex justify-evenly">
                  <div class="my-auto capitalize">
                    {{ employee.residential_block }}
                  </div>
                  <div class="my-auto capitalize">
                    {{ employee.residential_street }}
                  </div>
                </div>
                <div class="border-gray-500 border-t"></div>
                <div class="flex justify-evenly">
                  <div class="my-auto capitalize">House/Block/Lot No.</div>
                  <div class="my-auto capitalize">Street</div>
                </div>
              </div>
              <div class="flex-row border-black border-t">
                <div class="flex justify-evenly">
                  <div class="my-auto capitalize">
                    {{ employee.residential_village }}
                  </div>
                  <div class="my-auto capitalize">
                    {{ employee.residential_barangay }}
                  </div>
                </div>
                <div class="border-gray-500 border-t"></div>
                <div class="flex justify-evenly">
                  <div class="my-auto capitalize">Subdivision/Village</div>
                  <div class="my-auto capitalize">Barangay</div>
                </div>
              </div>
            </div>
          </div>
          <div class="flex">
            <div
              class="w-2/12 bg-gray-300 text-xs pl-2 py-1 border-t border-l border-r border-black"
            >
              <div class="flex-row">
                <div>7. HEIGHT (m)</div>
              </div>
            </div>
            <div
              class="w-3/12 text-xs py-1 pl-1 border-t border-r border-black"
            >
              <div class="flex-row">
                <div>{{ employee.height }}</div>
              </div>
            </div>
            <div
              class="w-2/12 bg-gray-300 text-xs pl-2 py-1 border-r border-black"
            ></div>
            <div class="w-5/12 text-xs pt-1 border-t border-r border-black">
              <div class="flex-row">
                <div class="flex justify-evenly">
                  <div class="my-auto capitalize">
                    {{ employee.residential_city }}
                  </div>
                  <div class="my-auto capitalize">
                    {{ employee.residential_province }}
                  </div>
                </div>
                <div class="border-gray-500 border-t"></div>
                <div class="flex justify-evenly">
                  <div class="my-auto capitalize">City/Municipality</div>
                  <div class="my-auto capitalize">Province</div>
                </div>
              </div>
            </div>
          </div>
          <div class="flex">
            <div
              class="w-2/12 bg-gray-300 text-xs pl-2 py-1 border-t border-l border-r border-black"
            >
              <div class="flex-row">
                <div>8. WEIGHT (kg)</div>
              </div>
            </div>
            <div
              class="w-3/12 text-xs py-1 pl-1 border-t border-r border-black"
            >
              <div class="flex-row">
                <div>{{ employee.weight }}</div>
              </div>
            </div>
            <div
              class="w-2/12 bg-gray-300 text-xs pl-2 py-1 border-r border-black"
            >
              <div class="flex-row mx-auto text-center">
                <div>ZIP CODE</div>
              </div>
            </div>
            <div class="w-5/12 text-xs pt-1 border-t border-r border-black">
              <div class="flex-row text-center">
                <div>{{ employee.residential_zipcode }}</div>
              </div>
            </div>
          </div>
          <div class="flex">
            <div
              class="w-2/12 bg-gray-300 text-xs pl-2 py-1 border-t border-l border-r border-black"
            >
              <div class="flex-row">
                <div>9. BLOOD TYPE</div>
              </div>
            </div>
            <div
              class="w-3/12 text-xs py-1 pl-1 border-t border-r border-black"
            >
              <div class="flex-row">
                <div>{{ employee.blood_type }}</div>
              </div>
            </div>
            <div
              class="w-2/12 bg-gray-300 text-xs pl-2 py-1 border-r border-t border-black"
            >
              <div class="flex-row">
                <div>18. PERMANENT ADDRESS</div>
              </div>
            </div>
            <div class="w-5/12 text-xs pt-1 border-t border-r border-black">
              <div class="flex-row">
                <div class="flex justify-evenly">
                  <div class="my-auto capitalize">
                    {{ employee.permanent_block }}
                  </div>
                  <div class="my-auto capitalize">
                    {{ employee.permanent_street }}
                  </div>
                </div>
                <div class="border-gray-500 border-t"></div>
                <div class="flex justify-evenly">
                  <div class="my-auto capitalize">House/Block/Lot No.</div>
                  <div class="my-auto capitalize">Street</div>
                </div>
              </div>
            </div>
          </div>
          <div class="flex">
            <div
              class="w-2/12 bg-gray-300 text-xs pl-2 py-1 border-t border-l border-r border-black"
            >
              <div class="flex-row">
                <div>10. GSIS ID NO.</div>
              </div>
            </div>
            <div
              class="w-3/12 text-xs py-1 pl-1 border-t border-r border-black"
            >
              <div class="flex-row">
                <div v-if="employee.gsis_id != null">
                  {{ employee.gsis_id }}
                </div>
                <div v-else>N/A</div>
              </div>
            </div>
            <div
              class="w-2/12 bg-gray-300 text-xs pl-2 py-1 border-r border-black"
            ></div>
            <div class="w-5/12 text-xs border-r border-black">
              <div class="flex-row border-black border-t">
                <div class="flex justify-evenly">
                  <div class="my-auto capitalize">
                    {{ employee.permanent_village }}
                  </div>
                  <div class="my-auto capitalize">
                    {{ employee.permanent_barangay }}
                  </div>
                </div>
                <div class="border-gray-500 border-t"></div>
                <div class="flex justify-evenly">
                  <div class="my-auto capitalize">Subdivision/Village</div>
                  <div class="my-auto capitalize">Barangay</div>
                </div>
              </div>
            </div>
          </div>
          <div class="flex">
            <div
              class="w-2/12 bg-gray-300 text-xs pl-2 py-1 border-t border-l border-r border-black"
            >
              <div class="flex-row">
                <div>11. PAG-IBIG ID NO.</div>
              </div>
            </div>
            <div
              class="w-3/12 text-xs py-1 pl-1 border-t border-r border-black"
            >
              <div class="flex-row">
                <div v-if="employee.pagibig_id != null">
                  {{ employee.pagibig_id }}
                </div>
                <div v-else>N/A</div>
              </div>
            </div>
            <div
              class="w-2/12 bg-gray-300 text-xs pl-2 py-1 border-r border-black"
            ></div>
            <div class="w-5/12 text-xs pt-1 border-t border-r border-black">
              <div class="flex-row">
                <div class="flex justify-evenly">
                  <div class="my-auto capitalize">
                    {{ employee.permanent_city }}
                  </div>
                  <div class="my-auto capitalize">
                    {{ employee.permanent_province }}
                  </div>
                </div>
                <div class="border-gray-500 border-t"></div>
                <div class="flex justify-evenly">
                  <div class="my-auto capitalize">City/Municipality</div>
                  <div class="my-auto capitalize">Province</div>
                </div>
              </div>
            </div>
          </div>
          <div class="flex">
            <div
              class="w-2/12 bg-gray-300 text-xs pl-2 py-1 border-t border-l border-r border-black"
            >
              <div class="flex-row">
                <div>12. PHILHEALTH NO.</div>
              </div>
            </div>
            <div
              class="w-3/12 text-xs py-1 pl-1 border-t border-r border-black"
            >
              <div class="flex-row">
                <div v-if="employee.philhealth_id != null">
                  {{ employee.philhealth_id }}
                </div>
                <div v-else>N/A</div>
              </div>
            </div>
            <div
              class="w-2/12 bg-gray-300 text-xs pl-2 py-1 border-r border-black"
            >
              <div class="flex-row mx-auto text-center">
                <div>ZIP CODE</div>
              </div>
            </div>
            <div class="w-5/12 text-xs pt-1 border-t border-r border-black">
              <div class="flex-row text-center">
                <div>{{ employee.permanent_zipcode }}</div>
              </div>
            </div>
          </div>
          <div class="flex">
            <div
              class="w-2/12 bg-gray-300 text-xs pl-2 py-1 border-t border-l border-r border-black"
            >
              <div class="flex-row">
                <div>13. SSS NO.</div>
              </div>
            </div>
            <div
              class="w-3/12 text-xs py-1 pl-1 border-t border-r border-black"
            >
              <div class="flex-row">
                <div v-if="employee.sss_id != null">
                  {{ employee.sss_id }}
                </div>
                <div v-else>N/A</div>
              </div>
            </div>
            <div
              class="w-2/12 bg-gray-300 text-xs pl-2 border-t py-1 border-r border-black"
            >
              <div class="flex-row">
                <div>19. TELEPHONE NO.</div>
              </div>
            </div>
            <div class="w-5/12 text-xs pt-1 border-t border-r border-black">
              <div class="flex-row ml-2">
                <div v-if="employee.telephone != null">
                  {{ employee.telephone }}
                </div>
                <div v-else>N/A</div>
              </div>
            </div>
          </div>
          <div class="flex">
            <div
              class="w-2/12 bg-gray-300 text-xs pl-2 py-1 border-t border-l border-r border-black"
            >
              <div class="flex-row">
                <div>14. TIN NO.</div>
              </div>
            </div>
            <div
              class="w-3/12 text-xs py-1 pl-1 border-t border-r border-black"
            >
              <div class="flex-row">
                <div v-if="employee.tin_id != null">
                  {{ employee.tin_id }}
                </div>
                <div v-else>N/A</div>
              </div>
            </div>
            <div
              class="w-2/12 bg-gray-300 text-xs pl-2 border-t py-1 border-r border-black"
            >
              <div class="flex-row">
                <div>20. MOBILE NO.</div>
              </div>
            </div>
            <div class="w-5/12 text-xs pt-1 border-t border-r border-black">
              <div class="flex-row ml-2">
                <div>{{ employee.phone }}</div>
              </div>
            </div>
          </div>
          <div class="flex">
            <div
              class="w-2/12 bg-gray-300 text-xs pl-2 py-1 border-t border-l border-r border-black"
            >
              <div class="flex-row">
                <div>15. AGENCY EMPLOYEE NO.</div>
              </div>
            </div>
            <div
              class="w-3/12 text-xs py-1 pl-1 border-t border-r border-black"
            >
              <div class="flex-row">
                <div v-if="employee.agency_employee_id != null">
                  {{ employee.agency_employee_id }}
                </div>
                <div v-else>N/A</div>
              </div>
            </div>
            <div
              class="w-2/12 bg-gray-300 text-xs pl-2 border-t py-1 border-r border-black"
            >
              <div class="flex-row">
                <div>21. E-MAIL ADDRESS (if any)</div>
              </div>
            </div>
            <div class="w-5/12 text-xs pt-1 border-t border-r border-black">
              <div class="flex-row ml-2">
                <div>{{ employee.email }}</div>
              </div>
            </div>
          </div>
          <div class="flex">
            <div
              class="w-full border-t-2 border-l border-r border-black font-semibold italic text-base bg-gray-500"
            >
              II. FAMILY BACKGROUND
            </div>
          </div>
          <div class="flex">
            <div
              class="w-2/12 bg-gray-300 text-xs pl-2 py-1 border-t-2 border-l border-r border-black"
            >
              22. SPOUSE'S SURNAME
            </div>
            <div
              class="w-5/12 text-xs py-1 pl-1 border-t-2 border-r border-black"
            >
              <div class="my-auto capitalize">
                {{ family.parents.spouse_last_name }}
              </div>
            </div>
            <div
              class="w-3/12 text-xs py-1 bg-gray-300 pl-1 border-t-2 border-r border-black"
            >
              <div class="my-auto">
                23. NAME of CHILDREN (Write full name and list all)
              </div>
            </div>
            <div
              class="w-2/12 text-xs py-1 pl-1 bg-gray-300 border-t-2 border-r border-black"
            >
              <div class="my-auto text-center">DATE OF BIRTH (mm/dd/yyyy)</div>
            </div>
          </div>
          <div class="flex">
            <div
              class="w-2/12 bg-gray-300 text-xs pl-2 py-1 border-l border-r border-black"
            >
              &nbsp;&nbsp;&nbsp;FIRST NAME
            </div>
            <div
              class="w-3/12 text-xs py-1 pl-1 border-t border-r border-black"
            >
              <div class="my-auto capitalize">
                {{ family.parents.spouse_first_name }}
              </div>
            </div>
            <div
              class="w-2/12 bg-gray-300 text-xs py-1 pl-1 border-t border-r border-black"
            >
              <div class="flex-row">
                <div class="text-xxs">NAME EXTENSION (JR., SR)</div>
                <div
                  class="my-auto capitalize"
                  v-if="family.parents.spouse_name_extension != null"
                >
                  {{ family.parents.spouse_name_extension }}
                </div>
                <div class="my-auto capitalize" v-else>&nbsp;</div>
              </div>
            </div>
            <div
              class="w-3/12 text-xs py-1 pl-1 border-t border-r border-black"
            >
              <div class="my-auto" v-if="family.children[0] != null">
                {{ family.children[0].children_name }}
              </div>
              <div class="my-auto" v-else>N/A</div>
            </div>
            <div
              class="w-2/12 text-xs py-1 pl-1 border-t border-r border-black"
            >
              <div
                class="my-auto text-center"
                v-if="family.children[0] != null"
              >
                {{ formatDate(family.children[0].children_birth_date) }}
              </div>
              <div class="my-auto text-center" v-else>N/A</div>
            </div>
          </div>
          <div class="flex">
            <div
              class="w-2/12 bg-gray-300 text-xs pl-2 py-1 border-l border-r border-black"
            >
              &nbsp;&nbsp;&nbsp;MIDDLE NAME
            </div>
            <div
              class="w-5/12 text-xs py-1 pl-1 border-t border-r border-black"
            >
              <div class="my-auto capitalize">
                {{ family.parents.spouse_middle_name }}
              </div>
            </div>
            <div
              class="w-3/12 text-xs py-1 pl-1 border-t border-r border-black"
            >
              <div class="my-auto" v-if="family.children[1] != null">
                {{ family.children[1].children_name }}
              </div>
              <div class="my-auto" v-else>N/A</div>
            </div>
            <div
              class="w-2/12 text-xs py-1 pl-1 border-t border-r border-black"
            >
              <div
                class="my-auto text-center"
                v-if="family.children[1] != null"
              >
                {{ formatDate(family.children[1].children_birth_date) }}
              </div>
              <div class="my-auto text-center" v-else>N/A</div>
            </div>
          </div>
          <div class="flex">
            <div
              class="w-2/12 bg-gray-300 text-xs pl-2 py-1 border-t border-l border-r border-black"
            >
              &nbsp;&nbsp;&nbsp;OCCUPATION
            </div>
            <div
              class="w-5/12 text-xs py-1 pl-1 border-t border-r border-black"
            >
              <div
                class="my-auto capitalize"
                v-if="family.parents.spouse_occupation != null"
              >
                {{ family.parents.spouse_occupation }}
              </div>
              <div class="my-auto capitalize" v-else>N/A</div>
            </div>
            <div
              class="w-3/12 text-xs py-1 pl-1 border-t border-r border-black"
            >
              <div class="my-auto" v-if="family.children[2] != null">
                {{ family.children[2].children_name }}
              </div>
              <div class="my-auto" v-else>N/A</div>
            </div>
            <div
              class="w-2/12 text-xs py-1 pl-1 border-t border-r border-black"
            >
              <div
                class="my-auto text-center"
                v-if="family.children[2] != null"
              >
                {{ formatDate(family.children[2].children_birth_date) }}
              </div>
              <div class="my-auto text-center" v-else>N/A</div>
            </div>
          </div>
          <div class="flex">
            <div
              class="w-2/12 bg-gray-300 text-xs px-2 py-1 border-t border-l border-r border-black"
            >
              &nbsp;&nbsp;&nbsp;EMPLOYER/BUSINESS NAME
            </div>
            <div
              class="w-5/12 text-xs py-1 pl-1 border-t border-r border-black"
            >
              <div
                class="my-auto capitalize"
                v-if="family.parents.spouse_business_name != null"
              >
                {{ family.parents.spouse_business_name }}
              </div>
              <div class="my-auto capitalize" v-else>N/A</div>
            </div>
            <div
              class="w-3/12 text-xs py-1 pl-1 border-t border-r border-black"
            >
              <div class="my-auto" v-if="family.children[3] != null">
                {{ family.children[3].children_name }}
              </div>
              <div class="my-auto" v-else>N/A</div>
            </div>
            <div
              class="w-2/12 text-xs py-1 pl-1 border-t border-r border-black"
            >
              <div
                class="my-auto text-center"
                v-if="family.children[3] != null"
              >
                {{ formatDate(family.children[3].children_birth_date) }}
              </div>
              <div class="my-auto text-center" v-else>N/A</div>
            </div>
          </div>
          <div class="flex">
            <div
              class="w-2/12 bg-gray-300 text-xs pl-2 py-1 border-t border-l border-r border-black"
            >
              &nbsp;&nbsp;&nbsp;BUSINESS ADDRESS
            </div>
            <div
              class="w-5/12 text-xs py-1 pl-1 border-t border-r border-black"
            >
              <div
                class="my-auto capitalize"
                v-if="family.parents.spouse_business_address != null"
              >
                {{ family.parents.spouse_business_address }}
              </div>
              <div class="my-auto capitalize" v-else>N/A</div>
            </div>
            <div
              class="w-3/12 text-xs py-1 pl-1 border-t border-r border-black"
            >
              <div class="my-auto" v-if="family.children[4] != null">
                {{ family.children[4].children_name }}
              </div>
              <div class="my-auto" v-else>N/A</div>
            </div>
            <div
              class="w-2/12 text-xs py-1 pl-1 border-t border-r border-black"
            >
              <div
                class="my-auto text-center"
                v-if="family.children[4] != null"
              >
                {{ formatDate(family.children[4].children_birth_date) }}
              </div>
              <div class="my-auto text-center" v-else>N/A</div>
            </div>
          </div>
          <div class="flex">
            <div
              class="w-2/12 bg-gray-300 text-xs pl-2 py-1 border-t border-l border-r border-black"
            >
              &nbsp;&nbsp;&nbsp;TELEPHONE NO.
            </div>
            <div
              class="w-5/12 text-xs py-1 pl-1 border-t border-r border-black"
            >
              <div
                class="my-auto capitalize"
                v-if="family.parents.spouse_telephone != null"
              >
                {{ family.parents.spouse_telephone }}
              </div>
              <div class="my-auto capitalize" v-else>N/A</div>
            </div>
            <div
              class="w-3/12 text-xs py-1 pl-1 border-t border-r border-black"
            >
              <div class="my-auto" v-if="family.children[5] != null">
                {{ family.children[5].children_name }}
              </div>
              <div class="my-auto" v-else>N/A</div>
            </div>
            <div
              class="w-2/12 text-xs py-1 pl-1 border-t border-r border-black"
            >
              <div
                class="my-auto text-center"
                v-if="family.children[5] != null"
              >
                {{ formatDate(family.children[5].children_birth_date) }}
              </div>
              <div class="my-auto text-center" v-else>N/A</div>
            </div>
          </div>
          <div class="flex">
            <div
              class="w-2/12 bg-gray-300 text-xs pl-2 py-1 border-t border-l border-r border-black"
            >
              24. FATHERS'S SURNAME
            </div>
            <div
              class="w-5/12 text-xs py-1 pl-1 border-t border-r border-black"
            >
              <div class="my-auto capitalize">
                {{ family.parents.father_last_name }}
              </div>
            </div>
            <div
              class="w-3/12 text-xs py-1 pl-1 border-t border-r border-black"
            >
              <div class="my-auto" v-if="family.children[6] != null">
                {{ family.children[6].children_name }}
              </div>
              <div class="my-auto" v-else>N/A</div>
            </div>
            <div
              class="w-2/12 text-xs py-1 pl-1 border-t border-r border-black"
            >
              <div
                class="my-auto text-center"
                v-if="family.children[6] != null"
              >
                {{ formatDate(family.children[6].children_birth_date) }}
              </div>
              <div class="my-auto text-center" v-else>N/A</div>
            </div>
          </div>
          <div class="flex">
            <div
              class="w-2/12 bg-gray-300 text-xs pl-2 py-1 border-l border-r border-black"
            >
              &nbsp;&nbsp;&nbsp;FIRST NAME
            </div>
            <div
              class="w-3/12 text-xs py-1 pl-1 border-t border-r border-black"
            >
              <div class="my-auto capitalize">
                {{ family.parents.father_first_name }}
              </div>
            </div>
            <div
              class="w-2/12 bg-gray-300 text-xs py-1 pl-1 border-t border-r border-black"
            >
              <div class="flex-row">
                <div class="text-xxs">NAME EXTENSION (JR., SR)</div>
                <div
                  class="my-auto capitalize"
                  v-if="family.parents.father_name_extension != null"
                >
                  {{ family.parents.father_name_extension }}
                </div>
                <div class="my-auto capitalize" v-else>&nbsp;</div>
              </div>
            </div>
            <div
              class="w-3/12 text-xs py-1 pl-1 border-t border-r border-black"
            >
              <div class="my-auto" v-if="family.children[7] != null">
                {{ family.children[7].children_name }}
              </div>
              <div class="my-auto" v-else>N/A</div>
            </div>
            <div
              class="w-2/12 text-xs py-1 pl-1 border-t border-r border-black"
            >
              <div
                class="my-auto text-center"
                v-if="family.children[7] != null"
              >
                {{ formatDate(family.children[7].children_birth_date) }}
              </div>
              <div class="my-auto text-center" v-else>N/A</div>
            </div>
          </div>
          <div class="flex">
            <div
              class="w-2/12 bg-gray-300 text-xs pl-2 py-1 border-l border-r border-black"
            >
              &nbsp;&nbsp;&nbsp;MIDDLE NAME
            </div>
            <div
              class="w-5/12 text-xs py-1 pl-1 border-t border-r border-black"
            >
              <div class="my-auto capitalize">
                {{ family.parents.father_middle_name }}
              </div>
            </div>
            <div
              class="w-3/12 text-xs py-1 pl-1 border-t border-r border-black"
            >
              <div class="my-auto" v-if="family.children[8] != null">
                {{ family.children[8].children_name }}
              </div>
              <div class="my-auto" v-else>N/A</div>
            </div>
            <div
              class="w-2/12 text-xs py-1 pl-1 border-t border-r border-black"
            >
              <div
                class="my-auto text-center"
                v-if="family.children[8] != null"
              >
                {{ formatDate(family.children[8].children_birth_date) }}
              </div>
              <div class="my-auto text-center" v-else>N/A</div>
            </div>
          </div>
          <div class="flex">
            <div
              class="w-2/12 bg-gray-300 text-xs pl-2 py-1 border-t border-l border-r border-black"
            >
              25. MOTHER'S MAIDEN NAME
            </div>
            <div
              class="w-5/12 text-xs py-1 pl-1 border-t border-r border-black"
            >
              <div class="my-auto capitalize">
                {{ family.parents.mother_first_name }}
                {{ family.parents.mother_middle_name }}
                {{ family.parents.mother_last_name }}
              </div>
            </div>
            <div
              class="w-3/12 text-xs py-1 pl-1 border-t border-r border-black"
            >
              <div class="my-auto" v-if="family.children[9] != null">
                {{ family.children[9].children_name }}
              </div>
              <div class="my-auto" v-else>N/A</div>
            </div>
            <div
              class="w-2/12 text-xs py-1 pl-1 border-t border-r border-black"
            >
              <div
                class="my-auto text-center"
                v-if="family.children[9] != null"
              >
                {{ formatDate(family.children[9].children_birth_date) }}
              </div>
              <div class="my-auto text-center" v-else>N/A</div>
            </div>
          </div>
          <div class="flex">
            <div
              class="w-2/12 bg-gray-300 text-xs pl-2 py-1 border-l border-r border-black"
            >
              &nbsp;&nbsp;&nbsp;SUR NAME
            </div>
            <div
              class="w-5/12 text-xs py-1 pl-1 border-t border-r border-black"
            >
              <div class="my-auto capitalize">
                {{ family.parents.mother_last_name }}
              </div>
            </div>
            <div
              class="w-3/12 text-xs py-1 pl-1 border-t border-r border-black"
            >
              <div class="my-auto" v-if="family.children[10] != null">
                {{ family.children[10].children_name }}
              </div>
              <div class="my-auto" v-else>N/A</div>
            </div>
            <div
              class="w-2/12 text-xs py-1 pl-1 border-t border-r border-black"
            >
              <div
                class="my-auto text-center"
                v-if="family.children[10] != null"
              >
                {{ formatDate(family.children[10].children_birth_date) }}
              </div>
              <div class="my-auto text-center" v-else>N/A</div>
            </div>
          </div>
          <div class="flex">
            <div
              class="w-2/12 bg-gray-300 text-xs pl-2 py-1 border-l border-r border-black"
            >
              &nbsp;&nbsp;&nbsp;FIRST NAME
            </div>
            <div
              class="w-5/12 text-xs py-1 pl-1 border-t border-r border-black"
            >
              <div class="my-auto capitalize">
                {{ family.parents.mother_first_name }}
              </div>
            </div>
            <div
              class="w-3/12 text-xs py-1 pl-1 border-t border-r border-black"
            >
              <div class="my-auto" v-if="family.children[11] != null">
                {{ family.children[11].children_name }}
              </div>
              <div class="my-auto" v-else>N/A</div>
            </div>
            <div
              class="w-2/12 text-xs py-1 pl-1 border-t border-r border-black"
            >
              <div
                class="my-auto text-center"
                v-if="family.children[11] != null"
              >
                {{ formatDate(family.children[11].children_birth_date) }}
              </div>
              <div class="my-auto text-center" v-else>N/A</div>
            </div>
          </div>
          <div class="flex">
            <div
              class="w-2/12 bg-gray-300 text-xs pl-2 py-1 border-l border-r border-black"
            >
              &nbsp;&nbsp;&nbsp;MIDDLE NAME
            </div>
            <div
              class="w-5/12 text-xs py-1 pl-1 border-t border-r border-black"
            >
              <div class="my-auto capitalize">
                {{ family.parents.mother_middle_name }}
              </div>
            </div>
            <div
              class="w-5/12 bg-gray-200 text-xs py-1 pl-1 border-t border-r border-black"
            >
              <div
                class="my-auto text-center italic text-red-600 font-semibold"
              >
                (Continue on separate sheet if necessary)
              </div>
            </div>
          </div>
          <div class="flex">
            <div
              class="w-full border-t-2 border-l border-r border-black font-semibold italic text-base bg-gray-500"
            >
              III. EDUCATIONAL BACKGROUND
            </div>
          </div>
          <div class="flex">
            <div
              class="w-2/12 bg-gray-300 text-xs pl-2 py-1 border-t-2 border-l border-r border-black"
            >
              26. LEVEL
            </div>
            <div
              class="w-2/12 bg-gray-300 text-xs pl-2 py-1 border-t-2 border-r border-black"
            >
              <div class="text-center">NAME OF SCHOOL<br />(Write in full)</div>
            </div>
            <div
              class="w-3/12 bg-gray-300 text-xs pl-2 py-1 border-t-2 border-r border-black"
            >
              <div class="text-center">
                BASIC EDUCATION/DEGREE/COURSE (Write in full)
              </div>
            </div>
            <div
              class="w-2/12 bg-gray-300 text-xs py-1 border-t-2 border-r border-black"
            >
              <div class="text-center">PERIOD OF ATTENDANCE</div>
            </div>
            <div
              class="w-1/12 bg-gray-300 text-xs py-1 border-t-2 border-r border-black"
            >
              <div class="text-center text-xxs">
                HIGHEST LEVEL/ UNITS EARNED (if not graduated)
              </div>
            </div>
            <div
              class="w-1/12 bg-gray-300 text-xs py-1 border-t-2 border-r border-black"
            >
              <div class="text-center text-xxs">YEAR GRADUATED</div>
            </div>
            <div
              class="w-1/12 bg-gray-300 text-xs py-1 border-t-2 border-r border-black"
            >
              <div class="text-center text-xxs">
                SCHOLARSHIP/ ACADEMIC HONORS RECEIVED
              </div>
            </div>
          </div>
          <div class="flex">
            <div
              class="w-2/12 bg-gray-300 text-xs pl-3 py-1 border-l border-r border-black"
            ></div>
            <div
              class="w-2/12 bg-gray-300 text-xs pl-2 py-1 border-r border-black"
            ></div>
            <div
              class="w-3/12 bg-gray-300 text-xs pl-2 py-1 border-r border-black"
            ></div>
            <div
              class="w-1/12 bg-gray-300 text-xs py-1 border-t border-r border-black"
            >
              <div class="text-center">From</div>
            </div>
            <div
              class="w-1/12 bg-gray-300 text-xs py-1 border-t border-r border-black"
            >
              <div class="text-center">To</div>
            </div>
            <div
              class="w-1/12 bg-gray-300 text-xs py-1 border-r border-black"
            ></div>
            <div
              class="w-1/12 bg-gray-300 text-xs py-1 border-r border-black"
            ></div>
            <div
              class="w-1/12 bg-gray-300 text-xs py-1 border-r border-black"
            ></div>
          </div>
          <div class="flex">
            <div
              class="w-2/12 text-xs pl-3 py-1 border-t border-l border-r border-black"
            >
              <div>ELEMENTARY</div>
            </div>
            <div
              class="w-2/12 text-xs pl-2 py-1 text-center border-t border-r border-black"
            >
              <div v-if="education.primary != null">
                {{ education.primary.education_school_name }}
              </div>
              <div v-else>N/A</div>
            </div>
            <div
              class="w-3/12 text-xs pl-2 py-1 text-center border-t border-r border-black"
            >
              <div v-if="education.primary != null">
                {{ education.primary.education_course }}
              </div>
              <div v-else>N/A</div>
            </div>
            <div class="w-1/12 text-xs py-1 border-t border-r border-black">
              <div class="text-center" v-if="education.primary != null">
                {{ formatDate(education.primary.from) }}
              </div>
              <div v-else class="text-center">N/A</div>
            </div>
            <div class="w-1/12 text-xs py-1 border-t border-r border-black">
              <div class="text-center" v-if="education.primary != null">
                {{ formatDate(education.primary.from) }}
              </div>
              <div v-else class="text-center">N/A</div>
            </div>
            <div
              class="w-1/12 text-xs py-1 text-center border-t border-r border-black"
            >
              <div
                v-if="
                  education.primary != null &&
                  education.primary.education_highest_level_earned != null
                "
              >
                {{ education.primary.education_highest_level_earned }}
              </div>
              <div v-else>N/A</div>
            </div>
            <div
              class="w-1/12 text-xs py-1 text-center border-t border-r border-black"
            >
              <div v-if="education.primary != null">
                {{ education.primary.education_year_graduated }}
              </div>
              <div v-else>N/A</div>
            </div>
            <div
              class="w-1/12 text-xs py-1 text-center border-t border-r border-black"
            >
              <div v-if="education.primary != null">
                {{ education.primary.education_honors_received }}
              </div>
              <div v-else>N/A</div>
            </div>
          </div>
          <div class="flex">
            <div
              class="w-2/12 text-xs pl-3 py-1 border-t border-l border-r border-black"
            >
              <div>SECONDARY</div>
            </div>
            <div
              class="w-2/12 text-xs pl-2 py-1 text-center border-t border-r border-black"
            >
              <div v-if="education.secondary != null">
                {{ education.secondary.education_school_name }}
              </div>
              <div v-else>N/A</div>
            </div>
            <div
              class="w-3/12 text-xs pl-2 py-1 text-center border-t border-r border-black"
            >
              <div v-if="education.secondary != null">
                {{ education.secondary.education_course }}
              </div>
              <div v-else>N/A</div>
            </div>
            <div class="w-1/12 text-xs py-1 border-t border-r border-black">
              <div class="text-center" v-if="education.secondary != null">
                {{ formatDate(education.secondary.from) }}
              </div>
              <div v-else class="text-center">N/A</div>
            </div>
            <div class="w-1/12 text-xs py-1 border-t border-r border-black">
              <div class="text-center" v-if="education.secondary != null">
                {{ formatDate(education.secondary.from) }}
              </div>
              <div v-else class="text-center">N/A</div>
            </div>
            <div
              class="w-1/12 text-xs py-1 text-center border-t border-r border-black"
            >
              <div
                v-if="
                  education.secondary != null &&
                  education.secondary.education_highest_level_earned != null
                "
              >
                {{ education.secondary.education_highest_level_earned }}
              </div>
              <div v-else>N/A</div>
            </div>
            <div
              class="w-1/12 text-xs py-1 text-center border-t border-r border-black"
            >
              <div v-if="education.secondary != null">
                {{ education.secondary.education_year_graduated }}
              </div>
              <div v-else>N/A</div>
            </div>
            <div
              class="w-1/12 text-xs py-1 text-center border-t border-r border-black"
            >
              <div v-if="education.secondary != null">
                {{ education.secondary.education_honors_received }}
              </div>
              <div v-else>N/A</div>
            </div>
          </div>
          <div class="flex">
            <div
              class="w-2/12 text-xs pl-3 py-1 border-t border-l border-r border-black"
            >
              <div>VOCATIONAL / TRADE COURSE</div>
            </div>
            <div
              class="w-2/12 text-xs pl-2 py-1 text-center border-t border-r border-black"
            >
              <div v-if="education.vocational != null">
                {{ education.vocational.education_school_name }}
              </div>
              <div v-else>N/A</div>
            </div>
            <div
              class="w-3/12 text-xs pl-2 py-1 text-center border-t border-r border-black"
            >
              <div v-if="education.vocational != null">
                {{ education.vocational.education_course }}
              </div>
              <div v-else>N/A</div>
            </div>
            <div class="w-1/12 text-xs py-1 border-t border-r border-black">
              <div class="text-center" v-if="education.vocational != null">
                {{ formatDate(education.vocational.from) }}
              </div>
              <div v-else class="text-center">N/A</div>
            </div>
            <div class="w-1/12 text-xs py-1 border-t border-r border-black">
              <div class="text-center" v-if="education.vocational != null">
                {{ formatDate(education.vocational.from) }}
              </div>
              <div v-else class="text-center">N/A</div>
            </div>
            <div
              class="w-1/12 text-xs py-1 text-center border-t border-r border-black"
            >
              <div
                v-if="
                  education.vocational != null &&
                  education.vocational.education_highest_level_earned != null
                "
              >
                {{ education.vocational.education_highest_level_earned }}
              </div>
              <div v-else>N/A</div>
            </div>
            <div
              class="w-1/12 text-xs py-1 text-center border-t border-r border-black"
            >
              <div v-if="education.vocational != null">
                {{ education.vocational.education_year_graduated }}
              </div>
              <div v-else>N/A</div>
            </div>
            <div
              class="w-1/12 text-xs py-1 text-center border-t border-r border-black"
            >
              <div v-if="education.vocational != null">
                {{ education.vocational.education_honors_received }}
              </div>
              <div v-else>N/A</div>
            </div>
          </div>
          <div class="flex">
            <div
              class="w-2/12 text-xs pl-3 py-1 border-t border-l border-r border-black"
            >
              <div>COLLEGE</div>
            </div>
            <div
              class="w-2/12 text-xs pl-2 py-1 text-center border-t border-r border-black"
            >
              <div v-if="education.tertiary != null">
                {{ education.tertiary.education_school_name }}
              </div>
              <div v-else>N/A</div>
            </div>
            <div
              class="w-3/12 text-xs pl-2 py-1 text-center border-t border-r border-black"
            >
              <div v-if="education.tertiary != null">
                {{ education.tertiary.education_course }}
              </div>
              <div v-else>N/A</div>
            </div>
            <div class="w-1/12 text-xs py-1 border-t border-r border-black">
              <div class="text-center" v-if="education.tertiary != null">
                {{ formatDate(education.tertiary.from) }}
              </div>
              <div v-else class="text-center">N/A</div>
            </div>
            <div class="w-1/12 text-xs py-1 border-t border-r border-black">
              <div class="text-center" v-if="education.tertiary != null">
                {{ formatDate(education.tertiary.from) }}
              </div>
              <div v-else class="text-center">N/A</div>
            </div>
            <div
              class="w-1/12 text-xs py-1 text-center border-t border-r border-black"
            >
              <div
                v-if="
                  education.tertiary != null &&
                  education.tertiary.education_highest_level_earned != null
                "
              >
                {{ education.tertiary.education_highest_level_earned }}
              </div>
              <div v-else>N/A</div>
            </div>
            <div
              class="w-1/12 text-xs py-1 text-center border-t border-r border-black"
            >
              <div v-if="education.tertiary != null">
                {{ education.tertiary.education_year_graduated }}
              </div>
              <div v-else>N/A</div>
            </div>
            <div
              class="w-1/12 text-xs py-1 text-center border-t border-r border-black"
            >
              <div v-if="education.tertiary != null">
                {{ education.tertiary.education_honors_received }}
              </div>
              <div v-else>N/A</div>
            </div>
          </div>
          <div class="flex">
            <div
              class="w-2/12 text-xs pl-3 py-1 border-t border-l border-r border-black"
            >
              <div>GRADUATE STUDIES</div>
            </div>
            <div
              class="w-2/12 text-xs pl-2 py-1 text-center border-t border-r border-black"
            >
              <div v-if="education.graduate != null">
                {{ education.graduate.education_school_name }}
              </div>
              <div v-else>N/A</div>
            </div>
            <div
              class="w-3/12 text-xs pl-2 py-1 text-center border-t border-r border-black"
            >
              <div v-if="education.graduate != null">
                {{ education.graduate.education_course }}
              </div>
              <div v-else>N/A</div>
            </div>
            <div class="w-1/12 text-xs py-1 border-t border-r border-black">
              <div class="text-center" v-if="education.graduate != null">
                {{ formatDate(education.graduate.from) }}
              </div>
              <div v-else class="text-center">N/A</div>
            </div>
            <div class="w-1/12 text-xs py-1 border-t border-r border-black">
              <div class="text-center" v-if="education.graduate != null">
                {{ formatDate(education.graduate.from) }}
              </div>
              <div v-else class="text-center">N/A</div>
            </div>
            <div
              class="w-1/12 text-xs py-1 text-center border-t border-r border-black"
            >
              <div
                v-if="
                  education.graduate != null &&
                  education.graduate.education_highest_level_earned != null
                "
              >
                {{ education.graduate.education_highest_level_earned }}
              </div>
              <div v-else>N/A</div>
            </div>
            <div
              class="w-1/12 text-xs py-1 text-center border-t border-r border-black"
            >
              <div v-if="education.graduate != null">
                {{ education.graduate.education_year_graduated }}
              </div>
              <div v-else>N/A</div>
            </div>
            <div
              class="w-1/12 text-xs py-1 text-center border-t border-r border-black"
            >
              <div v-if="education.graduate != null">
                {{ education.graduate.education_honors_received }}
              </div>
              <div v-else>N/A</div>
            </div>
          </div>
          <div class="flex">
            <div
              class="w-full border-t-2 border-l border-r border-black font-semibold italic text-xs text-center text-red-600 bg-gray-300"
            >
              (Continue on separate sheet if necessary)
            </div>
          </div>
          <div class="flex">
            <div
              class="w-2/12 bg-gray-300 text-xs mx-auto text-center py-2 border-t-2 border-b border-l font-semibold italic border-r border-black"
            >
              SIGNATURE
            </div>
            <div
              class="w-5/12 bg-gray-300 text-xs mx-auto py-2 border-t-2 border-r border-b border-black"
            ></div>
            <div
              class="w-2/12 bg-gray-300 text-xs mx-auto text-center py-2 border-t-2 border-b font-semibold italic border-r border-black"
            >
              DATE
            </div>
            <div
              class="w-3/12 bg-gray-300 text-xs mx-auto text-center py-2 border-t-2 border-r border-b border-black"
            >
              {{ date() }}
            </div>
          </div>
          <div class="float-right text-xs italic">
            CS FORM 212 (Revised 2017), Page 1 of 4
          </div>
        </section>

        <!-- End Page 1 -->

        <!-- Page 2 -->

        <section
          slot="pdf-content"
          class="mt-12 bg-white font-sans mx-auto text-black"
          style="width: 800px; height: 1280px"
        >
          <div class="flex">
            <div
              class="w-full border-t-2 border-l border-r border-black font-semibold italic text-base bg-gray-500"
            >
              IV. CIVIL SERVICE ELIGIBILITY
            </div>
          </div>
          <div class="flex">
            <div
              class="w-3/12 bg-gray-300 text-xs pl-2 py-1 text-center border-t-2 border-l border-r border-black"
            >
              27. CAREER SERVICE/ RA 1080 (BOARD/ BAR) UNDER SPECIAL LAWS/ CES/
              CSEE BARANGAY ELIGIBILITY / DRIVER'S LICENSE
            </div>
            <div
              class="w-1/12 bg-gray-300 text-xs py-1 border-t-2 border-r border-black"
            >
              <div class="text-center">RATING<br />(If Applicable)</div>
            </div>
            <div
              class="w-2/12 bg-gray-300 text-xs pl-2 py-1 border-t-2 border-r border-black"
            >
              <div class="text-center">DATE OF EXAMINATION / CONFERMENT</div>
            </div>
            <div
              class="w-3/12 bg-gray-300 text-xs py-1 border-t-2 border-r border-black"
            >
              <div class="text-center my-auto">
                PLACE OF EXAMINATION / CONFERMENT
              </div>
            </div>
            <div
              class="w-3/12 bg-gray-300 text-xs py-1 border-t-2 border-r border-black"
            >
              <div class="text-center text-xs mt-4">
                LICENSE (if applicable)
              </div>
            </div>
          </div>
          <div class="flex">
            <div
              class="w-3/12 bg-gray-300 text-xs pl-2 py-1 text-center border-l border-r border-black"
            ></div>
            <div
              class="w-1/12 bg-gray-300 text-xs py-1 border-r border-black"
            ></div>
            <div
              class="w-2/12 bg-gray-300 text-xs pl-2 py-1 border-r border-black"
            ></div>
            <div
              class="w-3/12 bg-gray-300 text-xs py-1 border-r border-black"
            ></div>
            <div
              class="w-2/12 bg-gray-300 text-xs py-1 border-t border-r border-black"
            >
              <div class="text-center text-xs">NUMBER</div>
            </div>
            <div
              class="w-1/12 bg-gray-300 text-xs py-1 border-t border-r border-black"
            >
              <div class="text-center text-xs">Date of Validity</div>
            </div>
          </div>
          <div v-for="n in 7" :key="n" class="flex">
            <div
              v-if="cs[n] != null"
              class="w-3/12 text-xs pl-3 py-2 border-t text-center border-l border-r border-black"
            >
              {{ cs[n].eligibility_name }}
            </div>
            <div
              v-else
                class="w-3/12 text-xs pl-3 py-2 border-t text-center border-l border-r border-black"
              >
                N/A
            </div>
            <div
              v-if="cs[n] != null"
              class="w-1/12 text-xs pl-3 py-2 border-t text-center border-r border-black"
            >
              {{ cs[n].eligibility_rating }}
            </div>
            <div
              v-else
                class="w-1/12 text-xs pl-3 py-2 border-t text-center border-r border-black"
              >
                N/A
            </div>
            <div
              v-if="cs[n] != null"
              class="w-2/12 text-xs pl-3 py-2 border-t text-center border-r border-black"
            >
              {{ formatDate(cs[n].eligibility_date_of_exam) }}
            </div>
            <div
              v-else
                class="w-2/12 text-xs pl-3 py-2 border-t text-center border-r border-black"
              >
                N/A
            </div>
            <div
              v-if="cs[n] != null"
              class="w-3/12 text-xs pl-3 py-2 border-t text-center border-r border-black"
            >
              {{ cs[n].eligibility_place_of_exam }}
            </div>
            <div
              v-else
                class="w-3/12 text-xs pl-3 py-2 border-t text-center border-r border-black"
              >
                N/A
            </div>
            <div
              v-if="cs[n] != null"
              class="w-2/12 text-xs pl-3 py-2 border-t text-center border-r border-black"
            >
              <div class="text-center text-xs">
                {{ cs[n].eligibility_license_number }}
              </div>
            </div>
            <div
              v-else
                class="w-2/12 text-xs pl-3 py-2 border-t text-center border-r border-black"
              >
                N/A
            </div>
            <div
              v-if="cs[n] != null"
              class="w-1/12 text-xs pl-3 py-2 border-t text-center border-r border-black"
            >
              <div class="text-center text-xs">
                {{ formatDate(cs[n].eligibility_license_expiration) }}
              </div>
            </div>
            <div
              v-else
                class="w-1/12 text-xs pl-3 py-2 border-t text-center border-r border-black"
              >
                N/A
            </div>
          </div>
          <div class="flex">
            <div
              class="w-full border-t-2 border-l text-center text-red-600 text-xs border-r border-black font-semibold italic bg-gray-300"
            >
              (Continue on separate sheet if necessary)
            </div>
          </div>
          <div class="flex">
            <div
              class="w-full border-t-2 border-l border-r border-black font-semibold italic text-base bg-gray-500"
            >
              V. WORK EXPERIENCE <br />
              <span class="text-xs italic"
                >(Include private employment. Start from your recent work)
                Description of duties should be indicated in the attached Work
                Experience sheet.</span
              >
            </div>
          </div>
          <div class="flex">
            <div
              class="w-2/12 bg-gray-300 text-xs pl-2 py-1 text-center border-t-2 border-l border-r border-black"
            >
              28. INCLUSIVE DATES (mm/dd/yyyy)
            </div>
            <div
              class="w-3/12 bg-gray-300 text-xs py-1 border-t-2 border-r border-black"
            >
              <div class="text-center">
                POSITION TITLE <br />(Write in full/Do not abbreviate)
              </div>
            </div>
            <div
              class="w-3/12 bg-gray-300 text-xs pl-2 py-1 border-t-2 border-r border-black"
            >
              <div class="text-center">
                DEPARTMENT / AGENCY / OFFICE / COMPANY <br />(Write in full/Do
                not abbreviate)
              </div>
            </div>
            <div
              class="w-1/12 bg-gray-300 text-xs py-1 border-t-2 border-r border-black"
            >
              <div class="text-center my-auto">MONTHLY SALARY</div>
            </div>
            <div
              class="w-1/12 bg-gray-300 text-xs py-1 border-t-2 border-r border-black"
            >
              <div class="text-center text-xs">
                SALARY/ JOB/ PAY GRADE (if applicable)
              </div>
            </div>
            <div
              class="w-1/12 bg-gray-300 text-xs py-1 border-t-2 border-r border-black"
            >
              <div class="text-center text-xs">STATUS OF APPOINT<br />MENT</div>
            </div>
            <div
              class="w-1/12 bg-gray-300 text-xs py-1 border-t-2 border-r border-black"
            >
              <div class="text-center text-xs">GOV'T SERVICE <br />(Y/ N)</div>
            </div>
          </div>
          <div class="flex">
            <div
              class="w-1/12 bg-gray-300 text-xs pl-2 py-1 text-center border-t border-l border-r border-black"
            >
              From
            </div>
            <div
              class="w-1/12 bg-gray-300 text-xs pl-2 py-1 text-center border-t border-r border-black"
            >
              To
            </div>
            <div
              class="w-3/12 bg-gray-300 text-xs py-1 border-r border-black"
            ></div>
            <div
              class="w-3/12 bg-gray-300 text-xs pl-2 py-1 border-r border-black"
            ></div>
            <div
              class="w-1/12 bg-gray-300 text-xs py-1 border-r border-black"
            ></div>
            <div
              class="w-1/12 bg-gray-300 text-xs py-1 border-r border-black"
            ></div>
            <div
              class="w-1/12 bg-gray-300 text-xs py-1 border-r border-black"
            ></div>
            <div
              class="w-1/12 bg-gray-300 text-xs py-1 border-r border-black"
            ></div>
          </div>
          <div v-for="n in 28" :key="n" class="flex">
            <div
              class="w-1/12 text-xs py-2 text-center border-t border-l border-r border-black"
            >
              12/12/2021
            </div>
            <div
              class="w-1/12 text-xs py-2 text-center border-t border-r border-black"
            >
              12/12/2021
            </div>
            <div
              class="w-3/12 text-xs py-2 text-center border-t border-r border-black"
            >
              Sample Position
            </div>
            <div
              class="w-3/12 text-xs text-center border-t py-2 border-r border-black"
            >
              Dyan Lang
            </div>
            <div
              class="w-1/12 text-xs text-center py-2 border-t border-r border-black"
            >
              P 26,000.00
            </div>
            <div
              class="w-1/12 text-xs text-center py-2 border-t border-r border-black"
            >
              SG-13
            </div>
            <div
              class="w-1/12 text-xs text-center py-2 border-t border-r border-black"
            >
              Permanent
            </div>
            <div
              class="w-1/12 text-xs text-center py-2 border-t border-r border-black"
            >
              Y
            </div>
          </div>
          <div class="flex">
            <div
              class="w-full border-t-2 border-l text-center text-red-600 text-xs border-r border-black font-semibold italic bg-gray-300"
            >
              (Continue on separate sheet if necessary)
            </div>
          </div>
          <div class="flex">
            <div
              class="w-2/12 bg-gray-300 text-xs mx-auto text-center py-2 border-t-2 border-b border-l font-semibold italic border-r border-black"
            >
              SIGNATURE
            </div>
            <div
              class="w-5/12 bg-gray-300 text-xs mx-auto py-2 border-t-2 border-r border-b border-black"
            ></div>
            <div
              class="w-2/12 bg-gray-300 text-xs mx-auto text-center py-2 border-t-2 border-b font-semibold italic border-r border-black"
            >
              DATE
            </div>
            <div
              class="w-3/12 bg-gray-300 text-xs py-1 border-t-2 border-r border-b border-black"
            ></div>
          </div>
          <div class="float-right text-xs italic">
            CS FORM 212 (Revised 2017), Page 2 of 4
          </div>
        </section>
        <!-- End Page 2 -->

        <!-- Page 3 -->

        <section
          slot="pdf-content"
          class="mt-16 bg-white font-sans mx-auto text-black"
          style="width: 800px; height: 1280px"
        >
          <div class="flex">
            <div
              class="w-full border-t-2 border-l border-r border-black font-semibold italic text-base bg-gray-500"
            >
              VI. VOLUNTARY WORK OR INVOLVEMENT IN CIVIC / NON-GOVERNMENT /
              PEOPLE / VOLUNTARY ORGANIZATION/S
            </div>
          </div>
          <div class="flex">
            <div
              class="w-5/12 bg-gray-300 text-xs pl-2 py-1 text-center border-t-2 border-l border-r border-black"
            >
              29. NAME & ADDRESS OF ORGANIZATION <br />(Write in full)
            </div>
            <div
              class="w-2/12 bg-gray-300 text-xs pl-2 py-1 text-center border-t-2 border-r border-black"
            >
              INCLUSIVE DATES <br />(mm/dd/yyyy)
            </div>
            <div
              class="w-1/12 bg-gray-300 text-xs pl-0 py-1 text-center border-t-2 border-r border-black"
            >
              NUMBER OF HOURS
            </div>
            <div
              class="w-4/12 bg-gray-300 text-xs pl-2 py-1 text-center border-t-2 border-r border-black"
            >
              POSITION / NATURE OF WORK
            </div>
          </div>
          <div class="flex">
            <div
              class="w-5/12 bg-gray-300 text-xs pl-2 py-1 text-center border-l border-r border-black"
            ></div>
            <div
              class="w-1/12 bg-gray-300 text-xs pl-0 py-1 text-center border-t border-r border-black"
            >
              From
            </div>
            <div
              class="w-1/12 bg-gray-300 text-xs pl-0 py-1 text-center border-t border-r border-black"
            >
              To
            </div>
            <div
              class="w-1/12 bg-gray-300 text-xs pl-0 py-1 text-center border-r border-black"
            ></div>
            <div
              class="w-4/12 bg-gray-300 text-xs pl-2 py-1 text-center border-r border-black"
            ></div>
          </div>
          <div v-for="n in 7" :key="n" class="flex">
            <div
              class="w-5/12 text-xs pl-0 py-2 text-center border-l border-t border-r border-black"
            >
              Sample
            </div>
            <div
              class="w-1/12 text-xs pl-0 py-2 text-center border-t border-r border-black"
            >
              12/12/2021
            </div>
            <div
              class="w-1/12 text-xs pl-0 py-2 text-center border-t border-r border-black"
            >
              12/12/2021
            </div>
            <div
              class="w-1/12 text-xs pl-0 py-2 text-center border-r border-t border-black"
            >
              24
            </div>
            <div
              class="w-4/12 text-xs pl-2 py-2 text-center border-r border-t border-black"
            >
              Sample
            </div>
          </div>
          <div class="flex">
            <div
              class="w-full border-t-2 border-l text-center text-red-600 text-xs border-r border-black font-semibold italic bg-gray-300"
            >
              (Continue on separate sheet if necessary)
            </div>
          </div>
          <div class="flex">
            <div
              class="w-full border-t-2 border-l border-r border-black font-semibold italic text-base bg-gray-500"
            >
              VII. LEARNING AND DEVELOPMENT (L&D) INTERVENTIONS/TRAINING
              PROGRAMS ATTENDED
            </div>
          </div>
          <div class="flex">
            <div
              class="w-5/12 bg-gray-300 text-xs pl-2 py-1 text-center border-t-2 border-l border-r border-black"
            >
              30. TITLE OF LEARNING AND DEVELOPMENT INTERVENTIONS/TRAINING
              PROGRAMS <br />(Write in full)
            </div>
            <div
              class="w-2/12 bg-gray-300 text-xs pl-2 py-1 text-center border-t-2 border-r border-black"
            >
              INCLUSIVE DATES OF ATTENDANCE <br />(mm/dd/yyyy)
            </div>
            <div
              class="w-1/12 bg-gray-300 text-xs pl-0 py-1 text-center border-t-2 border-r border-black"
            >
              NUMBER OF HOURS
            </div>
            <div
              class="w-1/12 bg-gray-300 text-xs pl-0 py-1 text-center border-t-2 border-r border-black"
            >
              Type of LD ( Managerial/ Supervisory/ Technical/etc)
            </div>
            <div
              class="w-3/12 bg-gray-300 text-xs pl-0 py-1 text-center border-t-2 border-r border-black"
            >
              POSITION / NATURE OF WORK
            </div>
          </div>
          <div class="flex">
            <div
              class="w-5/12 bg-gray-300 text-xs pl-2 py-1 text-center border-l border-r border-black"
            ></div>
            <div
              class="w-1/12 bg-gray-300 text-xs pl-0 py-1 text-center border-t border-r border-black"
            >
              From
            </div>
            <div
              class="w-1/12 bg-gray-300 text-xs pl-0 py-1 text-center border-t border-r border-black"
            >
              To
            </div>
            <div
              class="w-1/12 bg-gray-300 text-xs pl-0 py-1 text-center border-r border-black"
            ></div>
            <div
              class="w-1/12 bg-gray-300 text-xs pl-2 py-1 text-center border-r border-black"
            ></div>
            <div
              class="w-3/12 bg-gray-300 text-xs pl-2 py-1 text-center border-r border-black"
            ></div>
          </div>
          <div v-for="n in 20" :key="n" class="flex">
            <div
              class="w-5/12 text-xs pl-0 py-2 text-center border-l border-t border-r border-black"
            >
              Sample
            </div>
            <div
              class="w-1/12 text-xs pl-0 py-2 text-center border-t border-r border-black"
            >
              12/12/2021
            </div>
            <div
              class="w-1/12 text-xs pl-0 py-2 text-center border-t border-r border-black"
            >
              12/12/2021
            </div>
            <div
              class="w-1/12 text-xs pl-0 py-2 text-center border-r border-t border-black"
            >
              24
            </div>
            <div
              class="w-1/12 text-xs pl-0 py-2 text-center border-r border-t border-black"
            >
              Managerial
            </div>
            <div
              class="w-3/12 text-xs pl-0 py-2 text-center border-r border-t border-black"
            >
              Sample
            </div>
          </div>
          <div class="flex">
            <div
              class="w-full border-t-2 border-l text-center text-red-600 text-xs border-r border-black font-semibold italic bg-gray-300"
            >
              (Continue on separate sheet if necessary)
            </div>
          </div>
          <div class="flex">
            <div
              class="w-full border-t-2 border-l border-r border-black font-semibold italic text-base bg-gray-500"
            >
              VIII. OTHER INFORMATION
            </div>
          </div>
          <div class="flex">
            <div
              class="w-4/12 bg-gray-300 text-xs pl-2 py-1 text-center border-t-2 border-l border-r border-black"
            >
              31. SPECIAL SKILLS and HOBBIES
            </div>
            <div
              class="w-4/12 bg-gray-300 text-xs pl-2 py-1 text-center border-t-2 border-r border-black"
            >
              32. NON-ACADEMIC DISTINCTIONS / RECOGNITION <br />(Write in full)
            </div>
            <div
              class="w-4/12 bg-gray-300 text-xs pl-2 py-1 text-center border-t-2 border-r border-black"
            >
              33. MEMBERSHIP IN ASSOCIATION/ORGANIZATION <br />(Write in full)
            </div>
          </div>
          <div v-for="n in 7" :key="n" class="flex">
            <div
              class="w-4/12 text-xs pl-0 py-2 text-center border-l border-t border-r border-black"
            >
              Sample
            </div>
            <div
              class="w-4/12 text-xs pl-0 py-2 text-center border-t border-r border-black"
            >
              Sample
            </div>
            <div
              class="w-4/12 text-xs pl-0 py-2 text-center border-t border-r border-black"
            >
              Sample
            </div>
          </div>
          <div class="flex">
            <div
              class="w-2/12 bg-gray-300 text-xs mx-auto text-center py-2 border-t-2 border-b border-l font-semibold italic border-r border-black"
            >
              SIGNATURE
            </div>
            <div
              class="w-5/12 bg-gray-300 text-xs mx-auto py-2 border-t-2 border-r border-b border-black"
            ></div>
            <div
              class="w-2/12 bg-gray-300 text-xs mx-auto text-center py-2 border-t-2 border-b font-semibold italic border-r border-black"
            >
              DATE
            </div>
            <div
              class="w-3/12 bg-gray-300 text-xs py-1 border-t-2 border-r border-b border-black"
            ></div>
          </div>
          <div class="float-right text-xs italic">
            CS FORM 212 (Revised 2017), Page 3 of 4
          </div>
        </section>

        <!-- End Page 3 -->

        <!-- Page 4 -->

        <section
          slot="pdf-content"
          class="mt-16 bg-white font-sans mx-auto text-black"
          style="width: 800px; height: 1300px"
        >
          <div class="flex">
            <div
              class="w-7/12 bg-gray-300 text-xs pl-5 py-1 border-t-2 border-l border-r border-black"
            >
              34. Are you related by consanguinity or affinity to the appointing
              or recommending authority, or to the chief of bureau or office or
              to the person who has immediate supervision over you in the
              Office, Bureau or Department where you will be apppointed,
            </div>
            <div
              class="w-5/12 text-xs pl-2 py-1 text-center border-t-2 border-r border-black"
            ></div>
          </div>
          <div class="flex">
            <div
              class="w-7/12 bg-gray-300 text-xs pl-5 py-1 border-l border-r border-black"
            >
              a. within the third degree?
            </div>
            <div
              class="w-5/12 text-xs pl-2 py-1 text-center border-r border-black"
            >
              <div class="flex">
                <div class="flex mx-3">
                  <div
                    class="text-sm h-2 border my-auto mx-2 border-black p-1"
                  ></div>
                  <div>
                    <span class="text-xs">YES</span>
                  </div>
                </div>
                <div class="flex mr-6">
                  <div
                    class="text-sm h-2 border my-auto ml-2 mr-3 border-black p-1"
                  ></div>
                  <div>
                    <span class="text-xs">NO</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="flex">
            <div
              class="w-7/12 bg-gray-300 text-xs pl-5 py-1 border-l border-r border-black"
            >
              b. within the fourth degree (for Local Government Unit - Career
              Employees)?
            </div>
            <div
              class="w-5/12 text-xs pl-2 py-1 text-center border-r border-black"
            >
              <div class="flex">
                <div class="flex mx-3">
                  <div
                    class="text-sm h-2 border my-auto mx-2 border-black p-1"
                  ></div>
                  <div>
                    <span class="text-xs">YES</span>
                  </div>
                </div>
                <div class="flex mr-6">
                  <div
                    class="text-sm h-2 border my-auto ml-2 mr-3 border-black p-1"
                  ></div>
                  <div>
                    <span class="text-xs">NO</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="flex">
            <div
              class="w-7/12 bg-gray-300 text-xs pl-5 py-0 border-l border-r border-black"
            ></div>
            <div class="w-5/12 text-xs pl-2 py-0 border-r border-black">
              <div class="mx-5">If YES, give details:</div>
            </div>
          </div>
          <div class="flex">
            <div
              class="w-7/12 bg-gray-300 text-xs pl-5 py-0 border-l border-r border-black"
            ></div>
            <div class="w-5/12 text-xs pl-2 py-1 border-r border-black">
              <div class="mx-5 border-black border-b text-center">&nbsp;</div>
            </div>
          </div>

          <div class="flex">
            <div
              class="w-7/12 bg-gray-300 text-xs pl-5 py-1 border-t border-l border-r border-black"
            >
              35. a. Have you ever been found guilty of any administrative
              offense?
            </div>
            <div
              class="w-5/12 text-xs pl-2 py-1 text-center border-t border-r border-black"
            >
              <div class="flex">
                <div class="flex mx-3">
                  <div
                    class="text-sm h-2 border my-auto mx-2 border-black p-1"
                  ></div>
                  <div>
                    <span class="text-xs">YES</span>
                  </div>
                </div>
                <div class="flex mr-6">
                  <div
                    class="text-sm h-2 border my-auto ml-2 mr-3 border-black p-1"
                  ></div>
                  <div>
                    <span class="text-xs">NO</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="flex">
            <div
              class="w-7/12 bg-gray-300 text-xs pl-5 py-0 border-l border-r border-black"
            ></div>
            <div class="w-5/12 text-xs pl-2 py-1 border-r border-black">
              <div class="mx-5">If YES, give details:</div>
            </div>
          </div>
          <div class="flex">
            <div
              class="w-7/12 bg-gray-300 text-xs pl-5 py-1 border-l border-r border-black"
            ></div>
            <div class="w-5/12 text-xs pl-2 py-1 border-r border-black">
              <div class="mx-5 border-black border-b text-center">&nbsp;</div>
            </div>
          </div>

          <div class="flex">
            <div
              class="w-7/12 bg-gray-300 text-xs pl-5 py-1 border-l border-r border-black"
            >
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;b. Have you been criminally charged
              before any court?
            </div>
            <div
              class="w-5/12 text-xs pl-2 py-1 text-center border-t border-r border-black"
            >
              <div class="flex">
                <div class="flex mx-3">
                  <div
                    class="text-sm h-2 border my-auto mx-2 border-black p-1"
                  ></div>
                  <div>
                    <span class="text-xs">YES</span>
                  </div>
                </div>
                <div class="flex mr-6">
                  <div
                    class="text-sm h-2 border my-auto ml-2 mr-3 border-black p-1"
                  ></div>
                  <div>
                    <span class="text-xs">NO</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="flex">
            <div
              class="w-7/12 bg-gray-300 text-xs pl-5 py-0 border-l border-r border-black"
            ></div>
            <div class="w-5/12 text-xs pl-2 py-1 border-r border-black">
              <div class="mx-5">If YES, give details:</div>
            </div>
          </div>
          <div class="flex">
            <div
              class="w-7/12 bg-gray-300 text-xs pl-5 py-1 border-l border-r border-black"
            ></div>
            <div class="w-5/12 text-xs pl-2 py-1 border-r border-black">
              <div class="mx-5 border-black border-b text-center">&nbsp;</div>
            </div>
          </div>

          <div class="flex">
            <div
              class="w-7/12 bg-gray-300 text-xs pl-5 py-1 border-t border-l border-r border-black"
            >
              36. Have you ever been convicted of any crime or violation of any
              law, decree, ordinance or regulation by any court or tribunal?
            </div>
            <div
              class="w-5/12 text-xs pl-2 py-1 text-center border-t border-r border-black"
            >
              <div class="flex">
                <div class="flex mx-3">
                  <div
                    class="text-sm h-2 border my-auto mx-2 border-black p-1"
                  ></div>
                  <div>
                    <span class="text-xs">YES</span>
                  </div>
                </div>
                <div class="flex mr-6">
                  <div
                    class="text-sm h-2 border my-auto ml-2 mr-3 border-black p-1"
                  ></div>
                  <div>
                    <span class="text-xs">NO</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="flex">
            <div
              class="w-7/12 bg-gray-300 text-xs pl-5 py-0 border-l border-r border-black"
            ></div>
            <div class="w-5/12 text-xs pl-2 py-1 border-r border-black">
              <div class="mx-5">If YES, give details:</div>
            </div>
          </div>
          <div class="flex">
            <div
              class="w-7/12 bg-gray-300 text-xs pl-5 py-1 border-l border-r border-black"
            ></div>
            <div class="w-5/12 text-xs pl-2 py-1 border-r border-black">
              <div class="mx-5 border-black border-b text-center">&nbsp;</div>
            </div>
          </div>

          <div class="flex">
            <div
              class="w-7/12 bg-gray-300 text-xs pl-5 py-1 border-t border-l border-r border-black"
            >
              37. Have you ever been separated from the service in any of the
              following modes: resignation, retirement, dropped from the rolls,
              dismissal, termination, end of term, finished contract or phased
              out (abolition) in the public or private sector?
            </div>
            <div
              class="w-5/12 text-xs pl-2 py-1 text-center border-t border-r border-black"
            >
              <div class="flex">
                <div class="flex mx-3">
                  <div
                    class="text-sm h-2 border my-auto mx-2 border-black p-1"
                  ></div>
                  <div>
                    <span class="text-xs">YES</span>
                  </div>
                </div>
                <div class="flex mr-6">
                  <div
                    class="text-sm h-2 border my-auto ml-2 mr-3 border-black p-1"
                  ></div>
                  <div>
                    <span class="text-xs">NO</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="flex">
            <div
              class="w-7/12 bg-gray-300 text-xs pl-5 py-0 border-l border-r border-black"
            ></div>
            <div class="w-5/12 text-xs pl-2 py-1 border-r border-black">
              <div class="mx-5">If YES, give details:</div>
            </div>
          </div>
          <div class="flex">
            <div
              class="w-7/12 bg-gray-300 text-xs pl-5 py-1 border-l border-r border-black"
            ></div>
            <div class="w-5/12 text-xs pl-2 py-1 border-r border-black">
              <div class="mx-5 border-black border-b text-center">&nbsp;</div>
            </div>
          </div>

          <div class="flex">
            <div
              class="w-7/12 bg-gray-300 text-xs pl-5 py-1 border-t border-l border-r border-black"
            >
              38. a. Have you ever been a candidate in a national or local
              election held within the last year (except Barangay election)?
            </div>
            <div
              class="w-5/12 text-xs pl-2 py-1 text-center border-t border-r border-black"
            >
              <div class="flex">
                <div class="flex mx-3">
                  <div
                    class="text-sm h-2 border my-auto mx-2 border-black p-1"
                  ></div>
                  <div>
                    <span class="text-xs">YES</span>
                  </div>
                </div>
                <div class="flex mr-6">
                  <div
                    class="text-sm h-2 border my-auto ml-2 mr-3 border-black p-1"
                  ></div>
                  <div>
                    <span class="text-xs">NO</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="flex">
            <div
              class="w-7/12 bg-gray-300 text-xs pl-5 py-0 border-l border-r border-black"
            ></div>
            <div class="w-5/12 text-xs pl-2 py-1 border-r border-black">
              <div class="mx-5">If YES, give details:</div>
            </div>
          </div>
          <div class="flex">
            <div
              class="w-7/12 bg-gray-300 text-xs pl-5 py-1 border-l border-r border-black"
            ></div>
            <div class="w-5/12 text-xs pl-2 py-1 border-r border-black">
              <div class="mx-5 border-black border-b text-center">&nbsp;</div>
            </div>
          </div>

          <div class="flex">
            <div
              class="w-7/12 bg-gray-300 text-xs pl-5 py-1 border-l border-r border-black"
            >
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;b. Have you resigned from the
              government service during the three (3)-month period before the
              last election to promote/actively campaign for a national or local
              candidate?
            </div>
            <div
              class="w-5/12 text-xs pl-2 py-1 text-center border-r border-black"
            >
              <div class="flex">
                <div class="flex mx-3">
                  <div
                    class="text-sm h-2 border my-auto mx-2 border-black p-1"
                  ></div>
                  <div>
                    <span class="text-xs">YES</span>
                  </div>
                </div>
                <div class="flex mr-6">
                  <div
                    class="text-sm h-2 border my-auto ml-2 mr-3 border-black p-1"
                  ></div>
                  <div>
                    <span class="text-xs">NO</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="flex">
            <div
              class="w-7/12 bg-gray-300 text-xs pl-5 py-0 border-l border-r border-black"
            ></div>
            <div class="w-5/12 text-xs pl-2 py-1 border-r border-black">
              <div class="mx-5">If YES, give details:</div>
            </div>
          </div>
          <div class="flex">
            <div
              class="w-7/12 bg-gray-300 text-xs pl-5 py-1 border-l border-r border-black"
            ></div>
            <div class="w-5/12 text-xs pl-2 py-1 border-r border-black">
              <div class="mx-5 border-black border-b text-center">&nbsp;</div>
            </div>
          </div>

          <div class="flex">
            <div
              class="w-7/12 bg-gray-300 text-xs pl-5 py-1 border-t border-l border-r border-black"
            >
              39. Have you acquired the status of an immigrant or permanent
              resident of another country?
            </div>
            <div
              class="w-5/12 text-xs pl-2 py-1 text-center border-t border-r border-black"
            >
              <div class="flex">
                <div class="flex mx-3">
                  <div
                    class="text-sm h-2 border my-auto mx-2 border-black p-1"
                  ></div>
                  <div>
                    <span class="text-xs">YES</span>
                  </div>
                </div>
                <div class="flex mr-6">
                  <div
                    class="text-sm h-2 border my-auto ml-2 mr-3 border-black p-1"
                  ></div>
                  <div>
                    <span class="text-xs">NO</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="flex">
            <div
              class="w-7/12 bg-gray-300 text-xs pl-5 py-0 border-l border-r border-black"
            ></div>
            <div class="w-5/12 text-xs pl-2 py-1 border-r border-black">
              <div class="mx-5">If YES, give details (country):</div>
            </div>
          </div>
          <div class="flex">
            <div
              class="w-7/12 bg-gray-300 text-xs pl-5 py-1 border-l border-r border-black"
            ></div>
            <div class="w-5/12 text-xs pl-2 py-1 border-r border-black">
              <div class="mx-5 border-black border-b text-center">&nbsp;</div>
            </div>
          </div>

          <div class="flex">
            <div
              class="w-7/12 bg-gray-300 text-xs pl-5 py-1 border-t border-l border-r border-black"
            >
              40. Pursuant to: (a) Indigenous People's Act (RA 8371); (b) Magna
              Carta for Disabled Persons (RA 7277); and (c) Solo Parents Welfare
              Act of 2000 (RA 8972), please answer the following items:
            </div>
            <div
              class="w-5/12 text-xs pl-2 py-1 text-center border-t border-r border-black"
            ></div>
          </div>

          <div class="flex">
            <div
              class="w-7/12 bg-gray-300 text-xs pl-5 py-1 border-l border-r border-black"
            >
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;a. Are you a member of any
              indigenous group?
            </div>
            <div
              class="w-5/12 text-xs pl-2 py-1 text-center border-r border-black"
            >
              <div class="flex">
                <div class="flex mx-3">
                  <div
                    class="text-sm h-2 border my-auto mx-2 border-black p-1"
                  ></div>
                  <div>
                    <span class="text-xs">YES</span>
                  </div>
                </div>
                <div class="flex mr-6">
                  <div
                    class="text-sm h-2 border my-auto ml-2 mr-3 border-black p-1"
                  ></div>
                  <div>
                    <span class="text-xs">NO</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="flex">
            <div
              class="w-7/12 bg-gray-300 text-xs pl-5 py-0 border-l border-r border-black"
            ></div>
            <div class="w-5/12 text-xs pl-2 py-1 border-r border-black">
              <div class="flex">
                <div class="w-3/5 mx-5">If YES, please specify ID No:</div>
                <div class="w-2/5 mx-5 border-black border-b text-center">
                  &nbsp;
                </div>
              </div>
            </div>
          </div>

          <div class="flex">
            <div
              class="w-7/12 bg-gray-300 text-xs pl-5 py-1 border-l border-r border-black"
            >
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;b. Are you a person with disability?
            </div>
            <div
              class="w-5/12 text-xs pl-2 py-1 text-center border-r border-black"
            >
              <div class="flex">
                <div class="flex mx-3">
                  <div
                    class="text-sm h-2 border my-auto mx-2 border-black p-1"
                  ></div>
                  <div>
                    <span class="text-xs">YES</span>
                  </div>
                </div>
                <div class="flex mr-6">
                  <div
                    class="text-sm h-2 border my-auto ml-2 mr-3 border-black p-1"
                  ></div>
                  <div>
                    <span class="text-xs">NO</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="flex">
            <div
              class="w-7/12 bg-gray-300 text-xs pl-5 py-0 border-l border-r border-black"
            ></div>
            <div class="w-5/12 text-xs pl-2 py-1 border-r border-black">
              <div class="flex">
                <div class="w-3/5 mx-5">If YES, please specify ID No:</div>
                <div class="w-2/5 mx-5 border-black border-b text-center">
                  &nbsp;
                </div>
              </div>
            </div>
          </div>

          <div class="flex">
            <div
              class="w-7/12 bg-gray-300 text-xs pl-5 py-1 border-l border-r border-black"
            >
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;c. Are you a solo parent?
            </div>
            <div
              class="w-5/12 text-xs pl-2 py-1 text-center border-r border-black"
            >
              <div class="flex">
                <div class="flex mx-3">
                  <div
                    class="text-sm h-2 border my-auto mx-2 border-black p-1"
                  ></div>
                  <div>
                    <span class="text-xs">YES</span>
                  </div>
                </div>
                <div class="flex mr-6">
                  <div
                    class="text-sm h-2 border my-auto ml-2 mr-3 border-black p-1"
                  ></div>
                  <div>
                    <span class="text-xs">NO</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="flex">
            <div
              class="w-7/12 bg-gray-300 text-xs pl-5 py-0 border-l border-r border-black"
            ></div>
            <div class="w-5/12 text-xs pl-2 py-1 border-r border-black">
              <div class="flex">
                <div class="w-3/5 mx-5">If YES, please specify ID No:</div>
                <div class="w-2/5 mx-5 border-black border-b text-center">
                  &nbsp;
                </div>
              </div>
            </div>
          </div>
          <div class="flex">
            <div
              class="w-9/12 border-t-2 border-l border-r-2 py-2 border-black text-xs bg-gray-300"
            >
              <div class="pl-3">
                41. REFERENCES
                <span class="text-red-600"
                  >(Person not related by consanguinity or affinity to applicant
                  /appointee)</span
                >
              </div>
            </div>
            <div
              class="w-3/12 border-t-2 border-r py-2 border-black text-xs"
            ></div>
          </div>
          <div class="flex">
            <div
              class="w-4/12 border-t-2 border-l text-center border-r py-2 border-black text-xs bg-gray-300"
            >
              NAME
            </div>
            <div
              class="w-3/12 border-t-2 text-center border-r py-2 border-black text-xs bg-gray-300"
            >
              ADDRESS
            </div>
            <div
              class="w-2/12 border-t-2 text-center border-r-2 py-2 border-black text-xs bg-gray-300"
            >
              TEL. NO.
            </div>
            <div class="w-3/12 border-r py-2 border-black text-xs"></div>
          </div>
          <div class="flex">
            <div
              class="w-4/12 border-t-2 border-l text-center border-r py-2 border-black text-xs"
            >
              Sample
            </div>
            <div
              class="w-3/12 border-t-2 text-center border-r py-2 border-black text-xs"
            >
              Sample
            </div>
            <div
              class="w-2/12 border-t-2 text-center border-r-2 py-2 border-black text-xs"
            >
              092141415446
            </div>
            <div class="w-3/12 border-r py-2 border-black text-xs"></div>
          </div>
          <div class="flex">
            <div
              class="w-4/12 border-t border-l text-center border-r py-2 border-black text-xs"
            >
              Sample
            </div>
            <div
              class="w-3/12 border-t text-center border-r py-2 border-black text-xs"
            >
              Sample
            </div>
            <div
              class="w-2/12 border-t text-center border-r-2 py-2 border-black text-xs"
            >
              092141415446
            </div>
            <div class="w-3/12 border-r py-2 border-black text-xs"></div>
          </div>
          <div class="flex">
            <div
              class="w-4/12 border-t border-l text-center border-r py-2 border-black text-xs"
            >
              Sample
            </div>
            <div
              class="w-3/12 border-t text-center border-r py-2 border-black text-xs"
            >
              Sample
            </div>
            <div
              class="w-2/12 border-t text-center border-r-2 py-2 border-black text-xs"
            >
              092141415446
            </div>
            <div class="w-3/12 border-r py-2 border-black text-xs"></div>
          </div>
          <div class="flex">
            <div
              class="w-9/12 border-t-2 border-b-2 border-l border-r-2 py-2 border-black text-xs bg-gray-300"
            >
              <div class="px-3 text-justify">
                42. I declare under oath that I have personally accomplished
                this Personal Data Sheet which is a true, correct and complete
                statement pursuant to the provisions of pertinent laws, rules
                and regulations of the Republic of the Philippines. I authorize
                the agency head/authorized representative to verify/validate the
                contents stated herein. I agree that any misrepresentation made
                in this document and its attachments shall cause the filing of
                administrative/criminal case/s against me.
              </div>
            </div>
            <div
              class="w-3/12 border-t-0 border-r py-2 border-black text-xs"
            ></div>
          </div>

          <div class="border-black border-r border-l border-b-2 h-56.50">
            <div class="flex pt-2">
              <div
                class="mx-2 border-black py-1 text-justify text-xxs border-t-2 border-r-2 border-l-2 h-24 w-4/12"
              >
                <div class="w-full border-black border-b pb-1">
                  Government Issued ID (i.e.Passport, GSIS, SSS, PRC, Driver's
                  License, etc.)
                  <span class="italic"
                    >PLEASE INDICATE ID Number and Date of Issuance</span
                  >
                </div>
                <div class="w-full text-xs border-black border-b py-1">
                  Government Issued ID:
                  <span class="font-semibold">Drivers License</span>
                </div>
                <div class="w-full text-xs border-black border-b py-1">
                  ID/License/Passport No.:
                  <span class="font-semibold">090381214</span>
                </div>
                <div class="w-full text-xs border-black border-b-2 pt-1 pb-0.5">
                  Date/Place of Issuance:
                  <span class="font-semibold">12/12/2021</span>
                </div>
              </div>

              <div
                class="mx-2 border-black py-1 text-justify text-xxs border-t-2 border-r-2 border-l-2 h-24 w-5/12"
              >
                <div class="w-full border-black border-b h-10"></div>
                <div
                  class="w-full border-black border-b h-4 pt-1 bg-gray-300 text-center"
                >
                  Signature (Sign inside the box)
                </div>
                <div
                  class="w-full text-xs font-semibold border-black border-b h-4 text-center"
                >
                  12/12/2021
                </div>
                <div
                  class="w-full border-black border-b-2 h-4 pt-1 pb-3 bg-gray-300 text-center"
                >
                  Date Accomplished
                </div>
              </div>

              <div
                class="mx-2 border-black py-1 text-justify text-xxs border-t-2 border-r-2 border-l-2 h-24 w-3/12"
              >
                <div class="w-full border-black h-10"></div>
                <div class="w-full border-black h-4 pt-1 text-center"></div>
                <div
                  class="w-full text-xs font-semibold border-black border-b h-4 text-center"
                ></div>
                <div
                  class="w-full border-black border-b-2 h-4 pt-1 pb-3 bg-gray-300 text-center"
                >
                  Right Thumbmark
                </div>
              </div>
            </div>
            <div class="text-x5 text-center mt-3">
              SUBSCRIBED AND SWORN to before me this
              <span class="w-24 border-black border-b"
                >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span
              >, affiant exhibiting his/her validly issued government ID as
              indicated above.
            </div>
            <div
              class="mx-auto mt-3 border-black py-1 text-justify text-xs border-t-2 border-r-2 border-l-2 h-24 w-5/12"
            >
              <div class="w-full border-black h-10"></div>
              <div class="w-full border-black h-4 pt-1 text-center"></div>
              <div
                class="w-full text-xs font-semibold border-black border-b h-4 text-center"
              ></div>
              <div
                class="w-full border-black border-b-2 h-4 pt-1 pb-3 bg-gray-300 text-center"
              >
                Person Administering Oath
              </div>
            </div>
          </div>
          <div class="float-right text-xs italic">
            CS FORM 212 (Revised 2017), Page 4 of 4
          </div>
        </section>

        <!-- End Page 4 -->
      </vue-html2pdf>
    </div>
  </div>
</template>

<script>
import Layout from "@/Pages/EmployeePanel/Layout";
import VueHtml2pdf from "vue-html2pdf";
import moment from "moment";

export default {
  metaInfo: { title: "PDS Form" },
  layout: Layout,
  components: {
    VueHtml2pdf,
  },
  props: {
    employee: Object,
    family: Object,
    education: Object,
    cs: Array,
    work: Array,
  },
  methods: {
    printPdf() {
      console.log(true);
      this.$refs.html2Pdf.generatePdf();
    },
    date() {
      return moment().format("MMMM D, YYYY");
    },
    format(value) {
      if (value) {
        return moment(String(value)).format("MMMM D, YYYY");
      }
    },
    formatDate(value) {
      if (value) {
        return moment(String(value)).format("MM/DD/YYYY");
      }
    },
    currency(price, sign = "₱ ") {
      const pieces = parseFloat(price).toFixed(2).split("");
      let ii = pieces.length - 3;
      while ((ii -= 3) > 0) {
        pieces.splice(ii, 0, ",");
      }
      return sign + pieces.join("");
    },
  },
};
</script>