<template>
  <div>
      <button @click="openModal" class="btn btn-secondary" data-toggle="modal" data-target="#editModal">Edit</button>
      <button @click="openModal" class="btn btn-secondary" data-toggle="modal" data-target="#deleteModal">Delete</button>
  </div>
</template>

<script>

export default {
    props:['row', 'xprops', 'nested'],
    methods:{
        openModal(){
            this.xprops.callbackUbah(this.row)
        }
    }
}
</script>

<style>

</style>