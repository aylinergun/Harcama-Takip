<template>
  <div class="col-md-12 col-md-offset-0">
     <div class="panel panel-default">
       <div class="panel-body" align="center"><strong>HARCAMA YERLERİ</strong></div>
          <div class="container">
            <div class="row">
              <div v-for="year in years">
                   <div class="col-sm-2"><strong>{{year.value}}</strong>
                  </strong>
                  <div v-for="expenditureLocations in expenditureLocations">

                    <div v-if="expenditureLocations.year==year.value">

                          {{expenditureLocations.location}} -
                          {{expenditureLocations.number_of_expenditures}}
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
        this.loadExpenditureLocations();
      },
      props:[
        'years',
      ],
      data(){
        return{
          expenditureLocations:null
        }
      },
      methods:{
        loadExpenditureLocations(){
          axios.get('/api/v1/expenditure-locations')
            .then((response)=>{
              this.expenditureLocations=response.data.data;
            })
        }
      },
    }

</script>
