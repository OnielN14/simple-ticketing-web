<template>
  <div class="modal" tabindex="-1" role="dialog" id="editModal">
      <div class="modal-dialog" role="document">

          <div class="modal-content">
              <div class="modal-header">
                  Edit Ticket
              </div>
              <div class="modal-body">
                  <form @submit.prevent="update">
                      <div class="form-group">
                        <label for="">Ticket Code</label>
                        <input v-model="ticketData.ticket_code" name="ticket_code" type="text" class="form-control" disabled>
                    </div>
                      <div class="form-group">
                        <label for="">Name</label>
                        <input v-model="ticketData.name" name="name" type="text" class="form-control" placeholder='e.g. "Steve", "John Doe", etc...' required>
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input v-model="ticketData.email" name="email" type="email" class="form-control" placeholder='e.g. "youremail@domain.com"'  required>
                    </div>
                    <div class="form-group">
                        <label for="">Phone Number</label>
                        <input v-model="ticketData.phone" name="phone" type="text" class="form-control" placeholder='e.g. "0857XXXXX", "0812XXXXXXXX"' required>
                    </div>
                    <div class="form-group">
                        <label for="">Status</label>
                        <div class="form-check">
                            <input v-model="ticketData.is_check_in" name="phone" type="checkbox" class="form-check-input" id="checkbox-s"> 
                            <label for="checkbox-s" class="form-check-label">Checked In</label>
                        </div>
                    </div>

                  </form>
              </div>
              <div class="modal-footer">
                  <button class="btn btn-text" data-dismiss="modal">Cancel</button>
                  <button type="submit" @click="update" class="btn btn-primary">Submit</button>
              </div>
          </div>
      </div>
  </div>
</template>

<script>
export default {
    props:['ticketData','okCallback'],
    methods:{
        update(){
            this.okCallback(this.ticketData)
        }
    }
}
</script>

<style>

</style>