'''
Server test
'''
import socket
import sys

if len(sys.argv) == 3:
    # Get "IP address of Server" and also the "port number" from
    # argument 1 and argument 2
    IP = sys.argv[1]
    PORT = int(sys.argv[2])
else:
    print("Run like : python3 server.py <arg1:server ip:this \
           system IP 192.168.1.6> <arg2:server port:4444 >")
    IP = "localhost"
    PORT = 8000

# Create a UDP socket
s = socket.socket(socket.AF_INET, socket.SOCK_DGRAM)
# Bind the socket to the port
server_address = (IP, PORT)
s.bind(server_address)
print("Do Ctrl+c to exit the program !!")

while True:
    print("####### Server is listening #######")
    data, address = s.recvfrom(1024)
    print("\n\n 2. Server received: ", data.decode('utf-8'), "\n\n")
    #send_data = input("Type some text to send => ")
    #s.sendto(send_data.encode('utf-8'), address)
    #print("\n\n 1. Server sent : ", send_data,"\n\n")
