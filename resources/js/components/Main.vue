<template>
  <div class="container">
    <div class="row">
      <div class="card card-style">
        <div class="card-header">Variations</div>

        <div class="card-body">
          <div v-for="(group, index) in images" :key="index">
            <variation :images="group" />
          </div>
        </div>

        <div class="row justify-content-center container-bg">
          <action-button />
        </div>
      </div>
    </div>
  </div>
</template>

<style>
.container-bg {
  background-color: chocolate;
}
.card-style {
  width: 100%;
}
</style>

<script>
import * as constants from "../constants.js";
import Variation from "./Variation.vue";
import ActionButton from "./ActionButton.vue";

export default {
  components: { Variation, ActionButton },
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
  //   methods: {
  //     updateProduct() {
  //       this.axios
  //         .patch(
  //           `http://localhost:8000/api/products/${this.$route.params.id}`,
  //           this.product
  //         )
  //         .then((res) => {
  //           this.$router.push({ name: "home" });
  //         });
  //     },
  //   },
};
</script>
