for (let z = 0; z < 10; z++) {
  if (z % 2 != 0) console.log(z);
}

let names = ["john", "doe", "luke", "dom"];
for (let index in names) {
  console.log(index, names[index]);
}

//
var x = "y";
console.log(typeof x);

// if statment
var a = 20;
var b = 10;
if (a > b) {
  console.log("A is greater");
}

// logical operator statement
var age = 22;
if (age >= 18 && age <= 21) {
  console.log("yes you are eligible");
} else {
  console.log("condition is not true");
}

var age = 22;
if (age >= 18 || age <= 21) {
  console.log("yes you are eligible");
}

var a = 22;
console.log(!a >= 12);

var a = 22;
if (!a >= 12) {
  console.log("yes you are eligible");
} else {
  console.log("condition is not true");
}

// if else statement

var x = 15;
if (x > 30) {
  console.log("x is greater");
} else {
  console.log("x is smaller");
}

var x = 100;
if (x == 100) {
  console.log("x is same");
} else {
  console.log("x is not same");
}

var x = "100";
if (x === 100) {
  console.log("x is same");
} else {
  console.log("x is not same");
}

var x = 100;
if (x != 100) {
  console.log("x is same");
} else {
  console.log("x is not same");
}

// Example
var gender = "male";
if (gender == "male") {
  console.log("hello Mr");
} else {
  console.log("hello Miss");
}

// Example

/*var per = prompt("Enter your percentage");
if (per >= 80 && per <= 100) {
  alert("you're in first division");
} else if (per >= 60 && per < 80) {
  alert("you're in second division");
} else if (per >= 40 && per < 60) {
  alert("you're in third division");
} else if (per >= 33 && per < 40) {
  alert("you're in fourth division");
} else if (per < 33) {
  alert("you're fail");
} else {
  alert("enter valid percentage");
}*/

/*var weight = prompt("first value");
var height = prompt("second value ");
if (weight >= height) {
  alert(weight);
} else if (weight <= height) {
  alert(height);
} else {
  alert("value is same");
}*/

const myobj = {
  name: "John",
  game: function () {
    return "GTA";
  },
};
console.log(myobj.game());

function Calculate() {
  var weight = prompt("Enter your weight in kg");
  var height = prompt("Enter your height in cm");
  if (weight <= 80 && height <= 170) {
    alert("You are slim and short");
  } else if (weight <= 80 && height >= 170) {
    alert("You are tall and slim");
  } else {
    alert("You have to lose some weight");
  }
}

// function with paramter
function hello(fname, lname) {
  console.log("Hello" + " " + fname + " " + lname);
}
hello("hello", "world");

// OR
function hello(fname = "hello", lname = "world ") {
  console.log("Hello" + " " + fname + " " + lname);
}
hello();

// function with return property
function fullName(fname = "hello", lname = "world") {
  var a = fname + " - " + lname;

  return a;
}
// var fn = fullName("john", "doe");
// document.write(fn);

// percentage with return value
function sum(math, eng, chem) {
  var s = math + eng + chem;

  return s;
}

// var total = sum(80, 60, 70);
// function percentage(tt) {
//   var per = (tt / 300) * 100;
//   document.write(per);
// }
// percentage(total);

// Events (onclick)

/*var time = prompt("Hey Whats the time: ");
if (time > 5 && time < 17) {
  alert("Good Morning");
} else if (time > 12 && time < 21) {
  alert("Good afternoon");
} else {
  alert("Good Evening");
}*/

/* ====== new js practice code ======= */

/* ======= old js code ======

// IF ELSE --------

 var time = prompt("Hey Whats the time: ");
if (time > 5 && time < 17) {
    alert("Good Morning");
} else if (time > 12 && time < 21) {
    alert("Good afternoon")
} else {
    alert("Good Evening")
} 

// GETTING VALUE IN BUTTON -------------

let helloBtn = document.querySelector("button");
helloBtn.addEventListener("click", InputMsg);

function InputMsg() {
  let name = prompt("Enter name of student");
  helloBtn.textContent = "button no. 1:" + name;
}

// SITCH CASE ------------

 var fruittype = prompt(" which fruit do you want?")
switch (fruittype) {
    case 'Orange':
        console.log('Orange is 60rs per dozen.');
        break;
    case 'Apple':
        console.log('Apple is 120rs per kg.');
        break;
    case 'Banana':
        console.log('Banana is 50rs per dozen.');
        break;
    case 'Mango':
        console.log('Mango is 160res per kg.');
        break;
    case 'Guava':
        console.log('Guava is 100rs per kg.');
        break;
    default:
        console.log(`${fruittype} has been sold.`);
}
console.log("anything else?");

// FOR LOOP ----------

for (let i = 0; i < 10; i++) {
  console.log("Hello World!");
}

// TABLE IN LOOP ----------

for (let i = 5; i < 51; i = i + 5) {
  console.log(i);
}

var i;
for (i = 1; i <= 20; i++) {
  console.log(5 * i);
}

// EVEN NUMBER IN --------

for (let i = 0; i < 10; i++) {
  if (i % 2 == 0) console.log(i);
}

// ODD NUMBER IN --------

for (let i = 0; i < 10; i++) {
  if (i % 2 != 0) console.log(i);
}

// WHILE LOOP --------

let a = 10;
while (a >= 0) {
  console.log("Hello World");
  a--;
}

// DO WHILE LOOP --------

let j = 0;
do {
  console.log("hello world");
  j++;
} while (j > 10);

// FOR IN LOOP --------

let animal = {
  name: "zebra",
  leg: 4,
};

for (let key in animal) {
    console.log(animal.name)
}

// get varible and its value --------

for (let key in animal) {
  console.log(key, animal[key]);
}

// ARRAYS --------

let names = ["Toyota", "Suzuki", "Kia", "Honda"];
for (let index in names) {
  console.log(index, names[index]);
}

// FOR OF LOOP --------

for (let name of names) {
  console.log(name);
}

//
document.querySelector(".heading").innerHTML = "hello World !";
document.querySelector(".button").innerHTML = "Submit";

var x = [-2, 3, -7, 5, 6, 4, -8, 0, -7, -9, 5, 2, 1];
var y = [];
var zeroCount = 0,
  posCount = 0,
  negativeCount = 0;
for (var i = 0; i < x.length; i++) {
  if (x[i] > 0) {
    posCount++;
  }
  if (x[i] < 0);
  {
    negativeCount++;
  }
  if (x[i] == 0) {
    zeroCount++;
  }
}

console.log("ZeroCount: " + zeroCount);
console.log("PositiveCount: " + posCount);
console.log("NegativeCount: " + negativeCount);

var x = [-2, 3, -7, 5, 6, 4, -8, 0, -7, -9, 5, 2, 1];
var zeroCount = 0,
  posCount = 0,
  negativeCount = 0;
x.forEach((item) => {
  if (item === 0) {
    zeroCount++;
  } else if (item < 0) {
    negativeCount++;
  } else if (item > 0) {
    posCount++;
  }
});

console.log("ZeroCount: " + zeroCount);
console.log("PositiveCount: " + posCount);
console.log("NegativeCount: " + negativeCount);
*/
