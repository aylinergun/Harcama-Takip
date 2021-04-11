<template>
  <div class="container" @updateComponent="update">
      <div class="row">
        <div class="col-md-10 col-md-offset-1">
          <div class="panel panel-default">
            <div class="panel-body"><strong><p align="center">Tüm Harcamalar</p></strong></div>
            <tr height=50>
              <td align="center"  style="width:150px"><strong>Tutar</strong></strong></strong></strong></td>
              <td align="center"  style="width:150px"><strong>Yer</strong></strong></strong></td>
              <td align="center"  style="width:150px"><strong>Kategori</strong></strong></td>
              <td align="center"  style="width:150px"><strong>Tarih</strong></td>
            </tr>
          <div v-for="allExpenditures in allExpenditures.data">
              <tr>
                <td align="center" style="width:150px">{{allExpenditures.total}}</td>
                <td align="center" style="width:150px">{{allExpenditures.location}}</td>
                <td align="center" style="width:150px">{{allExpenditures.category.category_name}}</td>
                <td align="center"  style="width:150px">{{allExpenditures.date}}</td>
              </tr>
           </div>
           <div>
          <pagination :data="allExpenditures" @pagination-change-page="getResults"></pagination>
        </div>
         </div>
       </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios';
import {$eventBus} from '../app.js';
import Pagination from 'vue-pagination-2';

   export default{
     mounted(){
       this.loadAllExpenditures();
       this.getResults();
     },
     data(){
       return{
         allExpenditures:{},
       }
     },
     created(){
       this.getResults();
       $eventBus.$on('updateComponent',this.update);
     },
     methods:{
       getResults(page=1){
         axios.get('/api/v1/all-expenditures?page=' + page)
           .then(response => {
             this.allExpenditures=response.data.data;
           });
       },
       loadAllExpenditures() {
         axios.get('/api/v1/all-expenditures')
           .then((response)=>{
             this.allExpenditures=response.data.data;
           })
           .catch((error) => {
             console.log('Error: ', error);
           });
         },
         update(){
           setTimeout(()=>{
             this.loadAllExpenditures();
           },2000);
         },
       },
     }
</script>
