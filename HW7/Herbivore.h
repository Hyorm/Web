#ifndef Herbivore_H
#define Herbiivore_H

#include <iostream>
#include <string>
#include "Animal.h"

using namespace std;

class Herbivore:public Animal{

	private:
		string name;
		
	public:
		
		Herbivore();
		~Herbivore();

		void getInfo();

		void setName(string name);

};

#endif
