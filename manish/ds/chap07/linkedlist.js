
function Linkedlist() {
    this.length = 0;
    function Node(v, n) {
        console.log('check 1: ', (typeof v))    ;
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

var ll = new Linkedlist();
console.log(ll);