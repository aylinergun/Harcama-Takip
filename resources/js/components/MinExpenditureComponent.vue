<template>
  <div class="col-sm">
        <div class="panel panel-default">
          <div class="panel-body" align="center"><strong>En az harcama yapılan ay</strong></div>
            <div align="center">
              <tr>
               <td>AY: </td>
               <td align="center">{{minExpenditure.data.month}}</td>
              <td>TUTAR: </td>
              <td align="center">{{minExpenditure.data.total}}</td>
              </tr>
            </div>
        </div>
      </div>
</template>

<script>
  import axios from 'axios'

    export default{
      mounted(){
        this.loadMinExpenditure();;
      },
    data(){
      return{
        minExpenditure:""
      }
    },
    methods:{
      loadMinExpenditure(){
        axios.get('/api/v1/min-expenditure')
          .then((response)=>{
            this.minExpenditure=response.data;
      })
            .catch((error)=>{
              console.log('Error:',error);
          });
      },
    }
  }
</script>
