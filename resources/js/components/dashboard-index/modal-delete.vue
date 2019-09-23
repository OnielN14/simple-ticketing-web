<template>
  <div class="modal" tabindex="-1" role="dialog" id="deleteModal">
      <div class="modal-dialog" role="document">

          <div class="modal-content">
              <div class="modal-header">
                  Delete Ticket
              </div>
              <div class="modal-body">
                  <p>Ticket Code : <b>{{ticketData.ticket_code}}</b></p>
                  <p>Are you sure want to delete this ticket?</p>
              </div>
              <div class="modal-footer">
                  <button class="btn btn-text" data-dismiss="modal">Cancel</button>
                  <button @click="deleteCallback" class="btn btn-warning">Delete</button>
              </div>
          </div>
      </div>
  </div>
</template>

<script>
export default {
    props:['ticketData', 'okCallback'],
    methods:{
        deleteCallback(){
            this.okCallback(this.ticketData)
        }
    }
}
</script>

<style>

</style>