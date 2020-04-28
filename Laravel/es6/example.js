let a = 3
if (true) {
    let a = 5;
    a = 6;
    console.log(a);
}

console.log(a);

// Template strings
let nam = 1996;
var string = `đây là Lê Hùng ${nam}`; // tương đương vs  "đây là Lê Hùng" + nam;
console.log(string);

let aa = {
	namsinh : 1996,
	name : "Lê Hùng"
}

var string1 = `đây là ${aa.name} sinh năm ${aa.namsinh}`;
console.log(string1);

// for
let array =  [
   "Hùng",
   "Tuấn",
   "Long",
   "Hoan",
   "Đạo"
];
 
for(let index in array){ (3)
   console.log(index); // in ra key của mảng
   console.log(array[index]);  // in ra value của mảng
} 

for(let index of array){
   console.log(index); // in ra value của mảng luôn
} 

// Rest params
function testParams (...value){
	console.log(value);
}

testParams(1,2,3,4,7,1);
//[1, 2, 3, 4, 7, 1]


// Destructuring Nested Objects
const Person = {
  name: "John Snow",
  age: 29,
  sex: "male",
  materialStatus: "single",
  address: {
    country: "Westeros",
    state: "The Crownlands",
    city: "Kings Landing",
    pinCode: "500014",
  },
};

const { address : { state, pinCode, city}, name} = Person;
console.log(name, state, pinCode, city) // John Snow The Crownlands 500014
//console.log(sex) // Reference Error

/*chuyển obj về dạng mảng*/

var obj = {
  firstName: 'Vipul',
  lastName: 'Rawat',
  age: 22,
  country: 'India',
};

const entries = Object.entries(obj);
console.log(entries); 