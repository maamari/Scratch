#include <iostream>
#include <vector>
#include <numeric> 
#include <algorithm>
#include <math.h>

int main(){
std::vector< std::vector<float> > sat_los;

std::vector<float> los_matrix;
los_matrix = { 7.2, 3.0, 10.0, 1.0 };
sat_los.push_back(los_matrix);
los_matrix = { 2.2, 36., 1.0, 1.0 };
sat_los.push_back(los_matrix);
los_matrix = { 2.7, 31.0, 13.0, 1.0 };
sat_los.push_back(los_matrix);

std::vector< std::vector<float> > sat_los_temp(sat_los[0].size(),std::vector<float>());
for (unsigned int row = 0; row < sat_los.size(); ++row)
  for (unsigned int col = 0; col < sat_los[0].size(); ++col)
    sat_los_temp[col].push_back(sat_los[row][col]);
sat_los = sat_los_temp;

int rows = sat_los.size();
float num_sats = sat_los[0].size();
float mean;
std::vector<float> diff(num_sats);
std::vector<float> variances;
for (unsigned int i = 0; i < rows; i++)
{
  mean = std::accumulate(sat_los[i].begin(), sat_los[i].end(), 0.0)/num_sats;

  variances.push_back(std::inner_product(sat_los[i].begin(), sat_los[i].end(), sat_los[i].begin(), 0.0,[](double const & x, double const & y) { return x + y; },[mean](double const & x, double const & y) { return (x - mean)*(y - mean); })/(num_sats-1));
  
}

std::cout << variances[0] << " "<<variances[1] << " "<<variances[2] <<" "<<variances[4]<< std::endl;
return 0;
}
