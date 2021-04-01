<template>
<div class="col-md-10 col-md-offset-1" align="center">
  <div class="panel panel-default">
    <div class="panel-body">
      <strong><p align="center">Kategoriye Göre Harcama Yeri</p></strong>
          <div class="row " style="color: #4d4d4d;">
            <div v-for="category in categories">
              <div class="col-1 col-sm-3">
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
import axios from 'axios'

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
        }
      }
</script>
