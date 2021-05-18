<template>
  <div>
    <label v-if="label" class="form-label font-semibold">{{ label }}</label>
    <div class="form-input p-0" :class="{ error: error }">
      <input
        ref="file"
        type="file"
        :accept="accept"
        class="hidden"
        @change="change"
      />
      <div v-if="!value" class="p-2">
        <button
          type="button"
          class="px-4 py-1 bg-gray-500 hover:bg-gray-700 rounded-sm text-xs font-medium text-white"
          @click="browse"
        >
          Browse
        </button>
      </div>
      <div v-else class="flex items-center justify-between p-2">
        <div class="flex-1 pr-1">
          {{ value.name }}
          <span class="text-gray-500 text-xs"
            >({{ filesize(value.size) }})</span
          >
        </div>
        <button
          type="button"
          class="px-4 py-1 bg-gray-500 hover:bg-gray-700 rounded-sm text-xs font-medium text-white"
          @click="remove"
        >
          Remove
        </button>
      </div>
    </div>
    <div v-if="error" class="form-error">{{ error }}</div>
  </div>
</template>

<script>
export default {
  props: {
    value: File,
    label: String,
    accept: String,
    error: String,
  },
  watch: {
    value(value) {
      if (!value) {
        this.$refs.file.value = "";
      }
    },
  },
  methods: {
    filesize(size) {
      var i = Math.floor(Math.log(size) / Math.log(1024));
      return (
        (size / Math.pow(1024, i)).toFixed(2) * 1 +
        " " +
        ["B", "kB", "MB", "GB", "TB"][i]
      );
    },
    browse() {
      this.$refs.file.click();
    },
    change(e) {
      this.$emit("input", e.target.files[0]);
    },
    remove() {
      this.$emit("input", null);
    },
  },
};
</script>
