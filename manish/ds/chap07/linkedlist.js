
function Linkedlist() {
    this.length = 0;
    function Node(v, n) {
        console.log('check 1 type of: ', (typeof v))    ;
        console.log('check 2 value: ', v);
        console.log('check 3 n instanceof Linkedlist.Node: ', (n instanceof Linkedlist.Node));
        console.log('check 4 n !== null: ', (n !== null));
        console.log('check 5 n === null: ', (n === null));
        console.log('check 6 n === undefined: ', (n === undefined));
        if ((typeof v === 'number') && ((n !== null && n instanceof Linkedlist.Node) || n === null)) {
            this.value = v;
            this.next = n;
        } else if ((typeof v === 'number') && n === undefined) {
            this.value = v;
            this.next = null;
        } else {
            throw new Error('invalid arguments');
        }
    }
    Linkedlist.Node = Node;
    console.log(Linkedlist.Node);
}

Linkedlist.prototype.size = function() {
    return this.length;
}

Linkedlist.prototype.isEmpty = function() {
    return this.length === 0;
}

//Insertion

//A. Insertion of an element at the start of linked list

Linkedlist.prototype.addHead = function(value) {
    this.head = new Linkedlist.Node(value, this.head);
    this.length++;
}

//B. Insertion of an element at the end of linked list

Linkedlist.prototype.addTail = function(value) {
    var newNode = new Linkedlist.Node(value, null);
    var curr = this.head;
    this.length++;
    if (this.head === null) {
        this.head = newNode;
        return;
    }
    
    while ((curr.next != null)) {
        curr = curr.next;
    }
    
    curr.next = newNode;
}

//C. Insertion of an element at the Nth position in linked list

//D. Insertion of an element in sorted order in linked list

Linkedlist.prototype.sortedInsert = function (value) {
    var newNode = new Linkedlist.Node(value, null);
    var curr = this.head;
    this.length++;
    if (curr === null || curr.value > value) {
        newNode.next = this.head;
        this.head = newNode;
        return;
    }
    
    while (curr.next != null && curr.next.value < value) {
        curr = curr.next;
    }
    
    newNode.next = curr.next;
    curr.next = newNode;
}

//Traversing linked list
Linkedlist.prototype.print = function() {
    console.log('printing the list');
    var temp = this.head;
    while (temp != null) {
        console.log('value is ', temp.value);
        temp = temp.next;
    }
}


Linkedlist.prototype.isPresent = function(data) {
    var temp = this.head;
    while (temp != null) {
        if (temp.value === data) {
            return true;
        }
        
        temp = temp.next;
    };
    return false;
}

Linkedlist.prototype.removeHead = function() {
    if (this.isEmpty()) {
        throw new Error('Empty List');
    }
    
    var value = this.head.value;
    this.head = this.head.next;
    this.length--;
    return value;
}

var ll = new Linkedlist();
console.log(ll);
ll.addHead(10);
console.log(ll);
ll.addTail(12);
console.log(ll);
ll.addTail(13);
console.log(ll);
ll.sortedInsert(11);
console.log(ll);
ll.print();

console.log(ll.isPresent(19));
ll.removeHead();
ll.print();