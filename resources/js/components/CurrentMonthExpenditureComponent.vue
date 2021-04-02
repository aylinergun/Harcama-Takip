<template>
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-md-offset-2">
        <div class="panel panel-default">
          <div class="panel-body">
            <p align="center"><strong>Bu Ay Yapılan Harcamalar</strong></p>
                    <tr height="20">
                        <td align="center" style="width:150px"><strong>Tutar</strong></td>
                        <td align="center" style="width:150px"><strong>Yer</strong></td>
                        <td align="center" style="width:150px"><strong>Kategori</strong></td>
                        <td align="center" style="width:150px"><strong>Tarih</strong></td>
                    </tr>

                    <div v-for="currentMonthExpenditure in currentMonthExpenditure">
                      <tr height="50">
                          <td align="center" style="width:150px">{{currentMonthExpenditure.total}}</td>
                          <td align="center" style="width:150px">{{currentMonthExpenditure.location}}</td>
                          <td align="center" style="width:150px">{{currentMonthExpenditure.category.category_name}}</td>
                          <td align="center" style="width:150px">{{currentMonthExpenditure.date}}</td>
                      </tr>
                  </div>
              </div>
              </div>
           </div>
         </div>
     </div>
</template>

<script>
import axios from 'axios'

    export default{
      mounted(){
        this.loadCurrentMonthExpenditure();
      },
      props:[
      ],
      data(){
        return{
          currentMonthExpenditure:null,
        }
      },
      methods:{
        loadCurrentMonthExpenditure(){
          axios.get('/api/v1/current-month-expenditure')
            .then((response)=>{
              this.currentMonthExpenditure=response.data.data;
            })
            .catch((error)=>{
              console.log('Error:',error);
            });
      },
    }
  }
</script>
