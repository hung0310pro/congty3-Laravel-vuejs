// khi 1 đối tượng được khởi tạo thì khi truyền vào 1 obj(data), thì các thông tin liên quan
// tới dữ liệu(data) or methods(methods phải khi đúng methods nhé thì ms hiểu cái 'say là 1 hàm')
// nó sẽ tự động gắn vào đối tượng  vujsInstance

var vujsInstance = new Vue({
  el: '#app',
  data: {
    title : 'Điện thoại SamSung',  // thường
    link : 'Google',
    url : 'https://www.google.com.vn/', // attribute
    target : "_blank",
    isButtonDisabled : 'disabled',
    count : 0,
    a : 0,
    b : 0,
    number : 20,
    firstname : ''
  },

  methods: {
    say: function(text){
      return `Hello ${text}`;
    },

    ClickTest(){ // test click
      alert(11111);
    },

/*    addA(){
      console.log(1111111);
      return this.a + this.number;
    },

    addB(){
      console.log(22222222);
      return this.b + this.number;
    },*/

    ClickCount(e){
      console.log(333333);
      this.count += 1; // viết như này là đang trỏ tới tk count  : 0.
    },

    onSubmitForm(e){
      console.log(e);
    }
// bt khi ấn submit form thì nó sẽ reload trang sang 1 trang php
// v-on:submit.prevent="onSubmitForm($event)" cái này kiểu bỏ chuyển trang nếu submit form,
// cái này giống cái e.preventDefault(); của js
  }, 

//Tìm hiểu về Computed
/*+++ nếu để addA(), addB() thì nếu click vào cái button "A = A + 1" thì nó chạy cả vào 2 
hàm(http://prntscr.com/rxcghf) 
.còn nếu để trong computed thì nó chỉ chạy đúng hàm addA() thôi(vì có mỗi biến a thay đổi thôi). 
Tuy nhiên nó sẽ chạy cả 2 hàm addA(), addB() trong computed nếu như mà biến number thay đổi
(vì biến number nó được dùng trong cả 2 hàm trên)*/
// - vì vậy nếu có tính toán biến liên quan trong data mà để dang như cái (Computed) bên file html thì 
//nên dùng computed.
// lí do kỹ xem ở   
//https://www.youtube.com/watch?v=6l3Dv1KEuVs&list=PLv6GftO355AtDjStqeyXvhA1oRLuhvJWf&index=9

  computed:{
    addA(){
      console.log(1111111);
      return this.a + this.number;
    },

    addB(){
      console.log(22222222);
      return this.b + this.number;
    }
  }
});


