<template>
  <div class="col-md-12 col-md-offset-0">
    <div class="panel panel-default">
      <div class="panel-body" align="center"><strong>Son harcamanın detayları</strong></div>
        <div align="center">
          <div class="if" v-if="lastExpenditure">
            <tr>
              <td>AY: </td>
              <td align="center">{{lastExpenditure.date}}</td>
              <td>TUTAR: </td>
              <td align="center">{{lastExpenditure.total}}</td>
              <td>KATEGORİ: </td>
              <td align="center">{{lastExpenditure.category_name}}</td>
              <td>YER: </td>
              <td align="center">{{lastExpenditure.location}}</td>
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
        this.loadLastExpenditure();
      },
      props:[
      ],
      data(){
        return{
          lastExpenditure:null
        }
      },
      methods:{
        loadLastExpenditure(){
          axios.get('/api/v1/last-expenditure')
            .then((response)=>{
              this.lastExpenditure=response.data.data;
            })
            .catch((error)=>{
              console.log('Error:',error);
            });
      },
    }
  }
</script>
