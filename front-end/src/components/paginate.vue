<template>
  <v-pagination
    v-model="currentPage"
    :length="totalPages"
    @input="navigateToPage"
  ></v-pagination>
</template>

<script>
export default {
  name: "Pagination",
  data() {
    return {
      currentPage: 2,
      totalPages: 5,
    };
  },
  methods: {
    navigateToPage(page) {
      console.log("Navigating to page:", page);
    },
  },
};
</script>
