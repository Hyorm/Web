#ifndef Carnivore_H
#define Carnivore_H

#include <iostream>
#include <string>
#include "Animal.h"

using namespace std;

class Carnivore:public Animal{

	private:
		string name;
		
	public:
		
		Carnivore();

		~Carnivore();

		void getInfo();

		void setName(string name);

};

#endif
