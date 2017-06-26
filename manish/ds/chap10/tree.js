function Tree() {
    this.root = null;
    
    function Node(v, l, r) {
        if ((typeof v === 'number') && ((l != null && l instanceof Tree.Node) || l === null) && ((r != null && r instanceof Tree.Node) || r === null)) {
            this.value = v;
            this.lChild = l;
            this.rChild = r;
        } else if ((typeof v === 'number') && l === undefined && r === undefined) {
            this.value = v;
            this.lChild = null;
            this.rChild = null;
        } else {
            throw new Error('invalid input arguments');
        }
    }
    
    Tree.Node = Node;
}