<template>
    <div class="list-user">
        <h1> {{ textUser }} </h1>
        <componentUser v-bind:listUsers="listUsers"/> <!-- truyền biến sang bên componentUser -->
        <componentUser
                v-bind:listUsersAppListUser="listUsersApp"
                v-on:nameDeleteEventListUser="deteteEventListUser"
        /> <!-- truyền biến sang bên componentUser (từ tk App) -->
    </div>
</template>

<script>
import componentUser from './componentschild/ComponentUser.vue';
export default {
  name: 'component1',

  props: {
      listUsersApp: {
          default : [],
          type : Array
      }
  },

  data () {
    return {
      textUser: 'List user',
      listUsers:[
          {name: "Hùng", active: "true", tuoi: 24},
          {name: "Tuấn", active: "false", tuoi: 25},
          {name: "Hoan", active: "true", tuoi: 24},
      ]
    }
  },

  methods: {
    deteteEventListUser(data){
        this.$emit('nameDeleteUserApp',data);
    }
  },

  components: {
      componentUser
  }
}
</script>

<style>

</style>
