<template>
    <div>
        <div class="flex items-center justify-between mb-0">
            <h1 class="mb-8 font-bold text-3xl">
                <inertia-link
                    class="text-blue-400 hover:text-blue-600"
                    :href="route('employees')"
                    >Employee</inertia-link
                >
                <span class="text-indigo-400 font-medium">/</span>
                {{ form.first_name }} {{ form.last_name }} 👥
            </h1>
            <inertia-link
                class="btn-indigo rounded-lg mb-8"
                :href="route('employees.create')"
            >
                <span>✏️ Edit</span>
                <span class="hidden md:inline">Employee</span>
            </inertia-link>
        </div>

        <trashed-message
            v-if="contact.deleted_at"
            class="mb-6"
            @restore="restore"
        >
            This employee has been removed.
        </trashed-message>
        <div class="h-full">
            <div class="grid gap-6 mb-4 md:grid-cols-2 xl:grid-cols-2">
                <div class="rounded-xl bg-white shadow-md">
                    <div
                        :class="
                            hidden
                                ? 'hidden'
                                : 'flex items-center justify-between mb-0'
                        "
                    >
                        <h5
                            @click="cancel()"
                            class="mx-8 mt-5 text-sm cursor-pointer text-yellow-600 font bg-white"
                        >
                            Cancel
                        </h5>
                        <h5
                            @click="save()"
                            class="mx-8 mt-5 cursor-pointer text-sm text-blue-600 font bg-white"
                        >
                            Save
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
                        <img v-if="contact.photo === null"
                            class="w-32 h-32 rounded-full mx-auto"
                            :src="image"
                            alt=""
                            width="384"
                            height="512"
                        />
                        <img v-else
                            class="w-32 h-32 rounded-full mx-auto"
                            :src="image"
                            alt=""
                            width="384"
                            height="512"
                        />
                        <div class="text-center pt-2">
                            <button
                                @click="browse()"
                                class="rounded-full hover:bg-gray-700 hover:bg-opacity-50 font-semibold p-2 focus:outline-none text-sm text-gray transition duration-200"
                            >
                                Update Photo
                            </button>
                        </div>
                        <div class="pt-2 text-center space-y-4">
                            <figcaption
                                class="text-lg font-large font-semibold"
                            >
                                <div class="text-cyan-600 block">
                                    {{ contact.first_name }}
                                    {{ contact.middle_name }}
                                    {{ contact.last_name }}
                                    {{ contact.name_extension }}
                                </div>
                                <div class="text-gray-600 block">
                                    {{ contact.email }}
                                </div>
                                <div
                                    v-if="contact.agency_employee_id === null"
                                    class="text-gray-500 block pt-2"
                                >
                                    No data available
                                </div>
                                <div v-else class="text-gray-500 block pt-2">
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

        <educational-background
            :educations="educations"
            class="flex"
        ></educational-background>

        <civil-service
            :eligibilities="eligibilities"
            class="flex"
        ></civil-service>

        <work-experience
            :experiences="experiences"
            class="flex"
        ></work-experience>

        <volunteer-work :volunteers="volunteers" class="flex"></volunteer-work>

        <trainings :trainings="trainings" class="flex"></trainings>

        <other-informations
            :skills="skills"
            :memberships="memberships"
            :recognitions="recognitions"
            class="flex"
        ></other-informations>
    </div>
</template>

<script>
import Layout from "@/Shared/Layout";
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

export default {
    metaInfo() {
        return {
            title: `${this.form.first_name} ${this.form.last_name}`
        };
    },
    layout: Layout,
    components: {
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
        Childrens
    },
    props: {
        errors: Object,
        contact: Object,
        educations: Array,
        organizations: Array,
        experiences: Array,
        eligibilities: Array,
        volunteers: Array,
        trainings: Array,
        skills: Array,
        recognitions: Array,
        memberships: Array,
        family: Object,
        childrens: Array
    },
    remember: "form",
    data() {
        return {
            hidden: true,
            sending: false,
            file: null,
            image: "/img/user.png",
            form: {
                first_name: this.contact.first_name,
                last_name: this.contact.last_name,
                organization_id: this.contact.organization_id,
                email: this.contact.email,
                phone: this.contact.phone
            }
        };
    },
    methods: {
        browse() {
            this.hidden = false;
            this.$refs.file.click();
        },
        change(event) {
            this.file = event.target.files[0];
            this.$emit("input", this.file);
            let reader = new FileReader();
            reader.readAsDataURL(this.file);
            reader.onload = event => {
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
                    onFinish: () => (this.sending = false)
                }
            );
        }
    }
};
</script>
