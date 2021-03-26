<template>
  <div class="container">
    <div class="panel-body" align="center"><strong>Kategoriye Göre Harcama Yeri</strong></div>
      <div align="center">
        <div class="row ">
          <table width=100% align="center">
            <tr>
              <div v-for="categories in category">
                  <div class="col">
                    <strong>{{category.category_name}}</strong>
                      <div v-for="categoryExpenditures in categoryExpenditureses">
                        <div v-if="categoryExpenditure.category_id==category.id">
                          {{categoryExpenditure.location}}
                        </div>
                      </div>
                    </div>
                </div>
              </tr>
            </table>
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
          'categoryExpenditureses',
          'category'
        ],
        data(){
          return{
            categoryExpenditures:null
          }
        },
        methods:{
          loadCategoryExpenditures(){
            axios.get('api/v1/category-expenditures')
              .then((response)=>{
                this.categoryExpenditures=response.data.data;
              })
          }
        },
      }
</script>
