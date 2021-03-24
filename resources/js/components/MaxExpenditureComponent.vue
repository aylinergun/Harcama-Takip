<template>
  <div class="col-sm">
          <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-default">
              <div class="panel-body" align="center"><strong>En çok harcama yapılan ay</strong></div>
                <div align="center">
                  <tr>
                   <td>AY: </td>
                   <td align="center">{{maxExpenditure.data.month}}</td>
                  <br>
                  <td>TUTAR: </td>
                  <td align="center">{{maxExpenditure.data.total}}</td>
                  </tr>
                </div>
              </div>
            </div>
          </div>
</template>

<script>
import axios from 'axios'

    export default{
      mounted(){
          this.loadMaxExpenditure();
      },
      props:[
      ],
      data(){
        return{
          maxExpenditure:""
        }
      },
      methods:{
        loadMaxExpenditure(){
         axios.get('/api/v1/max-expenditure')
          .then((response)=>{
            this.maxExpenditure=response.data;
          })
          .catch((error)=>{
            console.log('Error:',error);
          });
        },
      }
    }
</script>
