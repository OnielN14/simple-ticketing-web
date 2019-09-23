<template>
      <section class="container get-ticket-registration py-4">
        <img class="backdrop" src="/img/hero.jpg" alt="">
        <form class="card" @submit.prevent="sendTicketRequest">
            <div class="card-header">
                <a class="brand" href="/">INDIE</a>
                <h4>Fill the form with your correct information</h4>
            </div>
            <div class="card-body">
                <div v-if="!isResponse">
                    <div class="form-group">
                        <label for="">Name</label>
                        <input v-model="ticketForm.name" name="name" type="text" class="form-control" placeholder='e.g. "Steve", "John Doe", etc...' required>
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input v-model="ticketForm.email" name="email" type="email" class="form-control" placeholder='e.g. "youremail@domain.com"'  required>
                    </div>
                    <div class="form-group">
                        <label for="">Phone Number</label>
                        <input v-model="ticketForm.phone" name="phone" type="text" class="form-control" placeholder='e.g. "0857XXXXX", "0812XXXXXXXX"' required>
                    </div>

                    <div class="text-right">
                        <button class="btn btn-text" type="reset">Reset</button>
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
                </div>
                <div v-else>
                    <div v-if="isResponseSuccess" class="alert alert-success" role="alert">
                        <h4 class="alert-heading">Congratulation</h4>
                        <p class="mb-0">
                            Your ticket has been created!!
                        </p>
                        <p>
                            Here is your ticket code : <b>{{responseMessage.ticket_code}}</b>
                        </p>
                        <p>
                            You may close this windows.
                        </p>
                        <a class="--custom-link" @click="resetForm">Click Here to request another ticket</a>
                    </div>
                    <div v-else class="alert alert-warning" role="alert">
                        <h4 class="alert-heading">Oops! Something wrong</h4>
                        <p class="mb-0">
                            Please contact our administrator
                        </p>
                    </div>
                </div>
            </div>
        </form>
    </section>
</template>

<script>
export default {
    data(){
        return {
            ticketForm:{
                name:'',
                email:'',
                phone:''
            },
            isResponse:false,
            isResponseSuccess:false,
            responseMessage:{
                ticket_code:''
            }
        }
    },
    methods:{
        async sendTicketRequest(){
            await this.$http.post('/api/ticket/store', this.ticketForm)
            .then(response=>{
                console.log(response);
                this.responseMessage = response.data
                this.isResponseSuccess = true
            })
            .catch(error => {
                console.log(error);
            })

            this.isResponse=true;
        },
        resetForm(){
            this.ticketForm.name=''
            this.ticketForm.email=''
            this.ticketForm.phone=''
            this.isResponse=false
            this.responseMessage.ticket_code=''
        }
    }
}
</script>

<style lang="scss" scoped>
.--custom-link{
    font-weight: bolder;

    &:hover{
        cursor: pointer;
        text-decoration: underline;
    }
}
</style>