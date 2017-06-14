// JavaScript Document

console.log('SELECTION SORT');

function SelectionSort(array) {
	this.arr = array;	
}

SelectionSort.prototype.more = function (value1, value2) {
	return value1 > value2;
};

SelectionSort.prototype.less = function (value1, value2) {
	return value1 < value2;
};

SelectionSort.prototype.sortExplanation = function () {
	console.log('array is ', this.arr);

	var size = this.arr.length;
    var i;
    var j;
    var max;
    var temp;
    
    for (i = 0; i < size - 1; i++) {
        console.log('loop: ', i);
        max = 0; //initialize max = 0 every time loop runs
        for (j = 1; j < size - 1 - i; j++) {
            console.log('checking j: ', j, ', max is ', max, ', val1 is ', this.arr[j], ', val2 is ', this.arr[max]);
            if (this.more(this.arr[j], this.arr[max])) {
                max = j;
                console.log('new max is ', max);
            }
        }
        
        //swapping
        temp = this.arr[size - 1 - i];
        this.arr[size - 1 - i] = this.arr[max];
        this.arr[max] = temp;
        console.log('new array is ', mySort.arr);
    }

}

var array = [9, 1, 8, 2, 7, 3, 6, 4, 5];
var mySort = new SelectionSort(array);
mySort.sortExplanation();

console.log('final array is ', mySort.arr);