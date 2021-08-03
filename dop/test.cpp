#include <iostream>
#include <bitset>

#define BitVal(data,y) ( (data>>y) & 1)      /** Return Data.Y value   **/
#define SetBit(data,y)    data |= (1 << y)    /** Set Data.Y   to 1    **/
#define ClearBit(data,y)  data &= ~(1 << y)   /** Clear Data.Y to 0    **/
#define TogleBit(data,y)     (data ^=BitVal(y))     /** Togle Data.Y  value  **/
#define Togle(data)   (data =~data )         /** Togle Data value     **/


//using namespace std;
/*namespace gpsUtilities
{
  struct DopValues
  {
    double pdop;
    double hdop;
    double vdop;
  }
  
  bool computeDop(const std::vector<int>&                  satellites,
                  std::unordered_map<uint32_t, DopValues>& subset_dops)
  {
    sat1 = 1;
    sat2 = 10; 
    sat3 = 30;

    return true;
  }
*/
int main(){
uint8_t number = 0x00; //0b00000101
SetBit(number,1);
SetBit(number,2);
uint8_t bit_0 = BitVal(number,0);
uint8_t bit_1 = BitVal(number,1); // bit_2 = 1
uint8_t bit_2 = BitVal(number,2); // bit_1 = 0

  std::cout<<unsigned(bit_0)<<" "<<unsigned(bit_1)<<" "<<unsigned(bit_2)<<std::endl;
  return 0;
}
