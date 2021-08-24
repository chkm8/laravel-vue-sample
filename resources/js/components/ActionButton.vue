<template>
  <div class="row justify-content-center">
    <button type="button" v-on:click="generate" class="btn btn-primary">
      Generate
    </button>
    <button type="button" class="btn btn-success">Add New Image</button>
  </div>
</template>

<style>
.container-bg {
  background-color: chocolate;
}

.btn {
  margin: 10px;
}
</style>

<script>
import * as constants from "../constants.js";

export default {
  mounted() {
    console.log("Component mounted.");
    console.log(constants.API_URL);
  },
  data() {
    return {
      images: {},
    };
  },
  created() {
    this.axios.get(`${constants.API_URL}/images`).then((res) => {
      this.images = res.data;
    });
  },
  methods: {
    generate() {
      console.log("generate");
    },
  },
};
</script>
