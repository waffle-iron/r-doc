<template>
  <div>
    <div class="guide__image-container">
      <div class="guide__main-image"
           v-bind:style="imageObject">
        <div class="guide__image-overlay">
          <h1 class="guide__title">{{headerData.title}}</h1>
          <div class="guide__revision">Revision: {{headerData.revision}}</div>
          <div class="guide__published">Published: {{getDate(headerData.published)}}</div>
        </div>
      </div>
      <div class="guide__type"><p><i class="glyphicon glyphicon-book"></i> <strong>{{headerData.type}}</strong></p>
      </div>
    </div>
    <div class="guide__introduction">
      <h2>Introduction</h2>
      <div v-html="headerData.intro"></div>
    </div>
  </div>
</template>

<script>
  export default {
    props: ['headerData'],
    data() {
      return {
        imageObject: {
          backgroundImage: `url('${this.headerData.mainImage}')`
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