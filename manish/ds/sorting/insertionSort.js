// JavaScript Document

console.log('INSERTION SORT');

function InsertionSort(array) {
	this.arr = array;	
}

InsertionSort.prototype.more = function(value1, value2) {
	return value1 > value2;
}

InsertionSort.prototype.less = function(value1, value2) {
	return value1 < value2;
}

InsertionSort.prototype.sortExplanation = function() {
	console.log('array is ', this.arr);

	var size = this.arr.length;
	var temp;
	var i;
	var j;
	var swapped = 0;

	//step 1 outer loop
	for ( i = 1; i < size; i++) {
		swapped = 0;
		temp = this.arr[i];
		console.log('temp is ', temp);
		//Step 1 inner loop
		//start from i i.e. 1 and go backward towards 0
		for (j = i; j > 0; j--) {
			console.log('j is ', j, ', value is ', this.arr[j], ', one minus is ', this.arr[j - 1]);
			if (this.more(this.arr[j - 1], temp)) {
				this.arr[j] = this.arr[j - 1];
				this.arr[j - 1] = temp;
				swapped++;
			}
		}
		if (swapped > 0) {
			console.log('value ', temp, ' is swapped ', swapped, ' times');	
		} else {
			console.log('value ', temp, ' is not swapped');
		}
		console.log('new arr is ', this.arr);
	}

}

var array = [9, 1, 8, 2, 7, 3, 6, 4, 5];
var is = new InsertionSort(array);
is.sortExplanation();

console.log('final array is ', is.arr);