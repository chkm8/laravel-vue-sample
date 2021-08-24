<template>
  <div class="container-variation">
    <div class="stack stack-spread">
      <template v-for="(item, index) in images">
        <img :src="item.path" :alt="index" :key="index" />
      </template>
    </div>
  </div>
</template>

<style>
.container-variation {
  background-color: aqua;
  height: 250px;
  width: 250px;
  float: left;
  /* position: relative; */
  margin: 10px;
}

.img {
  height: 150px;
  width: 150px;
}

.stack {
  margin: 20px auto;
  width: 400px;
  padding: 0;
  position: relative;
  max-width: 100%;
}

.stack img {
  max-width: 100%;
  position: absolute;
  top: 0;
  left: 0;
  height: 100px;
  width: 100px;
  transition: all 0.3s;
}

.stack img:last-child {
  position: relative;
}

.stack-spread img:nth-child(3) {
  -webkit-transform: translate(15px, 15px);
  transform: translate(-15px, 15px);
}

.stack-spread img:first-child {
  -webkit-transform: translate(15px, -15px);
  transform: translate(15px, -15px);
}
</style>
<script>
export default {
  props: {
    images: Array,
  },
  mounted() {
    console.log("Variations Component mounted.");
  },
  computed: {
    // a computed getter
    stackImages: function () {},
  },
};
</script>
