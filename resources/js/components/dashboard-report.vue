<template>
  <div>
      <h1>Report</h1>
      <section>
          <datatable v-bind="datatableConfig"/>
      </section>
  </div>
</template>

<script>
import RearrangeData from  '../utility/rearrange-data'
import TdStatus from './dashboard-report/td-status.vue';

export default {
  components:{
    TdStatus
  },
  data(){
    return {
      dataTicket: [],
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
              {title: 'Status', tdComp:TdStatus, field:'is_check_in'}
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
  },
  created(){
    this.retrieveData();
  }
}
</script>

<style>

</style>