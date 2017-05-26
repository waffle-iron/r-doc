<template lang="pug">
  #step-lines
    v-list
      v-list-item.mb-2(v-for="(line, index) in lines" v-bind:key="index")
        v-list-tile(avatar)
          v-icon(
          v-bind:class="getBulletColor(line.bullet)"
          v-text="getIcon(line.bullet)"
          v-if="line.level === 0"
          )
          v-list-tile-content.ml-3(v-html="line.text" v-if="line.level === 0")
          v-list-tile.ml-3(avatar v-if="line.level === 1 || line.level === 2")
            v-icon(
            v-bind:class="getBulletColor(line.bullet)"
            v-text="getIcon(line.bullet)"
            v-if="line.level === 1"
            )
            v-list-tile-content.ml-3(v-html="line.text" v-if="line.level === 1")
            v-list-tile.ml-3(avatar v-if="line.level === 2")
              v-icon(
              v-bind:class="getBulletColor(line.bullet)"
              v-text="getIcon(line.bullet)"
              v-if="line.level === 2"
              )
              v-list-tile-content.ml-3(v-html="line.text" v-if="line.level === 2")
</template>

<script>

  export default {
    props: ['lines'],
    methods: {
      getBulletColor(bullet) {
        return {
          'black--text': bullet === 'black',
          'red--text': bullet === 'red',
          'orange--text': bullet === 'orange',
          'yellow--text': bullet === 'yellow',
          'green--text': bullet === 'green',
          'blue--text': bullet === 'blue',
          'amber--text': bullet === 'caution',
          'indigo--text': bullet === 'info',
          'lime--text': bullet === 'reminder',
          'light-blue--text': bullet === 'light-blue'
        }
      },
      getIcon(bullet) {
        if (bullet === 'caution' || bullet === 'info' || bullet === 'reminder') {
          if (bullet === 'caution') {
            return 'warning'
          }
          if (bullet === 'info') {
            return 'info'
          }
          if (bullet === 'reminder') {
            return 'note'
          }
        } else {
          return 'check_circle'
        }
      }
    }
  }
</script>

<style lang="stylus">
  .black
    color #212121

  .list
    .list__item
      a.list__tile:hover
        background rgba(0, 0, 0, 0)
        a.list__tile:hover
          background rgba(0, 0, 0, 0)
          a.list__tile:hover
            background rgba(0, 0, 0, 0)
</style>