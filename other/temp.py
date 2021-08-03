from pymap3d import aer2ecef
from math import degrees,atan2, sqrt, sin, cos, radians, pi
import numpy as np
import matplotlib.pyplot as plt
import folium

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
    sRange = sqrt(pow(R*cos(radians(ele)),2)+pow(R2+R,2)-pow(R,2))-R*cos(radians(ele))
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
    dx,dy,dz = enu2ecefv(x1,y1,z1,36.0926,-76.3829)
    x_f = x+dx
    y_f = y+dy
    z_f = z+dz
    return x_f,y_f,z_f

def enu2ecefv(east,north,up,lat0,lon0):
    lat0 = radians(lat0)
    lon0 = radians(lon0)

    t = cos(lat0) * up - sin(lat0) * north
    w = sin(lat0) * up + cos(lat0) * north

    u = cos(lon0) * t - sin(lon0) * east
    v = sin(lon0) * t + cos(lon0) * east

    return u, v, w

lon,lat = aer2geo2(9,66)
print(lon,lat)

'''
plt.ylim(-180,180)
plt.xlim(-360,360)
plt.ylabel('Latitude')
plt.xlabel('Longitude')
plt.scatter(-76.3829,36.0926,c='red',marker='x',s=3)
plt.scatter(lon,lat,c='black',s=1)
plt.grid()
plt.text(50,50,"Elevation = {}, Azimuth = {}".format(ele,azi))
plt.savefig('{}_{}.png'.format(ele,azi))
'''
my_map = folium.Map(location=[36.0926,-76.3829], zoom_start=5)
points = []
points.append(tuple([lat,lon]))
for each in points:
    folium.CircleMarker(each,radius=0.1).add_to(my_map)
my_map.save('test.html')
