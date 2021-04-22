import socket
import threading
import queue
import time

sock = socket.socket()
bridge_sock = socket.socket()
SERV_IP = '127.0.0.1'
SERV_PORT = 2222
BRIDGE_IP = '127.0.0.1'
BRIDGE_PORT = 2002
BUFFER_SIZE = 2048
clients = []

# Connect bridge to server
print('Connecting to server...')
try:
    sock.connect((SERV_IP, SERV_PORT))
except socket.error as e:
    print(str(e))

# Start up bridge
try:
    bridge_sock.bind((BRIDGE_IP, BRIDGE_PORT))
except socket.error as e:
    print(str(e))

print('Listening for clients...')
bridge_sock.listen(50)

# Accept new client on threads
def new_client(clis):
    firstPass = True
    while True:
        data = sock.recv(BUFFER_SIZE)    
        print(data.decode('utf-8'))    
        for c in clients:
            if firstPass:
                firstPass = False
                continue
            try: c.sendall(data)            
            except socket.error as e:
                print(str(e))
                clients.remove(c)
        time.sleep(1)
    clis.close()
    sock.close()

# Accept/place clients on threads
threading.Thread(target = new_client, args = (clients, )).start()
while True:
    cli, addr = bridge_sock.accept()
    clients.append(cli)
    print('Connected to: ' + addr[0] + ':' + str(addr[1]))

bridge_sock.close()
