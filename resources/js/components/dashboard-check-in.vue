<template>
  <div>
    <h1>Check In</h1>
      <section class="--custom-container">
        <div class="input-group">
          <div class="input-group-prepend">
            <label class="input-group-text" for="">Ticket Code</label>
          </div>
          <input class="form-control" type="text" placeholder="Customer Ticket Code">
          <div class="input-group-append">
            <button class="btn btn-primary">Check!</button>
          </div>
        </div>
      </section>
  </div>
</template>

<script>
export default {

}
</script>

<style lang="scss" scoped>
.--custom-container{
  margin-left: auto;
  margin-right: auto;
  max-width: 768px;
}
</style>