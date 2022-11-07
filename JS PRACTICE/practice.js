// ==== STRING ====

function hideText() {
  document.getElementById("text").style.visibility = "hidden";
}
function showText() {
  document.getElementById("text").style.visibility = "visible";
}

var txt1 = "Hello World";
document.getElementById("demo").innerHTML = txt1.indexOf("World");

var txt2 = "Hello World";
document.getElementById("demo").innerHTML = txt2.replace("World");

var txt3 = "Hello World";
document.getElementById("demo").innerHTML = txt3.replace("World", "Universe");

var txt4 = "Hello World";
document.getElementById("demo").innerHTML = txt.toLowerCase();

var txt5 = "Hello World";
document.getElementById("demo").innerHTML = txt.toUpperCase();

let text1 = "sea";
let text2 = "food";
let result = text1.concat(text2);

document.getElementById("concatText").innerHTML = result;

// ==== ARRAY ====

var cars = ["Saab", "Volvo", "BMW"]; // Create the array here
document.getElementById("demo").innerHTML = cars;

// Use the length property to add a new item to cars: Mercedes.
var cars = ["Saab", "Volvo", "BMW"];
cars[cars.length] = "Mercedes";
document.getElementById("demo").innerHTML = cars;

// separated by '|'
var cars = ["Saab", "Volvo", "BMW"];
console.log("join = " + cars.join(" | "));

// Push And Pop
fruits.push("kiwi"); // add value
console.log("push = " + fruits);
fruits.pop("kiwi"); // Remove value (from last)
console.log("pop = " + fruits);

// Shift And Unshift
fruits.shift(); // remove value (from start)
console.log("shift = " + fruits);
fruits.unshift("kiwi"); // add value (from start)
console.log("unshift = " + fruits);

// Change element
fruits[0] = "apple";
console.log("change = " + fruits);

// Change last element
fruits[fruits.length] = "pineapple";
console.log("change last element = " + fruits);

// Delete element
delete fruits[0];
console.log("Delete = " + fruits); // It will leave undefined holes in the array so its better to use "pop" or "Shift"

// Splice
var fruits = ["banana", "apple", "kiwi"];
fruits.splice(2, 0, "lemon", "mango"); // add element in any position
console.log("Splice = " + fruits);

fruits.splice(0, 1); // remove first and second element
console.log("Splice Remove = " + fruits);

// Join
var girls = ["Cecilie", "Lone"];
var boys = ["Emil", "Tobias", "Linus"];
var children = girls.concat(boys);
document.getElementById("demo").innerHTML = children;

// Join (more than 2 element )
var array1 = ["Tom", "John"];
var array2 = ["Smith", "Jessi"];
var array3 = ["Bob", "Rocky"];
var myArray = array1.concat(array2, array3);
console.log(myArray);

// Slice
fruits = ["banana", "apple", "kiwi", "mango"];
// eg : 1
var fruits2 = fruits.slice(1); // everything from (1)orange will be a new array
console.log(fruits2);
// eg : 2
var fruits3 = fruits.slice(1, 3); // it will give value from 1 to 2
console.log(fruits3);

// Sort
var fruits = ["banana", "apple", "kiwi"];
console.log("Sort = " + fruits.sort()); // asscending order

// Reverse
console.log("Sort = " + fruits.reverse()); // Descending order
