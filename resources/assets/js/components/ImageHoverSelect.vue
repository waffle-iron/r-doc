<template lang="pug">
  #image-hover-select
    v-layout.step-thumbnails(row)
      .ml-3.mr-3.mt-2(v-for="(media, index) in images")
        div(:class="{'step-thumbnail-container': true, 'active': shouldBeVisible(media)}")
          .step-thumbnail-inner
            img(:src="media.src.original" class="responsive step-thumbnail" v-on:mouseover="makeVisible(media, images)")
    .step-media.step-main-media(v-for="(media, index) in images")
      img(
      :src="media.src.original"
      v-bind:class="{'step-image': true, 'responsive': true, 'visible': shouldBeVisible(media)}"
      )
</template>

<script>
  export default {
    name: 'image-hover-select',
    props: ['data'],
    created () {
      this.images = this.buildData(this.data)
    },
    data () {
      return {
        images: []
      }
    },
    methods: {
      buildData (data) {
        let img = []
        data.forEach((image, index) => {
          let p = {}
          p.id = index
          p.src = image
          index === 0 ? p.visible = true : p.visible = false
          img.push(p)
        })
        return img
      },
      shouldBeVisible (obj) {
        return obj.visible
      },
      makeVisible (obj, arr) {
        arr.forEach((image, index) => {
          if (image[index] !== obj.id && image.visible) {
            image.visible = false
            obj.visible = true
          }
        })
      }
    }
  }
</script>

<style lang="stylus">
  .step-thumbnails
    margin-bottom 18px
    .active
      transform translateY(-4px)
      img
        opacity 1
        box-shadow 0 4px 10px rgba(0, 0, 0, 0.5)

  .step-thumbnail-container
    .step-thumbnail-inner
      height auto
      border 1px solid #bbbfc3

  .step-thumbnail
    box-shadow 0 0 0 0 transparent
    transition transform 0.2s

  .step-main-media
    .visible
      position static
      visibility visible
    > img
      position absolute
      visibility hidden
      top 0
      left 0
      padding-bottom 18px

  img
    vertical-align middle
    border 0

  .responsive
    display block
    width 100%
    height auto

  .border
    border 1px solid black
</style>
