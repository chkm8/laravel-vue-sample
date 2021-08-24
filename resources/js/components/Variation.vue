<template>
  <div class="container bg">
    <!-- <div v-for="img in images">
      <div class="stacking">
        <img class="img" :src="img.path" />
      </div>
    </div> -->

    <div class="stack stack-spread">
      <template v-for="(item, index) in images">
        <img :src="item.path" :alt="index" :key="index" />
      </template>
    </div>

    <div class="stack stack-spread">
      <!-- {{ stackImages }} -->
      <!-- <template v-for="(item, index) in images">
        <img :src="item.path" :alt="index" :key="index" />
      </template> -->
    </div>

    <!-- <div class="stack stack-sidegrid">
      <img src="/storage/images/1-a.png" alt="img-01" />
      <img src="/storage/images/1-b.png" alt="img-03" />
      <img src="/storage/images/2-a.png" alt="img-04" />
      <img src="/storage/images/2-b.png" alt="img-02" />
    </div> -->
  </div>
</template>

<style>
.bg {
  background-color: aqua;
  height: 250px;
  width: 250px;
  /* float: right; */
  /* position: relative; */
  margin: 10px;
}

.img {
  height: 150px;
  width: 150px;
}

/* .stacking {
  display: grid;
  grid-template-columns: repeat(12, 1fr);
  position: relative;
} */

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
  -webkit-transform: translate(-15px, 15px);
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
    stackImages: function () {
      // `this` points to the vm instance
      //   return this.message.split("").reverse().join("");
      //   return [
      //     <img src="/storage/images/1-a.png" alt="img-01" />,
      //     <img src="/storage/images/1-b.png" alt="img-03" />,
      //     <img src="/storage/images/2-a.png" alt="img-04" />,
      //     <img src="/storage/images/2-b.png" alt="img-02" />,
      //   ];
    },
  },
};
</script>
