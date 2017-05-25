<template>
  <div id="guide-search">
    <v-text-field name="search-input"
                  label="Search documentation"
                  id="search-documentation-temp">
    </v-text-field>
  </div>
</template>

<script>
  export default {
    created() {
      axios.get('/api/v1/guides/search')
          .then(r => this.results = r.data)
    },
    data() {
      return {
        results: [],
      }
    }
  }
</script>

<style lang="stylus">

</style>