<template>
  <div>
       <form v-on:submit.prevent="addExpenditures" enctype="multipart/form-data">
        <div class="container" align="left">
          <h3>Harcama Bilgileri</h3>
        </hr>
        <br>
        <div class="form-group">
          <label for="total">Toplam Tutar:</label>
          <input type="text" name="total" v-model="spaces.total" class="form-group" required> </input>
        </div>
      <div class="form-group">
        <label for="location">Harcama Yeri:</label>
        <input type="text" name="location" v-model="spaces.location" class="form-group"></input>
      </div>
      <label >Kategori :</label>
      <select name="category_id" v-model="spaces.category_id">
        <option value="" required>Seçim Yapınız</option>
        <option v-for="category in categories"
                  :value="category.id">{{category.category_name}}
       </option>
      </select>
      <div>
        <label for="date">Harcama Tarihi:</label>
        <input type="date" name="date" v-model="spaces.date" class="form-group" required></input>
      </div>
      <button type="submit" class="btn btn-primary btn-success">Gönder</button>
    </div>
  </form>
</div>
</template>

<script>
import axios from 'axios'

  export default{

    props:[
      'categories'
    ],
    data(){
      return{
        spaces:{
          total:'',
          location:'',
          category_id:'',
          date:'',
        },
      }
    },
    methods:{
      addExpenditures(){
        axios.post('/api/v1/create-expenditure',this.spaces)
          .then((response)=>{
              this.spaces={};
        })
          .catch((error)=>{
            console.log('Error');
        });
      },
  }
}
</script>
