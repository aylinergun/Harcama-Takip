<template>
  <div class="col" @updateComponent="update">
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
                   {{monthName(annualExpenditures.month)}}

               <td>Yapılan Toplam Harcama: {{annualExpenditures.total}}</td>

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
import axios from 'axios';
import {$eventBus} from '../app.js';
import moment from 'moment';

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
      created(){
        $eventBus.$on('updateComponent',this.update);
      },
      methods:{
        loadAnnualExpenditures(){
          axios.get('/api/v1/annual-expenditures')
            .then((response)=>{
              this.annualExpenditures=response.data.data;
            })
        },
        update(){
          setTimeout(()=>{
            this.loadAnnualExpenditures();
          },2000);
        },
        monthName(annualExpenditures){
          var months =
          [" " ,
            "Ocak" ,
            "Şubat" ,
            "Mart" ,
            "Nisan" ,
            "Mayıs" ,
            "Haziran" ,
            "Temmuz" ,
            "Ağustos" ,
            "Eylül" ,
            "Ekim" ,
            "Kasım" ,
            "Aralık"
          ];
        return months[annualExpenditures];
        },
      },
   }
</script>
