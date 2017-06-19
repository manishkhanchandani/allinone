function main() {
    var numbers = new Array(10);
    var sum = 0;
    for (var index = 0; index < numbers.length; index++) {
        numbers[index] = index;
    }
    
    document.writeln("Array elements are: " + numbers);
}

main();