<template>
    <header>
        <h1> {{ titleHeaderApp }} </h1>
        <button v-on:click="changTitleHeaderApp">Thay đổi title header từ tk con componentHeader</button>
    </header>
</template>

<script>
export default {
  name: 'component-header',
  // khai báo biến được truyền từ tk cha(App.vue) sang đây, dạng type là gì(cái default k cần thiết lắm)
  props: {
   titleHeaderApp:{
       default: 'Header Vuejs',
       type: String
   }
  },
  data () {
      return {

      }
  },
  methods: {
  // thay đổi theo dự kiện(App.vue), vì tk con k có quyền sửa giá trị của dữ liệu gốc ở bên tk cha(App.vue)
      changTitleHeaderApp(){
          var data = {
              title:'đây là title của Component Header change 2'
          };
          /* call đến sự kiện bên tk cha, và truyền dữ liệu muốn đổi sang đó */
          this.$emit('nameTitleEvent', data);
      }
  }
}
</script>

<style>

</style>
