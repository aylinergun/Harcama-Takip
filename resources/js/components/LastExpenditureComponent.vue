<template>
  <div class="col" @updateComponent="update">
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
import axios from 'axios';
import {$eventBus} from '../app.js';

    export default{
      mounted(){
        this.loadLastExpenditure();
      },
      data(){
        return{
          lastExpenditure:null,
        }
      },
      created(){
        $eventBus.$on('updateComponent',this.update);
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
      update(){
        setTimeout(()=>{
          this.loadLastExpenditure();
        },2000);
      },
    },
  }
</script>
