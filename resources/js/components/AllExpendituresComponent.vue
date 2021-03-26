<template>
  <div class="container">
    <div class="panel-body" align="center"><strong>Harcamalar</strong></div>
      <div align="center">
        <div class="col-sm">
          <table width=100% align="center">
            <br>
            <tr height=50>
              <td align="center"><strong>Tutar</strong></strong></strong></strong></td>
              <td align="center"><strong>Yer</strong></strong></strong></td>
              <td align="center"><strong>Kategori</strong></strong></td>
              <td align="center"><strong>Tarih</strong></td>
            </tr>
          <div v-for="allExpenditures in allExpenditureses">
              <tr>
                <td align="center">{{allExpenditures.total}}</td>
                <td align="center">{{allExpenditures.location}}</td>
                <td align="center">{{allExpenditures.category.category_name}}</td>
                <td align="center">{{allExpenditures.date}}</td>
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
        this.loadAllExpenditures();
      },
      props:[
        'allExpenditureses',
      ],
      data(){
        return{
          allExpenditures:null,
        }
      },
      methods:{
        loadAllExpenditures(){
          axios.get('/api/v1/all-expenditures')
            .then((response)=>{
              this.allExpenditures=response.data.data;
            });
        },
      }
    }

</script>
