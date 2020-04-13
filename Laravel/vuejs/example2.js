// từ bài 11 -> 20

var vujsInstance = new Vue({
  el: '#app2',
  data: {
    classtest:'testcondition1',
    items: [
      { name: 'Cà phê' },
      { name: 'Trà đặc' },
      { name: 'Bò húc' }
    ],

    ofitems: {
       mon: 'Phở bò',
       gia: '100000',
       diachi: 'Hà Nội' 
    },

    itemsCondition: [
      { name: 'Cà phê',isActive : true },
      { name: 'Trà đặc',isActive : true },
      { name: 'Bò húc',isActive : false }
    ]
  },

  methods: {
    Condition(){
      if(this.classtest == 'testcondition1'){
        this.classtest = 'testcondition2';
      } else if(this.classtest == 'testcondition2'){
        this.classtest = 'testcondition1';
      }
      
    }
  }, 

  computed:{
    itemsConditionComputed(){
      return this.itemsCondition.filter(function(u){ //(1)
        // hàm filter là hàm có sẵn của js
        // cái u này để trỏ tới các phần tử trong mảng or obj
        return u.isActive;
      });

/*
cái đoạn (1) ở trên như là nó for dữ liệu có trong mảng(this.itemsCondition.filter(function(u)) 
ra rồi check tk nào 
là active thì cho show k thì thôi ấy.
*/
    }
  }
});


