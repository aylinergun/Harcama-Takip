<template>
  <div class="col">
      <div class="panel panel-default">
        <div class="panel-body">
          <strong><p align="center">Yıllık Harcamalar</p></strong>
            <div class="container">
              <div class="row">
                <div  v-for="year in years">
                  <div class="col-15 col-sm-15" style="width:285px" align="center"><strong>{{year.value}}</strong>

                    <td>Yıllık Toplam Harcama</td>
                    <div v-for="totalExpenditureYear in totalExpenditureYearly">
                          <div v-if="totalExpenditureYear.year==year.value">

                              {{totalExpenditureYear.total}}

                          </div>
                        </div>
                      </strong>
                        <div v-for="annualExpenditures in annualExpenditures">
                          <div v-if="annualExpenditures.year==year.value">
                   Ay:
                   {{annualExpenditures.month}}

                 Yapılan Toplam Harcama:
                  {{annualExpenditures.total}}

                  Harcama Sayısı:
                  {{annualExpenditures.number_of_expenditures}}
                  </div>
                </div>
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
        this.loadAnnualExpenditures();
      },
      props:[
        'totalExpenditureYearly',
        'years',
        'number_of_expenditures',
      ],
      data(){
        return{
          annualExpenditures:null,
        }
      },
      methods:{
        loadAnnualExpenditures(){
          axios.get('/api/v1/annual-expenditures')
            .then((response)=>{
              this.annualExpenditures=response.data.data;
            })
        }
      },
   }
</script>
