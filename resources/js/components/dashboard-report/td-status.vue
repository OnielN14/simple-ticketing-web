<template>
  <div>
      {{value?"Checked-in":"Not Yet"}}
  </div>
</template>

<script>
export default {
    props:['value']
}
</script>

<style>

</style>