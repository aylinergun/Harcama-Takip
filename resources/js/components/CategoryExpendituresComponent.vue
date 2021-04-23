<template>
<div class="col-md-10 col-md-offset-1" align="center" @updateComponent="update">
  <div class="panel panel-default">
    <div class="panel-body">
      <strong><p align="center">Kategoriye Göre Harcama Yeri</p></strong>
          <div class="row ">
            <div v-for="category in categories">
              <div class="col-1 col-sm-3" style="width:150px">
                <strong>{{category.category_name}}</strong>
                    <div v-for="categoryExpenditures in categoryExpenditures">
                      <div v-if="categoryExpenditures.category_id == category.id">
                        {{categoryExpenditures.location}}
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

      export default{
        mounted(){
          this.loadCategoryExpenditures();
        },
        props:[
          'categories',
        ],
        data(){
          return{
            categoryExpenditures:null
          }
        },
        created(){
          $eventBus.$on('updateComponent',this.update);
        },
        methods:{
          loadCategoryExpenditures(){
            axios.get('/api/v1/category-expenditures')
            .then((response)=>{
              this.categoryExpenditures=response.data.data;
            })
            .catch((error)=>{
              console.log('Error:',error);
            });
          },
          update(){
            setTimeout(()=>{
              this.loadCategoryExpenditures();
            },2000);
          },
        },
      }
</script>
