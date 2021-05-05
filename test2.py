from pymap3d import aer2ecef
from math import degrees,atan2, sqrt, sin, cos, radians, pi
import numpy as np

R = 6378137.0
R2 = 20350000
flat = 298.257223563

def ecef2geo3(x, y, z):
	a = 6378137.0
	b = 6356752.314245
	a2 = a*a
	b2 = b*b
	e2 = 1-(b2/a2)
	e = e2/(1-e2)
	p = np.sqrt(x*x + y*y)
	q = np.arctan2(a * z, b * p)

	sq = np.sin(q)
	cq = np.cos(q)

	sq3 = sq * sq * sq
	cq3 = cq * cq * cq

	phi = np.arctan2(z + e * b * sq3, p - e2 * a * cq3)
	lmd = np.arctan2(y, x)
	v = a / np.sqrt(1.0 - e2 * np.sin(phi) * np.sin(phi))

	lat = np.rad2deg(phi)
	lon = np.rad2deg(lmd)
	h = (p / np.cos(phi)) - v

	print(round(lat,2),round(lon,2),round(h,2))

def aer2geo2(azi,ele):
    sRange = sqrt(pow(R*cos(radians(ele)),2)+pow(R2,2)-pow(R,2))-R*cos(radians(ele))
    x,y,z = aer2ecef2(azi,ele,sRange)
    ecef2geo3(x,y,z)

def aer2ecef2(azi,ele,rang):
    x,y,z = geo2ecef(36.0926,-76.3829)
    x1,y1,z1 = aer2enu(azi,ele,rang)
    dx,dy,dz = enu2ecefv(x1,y1,z1,36.0926,-76.3829,0)

    x_f = x1+dx
    y_f = y1+dy
    z_f = z1+dz
    return x_f,y_f,z_f


def aer2enu(azi,ele,rang):
    z = rang*sin(radians(ele))
    r = rang*cos(radians(ele))
    x = r*sin(radians(azi))
    y = r*cos(radians(azi))
    return x,y,z

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

def geo2ecef(lon,lat):
    rho,z = geo2cyl(lat,0,R,flat)
    x = rho*cos(radians(lon))
    y = rho*cos(radians(lon))
    
    return x,y,z

def geo2cyl(phi,h,a,f):
    sinphi = sin(radians(phi))
    cosphi = cos(radians(phi))

    e2 = f*(2-f)
    N = a/sqrt(1-e2*pow(sinphi,2))
    rho = (N+h)*cosphi
    z = (N*(1-e2)+h)*sinphi

    return rho,z

azieles = [[159,47],
           [198,42],
           [313,41],
           [178,66],
           [252,51],
           [52,36],
           [34,2],
           [160,7],
           [68,15],
           [70,65],
           [304,5]]
print("lat\tlon\talt")
print("-------------------------------------------")
for coord in azieles:
    aer2geo2(coord[0],coord[1])

#res = aer2geo(198,420)
#print(res[0],res[1],res[2])
