from pymap3d import aer2ecef
from math import degrees,atan2, sqrt, sin, cos, radians, pi
import numpy as np
import matplotlib.pyplot as plt

R = 6378137
R2 = 20350000
flat = 298.257223563

a = 6378137.0 #!
b = 6356752.314245 #!
a2 = a*a #!
b2 = b*b #!
e2 = 1-(b2/a2) #!
e = e2/(1-e2) #!

def aer2enu(azi,ele,rang):
    z = rang*sin(radians(ele))
    r = rang*cos(radians(ele))
    x = r*sin(radians(azi))
    y = r*cos(radians(azi))
    return x,y,z

def ecef2geo3(x, y, z):
    a = 6378137.0 #!
    b = 6356752.314245 #!
    a2 = a*a #!
    b2 = b*b #!
    e2 = 1-(b2/a2) #!
    e = e2/(1-e2) #!
    p = np.sqrt(x*x + y*y) #!
    q = np.arctan2(a * z, b * p) #!
    
    sq = np.sin(q)  #!
    cq = np.cos(q)  #!
    
    sq3 = sq * sq * sq #!
    cq3 = cq * cq * cq #!
    
    phi = np.arctan2(z + e * b * sq3, p - e2 * a * cq3) #!
    lmd = np.arctan2(y, x)
    v = a / np.sqrt(1.0 - e2 * np.sin(phi) * np.sin(phi))
    
    lat = np.rad2deg(phi)
    lon = np.rad2deg(lmd)
    h = (p / np.cos(phi)) - v

    return lon,lat

def cyl2geo(rho,z,a,f):
    b = (1-f)*a
    e2 = f*(2-f)
    ep2 = e2/(1-e2)

    beta = atan2(z,(1-f)*rho)
    phi = atan2(z+b*ep2*pow(sin(beta),3),rho-a*e2*pow(cos(beta),3))

    betaNew = atan2((1-f)*sin(phi),cos(phi))
   
    count = 0;
    while((beta!=betaNew) and (count<5)):
        beta = betaNewphi = atan2(z+b*ep2*pow(sin(beta),3),rho-a*e2*pow(cos(beta),3))
        betaNew=atan2((1-f)*sin(phi),cos(phi))
        count+=1

    sinphi = sin(phi)
    N = a/sqrt(1-e2*pow(sinphi,2))
    h = rho*cos(phi)+(z+e2*N*sinphi)*sinphi-N

    return phi,h

def aer2geo2(azi,ele):
    sRange = sqrt(pow(R*cos(radians(ele)),2)+pow(R2,2)-pow(R,2))-R*cos(radians(ele))
    x,y,z = aer2ecef2(azi,ele,sRange)
    lon, lat = ecef2geo3(x,y,z)
    return lon,lat

def geo2ecef(lat,lon,alt):
    lat = radians(lat)
    lon = radians(lon)

    N = a**2/sqrt(a**2*cos(lat)**2 + b**2*sin(lat)**2)

    x = (N+alt)*cos(lat)*cos(lon)
    y = (N+alt)*cos(lat)*sin(lon)
    z = (N*(b/a)**2+alt)*sin(lat)

    return x,y,z

def aer2ecef2(azi,ele,rang):
    x,y,z = geo2ecef(36.0926,-76.3829,0.)
    x1,y1,z1 = aer2enu(azi,ele,rang)
    dx,dy,dz = enu2ecefv(x1,y1,z1,36.0926,-76.3829,0.)
    print(x,y,z)
    print(dx,dy,dz)
    x_f = x+dx
    y_f = y+dy
    z_f = z+dz
    
    return x_f,y_f,z_f

def enu2ecefv(x,y,z,x1,y1,z1):
    cosphi = cos(radians(x1))
    sinphi = sin(radians(x1))
    coslam = cos(radians(y1))
    sinlam = sin(radians(y1))

    t = cosphi*z-sinphi*y
    w = sinphi*z-cosphi*y

    u = coslam*t-sinlam*x
    v = sinlam*t-coslam*x

    return u,v,w

azieles = []
for j in range(91):
    aziele = []
    for i in range(365):
        aziele.append([i,j])
    azieles.append(aziele)

'''
        [267,44],
           [37,10],
           [75,6],
           [315,71],
           [109,9],
           [315,26],
           [161,21],
           [87,46],
           [53,64],
           [202,20],
           [265,8]]

print("lat\tlon\talt")
print("-------------------------------------------")
'''

lon,lat = aer2geo2(360,90)
print(lon,lat)

'''
for i,ae in enumerate(azieles):
    for coord in ae:
        lon,lat = aer2geo2(coord[0],coord[1])
        plt.ylim(-90,90)
        plt.xlim(-180,180)
        plt.ylabel('Latitude')
        plt.xlabel('Longitude')
        plt.scatter(lon,lat,c='black',s=1)
        #print(lon,lat, coord[0],coord[1])

    if i==90:
        plt.text(-50,0,"{},{}".format(round(lon,2),round(lat,2)))
    plt.savefig('{}.png'.format(i))
    plt.clf()
'''

#res = aer2geo(198,420)
#print(res[0],res[1],res[2])
