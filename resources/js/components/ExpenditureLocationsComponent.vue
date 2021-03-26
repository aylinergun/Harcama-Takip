<template>
  <div class="col-md-12 col-md-offset-0">
     <div class="panel panel-default">
       <div class="panel-body" align="center"><strong>HARCAMA YERLERİ</strong></div>
          <div align="center">
            <div class="row align-items-center">
              <div v-for="annualExpenditures in annualExpenditureses">
                <div class="col-sm2">
                  <strong>
                    <tr>
                      <td>{{annualExpenditures.year}}</td>
                    </tr>
                  </strong>
                  <div v-for="expenditureLocations in expenditureLocationses">
                    <div v-if="annualExpenditures.year==expenditureLocations.year">
                      <div class="row align-items-center">
                        <tr>
                          <td>{{expenditureLocations.location}} - </td>
                          <td>{{expenditureLocations.number_of_expenditures}}</td>
                        </tr>
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
        this.loadLastExpenditureLocations();
      },
      props:[
        'years',
        'annualExpenditureses'
      ],
      data(){
        return{
          expenditureLocations:null
        }
      },
      methods:{
        loadLastExpenditureLocations(){
          axios.get('/api/v1/expenditure-locations')
            .then((response)=>{
              this.expenditureLocations=response.data.data;
            })
        }
      },
    }

</script>
