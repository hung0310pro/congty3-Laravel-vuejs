<template>
    <div class="user">
        <h1
            v-for="(value,index) in listUsers"
            v-bind:key="index"
            v-if="value.active == 'true'"
        >
            Name : {{ value.name }}, Tuổi : {{ value.tuoi }}
        </h1>

        <br><br>
        <h1>Demo slot test</h1>
        <slot></slot>

        <br><br>
        <p>Đây là đoạn array truyền từ bên App -> ComponentListUser -> sang đây</p>
        <h1
            v-for="(value,index) in listUsersAppListUser"
            v-bind:key="index"
        >
            <button v-on:click="DetelteUser(value.id)">Delete</button>
            Name1 : {{ value.name }}, Tuổi1 : {{ value.tuoi }}
        </h1>
    </div>
</template>

<script>
export default {
  name: 'componentusers',

  props: {
    listUsers:{
        /*default: [],*/
        type: Array
    },
    listUsersAppListUser:{
        type: Array
        /*default: []*/
    }
  },

  data () {
    return {

    }
  },

  methods: {
      // truyền id của tk muốn xóa sang cho tk ComponentListUser rồi từ đó lại ném sang cho tk App(là nơi khai báo ra tk mảng listUsersAppListUser)
      DetelteUser(id){
          var data = {
              idDelete : id
          };
          this.$emit('nameDeleteEventListUser',data);
      }
  }

}
</script>

<style>

</style>
