@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
        @foreach($proyectosArray as $proyecto)
            <div class="col-md-6">
                <ul class="list-group">
                    <li class="list-group-item active">{{ $proyecto['titulo_pry'] }}</li>
                    <li class="list-group-item">{{ $proyecto['descripcion_pry'] }}</li>
                    <li class="list-group-item">{{ $proyecto['requisitos_pry'] }}</li>
                    <li class="list-group-item">{{ $proyecto['pago_pry'] }}</li>
                    <li class="list-group-item">{{ $proyecto['vacantes_pry'] }}</li>
                </ul>
            </div>
        @endforeach
        <div>
            <button class="btn-1" onclick="func()">Boton</button>
        </div>
    </div>
</div>
@endsection

<script>
    //SCRIPT MAX HEAP MIN HEAP
    /*
    class MaxHeap {
        constructor() {
            this.values = [];
        }

        // index of the parent node
        parent(index) {
            return Math.floor((index - 1) / 2);
        }

        // index of the left child node
        leftChild(index) {
            return (index * 2) + 1;
        }

        // index of the right child node
        rightChild(index) {
            return (index * 2) + 2;
        }

        // returns true if index is of a node that has no children
        isLeaf(index) {
            return (
                index >= Math.floor(this.values.length / 2) && index <= this.values.length - 1
            )
        }

        // swap using ES6 destructuring
        swap(index1, index2) {
            [this.values[index1], this.values[index2]] = [this.values[index2], this.values[index1]];
        }


        heapifyDown(index) {

            // if the node at index has children
            if (!this.isLeaf(index)) {

                // get indices of children
                let leftChildIndex = this.leftChild(index),
                    rightChildIndex = this.rightChild(index),

                    // start out largest index at parent index
                    largestIndex = index;

                // if the left child > parent
                if (this.values[leftChildIndex] > this.values[largestIndex]) {
                    // reassign largest index to left child index
                    largestIndex = leftChildIndex;
                }

                // if the right child > element at largest index (either parent or left child)
                if (this.values[rightChildIndex] >= this.values[largestIndex]) {
                    // reassign largest index to right child index
                    largestIndex = rightChildIndex;
                }

                // if the largest index is not the parent index
                if (largestIndex !== index) {
                    // swap
                    this.swap(index, largestIndex);
                    // recursively move down the heap
                    this.heapifyDown(largestIndex);
                }
            }
        }

        heapifyUp(index) {
            let currentIndex = index,
                parentIndex = this.parent(currentIndex);

            // while we haven't reached the root node and the current element is greater than its parent node
            while (currentIndex > 0 && this.values[currentIndex] > this.values[parentIndex]) {
                // swap
                this.swap(currentIndex, parentIndex);
                // move up the binary heap
                currentIndex = parentIndex;
                parentIndex = this.parent(parentIndex);
            }
        }

        add(element) {
            // add element to the end of the heap
            this.values.push(element);
            // move element up until it's in the correct position
            this.heapifyUp(this.values.length - 1);
        }

        // returns value of max without removing
        peek() {
            return this.values[0];
        }

        // removes and returns max element
        extractMax() {
            if (this.values.length < 1) return 'heap is empty';

            // get max and last element
            const max = this.values[0];
            const end = this.values.pop();
            // reassign first element to the last element
            this.values[0] = end;
            // heapify down until element is back in its correct position
            this.heapifyDown(0);

            // return the max
            return max;
        }

        buildHeap(array) {
            this.values = array;
            // since leaves start at floor(nodes / 2) index, we work from the leaves up the heap
            for(let i = Math.floor(this.values.length / 2); i >= 0; i--){
                this.heapifyDown(i);
            }
        }

        print() {
            let i = 0;
            while (!this.isLeaf(i)) {
                console.log("PARENT:", this.values[i]);
                console.log("LEFT CHILD:", this.values[this.leftChild(i)]);
                console.log("RIGHT CHILD:", this.values[this.rightChild(i)]);
                i++;
            }
        }
    }
    */
    /*
    function func() {
        console.log("presionado");
        const maxheap = new MaxHeap();
        var proyectos = []
        @foreach($proyectosArray as $proyecto)
            proyectos.push({{$proyecto['pago_pry']}})
            maxheap.add({{$proyecto['pago_pry']}})
        @endforeach
            console.log(proyectos)
        maxheap.print();
    }
    */

    // COLAS
    class Nodo {
        constructor(value) {
            this.value = value;
            this.next = null;
        }
    }

    class Cola {
        constructor() {
            this.head = null;
            this.tail = null;
            this.length = 0;
        }

        ponerenCola(value) {
            const node = new Nodo(value); // Crea el nodo usando la clase Nodo

            if (this.head) { // Si sale el primer nodo
                this.tail.next = node; // Inserta el nodo creado después de la cola
                this.tail = node; // Ahora el nodo creado es el último nodo
            } else { // Si no hay nodos en la cola
                this.head = node; // El nodo creado lo llamaré 'head'
                this.tail = node // También el nodo creado es una cola en la cola porque es único
            }

            this.length++; // Aumenta la longitud de la cola en 1
        }

        eliminarCola() {
            const current = this.head; // Guarda el enlace en el 'head' que debemos eliminar
            this.head = this.head.next; // Mueve el enlace 'head' al segundo nodo en la cola
            this.length--; // Decrementamos la longitud de la cola

            return current.value; // Devuelve el valor del nodo eliminado
        }

        mostrar() {
            let actual = this.head; // Guarda un enlace en el 'head' de la cola

            while(actual) { // Pasa por cada nodo de la cola
                console.log(actual.value); // Imprime el valor del nodo en la consola
                actual = actual.next; // Mueve el enlace al siguiente nodo después del 'head'
            }
        }

        siEstaVacio() {
            return this.length === 0;
        }

        obtenerPrimerNodo() {
            return this.head.value;
        }

        obtenerCantidadNodos() {
            return this.length;
        }
    }

    function func() {
        console.log("presionado");
        const cola = new Cola();
        var proyectos = []
        @foreach($proyectosArray as $proyecto)
        proyectos.push({{ $proyecto['pago_pry']}})
        cola.ponerenCola({{ $proyecto['pago_pry']}})
        @endforeach
        console.log(proyectos)
        console.log("mostrar")
        console.log(cola.mostrar())
    }



</script>
