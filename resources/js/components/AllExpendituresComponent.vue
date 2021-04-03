<template>
  <div class="container">
      <div class="row">
        <div class="col-md-12 col-md-offset-0">
          <div class="panel panel-default">
            <div class="panel-body"><strong><p align="center">Tüm Harcamalar</p></strong></div>
            <tr height=50>
              <td align="center"  style="width:150px"><strong>Tutar</strong></strong></strong></strong></td>
              <td align="center"  style="width:150px"><strong>Yer</strong></strong></strong></td>
              <td align="center"  style="width:150px"><strong>Kategori</strong></strong></td>
              <td align="center"  style="width:150px"><strong>Tarih</strong></td>
            </tr>
          <div v-for="allExpenditures in allExpenditures">
              <tr>
                <td align="center" style="width:150px">{{allExpenditures.total}}</td>
                <td align="center" style="width:150px">{{allExpenditures.location}}</td>
                <td align="center" style="width:150px">{{allExpenditures.category}}</td>
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
Vue.component('pagination', require('laravel-vue-pagination'));

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
      },
      methods:{
        getResults(page){
          if (typeof page === 'undefined') {
                    page = 1;
                }
          axios.get('/api/v1/all-expenditures?page='+page)
            .then(response=>{
              this.allExpenditures=response.data;
            });
        },
        loadAllExpenditures() {
          axios.get('/api/v1/all-expenditures')
            .then((response)=>{
              this.allExpenditures=response.data;
            })
            .catch((error) => {
              console.log('Error: ', error);
            });
          },
        },
      }
</script>
