<template>
  <div>
      <h1>Ticket List</h1>
      <section>
          <datatable v-bind="datatableConfig"/>
      </section>

      <modal-edit :ticketData="modalData" :okCallback="updateTicket"></modal-edit>
      <modal-delete :ticketData="modalData" :okCallback="deleteTicket"></modal-delete>
  </div>
</template>

<script>
import RearrangeData from  '../utility/rearrange-data'
import ModalEdit from './dashboard-index/modal-edit.vue'
import ModalDelete from './dashboard-index/modal-delete.vue'

import TdEdit from './dashboard-index/td-opt-edit'

export default {
    components:{
        ModalEdit,
        ModalDelete,
        TdEdit
    },
    data(){
        return {
            modalData:{},
            dataTicket: [],
            modalElement:{
                edit:'',
                delete:''
            },
            datatableConfig:{
                fixHeaderAndSetBodyMaxHeight: 500,
                HeaderSettings: false,
                tblStyle: 'table-layout: fixed', // must
                tblClass: 'table-bordered',
                pageSizeOptions: [5, 10, 15, 20],
                supportBackup: true,
                supportNested: true,
                columns: [
                    {title:'Ticket Code', field:'ticket_code', sortable: true},
                    {title: 'Customer Name', field: 'name',sortable: true},
                    {title: 'Customer Email', field: 'email',sortable: true},
                    {title: 'Customer Phone number', field: 'phone',sortable: true},
                    {title: 'Action', tdComp:TdEdit}
                ],
                data: [],
                total: 0,
                query: {},
                xprops: {
                    callbackHapus: '',
                    callbackUbah: ''
                }
            }
        }
    },
    methods:{
        openModalEdit(newData){
            this.modalData = newData
        },
        retrieveData(){
            this.$http.get('/api/ticket').then(response => {
                
                this.dataTicket = response.data.data
                this.reloadDatatable()
                
            })
        },
        reloadDatatable(){
            RearrangeData(this.datatableConfig.query, this.dataTicket).then(({
                rows,
                total
            }) => {
                this.datatableConfig.data = rows
                this.datatableConfig.total = total
            })
        },
        updateTicket(ticketData){
            this.$http.post(`/api/ticket/update/${ticketData.id}`, ticketData).then(response=>{
                console.log(`${ticketData.ticket_code} updated` );
                
                this.retrieveData()
                this.modalElement.edit.modal('hide')
            })
        },
        deleteTicket(ticketData){
            this.$http.post(`/api/ticket/delete/${ticketData.id}`).then(response=>{
                console.log(`${ticketData.ticket_code} deleted` );
                this.retrieveData()
                this.modalElement.delete.modal('hide')
            })
        }
    },
    created(){
        this.retrieveData()
    },
    mounted(){
        this.datatableConfig.data = this.dataTicket
        this.datatableConfig.xprops.callbackUbah = this.openModalEdit
        this.datatableConfig.xprops.callbackHapus = this.openModalEdit

        this.modalElement.edit = $('#editModal')
        this.modalElement.delete = $('#deleteModal')
    }
}
</script>

<style>

</style>