<template>
  <div class="col">
    <div class="panel panel-default">
      <div class="panel-body" align="center"><strong>Son harcamanın detayları</strong></div>
          <div v-if="lastExpenditure">
            <label>Tutar: </label>
               {{lastExpenditure.total}}<br>
             <label>Yer: </label>
               {{lastExpenditure.location}}<br>
             <label>Kategori: </label>
               {{lastExpenditure.category.category_name}}<br>
             <label>Tarih: </label>
               {{lastExpenditure.date}}
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
          lastExpenditure:null,
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
