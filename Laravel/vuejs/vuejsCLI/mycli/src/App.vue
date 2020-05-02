<template>
  <div id="app">
    <button v-on:click="titleApp = 'Thay đổi title header từ tk cha App.vue 123'">Thay đổi title header từ tk cha App.vue</button> <!-- thay đổi titleApp từ tk App.vue cho tk componentHeader -->

    <button @click="changeMessage">Change Message</button>

    <!-- props : truyền 1 biến đã được định nghĩa trong App(data) truyền sang tk ComponentHeader -->
    <componentHeader
            v-bind:titleHeaderApp="titleApp"
            v-on:nameTitleEvent="changTitleEvent"
    />  <!-- (3) truyền vào 1 attribute, truyền biến sang component là header, sau đó tạo 1 cái props trong tk con -->
      <!-- dữ liệu đc truyền sang bên kia,dữ liệu bên này,sự kiên gọi bên kia,function xử lí bên này -->

    <img src="./assets/logo.png">
    <componentListUser
            v-bind:listUsersApp="listUsersApp"
            v-on:nameDeleteUserApp="DeleteUserApp"
    />
    <!-- slot trong vuejs -->
    <componentUser>
        <div class="slot-invuejs">
            <p style="color: red;">
                Một cái beat thật child đưa ta về với bản chất
            </p>
        </div>
    </componentUser>

    <componentFooter />

    <!-- 29 Sử dụng Ref trong Vue -->
    <button v-on:click="RefFileDemoTest">Ref File Demo</button>
    <input id="fileupload" type="file" style="display: none;" ref="RefFileDemo">
  </div>
</template>

<script>
/* 1 component thì có nhiều component con
* App chứa (header, footer,listuser..., đây là chỗ khai báo import nó (1,2,3))
*
*  */
//(1)
import componentHeader from './components/ComponentHeader.vue';
import componentListUser from './components/ComponentListUsers.vue';
import componentFooter from './components/ComponentFooter.vue';
import componentUser from './components/componentschild/ComponentUser.vue';
export default {
  name: 'app',
  data () {
    return {
      msg: 'Welcome to Your Vue.js App',
      titleApp:'Đây là title header từ trang App.vue', // truyền biến sang component headera n
      listUsersApp:[
          {id: "100",name: "Hùng",tuoi: 24},
          {id: "101",name: "Long Phiên",tuoi: 24},
          {id: "102",name: "Đạt",tuoi: 24},
      ],

      message: {
        type: 'greeting',
        text: 'How are you?'
      }
    }
  },
  // (2)
  components: {
      componentHeader,
      componentFooter,
      componentListUser,
      componentUser
  },

  methods: {


      changTitleEvent(data){
         /* this.titleApp = "Đây là title được thay đổi fix cứng bên cha";*/
          this.titleApp = data.title;
      },

      DeleteUserApp(data){
          var indexDelete = -1;
          this.listUsersApp.forEach((value,key) => {
              if(value.id == data.idDelete){
                  indexDelete = key;
              }
          });
          if(indexDelete != -1) {
              this.listUsersApp.splice(indexDelete, 1);// vị trí xóa và số lượng xóa là 1(xóa đi phần tử cần xóa và trả về cái phần tử bị xóa đó)
          }
      },

      RefFileDemoTest(){
         this.$refs.RefFileDemo.click();
         /* $("#fileupload").trigger('click');*/

      },

      changeMessage() {
          this.message.text = 'this is new message';
      }
  },

  watch: {
    message: {
        handler: function () {
            console.log('something changed')
        },
        deep: true
    }
  }
}
</script>

<style>
#app {
  font-family: 'Avenir', Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}

h1, h2 {
  font-weight: normal;
}

ul {
  list-style-type: none;
  padding: 0;
}

li {
  display: inline-block;
  margin: 0 10px;
}

a {
  color: #42b983;
}
</style>
<!--
thay đổi theo dự kiện :
- Nếu từ thằng cha truyền biến sang tk con sau đó đổi biến từ tk cha thì được
- Nếu muốn thay đổi giá trị biến từ con(mà đc tk cha truyền sang) thì phải dùng "Event"
 ( v-on:nameTitleEvent="changTitleEvent"(3) khai báo như vậy trong component của tk cha(1 cái là name sự kiện, cái còn lại là tên của methods chạy sự kiện))
  -- Truyền sự kiện thông báo ra ngoài
  -- Kích hoạt sự kiện trong tk cha (như ví dụ này thì là nameTitleEvent(đây là name của event))
  -- Khi được kích hoạt thì sự kiện sẽ chạy(sự kiện nameTitleEvent sẽ chạy) từ đó dữ liệu đc thay đổi

 Đây là đoạn viết bên tk con
 -- tạo 1 function để gọi tới sự kiện bên cha và truyền biến
  methods: {
      changTitleHeaderApp(){
          var data = {
              title:'đây là title của Component Header change 2'
          };
          /* call đến sự kiện bên tk cha, và truyền dữ liệu muốn đổi sang đó */
          this.$emit('nameTitleEvent', data);
      }
  }
 -- Đây là đoạn xử lí bên cha, khi đã nhận được dữ liệu từ bên tk con
  methods: {
      changTitleEvent(data){
         /* this.titleApp = "Đây là title được thay đổi fix cứng bên cha";*/
          this.titleApp = data.title;
      }
  }
// Ngoài ra còn xóa dữ liệu trong mảng dựa theo "Event Lồng Event" (App, ComponentListUser,ComponentUser).
-->