from pymap3d import geodetic2ecef, aer2enu, enu2uvw,aer2ecef, aer2geodetic
from pymap3d.ellipsoid import Ellipsoid
from pymap3d.utils import sanitize
from math import sqrt, sin, cos, radians

azi = 186
ele = 21
srange = 2e7
lat = 36.0926
lon = -76.3829
alt = 0
ell = Ellipsoid()
deg = True

x0,y0,z0 = geodetic2ecef(lat,lon,alt)
print("geo2ecef:",x0,y0,z0)

x,y,z = aer2enu(azi,ele,srange)
print("aer2enu:",x,y,z)

x1,y1,z1 = enu2uvw(x,y,z,lat,lon)
print("enu2uvw:",x1,y1,z1)


print(x1+x0, y1+y0, z1+z0)
