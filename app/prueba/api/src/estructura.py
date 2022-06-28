from ctypes import sizeof


class Cola():
    
    def __init__(self):
        self.cola = []
        self.size = 0

    def empty(self):
        return len (self.cola)==0

    def push(self,dato):
        self.cola += [dato]
        self.size

    def pop(self):
        if self.empty():
            print("La cola esta vacia")
        else:
            self.cola = [self.cola[i] for i in range (1,self.size)]
            self.size -= 1

    def show(self):
        n = self.size - 1
        while n > -1 :
            print("[%d] => %d"%(n,self.cola[n]) )
            n -= 1
            
    def front(self):
        if self.empty():
            print("Cola vacia")
        else:
            print("1er dato %d"%(self.cola[0]))
