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

        <div class="row justify-content-center">
          <button type="button" v-on:click="generate" class="btn btn-primary">
            Generate
          </button>
          <b-button class="btn btn-success" v-b-modal.modal-prevent-closing
            >Open Modal</b-button
          >
        </div>
      </div>
    </div>

    <div>
      <b-modal
        id="modal-prevent-closing"
        ref="modal"
        title="Submit Your Name"
        @ok="handleOk"
      >
        <form ref="form" @submit.stop.prevent="handleSubmit">
          <b-form-group label="Select Index">
            <b-form-select
              v-model="selected_index"
              :options="options"
            ></b-form-select>
          </b-form-group>

          <b-form-file
            v-model="imageAttachment"
            :state="Boolean(imageAttachment)"
            placeholder="Choose a file or drop it here..."
            drop-placeholder="Drop file here..."
          ></b-form-file>
        </form>
      </b-modal>
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
import ActionButton from "./ActionButton.vue";
import Variation from "./Variation.vue";

export default {
  components: { Variation, ActionButton },
  mounted() {
    console.log("Component mounted.");
  },
  data() {
    return {
      images: {},
      imageAttachment: null,
      selected_index: null,
      options: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10],
    };
  },
  created() {
    console.log("created");
    this.generate();
  },
  methods: {
    generate() {
      console.log("generate");
      this.axios.get("/api/images").then((res) => {
        this.images = res.data;
      });
    },
    addNew() {
      console.log("addNew");
    },
    handleOk(bvModalEvt) {
      // Prevent modal from closing
      bvModalEvt.preventDefault();
      // Trigger submit handler
      this.handleSubmit();
    },
    handleSubmit() {
      const config = {
        headers: {
          "content-type": "multipart/form-data",
        },
      };

      let data = new FormData();
      data.append("imageAttachment", this.imageAttachment);
      data.append("index", this.selected_index);

      var self = this;
      axios
        .post("/api/images", data, config)
        .then(function (res) {
          console.log("success upload");
          self.generate();
        })
        .catch(function (err) {
          console.log(err);
        });

      // Hide the modal manually
      this.$nextTick(() => {
        this.$bvModal.hide("modal-prevent-closing");
      });
    },
  },
};
</script>
