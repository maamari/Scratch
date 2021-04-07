import socket
import thread

# Host IP/Port
tcpIP = '123.4.5.6'
tcpPort = 2222
BUFFER = 1024

# Accept new client on thread
def new_client():
    while True:
        data = client.recv(BUFFER)
        reply = "Connected to server!"
        client.send(reply)
    client.close()

# Start server
sock = socket.socket()
try:
    sock.bind((tcpIP, tcpPort))
    print("Server started")
except socket.error as e:
    print(str(e))

# Wait for connection
sock.listen(5)

# Accept clients and place on threads
num_threads = 0
while True:
    cli, addr = s.accept()
    thread.start_new_thread(new_client,(cli,addr))

