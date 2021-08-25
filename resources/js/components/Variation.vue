<template>
  <div class="container-variation">
    <div class="stack stack-spread">
      <template v-for="(item, index) in images">
        <b-img
          thumbnail
          fluid
          :src="item.path"
          :alt="'img' + index"
          :key="index"
          :style="{
            '-webkit-transform':
              'translate(' + index * 10 + 'px, ' + index * 10 + 'px)',
            transform: 'translate(' + index * 10 + 'px, ' + index * 10 + 'px)',
          }"
        ></b-img>
      </template>
    </div>
  </div>
</template>

<style>
.container-variation {
  background-color: rgb(181, 192, 192);
  height: 250px;
  width: 250px;
  float: left;
  margin: 10px;
  padding-left: 20px;
  border-radius: 10px;
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
  height: 150px;
  width: 150px;
  transition: all 0.3s;
}

.test-stack {
  -webkit-transform: translate(35px, 20px);
  transform: translate(35px, 20px);
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
};
</script>
