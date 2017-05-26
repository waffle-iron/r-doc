<template lang="pug">
  .image-hover-select
    div(v-if="position === 'left'" v-bind:class="positionSmallClasses")
      .step-thumbnails.row
        .col.col--sm-4(v-for="(media, index) in images")
          div(:class="{'step-thumbnail-container': true, 'active': shouldBeVisible(media)}")
            .step-thumbnail-inner
              img(:src="media.src" class="responsive step-thumbnail" v-on:mouseover="makeVisible(media, images)")
    div(:class="positionBigClasses")
      .step-thumbnails.row(v-if="position === 'top'")
        .col.col--sm-4(v-for="(media, index) in images")
          div(:class="{'step-thumbnail-container': true, 'active': shouldBeVisible(media)}")
            .step-thumbnail-inner
              img(:src="media.src" class="responsive step-thumbnail" v-on:mouseover="makeVisible(media, images)")
      .step-media.step-main-media(v-for="(media, index) in images")
        img(
        :src="media.src"
            v-bind:class="{'step-image': true, 'responsive': true, 'visible': shouldBeVisible(media)}"
        )
      .step-thumbnails.row(v-if="position === 'bottom'")
        .col.col--sm-4(v-for="(media, index) in images")
          div(:class="{'step-thumbnail-container': true, 'active': shouldBeVisible(media)}")
            .step-thumbnail-inner
              img(:src="media.src" class="responsive step-thumbnail" v-on:mouseover="makeVisible(media, images)")
    div(v-if="position === 'right'" v-bind:class="positionSmallClasses")
      .step-thumbnails.row
        .col.col--sm-4(v-for="(media, index) in images")
          div(:class="{'step-thumbnail-container': true, 'active': shouldBeVisible(media)}")
            .step-thumbnail-inner
              img(:src="media.src" class="responsive step-thumbnail" v-on:mouseover="makeVisible(media, images)")
</template>

<script>
  export default {
    name: 'image-hover-select',
    props: {
      data: {
        type: Array,
        default: () => ['src/assets/cat1.jpg', 'src/assets/cat2.jpg', 'src/assets/cat3.jpg']
      },
      position: {
        type: String,
        default: 'top'
      }
    },
    created () {
      this.images = this.buildData(this.data)
    },
    data () {
      return {
        images: []
      }
    },
    computed: {
      positionBigClasses () {
        return {
          'col': true,
          'col--sm-7': this.position === 'right' || this.position === 'left',
          'blr8': true
        }
      },
      positionSmallClasses () {
        return {
          'col': true,
          'col--sm-5': this.position === 'left' || this.position === 'right',
          'blr8': true
        }
      }
    },
    methods: {
      buildData (data) {
        let img = [];
        data.forEach((image, index) => {
          let p = {};
          p.id = index;
          p.src = image;
          index === 0 ? p.visible = true : p.visible = false;
          img.push(p)
        });
        return img
      },
      shouldBeVisible (obj) {
        return obj.visible
      },
      makeVisible (obj, arr) {
        arr.forEach((image, index) => {
          if (image[index] !== obj.id && image.visible) {
            image.visible = false;
            obj.visible = true
          }
        })
      }
    }
  }
</script>

<style lang="stylus">

</style>