#include <iostream>
void func(int i=0,void *arg){
  std::cout << arg << std::endl;
}

int main(){
  func();
  return 0;
}
