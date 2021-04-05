<template>
  <div class="col-sm" @updateComponent="update">
    <div class="col-md-12 col-md-offset-0">
      <div class="panel panel-default">
        <div class="panel-body" align="center"><strong>En çok harcama yapılan ay</strong></div>
          <div align="center">
            <div class="if" v-if="maxExpenditure !== null ">
                <label>Ay:</label>
                  {{maxExpenditure.month}}
                <label>TUTAR:</label>
                  {{maxExpenditure.total}}
            </div>
          </div>
        </div>
      </div>
    </div>
</template>

<script>
import axios from 'axios';
import {$eventBus} from '../app.js';

    export default{
      mounted(){
          this.loadMaxExpenditure();
      },
      data(){
        return{
          maxExpenditure:null
        }
      },
      created(){
        $eventBus.$on('updateComponent',this.update);
      },
      methods:{
        loadMaxExpenditure(){
         axios.get('/api/v1/max-expenditure')
          .then((response)=>{
            this.maxExpenditure=response.data.data;
          })
          .catch((error)=>{
            console.log('Error:',error);
          });
        },
        update(){
          setTimeout(()=>{
            this.loadMaxExpenditure();
          },2000);
        },
      },
    }
</script>
