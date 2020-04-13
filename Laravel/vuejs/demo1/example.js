var vujsInstance = new Vue({
  el: '#app',
  data: {
    defaulColor : 0,
    listData : [
      {
        image : 'http://demo-acm-2.bird.eu/media/catalog/product/cache/c687aa7517cf01e65c009f6943c2b1e9/m/j/mj07-red_main.jpg',
        price : 20000,
        textcolor : 'Màu Đỏ',
        quantity : '10',
        color: 'red'
      },
      {
        image : 'http://demo-acm-2.bird.eu/media/catalog/product/cache/c687aa7517cf01e65c009f6943c2b1e9/m/j/mj07-black_main.jpg',
        price : 10000,
        textcolor : 'Màu Đen',
        quantity : '5',
        color: 'black'
      },
      {
        image : 'http://demo-acm-2.bird.eu/media/catalog/product/cache/c687aa7517cf01e65c009f6943c2b1e9/m/j/mj07-yellow_main.jpg',
        price : 15000,
        textcolor : 'Màu Vàng',
        quantity : '0',
        color: 'yellow'
      },
    ]
  },
 // change defaulColor image
  methods: {
    changColor(key){
      this.defaulColor = key;
    }
  }, 
  // return defaulColor image
  computed:{
    imageDefault(){
      return this.listData[this.defaulColor].image;
    }
  }
});


