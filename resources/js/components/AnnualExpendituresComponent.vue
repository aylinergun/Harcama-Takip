<template>
  <div class="panel panel-default">
    <div align="center">
      <div class="row align-items-center">
        <div v-for="year in years">
          <div class="col-1 col-sm-3"><strong>{{format_date(year)}}</strong>
            <td>Yıllık Toplam Harcama</td>
              <div v-for="annualExpenditures in annualExpenditureses">
                <div v-if="annualExpenditures.year==format_date(year)">
                    {{$annualExpenditure.total}}
                </div>
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
        this.loadAnnualExpeditures();
      },
      props:[
        'years',
      ],
      data(){
        return{
          annualExpenditures:null
        }
      },
      methods:{
        loadAnnualExpeditures(){
          axios.get('/api/v1/annual-expenditures')
           .then((response)=>{
             this.annualExpenditures=response.data.data;
           })
           .catch((error)=>{
             console.log('Error:',error);
           });
        },
      }
    }
</script>
