#include <iostream>
#include <fstream>

void outputItem(std::ofstream f, 
                double        altitude, 
                double        longitude, 
                double        latitude, 
                int           command_code,
                int           jump_id,
                int           hold_time)
{
  if (command_code == 20)
  {
    f << "            {\n";
    f << "                \"autoContinue\": true,\n";
    f << "                \"command\": " << command_code << ",\n";
    f << "                \"doJumpId\": " << jump_id << ",\n";
    f << "                \"frame\": 2,\n";
    f << "                \"params\": [\n";
    f << "                    " << hold_time << ",\n";
    f << "                    0,\n";
    f << "                    0,\n";
    f << "                    0,\n";
    f << "                    " << longitude << ",\n";
    f << "                    " << latitude << ",\n";
    f << "                    " << altitude << "\n";
    f << "                ],\n";
    f << "                \"type\": \"SimpleItem\"\n";
    f << "            }\n";
  }
  else
  {
    f << "            {\n";
    f << "                \"AMSLAltAboveTerrain\": null,\n";
    f << "                \"Altitude\": " << altitude << ",\n";
    f << "                \"AltitudeMode\": 1,\n";
    f << "                \"autoContinue\": true,\n";
    f << "                \"command\": " << command_code << ",\n";
    f << "                \"doJumpId\": " << jump_id << ",\n";
    f << "                \"frame\": 3,\n";
    f << "                \"params\": [\n";
    f << "                    " << hold_time << ",\n";
    f << "                    0,\n";
    f << "                    0,\n";
    f << "                    null,\n";
    f << "                    " << longitude << ",\n";
    f << "                    " << latitude << ",\n";
    f << "                    " << altitude << "\n";
    f << "                ],\n";
    f << "                \"type\": \"SimpleItem\"\n";
    f << "            },\n";
  }
}

int main()
{
  std::ofstream f;
  f.open("test.plan");

  f << "{\n";
  f << "    \"fileType\": \"Plan\",\n";
  f << "    \"geoFence\": {\n";
  f << "        \"circles\": [\n";
  f << "        ],\n";
  f << "        \"polygons\": [\n";
  f << "        ],\n";
  f << "        \"version\": 2\n";
  f << "    },\n";
  f << "    \"groundStation\": \"QGroundControl\",\n";
  f << "    \"mission\": {\n";
  f << "        \"cruiseSpeed\": 15,\n";
  f << "        \"firmwareType\": 12,\n";
  f << "        \"globalPlanAltitudeMode\": 1,\n";
  f << "        \"hoverSpeed\": 5,\n";
  f << "        \"items\": [\n";
  
  outputItem(f, altitude, longitude, latitude, 22, 1, hold_time);
  outputItem(f, altitude, longitude, latitude, 16, 2, hold_time);
  outputItem(f, altitude, longitude, latitude, 16, 3, hold_time);
  outputItem(f, altitude, longitude, latitude, 16, 4, hold_time);
  outputItem(f, altitude, longitude, latitude, 16, 5, hold_time);
  outputItem(f, altitude, longitude, latitude, 16, 6, hold_time);
  
  f << "        ],\n";
  f << "        \"plannedHomePosition\": [\n";
  f << "            " << latitude1 << ",\n";
  f << "            " << longitude1 << ",\n";
  f << "            " << landing_altitude << "\n";
  f << "        ],\n";
  f << "        \"vehicleType\": 2,\n";
  f << "        \"version\": 2\n";
  f << "    },\n";
  f << "    \"rallyPoints\": {\n";
  f << "        \"points\": [\n";
  f << "        ],\n";
  f << "        \"version\": 2\n";
  f << "    },\n";
  f << "    \"version\": 1\n";
  f << "}\n";

  return 0;
}
