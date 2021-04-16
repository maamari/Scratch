import socket
from _thread import *

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

# Accept new client on thread
def new_client(client):
    while True:
        '''
        NEED TO FIX:
        There's a bug in here, for the first pass of data sent to a client, multiple values are combined and sent at once. 
        '''
        #if i==0: continue 
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
    
    new_client(cli)
    #start_new_thread(new_client, (cli, ))
bridge_sock.close()
