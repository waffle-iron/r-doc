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

<style>
  .guide__introduction {
    margin: 30px 0;
  }

  .guide__image-container {
    width: 100%;
    height: auto;
    margin-top: 20px;
    background-color: black;
    justify-content: space-between;
    position: relative;
    overflow: hidden;
    border-radius: 4px;
    flex: 0 1 auto;
    z-index: 0;
    color: white;
  }

  .guide__main-image {
    position: relative;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    display: flex;
    align-items: center;
    overflow: hidden;
    z-index: 1;
    background-size: cover;
    background: #f2f2f2 center;
  }

  .guide__image-overlay {
    background-color: rgba(0, 0, 0, 0.6);
    width: 100%;
    min-height: 350px;
    text-align: center;
    white-space: nowrap;
    display: flex;
    flex-direction: column;
    justify-content: center;
  }

  .guide__type {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    z-index: 3;
    text-align: center;
  }

  .guide__type > p {
    display: inline-block;
    height: 41px;
    margin: 0;
    padding: 10px 10px;
    background-color: #0071ce;
    border-bottom-left-radius: 5px;
    border-bottom-right-radius: 5px;
    text-transform: uppercase;
    letter-spacing: 1px;
    color: white;
    font-weight: bold;
  }

  .guide__title {
    margin-top: 40px;
    margin-bottom: 0;
    padding: 40px;
    white-space: normal;
  }

  .guide__revision {
    font-weight: bold;
    font-size: 1.5em;
  }
</style>