<template>
  <div class="container">
    <div class="panel-body" align="center"><strong>BU AY YAPILAN HARCAMALAR</strong></div>
      <div align="center">
            <div class="row">
              <table width=100% align="center">
                    <tr>
                        <td align="center"><strong>TUTAR</strong></td>
                        <br>
                        <td align="center"><strong>YER</strong></td>
                        <br>
                        <td align="center"><strong>KATEGORİ</strong></td>
                        <br>
                        <td align="center"><strong>TARİH</strong></td>
                    </tr>
              <div v-for="actualExpenditures in actualExpenditureses">
                  <tr>
                    <td align="center">{{actualExpenditures.total}}</td>
                    <td align="center">{{actualExpenditures.location}}</td>
                    <td align="center">{{actualExpenditures.category.category_name}}</td>
                    <td align="center">{{actualExpenditures.date}}</td>
                  </tr>
                </div>
              </table>
            </div>
         </div>
       </div>
</template>

<script>
import axios from 'axios'

  export default{
    mounted(){
      this.loadActualExpenditures();
    },
    props:[
      'actualExpenditureses'
    ],
    data(){
      return{
        actualExpenditures:null
      }
    },
    methods:{
      loadActualExpenditures(){
        axios.get('/api/v1/actual-expenditures')
          .then((response)=>{
            this.actualExpenditures=response.data.data;
          })
      }
    },
  }
</script>
