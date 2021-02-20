<template>
<p>{{ employee.first_name }}</p>
</template>

<script>
export default {
  props: {
    employee: Object,
  }
};
</script>
