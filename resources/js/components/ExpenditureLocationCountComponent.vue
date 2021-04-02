<template>
  <div class="col-md-12 col-md-offset-0">
     <div class="panel panel-default">
       <div class="panel-body" align="center"><strong>HARCAMA YERLERİ</strong></div>
          <div class="container">
            <div class="row">
              <div v-for="year in years">
                   <div class="col-sm-2"><strong>{{year.value}}</strong>
                  </strong>
                  <div v-for="expenditureLocationCount in expenditureLocationCount">

                    <div v-if="expenditureLocationCount.year==year.value">

                          {{expenditureLocationCount.location}} -
                          {{expenditureLocationCount.number_of_expenditures}}
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
        this.loadExpenditureLocationCount();
      },
      props:[
        'years',
      ],
      data(){
        return{
          expenditureLocationCount:null
        }
      },
      methods:{
        loadExpenditureLocationCount(){
          axios.get('/api/v1/expenditure-location-count')
            .then((response)=>{
              this.expenditureLocationCount=response.data.data;
            })
        }
      },
    }

</script>
