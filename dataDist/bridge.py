import socket
from _thread import *
import threading

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

# Listen for client
print('Waiting for client...')
bridge_sock.listen(5)

# Accept new client on threads
def new_client(client):
    while True:
        data = sock.recv(BUFFER_SIZE)    
        print(data.decode('utf-8'))    
        for c in clients:
            try: c.sendall(data)            
            except socket.error as e:
                print(str(e))
                clients.remove(c)
    client.close()
    sock.close()

# Accept/place clients on threads
while True:
    cli, addr = bridge_sock.accept()
    clients.append(cli)
    print('Connected to: ' + addr[0] + ':' + str(addr[1]))
    print(clients)

    #new_client(cli)
    #start_new_thread(new_client, (cli, ))
    for c in clients:
        thread1 = threading.Thread(target = new_client, args = (c, ))
    thread1.start()

bridge_sock.close()
