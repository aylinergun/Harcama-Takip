<template>
<div class="col" @updateComponent="update">
  <div class="col-sm">
        <div class="panel panel-default">
          <div class="panel-body" align="center"><strong>En az harcama yapılan ay</strong></div>
            <div align="center">
              <div class="if" v-if="minExpenditure !== null">
                <label>Ay:</label>
                  {{minExpenditure.month}}
                <label>TUTAR:</label>
                  {{minExpenditure.total}}
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
        this.loadMinExpenditure();
      },
    data(){
      return{
        minExpenditure:null,
      }
    },
    created(){
      $eventBus.$on('updateComponent',this.update);
      //$eventBus.$on('updateComponent',(data)=>{
        //this.loadMinExpenditure('updateComponent',this.update)
      //});
    },
    methods:{
      loadMinExpenditure(){
        axios.get('/api/v1/min-expenditure')
          .then((response)=>{
            this.minExpenditure=response.data.data;
      })
            .catch((error)=>{
              console.log('Error:',error);
          });
      },
      update(){
        setTimeout(() => {
          this.loadMinExpenditure();
        }, 2000);
      },
    },
  }
</script>
