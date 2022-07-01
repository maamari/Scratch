import socket
import sys
import time
import json
import random

if len(sys.argv) == 3:
    # Get "IP address of Server" and also the "port number" from argument 1 and argument 2
    ip = sys.argv[1]
    port = int(sys.argv[2])
else:
    print("Run like : python3 client.py <arg1 server ip 192.168.1.102> <arg2 server port 4444 >")
    #exit(1)
    ip = "localhost"
    port = 8000

# Create socket for server
s = socket.socket(socket.AF_INET, socket.SOCK_DGRAM, 0)
print("Do Ctrl+c to exit the program !!")

# Let's send data through UDP protocol
# Modified to send an integer every 5 seconds
count = 0
while True:
    count = count + 1

    # Todo: get these values from sim
    # Testing
    roll = random.uniform(0.1,1)
    pitch = random.uniform(0.1, 1)
    yaw = random.uniform(0.1, 360)
    altitude = random.uniform(5000, 10000)
    speed = random.uniform(100, 1000)
    delta_speed = random.uniform(0, 1)
    delta_altitude = random.uniform(0, 1)
    skid = random.uniform(0, 1)
    flight_path_up = random.uniform(0, 1)
    flight_path_right = random.uniform(0, 1)

    # End Testing

    data = \
    {
        "roll":roll,
        "pitch":pitch,
        "yaw":yaw,
        "altitude":altitude,
        "speed": speed,
        "delta_speed":delta_speed,
        "delta_altitude": delta_altitude,
        "skid":skid,
        "flight_path_up":flight_path_up,
        "flight_path_right":flight_path_right,
        "count": count
    }

    # Create JSON object and send
    json_data = json.dumps(data)
    send_data = str(count) #input("Type some text to send =>");
    #s.sendto(send_data.encode('utf-8'), (ip, port))
    s.sendto(json_data.encode('utf-8'), (ip, port))
    time.sleep(.05)
    print("Sent " + json_data)
    #print("\n\n 1. Client Sent : ", send_data, "\n\n")
    #data, address = s.recvfrom(4096)
    #print("\n\n 2. Client received : ", data.decode('utf-8'), "\n\n")
# close the socket
s.close()