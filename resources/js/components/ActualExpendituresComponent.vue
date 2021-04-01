<template>
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-md-offset-2">
        <div class="panel panel-default">
          <div class="panel-body" align="center"><strong>Bu Ay Yapılan Harcamalar</strong></div>
              <table width=100%>

                    <tr height="30">
                        <td align="center"><strong>TUTAR</strong></td>
                        <td align="center"><strong>YER</strong></td>
                        <td align="center"><strong>KATEGORİ</strong></td>
                        <td align="center"><strong>TARİH</strong></td>
                    </tr>

                    <div v-for="actualExpenditures in actualExpenditures">
                      <tr height="30">
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
     </div>
</template>

<script>
import axios from 'axios'

    export default{
      mounted(){
        this.loadActualExpenditures();
      },
      props:[
      ],
      data(){
        return{
          actualExpenditures:null,
        }
      },
      methods:{
        loadActualExpenditures(){
          axios.get('/api/v1/actual-expenditures')
            .then((response)=>{
              this.actualExpenditures=response.data.data;
            })
            .catch((error)=>{
              console.log('Error:',error);
            });
      },
    }
  }
</script>
