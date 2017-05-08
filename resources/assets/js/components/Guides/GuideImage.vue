<template>
  <div>
    <div class="guide__image-container">
      <div class="guide__main-image"
           v-bind:style="imageObject">
        <div class="guide__image-overlay">
          <h1 class="guide__title">{{data.title}}</h1>
          <div class="guide__revision">Revision: {{data.revision}}</div>
          <div class="guide__published">Published: {{getDate(data.published)}}</div>
        </div>
      </div>
      <div class="guide__type"><p><i class="glyphicon glyphicon-book"></i> <strong>{{data.type}}</strong></p>
      </div>
    </div>
    <div class="guide__introduction">
      <h2>Introduction</h2>
      <div v-html="data.intro"></div>
    </div>
  </div>
</template>

<script>
  export default {
    props: ['data'],
    data() {
      return {
        imageObject: {
          backgroundImage: `url('${this.data.mainImage}')`
        }
      }
    },
    methods: {
      getDate(timestamp) {
        const date = new Date(timestamp * 1000);
        return moment(date).format('MMMM Do, YYYY');
      }
    }
  }
</script>